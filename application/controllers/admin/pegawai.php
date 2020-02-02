<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pegawai extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['user'] = $this->model_pegawai->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sideebar', $data);
        $this->load->view('admin/pegawai', $data);
        $this->load->view('templates/footer', $data);
    }
    public function edit($id)

    {
        $this->form_validation->set_rules('name', 'Nama', 'required|trim');
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['user'] = $this->model_pegawai->edit_user($where, 'user')->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sideebar', $data);
        $this->load->view('admin/edit_pegawai', $data);
        $this->load->view('templates/footer', $data);
    }
    public function update()
    {
        $id          = $this->input->post('id');
        $name        = $this->input->post('name');
        $email    = $this->input->post('email');
        $password        = $this->input->post('password');
        $image  = $this->input->post('image');

        $data = array(
            'name'       => $name,
            'email'   => $email,
            'password' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
            'image'     => $image
        );

        $where = array(
            'id' => $id
        );

        $this->model_pegawai->update_data($where, $data, 'user');
        redirect('admin/pegawai/index');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->model_pegawai->hapus_data($where, 'user');
        redirect('admin/pegawai');
    }
}
