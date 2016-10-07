<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lienhe extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('vt');
		$this->load->model('check');
		$this->load->helper('mystring');
		$this->load->helper('paginationconfig');
		if(!$this->session->has_userdata('admin_id')){
			redirect('admin/taikhoan/login');
		}
	}
	public function index(){
		$rs 			=	$this->db->get('lienhe');
		$currentPage 	= 	$this->uri->segment(4,1);
		$config 		=	paginationConfig();
		$config['uri_segment'] = 4;
		$config['base_url'] = base_url().'admin/lienhe/index/';
		$config['total_rows'] = $rs->num_rows();
		$this->pagination->initialize($config);
		$rs = $this->db->select('idlh,tieude,email,dienthoai,tinhtrang,noidung')
						->order_by('tinhtrang')->get_where('lienhe',array(),$config['per_page'],($currentPage-1)*$config['per_page']);
		if($rs->num_rows()>0){
			foreach($rs->result() as $v){
				$data['row'][] =	$v;
			}
		}
		$data['stt']	= 1;
		$data['view'] 	= 'backend/modules/lienhe/index';
		$this->load->view('backend/layout/home',$data);
	}
	public function update(){
		$idlh = $this->uri->segment(4,0);
		if($this->input->post('update')){
			$this->form_validation->set_rules('tinhtrang', 'Tình trạng', 'trim|required|xss_clean|html_escape');
			if ($this->form_validation->run() == FALSE) {
				$data['thongbao'] = validation_errors();
			} else {
					$dataUpdate = array(
					'tinhtrang'			=> 	$this->input->post('tinhtrang'),
				);
				if(!$this->db->update('lienhe',$dataUpdate,array('idlh'=>$idlh))){
					$data['thongbao'] = 'Đã xảy ra lỗi, cập nhật không thành công.';
				}
				else{
					redirect('admin/lienhe');
				}
			}
		}
		$rs = $this->db->select('noidung,tinhtrang')->get_where('lienhe',array('idlh'=>$idlh));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r);
			$data['r'] =$r;
		}
		$csrf = array(
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
		);
		$data['view'] = 'backend/modules/lienhe/update';
		$data['csrf'] = $csrf;
		$this->load->view('backend/layout/home',$data);
	}
	function delete(){
		$idlh = $this->uri->segment(4,0);
		if(!$this->db->delete('lienhe',array('idlh'=>$idlh))){
			echo 'Đã xảy ra lỗi. Xóa không thành công.';
		}
		else{
			redirect('admin/lienhe');
		}
	}
}
