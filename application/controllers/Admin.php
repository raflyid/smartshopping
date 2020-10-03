<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        $this->load->model('Products_model');
        $this->load->model('Users_model');
        $this->load->helper('form');
        $this->load->helper('url');
    }

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

    // ROLE CONT

    public function role() {
        $data['title'] = 'Role Changer';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('users_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('master/header', $data);
            $this->load->view('master/sidebar', $data);
            $this->load->view('master/menubar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('master/footer');
        } else {
            $data = [
                'role' => $this->input->post('role')
            ];

        $this->db->insert('users_role', $data);
        $this->session->set_flashdata('message', 'Role berhasil ditambahkan!');
        redirect('admin/role');
        }
    }

    public function editRole() {
        $data['title'] = 'Edit Role';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get('users_role')->result_array();

        $this->form_validation->set_rules('role', 'Role', 'required');
        if ($this->form_validation->run() == false) {
            $this->load->view('master/header', $data);
            $this->load->view('master/sidebar', $data);
            $this->load->view('master/menubar', $data);
            $this->load->view('admin/role', $data);
            $this->load->view('master/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'role' => $this->input->post('role')
            ];

            $this->db->where('id', $id);
            $this->db->update('users_role', $data);
            $this->session->set_flashdata('message', 'Role berhasil diubah!');
            redirect('admin/role');
        }
    }

    public function roleAccess($role_id) {
        $data['title'] = 'Role Access';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['role'] = $this->db->get_where('users_role', ['id' => $role_id])->row_array();

        $this->db->where('id !=', '1');
        $data['menu'] = $this->db->get('users_menu')->result_array();

        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('master/menubar', $data);
        $this->load->view('admin/role-access', $data);
        $this->load->view('master/footer');
    }

    public function changeAccess() {
        $menu_id = $this->input->post('menuId');
        $role_id = $this->input->post('roleId');

        $data = [
            'role_id' => $role_id,
            'menu_id' => $menu_id
        ];

        $result = $this->db->get_where('users_access_menu', $data);

        if($result->num_rows() < 1) {
            $this->db->insert('users_access_menu', $data);
        } else {
            $this->db->delete('users_access_menu', $data);
        }

        $this->session->set_flashdata('message', 'Role Access berhasil diubah!');
    }

     public function deleteRole() {
        $id = $this->uri->segment(3);
        $this->db->where('id',$id);
        $this->db->delete('users_role');
        $this->session->set_flashdata('message','Role berhasil dihapus!');

        redirect('admin/role');
    }

    public function manageUsers() {
        $data['title'] = 'Manage Users';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['users'] = $this->Users_model->getRoleUsers();

        $this->load->view('master/header', $data);
        $this->load->view('master/sidebar', $data);
        $this->load->view('master/menubar', $data);
        $this->load->view('admin/manage-users', $data);
        $this->load->view('master/footer');

    }

    public function products()
    {
        $data['title'] = 'Products Database';
        $data['user'] = $this->db->get_where('users', ['email' => $this->session->userdata('email')])->row_array();

        $data['products'] = $this->Products_model->getItems();
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
            $this->load->view('admin/products', $data);
            $this->load->view('master/footer');
        } else { 
            $data = [
                'id_user' => $this->input->post('id_user'),
                'id_category' => $this->input->post('id_category'),
                'product_name' => $this->input->post('product_name'),
                'description' => $this->input->post('description'),
                'product_info' => $this->input->post('product_info'),
                'price' => $this->input->post('price')
            ];

            $this->db->insert('products', $data);
            $this->session->set_flashdata('message', 'Data Product berhasil ditambahkan!');
            redirect('admin/products');
        }
    }
    
}