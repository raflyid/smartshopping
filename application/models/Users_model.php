<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends CI_Model {
  public function getRoleUsers(){
    $query = "SELECT `users`.*, `users_role`.`role`
              FROM `users` JOIN `users_role`
              ON `users`.`role_id` = `users_role`.`id`
              ";
    return $this->db->query($query)->result_array();
  }
}