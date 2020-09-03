<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    // public function __construct()
    // {
    //     parent::__construct();
    //     is_logged_in();
    //     // $this->load->model('');
    //     // $this->load->model('');
    //     // $this->load->helper('form');
    //     // $this->load->helper('url');
    // }

    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('master/menubar', $data);
        $this->load->view('admin/index', $data);
        $this->load->view('master/footer');
    }
}