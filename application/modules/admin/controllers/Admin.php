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
    //memanggil model
    $this->load->model(array('Admin_model'));

    //memanggil data dari database
    $DBproduct = $this->Admin_model->getAllproduct($this->session->userdata('id'));
    $DBcategory = $this->Admin_model->getAllCategory($this->session->userdata('id'));
    $DBproductsold = $this->Admin_model->getProductSold($this->session->userdata('id'));
    $DBincome =$this->Admin_model->getIncome($this->session->userdata('id'));
    $DBincomepermonth = $this->Admin_model->getIncomePerMonth($this->session->userdata('id'))->result();
    $countProduct = $DBproduct->num_rows(); //jumlah produk
    $countCategory = $DBcategory->num_rows(); //jumlah category
    $countProductSold = $DBproductsold->row(); //jumlah produk terjual
    $countIncome = $DBincome->row(); //jumlah pendapatan admin

    //mengampil pendapatan perbulan
    $Jan=0; $Feb=0;$Mar=0;$Apr=0;$May=0;$Jun=0;$Jully=0;$Aug=0;$Sept=0;$Oct=0;$Nov=0;$Dec=0;
    foreach ($DBincomepermonth as $a) {
      switch ($a->month) {
        case '1':
          $Jan = $a->jumlah;
          break;
        case '2':
          $Feb = $a->jumlah;
          break;
        case '3':
          $Mar = $a->jumlah;
          break;
        case '4':
          $Apr = $a->jumlah;
          break;
        case '5':
          $May = $a->jumlah;
          break;
        case '6':
          $Jun = $a->jumlah;
          break;
        case '7':
          $Jully = $a->jumlah;
          break;
        case '8':
          $Aug = $a->jumlah;
          break;
        case '9':
          $Sept = $a->jumlah;
          break;
        case '10':
          $Oct = $a->jumlah;
          break;
        case '11':
          $Nov = $a->jumlah;
          break;
        case '12':
          $Dec = $a->jumlah;
          break;
      }
    }
    $month = [];
    array_push($month,$Jan,$Feb,$Mar,$Apr,$May,$Jun,$Jully,$Aug,$Sept,$Oct,$Nov,$Dec);
    //end mengambil pendapatan perbulan


    $data = array(
      'contain_view' => 'admin/home_v',
      'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
      'css'=>'admin/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
      'script'=>'admin/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
      'countProduct' => $countProduct,
      'countCategory' => $countCategory,
      'countproductsold' => $countProductSold,
      'countIncome' => $countIncome,
      'countIncomePermonth' => $month,
      'titlePage'=>'HOME',//Ini Judul Page untuk tiap halaman
     );
    // $this->load->view('home_v', $data);
    $this->template->load($data);//pake sistem template; semua view yang di module berupa body saja
  }

}
