<?php
class ControllerApiExportWesProductCsv extends Controller {
	public function index() {
		$this->load->language('api/product_to_csv');
		$json = array();

		$this->load->model('catalog/category'); 
		$this->load->model('catalog/product');

		if (!isset($this->session->data['api_id'])) {
			$json['error'] = $this->language->get('error_permission');
		} else {
			$json['status'] = ['code'=>200];
			$json['products'] = $this->model_catalog_product->getProducts();
			$json['row'] = ["\"ID\"", "\"Наименование\"", "0.25л", "0.5л", "1л", "5л", "20л" ];

			$json['empty_row'] = ["", "", "0", "0", "0", "0", "0"];

			$fp = fopen('product_weight.csv', 'w');
			fputcsv($fp, ['Укажите 1 в клетке на пересечении товара и емкости тары, если отгрузка возможна']);  
			fputcsv($fp, ['Добавьте колонки с другими возможными фасовками, если указанных недостаточно']);  
			fputcsv($fp, $json['row']);  // Первая строка с заголовками

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
