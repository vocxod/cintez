<?php

require('vendor/autoload.php');
require('generated-conf/config.php');

class GetCategorySeo {

	public function run(){
		$i_category_id = 1598;
		
		$a_categories = OcCategoryQuery::create()
		->filterByStatus(1)
			->useOcCategoryDescriptionQuery()
				->filterByLanguageId(4)
			->endUse()
		->find();

		foreach ($a_categories as $a_category) {
			
			// echo $a_category->getCategoryId(); continue;

			$a_category_seo = OcCategoryPathQuery::create()
			->filterByLevel( [0, 1, 2])
			->filterByCategoryId( $a_category->getCategoryId() )
			->find();

			$s_prev_keyword = '';

			if( count($a_category_seo) == 3 ){
				$a_result = [];
				foreach ($a_category_seo as $key => $value) {
					$a_result[] = $value->getPathId();
				}
				$s_query = "category_id=" . implode("_", $a_result);
				$a_seo_urls = OcSeoUrlQuery::create()
				->filterByLanguageId( 4 )
				->filterByQuery( $s_query )
				->orderByKeyword()
				->find();
				foreach( $a_seo_urls as $obj ){

					$s_cat3 = $obj->getSeoUrlId() . ";" . $obj->getQuery() . ";" . $obj->getKeyword() . ";" . "<a href='https://specsintez.com/index.php?route=product/category&path=" . implode("_", $a_result) . "'>on site</a>" . ";" . "<a href='https://specsintez.com/" . $obj->getKeyword() . "'>on site SEO URL</a>" . "\n"; 
					$obj->setKeyword( $obj->getSeoUrlId() . "-" . $obj->getKeyword() );
					$obj->save();
/*
					// получить сео урл для 1 и 2 уровней
					array_pop($a_result);
					$s_query_2 = "category_id=" . implode("_", $a_result );
				
					$a_cat2 = OcSeoUrlQuery::create()
					->filterByLanguageId( 4 )
					->filterByQuery( $s_query_2 )
					->findOne();	
					//->toString();

					array_pop($a_result);
					$s_query_1 = "category_id=" . implode("_", $a_result );
					$a_cat1 = OcSeoUrlQuery::create()
					->filterByLanguageId( 4 )
					->filterByQuery( $s_query_1 )
					->findOne();	
					//echo $a_cat1->getKeyword() . ";" . $a_cat2->getKeyword() . "\n"; 
					//die();
					if($a_cat1 != null)	echo "LEVEL_1 ;" . $a_cat1->getKeyword() . ";\n";
					if($a_cat2 != null) echo "LEVEL_2 ;" . $a_cat2->getKeyword() . ";\n";
					echo $s_cat3 . "\n";
*/
				} 

			}

		}


	}

}

$app = new GetCategorySeo();
$app->run();

