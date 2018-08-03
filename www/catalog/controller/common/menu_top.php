<?php
class ControllerCommonMenuTop extends Controller {
	public function index( $aOption = [] ) {
		
		$data = [];

		$this->load->language('common/menu');
		$this->load->model('design/banner');

		$aBanner= $this->model_design_banner->getBanner( 9 );
		$data['banners'] = $aBanner;		
		$data['lang'] = $this->language->get('code');
		
		$this->load->model('catalog/category'); 
		$data['filters'] = $this->model_catalog_category->getAllFilters(0);		

		switch ($this->session->data['current_zone']['zone_id']) {
			// SPB
			case '2785':
				$sLocatPhone = '+7 812 318-47-17';
				break;
			// MSK
			case '2761':
				$sLocatPhone = '+7 495 665-02-53';
				break;
			// NSK
			case '2768':
				$sLocatPhone = '+7 383 363-09-88';
				break;
			// RnD
			case '2778':
				$sLocatPhone = '+7 863 201-43-44';
				break;
			// Kursk
			case '2755':
				$sLocatPhone = '+7 471 244-60-18';
				break;			
			default:
				$sLocatPhone = '+7 812 318-47-17';
				break;
		}

		if( $data['lang'] == 'ru'):
			$data['up_line']= [ 
				['class'=>'menu-bold ', 'title'=>$sLocatPhone, 
					'tel'	=> 1,
					'awesome' => 'fa fa-phone', 
					'img' => '', 
					'href' => 'tel:' . $sLocatPhone, 
					'target'=>'_self', 
					'active' => true, 
					'route'=>''
				],

				['tel'	=> 0, 'class'=>'menu-space menu-bold ' , 'title'=>'ПОДБОР ПРОДУКТА', 'awesome' => 'fa fa-binoculars', 'img' => '', 'href' => 'index.php?route=information/productselection', 'target'=>'_self', 'active' => false, 'route'=>'information/productselection'],

				['tel'	=> 0, 'class'=>'menu-space menu-bold disabled', 'title'=>'ДЕЗКАЛЬКУЛЯТОР' , 'awesome' => 'fa fa-calculator', 'img' => '', 'href' => 'index.php?route=information/dezcalc', 'target'=>'_blank', 'active' => false, 'route' => 'information/dezcalc'], 

			];
// index.php?route=product/category&path=1606
			$data['down_line']= [ 
['class'=>'menu-bold ', 'title'=>'ПРОДУКЦИЯ', 'href' => 'katalog', 'target'=>'_self', 'active' => true, 'route' => 'product/category'],
//index.php?route=information/about
['class'=>'menu-bold ', 'title'=>'О КОМПАНИИ', 'href' => 'about', 'target'=>'_self', 'active' => true, 'route' => 'information/about'],
// index.php?route=information/dealers
['class'=>'menu-bold ', 'title'=>'ДИЛЕРАМ', 'href' => 'dealers', 'target'=>'_blank', 'active' => true, 'route' => 'information/dealers'],
// index.php?route=information/articlelist
['class'=>'menu-bold ', 'title'=>'ПУБЛИКАЦИИ', 'href' => 'publications', 'target'=>'_blank', 'active' => true, 'route' => 'information/articlelist'],
// index.php?route=information/neoitems
['class'=>'menu-bold ', 'title'=>'НОВОСТИ', 'href' => 'news', 'target'=>'_blank', 'active' => true, 'route' => 'information/neoitems'], 			
// index.php?route=information/contact
['class'=>'menu-bold ', 'title'=>'ОБРАТНАЯ СВЯЗЬ', 'href' => 'feedback', 'target'=>'_blank', 'active' => true, 'route' => 'information/contact'],
//['title'=>'TITLE_25', 'href' => '#3', 'target'=>'_blank', 'active' => false], 
			];
			$data['apply_menu_list'] = [ 
				["name"=>"товарная группа 1", "href"=>"index.php"],
				["name"=>"товарная группа 12", "href"=>"index.php?bla=2"],
				["name"=>"товарная группа 13", "href"=>"index.php?bla=3"], 
			];
		endif;

		if( $data['lang'] == 'en'):
			$data['up_line']= [ 
['tel'	=> 1, 'class'=>'menu-bold ', 'title'=>'8 800 200 30 35', 'awesome' => 'fa fa-phone',  'img' => '', 'href' => 'tel:88002003035', 'target'=>'_self', 'active' => true, 'route' => 'product/category'],
['tel'	=> 0, 'class'=>'menu-space menu-bold ', 'title'=>'PRODUCT SELECTION', 'awesome' => 'fa fa-binoculars', 'img' => '', 'href' => 'index.php?route=information/productselection', 'target'=>'_self', 'active' => true, 'route'=>'information/productselection'],
				
				['class'=>'menu-space menu-bold ', 'title'=>'DEZ CALCULATOR', 'awesome' => 'fa fa-calculator','img' => '', 
				'href' => 'index.php?route=information/dezcalc', 'target'=>'_blank', 'active' => true, 'route'=>'information/dezcalc'], 

			];

			$data['down_line']= [ 
				['class'=>'menu-bold ', 'title'=>'PRODUCTS', 'href' => 'katalog', 'target'=>'_self', 'active' => true, 'route' => ''],
				
				['class'=>'menu-bold ', 'title'=>'ABOUT', 'href' => 'index.php?route=information/about', 'target'=>'_self', 'active' => true, 'route' => 'information/about'],
				
				['class'=>'menu-bold ', 'title'=>'DEALERS', 'href' => 'index.php?route=information/dealers', 'target'=>'_blank', 'active' => true, 'route' => 'information/dealers'],
				
				['class'=>'menu-bold ', 'title'=>'ARTICLES', 'href' => 'index.php?route=information/articlelist', 'target'=>'_blank', 'active' => true, 'route' => 'information/articlelist'],
				
				['class'=>'menu-bold ', 'title'=>'NEWS', 'href' => 'index.php?route=information/neoitems', 'target'=>'_blank', 'active' => true, 'route' => 'information/neoitems'], 			

				['class'=>'menu-bold ', 'title'=>'FEEDBACK', 'href' => 'index.php?route=information/contact', 'target'=>'_blank', 'active' => true, 'route' => 'information/contact'],
				//['title'=>'TITLE_25', 'href' => '#3', 'target'=>'_blank', 'active' => false], 
			];
			$data['apply_menu_list'] = [ 
				["name"=>"NAME 1", "href"=>"index.php"],
				["name"=>"NAME 2", "href"=>"index.php?bla=2"],
				["name"=>"NAME 3", "href"=>"index.php?bla=3"], 
			];
		endif;

		$data['columns'] = 
		[ 
			['header' => 'Индустриальная химия', 
				[ 	'Дезинфицирующие средства', 
					'Индустриальная химия', 
					'Обезжириватели для поверхностей', 
					'Профессиональный крем для рук', 
					'Моющие средства с дезинфицирующим эффектом', 
					'Универсальные моющие средства',
					'Дополнительное оборудование',  
					'Средства для внутренней мойки оборудования (CIP мойка)',
				] ],
			['header' => 'Клининг и дезинфекция', 
				[ 
					'Средства для посудомоечных машин', 
					'Средства для поломоечных машин', 
					'Средства для кафеля и сантехники', 
					'Жидкое мыло', 
					'Средства для ковровых покрытий', 
					'Средства для ручной мойки посуды',
					'Пятновыводители',
					'Автокосметика',
					'Дилерам', 
				] ],
			['header' => 'Агропромышленный комплекс', 
				[ 
					'Средства для стекол и зеркал', 
					'Средства для чистки и полировки металлов', 
					'Уход за выменем', 
					'Кожные антисептики ', 
					'Средства по удалению засоров в трубах', 
				 	'Средства для обработки копыт',
				 	'Средства для очистки теплообменного оборудования',
					'Кислотные пенные средства',
				]  ],	
		];
		$sRoute = '';
		if (isset($this->request->get['route'])) {
			$sRoute = (string)$this->request->get['route'];
			// найти текущий пункт меню, добавить класс
			if( $sRoute != '' ){
				$data['lang'] = $this->language->get('code');
				foreach ($data['up_line'] as $iKey => $aItem) {
					foreach ($aItem as $sKey => $sMenu) {
						if( $sKey =='route'){
							if( $sMenu == $sRoute ){
								$data['up_line'][$iKey]['class'] .= " selected-item";
							}
						}
					}
				}
				foreach ($data['down_line'] as $iKey => $aItem) {
					foreach ($aItem as $sKey => $sMenu) {
						if( $sKey =='route'){
							if( $sMenu == $sRoute ){
								//var_dump("found");
								$data['down_line'][$iKey]['class'] .= " selected-item";
							}
						}
					}
				}
			}
    	}
    	$data['route'] = $sRoute;
		//var_dump( $data['down_line'] ); //die();
		return $this->load->view('common/menu_top', $data);
	}
}

