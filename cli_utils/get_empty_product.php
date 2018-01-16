<?php

// add_category

require('vendor/autoload.php');
require('generated-conf/config.php');

$uuResult = [];

echo "Товары без атрибутов \n";

class GetEmptyProducts {

	public function __construct() {
				
	}

	public function setCategory( $iParentId = 0, $sCatClass = '' ){
		$aCats = OcCategoryQuery::create()
		->filterByParentId( $iParentId )
		->find();
		foreach ($aCats as $catItem) {
			echo $catItem->getCategoryId() . ":";
			if( $sCatClass != ''){
				$catItem->setClass( $sCatClass );

			} else {
				$sClass = $catItem->getClass();
				$this->setCategory( $catItem->getCategoryId(), $catItem->getClass() );
			}
		}
	}

	public function run(){
		$aProds = OcProductQuery::create()
		->find();
		$fp = fopen('product_attributes.csv', 'w');
		$aData = ['ProductID', 'Наименование',  'Срок годности','Упаковка','Состав'];		
		fputcsv($fp, $aData);
		foreach ($aProds as $aProd ) {
			$aData = [];
			$aData[] = $aProd->getProductId();
			// название через связь, попозже
			$aNames = OcProductDescriptionQuery::create()
			->filterByProductId( $aProd->getProductId() )
			->filterByLanguageId( 1 )
			->findOne();
			if( $aNames != null && count($aNames)>0){
				$aData[] = $aNames->getName();
			} else {
				$aData[] = "Отсутствует";
			}

			$aAttrs = OcProductAttributeQuery::create()
			->filterByProductId( $aProd->getProductId() )
			->filterByAttributeId( 3 )
			->find();
			if( $aAttrs == null || count( $aAttrs )==0 ){
				$aData[] = "( - )";
			} else {
				$aData[] = "( + )";
			}
			$aAttrs = OcProductAttributeQuery::create()
			->filterByProductId( $aProd->getProductId() )
			->filterByAttributeId( 10 )
			->find();
			if( $aAttrs == null || count( $aAttrs )==0 ){
				$aData[] = "( - )";
			} else {
				$aData[] = "( + )";
			}
			$aAttrs = OcProductAttributeQuery::create()
			->filterByProductId( $aProd->getProductId() )
			->filterByAttributeId( 11 )
			->find();
			if( $aAttrs == null || count( $aAttrs )==0 ){
				$aData[] = "( - )";
			} else {
				$aData[] = "( + )";
			}
			fputcsv($fp, $aData);	
		}
		fclose($fp);
	}

}

$app = new GetEmptyProducts();
$app->run();
