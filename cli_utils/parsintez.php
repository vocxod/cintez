<?php

require('vendor/autoload.php');
require('generated-conf/config.php');

echo "Usage: parsintez ACTION\n\n";
echo "Where ACTION is one from is:
\t--dcat=75 \t;delete old categories from start ID=75
\t--product\t;import PRODUCT from site
\t--articles\t;import articles from old site
\t--news	\t;import NEWS from site
\t--cats	\t;import CATEGORIes from site
\t--delinfo=12\t;delete information srom start ID=12
\t--translite=*.jpg\t;translite image files from dir
***************************************************************
";

//$aData = explode("=", string)
foreach ($argv as $key => $value) {
	$aAction = explode("=", $value);
	switch ($aAction[0]) {
		case '--dcat':
			$iStartId = 76;
			if( array_key_exists(1, $aAction) ){
				$iStartId = (int)$aAction[1];
			}
			echo "--dcat from CATEGORY_ID:$iStartId\n";
			break;
		case '--articles':
			echo "--articles\n";
			break;
		case '--news':
			echo "--news\n";
			importNews();
			break;
		case '--cats':
			echo "--cats\n";
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
		setImagePath( $article->getContent() );
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
		$aDescription = ["1" => $article->getContent(), "4" => $article->getContent() ];
		$aTitle = ["1"=>$article->getPagetitle(), "4"=>$article->getPagetitle() ];
		foreach ($aTitle as $key => $value) {
			$od = new OcInformationDescription();
			$od->setInformationId( $iInformationId );
			$od->setLanguageId( $key );
			$od->setTitle( $value );
			$od->setDescription( $aDescription[$key]);
			$od->setMetaTitle( $value );
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
	}
}

function getCategoryData( $iParentCategoryId = 182 ){
	// Вытаскиваем КАТЕГОРИИ из таблицы СТАРОГО САЙТА
	// Get CATEGORIes from old database table
	$q = ModxSiteContentQuery::create()
		->filterByIsFolder(1)
		->filterByPublished(1)
		->filterByParent( $iParentCategoryId)
		->find();
		echo "Count " . count($q) . " children categoies\n";

	foreach ($q as $key => $value) {
		echo "Store data in database\n";
		// категория на старом сайте
		// Get ID of the category on old site for link with new category
		$iCategorySiteId = $value->getId();
		$aDescription = [ "1" => $value->getContent(), "4" => $value->getContent() ];
		$aLanguages = ["1" => $value->getPagetitle(), "4" =>$value->getPagetitle() ];
		if( $iParentCategoryId == 182 ){
			$iTop = 1;
		}
		// Сохранимся (новая или обновление существующей)
		// Пишем сформированную категорию в НОВУЮ ТАБЛИтЦУ 
		// Create new or update exist category
		$iCurrentCategoryId = addOrUpdateCategory( $aDescription, $aLanguages, $iCategorySiteId, $iParentId = 0, $iTop );
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
			if( file_exists("../upload/image/catalog/tproducts/" . $sImageFilename) ){
				// файл уже существует и повторно можно его не скачивать
			} else {
				// картинки нет - скачиваем с сервера
				try {
					$sImageContent = file_get_contents( $sImageUrl );
					file_put_contents("../upload/image/catalog/tproducts/" . $sImageFilename, $sImageContent);
					$sResult = "catalog/tproducts/" . $sImageFilename;
				}
				catch (Exception $e) {
					// скачивание произошло с ошибкой
					$sResult = "catalog/tproducts/no_image.jpg";
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
		$pd->save();

		$pd = new OcProductDescription();
		$pd->setProductId( $iProductId );
		$pd->setLanguageId(4);
		$pd->setName( $value->getPagetitle() );
		$pd->setDescription( $value->getContent() );
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
function addOrUpdateCategory( $aDescription, $aLanguages, $iCategorySiteId, $iParentId = 0, $iTop = 0 ){
	// встаим новую категорию
	/*
	| oc_category                       |
	| oc_category_description           |
	| oc_category_filter                |
	| oc_category_path                  |
	| oc_category_to_layout             |
	| oc_category_to_store              |


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

	// Пытаемся найти в базе категорию, связанную со старым сайтом
	// Trying find the category in the database, linked with old site
	$aCat = OcCategoryQuery::create()->filterByCategorySiteId( $iCategorySiteId )->limit(1)->find();
	var_dump( $iCategorySiteId );
	foreach ($aCat as $key => $value) {
		// категория в таблице есть - проводим обновление
		// category exist in table - execute UPDATE data
		echo "FIND\n";
		var_dump($value->getId() ); die();
	}
	//var_dump($oCat->getPagetitle() ); 
	die();

	$oCat = new OcCategory();
	$oCat->setImage(null);
	$oCat->setParentId( $iParentId );
	$oCat->setTop( $iTop );
	//$oCat->setColumn(1); // устанавливается в 1 по умолчанию
	$oCat->setSortOrder(1);
	$oCat->setStatus(1);
	$oCat->setDateAdded( date('Y-m-d H:i:s', time() ) );
	$oCat->setDateModified( date('Y-m-d H:i:s', time() ) );
	$oCat->setCategorySiteId($iCategorySiteId);
	$oCat->save();
	$iCategoryId = $oCat->getCategoryId();
	echo  "Category ID: " . $iCategoryId . "\n";

	// укажем описания на эти категории
	/*
	oc_category_description;
	+------------------+--------------+------+-----+---------+-------+
	| Field            | Type         | Null | Key | Default | Extra |
	+------------------+--------------+------+-----+---------+-------+
	| category_id      | int(11)      | NO   | PRI | NULL    |       |
	| language_id      | int(11)      | NO   | PRI | NULL    |       |
	| name             | varchar(255) | NO   | MUL | NULL    |       |
	| description      | text         | NO   |     | NULL    |       |
	| meta_title       | varchar(255) | NO   |     | NULL    |       |
	| meta_description | varchar(255) | NO   |     | NULL    |       |
	| meta_keyword     | varchar(255) | NO   |     | NULL    |       |
	+------------------+--------------+------+-----+---------+-------+
	mysql> SELECT name FROM oc_category_description WHERE category_id=75;
	+----------------------------------------------------------------+
	| name                                                           |
	+----------------------------------------------------------------+
	| Автоматическая мойка  Чайна-базед                              |
	| Автоматическая мойка  Чайна-базед                              |
	+----------------------------------------------------------------+
	*/
	foreach ($aLanguages as $iLanguageId => $sName ) {
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

	oc_category_path;
	+-------------+---------+------+-----+---------+-------+
	| Field       | Type    | Null | Key | Default | Extra |
	+-------------+---------+------+-----+---------+-------+
	| category_id | int(11) | NO   | PRI | NULL    |       |
	| path_id     | int(11) | NO   | PRI | NULL    |       |
	| level       | int(11) | NO   |     | NULL    |       |
	+-------------+---------+------+-----+---------+-------+

	+-------------+---------+-------+
	| category_id | path_id | level |
	+-------------+---------+-------+
	|          62 |      62 |     0 |
	|          61 |      61 |     0 |
	|          75 |      75 |     3 |
	|          75 |      73 |     2 |
	|          75 |      70 |     1 |
	|          75 |      63 |     0 |
	|          74 |      74 |     3 |
	|          74 |      63 |     0 |
	|          74 |      70 |     1 |
	|          74 |      73 |     2 |
	|          73 |      73 |     2 |
	|          73 |      70 |     1 |
	|          73 |      63 |     0 |
	|          72 |      72 |     2 |
	|          72 |      70 |     1 |
	|          72 |      63 |     0 |
	|          71 |      71 |     1 |
	|          71 |      63 |     0 |
	|          70 |      70 |     1 |
	|          70 |      63 |     0 |
	|          69 |      69 |     0 |
	|          68 |      68 |     0 |
	|          67 |      67 |     0 |
	|          66 |      66 |     0 |
	|          65 |      65 |     0 |
	|          64 |      64 |     0 |
	|          63 |      63 |     0 |
	|          60 |      60 |     0 |
	|          59 |      59 |     0 |
	+-------------+---------+-------+
	*/
	// для категории и всех более старших категорий для данной, построить пач

	$oCategoryPath = new OcCategoryPath();
	$oCategoryPath->setCategoryId( $iCategoryId );
	$oCategoryPath->setPathId( $iCategoryId );
	$oCategoryPath->setLevel( 0 );
	$oCategoryPath->save();

	/*

	oc_category_to_layout;
	+-------------+---------+------+-----+---------+-------+
	| Field       | Type    | Null | Key | Default | Extra |
	+-------------+---------+------+-----+---------+-------+
	| category_id | int(11) | NO   | PRI | NULL    |       |
	| store_id    | int(11) | NO   | PRI | NULL    |       |
	| layout_id   | int(11) | NO   |     | NULL    |       |
	+-------------+---------+------+-----+---------+-------+
	+-------------+----------+-----------+
	| category_id | store_id | layout_id |
	+-------------+----------+-----------+
	|          59 |        0 |         0 |
	|          60 |        0 |         0 |
	|          61 |        0 |         0 |
	|          62 |        0 |         0 |
	|          63 |        0 |         0 |
	|          64 |        0 |         0 |
	|          65 |        0 |         0 |
	|          66 |        0 |         0 |
	|          67 |        0 |         0 |
	|          68 |        0 |         0 |
	|          69 |        0 |         0 |
	|          70 |        0 |         0 |
	|          71 |        0 |         0 |
	|          72 |        0 |         0 |
	|          73 |        0 |         0 |
	|          74 |        0 |         0 |
	|          75 |        0 |         0 |
	+-------------+----------+-----------+
	*/
	$oCategoryLayout = new OcCategoryToLayout();
	$oCategoryLayout->setCategoryId( $iCategoryId );
	$oCategoryLayout->setStoreId( 0 );
	$oCategoryLayout->setLayoutId( 0 );
	$oCategoryLayout->save();
	/*

	category_to_store;
	+-------------+---------+------+-----+---------+-------+
	| Field       | Type    | Null | Key | Default | Extra |
	+-------------+---------+------+-----+---------+-------+
	| category_id | int(11) | NO   | PRI | NULL    |       |
	| store_id    | int(11) | NO   | PRI | NULL    |       |
	+-------------+---------+------+-----+---------+-------+
	2 rows in set (0.00 sec)

	mysql> SELECT * FROM oc_category_to_store;
	+-------------+----------+
	| category_id | store_id |
	+-------------+----------+
	|          59 |        0 |
	|          60 |        0 |
	|          61 |        0 |
	|          62 |        0 |
	|          63 |        0 |
	|          64 |        0 |
	|          65 |        0 |
	|          66 |        0 |
	|          67 |        0 |
	|          68 |        0 |
	|          69 |        0 |
	|          70 |        0 |
	|          71 |        0 |
	|          72 |        0 |
	|          73 |        0 |
	|          74 |        0 |
	|          75 |        0 |
	+-------------+----------+
	*/
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