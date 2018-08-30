<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model(array('Product_model','Dbs'));
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

      $dataproduct=$this->Product_model->get_all();//panggil ke modell
      $datafield=$this->Product_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/product/product_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/crudassets/css',
        'script'=>'admin/crudassets/script',
        'dataproduct'=>$dataproduct,
        'datafield'=>$datafield,
        'module'=>'admin',
        'titlePage'=>'product'
       );
      $this->template->load($data);
    }


    public function create(){
      $getCategory=$this->Dbs->getwhere('id_admin',$this->session->userdata('id'),'category')->result();
      $data = array(
        'contain_view' => 'admin/product/product_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/product/create_action',
        'titlePage'=>'Product',
        'category'=>$getCategory
       );
      $this->template->load($data);
    }

    public function edit($id){
      $dataedit=$this->Product_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/product/product_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/crudassets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/crudassets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/product/update_action',
        'dataedit'=>$dataedit,
        'titlePage'=>'Product'
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
		'code_product' => $this->input->post('code_product',TRUE),
		'name' => $this->input->post('name',TRUE),
		'price' => $this->input->post('price',TRUE),
		'description' => $this->input->post('description',TRUE),
		'size' => $this->input->post('size',TRUE),
		'url_photo' => $this->input->$files('url_photo',TRUE),
		'discount' => $this->input->post('discount',TRUE),
		'stock' => $this->input->post('stock',TRUE),
		'id_category' => $this->input->post('id_category',TRUE),
		'id_admin' => $this->session->userdata('id'),
	    );

            $this->Product_model->insert($data);
           //  //upload gambar
           //              if(!empty($files['files']['name'])){
           //          $filesCount = count($files['files']['name']);
           //          for($i = 0; $i < $filesCount; $i++){
           //              $files['file']['name']     = $files['files']['name'][$i];
           //              $files['file']['type']     = $files['files']['type'][$i];
           //              $files['file']['tmp_name'] = $files['files']['tmp_name'][$i];
           //              $files['file']['error']     = $files['files']['error'][$i];
           //              $files['file']['size']     = $files['files']['size'][$i];

           //              // File upload configuration
           //              $uploadPath = 'uploads/files/';
           //              $config['upload_path'] = $uploadPath;
           //              $config['allowed_types'] = 'jpg|jpeg|png|gif';
           //              $config['encrypt_name'] = TRUE;

           //              // Load and initialize upload library
           //              $this->load->library('upload', $config);
           //              $this->upload->initialize($config);

           //              // Upload file to server
           //              if($this->upload->do_upload('file')){
           //                  // Uploaded file data
           //                  $fileData = $this->upload->data();
           //                  $uploadData[$i]['name'] = $fileData['file_name'];
           //                  $uploadData[$i]['id_product'] = $id_product;
           //              }
           //          }

           //          if(!empty($uploadData)){
           //              // Insert files data into the database
           //              $insert = $this->Dbs->insert_gambar($uploadData);
           //          }
           //      }
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('admin/product'));
        }
    }



    public function update_action()
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->edit($this->input->post('id_product', TRUE));
        } else {
            $data = array(
		'code_product' => $this->input->post('code_product',TRUE),
		'name' => $this->input->post('name',TRUE),
		'price' => $this->input->post('price',TRUE),
		'description' => $this->input->post('description',TRUE),
		'size' => $this->input->post('size',TRUE),
		'url_photo' => $this->input->post('url_photo',TRUE),
		'discount' => $this->input->post('discount',TRUE),
		'stock' => $this->input->post('stock',TRUE),
		'id_category' => $this->input->post('id_category',TRUE),
		'id_admin' => $this->session->userdata('id'),
	    );

            $this->Product_model->update($this->input->post('id_product', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('admin/product'));
        }
    }

    public function delete($id)
    {
        $row = $this->Product_model->get_by_id($id);

        if ($row) {
            $this->Product_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('admin/product'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('admin/product'));
        }
    }

    public function _rules()
    {
	$this->form_validation->set_rules('code_product', 'code product', 'trim|required');
	$this->form_validation->set_rules('name', 'name', 'trim|required');
	$this->form_validation->set_rules('price', 'price', 'trim|required');
	$this->form_validation->set_rules('description', 'description', 'trim|required');
	$this->form_validation->set_rules('size', 'size', 'trim|required');
	$this->form_validation->set_rules('discount', 'discount', 'trim|required');
	$this->form_validation->set_rules('stock', 'stock', 'trim|required');
	$this->form_validation->set_rules('id_category', 'id category', 'trim|required');
	// $this->form_validation->set_rules('id_admin', 'id admin', 'trim|required');

	$this->form_validation->set_rules('id_product', 'id_product', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
