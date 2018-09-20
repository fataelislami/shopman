<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

  public function __construct()
  {
    parent::__construct();
    //Codeigniter : Write Less Do More
  }

  public function getAllproduct($id)
  {
      $this->db->select('product.*');
      $this->db->where('id_admin', $id);
      return $this->db->get('product');
  }

  public function getAllCategory($id)
  {
      $this->db->where('id_admin', $id);
      return $this->db->get('category');
  }

  public function getProductSold($id)
  {
      $this->db->select('sum(orders.quantity) as jumlah');
      $this->db->from('product');
      $this->db->join('orders', 'orders.id_product = product.id_product');
      $this->db->join('cart', 'cart.id_cart = orders.id_cart');
      $this->db->join('payment', 'payment.id_cart = cart.id_cart');
      $this->db->where('product.id_admin', $id);
      return $this->db->get();
  }

  public function getIncome($id)
  {
      $this->db->select('sum(cart.total_amount) as jumlah');
      $this->db->from('product');
      $this->db->join('orders', 'orders.id_product = product.id_product');
      $this->db->join('cart', 'cart.id_cart = orders.id_cart');
      $this->db->join('payment', 'payment.id_cart = cart.id_cart');
      $this->db->where('product.id_admin', $id);
      return $this->db->get();
  }

  public function getIncomePerMonth($id)
  {
      $this->db->select('month(date) as month, sum(total_amount) as jumlah');
      $this->db->from('product');
      $this->db->join('orders', 'orders.id_product = product.id_product');
      $this->db->join('cart', 'cart.id_cart = orders.id_cart');
      $this->db->join('payment', 'payment.id_cart = cart.id_cart');
      $this->db->where('product.id_admin', $id);
      return $this->db->get();
  }

}
