<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbs extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function insert($data,$table){
    $this->db->insert($table,$data);
    if ($this->db->affected_rows()>0) {
      return true;
    }else{
      return false;
    }
  }

  function cekEmail($table,$email)
  {
    $dml="SELECT email FROM $table where email='$email'";
    $query=$this->db->query($dml);
    return $query;
  }
}