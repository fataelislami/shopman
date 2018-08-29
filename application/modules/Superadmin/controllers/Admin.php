<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Admin_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $dataadmin=$this->Admin_model->get_all();//panggil ke modell
      $datafield=$this->Admin_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'superadmin/admin/admin_list',
        'sidebar'=>'superadmin/sidebar',
        'css'=>'superadmin/assets/css',
        'script'=>'superadmin/assets/script',
        'dataadmin'=>$dataadmin,
        'datafield'=>$datafield,
        'module'=>'superadmin',
        'titlePage'=>'Admin Olshop'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'superadmin/admin/admin_form',
        'sidebar'=>'superadmin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'superadmin/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'superadmin/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'superadmin/admin/create_action',
        'titlePage'=>'Tambah Data Admin'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Admin_model->get_by_id($id);
      $datasuper=$this->Admin_model->get_all_superadmin();
      $data = array(
        'contain_view' => 'superadmin/admin/admin_edit',
        'sidebar'=>'superadmin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'superadmin/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'superadmin/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'superadmin/admin/update_action',
        'dataedit'=>$dataedit,
        'datasuper'=>$datasuper,
        'titlePage'=>'Edit Data Admin'
       );
      $this->template->load($data);
    }


    public function create_action()
    {
        $this->_rules();
        $now = date('Y-m-d');

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
        $data = array(
          'email' => $this->input->post('email',TRUE),
          'password' => md5($this->input->post('password',TRUE)),
          'name' => $this->input->post('name',TRUE),
          'address' => $this->input->post('address',TRUE),
          'store_title' => $this->input->post('store_title',TRUE),
          'date' => $now,
          'regist_date' => NULL,
          'expire_date' => NULL,
          'id_superadmin' => NULL,
	    );

            $this->Admin_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('superadmin/admin'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_admin', TRUE));
        } else {
          if ($this->input->post('password') == '') {
            $data = array(
        		'email' => $this->input->post('email',TRUE),
        		'name' => $this->input->post('name',TRUE),
        		'address' => $this->input->post('address',TRUE),
        		'store_title' => $this->input->post('store_title',TRUE),
        		'date' => $this->input->post('date',TRUE),
        		'regist_date' => $this->input->post('regist_date',TRUE),
        		'expire_date' => $this->input->post('expire_date',TRUE),
        		'id_superadmin' => $this->input->post('id_superadmin',TRUE),
            );
          }  else {
            $data = array(
        		'email' => $this->input->post('email',TRUE),
        		'password' => md5($this->input->post('password',TRUE)),
        		'name' => $this->input->post('name',TRUE),
        		'address' => $this->input->post('address',TRUE),
        		'store_title' => $this->input->post('store_title',TRUE),
        		'date' => $this->input->post('date',TRUE),
        		'regist_date' => $this->input->post('regist_date',TRUE),
        		'expire_date' => $this->input->post('expire_date',TRUE),
        		'id_superadmin' => $this->input->post('id_superadmin',TRUE),
            );
          }


            $this->Admin_model->update($this->input->post('id_admin', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('superadmin/admin'));
        }
    }

    public function delete($id)
    {
        $row = $this->Admin_model->get_by_id($id);

        if ($row) {
            $this->Admin_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('superadmin/admin'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('superadmin/admin'));
        }
    }

    public function _rules()
    {
      	$this->form_validation->set_rules('email', 'email', 'trim|required');
      	#$this->form_validation->set_rules('password', 'password', 'trim|required');
      	$this->form_validation->set_rules('name', 'name', 'trim|required');
      	$this->form_validation->set_rules('address', 'address', 'trim|required');
      	$this->form_validation->set_rules('store_title', 'store title', 'trim|required');
      	#$this->form_validation->set_rules('date', 'date', 'trim|required');
      	#$this->form_validation->set_rules('regist_date', 'regist date', 'trim|required');
      	#$this->form_validation->set_rules('expire_date', 'expire date', 'trim|required');
      	#$this->form_validation->set_rules('id_superadmin', 'id superadmin', 'trim|required');

      	$this->form_validation->set_rules('id_admin', 'id_admin', 'trim');
      	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
