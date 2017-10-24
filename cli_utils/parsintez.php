<?php

require('vendor/autoload.php');
require('generated-conf/config.php');

$iCount = 0;
getCategoryData();
echo "iCount $iCount \n";

function getCategoryData( $iParentCategoryId = 182 ){
	// Вытаскиваем КАТЕГОРИИ из таблицы СТАРОГО САЙТА
	$q = ModxSiteContentQuery::create()
		->filterByIsFolder(1)
		->filterByPublished(1)
		->filterByParent( $iParentCategoryId)
		->find();
		echo "Count " . count($q) . " children categoies\n";

	foreach ($q as $key => $value) {
		echo "Store data in database\n";
		// категория на старом сайте
		$iCategorySiteId = $value->getId();
		$aDescription = [ "1" => $value->getContent(), "4" => $value->getContent() ];
		$aLanguages = ["1" => $value->getPagetitle(), "4" =>$value->getPagetitle() ];
		if( $iParentCategoryId == 182 ){
			$iTop = 1;
		}
		// Сохранимся (новая или обновление существующей)
		// Пишем сформированную категорию в НОВУЮ ТАБЛИтЦУ 
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

function getProductData(){
	echo "\n";	
	// Вытаскиваем ТОВАРЫ
}

// Получить данные по категории


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