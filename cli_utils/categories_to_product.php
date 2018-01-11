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
			        //$num = count($data);
			        // var_dump( $data );
			        //echo "<p> $num полей в строке $row: <br /></p>\n";
			        
/*
			        for ($c=0; $c < $num; $c++) {
			        	if( $c == 0 ){
			        		// 
			        	}
			        	
			            // echo $data[$c] . ":";
			        }
*/
			        $this->parseOneProduct( $data );
			        $row++;
			        //die();
		    	}

		    }
		    fclose($handle);
		}
	}
	
	private function parseOneProduct( $aData ){
		$iProductId = $aData[0];
		if( $iProductId > 0 ){
			echo "iProductId $iProductId ";
			// проставим этому товару категории
			for( $i = 2; $i < count($aData); $i++){
				// echo $aData[ $i ] . " : ";
				if( $aData[$i] > 0 ){
					$oObj = OcProductToCategoryQuery::create()
					->filterByProductId( $iProductId )
					->filterByCategoryId( $aData[$i] )
					->findOne();
					if($oObj == null){
						$oObj = new OcProductToCategory();
						$oObj->setCategoryId( $aData[$i] );
						$oObj->setProductId( $iProductId );
						$oObj->save();
						echo $aData[$i];
					}
				}
			} 
			echo "\n";
		}
	}


}

$app = new CategoriesToProduct();
$app->setCategory();
