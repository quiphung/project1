<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Chuyenmuc extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('vt');
		$this->load->model('check');
		$this->load->helper('paginationconfig');
		if(!$this->session->has_userdata('admin_id')){
			redirect('admin/taikhoan/login');
		}
	}
	public function index(){
		/*$dataloai 		= $this->vt->getloaiall();
		$loai 			= $this->vt->getloaiall2(0,$dataloai,'');
		$data['stt']    = 1;
		$data['loai']	= $loai;*/
		$rs 			=	$this->db->get('chuyenmuc');
		$currentPage 	= 	$this->uri->segment(4,1);
		$config 		=	paginationConfig();
		$config['uri_segment'] = 4;
		$config['base_url'] = base_url().'admin/chuyenmuc/index/';
		$config['total_rows'] = $rs->num_rows();
		$this->pagination->initialize($config);
		$rs = $this->db->select('idcm,tieude,solanxem,anhien,noibat,thutu,alias')
						->order_by('thutu')->get_where('chuyenmuc',array(),$config['per_page'],($currentPage-1)*$config['per_page']);
		if($rs->num_rows()>0){
			foreach($rs->result() as $v){
				$data['row'][] =	$v;
			}
		}
		$data['stt']	= 1;
		$data['view'] 	= 'backend/modules/chuyenmuc/index';
		$this->load->view('backend/layout/home',$data);
	}
	public function insert(){
		if($this->input->post('tieude')){
			$this->form_validation->set_rules('tieude', 'Tiêu đề', 'trim|required|min_length[2]|max_length[100]|xss_clean|html_escape');
			//$this->form_validation->set_rules('loai', 'Loại', 'trim|required|numeric');
			$this->form_validation->set_rules('thutu', 'Thứ tự', 'trim|numeric');
			$this->form_validation->set_rules('mota', 'Mô tả', 'trim|xss_clean');
			$this->form_validation->set_message('required', '{field} không được để trống.');
			$this->form_validation->set_message('min_length', '{field} phải có ít nhất {param} ký tự.');
			$this->form_validation->set_message('max_length', '{field} nhiều nhất là {param} ký tự.');
			if ($this->form_validation->run() == FALSE) {
				$data['thongbao'] = validation_errors();
			} else {
				$upload = 1;
				$tieude = set_value('tieude');
				$query = $this->db->get_where('chuyenmuc',array('tieude'=>$tieude));
				if($query->result()){
					$upload = 0;
					$data['thongbao'] = 'Tiêu đề đã tồn tại';
				}
				if($upload==1){
					$mota = set_value('mota');
					if($this->input->post('anhien'))
						{$anhien = 1;}
					else{$anhien = 0;}
					if($this->input->post('noibat'))
						{$noibat = 1;}
					else{$noibat = 0;}
					$dataInsert = array(
						/*'idcha'			=>	set_value('loai'),*/
						'tieude'		=> 	$tieude,
						'alias'			=>	$alias = $this->check->checkurlloai($this->check->url_slug($tieude)),
						'thutu'			=> 	set_value('thutu'),
						'anhien'		=>	$anhien,
						'noibat'		=>	$noibat,
						'title'			=> 	$tieude,
						'description'	=> 	strip_tags($this->input->post('mota')),
					);
					if(!$this->db->insert('chuyenmuc',$dataInsert)){
						$data['thongbao'] = 'Đã xảy ra lỗi, thêm không thành công.';
					}
					else{
						if($this->input->post('gohome')!==null)
							redirect('admin/chuyenmuc');
						if($this->input->post('goedit')!==null)
							redirect('admin/chuyenmuc/update/'.$this->db->insert_id());
					}
				}
			}
		}
		/*
		$dataloai = $this->vt->getloai();
		$loai = $this->vt->getloai2(0,$dataloai,'');*/
		//$data['rloai'] = $loai;
		$csrf = array(
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;
		$data['view'] = 'backend/modules/chuyenmuc/insert';
		$this->load->view('backend/layout/home',$data);
	}
	public function update(){
		$idcm = $this->uri->segment(4,0);
		if($this->input->post('tieude')){
			$this->form_validation->set_rules('tieude', 'Tiêu đề', 'trim|required|min_length[2]|max_length[100]|xss_clean|html_escape');
			//$this->form_validation->set_rules('loai', 'Loại', 'trim|required|numeric');
			$this->form_validation->set_rules('thutu', 'Thứ tự', 'trim|numeric');
			$this->form_validation->set_message('required', '{field} không được để trống.');
			$this->form_validation->set_message('min_length', '{field} phải có ít nhất {param} ký tự.');
			$this->form_validation->set_message('max_length', '{field} nhiều nhất là {param} ký tự.');
			if ($this->form_validation->run() == FALSE) {
				$data['thongbao'] = validation_errors();
			} else {
				$upload = 1;
				$tieude = set_value('tieude');
				$query = $this->db->get_where('chuyenmuc',array('tieude'=>$tieude,'idcm !='=>$idcm));
				if($query->result()){
					$upload = 0;
					$data['thongbao'] = 'Tiêu đề đã tồn tại';
				}
				if($upload==1){
					if($this->input->post('anhien'))
						{$anhien = 1;}
					else{$anhien = 0;}
					if($this->input->post('noibat'))
						{$noibat = 1;}
					else{$noibat = 0;}
					$dataUpdate = array(
						/*'idcha'			=>	set_value('loai'),*/
						'tieude'		=> 	$tieude,
						'alias'			=>	$this->check->checkurlloai($this->check->url_slug($tieude)),
						'thutu'			=> 	$this->input->post('thutu'),
						'anhien'		=>	$anhien,
						'noibat'		=>	$noibat,
						'title'			=> 	$tieude,
					);
					if(!$this->db->update('chuyenmuc',$dataUpdate,array('idcm'=>$idcm))){
						$data['thongbao'] = 'Đã xảy ra lỗi, cập nhật không thành công.';
					}
					else{
						redirect('admin/chuyenmuc/index');
					}
				}
			}
		}
		elseif($this->input->post('title')){
			$this->form_validation->set_rules('title','Title','trim|xss_clean|html_escape');
			$this->form_validation->set_rules('url', 'Url', 'trim|xss_clean|html_escape');
			$this->form_validation->set_rules('mota', 'Description', 'trim|xss_clean');
			if($this->form_validation->run()==FALSE){
				$data['thongbao'] = validation_errors();
			}
			else{
				$rsloai = $this->db->get_where('chuyenmuc',array('idcm'=>$idcm));
				if(!$rsloai->result()){
					echo 'Loại không tồn tại';
					die();
				}
				else{
					foreach ($rsloai->result() as $key => $value) {
						# code...
						$r[] = $value;
					}
				}
				if(!$this->input->post('title')){
					$title = $r[0]->Title;
				}
				else{
					$title = set_value('title');
				}
				if(!$this->input->post('url')){
					$url = $r[0]->Alias;
				}
				else{
					$url = $this->check->checkurlloai($this->check->url_slug($this->input->post('url')),$idcm);
				}
				$mota = strip_tags($this->input->post('mota'));
				$dataUpdate = array(
					'title' 		=>	$title,
					'alias'			=>	$url,
					'description'	=>	$mota,
				);
				if(!$this->db->update('chuyenmuc',$dataUpdate,array('idcm'=>$idcm))){
					$data['thongbao'] = 'Đã xảy ra lỗi, Cập nhật không thành công';
				}
				else{
					redirect('admin/chuyenmuc/index');
				}
			}
		}
		else{
			$rsloai = $this->db->get_where('chuyenmuc',array('idcm'=>$idcm));
			if(!$rsloai->result()){
				echo 'Loại không tồn tại';
				die();
			}
			else{
				foreach ($rsloai->result() as $key => $value) {
					# code...
					$data['loai'] = $value;
				}
			}
		}
		//$dataloai = $this->vt->getloai($idcm);
		//$loai = $this->vt->getloai2(0,$dataloai,'');
		//$data['rloai'] = $loai;
		$csrf = array(
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
		);
		$data['view'] = 'backend/modules/chuyenmuc/update';
		$data['csrf'] = $csrf;
		$this->load->view('backend/layout/home',$data);
	}
	function delete(){
		$idcm = $this->uri->segment(4,0);
		if(!$this->db->delete('chuyenmuc',array('idcm'=>$idcm,'idcm !='=>4))){
			echo 'Đã xảy ra lỗi. Xóa không thành công.';
		}
		else{
			redirect('admin/chuyenmuc');
		}
	}
}
