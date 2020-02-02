<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('email')) {
            $this->session->set_flashdata('message', '<div class="alert alert-danger" role="alert">Anda Harus Login Untuk Mengakses Halaman Admin!</div>');
            redirect('auth');
        }
    }

    public function index()
    {
        $data['title'] = 'Halo,';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/pelayan_header', $data);
        $this->load->view('templates/pelayan_siderbar', $data);
        $this->load->view('pelayan/dashboard', $data);
        $this->load->view('templates/footer', $data);
    }
}
