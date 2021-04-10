<?php
class ControllerCommonColumnLeft extends Controller {
	public function index( $aData =[] ) {
		$this->load->model('design/layout');

		if (isset($this->request->get['route'])) {
			$route = (string)$this->request->get['route'];
		} else {
			$route = 'common/home';
		}

		$layout_id = 0;

		if ($route == 'product/category' && isset($this->request->get['path'])) {
			$this->load->model('catalog/category');

			$path = explode('_', (string)$this->request->get['path']);

			$layout_id = $this->model_catalog_category->getCategoryLayoutId(end($path));
		}

		if ($route == 'product/product' && isset($this->request->get['product_id'])) {
			$this->load->model('catalog/product');

			$layout_id = $this->model_catalog_product->getProductLayoutId($this->request->get['product_id']);
		}

		if ($route == 'information/information' && isset($this->request->get['information_id'])) {
			$this->load->model('catalog/information');

			$layout_id = $this->model_catalog_information->getInformationLayoutId($this->request->get['information_id']);
		}

		if (!$layout_id) {
			$layout_id = $this->model_design_layout->getLayout($route);
		}

		if (!$layout_id) {
			$layout_id = $this->config->get('config_layout_id');
		}

		$this->load->model('setting/module');

		$data['modules'] = array();

		$modules = $this->model_design_layout->getLayoutModules($layout_id, 'column_left');

		foreach ($modules as $module) {

			// file_put_contents('modules.json', json_encode($module), FILE_APPEND );

			$part = explode('.', $module['code']);

			if (isset($part[0]) && $this->config->get('module_' . $part[0] . '_status')) {
				
				syslog(LOG_DEBUG, json_encode([ 'MODULE aData:', $aData] ) );

				$i_root_id = 0;

				foreach ($aData as $key => $value) {
					if( array_key_exists('root_category_id', $value) ){
						$i_root_id = intval($value['root_category_id']);
					}
				}

				syslog(LOG_DEBUG, json_encode([ 'MODULE root_category_id:', $i_root_id] ) );

				if(isset($part[0]) && $part[0] == 'category'){
					
					$module_data = $this->load->controller('extension/module/' . $part[0], $i_root_id );
					
					// var_dump($aData); die();

				} else {
					$module_data = $this->load->controller('extension/module/' . $part[0]);
				}
				
				if ($module_data) {
					$data['modules'][] = $module_data;
				}
			}

			if (isset($part[1])) {
								
				$setting_info = $this->model_setting_module->getModule($part[1]);

				syslog(LOG_DEBUG, json_encode([ 'MODULE', $part[0], $setting_info]) );

				if ($setting_info && $setting_info['status']) {
					$output = $this->load->controller('extension/module/' . $part[0], $setting_info);

					if ($output) {
						$data['modules'][] = $output;
					}
				}
			}
		}

		return $this->load->view('common/column_left', $data);
	}
}
