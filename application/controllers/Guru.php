<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guru extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {

  }

  public function halamanUbahNilai($id)
  {
    $data['title'] = "SPOT | Ubah Nilai";
    $query = $this->ModelGuru->TampilNilai($id);
		$data['nilai'] = $query->result_array();
    $this->load->view('guru_ubah_nilai', $data);
  }

  public function prosesUbahNilai()
	{
    $id = $this->input->post('id');
		$this->form_validation->set_rules('nilai','Nilai','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'nilai'=>$this->input->post('nilai')
			);
			$this->ModelGuru->UbahNilai($insertData,$id);
			redirect('Guru/halamanNilai');
		} else {
			$this->load->view('guru_ubah_nilai');
		}
	}

  public function hapusNilai($id)
  {
    $this->ModelGuru->HapusNilai($id);
    redirect('Guru/halamanNilai');
  }

  public function halamanMateri()
  {
    $data['title'] = "SPOT | Data Materi";
    $data['username'] = $this->session->userdata('username');
    $id = $this->session->userdata('username');
    $query = $this->ModelGuru->LihatGuru($id)->result_array();
    foreach ($query as $guru) {
      $idGuru =  $guru['idGuru'];
    }
    $query = $this->ModelGuru->TampilDataMapel();
    $data['mapel'] = $query->result_array();
    $query = $this->ModelGuru->LihatGuru($id);
    $data['guru'] = $query->result_array();
    $query = $this->ModelGuru->TampilMateri($idGuru);
    $data['materi'] = $query->result_array();

		$this->load->view('guru_halaman_materi', $data);
  }

  public function halamanNilai()
  {
    $data['title'] = "SPOT | Kelola Nilai";
    $id = $this->session->userdata('username');
    $data['username'] = $id;
    $query = $this->ModelGuru->LihatNilaiHarian($id);
		$data['harian'] = $query->result_array();

    $query = $this->ModelGuru->LihatNilaiUlangan($id);
		$data['ulangan'] = $query->result_array();

    $query = $this->ModelGuru->LihatNilaiUAS($id);
		$data['uas'] = $query->result_array();

    $query = $this->ModelGuru->TampilDataMapel();
    $data['mapel'] = $query->result_array();

    $query = $this->ModelGuru->TampilDataKelas();
    $data['kelas'] = $query->result_array();



    $query = $this->ModelGuru->TampilDataSiswa($id);
    $data['siswa'] = $query->result_array();

    $query = $this->ModelGuru->LihatGuru($id);
    $data['guru'] = $query->result_array();

    $query = $this->ModelGuru->TampilKontrak($id);
    $data['kontrak'] = $query->result_array();

    $this->load->view('guru_halaman_nilai',$data);
  }

  public function halamanTambahMateri()
  {

  }

  public function prosesTambahMateri()
  {
    $deskripsi = $this->input->post('deskripsi');
    $judul = $this->input->post('judul');
    $id = $this->input->post('id');
    $config['upload_path'] = './assets/uploads';
    $config['allowed_types'] = 'pdf';
    $config['max_size'] = 0;

    $this->load->library('upload', $config);

    if(!$this->upload->do_upload())
    {
      $data['message'] = $this->upload->display_errors();
    }else{
      $data['upload_data'] = $this->upload->data();
      $data['message'] = 'Upload gambar sukses!';
    }

    $query = $this->ModelGuru->LihatGuru($id)->result_array();
    foreach ($query as $guru) {
      $idGuru =  $guru['idGuru'];
    }
    $this->get_uri_image($deskripsi,$idGuru,$judul);
    $this->halamanMateri();
  }

  public function get_uri_image($deskripsi,$idGuru,$judul)
  {
    $filename = $this->ModelGuru->fetch_document(FCPATH.'assets/uploads');
    foreach ($filename as $row) {
      $insertData = array(
        'idMateri'=>null,
        'idGuru'=>$idGuru,
        'judulFile'=>$judul,
        'deskripsi'=>$deskripsi,
  			'lokasiFile'=>'assets/uploads/'.$row
  		);
    }
    $this->ModelGuru->InsertFilename($insertData);
  }

  public function hapusMateri($id)
  {
    $this->ModelGuru->HapusMateri($id);
		redirect('Guru/halamanMateri');
  }

  public function prosesTambahNilai()
	{
    $id = $this->input->post('id');
    $jenis = $this->input->post('jenis');
    $query = $this->ModelGuru->LihatGuru($id)->result_array();
    foreach ($query as $guru) {
      $idGuru =  $guru['idGuru'];
    }
		$this->form_validation->set_rules('idMapel','Mapel','required');
		$this->form_validation->set_rules('idKelas','Kelas','required');
		$this->form_validation->set_rules('idSiswa','Nama','required');
    $this->form_validation->set_rules('nilai','nilai','required');

		if($this->form_validation->run() === TRUE && $this->input->post('idKelas') != 0 && $this->input->post('idSiswa') != 0)
		{
      $insertData = array(
				'idSiswa'=>$this->input->post('idSiswa'),
				'idGuru'=>$idGuru,
        'idKelas'=>$this->input->post('idKelas'),
				'jenis'=>$jenis,
				'nilai'=>$this->input->post('nilai')
			);
			$this->ModelGuru->InsertNilai($insertData);
			redirect('Guru/halamanNilai');
		} else {
      $query = $this->ModelGuru->LihatNilaiHarian($id);
      $data['harian'] = $query->result_array();

      $query = $this->ModelGuru->LihatNilaiUlangan($id);
      $data['ulangan'] = $query->result_array();

      $query = $this->ModelGuru->LihatNilaiUAS($id);
      $data['uas'] = $query->result_array();

      $query = $this->ModelGuru->TampilDataMapel();
      $data['mapel'] = $query->result_array();

      $query = $this->ModelGuru->TampilDataKelas();
      $data['kelas'] = $query->result_array();

      $id = $this->session->userdata('username');

      $query = $this->ModelGuru->TampilDataSiswa($id);
      $data['siswa'] = $query->result_array();

      $query = $this->ModelGuru->LihatGuru($id);
      $data['guru'] = $query->result_array();

      $query = $this->ModelGuru->TampilKontrak($id);
      $data['kontrak'] = $query->result_array();

			$this->load->view('guru_halaman_nilai',$data);
		}
	}

}
