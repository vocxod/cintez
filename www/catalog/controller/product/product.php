<?php
class ControllerProductProduct extends Controller {
	private $error = array();

	public function review2(  ) {
		
		$data = [];

		if (isset($this->request->get['product_id'])) {
			$i_product_id = $this->request->get['product_id'];
		} else {
			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');
			$this->response->setOutput($this->load->view('error/not_found', $data));
			return;
		}

		if (isset($this->request->get['doctype'])) {
			$s_doc_type= $this->request->get['doctype'];

		} else {
			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');
			// $this->response->setOutput($this->load->view('error/not_found', [] ) );
			$this->response->setOutput('<h1>Отсутствует тип документа!</h1>');
			return;
		}

		$this->load->language('product/product');
		$this->load->model('catalog/review');

		$this->load->model('catalog/product');
		$this->load->model('account/customer_group');
		if($this->customer->isLogged()) {
		    // echo "Customer is logged in and his ID is " . $this->customer->isLogged();
		    $data['user_id'] = $this->customer->isLogged();
		    $data['group_id'] = $this->customer->getGroupId();
			$data['usergroup'] = $this->model_account_customer_group->getCustomerGroup( $this->customer->getGroupId() );
		    $data['username'] = $this->customer->getFirstName() . " " . $this->customer->getLastName();
		    
			if( $data['usergroup']['name'] == 'Дилер' ){
    			$data['documents'] = $this->model_catalog_product->getDocuments( $i_product_id );
    			if(count($data['documents'])>0){
    				// находим документ по типу s_doc_type
    				// var_dump( $data['documents'] ); die();
    				$s_downloadfile = '';
    				foreach ($data['documents'] as $a_item) {
    					if( $a_item['mask'] == $i_product_id . '_' . $s_doc_type . '.pdf' ){
    						$s_downloadfile = $a_item['filename'];
    					}
    				}
    				// echo getcwd() . "\n";
    				if( !file_exists( getcwd() . "/../" . "storage/download/" . $s_downloadfile ) ){
    					$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');
						$this->response->setOutput( '<h1>Документ не обнаружен!</h1>' );
						return;
    				}
    				//var_dump( $s_downloadfile ); die();

					$file = "product.pdf";

					// die("File not found");
					// Force the download
					header("Content-Disposition: attachment; filename=" . basename($file) . " ");
					header("Content-Length: " . filesize( getcwd() . "/../" . "storage/download/" . $s_downloadfile ));
					header("Content-Type: application/octet-stream;");
					readfile( getcwd() . "/../" . "storage/download/" . $s_downloadfile );			    				
    			} else {
					$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');
					$this->response->setOutput( '<h1>Запрашиваемый документ не найден</h1>' );
					return;
    			}

			}
		} else {
			$this->response->addHeader($this->request->server['SERVER_PROTOCOL'] . ' 404 Not Found');
			$this->response->setOutput( '<h1>Документация доступна только зарегистрированным пользователям</h1>' );
			return;
		}
/*
		$data['reviews'] = array();
		$review_total = $this->model_catalog_review->getTotalReviewsByProductId($this->request->get['product_id']);
		$results = $this->model_catalog_review->getReviewsByProductId($this->request->get['product_id'], ($page - 1) * 5, 5);
		foreach ($results as $result) {
			$data['reviews'][] = array(
				'author'     => $result['author'],
				'text'       => nl2br($result['text']),
				'rating'     => (int)$result['rating'],
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			);
		}

		$pagination = new Pagination();
		$pagination->total = $review_total;
		$pagination->page = $page;
		$pagination->limit = 5;
		$pagination->url = $this->url->link('product/product/review', 'product_id=' . $this->request->get['product_id'] . '&page={page}');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($review_total) ? (($page - 1) * 5) + 1 : 0, ((($page - 1) * 5) > ($review_total - 5)) ? $review_total : ((($page - 1) * 5) + 5), $review_total, ceil($review_total / 5));

		$this->response->setOutput($this->load->view('product/review', $data));
*/
	}

	public function index() {
		$this->load->language('product/product');

		$data['breadcrumbs'] = array();

		$data['breadcrumbs'][] = array(
			'text' => $this->language->get('text_home'),
			'href' => $this->url->link('common/home')
		);

		$this->load->model('catalog/category');

		if (isset($this->request->get['path'])) {
			$path = '';

			$parts = explode('_', (string)$this->request->get['path']);

			$category_id = (int)array_pop($parts);

			foreach ($parts as $path_id) {
				if (!$path) {
					$path = $path_id;
				} else {
					$path .= '_' . $path_id;
				}

				$category_info = $this->model_catalog_category->getCategory($path_id);

				if ($category_info) {
					$data['breadcrumbs'][] = array(
						'text' => $category_info['name'],
						'href' => $this->url->link('product/category', 'path=' . $path)
					);
				}
			}

			// Set the last category breadcrumb
			$category_info = $this->model_catalog_category->getCategory($category_id);

			if ($category_info) {
				$url = '';

				if (isset($this->request->get['sort'])) {
					$url .= '&sort=' . $this->request->get['sort'];
				}

				if (isset($this->request->get['order'])) {
					$url .= '&order=' . $this->request->get['order'];
				}

				if (isset($this->request->get['page'])) {
					$url .= '&page=' . $this->request->get['page'];
				}

				if (isset($this->request->get['limit'])) {
					$url .= '&limit=' . $this->request->get['limit'];
				}

				$data['breadcrumbs'][] = array(
					'text' => $category_info['name'],
					'href' => $this->url->link('product/category', 'path=' . $this->request->get['path'] . $url)
				);
			}
		}

		$this->load->model('catalog/manufacturer');

		if (isset($this->request->get['manufacturer_id'])) {
			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_brand'),
				'href' => $this->url->link('product/manufacturer')
			);

			$url = '';

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$manufacturer_info = $this->model_catalog_manufacturer->getManufacturer($this->request->get['manufacturer_id']);

			if ($manufacturer_info) {
				$data['breadcrumbs'][] = array(
					'text' => $manufacturer_info['name'],
					'href' => $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $this->request->get['manufacturer_id'] . $url)
				);
			}
		}

		if (isset($this->request->get['search']) || isset($this->request->get['tag'])) {
			$url = '';

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_search'),
				'href' => $this->url->link('product/search', $url)
			);
		}

		if (isset($this->request->get['product_id'])) {
			$product_id = (int)$this->request->get['product_id'];
		} else {
			$product_id = 0;
		}

		$this->load->model('catalog/product');

		$product_info = $this->model_catalog_product->getProduct($product_id);

		if ($product_info) {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $product_info['name'],
				'href' => $this->url->link('product/product', $url . '&product_id=' . $this->request->get['product_id'])
			);

			$this->document->setTitle($product_info['meta_title']);
			$this->document->setDescription($product_info['meta_description']);
			$this->document->setKeywords($product_info['meta_keyword']);
			$this->document->addLink($this->url->link('product/product', 'product_id=' . $this->request->get['product_id']), 'canonical');
			$this->document->addScript('catalog/view/javascript/jquery/magnific/jquery.magnific-popup.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/magnific/magnific-popup.css');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment.min.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/moment/moment-with-locales.min.js');
			$this->document->addScript('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.js');
			$this->document->addStyle('catalog/view/javascript/jquery/datetimepicker/bootstrap-datetimepicker.min.css');

			$data['heading_title'] = $product_info['name'];

			$data['text_minimum'] = sprintf($this->language->get('text_minimum'), $product_info['minimum']);
			$data['text_login'] = sprintf($this->language->get('text_login'), $this->url->link('account/login', '', true), $this->url->link('account/register', '', true));

			$this->load->model('catalog/review');

			$data['tab_review'] = sprintf($this->language->get('tab_review'), $product_info['reviews']);

			$data['product_id'] = (int)$this->request->get['product_id'];
			$data['manufacturer'] = $product_info['manufacturer'];
			$data['manufacturers'] = $this->url->link('product/manufacturer/info', 'manufacturer_id=' . $product_info['manufacturer_id']);
			$data['model'] = $product_info['model'];
			$data['reward'] = $product_info['reward'];
			$data['points'] = $product_info['points'];
			$s_page = html_entity_decode($product_info['description'], ENT_QUOTES, 'UTF-8');
			
			/* анализируем хвост описания */
			/*
			$s_pattern = '|<!-- /url/(.*) -->(.*)<!-- /url/ -->|Uis';		
			$a_out = [];
			$s_part = '';
			if( preg_match_all($s_pattern, $s_page, $a_out)){
				foreach ($a_out[1] as $key => $s_tag) {
					$s_replace_pattern = "|<!-- /url/" . $s_tag . " -->(.*)<!-- /url/ -->|Uis";
					// формируем ссылки из тегов	
					$a_part = explode(";", $a_out[2][$key]);
					$s_new_url = '';
					foreach ($a_part as $s_source) {
						//echo $s_source . "<br/>";
						$s_slug = $this->model_catalog_product->slugify( $s_source );
						$s_new_url .= '<a href="/'.$s_tag.'/' . $s_slug . '">' . $s_source . '&nbsp;</a>';
						if( $s_slug != ""){
							$i_result = $this->model_catalog_product->upsert_seo_list( 
								[
									'prefix'=>$s_tag, 
									'tag'=>$s_slug, 
									'product_id'=>$this->request->get['product_id'],
									'language_id' => 4,
									'lang_prefix'=>$s_tag, //@todo need to russian 
									'lang_tag'	=> $s_source,
								] 
							);
						}

					}
					$s_page = preg_replace($s_replace_pattern, $s_new_url, $s_page);
				}
			}
			*/

			// вторая версия изменения
			/*
			<!-- start -->
<!-- /section_1/sfera -->сфера<!-- /section_1/ -->
<!-- /section_2/primenemiya -->применения<!-- /section_2/ -->:
<!-- /section_3/mojka -->мойка<!-- /section_3/ -->
<!-- /section_4/sanitarnyh -->санитарных<!-- /section_4/ -->
<!-- /section_5/kabinik -->кабинок<!-- /section_5/ --> 
<!-- /prefix_1/sip -->(SIP)<!-- /prefix_1/ -->, а также:
<!-- /prefix_2/bistro -->быстрая<!-- /prefix_1/ -->
<!-- /prefix_3/ -->нежно<!-- /prefix_1/ --> 
<!-- /tags_1/ -->
lorem; ipsum; dolor; sit; atmet; blabla; bla;
<!-- /tags_1/ -->
<!-- /start/ -->
			*/
			//echo $s_page;

			// нарезаем на секции
			$s_pattern = '|<!-- start -->(.*)<!-- /start/ -->|Uis';
			$a_part = [];
			if( preg_match_all($s_pattern, $s_page, $a_part)){
				foreach ($a_part[1] as $i_part_key=>$s_part){
					$a_section = [];
					$a_prefix = [];
					$a_tags	=	[]; 
					$s_pattern = "|<!-- /section_(\d*)/(.*) -->(.*)<!-- /section_(\d*)/ -->|Uis";
					$a_out = [];
					if( preg_match_all($s_pattern, $s_part, $a_out)){
						// обработка секций
						foreach ($a_out[2] as $i_key => $s_slug){
							$a_section[] = [ "slug"=>$s_slug, "name"=>$a_out[3][ $i_key ]];
						}
					}
					$s_pattern = "|<!-- /prefix_(\d*)/(.*) -->(.*)<!-- /prefix_(\d*)/ -->|Uis";
					$a_out = [];
					if( preg_match_all($s_pattern, $s_part, $a_out)){
						// обработка префиксов
						foreach ($a_out[2] as $i_key => $s_slug){
							$a_prefix[] = [ "slug"=>$s_slug, "name"=>$a_out[3][ $i_key ]];
						}
					}
					$s_pattern = "|<!-- /tags_(\d*)/ -->(.*)<!-- /tags_(.*)/ -->|Uis";
					$a_out = [];
					if( preg_match_all($s_pattern, $s_part, $a_out)){
						// обработка тегов
						$a_tags = explode(";", $a_out[2][0] );
					}
					// var_dump( $a_section, $a_prefix, $a_tags );
					$s_result = '';
					$s_url = '';
					foreach ($a_section as $a_item) {
						if( $a_item['slug'] != ''){
							$s_url .= $a_item['slug'] . "/";
						} else {
							$s_url .= $this->slugify( $a_item['name'] ) . "/";
						}
					}
					foreach ($a_prefix as $a_item) {
						if( $a_item['slug'] != ''){
							$s_url .= $a_item['slug'] . "-";
						} else {
							$s_url .= $this->slugify( $a_item['name'] ) . "-";
						}
					}

					foreach ($a_tags as $s_tag){
						$s_tag_slug = $this->slugify( $s_tag );
						$s_result .= "<a href='" . $s_url . $s_tag_slug . "' >" . $s_tag . "</a>&nbsp;";
					}
					$s_page .= $s_result . "<hr/>";
				}
			}

			$s_page = preg_replace("|<!-- start -->(.*)<!-- /start/ -->|", "", $s_page);
		
			//die();
			$data['description'] = $s_page;

			/* */

			if ($product_info['quantity'] <= 0) {
				$data['stock'] = $product_info['stock_status'];
			} elseif ($this->config->get('config_stock_display')) {
				$data['stock'] = $product_info['quantity'];
			} else {
				$data['stock'] = $this->language->get('text_instock');
			}

			$this->load->model('tool/image');

			if ($product_info['image']) {
				$data['popup'] = $this->model_tool_image->resize($product_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height'));
			} else {
				$data['popup'] = '';
			}

			if ($product_info['image']) {
				$data['thumb'] = $this->model_tool_image->resize($product_info['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_thumb_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_thumb_height'));
			} else {
				$data['thumb'] = '';
			}

			$data['images'] = array();

			$results = $this->model_catalog_product->getProductImages($this->request->get['product_id']);

			foreach ($results as $result) {
				$data['images'][] = array(
					'popup' => $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_popup_height')),
					'thumb' => $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_additional_height'))
				);
			}

			if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
				$data['price'] = $this->currency->format($this->tax->calculate($product_info['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$data['price'] = false;
			}

			if ((float)$product_info['special']) {
				$data['special'] = $this->currency->format($this->tax->calculate($product_info['special'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
			} else {
				$data['special'] = false;
			}

			if ($this->config->get('config_tax')) {
				$data['tax'] = $this->currency->format((float)$product_info['special'] ? $product_info['special'] : $product_info['price'], $this->session->data['currency']);
			} else {
				$data['tax'] = false;
			}

			$discounts = $this->model_catalog_product->getProductDiscounts($this->request->get['product_id']);

			$data['discounts'] = array();

			foreach ($discounts as $discount) {
				$data['discounts'][] = array(
					'quantity' => $discount['quantity'],
					'price'    => $this->currency->format($this->tax->calculate($discount['price'], $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency'])
				);
			}

			$data['options'] = array();

			foreach ($this->model_catalog_product->getProductOptions($this->request->get['product_id']) as $option) {
				$product_option_value_data = array();

				foreach ($option['product_option_value'] as $option_value) {
					if (!$option_value['subtract'] || ($option_value['quantity'] > 0)) {
						if ((($this->config->get('config_customer_price') && $this->customer->isLogged()) || !$this->config->get('config_customer_price')) && (float)$option_value['price']) {
							$price = $this->currency->format($this->tax->calculate($option_value['price'], $product_info['tax_class_id'], $this->config->get('config_tax') ? 'P' : false), $this->session->data['currency']);
						} else {
							$price = false;
						}

						$product_option_value_data[] = array(
							'product_option_value_id' => $option_value['product_option_value_id'],
							'option_value_id'         => $option_value['option_value_id'],
							'name'                    => $option_value['name'],
							'image'                   => $this->model_tool_image->resize($option_value['image'], 50, 50),
							'price'                   => $price,
							'price_prefix'            => $option_value['price_prefix']
						);
					}
				}

				$data['options'][] = array(
					'product_option_id'    => $option['product_option_id'],
					'product_option_value' => $product_option_value_data,
					'option_id'            => $option['option_id'],
					'name'                 => $option['name'],
					'type'                 => $option['type'],
					'value'                => $option['value'],
					'required'             => $option['required']
				);
			}

			if ($product_info['minimum']) {
				$data['minimum'] = $product_info['minimum'];
			} else {
				$data['minimum'] = 1;
			}

			$data['review_status'] = $this->config->get('config_review_status');

			if ($this->config->get('config_review_guest') || $this->customer->isLogged()) {
				$data['review_guest'] = true;
			} else {
				$data['review_guest'] = false;
			}

			if ($this->customer->isLogged()) {
				$data['customer_name'] = $this->customer->getFirstName() . '&nbsp;' . $this->customer->getLastName();
			} else {
				$data['customer_name'] = '';
			}

			$data['reviews'] = sprintf($this->language->get('text_reviews'), (int)$product_info['reviews']);
			$data['rating'] = (int)$product_info['rating'];

			// Captcha
			if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('review', (array)$this->config->get('config_captcha_page'))) {
				$data['captcha'] = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha'));
			} else {
				$data['captcha'] = '';
			}

			$data['share'] = $this->url->link('product/product', 'product_id=' . (int)$this->request->get['product_id']);

			$data['attribute_groups'] = $this->model_catalog_product->getProductAttributes($this->request->get['product_id']);

			$data['products'] = array();

			$results = $this->model_catalog_product->getProductRelated($this->request->get['product_id']);

			foreach ($results as $result) {
				if ($result['image']) {
					$image = $this->model_tool_image->resize($result['image'], $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
				} else {
					$image = $this->model_tool_image->resize('placeholder.png', $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_width'), $this->config->get('theme_' . $this->config->get('config_theme') . '_image_related_height'));
				}

				if ($this->customer->isLogged() || !$this->config->get('config_customer_price')) {
					$price = $this->currency->format($this->tax->calculate($result['price'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$price = false;
				}

				if ((float)$result['special']) {
					$special = $this->currency->format($this->tax->calculate($result['special'], $result['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
				} else {
					$special = false;
				}

				if ($this->config->get('config_tax')) {
					$tax = $this->currency->format((float)$result['special'] ? $result['special'] : $result['price'], $this->session->data['currency']);
				} else {
					$tax = false;
				}

				if ($this->config->get('config_review_status')) {
					$rating = (int)$result['rating'];
				} else {
					$rating = false;
				}

				$data['products'][] = array(
					'product_id'  => $result['product_id'],
					'thumb'       => $image,
					'name'        => $result['name'],
					'description' => utf8_substr(trim(strip_tags(html_entity_decode($result['description'], ENT_QUOTES, 'UTF-8'))), 0, $this->config->get('theme_' . $this->config->get('config_theme') . '_product_description_length')) . '..',
					'price'       => $price,
					'special'     => $special,
					'tax'         => $tax,
					'minimum'     => $result['minimum'] > 0 ? $result['minimum'] : 1,
					'rating'      => $rating,
					'href'        => $this->url->link('product/product', 'product_id=' . $result['product_id'])
				);
			}

			$data['tags'] = array();

			if ($product_info['tag']) {
				$tags = explode(',', $product_info['tag']);

				foreach ($tags as $tag) {
					$data['tags'][] = array(
						'tag'  => trim($tag),
						'href' => $this->url->link('product/search', 'tag=' . trim($tag))
					);
				}
			}

			$data['recurrings'] = $this->model_catalog_product->getProfiles($this->request->get['product_id']);

			$this->model_catalog_product->updateViewed($this->request->get['product_id']);
			
			$data['column_left'] = $this->load->controller('common/column_left');
			$data['column_right'] = $this->load->controller('common/column_right');
			$data['content_top'] = $this->load->controller('common/content_top');
			$data['content_bottom'] = $this->load->controller('common/content_bottom');
			$data['footer'] = $this->load->controller('common/footer');
			$data['header'] = $this->load->controller('common/header');

			$data['documents'] = 0;

			$this->load->model('account/customer_group');
			if($this->customer->isLogged()) {
			    // echo "Customer is logged in and his ID is " . $this->customer->isLogged();
			    $data['user_id'] = $this->customer->isLogged();
			    $data['group_id'] = $this->customer->getGroupId();
				$data['usergroup'] = $this->model_account_customer_group->getCustomerGroup( $this->customer->getGroupId() );
			    $data['username'] = $this->customer->getFirstName() . " " . $this->customer->getLastName();
			    
			    //var_dump( $data['usergroup']['name'] ); die();
			    //var_dump( get_class_methods($this->customer) );
    			if( $data['usergroup']['name'] == 'Дилер' ){
	    			$data['documents'] = $this->model_catalog_product->getDocuments( $this->request->get['product_id'] );
    			}
			} else {
				$data['user_id'] = 0;
				$data['group_id'] = 0;
				$data['group_name'] = "";
				$data['username'] = "";		
			}


			// var_dump($data['documents']); die();
			$data['preorder_token'] = md5( mt_rand(0, 65536) );
			$data['preorder_success'] = '.';
			if($_POST){
				/*
					array(6) 
			            { 
					["preorder_token"]=> string(32) "3b0d4794b8ffc47ee0a61cdaaada3224" 
					["preorder_name"]=> string(1) "w" 
					["preorder_phone"]=> string(1) "e" 
					["preorder_text"]=> string(1) "r" 
					["g-recaptcha-response"]=> string(334) "03AF6jDqW11kOGNbFIJAC0JhpTSZlTY4ibrEqA6UsKkQhw9SHGCF-ns1SSgVI4kO8DPgbKM32IBptlW6x253p1jyU2iWlrw1Hy2k-04uRoigSX5sbYk6ibsnZG_r3ev4iKbzks9uWSA0nCxb5KuyXYATIgmTXYuYMsO6ULGWs7r5SOTZ2o67qxLXa1ENMPffovlK8p9Jg31CjtRJUod7ZRgMOFSZ6IdYwggjgsMrabbBl8gOw6g_acNL3mG5nufzAdN4kA9DFec0PSF6mFPI6Nnv-mkN-Cc7Jt1hbfg4cAv_5iilXzS4DBPDM-_VRI2tMC4u5LdaRcPhJd" 
					["preorder_submit"]=> string(0) "" 
			
			            } 
				 */
				// check captcha data
				$s_url = 'https://www.google.com/recaptcha/api/siteverify';
				$s_secret = '6LfQiDkUAAAAAGdg5kC_vNfGHp6jdHS2o9TKfW6w';
				$s_response = $_POST['g-recaptcha-response'];
				//$ch = curl_init( $surl );

			    $postdata = http_build_query( ["secret"=>$s_secret, "response"=>$s_response] );
			    $opts = ['http' =>
				[
				    'method'  => 'POST',
				    'header'  => 'Content-type: application/x-www-form-urlencoded',
				    'content' => $postdata
				]
			    ];
			    $context  = stream_context_create($opts);
			    $result = file_get_contents('https://www.google.com/recaptcha/api/siteverify', false, $context);
			    $check = json_decode($result, true);
			    //var_dump( $check ); die();
/* 
{ 
["success"]=> bool(true) 
["challenge_ts"]=> string(20) "2019-02-11T08:20:01Z" 
["hostname"]=> string(18) "www.specsintez.com" }				
*/
			    if( array_key_exists('success', $check) && $check['success']){
				$data['preorder_success'] = 'Спасибо за размещение предварительного заказа. Наш сотрудник свяжется c Вами в ближайшее время.';
				$s_message = '
<html><head><title>Предварительный заказ товара</title></head>
<body>
<div>
<p><strong>Поступил предварительный заказ товара</strong> :<a href="https://www.specsintez.com/index.php?route=product/product&product_id=' . $_POST['preorder_product_id'] . '">' . $_POST['preorder_product_name'] . '</a></p>
<p><strong>Покупатель:</strong> &nbsp;' . $_POST['preorder_name'] . '</p>
<p><strong>Телефон покупателя:</strong> ' . $_POST['preorder_phone'] . '</p>
<p><strong>Cообщение покупателя:</strong> &nbsp;' . $_POST['preorder_text'] . '</p>
<p><strong>Дата и время обращения:</strong> ' . date( "Y-m-d H:i:s" , time() + 3600 * 3 ) . '</p>
<p>Это письмо отправлено из формы предварительного заказа на сайте и отвечать на него <b>не надо</b>.</p>
</div>
</body></html>';
// var_dump( $s_message ); die();
		// Для отправки HTML-письма должен быть установлен заголовок Content-type
		$headers = "From: SpecSintez <mail@specsintez.com>.\r\n";
		$headers .= "Reply-To: no-reply@specsintez.com";
		$headers .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=utf8' . "\r\n";

				mail("Alexey <lazarlong@yandex.ru>, Sergey <scanner85@yandex.ru>", date("Y-m-d H:i:s", time()+3600*3 ) . ": Предзаказ на сайте specsintez.com ", $s_message, $headers  );


			    } else {
				$data['preorder_success'] = 'Размещение предварительного заказа на данный товар сейчас невозможно.';
			    } 
			}
			$this->response->setOutput($this->load->view('product/product', $data));
		} else {
			$url = '';

			if (isset($this->request->get['path'])) {
				$url .= '&path=' . $this->request->get['path'];
			}

			if (isset($this->request->get['filter'])) {
				$url .= '&filter=' . $this->request->get['filter'];
			}

			if (isset($this->request->get['manufacturer_id'])) {
				$url .= '&manufacturer_id=' . $this->request->get['manufacturer_id'];
			}

			if (isset($this->request->get['search'])) {
				$url .= '&search=' . $this->request->get['search'];
			}

			if (isset($this->request->get['tag'])) {
				$url .= '&tag=' . $this->request->get['tag'];
			}

			if (isset($this->request->get['description'])) {
				$url .= '&description=' . $this->request->get['description'];
			}

			if (isset($this->request->get['category_id'])) {
				$url .= '&category_id=' . $this->request->get['category_id'];
			}

			if (isset($this->request->get['sub_category'])) {
				$url .= '&sub_category=' . $this->request->get['sub_category'];
			}

			if (isset($this->request->get['sort'])) {
				$url .= '&sort=' . $this->request->get['sort'];
			}

			if (isset($this->request->get['order'])) {
				$url .= '&order=' . $this->request->get['order'];
			}

			if (isset($this->request->get['page'])) {
				$url .= '&page=' . $this->request->get['page'];
			}

			if (isset($this->request->get['limit'])) {
				$url .= '&limit=' . $this->request->get['limit'];
			}

			$data['breadcrumbs'][] = array(
				'text' => $this->language->get('text_error'),
				'href' => $this->url->link('product/product', $url . '&product_id=' . $product_id)
			);

			$this->document->setTitle($this->language->get('text_error'));

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

	public function review() {
		$this->load->language('product/product');

		$this->load->model('catalog/review');

		if (isset($this->request->get['page'])) {
			$page = $this->request->get['page'];
		} else {
			$page = 1;
		}

		$data['reviews'] = array();

		$review_total = $this->model_catalog_review->getTotalReviewsByProductId($this->request->get['product_id']);

		$results = $this->model_catalog_review->getReviewsByProductId($this->request->get['product_id'], ($page - 1) * 5, 5);

		foreach ($results as $result) {
			$data['reviews'][] = array(
				'author'     => $result['author'],
				'text'       => nl2br($result['text']),
				'rating'     => (int)$result['rating'],
				'date_added' => date($this->language->get('date_format_short'), strtotime($result['date_added']))
			);
		}

		$pagination = new Pagination();
		$pagination->total = $review_total;
		$pagination->page = $page;
		$pagination->limit = 5;
		$pagination->url = $this->url->link('product/product/review', 'product_id=' . $this->request->get['product_id'] . '&page={page}');

		$data['pagination'] = $pagination->render();

		$data['results'] = sprintf($this->language->get('text_pagination'), ($review_total) ? (($page - 1) * 5) + 1 : 0, ((($page - 1) * 5) > ($review_total - 5)) ? $review_total : ((($page - 1) * 5) + 5), $review_total, ceil($review_total / 5));

		$this->response->setOutput($this->load->view('product/review', $data));
	}

	public function write() {
		$this->load->language('product/product');

		$json = array();

		if ($this->request->server['REQUEST_METHOD'] == 'POST') {
			if ((utf8_strlen($this->request->post['name']) < 3) || (utf8_strlen($this->request->post['name']) > 25)) {
				$json['error'] = $this->language->get('error_name');
			}

			if ((utf8_strlen($this->request->post['text']) < 25) || (utf8_strlen($this->request->post['text']) > 1000)) {
				$json['error'] = $this->language->get('error_text');
			}

			if (empty($this->request->post['rating']) || $this->request->post['rating'] < 0 || $this->request->post['rating'] > 5) {
				$json['error'] = $this->language->get('error_rating');
			}

			// Captcha
			if ($this->config->get('captcha_' . $this->config->get('config_captcha') . '_status') && in_array('review', (array)$this->config->get('config_captcha_page'))) {
				$captcha = $this->load->controller('extension/captcha/' . $this->config->get('config_captcha') . '/validate');

				if ($captcha) {
					$json['error'] = $captcha;
				}
			}

			if (!isset($json['error'])) {
				$this->load->model('catalog/review');

				$this->model_catalog_review->addReview($this->request->get['product_id'], $this->request->post);

				$json['success'] = $this->language->get('text_success');
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	public function getRecurringDescription() {
		$this->load->language('product/product');
		$this->load->model('catalog/product');

		if (isset($this->request->post['product_id'])) {
			$product_id = $this->request->post['product_id'];
		} else {
			$product_id = 0;
		}

		if (isset($this->request->post['recurring_id'])) {
			$recurring_id = $this->request->post['recurring_id'];
		} else {
			$recurring_id = 0;
		}

		if (isset($this->request->post['quantity'])) {
			$quantity = $this->request->post['quantity'];
		} else {
			$quantity = 1;
		}

		$product_info = $this->model_catalog_product->getProduct($product_id);
		
		$recurring_info = $this->model_catalog_product->getProfile($product_id, $recurring_id);

		$json = array();

		if ($product_info && $recurring_info) {
			if (!$json) {
				$frequencies = array(
					'day'        => $this->language->get('text_day'),
					'week'       => $this->language->get('text_week'),
					'semi_month' => $this->language->get('text_semi_month'),
					'month'      => $this->language->get('text_month'),
					'year'       => $this->language->get('text_year'),
				);

				if ($recurring_info['trial_status'] == 1) {
					$price = $this->currency->format($this->tax->calculate($recurring_info['trial_price'] * $quantity, $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);
					$trial_text = sprintf($this->language->get('text_trial_description'), $price, $recurring_info['trial_cycle'], $frequencies[$recurring_info['trial_frequency']], $recurring_info['trial_duration']) . ' ';
				} else {
					$trial_text = '';
				}

				$price = $this->currency->format($this->tax->calculate($recurring_info['price'] * $quantity, $product_info['tax_class_id'], $this->config->get('config_tax')), $this->session->data['currency']);

				if ($recurring_info['duration']) {
					$text = $trial_text . sprintf($this->language->get('text_payment_description'), $price, $recurring_info['cycle'], $frequencies[$recurring_info['frequency']], $recurring_info['duration']);
				} else {
					$text = $trial_text . sprintf($this->language->get('text_payment_cancel'), $price, $recurring_info['cycle'], $frequencies[$recurring_info['frequency']], $recurring_info['duration']);
				}

				$json['success'] = $text;
			}
		}

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}

	function slugify($string) {
	    $string = transliterator_transliterate("Any-Latin; NFD; [:Nonspacing Mark:] Remove; NFC; [:Punctuation:] Remove; Lower();", $string);
    	$string = preg_replace('/[-\s]+/', '-', $string);
    	return trim($string, '-');
	}

}
