<?php
class ControllerInformationDealers extends Controller {
	public function index() {

		$this->load->language('information/dealers');

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
			//echo "post and valid";
			$sMyName = $this->request->post['myname'];
			$sMyPhone = $this->request->post['myphone'];
			$sMyMessage = $this->request->post['mymessage'];
			$sCaptcha = $this->request->post['g-recaptcha-response'];
			$data['hint'] = $this->language->get('text_send_success'); // . $sMyName . $sMyPhone . $sMyMessage;
			$this->load->model('catalog/review');
			$aReviewData = ['customer_id' => 1, 'author' => $sMyName, 'text' => $sMyPhone . " \n<br>" . $sMyMessage, 'name' => $sMyName, 'rating' => 5, 'status' => 0, 'date_added' => date( "Y-m-d H:i:s",  time()) ];
			$this->model_catalog_review->addReview(997, $aReviewData);
			/* add captcha check and send mail  */
			switch($this->request->post['department']){ 
			case 0:
			    $s_department = 'любой';
			    break;
			case 1:
			    $s_department = 'Промышленный отдел';
			    break;
			case 2:
			    $s_department = 'Сельскохозяйственный отдел';
			    break;
			case 3:
			    $s_department = 'Медицинский отдел';
			    break;

			default:
			    $s_department = 'любой';
			    // break;	
			}
$s_message = '
<html><head><title>Заявка со страницы ДИЛЕР</title></head>
<body>
<div>
<p><strong>Поступил запрос от пользователя</strong>: ' . $sMyName . '</p>
<p><strong>Телефон для контакта:</strong> ' . $sMyPhone . '</p>
<p><strong>Cообщение:</strong> &nbsp;' . $sMyMessage . '</p>
<p><strong>Дата и время обращения:</strong> ' . date( "Y-m-d H:i:s" , time() + 3600 * 3 ) . '</p>
<p><strong>Вниманию отдела компании:</strong>&nbsp;' . $s_department . '</p>
<p>Это письмо отправлено со страницы ДИЛЕР и отвечать на него <b>не надо</b>.</p>
<p>Данные о запросе дублируются в архиве сайта, доступ к ним возможен из панели администратора.</p>
</div>
</body></html>';
// Для отправки HTML-письма должен быть установлен заголовок Content-type
$headers = "From: SpecSintez <mail@specsintez.com>.\r\n";
$headers .= "Reply-To: no-reply@specsintez.com";
$headers .= 'MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";
mail("Alexey <lazarlong@yandex.ru>, Sergey <scanner85@yandex.ru>, SpecSintez <mail.sintez@mail.ru>", date("Y-m-d H:i:s", time()+3600*3 ) . ": дилерский запрос ", $s_message, $headers  );
			$s_error_message = '';;

		}
		if (($this->request->server['REQUEST_METHOD'] == 'POST') && !$this->validate()) {
			//echo "post and not valid";
			$s_error_message = "Ошибка отправки сообщения";
		}
		//echo "check<br/>";
		/* end SEND MESSAGE */
		
		$this->document->setTitle( $this->language->get('heading_title') );
		$data['heading_title'] = $this->language->get('heading_title');

		$this->document->setDescription( $this->language->get('text_description') );
		$this->document->setKeywords( $this->language->get('text_keywords') );

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/dealers')
		);

		$data['continue'] = $this->url->link('common/home');
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');
		$data['lang'] = $this->language->get('code');
		//var_dump($data['lang']); die();
		$data['page_route'] = 'information/vacancy';


		$this->load->model('account/customer_group');

		if($this->customer->isLogged()) {
		    // echo "Customer is logged in and his ID is " . $this->customer->isLogged();
		    $data['user_id'] = $this->customer->isLogged();
		    $data['group_id'] = $this->customer->getGroupId();
			$data['group_name'] = $this->model_account_customer_group->getCustomerGroup( $this->customer->getGroupId() );
		    $data['username'] = $this->customer->getFirstName() . " " . $this->customer->getLastName();
		    //var_dump( $this->customer->getFirstName() );
		    //var_dump( get_class_methods($this->customer) );
		} else {
			$data['user_id'] = 0;
			$data['group_id'] = 0;
			$data['group_name'] = "";
			$data['username'] = "";		
		}

		//die();

		$this->response->setOutput($this->load->view('information/dealers', $data));
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
		$iDepartment = $this->request->post['department'];
		
		if( strlen($sMyName) > 3 && strlen($sMyPhone) > 6 && strlen($sMyMessage)>10 && $iDepartment!=0 ){
			
			$iResult = 0;

			$sCaptcha = '';
			if( array_key_exists('g-recaptcha-response', $this->request->post)){
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
