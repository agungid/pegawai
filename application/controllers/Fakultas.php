<?php defined('BASEPATH') OR exit('No direct script access allowed');

/**
* 
*/
class Fakultas extends CI_Controller
{
	private $table='app_fakultas';
	private $pk='id';
	private $folder = 'fakultas';

	function __construct(){
		parent::__construct();
		$this->auth->logged();
	}

	public function index(){
		if($this->auth->cek_level(1)){
			$data['islogged'] = $this->session->userdata('logged_in');
			$data['title'] = 'Data Fakultas';
			$data['result'] = $this->db->query("SELECT * FROM $this->table")->result_array();
			$this->template->page($this->folder.'/index',$data);
		}
	}

	public function add(){
		if($this->auth->cek_level(1)){
			$data['islogged'] = $this->session->userdata('logged_in');
			$data['title'] = 'Entry Data Fakultas';
			$this->template->page($this->folder.'/add',$data);
		}
	}

	public function post(){
		if($this->auth->cek_level(1)){
			$fakultas = $this->input->post('fakultas');
			$dekan = $this->input->post('dekan');

			$validasi = [
				[
					'field'=>'fakultas',
					'label'=>'Nama fakultas',
					'rules'=>'required|is_unique[app_fakultas.fakultas]'
				],
				[
					'field'=>'dekan',
					'label'=>'Nama Dekan',
					'rules'=>'required'
				],
			];

			$this->form_validation->set_rules($validasi);
			$this->form_validation->set_message('required','%s belum Anda isi');
			$this->form_validation->set_message('is_unique','%s sudah ada');

			if ($this->form_validation->run()==false) {
				if($this->auth->cek_level(1)){
					$data['islogged'] = $this->session->userdata('logged_in');
					$data['title'] = 'Entry Data Fakultas';
					$this->template->page($this->folder.'/add',$data);
				}
			}else{
				$data = [
					'fakultas'=>$fakultas,
					'dekan'=>$dekan
				];
				$insert = $this->db->insert('app_fakultas',$data);
				helper_log("add", "menambahkan data fakultas");
				$message = "Berhasil menyimpan data";
				$this->session->set_flashdata('notif',message_alert($message,'success'));
				redirect($this->uri->segment(1));
			}
		}
	}

	public function edit(){
		if($this->auth->cek_level(1)){
			$id = $this->uri->segment(3);
			$data['islogged'] = $this->session->userdata('logged_in');
			$data['title'] = 'Edit Data Fakultas';
			$data['result'] = $this->db->get_where('app_fakultas',['id'=>$id])->result_array()[0];
			$this->template->page($this->folder.'/edit',$data);
		}
	}

	public function update(){
		if($this->auth->cek_level(1)){
			$id = $this->input->post('id');
			$fakultas = $this->input->post('fakultas');
			$dekan = $this->input->post('dekan');

			$validasi = [
				[
					'field'=>'fakultas',
					'label'=>'Nama fakultas',
					'rules'=>'required|edit_unique[app_fakultas.fakultas.'.$id.']'
				],
				[
					'field'=>'dekan',
					'label'=>'Nama Dekan',
					'rules'=>'required'
				],
			];

			$this->form_validation->set_rules($validasi);
			$this->form_validation->set_message('required','%s belum Anda isi');
			$this->form_validation->set_message('edit_unique','%s sudah ada');

			if ($this->form_validation->run()==false) {
				$data['islogged'] = $this->session->userdata('logged_in');
				$data['title'] = 'Edit Data Fakultas';
				$data['result'] = $this->db->get_where('app_fakultas',['id'=>$id])->result_array()[0];
				$this->template->page('fakultas/edit',$data);
			}else{
				$data = [
					'fakultas'=>$fakultas,
					'dekan'=>$dekan
				];
				$update = $this->mcrud->update($this->table,$data,$this->pk,$id);
				helper_log("edit", "mengedit data fakultas");
				$message = "Berhasil memperbaharui data";
				$this->session->set_flashdata('notif',message_alert($message,'success'));
				redirect('fakultas');
			}
		}
	}

	public function hapus(){
		$id = $_POST['id'];
		$cek_data = $this->db->query("SELECT id FROM $this->table WHERE $this->pk='$id'");
		if ($cek_data->num_rows()>=1) {
			$this->mcrud->delete($this->table,$this->pk,$id);
			helper_log("delete", "menghapus data fakultas");
		}
	}
}