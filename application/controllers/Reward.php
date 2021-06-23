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

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/v_reward', $data);
            $this->load->view('templates/footer');
        }
    }
    public function simpan()
    {
        $insert['reward_nik'] = $this->input->post('nama');
        $insert['reward_type'] = $this->input->post('jenis');
        $insert['reward_foto'] = $insert['reward_nik'] . '.jpg';

        $this->load->model('m_reward', 'reward');
        $this->reward->simpan_reward($insert);
        $this->session->set_flashdata('messege', '<div class="alert alert-success" role="alert">New Reward Added!</div>');
        redirect('reward');
    }
}
