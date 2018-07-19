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
		switch ($a_param['seo_type']) {
			case 'product':
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
							$s_seo_keyword = $a_param['prefix'] . $this->slugify($a_description->getName());
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
				if( count( array_unique($a_seo_keys)) == count($a_products) ){

				}
				# code...
				break;
			case 'category':
				# code...
				break;
			default:
				echo "Неизвестный тип SEO ссылок!\n";
				break;
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
$a_param['prefix'] = ''; 
$a_param['language'] = 4;
$a_param['store_id'] = 0;
$a_param['seo_type'] = ''; // product category information и тд

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
		case '--seo-type':
			$a_param['seo_type'] = $a_tmp[1];
			break;						
		case '--prefix':
			$a_param['seo_type'] = $a_tmp[1];
			break;	
		default:
			# code...
			break;
	}
}

if( $a_param['seo_type']==''){
	die("Нет установлен тип SEO!\n");
}

$app = new CreateSeoUrls( $a_param );

$app->run( $a_param );





