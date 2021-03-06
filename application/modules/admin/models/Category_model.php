<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Category_model extends CI_Model
{

    public $table = 'category';
    public $id = 'id_category';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all($id=null)
    {
        $this->db->order_by($this->id, $this->order);
        if($id!=null){
          $this->db->where('id_admin', $id);
          return $this->db->get($this->table)->result();

        }else{
          return $this->db->get($this->table)->result();
        }
    }

    //get field
    function get_field(){
      return $this->db->list_fields($this->table);
    }

    // get data by id
    function get_by_id($id)
    {
        $this->db->where($this->id, $id);
        return $this->db->get($this->table)->row();
    }

    // get total rows
    function total_rows($q = NULL) {
        $this->db->like('id_category', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('id_admin', $q);
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_category', $q);
	$this->db->or_like('name', $q);
	$this->db->or_like('id_admin', $q);
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function getadm($idadm){
        $this->db->where($this->id_admin,$idadm);
        return $this->db->get($this->admin)->row();
    }
}

/* End of file Category_model.php */
/* Location: ./application/models/Category_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-24 09:42:12 */
/* http://harviacode.com */
