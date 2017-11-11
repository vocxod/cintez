<?php
class ControllerInformationProductselection extends Controller {
	private $error = array();

	public function index() {
		$this->load->language('information/productselection');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/productselection')
		);
/*
		if (isset($this->error['name'])) {
			$data['error_name'] = $this->error['name'];
		} else {
			$data['error_name'] = '';
		}

		if (isset($this->error['email'])) {
			$data['error_email'] = $this->error['email'];
		} else {
			$data['error_email'] = '';
		}

		if (isset($this->error['enquiry'])) {
			$data['error_enquiry'] = $this->error['enquiry'];
		} else {
			$data['error_enquiry'] = '';
		}
*/
		$data['button_submit'] = $this->language->get('button_submit');

		$data['action'] = $this->url->link('information/productselection', '', true);

		$this->load->model('tool/image');
/*
		if ($this->config->get('config_image')) {
			$data['image'] = $this->model_tool_image->resize($this->config->get('config_image'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_location_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_location_height'));
		} else {
			$data['image'] = false;
		}
*/

		/* 
		$data['store'] = $this->config->get('config_name');
		$data['address'] = nl2br($this->config->get('config_address'));
		$data['geocode'] = $this->config->get('config_geocode');
		$data['geocode_hl'] = $this->config->get('config_language');
		$data['telephone'] = $this->config->get('config_telephone');
		$data['fax'] = $this->config->get('config_fax');
		$data['open'] = nl2br($this->config->get('config_open'));
		$data['comment'] = $this->config->get('config_comment');

		$data['locations'] = array();

		$this->load->model('localisation/location');

		foreach((array)$this->config->get('config_location') as $location_id) {
			$location_info = $this->model_localisation_location->getLocation($location_id);

			if ($location_info) {
				if ($location_info['image']) {
					$image = $this->model_tool_image->resize($location_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_location_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_location_height'));
				} else {
					$image = false;
				}

				$data['locations'][] = array(
					'location_id' => $location_info['location_id'],
					'name'        => $location_info['name'],
					'address'     => nl2br($location_info['address']),
					'geocode'     => $location_info['geocode'],
					'telephone'   => $location_info['telephone'],
					'fax'         => $location_info['fax'],
					'image'       => $image,
					'open'        => nl2br($location_info['open']),
					'comment'     => $location_info['comment']
				);
			}
		}

		if (isset($this->request->post['name'])) {
			$data['name'] = $this->request->post['name'];
		} else {
			$data['name'] = $this->customer->getFirstName();
		}

		if (isset($this->request->post['email'])) {
			$data['email'] = $this->request->post['email'];
		} else {
			$data['email'] = $this->customer->getEmail();
		}

		if (isset($this->request->post['enquiry'])) {
			$data['enquiry'] = $this->request->post['enquiry'];
		} else {
			$data['enquiry'] = '';
		}
*/

		// Captcha
		/*
		if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('contact', (array)$this->config->get('config_captcha_page'))) {
			$data['captcha'] = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha'), $this->error);
		} else {
			$data['captcha'] = '';
		}
*/
		/*
		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		*/
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		/* получаем контент страницы ID=5  */
		/*
		$data['information_id'] = 5;
		$this->load->model('catalog/information');
		$contact_content = $this->model_catalog_information->getInformation( $data['information_id'] );
		$data['contact_content'] = html_entity_decode($contact_content['description']);
		$published = $this->model_catalog_information->getNewsList( 4 );
		$data['published'] = $published;
		*/

		/* @TODO вогнать в БД и там редактировать сии штучки */
		$aDetails = 
		[
		"ru"=>
			[ 
				["title"=>"Объем емкости для погружения ИМН", "subtitle"=>"V емк, л",
					"fields" => [
						["title"=>"", "type"=>"input"]
					]
				],
				["title"=>"Количество емкостей для погружения", "subtitle"=>"N емк",
					"fields" => [
						["title"=>"", "type"=>"input"]
					]
				],
				["title"=>"Режим обработки", "subtitle"=>"", 
					"fields"=>[  
								["title" => "Бактерии", "type"=>"checkbox", "value" => "1" ], 
								["title" => "Viruses", "type"=>"checkbox", "value" => "2" ], 
								["title" => "Кандида", "type"=>"checkbox", "value" => "3" ], 
								["title" => "Дерматофин", "type"=>"checkbox", "value" => "4" ], 
								["title" => "Микобактерия туберкулеза", "type"=>"checkbox", "value" => "4" ] 
							] 
				],
				["title"=>"Желаемое время экспозиции", "subtitle"=>"t, мин",
					"fields" => [
						["title"=>"", "type"=>"input"]
					]
				],
				["title"=>"Количество суток в расчетном периоде", "subtitle"=>"С, сут",
					"fields" => [
						["title"=>"", "type"=>"input"]
				]
				], 
			],
		"en"=>
			[ 
				["title"=>"eОбъем емкости для погружения ИМН", "subtitle"=>"V емк, л",
					"fields" => [
						["title"=>"", "type"=>"input"]
					]
				],
				["title"=>"eКоличество емкостей для погружения", "subtitle"=>"N емк",
					"fields" => [
						["title"=>"", "type"=>"input"]
					]
				],
				["title"=>"eРежим обработки", "subtitle"=>"", 
					"fields"=>[  
								["title" => "eБактерии", "type"=>"checkbox", "value" => "1" ], 
								["title" => "eViruses", "type"=>"checkbox", "value" => "2" ], 
								["title" => "eКандида", "type"=>"checkbox", "value" => "3" ], 
								["title" => "eДерматофин", "type"=>"checkbox", "value" => "4" ], 
								["title" => "eМикобактерия туберкулеза", "type"=>"checkbox", "value" => "4" ] 
							] 
				],
				["title"=>"eЖелаемое время экспозиции", "subtitle"=>"t, мин",
					"fields" => [
						["title"=>"", "type"=>"input"]
					]
				],
				["title"=>"eКоличество суток в расчетном периоде", "subtitle"=>"С, сут",
					"fields" => [
						["title"=>"", "type"=>"input"]
				]
				], 
			]	
		];
		$this->load->model('catalog/category');
		$aCategories = $this->model_catalog_category->getCategories(0);
		$iLen = count( $aCategories ) / 2;
		//var_dump($aCategories); die();
		$data['categories_left'] =  array_slice( $aCategories, 0, $iLen );
		$data['categories_right'] =  array_slice( $aCategories, $iLen );
		$data['details'] = $aDetails[ $this->language->get('code') ] ;	
		$data['filtered_products'] = $this->load->controller('product/filtered/index', ['path'=>'127'] ); 
		$this->response->setOutput($this->load->view('information/productselection', $data));
	}

	// @TODO отменим работу этой функции, здесь у нас только поиск
	protected function validate() {
		return true;
		/*
		if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 32)) {
			$this->error['name'] = $this->language->get('error_name');
		}

		if (!filter_var($this->request->post['email'], FILTER_VALIDATE_EMAIL)) {
			$this->error['email'] = $this->language->get('error_email');
		}

		if ((utf8_strlen($this->request->post['enquiry']) < 10) || (utf8_strlen($this->request->post['enquiry']) > 3000)) {
			$this->error['enquiry'] = $this->language->get('error_enquiry');
		}

		// Captcha
		if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('contact', (array)$this->config->get('config_captcha_page'))) {
			$captcha = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha') . '/validate');

			if ($captcha) {
				$this->error['captcha'] = $captcha;
			}
		}
		return !$this->error;
		*/
	}

	/**
	* for LS скрипта - отрисовываем контент, отдаем его в JS тот выводит его в партиале
	* 
	*/
	public function success() {
		
		$this->load->language('information/contact');

		$this->document->setTitle($this->language->get('heading_title'));

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('heading_title'),
			'href' => $this->url->link('information/productselection', '', true)
		);

		$data['continue'] = $this->url->link('common/home');

		$data['column_left'] = $this->load->controller('common/column_left');
		$data['column_right'] = $this->load->controller('common/column_right');
		$data['content_top'] = $this->load->controller('common/content_top');
		$data['content_bottom'] = $this->load->controller('common/content_bottom');
		$data['footer'] = $this->load->controller('common/footer');
		$data['header'] = $this->load->controller('common/header');

		$this->response->setOutput($this->load->view('common/success', $data));

	}
}
