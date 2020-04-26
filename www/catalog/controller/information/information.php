<?php
class ControllerInformationInformation extends Controller {
	public function index() {

		$this->load->language('information/information');

		$this->load->model('catalog/information');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		if (isset($this->request->get['information_id'])) {
			$information_id = (int)$this->request->get['information_id'];
		} else {
			$information_id = 0;
		}
		
		$data['information_id'] = $information_id;
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
		$data['hint'] = '';
		/* start SEND MEFFAGE */
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && $this->validate()) {
			$sMyName = $this->request->post['myname'];
			$sMyPhone = $this->request->post['myphone'];
			$sMyMessage = $this->request->post['mymessage'];
			$sCaptcha = $this->request->post['g-recaptcha-response'];
			$data['hint'] = $this->language->get('text_send_success'); // . $sMyName . $sMyPhone . $sMyMessage;
			$this->load->model('catalog/review');
/*
INSERT INTO oc_review ( `product_id`, `customer_id`, `author`, `text`, `rating`, `status`, `date_added` ) VALUES (  997,  1, "обратная связь", "сообщение из формы обратной связи ", 5, 0, "2017-11-20 09:00:00" )
*/
			$aReviewData = ['customer_id' => 1, 'author' => $sMyName, 'text' => $sMyPhone . " \n<br>" . $sMyMessage, 'name' => $sMyName, 'rating' => 5, 'status' => 0, 'date_added' => date( "Y-m-d H:i:s",  time()) ];
			$this->model_catalog_review->addReview(997, $aReviewData);
		}
		/* end SEND MESSAGE */
		
		$information_info = $this->model_catalog_information->getInformation($information_id);
		if ($information_info) {
			$this->document->setTitle($information_info['meta_title']);
			$this->document->setDescription($information_info['meta_description']);
			$this->document->setKeywords($information_info['meta_keyword']);

			$data['breadcrumbs'][] = array(
				'text' => $information_info['title'],
				'href' => $this->url->link('information/information', 'information_id=' .  $information_id)
			);

			$data['heading_title'] = $information_info['title'];

			$data['description'] = html_entity_decode($information_info['description'], ENT_QUOTES, 'UTF-8');

			$data['continue'] = $this->url->link('common/home');

			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');
			$data['lang'] = $this->language->get('code');
			//var_dump($data['lang']); die();
			$this->response->setOutput($this->load->view('information/information', $data));
		} else {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('information/information', 'information_id=' . $information_id)
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

	public function validate(){
		$iResult = true;
		// google sekret key
		$sSecret = '6LfQiDkUAAAAAGdg5kC_vNfGHp6jdHS2o9TKfW6w';
		// form key
		// 6LfQiDkUAAAAANi3OjJ4mIRvPe3gv04PouEmd6hq
		$sMyName = $this->request->post['myname'];
		$sMyPhone = $this->request->post['myphone'];
		$sMyMessage = $this->request->post['mymessage'];

		if( strlen($sMyName) > 3 && strlen($sMyPhone) > 6 && strlen($sMyMessage)>10){
			$sCaptcha = $this->request->post['g-recaptcha-response'];
			$sUrl = 'https://www.google.com/recaptcha/api/siteverify';
			
	 		$ip = $_SERVER['REMOTE_ADDR'];
	 		$url_data = $sUrl.'?secret='.$sSecret.'&response='.$sCaptcha.'&remoteip='.$ip;
			$curl = curl_init();

			curl_setopt($curl,CURLOPT_URL,$url_data);
			curl_setopt($curl,CURLOPT_SSL_VERIFYPEER,FALSE);
			curl_setopt($curl,CURLOPT_RETURNTRANSFER,1);

			$res = curl_exec($curl);
			curl_close($curl);

			$res = json_decode($res);

			if($res->success) {
				$iResult = 1;
			}
			else {
				$iResult = 0;
			}

			return $iResult;
		} else {
			return 0;
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