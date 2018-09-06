<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resetpassword extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Dbs'));
  }

  function index()
  {
    $email=$_GET['email'];
    $data=array(
      'email' => $email
    );
    $this->load->view('vResetpassword',$data);


  }

  function resetPass_act(){
    $email=$this->input->post('email');
    $psw=$this->input->post('psw2');
    $cekemailuser = $this->Dbs->getEmailuser("superadmin",$email);
    $cekemailuser2 = $this->Dbs->getEmailuser("admin",$email);
    $cek=$cekemailuser->num_rows();
    $cek2=$cekemailuser2->num_rows();

    if ($cek>0) {
        $get=$cekemailuser->row();
        $data=array(
          'password' => md5($psw)
        );
        $this->Dbs->ubahpasswordUser('superadmin',$email,$data);
        redirect(base_url('login'));

    } else if ($cek2>0) {
        $get=$cekemailuser2->row();
        $data=array(
          'password' => md5($psw)
        );
        $this->Dbs->ubahpasswordUser('admin',$email,$data);
        redirect(base_url('login'));
    } else {
      $this->session->set_flashdata('flashMessage', 'Email yang anda masukan belum pernah didaftarkan');
      redirect(base_url('login'));
    }
  }


}