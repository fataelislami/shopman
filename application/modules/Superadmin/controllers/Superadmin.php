<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Superadmin extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Dbs'));
    // if($this->session->userdata('status')!='login'){
    //   redirect(base_url('login'));
    // }
    // if($this->session->userdata('role')!=1){
    //   redirect(redirect($_SERVER['HTTP_REFERER']));
    // }
  }

  function index()
  {

    $data = array(
      'contain_view' => 'superadmin/home_v',
      'sidebar'=>'superadmin/sidebar',//Ini buat menu yang ditampilkan di module superadmin {DIKIRIM KE TEMPLATE}
      'css'=>'superadmin/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'superadmin/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
      'titlePage'=>'HOME',//Ini Judul Page untuk tiap halaman
     );
    // $this->load->view('home_v', $data);
    $this->template->load($data);//pake sistem template, semua view yang di module berupa body saja
  }

}
