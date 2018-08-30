<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Dbs'));
  }

  function index()
  {
    $this->load->view('vLogin');
  }

  function auth(){//Proses pengecekan login
    $username = $this->input->post('username');
    $password = $this->input->post('password');
    $where = array(
      'email' => $username,
      'password' => md5($password)
      );
    $sql = $this->Dbs->check("superadmin",$where);//ubah user menjadi nama table user didatabase saat ini
    $check = $sql->num_rows();
    $sql2 = $this->Dbs->check("admin",$where);
    $check2 = $sql2->num_rows();
    if ($check > 0) {
      $get=$sql->row();
      $id_superadmin=$get->id_superadmin;
      $name=$get->name;
      $level='superadmin';
      $data_session = array(//Data yang akan disimpan kedalam session
				'username' => $username,
        'name'=>$name,
				'status' => "login",
        'level'=>$level,
        'id'=>$id_superadmin
				);
			$this->session->set_userdata($data_session);
      redirect(site_url($level));
      // Cara Memanggil Session
      // $this->session->userdata('status');  << contoh ketika memanggil isi nilai dari array status, output=login
      // $this->session->userdata('id'); << isi nilai id pada session, jika superadmin maka akan muncul id_superadmi
    }
    else if ($check2 > 0) {
      $get=$sql->row();
      $id_admin=$get->id_admin;
      $name=$get->name;
      $level='admin';
      $data_session = array(//Data yang akan disimpan kedalam session
				'username' => $username,
        'name'=>$name,
				'status' => "login",
        'level'=>$level,
        'id'=>$id_admin
				);
			$this->session->set_userdata($data_session);
      redirect(site_url($level));
    }
    else{
       $this->session->set_flashdata('flashMessage', 'Username dan Password Salah');
       redirect(base_url('login'));
     }

  //   $check=$sql->num_rows();
    // if($check > 0){
  //     //Kalo login berhasil eksekusi disini

    // }else{
  //     $this->session->set_flashdata('flashMessage', 'Username dan Password Salah');
  //     redirect(base_url('login'));
    // }
  }




  function randomPassword($length = 3) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

public function email($subject,$isi,$emailtujuan){

$config['protocol'] = 'smtp';
$config['smtp_host'] = 'ssl://smtp.gmail.com';
$config['smtp_port'] = '465';
$config['smtp_user'] = 'shopagansta@gmail.com';
$config['smtp_pass'] = 'faztars123'; //ini pake akun pass google email
$config['mailtype'] = 'html';
$config['charset'] = 'iso-8859-1';
$config['wordwrap'] = 'TRUE';
$config['newline'] = "\r\n";

$this->load->library('email', $config);
$this->email->initialize($config);

$this->email->from('shopagansta@gmail.com');
$this->email->to($emailtujuan);
$this->email->subject($subject);
$this->email->message($isi);
$this->email->set_mailtype('html');
$this->email->send();
}

  function LupaPassword(){
    $this->load->view('vForgotpasword');
  }

  function lupaPassword_act(){
    $email = $this->input->post('email');
    $cekemailuser = $this->Dbs->getEmailuser("superadmin",$email);
    $cekemailuser2 = $this->Dbs->getEmailuser("admin",$email);
    $cek=$cekemailuser->num_rows();
    $cek2=$cekemailuser2->num_rows();

    if ($cek>0) {
        $get=$cekemailuser->row();
        $length=8;
        $passwordBaru = $this->randomPassword($length);
        $data['password'] = md5($passwordBaru);
        $this->Dbs->ubahpasswordUser('superadmin',$email,$data);
        $this->email("Info Akun","Password Baru Anda : ".$passwordBaru,$email);
        $this->session->set_flashdata('flashMessage', 'Password baru telah terkirim,silahkan cek email anda');
        redirect(base_url('login'));

    } else if ($cek2>0) {
        $get=$cekemailuser2->row();
        $length=8;
        $passwordBaru = $this->randomPassword($length);
        $data['password'] = md5($passwordBaru);
        $this->email("Info Akun","Password Baru Anda : ".$passwordBaru,$email);
        $this->session->set_flashdata('flashMessage', 'Password baru telah terkirim,silahkan cek email anda');
        redirect(base_url('login'));
    } else {
      $this->session->set_flashdata('flashMessage', 'Email yang anda masukan belum pernah didaftarkan');
      redirect(base_url('login'));
    }


  }

  function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}



  // function reset(){
  //   $email=$this->input->post('email');
  //   $where = array(
	// 		'email' => $email,
	// 		);
	// 	$sql = $this->Dbs->check("user",$where);
  //   $check=$sql->num_rows();
	// 	if($check > 0){
  //     $getdatauser=$sql->result();
  //     $passwordBaru="pwBaru".$this->randomPassword();
  //     $username=$getdatauser[0]->username;
  //     $data = array(
  //       'password' => md5($passwordBaru)
  //     );
  //     $this->User_model->update($username,$data);
  //     $this->email("Info Akun","Password Baru Anda : ".$passwordBaru,$email);
  //     $this->session->set_flashdata('flashMessage', 'Password baru telah terkirim,silahkan cek email anda');
  //     redirect(base_url('login'));
  //   }else{
  //     $this->session->set_flashdata('flashMessage', 'Email yang anda masukan belum pernah didaftarkan');
  //     redirect(base_url('login'));
  //   }
  //
  // }

}
