<?php

// add_category

require('vendor/autoload.php');
require('generated-conf/config.php');

class Sitemap {

	public $s_xml = '<urlset>
	<url>
	<loc>https://www.specsintez.com/каталог</loc>
	<changefreq>weekly</changefreq>
	<priority>0.7</priority>
	</url>
	</urlset>';
	public $s_result = '';

	public function run(){
		
		$a_seo = OcSeoUrlQuery::create()
		//->filterByQuery( "product_id%" )
		->filterByLanguageId(4)
		->where('oc_seo_url.query LIKE ?', 'product_id=%')
		//->toString();
		->find();
		$s_url = '';
		foreach ($a_seo as $obj) {
			$s_url .= '<url><loc>https://www.specsintez.com/' . $obj->getKeyword() . '</loc><changefreq>weekly</changefreq><priority>0.7</priority></url>';
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

$app = new Sitemap();

$app->run();

