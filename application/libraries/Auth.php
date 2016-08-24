<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*For login
*/
class Auth
{
	private $CI;
	function __construct(){
		$this->CI = &get_instance();
	}

	function logged(){
		if (!$this->CI->session->userdata('logged_in')) {
			redirect('login');
		}
	}

	function notlogged(){
		if ($this->CI->session->userdata('logged_in')) {
			redirect(base_url()."dashboard");
		}
	}

	function user(){
		$user_id = $this->CI->session->userdata('user_id');
		$level_id = $this->CI->session->userdata('level_id');
		if($level_id==1){
			$query = $this->CI->db->get_where('admin',['admin_id'=>$user_id]);
		}elseif ($level_id==2) {
			$query = $this->CI->db->get_where('mahasiswa',['mahasiswa_id'=>$user_id]);
		}
		return $query->result_array()[0]['nama'];
	}

	function cek_level($level){
		$level_id = $this->CI->session->userdata('level_id');
		if ($level != $level_id) {
			$message = "Warning: Anda tidak memiliki akses ke halaman ini";
			$this->CI->session->set_flashdata('pesan_public', message_alert($message,'danger'));
			redirect($this->CI->ua->referrer());
		}else{
			return true;
		}

	}
}