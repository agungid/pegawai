<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->auth->notlogged();
	}
	public function index()
	{
		$data['islogged'] = $this->session->userdata('isLogin');
		$data['title'] = 'Silahkan Masuk - Sistem Pendaftaran Wisuda Online';
		$this->template->page('login/index',$data);
	}

	public function post(){
		$this->encryption->create_key(64);
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$data = $this->M_login->cek_user($username,$password);
		if (count($data)) {
			$this->M_login->set_session($data);
			/*helper_log("login", "masuk ke sistem");*/
			redirect('dosen');
		}else{
			$message = 'Warning: Username atau password tidak cocok. Periksa kembali';
			$this->session->set_flashdata('pesan', message_alert($message,'danger'));
			redirect($this->ua->referrer());
		}
	}
}
