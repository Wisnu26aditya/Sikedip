<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Reward extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('menu_model');
        is_login();
    }

    public function index()
    {
        $data['title'] = 'List Reward Pegawai';
        $data['user'] = $this->db->get_where('login', ['email' => $this->session->userdata('email')])->row_array();

        $this->load->model('m_reward', 'tampilreward');
        $data['reward'] = $this->tampilreward->getReward();
        $data['pegawai'] = $this->tampilreward->getPegawai();

        $this->form_validation->set_rules('menu', 'Menu', 'required');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/v_reward', $data);
            $this->load->view('templates/footer');
        } else {
            $this->db->insert('list_reward', [
                'module_id' => $this->input->post('mid'),
                'module_nama' => $this->input->post('menu'),
                'module_path' => $this->input->post('path'),
                'module_icons' => $this->input->post('icons'),
                'module_level' => $this->input->post('level'),
                'module_parent_id' => $this->input->post('parent'),
                'show_item' => $this->input->post('active')
            ]);
            $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">New Menu Added!</div>');
            redirect('menu');
        }
    }
}
