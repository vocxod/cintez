<?php
class ControllerCommonPanelMenu extends Controller {
	public function index() {
		$this->load->language('common/menu');
		
		$data['categories'] = array();

		// Menu
		$this->load->model('catalog/category');
		$this->load->model('catalog/information');

		//$info_page = $this->model_catalog_information->getInformation(11);
		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			if ($category['top']) {
				// Level 2
				$children_data = array();

				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach ($children as $child) {
					$filter_data = array(
						'filter_category_id'  => $child['category_id'],
						'filter_sub_category' => true
					);

					$children_data[] = array(
						'name'  => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
						'href'  => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);
				}

				// Level 1
				$data['categories'][] = array(
					'name'     => $category['name'],
					'children' => $children_data,
					'column'   => $category['column'] ? $category['column'] : 1,
					'href'     => $this->url->link('product/category', 'path=' . $category['category_id']),
					'image'	=> $category['image'],
					'category_id' => $category['category_id'],
					'status'	=> $category['status'],

				);
			}
		}
		 
		//
		// $data['information_description'] =  html_entity_decode( $info_page['description'] );
		$data['lang'] = $this->language->get('code');
		// рендеринг хтмл и возврат его наверх для вставки куда надо
		return $this->load->view('common/panel_menu', $data);
	}
}


