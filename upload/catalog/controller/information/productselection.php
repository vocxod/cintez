<?php
class ControllerInformationProductselection extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('information/productselection');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/productselection')
		);

		$data['button_submit'] = $this->language->get('button_submit');
		$data['action'] = $this->url->link('information/productselection', '', true);
		$this->load->model('tool/image');

		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->load->model('catalog/category');
		$aCategories = $this->model_catalog_category->getCategories(0);
		$iLen = count( $aCategories ) / 2;
		

		// @TODO - все переделать!!!
		// при начальной отрисовке значения 2-3 уровня не определны!
		// Грузим ВСЁ дерево из oc_category_path
		//$this->load->model('model_catalog_category_path');

		$data['categories_left'] =  array_slice( $aCategories, 0, $iLen );
		$data['categories_right'] =  array_slice( $aCategories, $iLen );

		$data['sub_categories_left'] =  array_slice( $aCategories, 0, $iLen );
		$data['sub_categories_right'] =  array_slice( $aCategories, $iLen );

		$data['subsub_categories_left'] =  array_slice( $aCategories, 0, $iLen );
		$data['subsub_categories_right'] =  array_slice( $aCategories, $iLen );

		$data['filtered_products'] = $this->load->controller('product/filtered/index', ['path' => 127, 'offset' => 0, 'limit' => 12 ] ); 
		

		$aCategoryTree = $this->load->controller('common/category_tree', ['category_id' => 0]);
		// $data['category_tree'] = json_encode($aCategoryTree);
		// file_put_contents("filename", $data['category_tree']);
		$data['page_route'] = "information/productselection";
		$this->response->setOutput($this->load->view('information/productselection', $data));
	}

	/**
	* for JS скрипта - отрисовываем контент, отдаем его в JS тот выводит его в партиале
	* 
	*/
	public function success() {
		
		$this->load->language('information/contact');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/productselection', '', true)
		);

		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/success', $data));

	}
}
