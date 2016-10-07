<?php 
class Taikhoan extends CI_Controller {
	function __construct(){
		parent::__construct();
		//$this->load->library('email');
	}
	function login(){
		if($this->session->has_userdata('admin_id')){
			redirect('admin/danhmuc');
		}
		if($this->input->post('username'))
		{
			$this->form_validation->set_rules('username','Username','trim|required|xss_clean|html_escape');
			$this->form_validation->set_rules('password','Password','trim|required|xss_clean|html_escape|sha1');
			if($this->form_validation->run() == false){
				$data['thongbao'] = validation_errors();
			}
			else{
				$rs = $this->db->get_where('admin',array('username'=>$this->input->post('username'),'password' => $this->input->post('password')));
				if($rs->num_rows()<=0){
					$data['thongbao'] = 'Username hoặc mật khẩu không đúng';
				}
				else{
					foreach ($rs->result() as $key => $value) {
						# code...
						$dataSession = array(
							'admin_id' 		=> 	$value->idad,
							'admin_hoten'	=>	$value->HoTen,
						);
					}
					$this->session->set_userdata($dataSession);
					redirect('admin/danhmuc');
				}
			}
			$this->load->view('backend/layout/login',$data);
		}
		$this->load->view('backend/layout/login');
	}	
	function logout(){
		if($this->session->has_userdata('admin_id')){
			$this->session->unset_userdata(array('admin_id','admin_hoten'));
		}
		redirect('admin/taikhoan/login');
	}
	function update(){
		$rs = $this->db->select('hoten,email,password')
						->get_where('admin',array('idad'=>$this->session->admin_id));
		if($rs->num_rows()<=0){
			redirect('admin/taikhoan/login');
		}
		else{
			foreach ($rs->result() as $key => $value) {
				# code...
				$data['r']	=	$value;
			}	
		} 	 	
		if($this->input->post('hoten')){
			$upload = 1;
			$this->form_validation->set_rules('hoten','Họ Tên','trim|required|xss_clean|html_escape');
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|html_escape');
			if($this->form_validation->run()==false){
				$data['thongbao']	=	validation_errors();
				$upload = 0;
			}
			else{
				if($this->input->post('password')){
					$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|html_escape|sha1');
					$this->form_validation->set_rules('passnew', 'New Password', 'trim|required|xss_clean|html_escape|sha1');
					$this->form_validation->set_rules('repass', 'Re-Password', 'trim|required|xss_clean|html_escape|sha1');
					if ($this->form_validation->run() == FALSE) {
						# code...
						$data['thongbao'] = validation_errors();
						$upload = 0;
					} else {
						# code...
						if($data['r']->password != $this->input->post('password')){
							$data['thongbao'] = 'Mật khẩu không đúng.';
							$upload = 0;
						}
						if($this->input->post('passnew') != $this->input->post('repass')){
							$data['thongbao'] = 'Mật khẩu nhập lại không trùng khớp';
							$upload = 0;
						}
						if($upload == 1){
							$dataUpdate = array(
								'HoTen'	=>	$this->input->post('hoten'),
								'Email' => $this->input->post('email'),
								'password'	=> $this->input->post('passnew'),
							);
							if(!$this->db->update('admin',$dataUpdate,array('idad' => $this->session->admin_id))){
								$data['thongbao'] = 'Đã xảy ra lỗi, cập nhật không thành công.';
							}
							else{
								redirect('admin/taikhoan/logout');
							}
						}
					}
				}
				else{
					$dataUpdate = array(
						'HoTen' => $this->input->post('hoten'),
						'email'	=> $this->input->post('email'),
					);
					if(!$this->db->update('admin',$dataUpdate,array('idad' => $this->session->admin_id))){
						$data['thongbao'] = 'Đã xảy ra lỗi. Cập nhật không thành công.';
					}
					else{
						$data['thongbao2'] = 'Cập nhật thành công';
					}
				}
			}
		}
		$data['view']	=	'backend/modules/taikhoan/update';
		$this->load->view('backend/layout/home',$data);
	}
	function forget(){
		if($this->input->post('email')){
			$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email|xss_clean|html_escape');
			if ($this->form_validation->run() == false) {
				# code...
				echo 'Email không hợp lệ.';
			} else {
				# code...
				$rs = $this->db->select('email')->get_where('admin',array('email'=>set_value('email')));
				if($rs->num_rows()<=0){
					echo 'Email không đúng. Hãy nhập Email bạn đã đăng ký.';
				}
				else{
					$key = substr(sha1(rand(1,1000000)),0,3);
					$messages = 'Hãy click vào <a href="'.base_url().'admin/taikhoan/confirm/'.set_value('email').'/'.$key.'">đây</a> để xác nhận bạn có yêu cầu một mật khẩu mới.';
					$username = 'phungvietmark@gmail.com';// Tài khoản gmail dùng để gửi thư
					$password = 'phungvietmark.net'; // mật khẩu của tài khoản gửi mail
					require_once 'lib/mail/PHPMailerAutoload.php';		
					$mail = new PHPMailer();  
					$mail->isSMTP(); //Tell PHPMailer to use SMTP
					$mail->SMTPDebug = 0; //0=off,1=client messages,2=client and server messages
					$mail->Debugoutput = 'html';  
					$mail->CharSet = 'UTF-8';		
					$mail->ContentType = 'text/html; charset=utf-8\r\n';
					$mail->Host = "smtp.gmail.com"; 
					$mail->Port = 465;  //25,465 or 587	
					$mail->SMTPSecure = 'ssl'; 	
					$mail->SMTPAuth = true; 
					$mail->Username = $username; 	
					$mail->Password = $password; 
					$mail->setFrom('phungvietmark@gmail.com', 'Tiếp Thị Việt'); 
					$mail->addAddress(set_value('email')); 
					$mail->Subject = 'Forget Password';  
					$mail->msgHTML($messages);
					if (!$mail->send()) {return "Lỗi: " . $mail->ErrorInfo;}
					else {
						$this->db->update('admin',array('randomkey'=>$key),array('email'=>set_value('email')));
						echo "Đã gửi mail, vui lòng kiểm tra email";
					}
				}
			}
		}
		else{
			echo 'Vui lòng nhập Email.';
		}
	}
	function confirm(){
		$email 	= 	$this->uri->rsegment(3,0);
		$key	=	$this->uri->rsegment(4,0);
		$rs 	=	$this->db->select('password')->get_where('admin',array('email'=>$email,'randomkey'=>$key));
		if($rs->num_rows()<=0){
			$data['thongbao'] =	'Đã xảy ra lỗi';
		}
		else{
			$passnew = substr(sha1(rand(1,1000000)),0,6);
			if(!$this->db->update('admin',array('password'=>sha1($passnew),'randomkey'=>''),array('email'=>$email,'randomkey'=>$key))){
				$data['thongbao']	=	'Đã xảy ra lỗi';
			}
			else{
				$data['passnew']	=	$passnew;
			}
		}
		$this->load->view('backend/layout/forgetPassword',$data);
	}
}