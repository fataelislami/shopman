<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Product extends MY_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Product_model');
        $this->load->model(array('Dbs'));
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

      $dataproduct=$this->Product_model->get_all($this->session->userdata('id'));//panggil ke modell
      $datafield=$this->Product_model->get_field();//panggil ke modell

      $data = array(
        'contain_view' => 'admin/product/product_list',
        'sidebar'=>'admin/sidebar',
        'css'=>'admin/product/assets/css',
        'script'=>'admin/product/assets/script',
        'dataproduct'=>$dataproduct,
        'datafield'=>$datafield,
        'module'=>'admin'
       );
      $this->template->load($data);
    }


    public function create(){
      $getCategory=$this->Dbs->getwhere('id_admin',$this->session->userdata('id'),'category')->result();
      $data = array(
        'contain_view' => 'admin/product/product_form',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/product/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/product/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/product/create_action',
        'titlePage'=>'Product',
        'category'=>$getCategory
       );
      $this->template->load($data);
    }

    public function edit($id){
      $getCategory=$this->Dbs->getwhere('id_admin',$this->session->userdata('id'),'category')->result();
      $getImage=$this->Dbs->getwhere('id_product',$id,'image');

      $dataedit=$this->Product_model->get_by_id($id);
      $data = array(
        'contain_view' => 'admin/product/product_edit',
        'sidebar'=>'admin/sidebar',//Ini buat menu yang ditampilkan di module admin {DIKIRIM KE TEMPLATE}
        'css'=>'admin/product/assets/css',//Ini buat kirim css dari page nya  {DIKIRIM KE TEMPLATE}
        'script'=>'admin/product/assets/script',//ini buat javascript apa aja yang di load di page {DIKIRIM KE TEMPLATE}
        'action'=>'admin/product/update_action',
        'dataedit'=>$dataedit,
        'category'=>$getCategory,
        'getImage'=>$getImage
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
		'url_photo' => $this->input->post('url_photo',TRUE),
		'discount' => $this->input->post('discount',TRUE),
		'stock' => $this->input->post('stock',TRUE),
		'id_category' => $this->input->post('id_category',TRUE),
		'id_admin' => $this->session->userdata('id'),
	    );

            $sql=$this->Product_model->boolInsert($data);
            if($sql){

            }
            if(isset($_POST['filename'])){
              $id_product=$this->Product_model->getId()->id_product;
              $filename=$this->input->post('filename');
              $arrFilename=explode(",",$filename);
              for($i=0;$i<count($arrFilename);$i++){
                $dataFoto=array(
                  'name'=>$arrFilename[$i],
                  'id_product'=>$id_product
                );
                $this->Dbs->insert($dataFoto,'image');
              }
            }


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
      if(isset($_POST['filename'])){//pengecekan jika terdapat file foto
        $id_product=$this->input->post('id_product', TRUE);
        $filename=$this->input->post('filename');//mengambil nama file dari input type hidden
        $arrFilename=explode(",",$filename);//dipecah menjadi array
        for($i=0;$i<count($arrFilename);$i++){
          $dataFoto=array(
            'name'=>$arrFilename[$i],
            'id_product'=>$id_product
          );
          $this->Dbs->insert($dataFoto,'image');
        }
      }

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

    function imageDelete($id){
      $row = $this->Product_model->get_image_by($id);

      if ($row) {
          unlink('xfile/products/'.$row->name);//menghapus file
          $this->Product_model->deleteImg($id);//menghapus value di database berdasarkan img_id
          $this->session->set_flashdata('message', 'Delete Sukses');
          redirect($_SERVER['HTTP_REFERER']);
      } else {
          $this->session->set_flashdata('message', 'Record Not Found');
          redirect($_SERVER['HTTP_REFERER']);
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

	$this->form_validation->set_rules('id_product', 'id_product', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

}
