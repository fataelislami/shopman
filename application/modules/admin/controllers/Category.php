<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Category_model');
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

      $datacategory=$this->Category_model->get_all($this->session->userdata('id'));//panggil ke modell
      $datafield=$this->Category_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/category/category_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'datacategory'=>$datacategory,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'category'
       );
      $this->template->load($data);
    }


    public function create(){
   // $datacreate=$this->Category_model->getadm($idadm);
      $data = array(
        'contain_view' => 'admin/category/category_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
       // 'datacreate'=>$datacreate,
        'action'=>'admin/category/create_action',
        'titlePage'=>'Category'
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Category_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/category/category_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/category/update_action',
        'dataedit'=>$dataedit,
        'titlePage'=>'Category'
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
		'id_admin' => $this->session->userdata('id'),
	    );

            $this->Category_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/category'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_category', TRUE));
        } else {
            $data = array(
		'name' => $this->input->post('name',TRUE),
		'id_admin' => $this->session->userdata('id'),
	    );

            $this->Category_model->update($this->input->post('id_category', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/category'));
        }
    }

    public function delete($id)
    {
        $row = $this->Category_model->get_by_id($id);

        if ($row) {
            $this->Category_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/category'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/category'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('name', 'name', 'trim|required');

	$this->form_validation->set_rules('id_category', 'id_category', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
