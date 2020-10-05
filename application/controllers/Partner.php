<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Products_model');
        $this->load->model('Users_model');
        $this->load->helper('form');
        $this->load->helper('url');
        $this->load->library('Ciqrcode');
    }

    public function index()
    {
        $data['title'] = 'My Profile';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('master/menubar', $data);
        $this->load->view('partner/index', $data);
        $this->load->view('master/footer');
    }

     public function edit() {
        $data['title'] = 'Edit Profile';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->form_validation->set_rules('fullname', 'Fullname', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim');
        $this->form_validation->set_rules('phone', 'Phone', 'required|trim');

        if($this->form_validation->run() == false) {
          $this->load->view('master/header', $data);
          $this->load->view('master/sidebar', $data);
          $this->load->view('master/menubar', $data);
          $this->load->view('partner/edit', $data);
          $this->load->view('master/footer');
        } else {
          $fullname = $this->input->post('fullname');
          $email = $this->input->post('email');
          $phone = $this->input->post('phone');
          
          $this->db->set('fullname', $fullname);
          $this->db->set('email', $email);
          $this->db->set('phone', $phone);
          $this->db->where('email', $email);
          $this->db->update('users');
          $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">Profile berhasil di update!</div>');
          redirect('partner');
        }
    }

    public function products()
    {
        $data['title'] = 'Products Database';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $id_user = $this->session->userdata('id_user');
        $data['products'] = $this->Products_model->getProductsPartner($id_user);
        $data['category'] = $this->db->get('categories')->result_array();

        $this->form_validation->set_rules('product_name', 'ProductName', 'required');
        $this->form_validation->set_rules('id_category', 'Category', 'required');
        $this->form_validation->set_rules('description', 'Desc', 'required');
        $this->form_validation->set_rules('product_info', 'ProductInfo', 'required');
        $this->form_validation->set_rules('price', 'Price', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('master/header', $data);
            $this->load->view('master/sidebar', $data);
            $this->load->view('master/menubar', $data);
            $this->load->view('partner/products', $data);
            $this->load->view('master/footer');
        } else { 
            $serverip = gethostbyname(gethostname());
            $upload1 = $this->Products_model->uploadImage();
            $upload2 = $this->Products_model->uploadImage_2();
            $image1 = $upload1['file']['file_name'];
            $image2 = $upload2['file']['file_name'];
            $upload_image1 =  'http://' . $serverip . '/smartshopping/resources/product_image/' . $image1;
            $upload_image2 =  'http://' . $serverip . '/smartshopping/resources/product_image/' . $image2;
            $data = [
                'id_user' => $this->input->post('id_user'),
                'id_category' => $this->input->post('id_category'),
                'product_name' => $this->input->post('product_name'),
                'description' => $this->input->post('description'),
                'product_info' => $this->input->post('product_info'),
                'price' => $this->input->post('price'),
                'image_1' => $upload_image1,
                'image_2' => $upload_image2
            ];

            $this->db->insert('products', $data);
            $this->session->set_flashdata('message', 'Data Product berhasil ditambahkan!');
            redirect('partner/products');
        }
    }

    public function delProducts() {
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('products');
        $this->session->set_flashdata('message','Product kamu berhasil dihapus!');
        redirect('partner/products');
    }

    public function QRcode($qr) {
        QRcode::png(
            $qr,
            $outfile = false,
            $level = QR_ECLEVEL_H,
            $size = 10,
            $margin = 1
        );
    }
}
