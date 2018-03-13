<?php
class ControllerInformationArticlelist extends Controller {
	public function index() {
		$this->load->language('information/articlelist');

		$this->load->model('catalog/information');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('information/newslist')
		);

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		if (isset($this->request->get['limit'])) {
			$iLimit = (int)$this->request->get['limit'];
		} else {
			$iLimit = 20;
		}

		$iLimit = 12;

		$iOffset = ( $page - 1 ) * $iLimit;

		/* получить нужные данные для формирования последних новостей из шаблона */
 
		$this->load->model('catalog/information');
		$top_news = $this->model_catalog_information->getTopArticles( $iOffset, $iLimit );
		$aResult = [];
		foreach ($top_news as $key => $value) {
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
		$aDataNews['top_news'] = $aResult;
		/* */
		$data['top_news'] = $aResult;

		if ( $aResult ) {
			/* @todo fix it */
			$this->document->setTitle('meta_title');
			$this->document->setDescription('meta_description');
			$this->document->setKeywords('meta_keyword');

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('information/newslist')
			);

			$data['heading_title'] = $this->language->get('heading_title');

			$data['description'] = ''; //html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8');
			
			//$data['continue'] = $this->url->link('common/home');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');
			$data['topnews'] = $this->load->controller('common/topnews', ['news'=>8] );

			// расставим страницу 
			$pagination = new Pagination();
			$product_total = $this->model_catalog_information->getArticlesCount();
			$pagination->total = $product_total;
			$pagination->page = $page;
			$pagination->limit = $iLimit;
			$pagination->url = $this->url->link('information/articlelist', '&page={page}');
			$data['pagination'] = $pagination->render();

			// ренднрим страницу данными на шаблоне
			$aResult = $this->load->view('information/articlelist', $data);
			// отдаем в браузер
			$this->response->setOutput( $aResult );
		} else {
			// избыточный код
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('information/newslist', 'information_id=' . $information_id)
			);

			$this->document->setTitle($this->language->get('text_error'));

			$data['heading_title'] = $this->language->get('text_error');

			$data['text_error'] = $this->language->get('text_error');

			$data['continue'] = $this->url->link('common/home');

			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$this->response->setOutput($this->load->view('error/not_found', $data));
		}
	}

	public function agree() {

	}
}