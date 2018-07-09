<?php

// add_category

require('vendor/autoload.php');
require('generated-conf/config.php');

$uuResult = [];

class CreateSeoUrls {

	private $language;

	public function __construct( $a_param ){
		$this->language = $a_param['language'];
	}

	public function run( $a_param ){
		$a_seo_keys = [];
		echo "Language: " . $this->language . "\n";
		$a_products = OcProductQuery::create()
		->filterByStatus(1)
		->find();
		foreach ($a_products as $a_product ) {
			$a_descriptions = OcProductDescriptionQuery::create()
			->filterByProductId( $a_product->getProductId() )
			->filterByLanguageId( $this->language )
			->find();
			if( $a_descriptions != null ){
				foreach ($a_descriptions as $a_description) {
					$s_seo_keyword = "product-" . $this->slugify($a_description->getName());
					$a_seo_keys[] = $s_seo_keyword;
					// $a_seo_keys[] =  trim(mb_strtolower( preg_replace("/[\".,+{}()\s]/", "-" , htmlspecialchars_decode($a_description->getName())  ))) . "\n";
					$obj = OcSeoUrlQuery::create()
					->filterByQuery( "product_id=" . $a_product->getProductId() )
					->filterByKeyword( $s_seo_keyword )
					->filterByLanguageId( $a_param['language'] )
					->findOne();	
					if($obj == null){
						$obj = new OcSeoUrl();
					}
					$obj->setQuery( "product_id=" . $a_product->getProductId() );
					$obj->setKeyword( $s_seo_keyword );
					$obj->setStoreId( $a_param['store_id'] );
					$obj->setLanguageId( $a_param['language'] );
					$obj->save();
				}
			}
			// echo ".";
		}
		/*
		array_multisort($a_seo_keys);
		foreach ( $a_seo_keys as $value) {
			echo $value . "\n";
		}
		*/
		if( count( array_unique($a_seo_keys)) == count($a_products) ){

		}
		echo "\nDone.\n";
	}

	function slugify($string) {
	    $string = transliterator_transliterate("Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();", $string);
    	$string = preg_replace('/[-\s]+/', '-', $string);
    	return trim($string, '-');
	}

}

$a_param = [];
$a_param['language'] = 1;
$a_param['store_id'] = 0;


foreach ($argv as $value) {
	$a_tmp = explode("=", $value);
	switch ($a_tmp[0]) {
		case '--help':
			echo "Use SEO generator:\n";
			echo "php create_seo_urls.php [option]\n"; 
			break;
		case '--language':
			$a_param['language'] = $a_tmp[1];
			break;		
		default:
			# code...
			break;
	}
}



$app = new CreateSeoUrls( $a_param );

$app->run( $a_param );





