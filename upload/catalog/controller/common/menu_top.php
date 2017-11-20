<?php
class ControllerCommonMenuTop extends Controller {
	public function index() {
		
		$data = [];

		$this->load->language('common/menu');
		$this->load->model('design/banner');

		$aBanner= $this->model_design_banner->getBanner( 9 );
		//var_dump( $aBanner ); die();
		$data['banners'] = $aBanner;
 		
		$data['lang'] = $this->language->get('code');
		//var_dump($data['lang']); die();
		if( $data['lang'] == 'ru'):
			$data['up_line']= [ 
				['class'=>'menu-bold', 'title'=>'8 800 200 30 35', 'awesome' => 'fa fa-phone', 'img' => '', 'href' => '#1', 'target'=>'_self', 'active' => true],
				['class'=>'menu-space menu-bold', 'title'=>'ПОДБОР ПРОДУКТА', 'awesome' => 'fa fa-binoculars', 'img' => '', 'href' => 'index.php?route=information/productselection', 'target'=>'_self', 'active' => true],
				['class'=>'menu-space menu-bold', 'title'=>'ДЕЗКАЛЬКУЛЯТОР' , 'awesome' => 'fa fa-calculator', 'img' => '', 'href' => 'index.php?route=information/dezcalc', 'target'=>'_blank', 'active' => true], 
			];

			$data['down_line']= [ 
				['class'=>'', 'title'=>'ПРОДУКЦИЯ', 'href' => 'index.php?route=product/category&path=10', 'target'=>'_self', 'active' => true],
				['class'=>'menu-bold', 'title'=>'О КОМПАНИИ', 'href' => 'index.php?route=information/about', 'target'=>'_self', 'active' => true],
				['class'=>'menu-bold', 'title'=>'ДИЛЕРАМ', 'href' => 'index.php?route=information/information&information_id=10', 'target'=>'_blank', 'active' => true],
				['class'=>'menu-bold', 'title'=>'ПУБЛИКАЦИИ', 'href' => 'index.php?route=information/articlelist', 'target'=>'_blank', 'active' => true],
				['class'=>'menu-bold', 'title'=>'НОВОСТИ', 'href' => 'index.php?route=information/newslist', 'target'=>'_blank', 'active' => true], 			
				['class'=>'menu-bold', 'title'=>'ОБРАТНАЯ СВЯЗЬ', 'href' => 'index.php?route=information/contact', 'target'=>'_blank', 'active' => true],
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
				['class'=>'menu-bold', 'title'=>'8 800 200 30 35', 'awesome' => 'fa fa-phone',  'img' => '', 'href' => '#1', 'target'=>'_self', 'active' => true],
				['class'=>'menu-space menu-bold', 'title'=>'PRODUCT SELECTION', 'awesome' => 'fa fa-binoculars', 'img' => '', 'href' => 'index.php?route=information/productselection', 'target'=>'_self', 'active' => true],
				['class'=>'menu-space menu-bold', 'title'=>'DEZ CALCULATOR', 'awesome' => 'fa fa-calculator','img' => '', 
				'href' => 'index.php?route=information/dezcalc', 'target'=>'_blank', 'active' => true], 
			];

			$data['down_line']= [ 
				['class'=>'menu-bold', 'title'=>'PRODUCTS', 'href' => 'index.php?route=product/category&path=10', 'target'=>'_self', 'active' => true],
				['class'=>'menu-bold', 'title'=>'ABOUT', 'href' => 'index.php?route=information/about', 'target'=>'_self', 'active' => true],
				['class'=>'menu-bold', 'title'=>'DEALERS', 'href' => 'index.php?route=information/information&information_id=10', 'target'=>'_blank', 'active' => true],
				['class'=>'menu-bold', 'title'=>'ARTICLES', 'href' => 'index.php?route=information/articlelist', 'target'=>'_blank', 'active' => true],
				['class'=>'menu-bold', 'title'=>'NEWS', 'href' => 'index.php?route=information/newslist', 'target'=>'_blank', 'active' => true], 			
				['class'=>'menu-bold', 'title'=>'FEEDBACK', 'href' => 'index.php?route=information/contact', 'target'=>'_blank', 'active' => true],
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

		


		//var_dump( $data['apply_menu_list'] ); die();
		return $this->load->view('common/menu_top', $data);
	}
}

/*
+------+---------------------------------------------------------------------------------------------------+
| id   | pagetitle                                                                                         |
+------+---------------------------------------------------------------------------------------------------+
| 1232 | Пятновыводители                                                                                   |
| 1238 | Автокосметика                                                                                     |
| 1242 | Дилерам                                                                                           |
| 1247 | Дополнительное оборудование                                                                       |
| 1234 | Средства для внутренней мойки оборудования (CIP мойка)                                            |
| 1282 | Средства для очистки теплообменного оборудования                                                  |
| 1236 | Кислотные пенные средства                                                                         |
| 1145 | Дезинфицирующие средства                                                                          |
| 1146 | Индустриальная химия                                                                              |
| 1147 | Обезжириватели для поверхностей                                                                   |
| 1148 | Профессиональный крем для рук                                                                     |
| 1149 | Моющие средства с дезинфицирующим эффектом                                                        |
| 1150 | Универсальные моющие средства                                                                     |
| 1151 | Средства для посудомоечных машин                                                                  |
| 1152 | Средства для поломоечных машин                                                                    |
| 1153 | Средства для кафеля и сантехники                                                                  |
| 1154 | Жидкое мыло                                                                                       |
| 1155 | Средства для ковровых покрытий                                                                    |
| 1156 | Средства для ручной мойки посуды                                                                  |
| 1157 | Средства для стекол и зеркал                                                                      |
| 1158 | Средства для чистки и полировки металлов                                                          |
| 1338 | Уход за выменем                                                                                   |
| 1226 | Кожные антисептики                                                                                |
| 1381 | Средства по удалению засоров в трубах                                                             |
| 1418 | Средства для обработки копыт                                                                      |
+------+---------------------------------------------------------------------------------------------------+

*/