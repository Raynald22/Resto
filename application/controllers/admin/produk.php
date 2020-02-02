<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['produk'] = $this->model_produk->tampil_data()->result();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/produk', $data);
        $this->load->view('templates/footer', $data);
    }
    public function tambah_aksi()
    {
        $nama       = $this->input->post('nama');
        $kategori   = $this->input->post('kategori');
        $harga      = $this->input->post('harga');
        $status       = $this->input->post('status');
        $gambar  = $_FILES['gambar']['name'];
        if ($gambar = '') {
        } else {
            $config['upload_path'] = './assets/uploads';
            $config['allowed_types'] = 'jpg|jpeg|png|gif';

            $this->load->library('upload', $config);
            if (!$this->upload->do_upload('gambar')) {
                echo "Gambar Gagal Diupload!";
            } else {
                $gambar = $this->upload->data('file_name');
            }
        }

        $data = array(
            'nama'       => $nama,
            'kategori'   => $kategori,
            'harga'      => $harga,
            'status'       => $status,
            'gambar'     => $gambar
        );

        $this->model_produk->tambah_produk($data, 'produk');
        redirect('admin/produk');
    }

    public function edit($id)

    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $where = array('id_produk' => $id);
        $data['produk'] = $this->model_produk->edit_produk($where, 'produk')->result();
        $this->load->view('templates/header');
        $this->load->view('templates/sidebar', $data);
        $this->load->view('admin/edit_produk', $data);
        $this->load->view('templates/footer');
    }
    public function update()
    {
        $id          = $this->input->post('id_produk');
        $nama        = $this->input->post('nama');
        $kategori    = $this->input->post('kategori');
        $harga       = $this->input->post('harga');
        $status        = $this->input->post('status');
        $gambar  = $this->input->post('gambar');
        $data = array(
            'nama'       => $nama,
            'kategori'   => $kategori,
            'harga'      => $harga,
            'status'       => $status,
            'gambar'     => $gambar

        );

        $where = array(
            'id_produk' => $id
        );

        $this->model_produk->update_data($where, $data, 'produk');
        redirect('admin/produk/index');
    }

    public function hapus($id)
    {
        $where = array('id_produk' => $id);
        $this->model_produk->hapus_data($where, 'produk');
        redirect('admin/produk');
    }

    public function search()
    {
        $keyword = $this->input->post('keyword');
        $data['produk'] = $this->model_produk->get_produk_keyword($keyword);
        $this->load->view('search', $data);
    }
}
