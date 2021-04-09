<?php
class ControllerExtensionModuleCategory extends Controller {
	public function index() {
		$this->load->language('extension/module/category');

		if (isset($this->request->get['path'])) {
			$parts = explode('_', (string)$this->request->get['path']);
		} else {
			$parts = array();
		}

		if (isset($parts[0])) {
			$data['category_id'] = $parts[0];
		} else {
			$data['category_id'] = 0;
		}

		if (isset($parts[1])) {
			$data['child_id'] = $parts[1];
		} else {
			$data['child_id'] = 0;
		}

		$this->load->model('catalog/category');

		$this->load->model('catalog/product');

		$this->load->model('catalog/category');
		$data['filters'] = $this->model_catalog_category->getAllFilters(0);

		$data['categories'] = array();

		$categories = $this->model_catalog_category->getCategories(0);

		foreach ($categories as $category) {
			$children_data = array();

			if ($category['category_id'] == $data['category_id']) {
				$children = $this->model_catalog_category->getCategories($category['category_id']);

				foreach($children as $child) {
					$filter_data = array('filter_category_id' => $child['category_id'], 'filter_sub_category' => true);

					$children_data[] = array(
						'category_id' => $child['category_id'],
						'name' => $child['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
						# 'name' => '#' . $child['name'] . '#',
						'href' => $this->url->link('product/category', 'path=' . $category['category_id'] . '_' . $child['category_id'])
					);
				}
			}

			$filter_data = array(
				'filter_category_id'  => $category['category_id'],
				'filter_sub_category' => true
			);

			$data['categories'][] = array(
				'category_id' => $category['category_id'],
				'cat_path'	  => $this->model_catalog_category->getCatPath( $category['category_id'] ),
				'name'        => $category['name'] . ($this->config->get('config_product_count') ? ' (' . $this->model_catalog_product->getTotalProducts($filter_data) . ')' : ''),
				# 'name'        => "*" . $category['name'] . "*",
				'children'    => $children_data,
				'href'        => $this->url->link('product/category', 'path=' . $category['category_id']),
				'top'		  => $category['top'],
				'image'		  => $category['image'],
				'class'		  => $category['class'] 
			);
		}

		$data['lang'] = $this->language->get('code');
		$aCategoryTree = $this->load->controller('common/category_tree', ['category_id' => 0]);
		$data['category_tree'] = $aCategoryTree['tree'];

		//$aCategoryTree2 = $this->load->controller('common/category_tree/tree_type2', ['category_id' => 0]);
		//$data['category_tree2'] = $aCategoryTree2['tree'];
		// var_dump($data['category_tree2']); die();
		return $this->load->view('extension/module/category', $data);
	}
}