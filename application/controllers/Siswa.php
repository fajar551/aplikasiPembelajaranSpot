<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Siswa extends CI_Controller{

  public function halamanNilai()
  {
    $id = $this->session->userdata('username');
    $query = $this->ModelSiswa->LihatSiswa($id)->result_array();
    foreach ($query as $siswa) {
      $idSiswa =  $siswa['idSiswa'];
    }
    $query = $this->ModelSiswa->LihatNilaiHarian($idSiswa);
		$data['harian'] = $query->result_array();

    $query = $this->ModelSiswa->LihatNilaiUlangan($idSiswa);
		$data['ulangan'] = $query->result_array();

    $query = $this->ModelSiswa->LihatNilaiUAS($idSiswa);
		$data['uas'] = $query->result_array();

    $query = $this->ModelSiswa->LihatSiswa($id);
    $data['siswa'] = $query->result_array();

    $query = $this->ModelSiswa->TampilMapel();
		$data['mapel'] = $query->result_array();

    $query = $this->ModelSiswa->TampilKelas();
		$data['kelas'] = $query->result_array();

    $query = $this->ModelSiswa->TampilKontrak($id);
    $data['kontrak'] = $query->result_array();

    $data['title'] = 'SPOT | Data Nilai';
		$this->load->view('siswa_halaman_nilai', $data);
  }

  public function halamanMateri()
  {
    $id = $this->session->userdata('username');
    $query = $this->ModelSiswa->LihatSiswa($id)->result_array();
    foreach ($query as $siswa) {
      $idSiswa =  $siswa['idSiswa'];
    }
    $query = $this->ModelSiswa->TampilMateri($idSiswa);
    $data['materi'] = $query->result_array();

    $query = $this->ModelSiswa->LihatSiswa($id);
    $data['siswa'] = $query->result_array();

    $query = $this->ModelSiswa->TampilMapel();
		$data['mapel'] = $query->result_array();

    $query = $this->ModelSiswa->TampilKelas();
		$data['kelas'] = $query->result_array();

    $query = $this->ModelSiswa->TampilKontrak($id);
    $data['kontrak'] = $query->result_array();

    $data['title'] = 'SPOT | Data Nilai';
		$this->load->view('siswa_halaman_materi', $data);
  }

  public function halamanRekap()
  {
    $id = $this->session->userdata('username');
    $query = $this->ModelSiswa->LihatSiswa($id)->result_array();
    foreach ($query as $siswa) {
      $idSiswa =  $siswa['idSiswa'];
    }
    $query = $this->ModelSiswa->TampilMateri($idSiswa);
    $data['materi'] = $query->result_array();

    $query = $this->ModelSiswa->LihatSiswa($id);
    $data['siswa'] = $query->result_array();

    $query = $this->ModelSiswa->TampilMapel();
		$data['mapel'] = $query->result_array();

    $query = $this->ModelSiswa->TampilKelas();
		$data['kelas'] = $query->result_array();

    $query = $this->ModelSiswa->TampilKontrak($id);
    $data['kontrak'] = $query->result_array();

    $data['title'] = 'SPOT | Data Nilai';
		$this->load->view('siswa_halaman_rekap', $data);
  }

}
