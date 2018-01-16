<?php

// add_category

require('vendor/autoload.php');
require('generated-conf/config.php');

$uuResult = [];

echo "Usage: add_category --name=\"наименование категории\" --parent_id=\"ID\" \n";
echo "добавляет новую категорию под родительской с ID:\n";

class  AddCategory {

	public $sName = "";
	public $iParentId = 0;
	public $iCategoryId;
	public $aParents = [];

	public function __construct( $argv ){
		foreach ($argv as $key => $value) {
			$aAction = explode("=", $value);
			switch ($aAction[0]) {
				case '--name':
					$this->sName = explode("=", $value)[1];
					echo "Новая категория: " . $this->sName . "\n";
					break;
				case '--parent_id':
					$this->iParentId = explode("=", $value)[1];
					echo "Родительская категория: " . $this->iParentId . "\n";
					break;
				default:
					echo "\n";
					break;
			}
		}	
	}

	public function addCategory(){
		$oNewCategory = new OcCategory();
		$oNewCategory->setImage("");
		$oNewCategory->setParentId( $this->iParentId );
		$oNewCategory->setTop( 0 );
		$oNewCategory->setColumn( 1 );
		$oNewCategory->setSortOrder( 333 );
		$oNewCategory->setStatus( 1 );
		$oNewCategory->save();
		$this->iCategoryId = $oNewCategory->getCategoryId();
		echo "New category with ID = " . $this->iCategoryId . " added\n";
		$aLangs = OcLanguageQuery::create()->find();
		foreach ($aLangs as $key => $oLang) {
			//echo  $olang->getName() . "\n";
			$oNewCategoryDescription = new OcCategoryDescription();
			$oNewCategoryDescription->setCategoryId( $this->iCategoryId );
			$oNewCategoryDescription->setLanguageId( $oLang->getLanguageId() );
			$oNewCategoryDescription->setName( $this->sName );
			$oNewCategoryDescription->setDescription( $this->sName );
			$oNewCategoryDescription->setMetaTitle( $this->sName );
			$oNewCategoryDescription->setMetaDescription( $this->sName );
			$oNewCategoryDescription->setMetaKeyword( $this->sName );
			$oNewCategoryDescription->save();
		 } 
		 // найти всех предков созданной категории и расставить 
		 // oc_category_path
		 $aPaths = $this->getParents( $this->iCategoryId, $this->iParentId );
		 $aPaths = array_reverse( $aPaths );
		 array_push($aPaths, $this->iCategoryId ); 
		 foreach( $aPaths as $iKey=>$iPath ) {
		 	$this->addPath( $this->iCategoryId, $iPath, $iKey);
		 }
		 $obj = new OcCategoryToStore();
		 $obj->setCategoryId( $this->iCategoryId );
		 $obj->setStoreId( 0 );
		 $obj->save();

 		 $obj = new OcCategoryToLayout();
		 $obj->setCategoryId( $this->iCategoryId );
		 $obj->setStoreId( 0 );
		 $obj->setLayoutId( 0 );
		 $obj->save();
	}

	// записать цепочки категорий
	public function addPath( $iCategoryId, $iPathId, $iLevel ){
		echo "iCategoryId $iCategoryId, PathId $iPathId, iLevel $iLevel \n";
		$oObj = new OcCategoryPath();
		$oObj->setCategoryId( $iCategoryId );
		$oObj->setPathId( $iPathId );
		$oObj->setLevel( $iLevel );
		$oObj->save(); 
	}

	// вернуть все CATEGORY_ID предков
	public function getParents( $iCategoryId, $iParentId ){
		echo "iCategoryId $iCategoryId iParentId $iParentId \n";
		$aRow = OcCategoryQuery::create()
		->filterByCategoryId( $iParentId )
		->findOne();
		if( $iParentId != 0  ){
			array_push( $this->aParents, $aRow->getCategoryId() );
			$this->getParents( $aRow->getCategoryId(), $aRow->getParentId() );
		} 
		return $this->aParents;
	}

}


$app = new AddCategory( $argv );
$app->addCategory();

