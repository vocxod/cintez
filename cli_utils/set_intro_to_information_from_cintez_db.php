<?php

// add_category

require('vendor/autoload.php');
require('generated-conf/config.php');

$uuResult = [];

echo "Установить введение для новости \n";

class SetIntroToInformationFromCintezDb {

	public function __construct() {
				
	}

	public function run(){
		$aNews = ModxSiteContentQuery::create()
		->find();
		foreach ($aNews as $oCintezNews) {
			$sIntrotext = $oCintezNews->getIntrotext();
			if( $sIntrotext != null ){
				$iNewsId = $oCintezNews->getId();
				//echo $iNewsId . ":";
				echo $iNewsId . "@" . substr($sIntrotext, 0, 100 ) . "\n";
				$aMyNews = OcInformationQuery::create()
				->filterByArticeId( $iNewsId )
				->find();

				// для всех языков
				foreach ($aMyNews as $oObj ) {
					$aList = OcInformationDescriptionQuery::create()
					->filterByInformationId( $oObj->getInformationId( $oObj->getInformationId() ) )
					->find();
					foreach ($aList as $key=>$item) {
						echo $item->getInformationId() . "#";
						echo $sIntrotext . "@\n";
						$item->setForegroundText( $sIntrotext );
										
						echo ($item->getForegroundText() ) . "\n";	
						// вопрос по картинкам тоже решить заодно
						/*
						+------+-----------+-----------+---------------+
						| id   | tmplvarid | contentid | value         |
						+------+-----------+-----------+---------------+
						| 5675 |         1 |      1659 | agrofarm2.png |
						+------+-----------+-----------+---------------+
						*/
						$aImages = ModxSiteTmplvarContentvaluesQuery::create()
						->filterByTmplvarid(1)
						->filterByContentid( $oCintezNews->getId() )
						->findOne();
						if( $aImages != null ){
							$sImage = ( "/image/catalog/news_1/" . $aImages->getValue() );
							$item->setForegroundImage( $sImage );	
						}
						$item->save();
					}
				}
			}
		}

		echo "\n";
	}
}

$app = new SetIntroToInformationFromCintezDb();
$app->run();
