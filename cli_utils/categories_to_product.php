<?php

// add_category

require('vendor/autoload.php');
require('generated-conf/config.php');

$uuResult = [];

echo "Расставить категории для товаров \n";

class CategoriesToProduct {

	public $sCsvData;
	public $aCategories;

	function __construct() {
				
	}

	function setCategory(){
		$row = 1;
		if (($handle = fopen("product2category.csv", "r")) !== FALSE) {

		    while (($data = fgetcsv($handle, 2000, ",")) !== FALSE) {
		    	if( $row == 1 ){
		    		// это строка с категориями 
		    		$this->aCategories = $data;
		    		$row++;
		    		// var_dump( $this->aCategories ); die("category load");
		    	} else {
		    		// пошли товары
			        $this->parseOneProduct( $data );
			        $row++;
			        //die();
		    	}

		    }
		    fclose($handle);
		    echo "$row rows\n";
		}
	}
	// вернуть ВСЕ старшие категории вместе с данной
	private function getCategoryPath( $iCategoryId){
		$aObj = OcCategoryPathQuery::create()
		->filterByCategoryId( $iCategoryId )
		->find();
		$aResult = [];
		foreach ($aObj as $oObj ) {
			if( $oObj != null ){
	 			$aResult[] = $oObj->getPathId();
			}
		}
		return $aResult;
	}

	private function parseOneProduct( $aData ){
		$iProductId = $aData[0];
		if( $iProductId > 0 ){
			echo "iProductId $iProductId ";
			// проставим этому товару категории
			for( $i = 2; $i < count($aData); $i++){
				
				echo $aData[ $i ] . " : ";

				if( $aData[$i] > 0 ){
					$iMyCategory = $this->aCategories[ $i ]; // вес (значимость) товара игнорируется
					$aCats = $this->getCategoryPath( $iMyCategory );
					//var_dump( $aCats ); die();
					foreach ($aCats as $iCategoryId ) {
						$oObj = OcProductToCategoryQuery::create()
						->filterByProductId( $iProductId )
						->filterByCategoryId( $iCategoryId )
						->findOne();
						if($oObj == null){
							$oObj = new OcProductToCategory();
							$oObj->setCategoryId( $iCategoryId );
							$oObj->setProductId( $iProductId );
							$oObj->save();
							echo $aData[$i] . ":";
						}
					}
				}
			} 
			echo "\n";
		}
	}


}

$app = new CategoriesToProduct();
$app->setCategory();
