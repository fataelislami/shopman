<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Dbs'));
  }

  function index(){
  	$this->load->view('vRegister');
  }

  function createRegister(){
  	$email=$this->input->post('email');
    $password=$this->input->post('password');
    $name=$this->input->post('name');
    $address=$this->input->post('address');
    $store_title=$this->input->post('store_title');
    $date=$this->input->post('date');
  	$cekemailuser = $this->Dbs->cekEmail("superadmin",$email);
    $cekemailuser2 = $this->Dbs->cekEmail("admin",$email);
    $cek=$cekemailuser->num_rows();
    $cek2=$cekemailuser2->num_rows();

    if ($cek > 0) {
     echo "<script type='text/javascript'>alert('Maaf Email Sudah Terdaftar'); document.location='http://localhost/shopman2/register' </script>";
    }else if ($cek2 > 0){
     echo "<script type='text/javascript'>alert('Maaf Email Sudah Terdaftar'); document.location='http://localhost/shopman2/register' </script>";
    } else {
      $data=array(
        'email' => $email,
        'password' => md5($password),
        'name' => $name,
        'address' => $address,
        'store_title' => $store_title,
        'date' => $date
      );
      $sql = $this->Dbs->insert($data,'admin');
      if ($sql) {
        echo "<script type='text/javascript'>alert('Akun berhasil dibuat'); document.location='http://localhost/shopman2/Login' </script>";
      }
    	
    }

  }

}  