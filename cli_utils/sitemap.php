<?php

// add_category

require('vendor/autoload.php');
require('generated-conf/config.php');

class Sitemap {

	public $s_xml = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">
	<url>
	<loc>https://www.specsintez.com/каталог</loc>
	<changefreq>weekly</changefreq>
	<priority>0.7</priority>
	</url>
	</urlset>';
	public $s_result = '';

	public function run(){

		$s_url = '';

		$a_products = OcProductQuery::create()
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
		
		$s_result = '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9" xmlns:image="http://www.google.com/schemas/sitemap-image/1.1">' . $s_url . '</urlset>';

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

$app = new Sitemap();

$app->run();

