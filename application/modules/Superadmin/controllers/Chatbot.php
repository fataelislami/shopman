<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Chatbot extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Chatbot_model');
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

      $datachatbot=$this->Chatbot_model->get_all();//panggil ke modell
      $datafield=$this->Chatbot_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'superadmin/chatbot/chatbot_list',
        'sidebar'=>'superadmin/sidebar',
        'css'=>'superadmin/assets/css',
        'script'=>'superadmin/assets/script',
        'datachatbot'=>$datachatbot,
        'datafield'=>$datafield,
        'module'=>'superadmin',
        'titlePage'=>'chatbot'
       );
      $this->template->load($data);
    }


    public function create(){
      $data = array(
        'contain_view' => 'superadmin/chatbot/chatbot_form',
        'sidebar'=>'superadmin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'superadmin/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'superadmin/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'superadmin/chatbot/create_action',
        'titlePage'=>'{nama halaman}'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Chatbot_model->get_by_id($id);
      $data = array(
        'contain_view' => 'superadmin/chatbot/chatbot_edit',
        'sidebar'=>'superadmin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'superadmin/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'superadmin/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'superadmin/chatbot/update_action',
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
		'name' => $this->input->post('name',TRUE),
		'access_token' => $this->input->post('access_token',TRUE),
		'secret_token' => $this->input->post('secret_token',TRUE),
		'expire_token' => $this->input->post('expire_token',TRUE),
		'id_admin' => $this->input->post('id_admin',TRUE),
		'id_superadmin' => $this->session->userdata('id'),//ngambil id superadmin dari session
	    );

            $this->Chatbot_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('superadmin/chatbot'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_chatbot', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'access_token' => $this->input->post('access_token',TRUE),
		'secret_token' => $this->input->post('secret_token',TRUE),
		'expire_token' => $this->input->post('expire_token',TRUE),
		'id_admin' => $this->input->post('id_admin',TRUE),
    'id_superadmin' => $this->session->userdata('id'),//ngambil id superadmin dari session
	    );

            $this->Chatbot_model->update($this->input->post('id_chatbot', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('superadmin/chatbot'));
        }
    }

    public function delete($id)
    {
        $row = $this->Chatbot_model->get_by_id($id);

        if ($row) {
            $this->Chatbot_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('superadmin/chatbot'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('superadmin/chatbot'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('access_token', 'access token', 'trim|required');
	$this->form_validation->set_rules('secret_token', 'secret token', 'trim|required');
	$this->form_validation->set_rules('expire_token', 'expire token', 'trim|required');
	$this->form_validation->set_rules('id_admin', 'id admin', 'trim|required');

	$this->form_validation->set_rules('id_chatbot', 'id_chatbot', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
