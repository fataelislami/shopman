<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Upload extends MY_Controller{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function index()
  {
    $data = array(
      'contain_view' => 'admin/upload/dropzone',
      'sidebar'=>'admin/sidebar',
      'css'=>'admin/crudassets/css',
      'script'=>'admin/crudassets/script',
      'module'=>'admin',
      'titlePage'=>'Dropzone'
     );
    $this->template->load($data);
  }

  function proses(){//menerima proses dari dropzone

    if (!empty($_FILES)) {
      $this->upload_foto('file');

    }
  }

  public function upload_foto($formname){
    $config['upload_path']          = './xfile/products';//target folder simpan
    $config['allowed_types']        = 'gif|jpg|png|jpeg';
    $config['overwrite'] = TRUE;
    $config['encrypt_name'] = FALSE;
    //$config['max_size']             = 100;
    //$config['max_width']            = 1024;
    //$config['max_height']           = 768;
    $this->load->library('upload', $config);
    $this->upload->do_upload($formname);
    return $this->upload->data();
    /*Cara penggunaan
    $this->upload_foto({ubah dengan name dari input type dari view});
    contoh
    jika <input type="file" name="file">
    maka
    $file=$this->upload_foto('file');
    untuk mengambil nama file gunakan $file['file_name'];
    */
    }

}
