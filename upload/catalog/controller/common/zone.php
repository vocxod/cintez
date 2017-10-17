<?php
class ControllerCommonZone extends Controller {
	public function index() {
		$this->load->language('common/currency');

		// что делать на смену города
		$data['action'] = $this->url->link('common/zone/zone', '', $this->request->server['HTTPS']);

//var_dump($this->session->data); die();

		// храним выбранный город в сессии и оттуда же его вытаскиваем
		// $data['code'] = $this->session->data['zone'];

		$this->load->model('localisation/zone');

		$data['zones'] = array();

		if ( empty($this->session->data['current_zone'])) {
			$aResult = $this->model_localisation_zone->getZone( 2785 ); // 2785 = СПбург
			$this->session->data['current_zone'] = $aResult;
		} 
		$data['current_zone'] = $this->session->data['current_zone'];

		$results = $this->model_localisation_zone->getZonesByCountryId( 176 ); // 176 = Russia

		foreach ($results as $result) {
			if ($result['status']) {
				$data['zones'][] = array(
					'name'        => $result['name'],
					'code'         => $result['code'],
					//'symbol_left'  => $result['symbol_left'],
					//'symbol_right' => $result['symbol_right']
				);
			}
		}

		if (!isset($this->request->get['route'])) {
			$data['redirect'] = $this->url->link('common/home');
		} else {
			$url_data = $this->request->get;

			unset($url_data['_route_']);

			$route = $url_data['route'];

			unset($url_data['route']);

			$url = '';

			if ($url_data) {
				$url = '&' . urldecode(http_build_query($url_data, '', '&'));
			}

			$data['redirect'] = $this->url->link($route, $url, $this->request->server['HTTPS']);
		}
		return $this->load->view('common/zone', $data);
		// var_dump( $data ); die();
		// return "<li>123</li>";
	}

	public function zone() {
		$this->load->model('localisation/zone');
		if (isset($this->request->post['code'])) {
			$aResult = $this->model_localisation_zone->getZone( $this->request->post['code'] ); 
			
			echo $this->request->post['code'] . "\n\n";
			//var_dump($aResult); die();
			
			if($aResult){
				$this->session->data['current_zone'] = $aResult;
			} else {
				$aResult = $this->model_localisation_zone->getZone( 2785 ); // 2785 = СПбург
				$this->session->data['current_zone'] = $aResult;
			}
			
		}
		
		if (isset($this->request->post['redirect'])) {
			$this->response->redirect($this->request->post['redirect']);
		} else {
			$this->response->redirect($this->url->link('common/home'));
		}
	}

	function footer(){
		$this->load->language('common/currency');

		// что делать на смену города
		$data['action'] = $this->url->link('common/zone/zone', '', $this->request->server['HTTPS']);

		$this->load->model('localisation/zone');

		$data['zones'] = array();

		if ( empty($this->session->data['current_zone'])) {
			$aResult = $this->model_localisation_zone->getZone( 2785 ); // 2785 = СПбург
			$this->session->data['current_zone'] = $aResult;
		} 
		$data['current_zone'] = $this->session->data['current_zone'];

		$results = $this->model_localisation_zone->getZonesByCountryId( 176 ); // 176 = Russia

		foreach ($results as $result) {
			if ($result['status']) {
				$data['zones'][] = array(
					'name'        => $result['name'],
					'code'         => $result['code'],
				);
			}
		}

		if (!isset($this->request->get['route'])) {
			$data['redirect'] = $this->url->link('common/home');
		} else {
			$url_data = $this->request->get;

			unset($url_data['_route_']);

			$route = $url_data['route'];

			unset($url_data['route']);

			$url = '';

			if ($url_data) {
				$url = '&' . urldecode(http_build_query($url_data, '', '&'));
			}

			$data['redirect'] = $this->url->link($route, $url, $this->request->server['HTTPS']);
		}

		return $this->load->view('common/zonefooter', $data);		
	}
}