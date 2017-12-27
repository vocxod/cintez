<?php
class ControllerInformationOnenews extends Controller {
	public function index() {
		$this->load->language('information/onenews');

		$this->load->model('catalog/information');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('information/newslist')
		);

		if (isset($this->request->get['information_id'])) {
			$information_id = (int)$this->request->get['information_id'];
		} else {
			$information_id = 0;
		}
		
		$data['information_id'] = $information_id;
		
		$this->load->model('catalog/information');
		$is_news = $this->model_catalog_information->getInformation( $information_id );
		$aResult = [];
		
		if($is_news){
			$aData = [];
			foreach ($is_news as $key => $value) {
		
				$content = html_entity_decode( $value );
				/*
				$content = preg_replace("/<img[^>]+\>/i", "", $content); 
				*/
				$aOut = [];
				
				if( $key == 'description'){
					$aData[$key] = html_entity_decode( $content );
					
					if( preg_match_all("/<img[^>]+\>/i", html_entity_decode( $value ), $aOut) ){
						//var_dump($aOut);
						$aData[ 'image' ] = $aOut[0][0];//первая картинка
						//$aData[''] = html_entity_decode( $content );
					}
				} else {
					$aData[$key] = html_entity_decode( $content );	
				}
			}	
			$aResult = $aData;		
		}
		/* */
		$data['is_new'] = $aResult;
		file_put_contents('fname.txt', ( $data['is_new']['description'] ) ); 

		if ( $aResult ) {
			/* @todo fix it */
			$this->document->setTitle('meta_title');
			$this->document->setDescription('meta_description');
			$this->document->setKeywords('meta_keyword');
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('heading_title'),
				'href' => $this->url->link('information/onenews' . '') //@TODO!!!
			);
			$data['breadcrumbs'][] = array(
				'text' => $aResult['title'], //@TODO from meta (url)
				'href' => $this->url->link('information/onenews' . '?information=' . $information_id) //@TODO!!!
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
			// забираем новости
			$data['topnews'] = $this->load->controller('common/topnews', ['news'=>8] );
			// новости забираем
			// ренднрим страницу данными на шаблоне
			$aResult = $this->load->view('information/onenews', $data);
			// отдаем в браузер
			$this->response->setOutput( $aResult );
		} else {
			// избыточный код
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('information/onenews', 'information_id=' . $information_id)
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
		$this->load->model('catalog/information');

		if (isset($this->request->get['information_id'])) {
			$information_id = (int)$this->request->get['information_id'];
		} else {
			$information_id = 0;
		}

		$output = '';

		$information_info = $this->model_catalog_information->getInformation($information_id);

		if ($information_info) {
			$output .= html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8') . "\n";
		}

		$this->response->setOutput($output);
	}
}