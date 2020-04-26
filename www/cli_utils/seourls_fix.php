<?php

// add_category

require('vendor/autoload.php');
require('generated-conf/config.php');

class SeourlsFix {

	public $s_xml = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
	<url>
	<loc>https://www.specsintez.com/каталог</loc>
	<changefreq>weekly</changefreq>
	<priority>0.7</priority>
	</url>
	</urlset>';



	public $s_result = '';

	private function csv_to_array($filename='', $delimiter=','){
	    if(!file_exists($filename) || !is_readable($filename))
	        return FALSE;

	    $header = NULL;
	    $data = array();
	    if (($handle = fopen($filename, 'r')) !== FALSE)
	    {
	        while (($row = fgetcsv($handle, 1000, $delimiter)) !== FALSE)
	        {
	            if(!$header)
	                $header = $row;
	            else
	                $data[] = array_combine($header, $row);
	        }
	        fclose($handle);
	    }
	    return $data;
	}

	public function run( $s_filename ){

		if( !file_exists($s_filename ) ){
			die("File not found");
		}

		$a_data = $this->csv_to_array( $s_filename, ';' );
		foreach( $a_data as $item ){
			// iconv("UTF8", "CP1251", $item["keyword"])
			// 
			$a_rows = OcSeoUrlQuery::create()
			->filterBySeoUrlId( $item["seo_url_id"] )
			->find();
			foreach( $a_rows as $row ){
				//echo $row->getKeyword() . "\n\r";
				$row->setKeyword( $item["keyword"] );
				$row->save();
				echo $row->getSeoUrlId() . ":"; // . ":" . $item["seo_url_id"] . " : " . $item["keyword"] . ":" . $row->getKeyword()  . "\n\r"; die();
			}
		}
		echo "\n\r";
		die();
		$s_url = '';

		$a_products = OcSeoQuery::create()
		->filterByStatus(1)
		->find();
		foreach( $a_products as $a_product ){

			$a_seo = OcSeoUrlQuery::create()
			->filterByQuery( "product_id=" . $a_product->getProductId() )
			->filterByLanguageId(4)
			->findOne();
			if( $a_seo != null){
				$s_url .= '<url><loc>https://www.specsintez.com/' . $a_seo->getKeyword() . '</loc><changefreq>weekly</changefreq><priority>0.7</priority></url>';
			}

		}
		
		$s_result = '<urlset>' . $s_url . '</urlset>';

		header("Content-Type: text/xml");
		header("Expires: Thu, 19 Feb 1998 13:24:18 GMT");
		header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");
		header("Cache-Control: no-cache, must-revalidate");
		header("Cache-Control: post-check=0,pre-check=0");
		header("Cache-Control: max-age=0");
		header("Pragma: no-cache");
		$s_result =  "<?xml version=\"1.0\" encoding=\"UTF-8\" standalone=\"yes\"?>" . $s_result;
		//echo $s_result;
		file_put_contents('../www/sitemap.xml', $s_result);
	}

}

$s_filename = '';;

foreach ($argv as $key => $value) {
	$a_data = ( explode( "=", $value ) );
	if( is_array($a_data)){
		if( $a_data[0] == 'seo_urls' ){
			$s_filename = $a_data[ 1 ];
		}
	}
}	

$app = new SeourlsFix();

$app->run( $s_filename );

