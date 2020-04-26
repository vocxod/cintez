<?php

require('vendor/autoload.php');
require('generated-conf/config.php');

$uuResult = [];

echo "Usage: parsintez ACTION\n\n";
echo "Where ACTION is one from is:
\t--p2c\t;set category to each PRODUCT
\t--dcat=75 \t;delete old categories from start ID=75
\t--product\t;import PRODUCT from site
\t--articles\t;import articles from old site
\t--news	\t;import NEWS from site
\t--cats	\t;import CATEGORIes from site
\t--delinfo=12\t;delete information srom start ID=12
\t--translite=*.jpg\t;translite image files from dir
\t--add-annonce \t;extract a product ANNONCE from them DB table MODX_CONTENT and insert to OC_PRODUCT_CATEGORY table
***************************************************************
";

//$aData = explode("=", string)
foreach ($argv as $key => $value) {
	$aAction = explode("=", $value);
	switch ($aAction[0]) {
		case '--add-annonce':
			setAnnonce();
			echo "Set product annonce complete.\n";
			break;
		case '--dcat':
			$iStartId = 76;
			if( array_key_exists(1, $aAction) ){
				$iStartId = (int)$aAction[1];
			}
			echo "--dcat from CATEGORY_ID:$iStartId\n";
			break;
		case '--p2c':
			echo "--p2c\n";
			p2c(); // set category for products
			break;
		case '--articles':
			echo "--articles\n";
			importArticles();
			break;
		case '--news':
			echo "--news\n";
			importNews();
			break;
		case '--cats':
			echo "--cats\n";
			getCategoryData( 182 ); //забрать категории с башки=182
			break;
		case '--translite':
			echo "--translite\n";
			renameImages(".");
			break;
		case '--product':
			echo "--product";
			getProductData();
			break;
		case '--delinfo':
			$iStartId = 12;
			if( array_key_exists(1, $aAction) ){
				$iStartId = (int)$aAction[1];
			}
			echo "--delinfo from INFORMATION_ID:$iStartId\n";
			deleteInformation( $iStartId );
			break;
		default:
			echo "\n";
			break;
	}
}
die();

function fact($n) {
  if ($n === 0) { // our base case
     return 1;
  }
  else {
     return $n * fact($n-1); // <--calling itself.
  }
}

/*
Расставляем анонсы для товаров из таблиц старого сайта
*/
function setAnnonce(){
	// for each product
	$aProducts = OcProductQuery::create()
	->find();
	foreach ($aProducts as $aProduct) {
		//echo "A" . $aProduct->getProductId() . "\n";
		$aOldProduct = ModxSiteContentQuery::create()->filterById( $aProduct->getModel() )->findOne();
		if( $aOldProduct != null ){
			if( $aOldProduct->getIntrotext() != "" ){
				$aPd = OcProductDescriptionQuery::create()->filterByProductId( $aProduct->getProductId() )->find();
				foreach ($aPd as $aPdItem) {
					$aPdItem->setSmallDescription( $aOldProduct->getIntrotext() );
					$aPdItem->save();
				}
				echo $aProduct->getProductId() . " : " . $aOldProduct->getIntrotext() . "\n";
			}
		}
	}
}

function importArticles(){
	$oTmp = ModxSiteTmplvarContentvaluesQuery::create()
		->filterByTmplvarid(9) 
		//->filterByValue( '%web:%' )
		->find();
		$iCount = 0;
	foreach ($oTmp as $key => $value) {
		if(strpos( $value, 'web:' ) != false ){
			//echo $value->getValue() . ":";
			$sPattern = "|web:(\d+)|i";
			$sSubject = $value->getValue();
			$aOut = [];
			$iArticleId = 0;
			if( preg_match_all($sPattern, $sSubject, $aOut )){
				$iArticleId = $aOut[1][0];
				$oArticle = ModxSiteContentQuery::create()
				->filterById( $iArticleId )
				->findOne();
				if( $oArticle != null && strlen($oArticle->getContent())>255 ){
					echo "Find article with ID: $iArticleId \n";
					// если такой статьи еще нет - для репарсинга
					// если статьи нет - создадим - если есть -вернем ее ID
					$oTmp = OcInformationQuery::create()
					->filterByArticeId( $iArticleId )
					->findOne();
					if( $oTmp != null ){
						$iNewinfoId = $oTmp->getInformationId();
					} else {
						$oNewinfo = new OcInformation();
						$oNewinfo->setSortOrder(999);
						$oNewinfo->setArticeId( $iArticleId );
						$oNewinfo->save();
						$iNewinfoId = $oNewinfo->getInformationId();
					}

					echo "Save new article: " . $iNewinfoId . "\n";
				
					$aLanguages = [1, 4];
					foreach ($aLanguages as $iLanguageId) {

						$oTmp = OcInformationDescriptionQuery::create()
						->filterByLanguageId( $iLanguageId )
						->filterByInformationId($iNewinfoId)
						->findOne();
						if( $oTmp != null ){
							echo "UPDATE exist record\n";
							$oNewinfoDescription = $oTmp;
							$oNewinfoDescription->setTitle( $oArticle->getPagetitle() );
							$oNewinfoDescription->setDescription( $oArticle->getContent() );
							$oNewinfoDescription->setMetaTitle('');
							$oNewinfoDescription->setMetaDescription('');
							$oNewinfoDescription->setMetaKeyword( $iArticleId );
							$oNewinfoDescription->save(); 
						} else {
							$oNewinfoDescription = new OcInformationDescription();
							$oNewinfoDescription->setLanguageId( $iLanguageId );
							$oNewinfoDescription->setInformationId( $iNewinfoId );
							$oNewinfoDescription->setTitle( $oArticle->getPagetitle() );
							$oNewinfoDescription->setDescription( $oArticle->getContent() );
							$oNewinfoDescription->setMetaTitle('');
							$oNewinfoDescription->setMetaDescription('');
							$oNewinfoDescription->setMetaKeyword( $iArticleId );
							$oNewinfoDescription->save(); 							
						}

					}
					$oTmp = OcInformationToStoreQuery::create()
					->filterByInformationId( $iNewinfoId )
					->filterByStoreId( 0 )
					->findOne();
					if( $oTmp == null ){
						$oInformationToStore = new OcInformationToStore();
						$oInformationToStore->setInformationId( $iNewinfoId );
						$oInformationToStore->setStoreId( 0 );
						$oInformationToStore->save();						
					}
					$oTmp = OcInformationToLayoutQuery::create()
					->filterByInformationId( $iNewinfoId )
					->filterByLayoutId( 0 )
					->findOne();
					if( $oTmp == null ){
						$oInformationLayout = new OcInformationToLayout();
						$oInformationLayout->setInformationId( $iNewinfoId );
						$oInformationLayout->setLayoutId( 0 );
						$oInformationLayout->save();
					}
				}
			}
			$iCount++;			
		}
	}

	echo "$iCount founded \nArticles imported\n";
}

function getCategoryList( $iCategoryId, $uuResult = array() ){
	//var_dump( $GLOBALS['uuResult'] ); die();
	array_push($GLOBALS['uuResult'], $iCategoryId); 
	//$uuResult = [];
	//array_push($uuResult, $iCategoryId);
	$c = OcCategoryQuery::create()->filterByCategoryId( $iCategoryId )->findOne();
	if( $c->getParentId() != 0 ){
		getCategoryList( $c->getParentId(), $GLOBALS['uuResult'] );
	} else {
		//var_dump($GLOBALS['uuResult']);
	}
	return $GLOBALS['uuResult'];
}

// Расставляем товрам категории и пописываем взаимосвязи между категориями
function p2c(){
	OcProductToCategoryQuery::create()->deleteAll();
	OcCategoryPathQuery::create()->deleteAll();
	echo "Set category to product\n";
	//$aCategories = getAllParents();
	$c = OcCategoryQuery::create()->filterByStatus(1)->find();
	foreach ($c as $key => $oCategory) {
		// находим список товаров данной категории на старом сайте
		$oTmp = ModxSiteTmplvarContentvaluesQuery::create()
		->filterByTmplvarid(12)
		->filterByContentid( $oCategory->getCategoryId() )
		->findOne();
		
		if( $oTmp != null){
			// получить список товаров
			$aModelIds = explode( '||', $oTmp->getValue() );
			$aProducts = OcProductQuery::create()->filterByModel( $aModelIds )->find();
				
			// получить все категории этого товара на нашем сайте
			// первый уровень
			$aCategories = []; 

			$aaa = getCategoryList( $oCategory->getCategoryId() );
			$aCategories = array_reverse($GLOBALS['uuResult']);
			$GLOBALS['uuResult'] = [];

			foreach ($aCategories as $iCategoryId ) {
				foreach ($aProducts as $aProduct) {
					//echo($iCategoryId . "\t" . $aProduct->getProductId() . "\n" ); 
					$p2cat = OcProductToCategoryQuery::create()
					->filterByProductId( $aProduct->getProductId() )
					->filterByCategoryId( $iCategoryId )
					->findOne();
					if( $p2cat == null ){
						$o = new OcProductToCategory();
						$o->setProductId( $aProduct->getProductId() );
						$o->setCategoryId( $iCategoryId );
						$o->save();
					}
				}
			}

			// прописать путь категорий
			// только если его еще нет
			foreach ($aCategories as $iKey => $iPath) {
				$cp = OcCategoryPathQuery::create()
				->filterByCategoryId( $oCategory->getCategoryId() )
				->filterByPathId( $iPath )
				->findOne();
				if($cp==null){
					$oCatPath = new OcCategoryPath();
					$oCatPath->setCategoryId( $oCategory->getCategoryId() );
					$oCatPath->setPathId( $iPath );
					$oCatPath->setLevel( $iKey );
					$oCatPath->save();
				}
			}
		}
	}
}

function setImagePath( $sContent ){
	$sPattern = '|<img(.*)src="(.*)"(.*)>|Uis';
	$aOut = [];
	/*
	//  может_быть_сайт /image/catalog/news/ имя_файла
	if(preg_replace($sPattern, replacement, subject) ){

	}
	*/
	if(preg_match_all($sPattern, $sContent, $aOut)){
		var_dump( $aOut );
		die();
	}
}

function importNews(){
	deleteInformation(12);
	$q = ModxSiteContentQuery::create()
		->filterByIsFolder(0)
		->filterByPublished(1)
		->filterByParent( 6 )
		->find();
	echo "Founded " . count($q) . " article  news \n";

	foreach ($q as $key => $article) {
		//setImagePath( $article->getContent() );
		/*
		mysql> DESCRIBE oc_information;
		+----------------+------------+------+-----+---------+----------------+
		| Field          | Type       | Null | Key | Default | Extra          |
		+----------------+------------+------+-----+---------+----------------+
		| information_id | int(11)    | NO   | PRI | NULL    | auto_increment |
		| bottom         | int(1)     | NO   |     | 0       |                |
		| sort_order     | int(3)     | NO   |     | 0       |                |
		| status         | tinyint(1) | NO   |     | 1       |                |
		| isnews         | int(11)    | YES  |     | 0       |                |
		| onhome         | int(11)    | YES  |     | 0       |                |
		+----------------+------------+------+-----+---------+----------------+
		6 rows in set (0.06 sec)
		*/
		$o = new OcInformation();
		$o->setBottom( 0 ); 
		$o->setSortOrder( 0 );
		$o->setStatus( 1 );
		$o->setIsnews( 1 );
		$o->setOnhome( 0 );
		$o->save();
		$iInformationId = $o->getInformationId();
		/*
		mysql> DESCRIBE oc_information_description;
		+------------------+--------------+------+-----+---------+-------+
		| Field            | Type         | Null | Key | Default | Extra |
		+------------------+--------------+------+-----+---------+-------+
		| information_id   | int(11)      | NO   | PRI | NULL    |       |
		| language_id      | int(11)      | NO   | PRI | NULL    |       |
		| title            | varchar(64)  | NO   |     | NULL    |       |
		| description      | mediumtext   | NO   |     | NULL    |       |
		| meta_title       | varchar(255) | NO   |     | NULL    |       |
		| meta_description | varchar(255) | NO   |     | NULL    |       |
		| meta_keyword     | varchar(255) | NO   |     | NULL    |       |
		+------------------+--------------+------+-----+---------+-------+
		7 rows in set (0.00 sec)
		*/

		// лидирующая картинка впереди
		$sImage = getAttributeValue( $article->getId(), 1 );
		echo "Try load image: " . $sImage . "\n";
		$aPathinfo = pathinfo( $sImage );
		if( array_key_exists('extension', $aPathinfo)){
			$sImageFilename = 'article_news_' . $article->getId() . "." . $aPathinfo['extension'];	
			$sImageDiv = "<div class='col-md-12'><img src='/image/catalog/news/" . $sImageFilename . "' alt='' title=''></div>";
		} 
		if( $sImage != "" ){
			if( !file_exists('../upload/image/catalog/news/' . $sImageFilename) ){
				$sLoadedImage = file_get_contents( 'http://specsintez.com/' . $sImage );
				if( $sLoadedImage ){
					// картинка новости физически существует
					file_put_contents('../upload/image/catalog/news/' . $sImageFilename, $sLoadedImage);			
				}
			}
		}

		$aDescription = ["1" => $sImageDiv . $article->getContent(), "4" => $sImageDiv . $article->getContent() ];
		
		$aTitle = ["1"=>$article->getPagetitle(), "4"=>$article->getPagetitle() ];
		
		foreach ($aTitle as $key => $value) {
			$od = new OcInformationDescription();
			$od->setInformationId( $iInformationId );
			$od->setLanguageId( $key );
			$od->setTitle( $value );
			$od->setDescription( $aDescription[$key]);
			$od->setMetaTitle( $article->getId() );
			$od->save();
		}

		/*
		mysql> DESCRIBE oc_information_to_store;
		+----------------+---------+------+-----+---------+-------+
		| Field          | Type    | Null | Key | Default | Extra |
		+----------------+---------+------+-----+---------+-------+
		| information_id | int(11) | NO   | PRI | NULL    |       |
		| store_id       | int(11) | NO   | PRI | NULL    |       |
		+----------------+---------+------+-----+---------+-------+
		2 rows in set (0.00 sec)
		*/
		$o2s = new OcInformationToStore();
		$o2s->setInformationId( $iInformationId );
		$o2s->setStoreId( 0 );
		$o2s->save();
		/*
		mysql> DESCRIBE oc_information_to_layout;
		+----------------+---------+------+-----+---------+-------+
		| Field          | Type    | Null | Key | Default | Extra |
		+----------------+---------+------+-----+---------+-------+
		| information_id | int(11) | NO   | PRI | NULL    |       |
		| store_id       | int(11) | NO   | PRI | NULL    |       |
		| layout_id      | int(11) | NO   |     | NULL    |       |
		+----------------+---------+------+-----+---------+-------+
		3 rows in set (0.00 sec)
		*/
		$o2l = new OcInformationToLayout();
		$o2l->setInformationId( $iInformationId );
		$o2l->setLayoutId( 0 );
		$o2l->setStoreId( 0 );
		$o2l->save();	
		/*
		mysql> DESCRIBE oc_seo_url;
		+-------------+--------------+------+-----+---------+----------------+
		| Field       | Type         | Null | Key | Default | Extra          |
		+-------------+--------------+------+-----+---------+----------------+
		| seo_url_id  | int(11)      | NO   | PRI | NULL    | auto_increment |
		| store_id    | int(11)      | NO   |     | NULL    |                |
		| language_id | int(11)      | NO   |     | NULL    |                |
		| query       | varchar(255) | NO   | MUL | NULL    |                |
		| keyword     | varchar(255) | NO   | MUL | NULL    |                |
		+-------------+--------------+------+-----+---------+----------------+
		5 rows in set (0.00 sec)
		*/
		foreach ($aTitle as $key => $value) {
			$oSeo = new OcSeoUrl();
			$oSeo->setStoreId( 0 );
			$oSeo->setLanguageId( $key );
			$oSeo->setQuery( $value );
			$oSeo->save();
		}

		//var_dump( $iInformationId ); die();

	}
}

function getCategoryData( $iParentCategoryId ){
	// Вытаскиваем КАТЕГОРИИ из таблицы СТАРОГО САЙТА
	// Get CATEGORIes from old database table
	$q = ModxSiteContentQuery::create()
		//->filterByIsFolder(1)
		->filterByPublished(1)
		->filterByParent( $iParentCategoryId)
		->find();
		// echo "Count " . count($q) . " children categoies\n";

	foreach ($q as $key => $value) {
		// echo "Store data in database\n";
		// категория на старом сайте
		// Get ID of the category on old site for link with new category
		$iParentIdOnSite = $value->getParent(); // ID родителя на СТАРОМ сайте
		$iCategorySiteId = $value->getId(); // ID самой категории на СТАРОМ сайте
		$aDescription = [ "1" => $value->getContent(), "4" => $value->getContent() ];
		$aTitles = ["1" => $value->getPagetitle(), "4" =>$value->getPagetitle() ];
		$iTop = 0;
		
		if( $iParentCategoryId == 182 ){
			$iParentIdOnSite = 0;
			$iTop = 1;
		}
		// Сохранимся (новая или обновление существующей)
		// Пишем сформированную категорию в НОВУЮ ТАБЛИтЦУ 
		// Create new or update exist category
		$iCurrentCategoryId = addOrUpdateCategory( 
			$aDescription,  	// название категории
			$aTitles,  			// заголовки
			$iParentIdOnSite,		// ID родительской категории на САЙТЕ
			$iCategorySiteId,	// ID самой кати н астраном сайте
			$iTop );			// только для топовых категорий.
		// echo "Parent:" .$iParentCategoryId . " child:" . $value->getId() . " ";
		getCategoryData( $value->getId() ); 	
	}
	//return $iCount;
/*
	foreach ($q as $key => $value) {
		echo $value->getId() . " \t";
		$aDescription = ["1" => "Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugiat recusandae voluptas corporis officia pariatur consequuntur vel quidem deserunt itaque porro! Cumque repudiandae ipsam distinctio sed deleniti magnam, sit iusto doloribus!", "4" => "Строка типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа тогоСтрока типа того"]; 
		$aLanguages = ["1" => "english category name", "4"=>"название категории на русском"]; 
		$iParentId = 0; 
		$iTop=0;
		$iCategorySiteId = 100500;
		addCategory( $aDescription, $aLanguages, $iCategorySiteId, $iParentId, $iTop );
	}
	*/
}

// Delete old products
// Удаляем товары, которые старые
function deleteProducts( $iProductId = 1 ){
	$o = OcProductQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductAttributeQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductDescriptionQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductDiscountQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductFilterQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductImageQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductOptionQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductOptionValueQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductRelatedQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductRewardQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductSpecialQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductToCategoryQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductToDownloadQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductToLayoutQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductToStoreQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcProductRecurringQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcReviewQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
	$o = OcSeoUrlQuery::create()->filterByQuery( "product_id=" . $iProductId )->delete();
	$o = OcCouponProductQuery::create()->filterByProductId( ["min"=>$iProductId] )->delete();
}

// get product image
function getProductImage( $iProductId ){
	$sImage = "catalog/tproducts/triosept-vet.png";
	
	$o = ModxValuesQuery::create()
	->filterByTmplvarid(2)
	->filterByContentid($iProductId)
	->find();
	
	foreach ($o as $key => $value) {
		$sImageUrl = "http://specsintez.com/" . $value->getValue();
		echo $sImageUrl . "\n";
		$aPathinfo = pathinfo($value->getValue() );
		if( array_key_exists('extension', $aPathinfo) ){
			$sImageFilename = "image_" . $iProductId . "." . $aPathinfo['extension'];
			$sResult = "catalog/tproducts/no_image.jpg";
			if( file_exists("../upload/image/catalog/tproducts/" . $sImageFilename) ){
				// файл уже существует и повторно можно его не скачивать
			} else {
				// картинки нет - скачиваем с сервера
				$sImageContent = file_get_contents( $sImageUrl );
				if( $sImageContent ) {
					file_put_contents("../upload/image/catalog/tproducts/" . $sImageFilename, $sImageContent);
					$sResult = "catalog/tproducts/" . $sImageFilename;
				}						
			}
			return $sResult;
		} else {
			// нет картинки
			return "catalog/tproducts/no_image.jpg";
		}
		break;
	}
}

// Вытаскиваем ТОВАРЫ
// Get PRODUCT data
function getProductData( $iParentId = 1144 ){
	
	deleteProducts();
	echo "Start\n";
	// Вытаскиваем КАТЕГОРИИ из таблицы СТАРОГО САЙТА
	// Get CATEGORIes from old database table
	$q = ModxSiteContentQuery::create()
		//->filterByIsFolder(1)
		->filterByPublished(1)
		->filterByTemplate(6)
		//->filterByParent( $iParentId )
		->find();
		// echo "Count " . count($q) . " children categoies\n";

	foreach ($q as $key => $value) {
	
		$p = new OcProduct(); 
		$p->setModel( $value->getId() ); 
		$p->setSku(""); $p->setUpc(""); $p->setEan(""); $p->setJan("");
		$p->setIsbn(""); $p->setMpn(""); $p->setLocation("СПб"); $p->setQuantity(100500);
		$p->setStockStatusId(7); 

		$sImage = getProductImage( $value->getId() );
		$p->setImage( $sImage );

		$p->setManufacturerId(0); $p->setShipping( 1 ); 
		$p->setPrice( 0 );
		$p->setPoints( 0 ); 
		$p->setTaxClassId( 9 ); // 9=товар с налогами 10=загружаемый товар
		$p->setDateAvailable( date( "Y-m-d", time() ) );	
		$p->setWeight(0); $p->setWeightClassId(1); //1=KG 2=gramm 5=pound  6=ounce 
 		// 1=centimeter 2=millimeter 3=inch 
		$p->setLength(0); $p->setWidth(0); $p->setHeight(0); $p->setLengthClassId(1);
		$p->setSubtract(1); $p->setMinimum(0); $p->setSortOrder(0); $p->setStatus(1); $p->setViewed(0);
		$p->setDateAdded( date("Y-m-d", time() )); 
		$p->setDateModified( date("Y-m-d", time() )); 
		$p->setStatus2(0); // need remembe - whot is it?
		$p->save();
		
		$iProductId = $p->getProductId();
		
		$pd = new OcProductDescription();
		$pd->setProductId( $iProductId );
		$pd->setLanguageId(1);
		$pd->setName( $value->getPagetitle() );
		$pd->setDescription( $value->getContent() );
		$pd->setMetaTitle( $value->getPagetitle() );
		$pd->save();

		$pd = new OcProductDescription();
		$pd->setProductId( $iProductId );
		$pd->setLanguageId(4);
		$pd->setName( $value->getPagetitle() );
		$pd->setDescription( $value->getContent() );
		$pd->setMetaTitle( $value->getPagetitle() );
		$pd->save();

		$pc = new OcProductToCategory();
		$pc->setProductId( $iProductId );
		$pc->setCategoryId( 232 );
		$pc->save();

		$ps = new OcProductToStore();
		$ps->setProductId( $iProductId );
		$ps->setStoreId(0);
		$ps->save();

		$pl = new OcProductToLayout();
		$pl->setProductId( $iProductId );
		$pl->setLayoutId(0);
		$pl->save();

		// расставим характеристики (через установку атрибутов)
		// Состав->Описание
		$sResult = getAttributeValue($value->getId(), 4);
		if( $sResult ){
			$pa = new OcProductAttribute();
			$pa->setProductId($iProductId);
			$pa->setLanguageId(1);
			$pa->setAttributeId(11);
			$pa->setText( $sResult );
			$pa->save();
			$pa = new OcProductAttribute();
			$pa->setProductId($iProductId);
			$pa->setLanguageId(4);
			$pa->setAttributeId(11);
			$pa->setText( $sResult );
			$pa->save();
		}

		// Срок годности->Годен до
		$sResult = getAttributeValue($value->getId(), 7);
		if( $sResult ){
			$pa = new OcProductAttribute();
			$pa->setProductId($iProductId);
			$pa->setLanguageId(1);
			$pa->setAttributeId(3);
			$pa->setText( $sResult );
			$pa->save();
			$pa = new OcProductAttribute();
			$pa->setProductId($iProductId);
			$pa->setLanguageId(4);
			$pa->setAttributeId(3);
			$pa->setText( $sResult );
			$pa->save();
		}

		// Упоковка->Вместимость
		$sResult = getAttributeValue($value->getId(), 5);
		if( $sResult ){
			$pa = new OcProductAttribute();
			$pa->setProductId($iProductId);
			$pa->setLanguageId(1);
			$pa->setAttributeId(10);
			$pa->setText( $sResult );
			$pa->save();
			$pa = new OcProductAttribute();
			$pa->setProductId($iProductId);
			$pa->setLanguageId(4);
			$pa->setAttributeId(10);
			$pa->setText( $sResult );
			$pa->save();
		}

		// PH->значение
		$sResult = getAttributeValue($value->getId(), 11);
		if( $sResult ){
			$pa = new OcProductAttribute();
			$pa->setProductId($iProductId);
			$pa->setLanguageId(1);
			$pa->setAttributeId(12);
			$pa->setText( $sResult );
			$pa->save();
			$pa = new OcProductAttribute();
			$pa->setProductId($iProductId);
			$pa->setLanguageId(4);
			$pa->setAttributeId(12);
			$pa->setText( $sResult );
			$pa->save();
		}

		echo $iProductId . "\t";
	}
}

function getAttributeValue( $iProductId, $iSiteAttributeId ){
	$sResult = "";
	$o = ModxValuesQuery::create()
	->filterByContentid( $iProductId )
	->filterByTmplvarid( $iSiteAttributeId )
	->limit(1)
	->find();
	foreach ($o as $key => $value) {
		$sResult = $value->getValue();
	}
	return $sResult;
}

// Get ARTICLES 

// Get NEWS

// записать данные по категории в БД
function addOrUpdateCategory( $aDescription, $aTitles, $iParentIdOnSite, $iCategorySiteId, $iTop = 0 ){
	// встаим новую категорию
	/*
	+------------------+--------------+------+-----+---------------------+-----------------------------+
	| Field            | Type         | Null | Key | Default             | Extra                       |
	+------------------+--------------+------+-----+---------------------+-----------------------------+
	| category_id      | int(11)      | NO   | PRI | NULL                | auto_increment              |
	| image            | varchar(255) | YES  |     | NULL                |                             |
	| parent_id        | int(11)      | NO   | MUL | 0                   |                             |
	| top              | tinyint(1)   | NO   |     | NULL                |                             |
	| column           | int(3)       | NO   |     | NULL                |                             |
	| sort_order       | int(3)       | NO   |     | 0                   |                             |
	| status           | tinyint(1)   | NO   |     | NULL                |                             |
	| date_added       | timestamp    | NO   |     | CURRENT_TIMESTAMP   | on update CURRENT_TIMESTAMP |
	| date_modified    | timestamp    | NO   |     | 0000-00-00 00:00:00 |                             |
	| category_site_id | int(11)      | YES  |     | NULL                |                             |
	+------------------+--------------+------+-----+---------------------+-----------------------------+
	*/

// ищем вставляемую категорию (это может быть повторный запуск)
	$po = OcCategoryQuery::create()->findOneByCategoryId( $iCategorySiteId );
	
	if( $po != null){
		// эдитим существующую
		//echo 'category exist: ' . $po->getCategoryId() . "\n";
		$oCat = $po;
	} else {
		// это новая категория
		//echo('new category');
		$oCat = new OcCategory();
		$oCat->setCategoryId( $iCategorySiteId );
	}

	$oCat->setImage(null);
	$oCat->setParentId( $iParentIdOnSite );
	$oCat->setTop( $iTop );
	//$oCat->setColumn(1); // устанавливается в 1 по умолчанию
	$oCat->setSortOrder(1);
	$oCat->setStatus(1);
	$oCat->setDateAdded( date('Y-m-d H:i:s', time() ) );
	$oCat->setDateModified( date('Y-m-d H:i:s', time() ) );
	//$oCat->setCategorySiteId($iCategorySiteId);
	$oCat->save();
	$iCategoryId = $oCat->getCategoryId();
	echo  "Category ID: " . $iCategoryId . "\t";

	// укажем описания на эти категории
	/*
	oc_category_description;
	*/
	OcCategoryDescriptionQuery::create()->filterByCategoryId( $iCategoryId )->delete();
	foreach ($aTitles as $iLanguageId => $sName ) {
		$oCategoryDescription = new OcCategoryDescription();
		$oCategoryDescription->setCategoryId( $iCategoryId );
		$oCategoryDescription->setLanguageId( $iLanguageId );
		$oCategoryDescription->setName( $sName );
		$oCategoryDescription->setDescription( $aDescription[ $iLanguageId ] );
		$oCategoryDescription->setMetaTitle("1");
		$oCategoryDescription->setMetaDescription("2");
		$oCategoryDescription->setMetaKeyword("3");
		$oCategoryDescription->save();
	}

	/*
	oc_category_path
	*/
	// для категории и всех более старших категорий для данной, построить пач
	OcCategoryPathQuery::create()->filterByCategoryId( $iCategoryId )->delete();
	$oCategoryPath = new OcCategoryPath();
	$oCategoryPath->setCategoryId( $iCategoryId );
	$oCategoryPath->setPathId( $iCategoryId );
	$oCategoryPath->setLevel( 0 );
	$oCategoryPath->save();

	/*
	oc_category_to_layout;
	*/
	OcCategoryToLayoutQuery::create()->filterByCategoryId( $iCategoryId )->delete();
	$oCategoryToLayout = new OcCategoryToLayout();
	$oCategoryToLayout->setCategoryId( $iCategoryId );
	$oCategoryToLayout->setStoreId( 0 );
	$oCategoryToLayout->setLayoutId( 0 );
	$oCategoryToLayout->save();
	/*
	category_to_store;
	*/
	OcCategoryToStoreQuery::create()->filterByCategoryId( $iCategoryId )->delete();
	$oCategoryToStore = new OcCategoryToStore();
	$oCategoryToStore->setCategoryId( $iCategoryId );
	$oCategoryToStore->setStoreId( 0 );
	$oCategoryToStore->save();	
	return $iCategoryId;
}

// delete old categories
function deleteCategories( $iStartCategoryId = 76){
	$o = OcCategoryQuery::create()->filterByCategoryId( [ "min"=>76] )->delete();
	$o = OcCategoryDescription::create()->filterByCategoryId( [ "min"=>76] )->delete();
	$o = OcCategoryToStore::create()->filterByCategoryId( [ "min"=>76] )->delete();
	$o = OcCategoryToLayout::create()->filterByCategoryId( [ "min"=>76] )->delete();
	$o = OcCategoryPath::create()->filterByCategoryId( [ "min"=>76] )->delete();
}


function deleteInformation($iStartId){
	$o = OcInformationQuery::create()->filterByInformationId(["min"=>$iStartId])->delete();
	$o = OcInformationDescriptionQuery::create()->filterByInformationId(["min"=>$iStartId])->delete();
	$o = OcInformationToStoreQuery::create()->filterByInformationId(["min"=>$iStartId])->delete();
	$o = OcInformationToLayoutQuery::create()->filterByInformationId(["min"=>$iStartId])->delete();
	$o = OcSeoUrlQuery::create()->filterByQuery( "information_id=" . $iStartId )->delete();
}


// addition helpfull functions
function remove_accent($str)
{
  $a = array('À', 'Á', 'Â', 'Ã', 'Ä', 'Å', 'Æ', 'Ç', 'È', 'É', 'Ê', 'Ë', 'Ì', 'Í', 'Î', 'Ï', 'Ð', 'Ñ', 'Ò', 'Ó', 'Ô', 'Õ', 'Ö', 'Ø', 'Ù', 'Ú', 'Û', 'Ü', 'Ý', 'ß', 'à', 'á', 'â', 'ã', 'ä', 'å', 'æ', 'ç', 'è', 'é', 'ê', 'ë', 'ì', 'í', 'î', 'ï', 'ñ', 'ò', 'ó', 'ô', 'õ', 'ö', 'ø', 'ù', 'ú', 'û', 'ü', 'ý', 'ÿ', 'Ā', 'ā', 'Ă', 'ă', 'Ą', 'ą', 'Ć', 'ć', 'Ĉ', 'ĉ', 'Ċ', 'ċ', 'Č', 'č', 'Ď', 'ď', 'Đ', 'đ', 'Ē', 'ē', 'Ĕ', 'ĕ', 'Ė', 'ė', 'Ę', 'ę', 'Ě', 'ě', 'Ĝ', 'ĝ', 'Ğ', 'ğ', 'Ġ', 'ġ', 'Ģ', 'ģ', 'Ĥ', 'ĥ', 'Ħ', 'ħ', 'Ĩ', 'ĩ', 'Ī', 'ī', 'Ĭ', 'ĭ', 'Į', 'į', 'İ', 'ı', 'Ĳ', 'ĳ', 'Ĵ', 'ĵ', 'Ķ', 'ķ', 'Ĺ', 'ĺ', 'Ļ', 'ļ', 'Ľ', 'ľ', 'Ŀ', 'ŀ', 'Ł', 'ł', 'Ń', 'ń', 'Ņ', 'ņ', 'Ň', 'ň', 'ŉ', 'Ō', 'ō', 'Ŏ', 'ŏ', 'Ő', 'ő', 'Œ', 'œ', 'Ŕ', 'ŕ', 'Ŗ', 'ŗ', 'Ř', 'ř', 'Ś', 'ś', 'Ŝ', 'ŝ', 'Ş', 'ş', 'Š', 'š', 'Ţ', 'ţ', 'Ť', 'ť', 'Ŧ', 'ŧ', 'Ũ', 'ũ', 'Ū', 'ū', 'Ŭ', 'ŭ', 'Ů', 'ů', 'Ű', 'ű', 'Ų', 'ų', 'Ŵ', 'ŵ', 'Ŷ', 'ŷ', 'Ÿ', 'Ź', 'ź', 'Ż', 'ż', 'Ž', 'ž', 'ſ', 'ƒ', 'Ơ', 'ơ', 'Ư', 'ư', 'Ǎ', 'ǎ', 'Ǐ', 'ǐ', 'Ǒ', 'ǒ', 'Ǔ', 'ǔ', 'Ǖ', 'ǖ', 'Ǘ', 'ǘ', 'Ǚ', 'ǚ', 'Ǜ', 'ǜ', 'Ǻ', 'ǻ', 'Ǽ', 'ǽ', 'Ǿ', 'ǿ');
  $b = array('A', 'A', 'A', 'A', 'A', 'A', 'AE', 'C', 'E', 'E', 'E', 'E', 'I', 'I', 'I', 'I', 'D', 'N', 'O', 'O', 'O', 'O', 'O', 'O', 'U', 'U', 'U', 'U', 'Y', 's', 'a', 'a', 'a', 'a', 'a', 'a', 'ae', 'c', 'e', 'e', 'e', 'e', 'i', 'i', 'i', 'i', 'n', 'o', 'o', 'o', 'o', 'o', 'o', 'u', 'u', 'u', 'u', 'y', 'y', 'A', 'a', 'A', 'a', 'A', 'a', 'C', 'c', 'C', 'c', 'C', 'c', 'C', 'c', 'D', 'd', 'D', 'd', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'E', 'e', 'G', 'g', 'G', 'g', 'G', 'g', 'G', 'g', 'H', 'h', 'H', 'h', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'I', 'i', 'IJ', 'ij', 'J', 'j', 'K', 'k', 'L', 'l', 'L', 'l', 'L', 'l', 'L', 'l', 'l', 'l', 'N', 'n', 'N', 'n', 'N', 'n', 'n', 'O', 'o', 'O', 'o', 'O', 'o', 'OE', 'oe', 'R', 'r', 'R', 'r', 'R', 'r', 'S', 's', 'S', 's', 'S', 's', 'S', 's', 'T', 't', 'T', 't', 'T', 't', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'W', 'w', 'Y', 'y', 'Y', 'Z', 'z', 'Z', 'z', 'Z', 'z', 's', 'f', 'O', 'o', 'U', 'u', 'A', 'a', 'I', 'i', 'O', 'o', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'U', 'u', 'A', 'a', 'AE', 'ae', 'O', 'o');
  return str_replace($a, $b, $str);
} 

// template for function
function remove_russian($str)
{
$a = array('А', 'Б', 'В', 'Г', 'Д', 'Е', 'Ё', 'Ж', 'З', 'И', 'Й', 'К', 'Л', 'М', 'Н', 'О', 'П', 'Р', 'С', 'Т', 'У', 'Ф', 'Х', 'Ц', 'Ч', 'Ш', 'Ь', 'Щ', 'Ы', 'Э', 'Ю', 'Ъ', 'Я', 'а', 'б', 'в', 'г', 'д', 'е', 'ё', 'ж', 'з', 'и', 'й', 'к', 'л', 'м', 'н', 'о', 'п', 'р', 'с', 'т', 'у', 'ф', 'х', 'ц', 'ч', 'ш', 'ь', 'щ', 'ы', 'э', 'ю', 'я', 'ъ');
$b = array('a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'l', 'sh', 'y', 'y', 'ju', 'l', 'ya', 'a', 'b', 'v', 'g', 'd', 'e', 'e', 'zh', 'z', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'r', 's', 't', 'u', 'f', 'h', 'c', 'ch', 'sh', 'l', 'sh', 'y', 'y', 'yu', 'ya', 'q');
	return str_replace($a, $b, $str);
} 

// prepare for URI, filenames, etc 
function post_slug($str){
  return strtolower(
  	preg_replace(
		array('/[^a-zA-Z0-9 -]/', '/[ -]+/', '/^-|-$/'),
		array('', '-', ''), 
		remove_accent($str) 
		) 
  	);
} 

// транслитерация 
function translit($st) {
  $st = strtr($st, 
    "абвгдежзийклмнопрстуфыэАБВГДЕЖЗИЙКЛМНОПРСТУФЫЭ",
    "abvgdegziyklmnoprstufieABVGDEGZIYKLMNOPRSTUFIE"
  );
  $st = strtr($st, array(
    'ё'=>"yo",    'х'=>"h",  'ц'=>"ts",  'ч'=>"ch", 'ш'=>"sh",  
    'щ'=>"shch",  'ъ'=>'',   'ь'=>'',    'ю'=>"yu", 'я'=>"ya",
    'Ё'=>"Yo",    'Х'=>"H",  'Ц'=>"Ts",  'Ч'=>"Ch", 'Ш'=>"Sh",
    'Щ'=>"Shch",  'Ъ'=>'',   'Ь'=>'',    'Ю'=>"Yu", 'Я'=>"Ya",
  ));
  return $st;
}

function renameImages( $sPath ){
	if ($handle = opendir( $sPath )) {
	    echo "Дескриптор каталога: $handle\n";
	    echo "Записи:\n";
	    /* Именно этот способ чтения элементов каталога является правильным. */
	    while (false !== ($entry = readdir($handle))) {
	        echo remove_russian( $entry ) . "\n";
	    }
	    closedir($handle);
	}
}