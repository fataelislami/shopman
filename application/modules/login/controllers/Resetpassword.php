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
    $rand=$_GET['rand'];
    $data=array(
      'rand' => $rand
    );
    $this->load->view('vResetpassword',$data);


  }

  function resetPass_act(){
    $rand=$this->input->post('rand');
    $psw=$this->input->post('psw2');
    $email=$this->Dbs->getEmailbyrand($rand)->row()->email;
    $cekemailuser = $this->Dbs->getEmailuser("superadmin",$email);
    $cekemailuser2 = $this->Dbs->getEmailuser("admin",$email);
    $cek=$cekemailuser->num_rows();
    $cek2=$cekemailuser2->num_rows();

    if ($cek>0) {// kondisi ini untuk mengecek apakah email ada di database atau tidak dan mengupdate password
        $get=$cekemailuser->row();
        $data=array(
          'password' => md5($psw)
        );
        $this->Dbs->ubahpasswordUser('superadmin',$email,$data);
        $this->Dbs->delete('random',$rand,'random_link');
        redirect(base_url('login'));

    } else if ($cek2>0) {
        $get=$cekemailuser2->row();
        $data=array(
          'password' => md5($psw)
        );
        $this->Dbs->ubahpasswordUser('admin',$email,$data);
        $this->Dbs->delete('random',$rand,'random_link');
        redirect(base_url('login'));
    } else {
      $this->session->set_flashdata('flashMessage', 'Email yang anda masukan belum pernah didaftarkan');
      redirect(base_url('login'));
    }
  }


}