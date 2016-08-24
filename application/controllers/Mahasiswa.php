<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Mahasiswa extends CI_Controller
{
	function __construct(){
		parent::__construct();
		$this->auth->logged();
	}

	public function index(){
		if($this->auth->cek_level(1)){
			$data['islogged'] = $this->session->userdata('logged_in');
			$data['title'] = 'Daftar Mahasiswa - Sistem Pendaftaran Wisuda Online';
			$this->template->page('mahasiswa/index',$data);
		}
	}
}