<?php
class ControllerAccountApproved extends Controller {
	private $error = array();

	public function index() {
		if ($this->customer->isLogged()) {
			$this->response->redirect($this->url->link('account/account', '', true));
		}

		$this->load->language('account/forgotten');

		$this->document->setTitle( "Активация аккаунта" );

		$this->load->model('account/customer');

		$i_result = 1;

		if ( $this->request->server['REQUEST_METHOD'] == 'GET' && array_key_exists( 'route', $this->request->get ) && $this->request->get['route'] == 'account/approved' ) {
			// var_dump( $this->request) ; die();
			//$this->model_account_customer->editCode($this->request->post['email'], token(40));
			if( array_key_exists('access_token', $this->request->get) && array_key_exists( 'email', $this->request->get ) && array_key_exists( 'telephone', $this->request->get ) && array_key_exists( 'customer_group_id', $this->request->get ) ) 
			{
				$access_token = $this->request->get['access_token'];
				//die("1");
				if( $access_token == md5( "Apple1976" . $this->request->get['email'] . $this->request->get['telephone'] ) )
				{
					//die("2");
					$i_result = $this->model_account_customer->approve( 
						$access_token, 
						$this->request->get['email'], 
						$this->request->get['telephone'], 
						$this->request->get['customer_group_id'] 
					);
				} else {
				      //var_dump( $access_token . "[]" . md5( "Apple1976" . $this->request->get['email'] . $this->request->get['telephone']) );
				      //die("3");	
				}
			}
		        $this->session->data['success'] = $this->language->get('text_success');
			//$this->response->redirect($this->url->link('account/login', '', true));
		}

		if( 
			array_key_exists('access_token', $this->request->get) && 
			array_key_exists( 'email', $this->request->get ) && 
			array_key_exists( 'telephone', $this->request->get ) && 
			array_key_exists( 'customer_group_id', $this->request->get ) ) 
		{
			$data['i_result'] = $i_result . "[" . $access_token . "]" . md5( "Apple1976" . $this->request->get['email'] . $this->request->get['telephone'] ) ;
		} else {
			$data['i_result'] = '000';
		}

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => "Управление аккаунтом",
			'href' => "", //$this->url->link('account/account', '', true)
		);

		$data['breadcrumbs'][] = array(
			'text' => "Активация",
			'href' => "", //$this->url->link('account/approved', '', true)
		);

		if (isset($this->error['warning'])) {
			$data['error_warning'] = $this->error['warning'];
		} else {
			$data['error_warning'] = '';
		}

		$data['action'] = $this->url->link('account/approved', '', true);

		$data['back'] = $this->url->link('account/login', '', true);

		if (isset($this->request->post['email'])) {
			$data['email'] = $this->request->post['email'];
		} else {
			$data['email'] = '';
		}

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('account/approved', $data));
	}

	protected function validate() {
		if (!isset($this->request->post['email'])) {
			$this->error['warning'] = $this->language->get('error_email');
		} elseif (!$this->model_account_customer->getTotalCustomersByEmail($this->request->post['email'])) {
			$this->error['warning'] = $this->language->get('error_email');
		}
		
		// Check if customer has been approved.
		$customer_info = $this->model_account_customer->getCustomerByEmail($this->request->post['email']);

		if ($customer_info && !$customer_info['status']) {
			$this->error['warning'] = $this->language->get('error_approved');
		}

		return !$this->error;
	}
}
