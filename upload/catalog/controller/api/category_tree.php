<?php
class ControllerApiCategoryTree extends Controller {
	public function index( $aOption = [] ) {
		$this->load->language('api/product_to_csv');
		$json = array();

		$this->load->model('catalog/category'); 
		$this->load->model('catalog/product');
		$iParentId = 0; //(int)$this->request->get['category_id'];
		if( isset($this->request->get['category_id']) ){
			$iParentId = $this->request->get['category_id'];
		} else {
			$iParentId = 0;
		}
		if (!isset($this->session->data['api_id'])) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			$json['status'] = ['code'=>200];
			$aCategories = $this->model_catalog_category->getCategories( $iParentId );
			$json['categories'] = $aCategories;
			$aResult = [];
			$aOut = $this->createTree( $aCategories, $aResult );
			$json['tree'] = $aOut;
			//var_dump( $json['tree'] ); die();
		}
		if( count($aOption) > 0 ){
			return $json;
		} else {
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}

	// рекурсивно строим категории их таблички OC_CATEGORIES
	private function createTree( $aCategories, $aResult = [] ){
		$this->load->model('catalog/category');
		foreach( $aCategories as $aCategory ){
			$aResult[ $aCategory['category_id'] ] = [ 'category_id'=>$aCategory['category_id'], 
			'name'=> $aCategory['name'], 
			'css' => $aCategory['css'],
			'children'=>$this->createTree( 
				$this->model_catalog_category->getCategories( $aCategory['category_id'], $aResult ) 
			) ]; 	
		}
		return $aResult;
	}

}

/*

curl -X POST -d "username=scanner85&key=bJ8JqL40gL4ahl3wllCU2Zpm6JjuWfD2oSUZYi55tPsqNUw6gEgwrLb4RolhfkAp8XhZVwYF4WfgLIOjhcHcK4u6fejGjhT5gmovZfI6MlqgDf3GlONhy2Q3teiggql4euLgm2m55Lj0Gxh6Yar5EzTqeYOfOCkwhLTixID5LBYojMQbgHbkqCrYrKIiEwDsmue6KCGkW2tgrloEGeUvY6vqsjrcAc2BrbluFMser6maGZNAY2FyH0ktZdgJpXxw"  "http://vkartel.dev/index.php?route=api/product_to_csv&api_token=18f1becae19fd265608a609f8b"


	$json['filters'] = $this->model_catalog_category->getAllFilters(0);	
	$json['products'] = $this->model_catalog_product->getProducts();
	$json['row'] = ["\"ID\"", "\"Наименование\""];
	$json['empty_row'] = ["", ""];
	foreach ($json['filters'] as $aFilter ) {
		foreach ($aFilter as $sKey=>$aItem) {
			if($sKey=='filter'){
				foreach ($aItem as $aRow ){
					// колонка с наименование фильтра
					$json['row'][] = $aFilter['name'] . ":" . $aRow['name'];
					$json['empty_row'][] = "0";
				}
			}
		}
	}

	$fp = fopen('product_property.csv', 'w');
	fputcsv($fp, $json['row']); //первая строка с заголовками
	foreach ($json['products'] as $aProduct) {
		$json['empty_row'][0] =  $aProduct["product_id"];
		$json['empty_row'][1] =  $aProduct["name"];
	    fputcsv($fp, $json['empty_row'] ); //внутренние строки ТОВАР и нули по числу колонок
	}
	fclose($fp);
	foreach ($json['products'] as $aProduct) {				
	}

*/