<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ckfinder extends CI_Controller {
	public function __construct()
		{
			parent::__construct();
			//Do your magic here
		}
	public function connector(){	
		require "./lib/ckfinder/core/connector/php/connector.php";
	}
	public function html(){
		if(!$this->session->has_userdata('admin_id')){
			die();
		}
		else{
			$this->load->view('ckfinder/ckfinder');
		}
	}
}
