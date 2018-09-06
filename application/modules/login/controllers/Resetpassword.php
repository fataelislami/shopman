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
    $id=$_GET['id'];
    echo $id;
    $this->load->view('vResetpassword');
  }

  function Reset()
  {

  }

}