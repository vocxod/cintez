<?php

// add_category

require('vendor/autoload.php');
require('generated-conf/config.php');

$uuResult = [];

echo "Установить всем потомкам класс родителя \n";

class SetCatForChildren {

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

}

$app = new SetCatForChildren();
$app->setCategory();
