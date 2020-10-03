<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Menu_model', 'menu');
        $this->load->helper('form');
        $this->load->helper('url');
    }

    public function index()
    {
        $data['title'] = 'Manage Menu';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('users_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('master/header', $data);
            $this->load->view('master/sidebar', $data);
            $this->load->view('master/menubar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('master/footer');
        } else {
            $this->db->insert('users_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('message', 'Menu berhasil ditambahkan!');
            redirect('menu');
        }
    }

    public function editMenu() {
        $data['title'] = 'Edit Menu';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['menu'] = $this->db->get('users_menu')->result_array();

        $this->form_validation->set_rules('menu', 'Menu', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('master/header', $data);
            $this->load->view('master/sidebar', $data);
            $this->load->view('master/menubar', $data);
            $this->load->view('menu/editmenu', $data);
            $this->load->view('master/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'menu' => $this->input->post('menu')
            ];

            $this->db->where('id', $id);
            $this->db->update('users_menu', $data);
            $this->session->set_flashdata('message', '< class="alert alert-success" role="alert">Menu berhasil edit!</>');
            redirect('menu');
        }
    }

     public function deleteMenu() {
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('users_menu');
        $this->session->set_flashdata('message','<div class="alert alert-danger alert-dismissible" role="alert"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>Menu berhasil dihapus!</div>');

        redirect('menu');
    }

     public function subMenu()
    {
        $data['title'] = 'Manage Sub-menu';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('users_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('master/header', $data);
            $this->load->view('master/sidebar', $data);
            $this->load->view('master/menubar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('master/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('users_sub_menu', $data);
            $this->session->set_flashdata('message', 'Sub-Menu berhasil ditambahkan!');
            redirect('menu/submenu');
        }
    }

    public function editsubMenu() {
        $data['title'] = 'Edit Sub-Menu';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Menu_model', 'menu');

        $data['subMenu'] = $this->menu->getSubMenu();
        $data['menu'] = $this->db->get('users_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('menu_id', 'Menu', 'required');
        $this->form_validation->set_rules('url', 'URL', 'required');
        $this->form_validation->set_rules('icon', 'Icon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('master/header', $data);
            $this->load->view('master/sidebar', $data);
            $this->load->view('master/menubar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('master/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'title' => $this->input->post('title'),
                'menu_id' => $this->input->post('menu_id'),
                'url' => $this->input->post('url'),
                'icon' => $this->input->post('icon'),
                'is_active' => $this->input->post('is_active')
            ];

            $this->db->where('id', $id);
            $this->db->update('users_sub_menu', $data);
            $this->session->set_flashdata('message', 'Sub-Menu berhasil diubah!');
            redirect('menu/submenu');
        }
    }

    public function deleteSubMenu() {
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('users_sub_menu');
        $this->session->set_flashdata('message','Sub-Menu berhasil dihapus!');

        redirect('menu/submenu');
    }
}
