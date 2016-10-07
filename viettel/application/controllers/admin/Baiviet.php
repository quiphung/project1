<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Baiviet extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('vt');
		$this->load->model('check');
		$this->load->helper('date');
		$this->load->helper('paginationconfig');
		$this->load->helper('mystring');
		if(!$this->session->has_userdata('admin_id')){
			redirect('admin/taikhoan/login');
		}
	}
	public function index(){
		$segs = $this->uri->segment_array();
		if(count($segs)>=5){
			if($segs[4]=='danhmuc'||$segs[4]=='chuyenmuc'){
				if($segs[4]=='danhmuc'){
					$x = 'iddm';
					$data['loai'] 	= 'dm';
				}
				if($segs[4]=='chuyenmuc'){
					$x='idcm';
					$data['loai'] 	= 'cm';
				}
				$data['id']		= 	$segs[5];
				$rs 			=	$this->db->get_where('baiviet',array($x=>$data['id']));
				$currentPage 	= 	$this->uri->segment(6,1);
				$config 		=	paginationConfig();
				$config['uri_segment'] = 6;
				$config['base_url'] = base_url().'admin/baiviet/index/'.$segs[4].'/'.$data['id'].'/';
				$config['total_rows'] = $rs->num_rows();
				$this->pagination->initialize($config);
				$rs = $this->db->select('idbv,tieude,iddm,idcm,ngaydang,solanxem,anhien,noibat,alias')
							->order_by('idbv','desc')->get_where('baiviet',array($x=>$data['id']),$config['per_page'],($currentPage-1)*$config['per_page']);
			}
		}
		else{
			$rs 			=	$this->db->get('baiviet');
			$currentPage 	= 	$this->uri->segment(4,1);
			$config 		=	paginationConfig();
			$config['uri_segment'] = 4;
			$config['base_url'] = base_url().'admin/baiviet/index/';
			$config['total_rows'] = $rs->num_rows();
			$this->pagination->initialize($config);
			$rs = $this->db->select('idbv,tieude,iddm,idcm,ngaydang,solanxem,noibat,anhien,alias')
						->order_by('idbv','desc')->get_where('baiviet',array(),$config['per_page'],($currentPage-1)*$config['per_page']);
		}
		if($rs->num_rows()>0){
			foreach($rs->result() as $v){
				$data['row'][] =	$v;
			}
		}
		$danhmuc 			= 	$this->vt->danhmuc();
		$data['danhmuc2'] 	=	$this->vt->danhmuc2(0,$danhmuc);
		$rsdanhmuc			=	$this->db->select('iddm,tieude')->get('danhmuc');
		if($rsdanhmuc->num_rows()>0){
			foreach($rsdanhmuc->result() as $k=>$v){
				$data['danhmuc'][] = $v;
			}
		}
		$rschuyenmuc	=	$this->db->select('idcm,tieude')->get('chuyenmuc');
		if($rschuyenmuc->num_rows()>0){
			foreach($rschuyenmuc->result() as $k=>$v){
				$data['chuyenmuc'][] = $v;
			}
		}
		$data['stt']    	= 1;
		$data['view'] 		= 'backend/modules/baiviet/index';
		$this->load->view('backend/layout/home',$data);
	}
	function insert(){
		if($this->input->post('tieude'));
		{
			$this->form_validation->set_rules('tieude','Tiêu đề','trim|required|min_length[2]|max_length[100]|xss_clean|html_escape');
			$this->form_validation->set_rules('danhmuc','Danh mục','trim|numeric|xss_clean|html_escape');
			$this->form_validation->set_rules('chuyenmuc','Chuyên mục','trim|numeric|xss_clean|html_escape');
			$this->form_validation->set_rules('avatar','Hình đại diện','trim|xss_clean|html_escape');
			$this->form_validation->set_rules('tomtat','Tóm tắt','trim|xss_clean');
			$this->form_validation->set_rules('nodung','Nội dung','trim');
			$this->form_validation->set_rules('tag','Tag','trim|xss_clean|html_escape');
			if ($this->form_validation->run() == FALSE) {
				# code...
				$data['thongbao'] = validation_errors();
			} else {
				# code...
				$upload = 1;
				$tieude = set_value('tieude');
				$rs 	= $this->db->select('tieude')->get_where('baiviet',array('tieude'=>$tieude));
				if($rs->num_rows()>0){
					$upload = 0 ;
					$data['thongbao']	=	'Tiêu đề đã tồn tại.';
				}
				if(set_value('anhien')){
					$anhien = 1;
				}
				else{
					$anhien = 0;
				}
				if(set_value('noibat')){
					$noibat = 1;
				}
				else{
					$noibat = 0;
				}
				if($upload == 1){
					$dataInsert = array(
						'iddm'		=>	set_value('danhmuc'),
						'idcm'		=>	set_value('chuyenmuc'),
						'tieude'	=>	$tieude,
						'urlhinh'	=>	set_value('avatar'),
						'alias'		=>	$this->check->checkurl($this->check->url_slug($tieude)),
						'ngaydang'	=>	now(),
						'tomtat'	=>	$this->input->post('tomtat'),
						'noidung'	=>	$this->input->post('noidung'),
						'noibat'	=>	$noibat,
						'anhien'	=>	$anhien,
						'title'		=> $tieude,
						'description'	=>	strip_tags($this->input->post('tomtat')),
					);
					if(!$this->db->insert('baiviet',$dataInsert)){
						$data['thongbao']	=	'Đã xảy ra lỗi. Thêm bài viết không thành công.';
					}
					else{
						$idbv = $this->db->insert_id();
						$tag = explode(',',set_value('tag'));
						foreach($tag as $k=>$v){
							if($v!=''){
								$rs = $this->db->select('idtag')->get_where('tags',array('tieude'=>$v));
								if($rs->num_rows()<=0){
									$dataInsert  	=  array(
										'tieude' 	=>	$v,
										'alias'		=>$this->check->checkurltag($this->check->url_slug($v)),
										'fontsize'	=> frand(8, 22, 4),
									);
									$this->db->insert('tags',$dataInsert);
									$idtag = $this->db->insert_id();
								}
								else{
									foreach($rs->result() as $r){
										$idtag = $r->idtag;
									}
								}
								$this->db->insert('itemtag',array('idbv'=>$idbv,'idtag'=>$idtag));
							}
						}
						if($this->input->post('goedit')!==null){
							redirect('admin/baiviet/update/'.$idbv);
						}
						else{
							redirect('admin/baiviet');
						}
					}
				}
			}
		}
		$chuyenmuc 			= $this->vt->getloai();
		$data['chuyenmuc'] 	=	$this->vt->getloai2(0,$chuyenmuc);
		$danhmuc 			= $this->vt->danhmuc();
		$data['danhmuc'] 	=	$this->vt->danhmuc2(0,$danhmuc);
		$csrf = array(
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] 	= $csrf;
		$data['view']	=	'backend/modules/baiviet/insert';
		$this->load->view('backend/layout/home',$data);
	}
	function update(){
		$idbv	=	$this->uri->segment(4,0);
		$rs 	= 	$this->db->select('tieude,iddm,idcm,alias,tomtat,noidung,title,description,noibat,anhien,urlhinh')
							->get_where('baiviet',array('idbv'=>$idbv));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data['r']	=	$r;
			}
		}
		$rstag 	=	$this->db->select('tags.tieude')
								->join('itemtag','itemtag.idtag=tags.idtag')
								->get_where('tags',array('itemtag.idbv'=>$idbv));
		$data['tag'] = '';						
		if($rstag->num_rows()>0){
			foreach($rstag->result() as $k => $v){
				$data['tag']	= $data['tag'].$v->tieude.',';
			}
		}
		if($this->input->post('tieude'))
		{	
			$this->form_validation->set_rules('tieude','Tiêu đề','trim|required|min_length[2]|max_length[100]|xss_clean|html_escape');
			$this->form_validation->set_rules('danhmuc','Danh mục','trim|numeric|xss_clean|html_escape');
			$this->form_validation->set_rules('chuyenmuc','Chuyên mục','trim|numeric|xss_clean|html_escape');
			$this->form_validation->set_rules('avatar','Hình đại diện','trim|xss_clean|html_escape');
			$this->form_validation->set_rules('tomtat','Tóm tắt','trim|xss_clean');
			$this->form_validation->set_rules('nodung','Nội dung','trim');
			$this->form_validation->set_rules('tag','Tag','trim|xss_clean|html_escape');
			if ($this->form_validation->run() == FALSE) {
				# code...
				$data['thongbao'] = validation_errors();
			} else {
				# code...
				$upload = 1;
				$tieude = set_value('tieude');
				$rs 	= $this->db->select('tieude')->get_where('baiviet',array('tieude'=>$tieude,'idbv !='=>$idbv));
				if($rs->num_rows()>0){
					$upload = 0 ;
					$data['thongbao']	=	'Tiêu đề đã tồn tại.';
				}
				if(set_value('anhien')){
					$anhien = 1;
				}
				else{
					$anhien = 0;
				}
				if(set_value('noibat')){
					$noibat = 1;
				}
				else{
					$noibat = 0;
				}
				if($upload == 1){
					$dataUpdate = array(
						'iddm'	=>	set_value('danhmuc'),
						'idcm'	=>	set_value('chuyenmuc'),
						'tieude'	=>	$tieude,
						'urlhinh'	=>	set_value('avatar'),
						'alias'		=>	$this->check->checkurl($this->check->url_slug($tieude),$idbv),
						'ngaydang'	=>	now(),
						'tomtat'	=>	$this->input->post('tomtat'),
						'noidung'	=>	$this->input->post('noidung'),
						'noibat'	=>	$noibat,
						'anhien'	=>	$anhien,
						'title'		=> $tieude,
						'description'	=>	strip_tags($this->input->post('tomtat')),
					);
					if(!$this->db->update('baiviet',$dataUpdate,array('idbv'=>$idbv))){
						$data['thongbao']	=	'Đã xảy ra lỗi. Cập nhật bài viết không thành công.';
					}
					else{
						$this->db->delete('itemtag',array('idbv'=>$idbv));
						$tag = explode(',',set_value('tag'));
						foreach($tag as $k=>$v){
							if($v!=''){
								$rs = $this->db->select('idtag')->get_where('tags',array('tieude'=>$v));
								if($rs->num_rows()<=0){
									$dataInsert  	=  array(
										'tieude' 	=>	$v,
										'alias'		=>$this->check->checkurltag($this->check->url_slug($v)),
										'fontsize'	=> frand(8, 22, 4),
									);
									$this->db->insert('tags',$dataInsert);
									$idtag = $this->db->insert_id();
								}
								else{
									foreach($rs->result() as $r){
										$idtag = $r->idtag;
									}
								}
								$this->db->insert('itemtag',array('idbv'=>$idbv,'idtag'=>$idtag));
							}
						}
						redirect('admin/baiviet');
					}
				}
			}
		}
		elseif($this->input->post('title')){
			$this->form_validation->set_rules('title','Title','trim|xss_clean|html_escape');
			$this->form_validation->set_rules('url','Url','trim|xss_clean|html_escape');
			$this->form_validation->set_rules('description','Description','trim|xss_clean|strip_tags');
			if ($this->form_validation->run() == FALSE) {
				# code...
				$data['thongbao'] = validation_errors();
			} else {
				# code...
				if(set_value('title')){
					$title = set_value('title');
				}
				else{
					$title = $data['r']->title;
				}
				if(set_value('url')){
					$url = $this->check->checkurl($this->check->url_slug(set_value('url')),$idbv);
				}
				else{
					$url = $data['r']->alias;
				}
				$dataUpdate = array(
					'title'			=>	$title,
					'alias'			=>	$url,
					'description'	=>	$this->input->post('description'),
				);
				if(!$this->db->update('baiviet',$dataUpdate,array('idbv'=>$idbv))){
					$data['thongbao']	=	'Đã xảy ra lỗi. Cập nhật không thành công.';
				}
				else{
					redirect('admin/baiviet');
				}
			}
		}
		$chuyenmuc 			= $this->vt->getloai();
		$data['chuyenmuc'] 	=	$this->vt->getloai2(0,$chuyenmuc);
		$danhmuc 			= $this->vt->danhmuc();
		$data['danhmuc'] 	=	$this->vt->danhmuc2(0,$danhmuc);
		$csrf = array(
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] 	= $csrf;
		$data['view']	=	'backend/modules/baiviet/update';
		$this->load->view('backend/layout/home',$data);
	}
	function delete(){
		$idbv = $this->uri->segment(4,0);
		$rs = $this->db->select('iditemtag')->get_where('itemtag',array('idbv'=>$idbv));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$this->db->delete('itemtag',array('iditemtag'=>$r->iditemtag));
			}
		}
		if(!$this->db->delete('baiviet',array('idbv'=>$idbv))){
			echo 'Đã xảy ra lỗi. Xóa không thành công.';
		}
		else{
			redirect('admin/baiviet');
		}
	}
}
