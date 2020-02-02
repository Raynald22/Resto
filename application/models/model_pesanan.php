<?php

class Model_pesanan extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('pesanan');
    }

    public function ambil_id_produk($id_produk)
    {
        $result = $this->db->where('id_produk', $id_produk)->limit(1)->get('produk');
        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return false;
        }
    }
    public function tambah_pesanan($data, $table)
    {
        $this->db->insert($table, $data);
    }
    public function edit_pesanan($where, $table)
    {
        return $this->db->get_where($table, $where);
    }
    public function update_data($where, $data, $table)
    {
        $this->db->where($where);
        $this->db->update($table, $data);
    }

    public function hapus_data($where, $table)
    {
        $this->db->where($where);
        $this->db->delete($table);
    }

    public function find($id)
    {
        $result = $this->db->where('id', $id)
            ->limit(1)
            ->get('pesanan');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function detail_pesanan($id)
    {
        $result = $this->db->where('id', $id)->get('produk');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }

    public function get_pesanan_keyword($keyword)
    {
        $this->db->select('*');
        $this->db->from('pesanan');
        $this->db->like('nama', $keyword);
        $this->db->or_like('harga', $keyword);
        return $this->db->get()->result();
    }
}
