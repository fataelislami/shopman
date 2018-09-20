<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Invoice extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    $this->load->model(array('invoice_model'));
    //Codeigniter : Write Less Do More
  }

  public function index()
  {

    $data = array(
      'contain_view' => 'admin/invoice/invoice_form',
      'sidebar'=>'admin/sidebar',
      'css'=>'admin/assets/css',
      'script'=>'admin/crudassets/script',
      'module'=>'admin',
      'titlePage'=>'payment'
     );
    $this->template->load($data);
  }

  public function getAllProductByCart(){
    $data = $this->invoice_model->getBarangByCart('17');
    echo json_encode($data);
  }

  public function getProductByID(){
    $data = $this->invoice_model->getBarangById('14');
    echo json_encode($data);
  }


}
