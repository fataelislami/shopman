<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Admin_model extends CI_Model
{

    public $table = 'admin';
    public $id = 'id_admin';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    // get all
    function get_all()
    {
        $query = "select admin.*,superadmin.name as name2 from admin left join superadmin using (id_superadmin)";
        return $this->db->query($query)->result();
        //$this->db->order_by($this->id, $this->order);
        //return $this->db->get($this->table)->result();
    }

    function get_all_superadmin(){
      $this->db->order_by('id_superadmin', $this->order);
      return $this->db->get('superadmin')->result();
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
        $this->db->like('id_admin', $q);
      	$this->db->or_like('email', $q);
      	$this->db->or_like('password', $q);
      	$this->db->or_like('name', $q);
      	$this->db->or_like('address', $q);
      	$this->db->or_like('store_title', $q);
      	$this->db->or_like('date', $q);
      	$this->db->or_like('regist_date', $q);
      	$this->db->or_like('expire_date', $q);
      	$this->db->or_like('id_superadmin', $q);
      	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        $this->db->like('id_admin', $q);
      	$this->db->or_like('email', $q);
      	$this->db->or_like('password', $q);
      	$this->db->or_like('name', $q);
      	$this->db->or_like('address', $q);
      	$this->db->or_like('store_title', $q);
      	$this->db->or_like('date', $q);
      	$this->db->or_like('regist_date', $q);
      	$this->db->or_like('expire_date', $q);
      	$this->db->or_like('id_superadmin', $q);
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

}

/* End of file Admin_model.php */
/* Location: ./application/models/Admin_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2018-08-26 02:36:15 */
/* http://harviacode.com */