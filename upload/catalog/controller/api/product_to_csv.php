<?php
class ControllerApiProductToCsv extends Controller {
	public function index() {
		$this->load->language('api/product_to_csv');
		$json = array();

		$this->load->model('catalog/category'); 
		$this->load->model('catalog/product');

		if (!isset($this->session->data['api_id'])) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			$json['status'] = ['code'=>200];
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
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
