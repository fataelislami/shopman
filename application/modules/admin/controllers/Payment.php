<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_model');
        $this->load->library('form_validation');
    }

    public function index()
    {

      $datapayment=$this->Payment_model->get_all();//panggil ke modell
      $datafield=$this->Payment_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/payment/payment_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datapayment'=>$datapayment,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'payment'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/payment/payment_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/payment/create_action',
        'titlePage'=>'{nama halaman}'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Payment_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/payment/payment_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/payment/update_action',
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
		'payment_date' => $this->input->post('payment_date',TRUE),
		'confirmation_date' => $this->input->post('confirmation_date',TRUE),
		'status' => $this->input->post('status',TRUE),
		'address_destination' => $this->input->post('address_destination',TRUE),
		'id_adders' => $this->input->post('id_adders',TRUE),
		'id_payment_method' => $this->input->post('id_payment_method',TRUE),
		'id_cart' => $this->input->post('id_cart',TRUE),
	    );

            $this->Payment_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/payment'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_payment', TRUE));
        } else {
            $data = array(
		'payment_date' => $this->input->post('payment_date',TRUE),
		'confirmation_date' => $this->input->post('confirmation_date',TRUE),
		'status' => $this->input->post('status',TRUE),
		'address_destination' => $this->input->post('address_destination',TRUE),
		'id_adders' => $this->input->post('id_adders',TRUE),
		'id_payment_method' => $this->input->post('id_payment_method',TRUE),
		'id_cart' => $this->input->post('id_cart',TRUE),
	    );

            $this->Payment_model->update($this->input->post('id_payment', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/payment'));
        }
    }

    public function delete($id)
    {
        $row = $this->Payment_model->get_by_id($id);

        if ($row) {
            $this->Payment_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/payment'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/payment'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('payment_date', 'payment date', 'trim|required');
	$this->form_validation->set_rules('confirmation_date', 'confirmation date', 'trim|required');
	$this->form_validation->set_rules('status', 'status', 'trim|required');
	$this->form_validation->set_rules('address_destination', 'address destination', 'trim|required');
	$this->form_validation->set_rules('id_adders', 'id adders', 'trim|required');
	$this->form_validation->set_rules('id_payment_method', 'id payment method', 'trim|required');
	$this->form_validation->set_rules('id_cart', 'id cart', 'trim|required');

	$this->form_validation->set_rules('id_payment', 'id_payment', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
