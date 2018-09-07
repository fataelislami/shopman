<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dbs extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  function check($table,$where){
		return $this->db->get_where($table,$where);
	}

  function getEmailuser($table,$email){
  		$dml="SELECT * FROM $table where email='$email'";
  		$query=$this->db->query($dml);
  		return $query;
  }	

      function ubahpasswordUser($table,$email,$data){
        $this->db->set($data);
        $this->db->where('email', $email);
        $this->db->update($table);
    }

  function getEmailbyrand($rand){
      $dml="SELECT email FROM random_link where random='$rand'";
      $query=$this->db->query($dml);
      return $query;
  }  

  function insert($data,$table){
   $insert = $this->db->insert($table, $data);
   if ($this->db->affected_rows()>0) {
     return true;
     }else{
     return false;
     }
 }

     function delete($where,$value,$table)
    {
        $this->db->where($where, $value);
        $this->db->delete($table);
    } 

}
