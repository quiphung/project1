<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Right extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('vt');
		$this->load->model('check');
		if(!$this->session->has_userdata('admin_id')){
			redirect('admin/taikhoan/login');
		}
	}
	public function index(){
		$dataloai 			= 	$this->vt->danhmucall();
		$loai 				= 	$this->vt->danhmucall2(0,$dataloai,'');
		$rschuyenmuc		=	$this->db->select('idcm,tieude')->get('chuyenmuc');
		if($rschuyenmuc->num_rows()>0){
			foreach($rschuyenmuc->result() as $r){
				$data['chuyenmuc'][]	=	$r;
			}
		}
		$data['stt']    = 1;
		$data['loai']	= $loai;
		$data['view'] 	= 'backend/modules/danhmuc/index';
		$this->load->view('backend/layout/home',$data);
	}
	public function insert(){
		if($this->input->post('tieude')){
			$this->form_validation->set_rules('tieude', 'Tiêu đề', 'trim|required|min_length[2]|max_length[100]|xss_clean|html_escape');
			$this->form_validation->set_rules('kieu', 'Kiểu hiển thị', 'trim|required|numeric|xss_clean|html_escape');
			$this->form_validation->set_rules('danhmuc[]', 'Danh mục', 'trim|numeric');
			$this->form_validation->set_rules('thutu', 'Thứ tự', 'trim|numeric');
			$this->form_validation->set_message('required', '{field} không được để trống.');
			$this->form_validation->set_message('min_length', '{field} phải có ít nhất {param} ký tự.');
			$this->form_validation->set_message('max_length', '{field} nhiều nhất là {param} ký tự.');
			if ($this->form_validation->run() == FALSE) {
				$data['thongbao'] = validation_errors();
			} else {
				$upload = 1;
				$tieude = set_value('tieude');
				$query = $this->db->get_where('danhmucright',array('tieude'=>$tieude));
				if($query->result()){
					$upload = 0;
					$data['thongbao'] = 'Tiêu đề đã tồn tại';
				}
				if(set_value('danhmuc')){
					$danhmuc	=	json_encode(set_value('danhmuc'));
				}
				else{
					$danhmuc = '';
				}
				if($upload==1){
					if($this->input->post('anhien'))
						{$anhien = 1;}
					else{$anhien = 0;}
					$dataInsert = array(
						'tieude'		=> 	$tieude,
						'danhmuc'		=>	$danhmuc,
						'hienthi'	=>	set_value('kieu'),
						'thutu'			=> 	set_value('thutu'),
						'anhien'		=>	$anhien,
					);
					if(!$this->db->insert('danhmucright',$dataInsert)){
						$data['thongbao'] = 'Đã xảy ra lỗi, thêm không thành công.';
					}
					else{
						if($this->input->post('gohome')!==null)
							redirect('admin/right');
						if($this->input->post('goedit')!==null)
							redirect('admin/right/update/'.$this->db->insert_id());
					}
				}
			}
		}
		$data['danhmuc']	= 	$this->vt->danhmuc();
		$csrf = array(
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;
		$data['view'] = 'backend/modules/right/insert';
		$this->load->view('backend/layout/home',$data);
	}
	public function update(){
		$iddm = $this->uri->segment(4,0);
		$rs = $this->db->get_where('danhmuc',array('iddm'=>$iddm));
		if(!$rs->result()){
			echo 'Loại không tồn tại';
			die();
		}
		else{
			foreach ($rs->result() as $key => $value) {
				# code...
				$data['r'] = $value;
			}
		}
		$data['rloai']		=	json_decode($data['r']->Loai,true);
		$data['rchuyenmuc'] = 	json_decode($data['r']->ChuyenMuc,true);
		if($this->input->post('tieude')){
			$this->form_validation->set_rules('tieude', 'Tiêu đề', 'trim|required|min_length[2]|max_length[100]|xss_clean|html_escape');
			$this->form_validation->set_rules('kieu', 'Kiểu hiển thị', 'trim|required|numeric|xss_clean|html_escape');
			$this->form_validation->set_rules('loai[]', 'Loại', 'required');
			$this->form_validation->set_rules('danhmuc', 'Danh mục cha', 'trim|numeric');
			
			$this->form_validation->set_rules('thutu', 'Thứ tự', 'trim|numeric');
			$this->form_validation->set_message('required', '{field} không được để trống.');
			$this->form_validation->set_message('min_length', '{field} phải có ít nhất {param} ký tự.');
			$this->form_validation->set_message('max_length', '{field} nhiều nhất là {param} ký tự.');
			if ($this->form_validation->run() == FALSE) {
				$data['thongbao'] = validation_errors();
			} else {
				$upload = 1;
				$tieude = set_value('tieude');
				$query = $this->db->get_where('danhmuc',array('tieude'=>$tieude,'iddm !='=>$iddm));
				if($query->result()){
					$upload = 0;
					$data['thongbao'] = 'Tiêu đề đã tồn tại';
				}
				if(set_value('chuyenmuc')){
					$chuyenmuc	=	json_encode(set_value('chuyenmuc'));
				}
				else{
					$chuyenmuc = '';
				}
				if(set_value('loai')){
					$loai	=	json_encode(set_value('loai'));
				}
				else{
					$loai = '';
				}
				if($upload==1){
					$mota = set_value('mota');
					if($this->input->post('anhien'))
						{$anhien = 1;}
					else{$anhien = 0;}
					$dataUpdate = array(
						'idcha'			=>	set_value('danhmuc'),
						'tieude'		=> 	$tieude,
						'loai'			=>	$loai,
						'chuyenmuc'		=>	$chuyenmuc,
						'kieuhienthi'	=>	set_value('kieu'),
						'alias'			=>	$alias = $this->check->checkurldanhmuc($this->check->url_slug($tieude),$iddm),
						'thutu'			=> 	set_value('thutu'),
						'anhien'		=>	$anhien,
						'title'			=> 	$tieude,
					);
					if(!$this->db->update('danhmuc',$dataUpdate,array('iddm'=>$iddm))){
						$data['thongbao'] = 'Đã xảy ra lỗi, cập nhật không thành công.';
					}
					else{
							redirect('admin/danhmuc');
					}
				}
			}
		}
		elseif($this->input->post('title')){
			$this->form_validation->set_rules('title','Title','trim|xss_clean|html_escape');
			$this->form_validation->set_rules('url', 'Url', 'trim|xss_clean|html_escape');
			$this->form_validation->set_rules('mota', 'Description', 'trim|xss_clean|strip_tags');
			if($this->form_validation->run()==FALSE){
				$data['thongbao'] = validation_errors();
			}
			else{
				$rsloai = $this->db->get_where('danhmuc',array('iddm'=>$iddm));
				if(!$rsloai->result()){
					echo 'Danh mục không tồn tại';
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
					$url = $this->check->checkurldanhmuc($this->check->url_slug($this->input->post('url')),$iddm);
				}
				$mota = strip_tags(set_value('mota'));
				$dataUpdate = array(
					'title' 		=>	$title,
					'alias'			=>	$url,
					'description'	=>	$mota,
				);
				if(!$this->db->update('danhmuc',$dataUpdate,array('iddm'=>$iddm))){
					$data['thongbao'] = 'Đã xảy ra lỗi, Cập nhật không thành công';
				}
				else{
					redirect('admin/danhmuc');
				}
			}
		}
		/*
		$danhmuc 			= 	$this->vt->danhmuc($iddm);
		$data['danhmuc'] 	=	$this->vt->danhmuc2(0,$danhmuc,'');*/
		$a	=	$this->vt->danhmuc();
		foreach($a as $k){
			print_r($k);
		}
		$data['iddm']		=	$iddm;
		$csrf = array(
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
		);
		$data['csrf'] = $csrf;
		$data['view'] = 'backend/modules/danhmuc/update';
		$this->load->view('backend/layout/home',$data);
	}
	function delete(){
		$iddm = $this->uri->segment(4,0);
		if(!$this->db->delete('danhmuc',array('iddm'=>$iddm))){
			echo 'Đã xảy ra lỗi. Xóa không thành công.';
		}
		else{
			redirect('admin/danhmuc');
		}
	}
}
