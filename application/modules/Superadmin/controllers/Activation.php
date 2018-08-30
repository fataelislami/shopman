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
        if($this->session->userdata('status')!='login'){//cek kalo status tidak login
          redirect(base_url('login'));
        }
        if($this->session->userdata('level')!='superadmin'){//cek kalo level user tidak sama kaya nama modul
          redirect(redirect($_SERVER['HTTP_REFERER']));
        }
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
      $admin = $this->Activation_model->get_by_id($id);
      $superadmin = $this->session->userdata('id');; //isi super admin disini

      if ($admin) {
        //cek jika admin sudah pernah melakukan registrasi
        //dan masih mempunyai masa aktif botchat
        if (($admin->expire_date != '0000-00-00') && ($admin->regist_date < $admin->expire_date)) {
            $this->Activation_model->activation_old($id,$superadmin);
        } else {
            $this->Activation_model->activation_new($id,$superadmin);
        }


        $this->session->set_flashdata('message', 'Activaion Record Success');
        redirect(site_url('superadmin/activation'));
      } else {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect(site_url('superadmin/activation'));
      }


      $row = $this->Activation_model->get_by_id($id);


    }

    public function deactivation($id){
      $di_admin   = $id;
      $superadmin = "NULL";

      $row = $this->Activation_model->get_by_id($id);

      if ($row) {
        $this->Activation_model->deactivation($id,$superadmin);
        $this->session->set_flashdata('message', 'Deactivaion Record Success');
        redirect(site_url('superadmin/activation'));
      } else {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect(site_url('superadmin/activation'));
      }
    }

}
