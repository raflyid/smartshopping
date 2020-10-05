<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends CI_Model {
  public function getProducts(){
    $query = "SELECT `products`.*, `categories`.`category_name`, `users`.`fullname`
              FROM `products` 
              JOIN `categories`
              ON `products`.`id_category` = `categories`.`id`
              JOIN `users`
              ON `products`.`id_user` = `users`.`id_user`
              ";
    return $this->db->query($query)->result_array();
  }

  public function getProductsPartner($id_user){
    $query = "SELECT `products`.*, `categories`.`category_name`, `users`.`fullname`
              FROM `products` 
              JOIN `categories`
              ON `products`.`id_category` = `categories`.`id`
              JOIN `users`
              ON `products`.`id_user` = `users`.`id_user`
              WHERE `users`.`id_user` = $id_user
              ";
    return $this->db->query($query)->result_array();
  }

  public function uploadImage(){
        $config['upload_path'] = './resources/product_image';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 8192;
        $config['encrypt_name'] = true;  

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image_1')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function uploadImage_2(){
        $config['upload_path'] = './resources/product_image';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = 8192;
        $config['encrypt_name'] = true;  

        $this->load->library('upload', $config);

        if ($this->upload->do_upload('image_2')) { // Lakukan upload dan Cek jika proses upload berhasil
            // Jika berhasil :
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        } else {
            // Jika gagal :
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }
}