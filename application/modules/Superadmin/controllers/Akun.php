<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Akun extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Akun_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $dataakun=$this->Akun_model->get_all();//panggil ke modell
      $datafield=$this->Akun_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'superadmin/akun/superadmin_list',
        'sidebar'=>'superadmin/sidebar',
        'css'=>'superadmin/assets/css',
        'script'=>'superadmin/assets/script',
        'dataakun'=>$dataakun,
        'datafield'=>$datafield,
        'module'=>'superadmin',
        'titlePage'=>'akun'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'superadmin/akun/superadmin_form',
        'sidebar'=>'superadmin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'superadmin/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'superadmin/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'superadmin/akun/create_action',
        'titlePage'=>'{nama halaman}'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Akun_model->get_by_id($id);
      $data = array(
        'contain_view' => 'superadmin/akun/superadmin_edit',
        'sidebar'=>'superadmin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'superadmin/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'superadmin/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'superadmin/akun/update_action',
        'dataedit'=>$dataedit,
        'titlePage'=>'{nama halaman}'
       );
      $this->template->load($data);
    }


    public function create_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
        		'username' => $this->input->post('username',TRUE),
        		'password' => md5($this->input->post('password',TRUE)),
        		'email' => $this->input->post('email',TRUE),
        		'name' => $this->input->post('name',TRUE),
	           );

            $this->Akun_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('superadmin/akun'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_superadmin', TRUE));
        } else {
          if ($this->input->post('password') == '') {
            $data = array(
        		'username' => $this->input->post('username',TRUE),
        		'email' => $this->input->post('email',TRUE),
        		'name' => $this->input->post('name',TRUE),
        	    );
          } else {
            $data = array(
        		'username' => $this->input->post('username',TRUE),
        		'password' => md5($this->input->post('password',TRUE)),
        		'email' => $this->input->post('email',TRUE),
        		'name' => $this->input->post('name',TRUE),
        	    );
          }


            $this->Akun_model->update($this->input->post('id_superadmin', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('superadmin/akun'));
        }
    }

    public function delete($id)
    {
        $row = $this->Akun_model->get_by_id($id);

        if ($row) {
            $this->Akun_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('superadmin/akun'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('superadmin/akun'));
        }
    }

    public function _rules()
    {
    	$this->form_validation->set_rules('username', 'username', 'trim|required');
    	#$this->form_validation->set_rules('password', 'password', 'trim|required');
    	$this->form_validation->set_rules('email', 'email', 'trim|required');
    	$this->form_validation->set_rules('name', 'name', 'trim|required');

    	$this->form_validation->set_rules('id_superadmin', 'id_superadmin', 'trim');
    	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
