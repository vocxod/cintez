<?php
class ControllerCommonMenuTop extends Controller {
	public function index() {
		$this->load->language('common/menu');

		$data['up_line']= [ 
			['title'=>'TITLE_11', 'href' => '#1', 'target'=>'_self', 'active' => true],
			['title'=>'TITLE_12', 'href' => '#2', 'target'=>'_self', 'active' => true],
			['title'=>'TITLE_13', 'href' => '#3', 'target'=>'_blank', 'active' => true], 
		];

		$data['down_line']= [ 
			['title'=>'TITLE_21', 'href' => '#1', 'target'=>'_self', 'active' => true],
			['title'=>'TITLE_22', 'href' => '#2', 'target'=>'_self', 'active' => true],
			['title'=>'TITLE_23', 'href' => '#3', 'target'=>'_blank', 'active' => true],
			['title'=>'TITLE_24', 'href' => '#3', 'target'=>'_blank', 'active' => true],
			['title'=>'TITLE_25', 'href' => '#3', 'target'=>'_blank', 'active' => true], 
		];

		return $this->load->view('common/menu_top', $data);
	}
}
