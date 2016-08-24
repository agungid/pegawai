<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
*
*/
class Jurusan extends CI_Controller
{
	private $table='app_jurusan';
	private $pk='jurusan_id';
	private $folder = 'jurusan';

	function __construct(){
		parent::__construct();
		$this->auth->logged();
	}

	public function index(){
		if($this->auth->cek_level(1)){
			$data['islogged'] = $this->session->userdata('logged_in');
			$data['title'] = 'Data Jurusan';
			$data['result'] = $this->db->select('fakultas,dekan,jurusan_id,nama_jurusan')
						->from($this->table)
						->join('app_fakultas',"app_fakultas.id=app_jurusan.fakultas_id")
						->get()->result();
			$this->template->page($this->folder.'/index',$data);
		}
	}

	public function add(){
		if($this->auth->cek_level(1)){
			$data['islogged'] = $this->session->userdata('logged_in');
			$data['title'] = 'Entry Data Jurusan';
			$data['result'] = $this->db->select('id,fakultas')->from('app_fakultas')->get()->result();
			$this->template->page($this->folder.'/add',$data);
		}
	}

	public function post(){
		$fakultas_id = $this->input->post('fakultas_id');
		$nama_jurusan = $this->input->post('nama_jurusan');
		$gelar = $this->input->post('gelar');

		$validation = [
			[
				'field'=>'fakultas_id','label'=>'Fakultas','rules'=>'required'
			],
			[
				'field'=>'nama_jurusan','label'=>'Jurusan','rules'=>"required|is_unique[$this->table.nama_jurusan]"
			]
		];

		$this->form_validation->set_rules($validation);
		$this->form_validation->set_message('required','%s belum Anda isi');
		$this->form_validation->set_message('is_unique','%s sudah ada');

		if ($this->form_validation->run()==false) {
			if($this->auth->cek_level(1)){
				$data['islogged'] = $this->session->userdata('logged_in');
				$data['title'] = 'Entry Data Jurusan';
				$data['result'] = $this->db->select('id,fakultas')->from('app_fakultas')->get()->result();
				$this->template->page($this->folder.'/add',$data);
			}
		}
	}
}