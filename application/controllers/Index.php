<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Index extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function index()
  {
    if($this->session->userdata('role') == 'admin' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'SPOT | Dashboard Admin';
			$data['username'] = $this->session->userdata('username');

			$this->load->view('admin_dashboard', $data);
		}else if($this->session->userdata('role') == 'guru' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'SPOT | Dashboard Guru';
			$data['username'] = $this->session->userdata('username');

			$this->load->view('guru_dashboard', $data);
		}else if($this->session->userdata('role') == 'siswa' && $this->session->userdata('login') == TRUE) {
			$data['title'] = 'SPOT | Dashboard Siswa';
			$data['username'] = $this->session->userdata('username');

			$this->load->view('siswa_dashboard', $data);
		}else{
			$data['title'] = 'SPOT | Halaman Login';
			$this->load->view('login_form', $data);
		}
  }


}
