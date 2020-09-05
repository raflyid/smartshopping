<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Partner extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        // $this->load->model('');
         // $this->load->model('');
        $this->load->helper('form');
        $this->load->helper('url');
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
}
