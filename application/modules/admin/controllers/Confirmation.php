<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Confirmation extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Confirmation_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $dataconfirmation=$this->Confirmation_model->get_all();//panggil ke modell
      $datafield=$this->Confirmation_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/confirmation/confirmation_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'dataconfirmation'=>$dataconfirmation,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'confirmation'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/confirmation/confirmation_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/confirmation/create_action',
        'titlePage'=>'Confirmation'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Confirmation_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/confirmation/confirmation_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/confirmation/update_action',
        'dataedit'=>$dataedit,
        'titlePage'=>'Confirmation'
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
		'confirmation_date' => $this->input->post('confirmation_date',TRUE),
		'url_photo' => $this->input->post('url_photo',TRUE),
		'id_payment' => $this->input->post('id_payment',TRUE),
		'id_admin' => $this->input->post('id_admin',TRUE),
	    );

            $this->Confirmation_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/confirmation'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_confirmation', TRUE));
        } else {
            $data = array(
		'confirmation_date' => $this->input->post('confirmation_date',TRUE),
		'url_photo' => $this->input->post('url_photo',TRUE),
		'id_payment' => $this->input->post('id_payment',TRUE),
		'id_admin' => $this->input->post('id_admin',TRUE),
	    );

            $this->Confirmation_model->update($this->input->post('id_confirmation', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/confirmation'));
        }
    }

    public function delete($id)
    {
        $row = $this->Confirmation_model->get_by_id($id);

        if ($row) {
            $this->Confirmation_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/confirmation'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/confirmation'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('confirmation_date', 'confirmation date', 'trim|required');
	$this->form_validation->set_rules('url_photo', 'url photo', 'trim|required');
	$this->form_validation->set_rules('id_payment', 'id payment', 'trim|required');
	$this->form_validation->set_rules('id_admin', 'id admin', 'trim|required');

	$this->form_validation->set_rules('id_confirmation', 'id_confirmation', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}