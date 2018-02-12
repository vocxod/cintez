<?php

// add_category

require('vendor/autoload.php');
require('generated-conf/config.php');

$uuResult = [];

echo "Расставить материалам даты создания\n";

class SetDateAdded {

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
				$catItem->save();
			} else {
				$sClass = $catItem->getClass();
				$this->setCategory( $catItem->getCategoryId(), $catItem->getClass() );
			}
		}
	}

	public function run(){
		$aOcInformation = OcInformationQuery::create()
		->find();
		foreach ($aOcInformation as $aArticle ) {
			$iOldId = $aArticle->getArticeId();
			$aOldRow = ModxSiteContentQuery::create()
			->filterById( $iOldId )
			->findOne();
			if( $aOldRow != null ){
				$sDateAdded = date("Y-m-d H:i:s", $aOldRow->getCreatedon() );
				echo "Новая дата: " . $sDateAdded . "\n";
				
				$aArticle->setDateAdded( $sDateAdded );
				$aArticle->save();
				
			}
		}
	}

}

$app = new SetDateAdded();
$app->run();
