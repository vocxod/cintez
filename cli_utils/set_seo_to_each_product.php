<?php

// add_category

require('vendor/autoload.php');
require('generated-conf/config.php');

class SetSeoToEachProduct {


	public function run($i_language_id){
		$a_titles = OcProductDescriptionQuery::create()
		->filterByLanguageId( $i_language_id )
		->find();
		foreach ($a_titles as $obj ) {
			$s_name = $obj->getName();
			$s_seo_name = $this->seoUrl( $s_name ); //preg_replace("[\s\n-+/\`\'\"\*]", "-", $s_name);
			//echo "[" . $s_seo_name . "]\n";
			//die();
			$seo_obj = OcSeoUrlQuery::create()
			->filterByLanguageId( $i_language_id )
			->filterByStoreId( 0 )
			->filterByQuery('product_id=' . $obj->getProductId() )
			->findOne();
			if( $seo_obj == null ){
				$seo_obj = new OcSeoUrl();
				$seo_obj->setStoreId( 0 );
				$seo_obj->setLanguageId( $i_language_id );
				$seo_obj->setQuery( 'product_id=' . $obj->getProductId() );
			}
			$seo_obj->setKeyword( $s_seo_name );	
			$seo_obj->save();
		}
	}

	private function seoUrl($string) {
		$string = htmlspecialchars_decode( strip_tags($string) );
	    //Lower case everything
	    $string = mb_strtolower($string);
	    //Make alphanumeric (removes all other characters)
	    //$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	    $string = preg_replace("/[\"*\/)(]/", "", $string);
	    //$string = preg_replace("/[^a-z0-9а-я_\s-]/", "", $string);
	    //Clean up multiple dashes or whitespaces
	    $string = preg_replace("/[\s-]+/", " ", $string);
	    //Convert whitespaces and underscore to dash
	    $string = preg_replace("/[\s_]/", "-", $string);
	    return $string;
	}

	private function format_uri( $string, $separator = '-' ){
	    $accents_regex = '~&([a-z]{1,2})(?:acute|cedil|circ|grave|lig|orn|ring|slash|th|tilde|uml);~i';
	    $special_cases = array( '&' => 'and', "'" => '');
	    $string = mb_strtolower( trim( $string ), 'UTF-8' );
	    $string = str_replace( array_keys($special_cases), array_values( $special_cases), $string );
	    $string = preg_replace( $accents_regex, '$1', htmlentities( $string, ENT_QUOTES, 'UTF-8' ) );
	    $string = preg_replace("/[^a-z0-9]/u", "$separator", $string);
	    $string = preg_replace("/[$separator]+/u", "$separator", $string);
	    return $string;
	}

}

$i_language_id = 4;

$app = new SetSeoToEachProduct();
$app->run( $i_language_id );

