<?php
class ControllerApiImportFromCsv extends Controller {
	/*
Данные из filename (CSV) 
	*/
	public function index(){
		$json = [];
		$json['filename'] = $this->request->get['filename'];
		
		$sFilename = $this->request->get['filename'];
			
		$this->load->model('catalog/category'); 
		$this->load->model('catalog/product');

		$aFilters = $this->model_catalog_category->getAllFilters(0);
		$aNewFilter = [];
		$iFilterCount = 0;
		foreach ($aFilters as $aFilterGroups) {
			foreach ($aFilterGroups['filter'] as $aGroup) {
				$aNewFilter[] =$aGroup['filter_id'];
				$iFilterCount++;
			}
		}
		$json['filter_count'] = $iFilterCount;
		$json['filters'] = $aNewFilter;
		$row = 0;
		if (($handle = fopen( $sFilename, "r")) !== FALSE) {
		    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
		        $num = count($data);
		        // echo "$num полей в строке $row:\n";
		        // $json[$row] = $num;
		        $aProductData = [];
		        for ($c=0; $c < $num; $c++) {
		            //echo $data[$c] . ":";
		        	$aProductData[] = $data[$c];
		            //$json[$row][] = $data[$c];
		        }
//		        array_push(array, var)
		        $json[] = $aProductData;
		        $row++;
		        //echo "\n";
		        //die();
		    }
		    fclose($handle);
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function testtest() {
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
