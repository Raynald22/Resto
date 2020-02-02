<?php

class Model_pegawai extends CI_Model
{
    public function tampil_data()
    {
        return $this->db->get('user');
    }

    public function edit_user($where, $table)
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
            ->get('user');

        if ($result->num_rows() > 0) {
            return $result->row();
        } else {
            return array();
        }
    }
    public function detail_user($id)
    {
        $result = $this->db->where('id', $id)->get('user');
        if ($result->num_rows() > 0) {
            return $result->result();
        } else {
            return false;
        }
    }
}
