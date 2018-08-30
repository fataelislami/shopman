<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Payment_method extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Payment_method_model');
        $this->load->library('form_validation');
        if($this->session->userdata('status')!='login'){//cek kalo status tidak login
          redirect(base_url('login'));
        }
        if($this->session->userdata('level')!='admin'){//cek kalo level user tidak sama kaya nama modul
          redirect(redirect($_SERVER['HTTP_REFERER']));
        }
    }

    public function index()
    {

      $datapayment_method=$this->Payment_method_model->get_all();//panggil ke modell
      $datafield=$this->Payment_method_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/payment_method/payment_method_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datapayment_method'=>$datapayment_method,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'payment_method'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'admin/payment_method/payment_method_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/payment_method/create_action',
        'titlePage'=>'Payment Method'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Payment_method_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/payment_method/payment_method_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/payment_method/update_action',
        'dataedit'=>$dataedit,
        'titlePage'=>'Payment Method'
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
		'bank_name' => $this->input->post('bank_name',TRUE),
		'account_number' => $this->input->post('account_number',TRUE),
		'account_name' => $this->input->post('account_name',TRUE),
		'id_admin' => $this->session->userdata('id'),
	    );

            $this->Payment_method_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/payment_method'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_payment_method', TRUE));
        } else {
            $data = array(
		'bank_name' => $this->input->post('bank_name',TRUE),
		'account_number' => $this->input->post('account_number',TRUE),
		'account_name' => $this->input->post('account_name',TRUE),
		'id_admin' => $this->session->userdata('id'),
	    );

            $this->Payment_method_model->update($this->input->post('id_payment_method', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/payment_method'));
        }
    }

    public function delete($id)
    {
        $row = $this->Payment_method_model->get_by_id($id);

        if ($row) {
            $this->Payment_method_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/payment_method'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/payment_method'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('bank_name', 'bank name', 'trim|required');
	$this->form_validation->set_rules('account_number', 'account number', 'trim|required');
	$this->form_validation->set_rules('account_name', 'account name', 'trim|required');

	$this->form_validation->set_rules('id_payment_method', 'id_payment_method', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
