<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function prosesLogin()
  {
    $this->form_validation->set_rules('username','Username','required');
    $this->form_validation->set_rules('password','Password','required');

    if($this->form_validation->run() == TRUE)
    {
      $username = $this->input->post('username');
      $password = $this->input->post('password');

      if($this->ModelLogin->check_admin($username,$password) == TRUE)
      {
        $data = array('username'  => $username,
                      'role'  => 'admin',
                      'login'     => TRUE);
        $this->session->set_userdata($data);
        redirect('Index');
      }else if($this->ModelLogin->check_guru($username,$password) == TRUE)
      {
        $data = array('username'  => $username,
                      'role'  => 'guru',
                      'login'     => TRUE);
        $this->session->set_userdata($data);
        redirect('Index');
      }else if($this->ModelLogin->check_siswa($username,$password) == TRUE)
      {
        $data = array('username'  => $username,
                      'role'  => 'siswa',
                      'login'     => TRUE);
        $this->session->set_userdata($data);
        redirect('Index');
      }else{
        $data['title'] = 'SPOT | Halaman Login';
        $data['message'] = "Username atau password salah";
        $this->load->view('login_form', $data);
      }
    }
  }

  public function prosesLogout()
  {
    $this->session->sess_destroy();
    redirect('Index','refresh');
  }

}
