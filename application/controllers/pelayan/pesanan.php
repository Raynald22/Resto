<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pesanan extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->model_pesanan->tampil_data()->result();
        $this->load->view('templates/pelayan_header', $data);
        $this->load->view('templates/pelayan_siderbar', $data);
        $this->load->view('pelayan/pesanan', $data);
        $this->load->view('templates/footer');
    }
    public function tambah_aksi()
    {
        $no_meja       = $this->input->post('no_meja');
        $id_produk   = $this->input->post('id_produk');
        $nama      = $this->input->post('nama');
        $jumlah       = $this->input->post('jumlah');
        $harga       = $this->input->post('harga');
        $status       = $this->input->post('status');


        $data = array(
            'no_meja'       => $no_meja,
            'id_produk'   => $id_produk,
            'nama'      => $nama,
            'jumlah'       => $jumlah,
            'harga'     => $harga,
            'status'     => $status
        );

        $this->model_pesanan->tambah_pesanan($data, 'pesanan');
        redirect('pelayan/pesanan');
    }

    public function edit($id)

    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id' => $id);
        $data['pesanan'] = $this->model_pesanan->edit_pesanan($where, 'pesanan')->result();
        $this->load->view('templates/pelayan_header');
        $this->load->view('templates/pelayan_siderbar', $data);
        $this->load->view('pelayan/edit_pesanan', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $id          = $this->input->post('id');
        $no_meja     = $this->input->post('no_meja');
        $id_produk   = $this->input->post('id_produk');
        $nama        = $this->input->post('nama');
        $jumlah    = $this->input->post('jumlah');
        $harga       = $this->input->post('harga');
        $status        = $this->input->post('status');
        $data = array(
            'no_meja'    => $no_meja,
            'id_produk'    => $id_produk,
            'nama'       => $nama,
            'jumlah'   => $jumlah,
            'harga'      => $harga,
            'status'       => $status

        );

        $where = array(
            'id' => $id
        );

        $this->model_pesanan->update_data($where, $data, 'pesanan');
        redirect('pelayan/pesanan/index');
    }

    public function hapus($id)
    {
        $where = array('id' => $id);
        $this->model_pesanan->hapus_data($where, 'pesanan');
        redirect('pelayan/pesanan');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['pesanan'] = $this->model_pesanan->get_pesanan_keyword($keyword);
        $this->load->view('search', $data);
    }
}
