<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Activation extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Activation_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $dataadmin=$this->Activation_model->get_all();//panggil ke modell
      $datafield=$this->Activation_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'superadmin/activation/activation_list',
        'sidebar'=>'superadmin/sidebar',
        'css'=>'superadmin/assets/css',
        'script'=>'superadmin/assets/script',
        'dataadmin'=>$dataadmin,
        'datafield'=>$datafield,
        'module'=>'superadmin',
        'titlePage'=>'Activation'
       );
      $this->template->load($data);
    }

    public function activation($id){
      $di_admin   = $id;
      $superadmin = '2'; //isi super admin disini

      $row = $this->Activation_model->get_by_id($id);

      if ($row) {
        $this->Activation_model->activation($id,$superadmin);
        $this->session->set_flashdata('message', 'Activaion Record Success');
        redirect(site_url('superadmin/activation'));
      } else {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect(site_url('superadmin/activation'));
      }
    }

    public function deactivation($id){
      $di_admin   = $id;
      $superadmin = "NULL";

      $row = $this->Activation_model->get_by_id($id);

      if ($row) {
        $this->Activation_model->activation($id,$superadmin);
        $this->session->set_flashdata('message', 'Deactivaion Record Success');
        redirect(site_url('superadmin/activation'));
      } else {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect(site_url('superadmin/activation'));
      }
    }

}
