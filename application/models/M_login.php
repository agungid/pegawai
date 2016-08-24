<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
*For login
*/
class M_login extends CI_Model
{
	private $table = 'account_login';

	function __construct()
	{
		parent::__construct();
	}

	function cek_user($username,$password){
		$dec_pass = $this->encryption->encrypt($password);
		$get_password = $this->db->get_where($this->table,['username'=>$username])->result_array();
		$pass_db = $get_password[0]['password'];
		if ($password==$this->encryption->decrypt($pass_db)) {
			return $get_password;
		}
	}

	function ambil_user($username){
		$query = $this->db->get_where($this->table,['username'=>$username])->result_array();
		if ($query) {
			return $query[0];
		}
	}

	function set_session($data){
		$user_id = $data[0]['user_id'];
		$level_id= $data[0]['level_id'];
		$username= $data[0]['username'];
		$newdata = array(
	        'username'  => $username,
	        'user_id'     => $user_id,
	        'level_id'     => $level_id,
	        'logged_in' => TRUE
		);
		$this->session->set_userdata($newdata);
	}
}