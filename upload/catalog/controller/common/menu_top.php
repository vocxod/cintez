<?php
class ControllerCommonMenuTop extends Controller {
	public function index() {
		$this->load->language('common/menu');
		$data = [];
		$data['lang'] = $this->language->get('code');
		if( $data['lang'] == 'ru'):
			$data['up_line']= [ 
				['title'=>'8 800 200 30 35', 'awesome' => 'fa fa-phone', 'img' => '', 'href' => '#1', 'target'=>'_self', 'active' => true],
				['title'=>'подбор продукта', 'awesome' => 'fa fa-binoculars', 'img' => '', 'href' => '#2', 'target'=>'_self', 'active' => true],
				['title'=>'дезкалькулятор' , 'awesome' => 'fa fa-calculator', 'img' => '', 'href' => '#3', 'target'=>'_blank', 'active' => true], 
			];

			$data['down_line']= [ 
				['title'=>'ПРОДУКЦИЯ', 'href' => 'index.php?route=product/category&path=59', 'target'=>'_self', 'active' => true],
				['title'=>'О КОМПАНИИ', 'href' => 'index.php?route=information/information&information_id=4', 'target'=>'_self', 'active' => true],
				['title'=>'ДИЛЕРАМ', 'href' => 'index.php?route=information/information&information_id=10', 'target'=>'_blank', 'active' => true],
				['title'=>'ПУБЛИКАЦИИ', 'href' => '#', 'target'=>'_blank', 'active' => true],
				['title'=>'НОВОСТИ', 'href' => '#', 'target'=>'_blank', 'active' => true], 			
				['title'=>'ОБРАТНАЯ СВЯЗЬ', 'href' => 'index.php?route=information/contact', 'target'=>'_blank', 'active' => true],
				['title'=>'TITLE_25', 'href' => '#3', 'target'=>'_blank', 'active' => false], 
			];
		endif;

		if( $data['lang'] == 'en'):
			$data['up_line']= [ 
				['title'=>'8 800 200 30 35', 'awesome' => 'fa fa-phone',  'img' => '', 'href' => '#1', 'target'=>'_self', 'active' => true],
				['title'=>'select product', 'awesome' => 'fa fa-binoculars', 'img' => '', 'href' => '#2', 'target'=>'_self', 'active' => true],
				['title'=>'dez calculator', 'awesome' => 'fa fa-calculator','img' => '', 'href' => '#3', 'target'=>'_blank', 'active' => true], 
			];

			$data['down_line']= [ 
				['title'=>'PRODUCTS', 'href' => 'index.php?route=product/category&path=59', 'target'=>'_self', 'active' => true],
				['title'=>'ABOUT', 'href' => 'index.php?route=information/information&information_id=4', 'target'=>'_self', 'active' => true],
				['title'=>'DEALERS', 'href' => 'index.php?route=information/information&information_id=10', 'target'=>'_blank', 'active' => true],
				['title'=>'ARTICLES', 'href' => '#', 'target'=>'_blank', 'active' => true],
				['title'=>'NEWS', 'href' => '#', 'target'=>'_blank', 'active' => true], 			
				['title'=>'FEEDBACK', 'href' => 'index.php?route=information/contact', 'target'=>'_blank', 'active' => true],
				['title'=>'TITLE_25', 'href' => '#3', 'target'=>'_blank', 'active' => false], 
			];
		endif;

		$data['apply_menu_list'] = [ 
			["name"=>"NAME 1", "href"=>"index.php"],
			["name"=>"NAME 2", "href"=>"index.php?bla=2"],
			["name"=>"NAME 3", "href"=>"index.php?bla=3"], 
		];
		//var_dump( $data['apply_menu_list'] ); die();
		return $this->load->view('common/menu_top', $data);
	}
}
