<?php
class ControllerCommonCreateOrder extends Controller {
	public function index( $aData = [] ) {

		$json = array();

		$this->load->model('catalog/category'); 
		$this->load->model('catalog/product');
		$this->load->model('checkout/order');

		$json['data']['order_id'] = uniqid();
		if( isset( $this->request->get['order_product_id'] )){
			$json['data']['product_id'] = $this->request->get['order_product_id'];
		} else {
			// error
			$json['error'] = 'Неизвестный продукт.';
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
			return;
		}
		if( isset( $this->request->get['customer_phone'] )){
			$json['data']['customer_phone'] = $this->request->get['customer_phone'];
		} else {
			// error
			$json['error'] = 'Вы забыли указать свой контактный телефон';
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
			return;
		}
		$data = [];
		(string)$data['invoice_prefix'] = "SITE_";
		(int)$data['store_id'] = 0;
		(string)$data['store_name'] = "site";
		(string)$data['store_url']	= "";
		(int)$data['customer_id']	= 1; //
		(int)$data['customer_group_id'] = 1;
		(string)$data['firstname'] = "from site";
		(string)$data['lastname']	= "from site";
		(string)$data['email']	= "email@example.com";
		(string)$data['telephone'] = $json['data']['customer_phone'];
		$data['custom_field'] = "";
		(string)$data['payment_firstname'] = "";
		(string)$data['payment_lastname'] = "";
		(string)$data['payment_company'] = "";
		(string)$data['payment_address_1'] = "";
		(string)$data['payment_address_2'] = "";
		(string)$data['payment_city'] = "";
		(string)$data['payment_postcode'] = "";
		(string)$data['payment_country'] = "";
		(int)$data['payment_country_id'] = "";
		(string)$data['payment_zone'] = "";
		(int)$data['payment_zone_id'] = "";
		(string)$data['payment_address_format'] = "";
		$data['payment_custom_field'] = "";
		(string)$data['payment_method'] = "";
		(string)$data['payment_code'] = "";
		(string)$data['shipping_firstname'] = "";
		(string)$data['shipping_lastname'] = "";
		(string)$data['shipping_company'] = "";
		(string)$data['shipping_address_1'] = "";
		(string)$data['shipping_address_2'] = "";
		(string)$data['shipping_city'] = "";
		(string)$data['shipping_postcode'] = "";
		(string)$data['shipping_country'] = "";
		(int)$data['shipping_country_id'] = "";
		(string)$data['shipping_zone'] = "";
		(int)$data['shipping_zone_id'] = "";
		(string)$data['shipping_address_format'] = "";
		$data['shipping_custom_field'] = "";
		(string)$data['shipping_method'] = "";
		(string)$data['shipping_code'] = "";
		(string)$data['comment'] = "Заказ с сайта на товар index.php?route=product/product&product_id=" . $json['data']['product_id'] ;
		(float)$data['total'] = "";
		(int)$data['affiliate_id'] = "";
		(float)$data['commission'] = "";
		(int)$data['marketing_id'] = "";
		(string)$data['tracking'] = "";
		(int)$data['language_id'] = "4";
		(int)$data['currency_id'] = "4";
		(string)$data['currency_code'] = "RUR";
		(float)$data['currency_value'] = "1.00000000";
		(string)$data['ip'] = "127.0.0.1";
		(string)$data['forwarded_ip'] = "";
		(string)$data['user_agent'] = "API";
		(string)$data['accept_language'] = "";

		// Вставляем мниный товар
		$data['products'][] = [
			'product_id' => $json['data']['product_id'], 
			'name'	=> '',
			'model' => '', 
			'quantity' => '1', 
			'price' => '100', 
			'total' => '100', 
			'tax' => '0', 
			'reward' => '0',
			'option' => [],
		];

		$iOrderId = $this->model_checkout_order->addOrder( $data );
		$json['order_id'] = $iOrderId;
		/*
$order_id, $order_status_id, $comment = '', $notify = false, $override = false
		*/
		$this->model_checkout_order->addOrderHistory( $iOrderId, 1, '' );

		$this->response->addHeader('Content-Type: application/json');
		$this->response->setOutput(json_encode($json));
	}
}
