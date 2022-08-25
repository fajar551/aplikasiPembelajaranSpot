<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller{

  /*================ GURU ================*/

  public function halamanGuru()
  {

    $query = $this->ModelAdmin->TampilGuru();
    $data['guru'] = $query->result_array();
    $query = $this->ModelAdmin->TampilMapel();
		$data['mapel'] = $query->result_array();

    $data['title'] = 'SPOT | Data Guru';
		$this->load->view('admin_halaman_guru', $data);
  }

  public function prosesTambahGuru()
	{
		$this->form_validation->set_rules('NIP','NIP','required');
		$this->form_validation->set_rules('idMapel','Mapel','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('hp','No HP','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $password = random_string('alnum', 8);

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'idGuru'=>NULL,
				'NIP'=>$this->input->post('NIP'),
				'idMapel'=>$this->input->post('idMapel'),
				'namaGuru'=>$this->input->post('nama'),
				'password'=>$password,
				'noHP'=>$this->input->post('hp'),
        'alamat'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->InsertGuru($insertData);
			redirect('Admin/halamanGuru');
		} else {
			$this->load->view('admin_halaman_guru');
		}
	}

  public function halamanUbahGuru($id)
  {
    $data['title'] = "SPOT | Ubah Guru";
    $query = $this->ModelAdmin->LihatGuru($id);
		$data['guru'] = $query->result_array();
    $query = $this->ModelAdmin->TampilMapel();
		$data['mapel'] = $query->result_array();
    $this->load->view('admin_ubah_guru', $data);
  }

  public function hapusGuru($id)
  {
    $this->ModelAdmin->HapusGuru($id);
    redirect('Admin/halamanGuru');
  }

  /*================ SISWA ================*/

  public function halamanSiswa()
  {
    $query = $this->ModelAdmin->TampilSiswa();
    $data['siswa'] = $query->result_array();
    $query = $this->ModelAdmin->TampilKelas();
		$data['kelas'] = $query->result_array();

		$data['title'] = 'SPOT | Data Siswa';
		$this->load->view('admin_halaman_siswa', $data);
  }

  public function prosesTambahSiswa()
	{
		$this->form_validation->set_rules('NIS','NIS','required');
		$this->form_validation->set_rules('idKelas','Kelas','required');
		$this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');
    $password = random_string('alnum', 8);

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'idSiswa'=>NULL,
				'NIS'=>$this->input->post('NIS'),
				'idKelas'=>$this->input->post('idKelas'),
				'namaSiswa'=>$this->input->post('nama'),
				'password'=>$password,
        'alamatSiswa'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->InsertSiswa($insertData);
			redirect('Admin/halamanSiswa');
		} else {
			$this->load->view('admin_halaman_siswa');
		}
	}

  public function halamanUbahSiswa($id)
  {
    $data['title'] = "SPOT | Ubah Siswa";
    $query = $this->ModelAdmin->LihatSiswa($id);
		$data['siswa'] = $query->result_array();
    $query = $this->ModelAdmin->TampilKelas();
		$data['kelas'] = $query->result_array();
    $this->load->view('admin_ubah_siswa', $data);
  }

  public function hapusSiswa($id)
  {
    $this->ModelAdmin->HapusSiswa($id);
		redirect('Admin/halamanSiswa');
  }

  /*================ KONTRAK ================*/

  public function halamanKontrak()
  {
    $query = $this->ModelAdmin->TampilKontrak();
    $data['kontrak'] = $query->result_array();
    $query = $this->ModelAdmin->TampilKelas();
    $data['kelas'] = $query->result_array();
    $query = $this->ModelAdmin->TampilMapel();
    $data['mapel'] = $query->result_array();

    $data['title'] = 'SPOT | Data Kontrak';
    $this->load->view('admin_halaman_kontrak', $data);
  }

  public function prosesTambahKontrak()
	{
		$this->form_validation->set_rules('idMapel','Mapel','required');
		$this->form_validation->set_rules('idKelas','Kelas','required');

		if($this->form_validation->run() === TRUE)
		{
      $idKelas = $this->input->post('idKelas');
      $idMapel = $this->input->post('idMapel');

      $data_kelas = $this->ModelAdmin->GetKelas($idKelas)->result();
      $data_mapel = $this->ModelAdmin->GetMapel($idMapel)->result();
      foreach ($data_kelas as $kelas) {
        $namaKelas = $kelas->namaKelas;
      }
      foreach ($data_mapel as $mapel) {
        $namaMapel = $mapel->namaMapel;
      }
      if($this->ModelAdmin->check_kontrak($idKelas,$idMapel) == FALSE)
      {
        $insertData = array(
  				'idKontrak'=>NULL,
  				'idMapel'=>$this->input->post('idMapel'),
  				'idKelas'=>$this->input->post('idKelas')
  			);
  			$this->ModelAdmin->InsertKontrak($insertData);
  			redirect('Admin/halamanKontrak');
      }else{
        $data['message'] = "Kelas ".$namaKelas." sudah mengontrak mata pelajaran ".$namaMapel;

        $query = $this->ModelAdmin->TampilKontrak();
        $data['kontrak'] = $query->result_array();
        $query = $this->ModelAdmin->TampilKelas();
        $data['kelas'] = $query->result_array();
        $query = $this->ModelAdmin->TampilMapel();
        $data['mapel'] = $query->result_array();

        $data['title'] = 'SPOT | Data Kontrak';
        $this->load->view('admin_halaman_kontrak',$data);
      }
		} else {
			$this->load->view('admin_halaman_kontrak');
		}
	}

  public function hapusKontrak($id)
  {
    $this->ModelAdmin->HapusKontrak($id);
		redirect('Admin/halamanKontrak');
  }

  /* DIPAKAI========================================================*/


  public function halamanAkun()
  {
    $query = $this->ModelAdmin->TampilDataGuru();
    $data['guru'] = $query->result_array();

    $query = $this->ModelAdmin->TampilDataSiswa();
		$data['siswa'] = $query->result_array();

		$this->load->view('admin_halaman_akun', $data);
  }

  public function halamanTambahSiswa()
  {
    $data['title'] = "SPOT | Tambah Siswa";

    $query = $this->ModelAdmin->TampilKelas();
		$data['kelas'] = $query->result_array();

    $this->load->view('admin_tambah_siswa', $data);
  }

  public function halamanTambahKontrak()
  {
    $data['title'] = "SPOT | Tambah Kontrak";
    $query = $this->ModelAdmin->TampilKelas();
		$data['kelas'] = $query->result_array();

    $query = $this->ModelAdmin->TampilMapel();
		$data['mapel'] = $query->result_array();
    $this->load->view('admin_tambah_kontrak', $data);
  }

  public function halamanUbahPasswordGuru($id)
  {
    $data['title'] = "SPOT | Ubah Guru";
    $query = $this->ModelAdmin->LihatGuru($id);
		$data['guru'] = $query->result_array();
    $this->load->view('admin_ubah_password_guru', $data);
  }

  public function halamanUbahPasswordSiswa($id)
  {
    $data['title'] = "SPOT | Ubah Siswa";
    $query = $this->ModelAdmin->LihatSiswa($id);
		$data['siswa'] = $query->result_array();
    $this->load->view('admin_ubah_password_siswa', $data);
  }











  public function prosesUbahGuru()
	{
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIP','NIP','required');
		$this->form_validation->set_rules('idMapel','Mapel','required');
		$this->form_validation->set_rules('nama','Nama','required');
		$this->form_validation->set_rules('hp','No HP','required');
    $this->form_validation->set_rules('alamat','Alamat','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'NIP'=>$this->input->post('NIP'),
				'idMapel'=>$this->input->post('idMapel'),
				'namaGuru'=>$this->input->post('nama'),
				'noHP'=>$this->input->post('hp'),
        'alamat'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->UbahGuru($insertData,$id);
			redirect('Admin/halamanGuru');
		} else {
			$this->load->view('admin_ubah_guru');
		}
	}

  public function prosesUbahPasswordGuru()
	{
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIP','NIP','required');
		$this->form_validation->set_rules('password','Pasword','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'NIP'=>$this->input->post('NIP'),
				'password'=>$this->input->post('password')
			);
			$this->ModelAdmin->UbahPasswordGuru($insertData,$id);
			redirect('Admin/halamanAkun');
		} else {
			$this->load->view('admin_ubah_password_guru');
		}
	}

  public function prosesUbahPasswordSiswa()
	{
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIS','NIS','required');
		$this->form_validation->set_rules('password','Pasword','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'NIS'=>$this->input->post('NIS'),
				'password'=>$this->input->post('password')
			);
			$this->ModelAdmin->UbahPasswordSiswa($insertData,$id);
			redirect('Admin/halamanAkun');
		} else {
			$this->load->view('admin_ubah_password_siswa');
		}
	}

  public function prosesUbahSiswa()
	{
    $id = $this->input->post('id');
		$this->form_validation->set_rules('NIS','NIS','required');
		$this->form_validation->set_rules('idKelas','Kelas','required');
		$this->form_validation->set_rules('nama','Nama','required');
    $this->form_validation->set_rules('alamat','Alamat','required');

		if($this->form_validation->run() === TRUE)
		{
      $insertData = array(
				'NIS'=>$this->input->post('NIS'),
				'idKelas'=>$this->input->post('idKelas'),
				'namaSiswa'=>$this->input->post('nama'),
        'alamatSiswa'=>$this->input->post('alamat')
			);
			$this->ModelAdmin->UbahSiswa($insertData,$id);
			redirect('Admin/halamanSiswa');
		} else {
			$this->load->view('admin_ubah_siswa');
		}
	}

  public function halaman404()
  {
    $data['title'] = "SPOT | Halaman tidak ditemukan";
    $this->load->view('404', $data);
  }


}
