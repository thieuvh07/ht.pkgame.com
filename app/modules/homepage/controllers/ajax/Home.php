<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();

	}

	public function index($page = 1){
        $perpage = 32;
        $query = '';
        $join = [];
        $catalogueid = ($this->input->get('catalogueid')) ? $this->input->get('catalogueid') : '';
        $keyword = ($this->input->get('keyword')) ? $this->input->get('keyword') : '';
        if(!empty($catalogueid)){
        	$detailCatalogue = $this->Autoload_Model->_get_where(array(
	            'select' => 'id, title, level, lft, rgt, parentid, brand_json, image_json, attrid, canonical, description, image, icon',
	            'table' => 'product_catalogue',
	            'query' => 'id = '.$catalogueid,
	        ));
        }
        if(!empty($keyword)){
        	$keyword = $this->db->escape_like_str($keyword);
        	$query = $query.' AND tb1.title LIKE \'%'.$keyword.'%\'';
        }
        if(!empty($catalogueid)){
            $temp = $this->Autoload_Model->_get_where(array(
                'select' => 'id',
                'table' => 'product_catalogue',
                'query' => 'lft >= '.$detailCatalogue['lft'].' AND '.'rgt <= '.$detailCatalogue['rgt'],
            ), true);

            $cataList = getColumsInArray($temp, 'id');
            $str_cata = '';
            if(isset($cataList) && is_array($cataList) && count($cataList)){
                foreach ($cataList as $key => $val) {
                    $str_cata = $str_cata.$val.', ';
                }
            }
            $str_cata = substr( $str_cata, 0, strlen($str_cata) -2);
            $str_cata = '('.$str_cata.')';
            $query = $query.' AND tb3.catalogueid IN  '.$str_cata;
            $join[] = array('catalogue_relationship as tb3', 'tb1.id = tb3.moduleid AND tb3.module = "product"', 'full');
        }
		$query = substr( $query,  4, strlen($query));

		$config['total_rows'] = $this->Autoload_Model->_get_where(array(
            'select' => 'tb1.id',
            'table' => 'product as tb1',
            'where' => array('tb1.publish' => 0),
            'join' => isset($join) ? $join : '',
            'query' => isset($query) ? $query : '',
            'distinct' => 'true',
            'count' =>TRUE,
        ));
        $config['base_url']  = '';
        if($config['total_rows'] > 0){
            $this->load->library('pagination');
            $config['base_url'] = rewrite_url(isset($detailCatalogue['canonical']) ? $detailCatalogue['canonical'] : '', false, false) ;
            $config['suffix'] = (!empty($_SERVER['QUERY_STRING'])?('?'.$_SERVER['QUERY_STRING']):'');
            // $config['suffix'] = $this->config->item('url_suffix').(!empty($_SERVER['QUERY_STRING'])?('?'.$_SERVER['QUERY_STRING']):'');

            $config['prefix'] = 'trang-';

            $config['first_url'] = $config['base_url'].$config['suffix'];
            $config['per_page'] = $perpage;
            $config['uri_segment'] = 1;
            $config['use_page_numbers'] = TRUE;
			$config['full_tag_open'] = '<div class="pagination js_pagination"><ul class="uk-pagination">';
			$config['full_tag_close'] = '</ul></div>';
            $config['first_tag_open'] = '<li>';
            $config['first_tag_close'] = '</li>';
            $config['last_tag_open'] = '<li>';
            $config['last_tag_close'] = '</li>';
            $config['cur_tag_open'] = '<li class="uk-active"><a>';
            $config['cur_tag_close'] = '</a></li>';
            $config['next_tag_open'] = '<li>';
            $config['next_tag_close'] = '</li>';
            $config['prev_tag_open'] = '<li>';
            $config['prev_tag_close'] = '</li>';
            $config['num_tag_open'] = '<li>';
            $config['num_tag_close'] = '</li>';
            $this->pagination->initialize($config);
            $data['PaginationList'] = $this->pagination->create_links();
            $totalPage = ceil($config['total_rows']/$config['per_page']);
            $page = ($page <= 0)?1:$page;
            $page = ($page > $totalPage)?$totalPage:$page;
            $seoPage = ($page >= 2) ? '-Trang '.$page : '';
            if($page >= 2){
                $data['canonical'] = $config['base_url'].'/trang-'.$page.$this->config->item('url_suffix');
            }
            $page = $page - 1;
            $data['from'] = ($page * $config['per_page']) + 1;
            $data['to'] = ($config['per_page']*($page+1) > $config['total_rows']) ? $config['total_rows']  : $config['per_page']*($page+1);
			$productList = $this->Autoload_Model->_get_where(array(
	            'select' => 'tb1.id, tb1.id as productid, tb1.title, tb1.canonical, tb1.price, tb1.price_sale, tb1.price_contact, tb1.image, tb1.version_json, tb1.image_color_json, tb1.description, tb1.code',
	            'table' => 'product as tb1',
	            'where' => array('tb1.publish' => 0),
	            'limit' => $config['per_page'],
	            'start' => $page * $config['per_page'],
	            'join' => isset($join) ? $join : '',
	            'query' => isset($query) ? $query : '',
	            'order_by' => isset($order_by) ? $order_by : '',
	            'distinct' => 'true',
	        ), true);
        	$productList = getDetailListPrd(array('productList' => $productList));
        }
        $html = '';

        $html = $html.'<h1 class="heading-1 h2109_cat_heading"><span>'.(isset($detailCatalogue['title']) ? $detailCatalogue['title'] : 'Sản phẩm').'</span></h1>';
		if(isset($productList) && is_array($productList) && count($productList)){
			 $html = $html.'<div class="panel-body">';
				 $html = $html.'<ul class="uk-list uk-clearfix uk-grid uk-grid-medium uk-grid-width-medium-1-2 uk-grid-width-large-1-4 list-product zoom">';

					foreach ($productList as $keyPost => $valPost) {
						$title = $valPost['title'];
						$href = rewrite_url($valPost['canonical'], TRUE, TRUE);
						$image = getthumb($valPost['image']);
						$description = cutnchar(strip_tags($valPost['description']), 250);
						$getPrice = getPriceFrontend(array('productDetail' => $valPost));
						$code = $valPost['code'];
						 $html = $html.'<li>';
							 $html = $html.'<div class="product">';
								 $html = $html.'<div class="thumb"><a class="image img-scaledown" href="'.$href.'" title="'.$title.'"><img src="'.$image.'" alt="'.$title.'" /></a></div>';
								 $html = $html.'<div class="info">';

									 $html = $html.'<h2 class="title"><a href="'.$href.'" title="'.$title.'">'.$title.'</a></h2>';
									 $html = $html.'<div class="price">'.(isset($getPrice['price_final']) ? $getPrice['price_final']: 'Liên hệ').'</div>';

								    $html = $html.'<div class="text-right"><button class="btn-buy" value="" name="">Mua hàng</button></div>';
							     $html = $html.'</div>';
							 $html = $html.'</div>';
						 $html = $html.'</li>';
					}
				 $html = $html.'</ul>';
			 $html = $html.'</div>';
             $canonicalCat = isset($detailCatalogue['canonical']) ? rewrite_url($detailCatalogue['canonical'], true, false) : '';
            $html = $html.'<div class="readmore"><a href="'.$canonicalCat.'" title="Xem tất cả" class="btn-readmore">Xem tất cả</a></div>';
		}else{
			$html = $html. 'Không có sản phẩm trong danh mục này';
		}
        
		echo $html;die;
	}
}
