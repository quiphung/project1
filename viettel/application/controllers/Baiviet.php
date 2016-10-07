<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class BaiViet extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('vt');
		$this->load->model('bv');
		$this->load->helper('mystring');
		$this->load->helper('paginationConfig');
	}
	public function index()
	{
		$data['rmenu']	=	$this->vt->menu();
		$data['image']	= 	$this->vt->image();
		foreach($data['image'] as $k=>$v){
			if($v->loai==0){
				$data['slide'][] = $v;
			}
		}
		$data['tinhot']			=	$this->vt->tinhot();
		$data['chuyenmuc']		= 	$this->bv->chuyenmuc();
		$data['tags']			=	$this->bv->gettag();
		$data['bvnew']			=	$this->bv->getbvnew();
		$data['dmright']		= 	$this->bv->getdmright();
		$data['bvgoicuoc']		= 	$this->bv->getbvgoicuoc();
		$data['mucxemnhieu']	=	$this->bv->mucxemnhieu();
		$data['bvxemnhieu']		=	$this->bv->bvxemnhieu();
		$rsbvindex				=	$this->db->select('noidung')
											->order_by('idbv','desc')
											->limit(1,0)
											->get_where('baiviet',array('iddm'=>16));
		if($rsbvindex->num_rows()>0){
			foreach($rsbvindex->result() as $r);
			$data['bv'][] = $r;
		}
		$data['view']					=	'frontend/modules/index';
		$this->load->view('frontend/layout/home',$data);
	}
	function detail(){
		$alias = $this->uri->segment(2,0);
		$pattern = '/(.*)-post/';
		preg_match($pattern, $alias, $m);
		if($alias&&is_numeric($alias)==false&&count($m)>0){
			$alias = $m[1];
			$this->db->set('solanxem','solanxem + 1',false);
			$this->db->where('alias',$alias);
			$this->db->update('baiviet');
			$rs = $this->db->select('idbv,iddm,idcm,tieude,noidung,ngaydang,solanxem,title,description')
							->get_where('baiviet',array('alias'=>$alias));
			if($rs->num_rows()>0){
				foreach($rs->result() as $k=>$v){
					$data['bvdetail'] 		= $v;
					$data['title'] 			= $v->title;
					$data['description'] 	= $v->description;
				}
			}
			if($v->idcm){
				$this->db->set('solanxem','solanxem + 1',false);
				$this->db->where('idcm',$v->idcm);
				$this->db->update('chuyenmuc');
			}
			$data['tag']	=	$this->bv->gettagid($v->idbv);					
			$rslienquan		=	$this->db->select('idbv,tieude,urlhinh,alias')
										->order_by('idbv','desc')
										->limit(6,0)
										->where('idbv !=',$v->idbv)
										->where('iddm !=',0)
										->where('idcm !=',0)
										->where("(iddm = $v->iddm or idcm = $v->idcm)",null,false)
										->get('baiviet');
			if($rslienquan->num_rows()>0){
				foreach($rslienquan->result() as $k=>$v){
					$data['bvlienquan'][] = $v;
				}
			}
			$data['view']	=	'frontend/modules/detail';
		}
		else{
			if($this->uri->segment(2,0)&&is_numeric($this->uri->segment(2,0))==false){
				$alias 	= 	$this->uri->segment(2,0);
				$x     	=	2;
			}
			else{
				$alias	= 	$this->uri->segment(1,0);
				$x		= 1;
			}
			$data['alias']	=	$alias;
			$rsdanhmuc 		=	$this->db->select('iddm,tieude,title,description')->get_where('danhmuc',array('alias'=>$alias));
			if($rsdanhmuc->num_rows()>0){
				foreach($rsdanhmuc->result() as $k=>$v);
				$iddm = $v->iddm;
				$data['tieude'] = $v->tieude;
				$data['title'] = $v->title;
				$data['description'] = $v->description;
			}
			else{
				$iddm = '';
			}
			$rschuyenmuc 	=	$this->db->select('idcm,tieude,title,description')->get_where('chuyenmuc',array('alias'=>$alias));
			if($rschuyenmuc->num_rows()>0){
				foreach($rschuyenmuc->result() as $k=>$v);
				$idcm = $v->idcm;
				$data['tieude'] = $v->tieude;
				$data['title'] = $v->title;
				$data['description'] = $v->description;
			}
			else{
				$idcm = null;
			}
			$config 				=	paginationConfig();
			$config['per_page']		= 	12;
			if($x==1){	
				$currentPage 			= 	$this->uri->segment(2,1);
				$config['uri_segment'] 	= 	2;
				$config['base_url'] 	= 	base_url().$alias.'/';
			}
			if($x==2){	
				$currentPage 			= 	$this->uri->segment(3,1);
				$config['uri_segment'] 	= 	3;
				$config['base_url'] 	= 	base_url().$this->uri->segment(1,1).'/'.$alias.'/';
			}
			$config['total_rows'] 	= 	$this->bv->totalbv($iddm,$idcm);
			$this->pagination->initialize($config);
			$data['bv'] = $this->bv->getbaiviet($iddm,$idcm,$config['per_page'],($currentPage-1)*$config['per_page']);
			//echo '<pre>';print_r($data['bv']);echo '</pre>';die();
			if($config['total_rows']==1){
				$data['tag']	=	$this->bv->gettagid($data['bv'][0]->idbv);
				$data['view'] = 'frontend/modules/detail2';
			}
			else{
				$data['view'] = 'frontend/modules/danhmuc';
			}
		}
		$data['rmenu']	=	$this->vt->menu();
		$data['image']	= 	$this->vt->image();
		foreach($data['image'] as $k=>$v){
			if($v->loai==0){
				$data['slide'][] = $v;
			}
		}
		$data['tinhot']			=	$this->vt->tinhot();
		$data['chuyenmuc']		= 	$this->bv->chuyenmuc();
		$data['tags']			=	$this->bv->gettag();
		$data['bvnew']			=	$this->bv->getbvnew();
		$data['dmright']		= 	$this->bv->getdmright();
		$data['bvgoicuoc']		= 	$this->bv->getbvgoicuoc();
		$data['mucxemnhieu']	=	$this->bv->mucxemnhieu();
		$data['bvxemnhieu']		=	$this->bv->bvxemnhieu();
		$this->load->view('frontend/layout/home',$data);
		
	}
	function tintuc(){
		$data['rmenu']	=	$this->vt->menu();
		$data['image']	= 	$this->vt->image();
		$data['tinhot']			=	$this->vt->tinhot();
		$data['mucxemnhieu']	=	$this->bv->mucxemnhieu();
		$data['bvxemnhieu']		=	$this->bv->bvxemnhieu();
		$data['bvnew']			=	$this->bv->getbvnew();
		$data['cmnb']			= 	$this->bv->getcmnb();
		$this->load->view('frontend/layout/tintuc',$data);
	}
	function chuyenmuc(){
		$data['rmenu']	=	$this->vt->menu();
		$data['image']	= 	$this->vt->image();
		$data['tinhot']			=	$this->vt->tinhot();
		$data['chuyenmuc']		= 	$this->bv->chuyenmuc();
		$data['tags']			=	$this->bv->gettag();
		$data['bvnew']			=	$this->bv->getbvnew();
		$data['dmright']		= 	$this->bv->getdmright();
		$data['bvgoicuoc']		= 	$this->bv->getbvgoicuoc();
		$data['mucxemnhieu']	=	$this->bv->mucxemnhieu();
		$data['bvxemnhieu']		=	$this->bv->bvxemnhieu();
		$alias = $this->uri->segment(2,0);
		$data['cmmain']		=	$this->bv->getchuyenmucalias($alias);
		foreach($data['cmmain'] as $r);
		$data['title']			=	$r->title;
		$data['description']	=	$r->description;
		$bvcm				= 	$this->bv->getbvcm($r->idcm);
		$currentPage 		= 	$this->uri->segment(3,1);
		$config 			=	paginationConfig();
		$config['per_page']	=	15;
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'chuyen-muc/'.$alias.'/';
		$config['total_rows'] = count($bvcm);
		$this->pagination->initialize($config);
		$rs = $this->db->select('idbv,tieude,urlhinh,tomtat,ngaydang,alias')
					->order_by('idbv','desc')->get_where('baiviet',array('idcm'=>$r->idcm),$config['per_page'],($currentPage-1)*$config['per_page']);
		if($rs->num_rows()>0){
			foreach($rs->result() as $r ){
				$data['bv'][]	=	$r;
			}
		}
		$data['alias'] = $alias;
		$this->load->view('frontend/layout/chuyenmuc',$data);
	}
	function tag(){
		$data['rmenu']	=	$this->vt->menu();
		$data['image']	= 	$this->vt->image();
		$data['tinhot']			=	$this->vt->tinhot();
		$data['chuyenmuc']		= 	$this->bv->chuyenmuc();
		$data['tags']			=	$this->bv->gettag();
		$data['bvnew']			=	$this->bv->getbvnew();
		$data['dmright']		= 	$this->bv->getdmright();
		$data['bvgoicuoc']		= 	$this->bv->getbvgoicuoc();
		$data['mucxemnhieu']	=	$this->bv->mucxemnhieu();
		$data['bvxemnhieu']		=	$this->bv->bvxemnhieu();
		$alias = $this->uri->segment(2,0);
		$tag 	= $this->bv->gettagalias($alias);
		$currentPage 		= 	$this->uri->segment(3,1);
		$config 			=	paginationConfig();
		$config['per_page']	=	12;
		$config['uri_segment'] = 3;
		$config['base_url'] = base_url().'tag/'.$alias.'/';
		$config['total_rows'] = count($tag);
		$this->pagination->initialize($config);
		$rs = $this->db->select('bv.idbv,bv.tieude,bv.urlhinh,bv.tomtat,bv.ngaydang,bv.alias')
					->join('itemtag as item','item.idbv = bv.idbv')
					->join('tags as tag','tag.idtag = item.idtag')
					->where('tag.alias',$alias)
					->order_by('bv.idbv','desc')
					->limit($config['per_page'],($currentPage-1)*$config['per_page'])
					->get('baiviet bv');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r ){
				$data['bv'][]	=	$r;
			}
		}
		$data['title']	= $tag[0]->tieude;
		$data['alias'] 	= $alias;
		$data['view']	= 'frontend/modules/danhmuctag';
		$this->load->view('frontend/layout/home',$data);
	}
	function lienhe(){
		$data['rmenu']	=	$this->vt->menu();
		$data['image']	= 	$this->vt->image();
		foreach($data['image'] as $k=>$v){
			if($v->loai==0){
				$data['slide'][] = $v;
			}
		}
		$data['tinhot']			=	$this->vt->tinhot();
		$data['chuyenmuc']		= 	$this->bv->chuyenmuc();
		$data['tags']			=	$this->bv->gettag();
		$data['bvnew']			=	$this->bv->getbvnew();
		$data['dmright']		= 	$this->bv->getdmright();
		$data['bvgoicuoc']		= 	$this->bv->getbvgoicuoc();
		$data['mucxemnhieu']	=	$this->bv->mucxemnhieu();
		$data['bvxemnhieu']		=	$this->bv->bvxemnhieu();
		$csrf = array(
	        'name' => $this->security->get_csrf_token_name(),
	        'hash' => $this->security->get_csrf_hash()
		);
		if($this->input->post('title')){
			$this->form_validation->set_rules('title', 'Tiêu đề', 'trim|required|xss_clean|html_escape');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|html_escape');
			$this->form_validation->set_rules('phone', 'Phone', 'trim|required|xss_clean|html_escape');
			$this->form_validation->set_rules('message', 'Message', 'trim|required|xss_clean|html_escape');
			$this->form_validation->set_rules('captcha', 'Mã captcha', 'trim|required|xss_clean|html_escape|strtoupper');
			if ($this->form_validation->run() == FALSE) {
				# code...
				$data['thongbao'] = validation_errors();
			} else {
				# code...
				if($this->input->post('captcha')!=$this->session->userdata('captcha')){
					$data['thongbao'] = 'Mã captcha không đúng.';
				}
				else{
					$dataInsert = array(
						'tieude' 	=> $this->input->post('title'),
						'email' 	=> $this->input->post('email'),
						'dienthoai' => $this->input->post('phone'),
						'noidung' 	=> $this->input->post('message'),
					);
					if(!$this->db->insert('lienhe',$dataInsert)){
						$data['thongbao'] = 'Đã xảy ra lỗi, gửi tin nhắn không thành cồng.';
					}
					else{
						$data['thongbao2'] = 'Tin nhắn của bạn đã được gửi.';
					}
				}
			}
		}
		$this->captcha();
		$data['view'] = 'frontend/modules/contact'; 
		$this->load->view('frontend/layout/home',$data);
	}
	function ajaxdmbv(){
		$iddm = $this->uri->segment(3,0);
		$alias = $this->bv->getdanhmucalias($iddm);
		$dmbv = $this->vt->danhmucbaivietnext($iddm);
		$data = '';
   		foreach($dmbv as $kv){ 
   			$link = base_url().$alias[0]->alias.'/'.$kv->alias.'-post.html';
   			$data .= '<div class="item col-md-2">';
   			if($kv->urlhinh){
   				$data .= '<a href="'.$link.'"><img src="'.$kv->urlhinh.'"></a>';
   			}
			$data .= '<p><a href="'.$link.'">'.$kv->tieude.'</a></p>';
			$data .= '</div>';
		}
		echo $data;
	}
	function ajaxdmbvprev(){
		$iddm = $this->uri->segment(3,0);
		$alias = $this->bv->getdanhmucalias($iddm);
		$dmbv = $this->vt->danhmucbaivietprev($iddm);
		$data = '';
   		foreach($dmbv as $kv){
   			$link = base_url().$alias[0]->alias.'/'.$kv->alias.'-post.html'; 
   			$data .= '<div class="item col-md-2">';
   			if($kv->urlhinh){
   				$data .= '<a href="'.$link.'"><img src="'.$kv->urlhinh.'"></a>';
   			}
			$data .= '<p><a href="'.$link.'">'.$kv->tieude.'</a></p>';
			$data .= '</div>';
		}
		echo $data;
	}
	function ajaxcmbv(){
		$idcm 	= 	$this->uri->segment(3,0);
		$bvcm 	= 	$this->bv->cmbvnext($idcm);
		$alias	=	$this->bv->getaliascm($idcm);
		$data 	= '';
		$link 	=	base_url().$alias[0]->alias.'/'.$bvcm[0]->alias.'-post.html';
		$data 	.=	'<div class="col-md-6 item1"><a href="'.$link.'"><img src="'.$bvcm[0]->urlhinh.'"></a>';
		$data 	.=	'<p><a href="'.$link.'">'.$bvcm[0]->tieude.'</a></p>';
		$data 	.=	'<span class="glyphicon glyphicon-calendar"></span><i>'.date('d/m/Y',$bvcm[0]->ngaydang).'</i>';
		$data  	.=	'<div class="summary">'.cutnchar($bvcm[0]->tomtat,200).'</div></div>';
		$data  	.=	'<div class="col-md-6 item2">';
		for($i=1;$i<5;$i++){
			if(isset($bvcm[$i])){
			$link = base_url().$alias[0]->alias.'/'.$bvcm[$i]->alias.'-post.html';
				$data .= '<div class="col-md-12 p item"><div class="col-md-4 p"><a href="'.$link.'"><img src="'.$bvcm[$i]->urlhinh.'"></a>';
				$data .=	'</div><div class="col-md-8 pp"><p><a href="'.$link.'">'.$bvcm[$i]->tieude.'</a></p>';
				$data .=	'<span class="glyphicon glyphicon-calendar"></span><i>'.date('d/m/Y',$bvcm[$i]->ngaydang).'</i></div></div>';
			}
		}
		$data 	.=	'</div>';
		echo $data;
	}
	function ajaxcmbvprev(){
		$idcm = $this->uri->segment(3,0);
		$bvcm = $this->bv->cmbvprev($idcm);
		$alias	=	$this->bv->getaliascm($idcm);
		$data 	= '';
		$link 	=	base_url().$alias[0]->alias.'/'.$bvcm[0]->alias.'-post.html';
		$data 	.=	'<div class="col-md-6 item1"><a href="'.$link.'"><img src="'.$bvcm[0]->urlhinh.'"></a>';
		$data 	.=	'<p><a href="'.$link.'">'.$bvcm[0]->tieude.'</a></p>';
		$data 	.=	'<span class="glyphicon glyphicon-calendar"></span><i>'.date('d/m/Y',$bvcm[0]->ngaydang).'</i>';
		$data  	.=	'<div class="summary">'.cutnchar($bvcm[0]->tomtat,200).'</div></div>';
		$data  	.=	'<div class="col-md-6 item2">';
		for($i=1;$i<5;$i++){
			if(isset($bvcm[$i])){
			$link = base_url().$alias[0]->alias.'/'.$bvcm[$i]->alias.'-post.html';
				$data .= '<div class="col-md-12 p item"><div class="col-md-4 p"><a href="'.$link.'"><img src="'.$bvcm[$i]->urlhinh.'"></a>';
				$data .=	'</div><div class="col-md-8 pp"><p><a href="'.$link.'">'.$bvcm[$i]->tieude.'</a></p>';
				$data .=	'<span class="glyphicon glyphicon-calendar"></span><i>'.date('d/m/Y',$bvcm[$i]->ngaydang).'</i></div></div>';
			}
		}
		$data 	.=	'</div>';
		echo $data;
	}
	function search(){
		$data['rmenu']	=	$this->vt->menu();
		$data['image']	= 	$this->vt->image();
		$data['tinhot']			=	$this->vt->tinhot();
		$data['chuyenmuc']		= 	$this->bv->chuyenmuc();
		$data['tags']			=	$this->bv->gettag();
		$data['bvnew']			=	$this->bv->getbvnew();
		$data['dmright']		= 	$this->bv->getdmright();
		$data['bvgoicuoc']		= 	$this->bv->getbvgoicuoc();
		$data['mucxemnhieu']	=	$this->bv->mucxemnhieu();
		$data['bvxemnhieu']		=	$this->bv->bvxemnhieu();
		$keyword = $this->session->userdata('keyword');
		$data['keyword']	= $keyword;
		$keyword = explode(' ', $keyword);
		$data['bv']  	= 	$this->bv->getbvkey($keyword);
		$data['view']	=	'frontend/modules/search';
		$this->load->view('frontend/layout/home',$data);
	}
	function searchajax(){
		if($this->input->post('keyword')){
			$this->form_validation->set_rules('keyword', 'keyword', 'trim|xss_clean|html_escape');
			if ($this->form_validation->run() == TRUE) {
				# code...
				$this->session->set_userdata('keyword',$this->input->post('keyword'));
				echo $keyword;
			} 
		}
	}
	function searchkeydown(){
		if($this->input->post('keyword')){
			$this->form_validation->set_rules('keyword', 'keyword', 'trim|xss_clean|html_escape');
			if ($this->form_validation->run() == TRUE) {
				# code...
				$keyword = $this->input->post('keyword');
				$this->session->set_userdata('keyword',$keyword);
				$keyword	= 	explode(' ', $keyword);
				$rs  	= 	$this->bv->getbvkeyajax($keyword);
				$data = '';
				if(is_array($rs)){
					foreach($rs as $k=>$v){
						$alias = $this->bv->getalias($v->idbv);
						$data .= '<a href="'.base_url().$alias[0]->alias.'/'.$v->alias.'-post.html"><p>';
						$data .= $v->tieude;
						$data .= '</p></a>';
					}
				}
				echo $data; 
			} 
		} 
	}
	function captcha(){
		$this->load->library('antispam');
	    $configs = array( 
	                            'img_path'  => './captcha/image/',//đường dẫn để tạo img captcha.
	                            'img_url'   => base_url().'captcha/image/',//đường dẫn đến img captcha.
	                            'font_name' => 'impact.ttf',//font chữ dùng trong img
	                            'font_path' => './captcha/font/',//nơi chứa font chữ
	                            'img_width' => '120',//chiều dài của captcha
	                            'img_height'=> '40',//chiều cao của captcha
	                            'char_set'  => "ABCDEFGHJKLMNPQRSTUVWXYZ2345689",//Các ký tự sẽ random trong hình
	                            'char_length' => 5,//số lượng ký tự sẽ xuất hiện
	                            'char_color'     => "#880000,#008800,#000088,#888800,#880088,#008888,#000000" //Các màu sắc của ký tự
	                        );
	    $captcha = $this->antispam->get_antispam_image($configs);
	    $session = array(
	                    'word'  =>$captcha['word'],
	                    'image' =>$captcha['image']
	                    );
	    $this->session->set_userdata('captchaimg',$session['image']);
	    $this->session->set_userdata('captcha',$session['word']); 
	}
	function resetCaptcha(){
		$this->captcha();
		echo $this->session->userdata('captchaimg');
	}
}
