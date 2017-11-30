<?php
class ControllerCommonTopnews extends Controller {
	public function index( $aOption=[]) {
		$this->load->language('common/topnews');

		$this->load->model('catalog/information');
		if( array_key_exists('news', $aOption) ){
			$iLimit = $aOption['news'];
		} else {
			$iLimit = 6;
		}
		$aTopArticles = $this->model_catalog_information->getTopNews( $iLimit );
		/* get first image for each news */
		$aResult = [];
		foreach ($aTopArticles as $key => $value) {
			$aData = [];

			if(is_array($value)){
				foreach ($value as $key2 => $value2) {
				
					$content = html_entity_decode( $value2 );
					$content = preg_replace("/<img[^>]+\>/i", "", $content); 
					$aOut = [];

					if( $key2 == 'description'){
						if( preg_match_all("/<img[^>]+\>/i", html_entity_decode( $value2 ), $aOut) ){
							$aData[ 'image' ] = $aOut[0][0];//первая картинка 	
						}
					}

					$aData[$key2] = html_entity_decode( $content );
				}
				$aResult[] = $aData;
			}
		}
		$data['topnews'] = $aResult;
		//var_dump($data['topnews']); die();

		return $this->load->view('common/topnews', $data);
	}
}
