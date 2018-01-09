<?php
class ControllerCommonCategoryTree extends Controller {
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
		$json['parent_id_request'] = $iParentId;
		$json['status'] = ['code'=>200];
		$aCategories = $this->model_catalog_category->getCategories( $iParentId );
		$json['categories'] = $aCategories;
		$aResult = [];
		$aOut = $this->createTree( $aCategories, $aResult );
		$json['tree'] = $aOut;

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
			'name'		=>	$aCategory['name'], 
			'css'		=>	$aCategory['css'],
			'class'		=>	$aCategory['class'],
			'children'	=>	$this->createTree( 
				$this->model_catalog_category->getCategories( $aCategory['category_id'], $aResult ) 
			) ]; 	
		}
		return $aResult;
	}

}