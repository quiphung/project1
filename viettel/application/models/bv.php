<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bv extends CI_Model {
	public $reloai;
	public $redanhmuc;
	function __construct(){
		parent::__construct();
		$this->load->helper('paginationConfig');
		$this->reloai = '';
	}
	function chuyenmuc(){
		$rs = $this->db->select('tieude,alias')
						->order_by('tieude')
						->get_where('chuyenmuc',array('anhien'=>1));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	function getchuyenmucalias($alias=''){
		$rs = $this->db->select('tieude,idcm,title,description')
						->get_where('chuyenmuc',array('anhien'=>1,'alias'=>$alias));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	function gettag(){
		$rs = $this->db->select('a.tieude,a.alias,a.fontsize')
						->join('itemtag as b','a.idtag = b.idtag')
						->order_by('a.tieude')
						->get('tags as a');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	function gettagalias($alias=null){
		$rs = $this->db->select('a.idbv,b.tieude')
						->join('tags as b','a.idtag = b.idtag')
						->where('b.alias',$alias)
						->get('itemtag as a');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	function getbvnew(){
		$rs = $this->db->select('idbv,tieude,urlhinh,ngaydang,alias')
						->order_by('idbv','desc')
						->get_where('baiviet',array('anhien'=>1,'iddm !='=>16),10,0);
		if($rs->num_rows()>0){
			foreach($rs->result() as $k=>$v){
				$data[]	=	$v;
			}
			return $data;
		}
		return false;
	}
	function getdmright(){
		$rs = $this->db->select('iddm,tieude,loai,chuyenmuc,kieuhienthi,alias')
						->order_by('thutu')
						->get_where('danhmuc',array('anhien'=>1));
		if($rs->num_rows()>0){
			foreach ($rs->result() as $key => $value) {
				# code...
				$loai = json_decode($value->loai);
				foreach($loai as $k=>$v){
					if($v=='right'){
						$data[] = $value;
					}
				}
			}
			if(!isset($data))
				return false;
			return $data;
		}
		return false;
	}
	function getdanhmuccon($id){
		$rs = $this->db->select('tieude,iddm,alias')
						->get_where('danhmuc',array('anhien'=>1,'idcha'=>$id));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[]	= $r;
			}
			return $data;
		}
		return false;
	}
	function getalias($idbv){
		$rs = $this->db->select('cm.alias')
						->join('baiviet as bv','cm.idcm = bv.idcm')
						->where('bv.idbv',$idbv)
						->get('chuyenmuc as cm');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		else{
			$rs = $this->db->select('dm.alias')
						->join('baiviet as bv','dm.iddm = bv.iddm')
						->where('bv.idbv',$idbv)
						->get('danhmuc as dm');
			if($rs->num_rows()>0){
				foreach($rs->result() as $r){
					$data[]	= $r;
				}
				return $data;
			}
			return false;
		}
	}
	function getbvgoicuoc(){
		$rs = $this->db->select('bv.tieude,cm.alias as cmalias,bv.alias')
						->join('chuyenmuc as cm','cm.idcm = bv.idcm')
						->order_by('bv.idbv','desc')
						->limit(12,0)
						->where(array('bv.idcm'=>4,'bv.anhien'=>1))
						->get('baiviet as bv');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	function mucxemnhieu(){
		$rs =  $this->db->select('tieude,alias,solanxem')
						->order_by('solanxem','desc')
						->limit(10,0)
						->get_where('chuyenmuc',array('anhien'=>1));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r ){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	function bvxemnhieu(){
		$rs =  $this->db->select('idbv,tieude,alias,urlhinh,ngaydang')
						->order_by('solanxem','desc')
						->limit(3,0)
						->get_where('baiviet',array('anhien'=>1));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r ){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	function gettagid($idbv=0){
		$rs = $this->db->select('tag.tieude,tag.alias')
								->join('itemtag as item','item.idtag = tag.idtag')
								->where('item.idbv',$idbv)
								->get('tags as tag');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;			
	}
	function getbvcm($idcm=0){
		$rs = $this->db->select('tieude,urlhinh,alias,idbv')
						->get_where('baiviet',array('idcm'=>$idcm));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;			
	}
	function totalbv($iddm=0,$idcm=''){
		if($iddm>0){
			$rs = $this->db->select('chuyenmuc')->get_where('danhmuc',array('iddm'=>$iddm));
			if($rs->num_rows()>0){
				foreach($rs->result() as $r);
				$chuyenmuc = json_decode($r->chuyenmuc,true);
				$rs = $this->db->select('idbv,tieude,urlhinh,alias,noidung,tomtat,solanxem,ngaydang')
									->where_in('idcm',$chuyenmuc)
									->or_where('iddm',$iddm)
									->or_where('idcm',$idcm)
									->get('baiviet');
			}
			else{
				$rs = $this->db->select('idbv,tieude,urlhinh,alias,tomtat,solanxem,ngaydang')
									->where('iddm',$iddm)
									->or_where('idcm',$idcm)
									->get('baiviet');
			}
		}
		else{
			$rs = $this->db->select('idbv,tieude,urlhinh,alias,tomtat,solanxem,ngaydang')
							->where('idcm',$idcm)
							->get('baiviet');
		}
		return $rs->num_rows();
	}
	function getbaiviet($iddm=0,$idcm=null,$item=1,$pos=0){
		if($iddm>0){
			$rs = $this->db->select('chuyenmuc')->get_where('danhmuc',array('iddm'=>$iddm));
			if($rs->num_rows()>0){
				foreach($rs->result() as $r);
				$chuyenmuc = json_decode($r->chuyenmuc,true);
				$rs = $this->db->select('idbv,tieude,urlhinh,alias,noidung,tomtat,solanxem,ngaydang')
									->order_by('idbv','desc')
									->where_in('idcm',$chuyenmuc)
									->or_where('iddm',$iddm)
									->or_where('idcm',$idcm)
									->limit($item,$pos)
									->get('baiviet');
			}
			else{
				$rs = $this->db->select('idbv,tieude,urlhinh,alias,tomtat,solanxem,ngaydang')
									->order_by('idbv','desc')
									->where('iddm',$iddm)
									->or_where('idcm',$idcm)
									->limit($item,$pos)
									->get('baiviet');
			}
		}
		else{
			$rs = $this->db->select('idbv,tieude,urlhinh,alias,tomtat,solanxem,ngaydang')
							->where('idcm',$idcm)
							->order_by('idbv','desc')
							->limit($item,$pos)
							->get('baiviet');
		}
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	function getcmnb(){
		$rs = $this->db->select('idcm,alias,tieude')
						->order_by('thutu')
						->get_where('chuyenmuc',array('anhien'=>1,'noibat'=>1));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	function getcmbv($idcm=null){
		$rs = $this->db->select('idbv,tieude,urlhinh,tomtat,alias,ngaydang')
						->order_by('idbv','desc')
						->limit(5,0)
						->get_where('baiviet',array('anhien'=>1,'idcm'=>$idcm));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	function getbvcmnb(){
		$rs = $this->db->select('cm.tieude as cmtieude, bv.tieude as bvtieude, bv.idbv, cm.alias as cmalias, bv.alias as bvalias,bv.urlhinh,bv.tomtat,bv.ngaydang')
							->join('chuyenmuc as cm','cm.idcm = bv.idcm')
							->where(array('bv.anhien'=>1,'cm.anhien'=>1,'cm.noibat'=>1))
							->order_by('bv.idbv','desc')
							->limit(5,0)
							->get('baiviet as bv');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[]	= $r;
			}
			return $data;
		}
		return false;
	}
	function getbvcmlimit($idcm=null,$item=5,$pos=0){
		$rs = $this->db->select('idbv,tieude,urlhinh,ngaydang,tomtat,alias')
							->where(array('anhien'=>1,'idcm'=>$idcm))
							->order_by('idbv','desc')
							->limit($item,$pos)
							->get('baiviet');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[]	= $r;
			}
			return $data;
		}
		return false;
	}
	function totalbvcm($idcm){
		$rs = $this->db->select('idbv')
							->where(array('anhien'=>1,'idcm'=>$idcm))
							->get('baiviet');
		if($rs->num_rows()>0){
			return $rs->num_rows();
		}
		return false;
	}
	function cmbvnext($idcm){
		if(!$this->session->has_userdata('poscm'))
			$this->session->set_userdata('poscm',0);
		$item	=	5;
		$pos	=	$this->session->userdata('poscm')+$item;	
		if($pos>=$this->totalbvcm($idcm))
			$pos = $this->session->userdata('poscm');
		$this->session->set_userdata('poscm',$pos);
		$bv 	= 	$this->getbvcmlimit($idcm,$item,$pos);
		return $bv;
	}
	function cmbvprev($idcm){
		if(!$this->session->has_userdata('poscm'))
			$this->session->set_userdata('poscm',0);
		$item	=	5;
		$pos	=	$this->session->userdata('poscm')-$item;	
		if($pos<=0)
			$pos = 0;
		$this->session->set_userdata('poscm',$pos);
		$bv 	= 	$this->getbvcmlimit($idcm,$item,$pos);
		return $bv;
	}
	function getaliascm($idcm){
		$rs = $this->db->select('alias')
							->where('idcm',$idcm)
							->get('chuyenmuc');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[]	= $r;
			}
			return $data;
		}
		print_r($data);die();
		return false;
	}
	function totalbvkey($key){
		$this->db->select('tieude');
		foreach($key as $k=>$v){
			if($k==0){
				$this->db->like('tieude', $v);
			}
			else{
				$this->db->or_like('tieude', $v);

			} 
		}
		$this->db->order_by('idbv','desc');
		$rs = $this->db->get('baiviet');
		if($rs->num_rows()>0){
			return $rs->num_rows();
		}
		return false;
	}
	function getbvkey($key){
		$currentPage 		= 	$this->uri->segment(2,1);
		$config 			=	paginationConfig();
		$config['per_page']	=	12;
		$config['uri_segment'] = 2;
		$config['base_url'] = base_url().'tim-kiem/';
		$config['total_rows'] = $this->totalbvkey($key);
		$this->pagination->initialize($config);
		$this->db->select('tieude,idbv,urlhinh,tomtat,ngaydang,alias');
		foreach($key as $k=>$v){
			if($k==0){
				$this->db->like('tieude', $v);
			}
			else{
				$this->db->or_like('tieude', $v);

			} 
		}
		$this->db->order_by('idbv','desc');
		$this->db->limit($config['per_page'],($currentPage-1)*$config['per_page']);
		$rs = $this->db->get('baiviet');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r ){
				$data[]	=	$r;
			}
			return $data;
		}
		return false;
	}
	function getbvkeyajax($key){
		$this->db->select('idbv,tieude,alias');
		foreach($key as $k=>$v){
			if($k==0){
				$this->db->like('tieude', $v);
			}
			else{
				$this->db->or_like('tieude', $v);

			} 
		}
		$this->db->order_by('idbv','desc');
		$this->db->limit(6,0);
		$rs = $this->db->get('baiviet');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r ){
				$data[]	=	$r;
			}
			return $data;
		}
		return false;
	}
	function getdanhmucalias($iddm){
		$rs = $this->db->select('alias')
						->get_where('danhmuc',array('iddm'=>$iddm));
		if($rs->num_rows()>0){
			foreach ($rs->result() as $key => $value) {
				# code...
				$data[] = $value;
			}
			return $data;
		}
		return false;						
	}
}