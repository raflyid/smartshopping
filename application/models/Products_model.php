<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {
  public function getItems(){
    $query = "SELECT `products`.*, `categories`.`category_name`
              FROM `products` JOIN `categories`
              ON `products`.`id_category` = `categories`.`id`
              ";
    return $this->db->query($query)->result_array();
  }
}