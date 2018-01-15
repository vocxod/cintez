<?php
class ControllerCommonCategoryTree extends Controller {
	public function index( $aOption = [] ) {
		$this->load->language('api/product_to_csv');
		$json = array();

		$this->load->model('catalog/category'); 
		$this->load->model('catalog/product');
		$iParentId = 0; //(int)$this->request->get['category_id'];
		if( isset($this->request->get['category_id']) ){
			$iParentId = $this->request->get['category_id'];
		} else {
			$iParentId = 0;
		}
		$json['parent_id_request'] = $iParentId;
		$json['status'] = ['code'=>200];
		$aCategories = $this->model_catalog_category->getCategories( $iParentId );
		$json['categories'] = $aCategories;
		$aResult = [];
		$aOut = $this->createTree( $aCategories, $aResult );
		$json['tree'] = $aOut;

		if( count($aOption) > 0 ){
			return $json;
		} else {
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}

	// рекурсивно строим категории их таблички OC_CATEGORIES
	private function createTree( $aCategories, $aResult = [] ){
		$this->load->model('catalog/category');
		foreach( $aCategories as $aCategory ){
			$iCount		= count( $this->createTree( 
					$this->model_catalog_category->getCategories( $aCategory['category_id'], $aResult ) ) );
			if( $iCount >0 ){
				$aResult[ $aCategory['category_id'] ] = [ 
				'category_id'=>$aCategory['category_id'], 
				'cat_path'  =>  $this->model_catalog_category->getCatPath( $aCategory['category_id'] ),
				'name'		=>	$aCategory['sidebar_title'], //замещаем на текст, который подравняем для вида в блоке 
				'css'		=>	$aCategory['css'],
				'class'		=>	$aCategory['class'],
				'count'		=>  $iCount,
				'children'	=>	$this->createTree( 
						$this->model_catalog_category->getCategories( $aCategory['category_id'], $aResult ) ), 
				]; 	
			} else {
				$aResult[ $aCategory['category_id'] ] = [ 
				'category_id'=>$aCategory['category_id'], 
				'cat_path'  =>  $this->model_catalog_category->getCatPath( $aCategory['category_id'] ),
				'name'		=>	$aCategory['sidebar_title'], //замещаем на текст, который подравняем для вида в блоке 
				'css'		=>	$aCategory['css'],
				'class'		=>	$aCategory['class'],
				'count'		=>  0, 
				];
			}
		}
		return $aResult;
	}


	public function tree_type2( $aOption = [] ) {
		$this->load->language('api/product_to_csv');
		$json = array();

		$this->load->model('catalog/category'); 
		$this->load->model('catalog/product');
		$iParentId = 0; //(int)$this->request->get['category_id'];
		if( isset($this->request->get['category_id']) ){
			$iParentId = $this->request->get['category_id'];
		} else {
			$iParentId = 0;
		}
		//$json['parent_id_request'] = $iParentId;
		// $json['status'] = ['code'=>200];
		$aCategories = $this->model_catalog_category->getCategories( $iParentId );
		//$json['categories'] = $aCategories;
		$aResult = [];
		$aOut = $this->createTree2( $aCategories, $aResult );
		$json['tree'] = $aOut;

		if( count($aOption) > 0 ){
			return $json;
		} else {
			$this->response->addHeader('Content-Type: application/json');
			$this->response->setOutput(json_encode($json));
		}
	}

	private function getFullPath( $iCategoryId ){
		$this->load->model("catalog/category");
		$aData = $this->model_catalog_category->getCatPath( $iCategoryId );
		return $aData;
	}

	// рекурсивно строим категории их таблички OC_CATEGORIES
	/*
	формируемая структура
	{
	  text: "Node 1",
	  icon: "glyphicon glyphicon-stop",
	  selectedIcon: "glyphicon glyphicon-stop",
	  color: "#000000",
	  backColor: "#FFFFFF",
	  href: "#node-1",
	  selectable: true,
	  state: {
	    checked: true,
	    disabled: true,
	    expanded: true,
	    selected: true
	  },
	  tags: ['available'],
	  nodes: [
	    {},
	    ...
	  ]
	}

	*/
	private function createTree2( $aCategories, $aResult = [] ){
		$this->load->model('catalog/category');
		foreach( $aCategories as $aCategory ){
			
			switch ($aCategory['category_id']) {
				case '10':  //| Пищевая промышленность':
					$sIcon = "glyphicon glyphicon-apple";
					break;
				case '54':// | Сельское хозяйство':
					$sIcon = "glyphicon glyphicon-piggy-bank";
					break;	
				case '72':// | HoReCa':
					$sIcon = "glyphicon glyphicon-calendar";
					break;
				case '87':// | Клининг':
					$sIcon = "glyphicon glyphicon-screenshot";
					break;
				case '94':// | Транспорт':
					$sIcon = "glyphicon glyphicon-calendar";
					break;
				case '113':// | Обслуживание теплообменного оборудования':
					$sIcon = "glyphicon glyphicon-screenshot";
					break;
				case '117':// | Машиностроение и металлообработка':
					$sIcon = "glyphicon glyphicon-calendar";
					break;
				case '131':// | Учреждения здравоохранения':
					$sIcon = "glyphicon glyphicon-screenshot";
					break;
				case '150':// | Детские сады и школы':
					$sIcon = "glyphicon glyphicon-calendar";
					break;
				case '168':// | Салоны красоты и SPA':
					$sIcon = "glyphicon glyphicon-screenshot";
					break;
				default:
					$sIcon = "";
					break;
			}		
			// измененная структура в зависимости от надичия наследников	
			if( 
				count( $this->createTree2( 
					$this->model_catalog_category->getCategories( $aCategory['category_id'], $aResult ) 
			) ) > 0 ) {
			$aResult[] = [ 
			'text'	=>	$aCategory['name'],
			'icon' 	=> "$sIcon", // иконка конкретной категории (группы категорий)
			'selectedIcon' => "glyphicon glyphicon-ban-circle", // выбранная иконка
			'color' 	=> "#404540",
			'backColor' =>  "#FEFEFE", // "#369A38",
			'href'=>"index.php?route=product/category&path=" . $this->getFullPath($aCategory['category_id']), 
			'selectable' => 1,
			'state' => [
				//'checked'  => true,
				//'disabled' => true,
				'expanded' => false,
				//'selected' => true
			],
'tags' => [count( $this->createTree2( $this->model_catalog_category->getCategories( $aCategory['category_id'], $aResult ) 
) ) ],
				/* вот тут пригодился бы вариант)) */
'nodes'
=> 
$this->createTree2($this->model_catalog_category->getCategories( $aCategory['category_id'], $aResult ))
			]; 
			} else {
				$aResult[] = [ 
				'text'	=>	$aCategory['name'],
				'icon' 	=> "$sIcon", // иконка конкретной категории (группы категорий)
				'selectedIcon' => "glyphicon glyphicon-ban-circle", // выбранная иконка
				'color' 	=> "#404540",
				'backColor' =>  "#FEFEFE", // "#369A38",
				'href'=>"index.php?route=product/category&path=" . $this->getFullPath($aCategory['category_id']), 
				'selectable' => 1,
				'state' => [
					//'checked'  => true,
					//'disabled' => true,
					'expanded' => false,
					//'selected' => true
				],

				]; 
			}
	
		}
		return $aResult;
	}


}