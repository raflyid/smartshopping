<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {
  public function getItems(){
    $query = "SELECT `products`.*, `categories`.`category_name`, `users`.`fullname`
              FROM `products` 
              JOIN `categories`
              ON `products`.`id_category` = `categories`.`id`
              JOIN `users`
              ON `products`.`id_user` = `users`.`id_user`
              ";
    return $this->db->query($query)->result_array();
  }
}