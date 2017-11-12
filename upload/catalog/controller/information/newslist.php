<?php
class ControllerInformationNewslist extends Controller {
	public function index() {
		$this->load->language('information/newslist');

		$this->load->model('catalog/information');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('information/newslist')
		);
/*
		if (isset($this->request->get['information_id'])) {
			$information_id = (int)$this->request->get['information_id'];
		} else {
			$information_id = 0;
		}
		
		$data['information_id'] = $information_id;
		*/

		/* получить нужные данные для формирования последних новостей из шаблона */
		$aDataNews['heading_title'] = "Последние новости";  
		$this->load->model('catalog/information');
		$top_news = $this->model_catalog_information->getTopNews();
		$aResult = [];
		foreach ($top_news as $key => $value) {
			$aData = [];
			if(is_array($value)){
				foreach ($value as $key2 => $value2) {
					$aData[$key2] = html_entity_decode( $value2 );
				}
				$aResult[] = $aData;
			}
		}
		$aDataNews['top_news'] = $aResult;
		/* */
		$data['newslatest'] = $this->load->view( 'extension/module/newslatest', $aDataNews );
		//var_dump( $data['newslatest'] ); die();

		//$information_info = $this->model_catalog_information->getInformation($information_id);

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
			
			// ренднрим страницу данными на шаблоне
			$aResult = $this->load->view('information/newslist', $data);
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