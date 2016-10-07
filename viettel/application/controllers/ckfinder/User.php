<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct() {
        parent::__construct();
        $this->load->library('ckfinder');
        $this->ckfinder->setProjectPath('luanvan');              // Tên project của bạn
        $this->ckfinder->setFolderUpload('upload/');            // Cấu hình folder upload
        $this->ckfinder->setCkfinderSourcePath('lib/ckfinder');  // Đường dẫn tới source ckfinder
        $this->ckfinder->setAuthentication(true);                   // Nếu true => cho phép sử dụng ckfinder
                                                                    // ngược lại false thì ko được phép sử dụng
             
        // Đường dẫn tuyệt đối dẫn đến function connector ở bên dưới
        $this->ckfinder->setConnectorPath($this->config->base_url('ckfinder/user/connector'));
    }
     
    public function connector()
    {   
        $this->ckfinder->startConnector();
    }
     
    public function html(){
        $this->ckfinder->getHTML();
    }
}
