<?php
class ControllerExtensionModuleSlideshow extends Controller {
	public function index($setting) {
		static $module = 0;		

		$this->load->model('design/banner');
		$this->load->model('tool/image');

		$this->document->addStyle('catalog/view/javascript/jquery/swiper/css/swiper.min.css');
		$this->document->addStyle('catalog/view/javascript/jquery/swiper/css/opencart.css');
		$this->document->addScript('catalog/view/javascript/jquery/swiper/js/swiper.jquery.js');
		
		$data['banners'] = array();

		$results = $this->model_design_banner->getBanner($setting['banner_id']);
$setting['height'] = 540;
$setting['width'] = 1140;
//var_dump($setting['width'], $setting['height'] = 540); die();
		foreach ($results as $result) {
			if (is_file(DIR_IMAGE . $result['image'])) {
				$data['banners'][] = array(
					'title' => $result['title'],
					'link'  => $result['link'],
'image' => $this->model_tool_image->resize($result['image'], $setting['width'], $setting['height']),
//'image' => $this->model_tool_image->resize($result['image'], 540, 1140 ),
					'description'	=> $result['description'],
				);
			}
		}
		$data['banner_type'] = 2; // выставляем тут разный тип слайдера для выбора его заказчиком
		$data['module'] = $module++;

		return $this->load->view('extension/module/slideshow', $data);
	}
}