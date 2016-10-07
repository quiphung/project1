<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vt extends CI_Model {
	public $reloai;
	public $redanhmuc;
	function __construct(){
		parent::__construct();
		$this->reloai = '';
	}
	//lấy tất cả chuyên mục
	public function getloai($id=0){
		if($id==0){
			$query = $this->db->select('idcm,idcha,tieude')
								->get('chuyenmuc');
		}
		else{
			$query = $this->db->select('idcm,idcha,tieude')
								->where('idcm !=',$id)
								->get('chuyenmuc');
		}
		if(!$query->result())
				return false;
		return $query->result();
	}
	//xử lý chuyen mục
	public function getloai2($idcha=0,$data=NULL,$step=''){
		if(isset($data)&&is_array($data)){
			foreach ($data as $key => $value) {
				if($value->idcha==$idcha){
					$this->reloai[$value->idcm] = $step.$value->tieude;
					$this->getloai2($value->idcm,$data,$step.'|---- ');
				}
			}
		}
		return $this->reloai;
	}
	//lấy tất cả danh mục
	public function danhmuc($id=0){
		if($id==0){
			$query = $this->db->select('iddm,idcha,tieude')
								->order_by('thutu')
								->get('danhmuc');
		}
		else{
			$query = $this->db->select('iddm,idcha,tieude')
								->where('iddm !=',$id)
								->order_by('thutu')
								->get('danhmuc');
		}
		if(!$query->result())
				return false;
		return $query->result();
	}
	//xử lý danh mục
	public function danhmuc2($idcha=0,$data=NULL,$step=''){
		if(isset($data)&&is_array($data)){
			foreach ($data as $key => $value) {
				if($value->idcha==$idcha){
					$this->redanhmuc[$value->iddm] = $step.$value->tieude;
					$this->danhmuc2($value->iddm,$data,$step.'|---- ');
				}
			}
		}
		return $this->redanhmuc;
	}
	//chuyên mục all
	public function getloaiall(){
		$query = $this->db->select('idcm,idcha,tieude,anhien,thutu,alias,solanxem')
							->order_by('thutu')
							->get('chuyenmuc'); 
		if(!$query->result())
			return false;
		return $query->result();
	}
	//xử lý chuyên mục all
	public function getloaiall2($idcha=0,$data=NULL,$step=''){
		if(isset($data)&&is_array($data)){
			foreach ($data as $key => $value) {
				if($value->idcha==$idcha){
					$this->reloai[] = array($value->idcm,$step.$value->tieude,$value->anhien,$value->thutu,$value->alias,$value->solanxem);
					$this->getloaiall2($value->idcm,$data,$step.'|---- ');
				}
			}
		}
		return $this->reloai;
	}
	//Danh mục all
	public function danhmucall(){
		$query = $this->db->select('iddm,idcha,loai,chuyenmuc,tieude,anhien,thutu,alias')
							->order_by('thutu')
							->get('danhmuc'); 
		if(!$query->result())
			return false;
		return $query->result();
	}
	//xử lý danh mục all
	public function danhmucall2($idcha=0,$data=NULL,$step=''){
		if(isset($data)&&is_array($data)){
			foreach ($data as $key => $value) {
				if($value->idcha==$idcha){
					$this->reloai[] = array($value->iddm,$step.$value->tieude,$value->anhien,$value->thutu,$value->alias,$value->chuyenmuc,$value->loai);
					$this->danhmucall2($value->iddm,$data,$step.'|---- ');
				}
			}
		}
		return $this->reloai;
	}
	function layTailieu($offset=0,$perpage=12){
		$sql = "SELECT tieude,urlhinh,filetype,tomtat,ngaydang,sotrang,luotxem,luottai,alias from tailieu where anhien = 1 limit $offset,$perpage";
		$rs = $this->db->query($sql);
		if($rs->num_rows()<=0){
			return false;
		}
		else{
			foreach ($rs->result() as $key => $value) {
				# code...
				$data[] = $value;
			}
			return $data;
		}

	}
	// lấy danh mục theo idcha
	public function getdanhmuc($idcha){
		$rs = $this->db->select('iddm,tieude,alias')->order_by('thutu')->get_where('danhmuc',array('anhien'=>1,'idcha'=>$idcha));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	public function getbaiviet($iddm,$item=1,$pos=0){
		$rs = $this->db->select('chuyenmuc')->get_where('danhmuc',array('iddm'=>$iddm));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r);
			$chuyenmuc = json_decode($r->chuyenmuc,true);
			$rs = $this->db->select('idbv,tieude,urlhinh,alias')
								->order_by('idbv','desc')
								->where_in('idcm',$chuyenmuc)
								->or_where('iddm',$iddm)
								->limit($item,$pos)
								->get('baiviet');
		}
		else{
			$rs = $this->db->select('idbv,tieude,urlhinh,alias')
								->order_by('idbv','desc')
								->where('iddm',$iddm)
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
	function menu(){
		$rs = $this->db->select('iddm,tieude,alias,kieuhienthi,loai')
						->where('anhien',1)
						->where('idcha',0)
						->where('iddm !=',16)
						->where('iddm !=',17)
						->get('danhmuc');
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[]	=	$r;
			}
			return $data;
		}
		return false;
	}
	function image(){
		$rs = $this->db->select('urlhinh,loai')->order_by('thutu')->get_where('image',array('anhien'=>1));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[]	=	$r;
			}
			return $data;
		}
		return false;
	}
	function danhmucbaiviet($iddm){
		if($this->session->has_userdata('pos'))
			$this->session->unset_userdata('pos');
		$item	=	6;
		$pos	=	0;
		$bv 	= 	$this->getbaiviet($iddm,$item,$pos);
		return $bv;
	}
	function tinhot(){
		$rs = $this->db->select('idbv,tieude,alias,urlhinh,ngaydang')
						->order_by('idbv','desc')
						->get_where('baiviet',array('anhien'=>1,'noibat'=>1));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r){
				$data[] = $r;
			}
			return $data;
		}
		return false;
	}
	function danhmucbaivietnext($iddm){
		if(!$this->session->has_userdata('pos'))
			$this->session->set_userdata('pos',0);
		$item	=	6;
		$pos	=	$this->session->userdata('pos')+$item;	
		if($pos>=$this->totalbv($iddm))
			$pos = $this->session->userdata('pos');
		$this->session->set_userdata('pos',$pos);
		$bv 	= 	$this->getbaiviet($iddm,$item,$pos);
		return $bv;
	}
	function danhmucbaivietprev($iddm){
		if(!$this->session->has_userdata('pos'))
			$this->session->set_userdata('pos',0);
		$item	=	6;
		$pos	=	$this->session->userdata('pos')-$item;	
		if($pos<=0)
			$pos = 0;
		$this->session->set_userdata('pos',$pos);
		$bv 	= 	$this->getbaiviet($iddm,$item,$pos);
		return $bv;
	}
	function totalbv($iddm){
		$rs = $this->db->select('chuyenmuc')->get_where('danhmuc',array('iddm'=>$iddm));
		if($rs->num_rows()>0){
			foreach($rs->result() as $r);
			$chuyenmuc = json_decode($r->chuyenmuc,true);
			$rs = $this->db->select('tieude,urlhinh,alias')
								->order_by('idbv','desc')
								->where_in('idcm',$chuyenmuc)
								->or_where('iddm',$iddm)
								->get('baiviet');
		}
		else{
			$rs = $this->db->select('tieude,urlhinh,alias')
								->order_by('idbv','desc')
								->where('iddm',$iddm)
								->get('baiviet');
		}
		return $rs->num_rows();
	}
}
