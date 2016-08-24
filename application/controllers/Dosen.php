<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dosen extends CI_Controller {

	private $table='data_dosen';
	private $pk='id';
	private $folder = 'dosen';

	function __construct(){
		parent::__construct();
		$this->auth->logged();
	}

	public function index(){
		if($this->auth->cek_level(1)){
			$data['islogged'] = $this->session->userdata('logged_in');
			$data['title'] = 'Data Dosen';
			$data['result'] = $this->db->select('id, nama, nidn, email, status,tempat_lahir, np_wp, nik')->from($this->table)->get()->result();
			$this->template->page($this->folder.'/index',$data);
		}
	}

	public function details(){
		if($this->auth->cek_level(1)){
			$id = $this->uri->segment(3);
			if (isset($id)) {
				$data['islogged'] = $this->session->userdata('logged_in');
				$data['result'] = $this->db->select('*')
						->from($this->table)
						->join('status',"status.status_id=$this->table.status")
						->join('agama',"agama.agama_id=$this->table.agama")
						->join('wilayah_desa',"wilayah_desa.desa_id=$this->table.kelurahan")
						->join('wilayah_kecamatan',"wilayah_kecamatan.kecamatan_id=wilayah_desa.kecamatan_id")
						->join('wilayah_kabupaten',"wilayah_kabupaten.kabupaten_id=wilayah_kecamatan.kabupaten_id")
						->join('wilayah_provinsi',"wilayah_provinsi.prov_id=wilayah_kabupaten.provinsi_id")
						->where("data_dosen.id",$id)->get()->result()[0];
						//print_r($data['result']);
				//cek result
				if (count($data['result'])<1) {
					redirect('dosen');
					exit();
				}
				$data['title'] = 'Data '.$data['result']->nama;
				$this->template->page($this->folder.'/details',$data);
			}else{
				redirect('dosen');
			}
		}
	}

	public function add(){
		if($this->auth->cek_level(1)){
			$data['islogged'] = $this->session->userdata('logged_in');
			$data['title'] = 'Tambahkan Data Dosen';
			$data['result'] = [
				'status'=>$this->db->select('status, status_id')->from('status')->get()->result(),
				'prov'=>$this->db->select('*')->from('wilayah_provinsi')->get()->result(),
				'agama'=>$this->db->select('agama_id, agama')->from('agama')->get()->result()
			];
			$this->template->page($this->folder.'/add',$data);
		}
	}

	public function post(){
		$data = $this->input->post();
		$validasi = [
			[
				'field'=>'nama',
				'label'=>'Nama',
				'rules'=>'required|is_unique[data_dosen.nama]'
			],
			[
				'field'=>'nama_ibu',
				'label'=>'Nama',
				'rules'=>'required'
			],
			[
				'field'=>'kelamin',
				'label'=>'Kelamin',
				'rules'=>'required'
			],
			[
				'field'=>'tempat_lahir',
				'label'=>'Tempat lahir',
				'rules'=>'required'
			],
			[
				'field'=>'tgl_lahir',
				'label'=>'Tanggal lahir',
				'rules'=>'required'
			],
			[
				'field'=>'agama',
				'label'=>'Agama',
				'rules'=>'required'
			],
			[
				'field'=>'kelurahan',
				'label'=>'kelurahan',
				'rules'=>'required'
			]
		];

		$this->form_validation->set_rules($validasi);
		$this->form_validation->set_message('required','%s belum Anda isi');
		$this->form_validation->set_message('is_unique','%s sudah ada');
		if ($this->form_validation->run()==false) {
			$data['islogged'] = $this->session->userdata('logged_in');
			$data['title'] = 'Tambahkan Data Dosen';
			$data['result'] = [
				'status'=>$this->db->select('status, status_id')->from('status')->get()->result(),
				'prov'=>$this->db->select('*')->from('wilayah_provinsi')->get()->result(),
				'agama'=>$this->db->select('agama_id, agama')->from('agama')->get()->result()
			];
			$this->template->page($this->folder.'/add',$data);
		}else{
			$this->db->insert($this->table,$data);
			$this->session->set_flashdata('notif',message_alert($message,'success'));
			redirect('dosen');
		}

	}

	public function edit(){
		$id = $this->uri->segment(3);
		$data['islogged'] = $this->session->userdata('logged_in');
		$data['title'] = 'Tambahkan Data Dosen';
		//include referensi
		$data['status']=$this->db->select('status, status_id')->from('status')->get()->result();
		$data['agama']=$this->db->select('agama_id, agama')->from('agama')->get()->result();
		$data['prov']=$this->db->select('*')->from('wilayah_provinsi')->get()->result();
		$data['result'] = $this->db->select('*')->from('data_dosen')
				->join('status','status.status_id=data_dosen.status')
				->join('agama','agama.agama_id=data_dosen.agama')
				->where('data_dosen.id',$id)->get()->result()[0];
		$this->template->page($this->folder.'/edit',$data);
	}

	public function update(){
		$data = $this->input->post();
		$id = $this->input->post('id');
		$validasi = [
			[
				'field'=>'nama',
				'label'=>'Nama',
				'rules'=>"required|edit_unique[data_dosen.nama.$id]"
			],
			[
				'field'=>'nama_ibu',
				'label'=>'Nama',
				'rules'=>'required'
			],
			[
				'field'=>'kelamin',
				'label'=>'Kelamin',
				'rules'=>'required'
			],
			[
				'field'=>'tempat_lahir',
				'label'=>'Tempat lahir',
				'rules'=>'required'
			],
			[
				'field'=>'tgl_lahir',
				'label'=>'Tanggal lahir',
				'rules'=>'required'
			],
			[
				'field'=>'agama',
				'label'=>'Agama',
				'rules'=>'required'
			],
			[
				'field'=>'kelurahan',
				'label'=>'kelurahan',
				'rules'=>'required'
			]
		];

		$this->form_validation->set_rules($validasi);
		$this->form_validation->set_message('required','%s tidak boleh kosong');
		$this->form_validation->set_message('is_unique','%s sudah ada');
		if ($this->form_validation->run()==false) {
			$data['islogged'] = $this->session->userdata('logged_in');
			$data['title'] = 'Tambahkan Data Dosen';
			//include referensi
			$data['status']=$this->db->select('status, status_id')->from('status')->get()->result();
			$data['agama']=$this->db->select('agama_id, agama')->from('agama')->get()->result();
			$data['prov']=$this->db->select('*')->from('wilayah_provinsi')->get()->result();
			$data['result'] = $this->db->select('*')->from('data_dosen')
					->join('status','status.status_id=data_dosen.status')
					->join('agama','agama.agama_id=data_dosen.agama')
					->where('data_dosen.id',$id)->get()->result()[0];
			$this->template->page($this->folder.'/edit',$data);
		}else{
			$this->db->replace($this->table,$data);
			redirect($this->uri->segment(1));
		}
	}

	public function show_kab(){
		$id = $this->input->post('id');
		$result = $this->db->select('kabupaten_id, nama_kab')
					->from('wilayah_kabupaten')->where('provinsi_id',$id)
					->get()->result();
		echo json_encode($result);
	}

	public function show_kec(){
		$id = $this->input->post('id');
		$result = $this->db->select('kecamatan_id, nama_kec')
					->from('wilayah_kecamatan')->where('kabupaten_id',$id)
					->get()->result();
		echo json_encode($result);
	}

	public function show_kel(){
		$id = $this->input->post('id');
		$result = $this->db->select('desa_id, nama_desa')
					->from('wilayah_desa')->where('kecamatan_id',$id)
					->get()->result();
		echo json_encode($result);
	}

	public function hapus(){
		$id = $_POST['id'];
		$cek_data = $this->db->query("SELECT id FROM $this->table WHERE $this->pk='$id'");
		if ($cek_data->num_rows()>=1) {
			$this->mcrud->delete($this->table,$this->pk,$id);
		}
	}
}
?>