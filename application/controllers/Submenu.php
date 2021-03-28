<?php
defined('BASEPATH') or exit('No direct script access allowed');

class SubMenu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Submenu_model');
    }
    public function index()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['submenu'] = $this->db->get('user_sub_menu')->result_array();

        $this->form_validation->set_rules('submenu', 'SubMenu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('submenu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('user_sub_menu', ['submenu' => $this->input->post('submenu')]);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Menu Added!</div>');
            redirect('submenu');
        }
    }


    public function submenu()
    {
        $data['title'] = 'Sub Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->model('Submenu_model', 'menu');

        $data['menu'] = $this->subMenu->getSubMenu();
        $data['submenu'] = $this->db->get('user_sub_menu')->result_array();

        $this->form_validation->set_rules('title', 'Title', 'required');
        $this->form_validation->set_rules('submenu_id', 'submenu', 'required');
        $this->form_validation->set_rules('url', 'Url', 'required');
        $this->form_validation->set_rules('ikon', 'Ikon', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('submenu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $data = [
                'title' => $this->input->post('title'),
                'submenu_id' => $this->input->post('submenu_id'),
                'url' => $this->input->post('url'),
                'ikon' => $this->input->post('ikon'),
                'is_active' => $this->input->post('is_active')
            ];
            $this->db->insert('user_sub_menu', $data);
            $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert">New Sub Menu Added!</div>');
            redirect('submenu/submenu');
        }
    }
    //untuk hapus data
    public function delete($id)
    {
        $where = array('id' => $id);
        $this->Submenu_model->deletesubMenu($id);
        $this->session->set_flashdata('message', '<div class="alert alert-success" role="alert"> Menu deleted success !</div>');
        redirect('Submenu');
    }

    public function editsubmenu($id)
    {
        $where = array('id' => $id);
        $data['title'] = 'Menu Sub Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['edit'] = $this->Submenu_model->ambil_menu_id($id);
        $data['Submenu'] = $this->db->get('user_sub_menu')->result_array();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('submenu/editsubmenu', $data);
        $this->load->view('templates/footer');
    }

    public function editsubmenuaksi($id)
    {
        if ($this->form_validation->run() == TRUE) {
            $this->editsubmenu($id);
        } else {
            $id = $this->input->post('id');
            $Submenu = $this->input->post('Submenu');
        }
        $data = array(
            'Submenu' => $Submenu
        );
        $where = array(
            'id' => $id
        );
        $this->Submenu_model->update_data('user_sub_menu', $data, $where);
        redirect('Submenu');
    }
}
