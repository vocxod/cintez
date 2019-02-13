<?php

class ControllerInformationLanding extends Controller {
	public function index() {

        

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
        $this->document->setTitle('Триосепт Эндо');
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
        $data['footer_landing'] = $this->load->controller('common/footer_landing');
        $data['header'] = $this->load->controller('common/header_landing');
	// забираем поля формы 
   	if(isset($this->request->post['offer_name']) && $this->request->post['offer_name'] != "" ){
		$data["offer_name"] = $this->request->post['offer_name']; 
	} else {
		$data["offer_name"] = ""; 
	}	
	if(isset($this->request->post['offer_phone']) && $this->request->post['offer_phone'] != "" ){
		$data["offer_phone"] = $this->request->post['offer_phone']; 
	} else {
		$data["offer_phone"] = ""; 
	}	
	if(isset($this->request->post['offer_comment']) && $this->request->post['offer_comment'] != "" ){
		$data["offer_comment"] = $this->request->post['offer_comment']; 
	} else {
		$data["offer_comment"] = ""; 
	}		
	;
	if (isset($this->request->post['offer_submit'])) {
		$data["send_form"] = "<p class=''>Ваше сообщение успешно отправлено.</p>";
		$s_message = '
<html><head><title>Новый запрос предложения</title></head>
<body><div><p>' . "<strong>Поступил новый запрос от:</strong> " . $data["offer_name"] . "\r\n <br/><strong>Телефон:</strong> " . $data["offer_phone"] . "\r\n<br/><strong>Комментарий пользователя:</strong> " . $data["offer_comment"] . '</p></div></body></html>';

// Для отправки HTML-письма должен быть установлен заголовок Content-type
$headers  = 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";

		mail("lazarlong@yandex.ru", date("Y-m-d H:i:s", time() + 3600 * 3 ) . " Запрос SPECSINTEZ.COM", $s_message, $headers  );
		$data["offer_name"] = "";
		$data["offer_phone"] = "";
		$data["offer_comment"] = "";
	} else {
		$data["send_form"] = ""; // "<p>Заполните поля формы и нажмите кнопку Отправить</p>";
	}
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
