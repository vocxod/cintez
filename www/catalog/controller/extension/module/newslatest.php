<?php
class ControllerExtensionModuleNewslatest extends Controller {
	public function index($setting) {
		$this->load->language('extension/module/newslatest');

		$this->load->model('catalog/product');
		$this->load->model('tool/image');

		$data['products'] = array();

		$filter_data = array(
			'sort'  => 'p.date_added',
			'order' => 'DESC',
			'start' => 0,
			'limit' => $setting['limit']
		);

		$results = $this->model_catalog_product->getProducts($filter_data);

		$sLanguageCode = $this->session->data['language'];

		switch ($sLanguageCode) {
			case 'ru-ru':
				$iLanguageId = 4;
				break;
			case 'en-gb':
				$iLanguageId = 1;
				break;
			default:
				$iLanguageId = 4;
				break;
		}

		$this->load->model('catalog/information');
		$top_news = $this->model_catalog_information->getHomeNews();
		//var_dump($top_news); die();
		$aResult = [];
		foreach ($top_news as $key => $value) {

			$aData = [];
			if(is_array($value)){
				foreach ($value as $key2 => $value2) {
					//echo $key2 . " : " . $value2 . "<br>";
					$aData[$key2] = html_entity_decode( strip_tags($value2) );
				}
				$aResult[] = $aData;
			}
		}
		$data['top_news'] = $aResult;
		$sData = $this->load->view('extension/module/newslatest', $data);
		return $this->load->view('extension/module/newslatest', $data);
	}
}
