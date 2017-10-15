<?php
class ControllerCommonMenuTop extends Controller {
	public function index() {
		$this->load->language('common/menu');

		$data['up_line']= [ 
			['title'=>'8 800 200 30 35', 'img' => '', 'href' => '#1', 'target'=>'_self', 'active' => true],
			['title'=>'подбор продукта', 'img' => '', 'href' => '#2', 'target'=>'_self', 'active' => true],
			['title'=>'дезкалькулятор' , 'img' => '', 'href' => '#3', 'target'=>'_blank', 'active' => true], 
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

		return $this->load->view('common/menu_top', $data);
	}
}
