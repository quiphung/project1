<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Image extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('vt');
		$this->load->model('check');
		$this->load->helper('date');
		$this->load->helper('paginationconfig');
		if(!$this->session->has_userdata('admin_id')){
			redirect('admin/taikhoan/login');
		}
	}
	public function index(){
		$rs 			=	$this->db->get('image');
		$currentPage 	= 	$this->uri->segment(4,1);
		$config 		=	paginationConfig();
		$config['uri_segment'] = 4;
		$config['base_url'] = base_url().'admin/image/index/';
		$config['total_rows'] = $rs->num_rows();
		$this->pagination->initialize($config);
		$rs = $this->db->order_by('loai')->get_where('image',array(),$config['per_page'],($currentPage-1)*$config['per_page']);
		if($rs->num_rows()>0){
			foreach($rs->result() as $v){
				$data['row'][] =	$v;
			}
		}
		$data['stt']    	= 1;
		$data['view'] 		= 'backend/modules/image/index';
		$this->load->view('backend/layout/home',$data);
	}
	function insert(){
		if($this->input->post('hinh'));
		{
			$this->form_validation->set_rules('hinh','Hình ảnh','trim|xss_clean|html_escape');
			$this->form_validation->set_rules('loai','Loại','trim|numeric|xss_clean|html_escape');
			$this->form_validation->set_rules('thutu','Thứ tự','trim|numeric|xss_clean|html_escape');
			if ($this->form_validation->run() == FALSE) {
				# code...
				$data['thongbao'] = validation_errors();
			} else {
				# code...
				if(set_value('anhien')){
					$anhien = 1;
				}
				else{
					$anhien = 0;
				}
				$dataInsert = array(
					'urlhinh'	=>	$this->input->post('hinh'),
					'loai'		=>	set_value('loai'),
					'thutu'		=>	set_value('thutu'),				
					'anhien'	=>	$anhien,
				);
				if(!$this->db->insert('image',$dataInsert)){
					$data['thongbao']	=	'Đã xảy ra lỗi. Thêm không thành công.';
				}
				else{
					redirect('admin/image');
				}
			}
		}
		$csrf = array(
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] 	= $csrf;
		$data['view']	=	'backend/modules/image/insert';
		$this->load->view('backend/layout/home',$data);
	}
	function update(){
		$idhinh	=	$this->uri->segment(4,0);
		$rs 	= 	$this->db->get_where('image',array('idhinh'=>$idhinh));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data['r']	=	$r;
			}
		}
		if($this->input->post('hinh'));
		{
			$this->form_validation->set_rules('hinh','Hình ảnh','trim|required|xss_clean|html_escape');
			$this->form_validation->set_rules('loai','Loại','trim|numeric|xss_clean|html_escape');
			$this->form_validation->set_rules('thutu','Thứ tự','trim|numeric|xss_clean|html_escape');
			if ($this->form_validation->run() == FALSE) {
				# code...
				$data['thongbao'] = validation_errors();
			} else {
				# code...
				if(set_value('anhien')){
					$anhien = 1;
				}
				else{
					$anhien = 0;
				}
				$dataUpdate = array(
					'urlhinh'	=>	$this->input->post('hinh'),
					'loai'		=>	set_value('loai'),
					'thutu'		=>	set_value('thutu'),				
					'anhien'	=>	$anhien,
				);
				if(!$this->db->update('image',$dataUpdate,array('idhinh'=>$idhinh))){
					$data['thongbao']	=	'Đã xảy ra lỗi. Cập nhật không thành công.';
				}
				else{
					redirect('admin/image');
				}
			}
		}
		$csrf = array(
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] 	= $csrf;
		$data['view']	=	'backend/modules/image/update';
		$this->load->view('backend/layout/home',$data);
	}
	function delete(){
		$idhinh = $this->uri->segment(4,0);
		if(!$this->db->delete('image',array('idhinh'=>$idhinh))){
			echo 'Đã xảy ra lỗi. Xóa không thành công.';
		}
		else{
			redirect('admin/image');
		}
	}
}
