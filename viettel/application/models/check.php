<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Check extends CI_Model {
	function __construct(){
		$this->load->model('vt');
	}
	function checkurl2($url){
	    $regex = '/\pL /u';
	    if (preg_match($regex, $url) ==true) 
        return true ; 
	    return false;   
	}
	function checktieudeloai($tenloai,$id=0){
		$rs = $this->db->select('phanloaibai','tenloai',"tenloai = '$tenloai' and idcm!=$id");
		$r = $rs->fetch_row();
		if($r!='')
			return true;
			return false;
	}
	//url bai viết
	function checkurl($url,$id=0){
		//echo $table;
		$urltmp = $url;
		$checkurl=1;
		$dem=1;
		while($checkurl==1){
			if($id==0){
				$rsalias = $this->db->select('alias')
									->where('alias',$urltmp)
									->get('baiviet');
			}
			else{
				$rsalias = $this->db->select('alias')
									->where(array('alias' => $urltmp,'idbv !='=>$id))
									->get('baiviet');
			}
			if($rsalias->result()){
				$urltmp = $url.'-'.$dem++;
			}
			else{
				$checkurl=0;
			}
		}  
		$url = $urltmp;
		return $url;  
	}
	function checkurlloai($url,$id=0){
		//echo $table;
		$urltmp = $url;
		$checkurl=1;
		$dem=1;
		while($checkurl==1){
			if($id==0){
				$rsalias = $this->db->select('alias')
									->where('alias',$urltmp)
									->get('chuyenmuc');
			}
			else{
				$rsalias = $this->db->select('alias')
									->where(array('alias' => $urltmp,'idcm !='=>$id))
									->get('chuyenmuc');
			}
			if($rsalias->result()){
				$urltmp = $url.'-'.$dem++;
			}
			else{
				$checkurl=0;
			}
		}  
		$url = $urltmp;
		return $url;  
	}
	//danh mục
	function checkurldanhmuc($url,$id=0){
		//echo $table;
		$urltmp = $url;
		$checkurl=1;
		$dem=1;
		while($checkurl==1){
			if($id==0){
				$rsalias = $this->db->select('alias')
									->where('alias',$urltmp)
									->get('danhmuc');
			}
			else{
				$rsalias = $this->db->select('alias')
									->where(array('alias' => $urltmp,'iddm !='=>$id))
									->get('danhmuc');
			}
			if($rsalias->result()){
				$urltmp = $url.'-'.$dem++;
			}
			else{
				$checkurl=0;
			}
		}  
		$url = $urltmp;
		return $url;  
	}
	function checkurltag($url,$id=0){
		$urltmp = $url;
		$checkurl=1;
		$dem=1;
		while($checkurl==1){
			if($id==0){
				$rsalias = $this->db->select('alias')
									->where('alias',$urltmp)
									->get('tags');
			}
			else{
				$rsalias = $this->db->select('alias')
									->where(array('alias' => $urltmp,'idtag !='=>$id))
									->get('tags');
			}
			if($rsalias->result()){
				$urltmp = $url.'-'.$dem++;
			}
			else{
				$checkurl=0;
			}
		}  
		$url = $urltmp;
		return $url;  
	}
	function checkimg($hinh){
		$check = getimagesize($hinh['tmp_name']);
		if($check!==false){
			$urlhinh='upload/images/'.rand(1,1000000).$hinh['name'];
			copy($hinh['tmp_name'],'../'.$urlhinh);
			return $urlhinh;
		}
		return false;
	}
	function url_slug($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ|Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'd'=>'đ|Đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ|É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'i'=>'í|ì|ỉ|ĩ|ị|Í|Ì|Ỉ|Ĩ|Ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ|Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự|Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ|Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
		$array = array(' ',',','.','+','_',')','(','!','@','#','$','%','^','*','/','`','~');
		   foreach($unicode as $nonUnicode=>$uni){
				$str = preg_replace("/($uni)/i", $nonUnicode, $str);
				$str = str_replace($array,"-",$str);
		   }
		return strtolower($str);
	}
}