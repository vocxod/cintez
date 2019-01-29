<?php

class ControllerInformationLanding extends Controller {
	public function index() {

        // die("landing");

        $this->load->language('information/onenews');

		$this->load->model('catalog/information');

		$data['breadcrumbs'] = array();
        // @todo - kill
		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('information/newslist')
		);

        // @todo - think about need id item
		if (isset($this->request->get['information_id'])) {
			$information_id = (int)$this->request->get['information_id'];
		} else {
			$information_id = 0;
		}
		
		$data['information_id'] = $information_id;
		
		$this->load->model('catalog/information');
		$is_news = $this->model_catalog_information->getInformation( $information_id );
		$aResult = [];
		
        // file_put_contents('fname.txt', ( $data['is_new']['description'] ) ); 

        /* @todo fix it */
        $this->document->setTitle('Триосепт Эндр');
        $this->document->setDescription('Триосепт Эндо');
        $this->document->setKeywords('триосепт эндо,');
        $data['breadcrumbs'][] = array(
            'text' => "Новости", //$this->language->get('heading_title'),
            'href' => $this->url->link('information/neoitems' . '') //@TODO!!!
        );
        /*
        $data['breadcrumbs'][] = array(
            'text' => $aResult['title'], //@TODO from meta (url)
            'href' => $this->url->link('information/onenews' . '?information=' . $information_id) //@TODO!!!
        );
         */        

        $data['heading_title'] = $this->language->get('heading_title');

        $data['description'] = ''; //html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8');
        
        //$data['continue'] = $this->url->link('common/home');

        $data['column_left'] = $this->load->controller('common/column_left');
        $data['column_right'] = $this->load->controller('common/column_right');
        $data['content_top'] = $this->load->controller('common/content_top');
        $data['content_bottom'] = $this->load->controller('common/content_bottom');
        $data['footer'] = $this->load->controller('common/footer');
        $data['header'] = $this->load->controller('common/header_landing');
        // забираем новости
        //var_dump( $information_id );
        // $data['topnews'] = $this->load->controller('common/topnews', ['news'=>8, 'without'=>$information_id] );
        // новости забираем
        // ренднрим страницу данными на шаблоне
        $aResult = $this->load->view('information/landing', $data);
        // отдаем в браузер
        $this->response->setOutput( $aResult );

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
