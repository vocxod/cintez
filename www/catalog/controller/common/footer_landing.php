<?php
class ControllerCommonFooterLanding extends Controller {
	public function index() {
		
		$this->load->language('common/footer');

		$this->load->model('catalog/information');

		$data['informations'] = array();

		foreach ($this->model_catalog_information->getInformations() as $result) {
			if ($result['bottom']) {
				$data['informations'][] = array(
					'title' => $result['title'],
					'href'  => $this->url->link('information/information', 'information_id=' . $result['information_id'])
				);
			}
		}

		// logo
		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}
		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}
		// cities
		$data['zone'] = $this->load->controller('common/zone/footer');
		//var_dump($data['zone']); die();

		$data['contact'] = $this->url->link('information/contact');
		$data['return'] = $this->url->link('account/return/add', '', true);
		$data['sitemap'] = $this->url->link('information/sitemap');
		$data['tracking'] = $this->url->link('information/tracking');
		$data['manufacturer'] = $this->url->link('product/manufacturer');
		$data['voucher'] = $this->url->link('account/voucher', '', true);
		$data['affiliate'] = $this->url->link('affiliate/login', '', true);
		$data['special'] = $this->url->link('product/special');
		$data['account'] = $this->url->link('account/account', '', true);
		$data['order'] = $this->url->link('account/order', '', true);
		$data['wishlist'] = $this->url->link('account/wishlist', '', true);
		$data['newsletter'] = $this->url->link('account/newsletter', '', true);
		
		$data['lang'] = $this->language->get('code');

		$data['powered'] = sprintf($this->language->get('text_powered'), $this->config->get('config_name'), date('Y', time()));

		// Whos Online
		if ($this->config->get('config_customer_online')) {
			$this->load->model('tool/online');

			if (isset($this->request->server['REMOTE_ADDR'])) {
				$ip = $this->request->server['REMOTE_ADDR'];
			} else {
				$ip = '';
			}

			if (isset($this->request->server['HTTP_HOST']) && isset($this->request->server['REQUEST_URI'])) {
				$url = ($this->request->server['HTTPS'] ? 'https://' : 'http://') . $this->request->server['HTTP_HOST'] . $this->request->server['REQUEST_URI'];
			} else {
				$url = '';
			}

			if (isset($this->request->server['HTTP_REFERER'])) {
				$referer = $this->request->server['HTTP_REFERER'];
			} else {
				$referer = '';
			}

			$this->model_tool_online->addOnline($ip, $this->customer->getId(), $url, $referer);
		}
		$data['current_zone'] = $this->session->data['current_zone']; 
		$data['scripts'] = $this->document->getScripts('footer');
		
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
		
		return $this->load->view('common/footer_landing', $data);
	}
}
