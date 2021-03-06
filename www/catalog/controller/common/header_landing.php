<?php
class ControllerCommonHeaderLanding extends Controller {
	public function index($aOption=[]) {

		// Analytics
		$this->load->model('setting/extension');

		$data['analytics'] = array();

		$analytics = $this->model_setting_extension->getExtensions('analytics');

		foreach ($analytics as $analytic) {
			if ($this->config->get('analytics_' . $analytic['code'] . '_status')) {
				$data['analytics'][] = $this->load->controller('extension/analytics/' . $analytic['code'], $this->config->get('analytics_' . $analytic['code'] . '_status'));
			}
		}

		if ($this->request->server['HTTPS']) {
			$server = $this->config->get('config_ssl');
		} else {
			$server = $this->config->get('config_url');
		}

		if (is_file(DIR_IMAGE . $this->config->get('config_icon'))) {
			$this->document->addLink($server . 'image/' . $this->config->get('config_icon'), 'icon');
		}

		if( count($aOption) > 0 && array_key_exists('yamap', $aOption) ){
			$data['yamap'] = $aOption['yamap'];
		}

		$data['title'] = $this->document->getTitle();

		$data['base'] = $server;
		$data['description'] = $this->document->getDescription();
		$data['keywords'] = $this->document->getKeywords();
		$data['links'] = $this->document->getLinks();
		$data['styles'] = $this->document->getStyles();
		$data['scripts'] = $this->document->getScripts('header');
		$data['lang'] = $this->language->get('code');
		$data['direction'] = $this->language->get('direction');

		$data['name'] = $this->config->get('config_name');

		//var_dump( DIR_IMAGE . $this->config->get('config_logo') ); die();

		if (is_file(DIR_IMAGE . $this->config->get('config_logo'))) {
			$data['logo'] = $server . 'image/' . $this->config->get('config_logo');
		} else {
			$data['logo'] = '';
		}

		$this->load->language('common/header');

		// Wishlist
		if ($this->customer->isLogged()) {
			$this->load->model('account/wishlist');

			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), $this->model_account_wishlist->getTotalWishlist());
		} else {
			$data['text_wishlist'] = sprintf($this->language->get('text_wishlist'), (isset($this->session->data['wishlist']) ? count($this->session->data['wishlist']) : 0));
		}

		$data['text_logged'] = sprintf($this->language->get('text_logged'), $this->url->link('account/account', '', true), $this->customer->getFirstName(), $this->url->link('account/logout', '', true));
		
		$data['home'] = $this->url->link('common/home');
		$data['wishlist'] = $this->url->link('account/wishlist', '', true);
		$data['logged'] = $this->customer->isLogged();
		$data['account'] = $this->url->link('account/account', '', true);
		$data['register'] = $this->url->link('account/register', '', true);
		$data['login'] = $this->url->link('account/login', '', true);
		$data['order'] = $this->url->link('account/order', '', true);
		$data['transaction'] = $this->url->link('account/transaction', '', true);
		$data['download'] = $this->url->link('account/download', '', true);
		$data['logout'] = $this->url->link('account/logout', '', true);
		$data['shopping_cart'] = $this->url->link('checkout/cart');
		$data['checkout'] = $this->url->link('checkout/checkout', '', true);
		$data['contact'] = $this->url->link('information/contact');
		$data['telephone'] = $this->config->get('config_telephone');
		
		$data['language'] = $this->load->controller('common/language');
		$data['currency'] = $this->load->controller('common/currency');
		
		// scard
		$data['zone'] = $this->load->controller('common/zone');
		$data['vacancy'] = $this->url->link('information/information&information_id=7');
		//$data['vacancy'] = $this->url->link('information/information&information_id=7');
		
		$data['search'] = $this->load->controller('common/search');
		$data['cart'] = $this->load->controller('common/cart');
		$data['menu'] = $this->load->controller('common/menu');

		$sRoute = ['route' => 'information/partners' ];

		$data['menu_top_landing'] = $this->load->controller('common/menu_top_landing', $sRoute );

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
        //die("header_landing");
		return $this->load->view('common/header_landing', $data);
	}
}
