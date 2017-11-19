<?php
class ControllerCommonToparticles extends Controller {
	public function index() {
		$this->load->language('common/toparticles');

		$this->load->model('catalog/information');

		$aTopArticles = $this->model_catalog_information->getTopArticles( 5 );

		$data = [];

		$data['toparticles'] = $aTopArticles;

		return $this->load->view('common/toparticles', $data);
	}
}
