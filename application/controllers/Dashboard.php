<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	function __construct(){
		parent::__construct();
		$this->auth->logged();
	}

	public function index()
	{
		$data['islogged'] = $this->session->userdata('logged_in');
		$data['title'] = 'Selamat datang - Sistem Pendaftaran Wisuda Online';
		$this->template->page('dashboard/index',$data);
	}


	public function logout(){
		session_destroy();
		redirect('login');
	}
}
