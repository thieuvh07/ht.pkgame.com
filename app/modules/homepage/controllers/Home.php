<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends MY_Controller {
	public function __construct(){
		parent::__construct();

	}

	public function index($page = 1){
        $perpage = 24;
        $catalogueid = ($this->input->get('catalogueid')) ? $this->input->get('catalogueid') : '';
        if(!empty($catalogueid)){
        	$detailCatalogue = $this->Autoload_Model->_get_where(array(
	            'select' => 'id, title, level, lft, rgt, parentid, brand_json, image_json, attrid, canonical,description, image, icon',
	            'table' => 'product_catalogue',
	            'query' => 'id = '.$catalogueid,
	        ));
        }
		$config['total_rows'] = $this->Autoload_Model->_get_where(array(
            'select' => 'tb1.id',
            'table' => 'product as tb1',
            'where' => array('tb1.publish' => 0),
            'keyword' => isset($keyword) ? $keyword : '',
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
			$config['full_tag_open'] = '<div class="pagination uk-text-left"><ul class="uk-pagination">';
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
	            'keyword' => isset($keyword) ? $keyword : '',
	            'join' => isset($join) ? $join : '',
	            'query' => isset($query) ? $query : '',
	            'order_by' => isset($order_by) ? $order_by : '',
	            'distinct' => 'true',
	        ), true);
        	$productList = getDetailListPrd(array('productList' => $productList));
	        $data['productList'] = $productList;
        }

		$data['canonical'] = base_url();
		$data['meta_title'] = $this->general['seo_meta_title'];
		$data['meta_description'] = $this->general['seo_meta_description'];
		$data['og_type'] = 'website';
		$data['template'] = 'homepage/frontend/home/index';
		$this->load->view('homepage/frontend/layout/home', isset($data)?$data:NULL);
	}
}
