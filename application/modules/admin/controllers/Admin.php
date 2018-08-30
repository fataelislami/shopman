<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
    $this->load->model(array('Dbs'));
    if($this->session->userdata('status')!='login'){//cek kalo status tidak login
      redirect(base_url('login'));
    }
    if($this->session->userdata('level')!='admin'){//cek kalo level user tidak sama kaya nama modul
      redirect(redirect($_SERVER['HTTP_REFERER']));
    }
  }

  function index()
  {

    $data = array(
      'contain_view' => 'admin/home_v',
      'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
      'css'=>'admin/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'admin/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
      'titlePage'=>'HOME',//Ini Judul Page untuk tiap halaman
     );
    // $this->load->view('home_v', $data);
    $this->template->load($data);//pake sistem template, semua view yang di module berupa body saja
  }

}
