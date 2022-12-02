<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ModelUser extends CI_Model
{
    public function cekData($id = null)
    {
        if ($id == null) {
            return $this->db->get('user');
        } else {
            return $this->db->get_where('user', $id);
        }
    }

    public function is_active($table, $data = null, $where = null)
    {
        if ($data != null) {
            return $this->db->get_where($table, $data)->row_array();
        } else {
            return $this->db->get_where($table, $where)->result_array();
        }
    }

    public function activated($where, $data)
    {
        return $this->db->update('user', $where, $data);
    }

    public function tambah($data)
    {
        return $this->db->insert('user', $data);
    }

    public function hapus($id)
    {
        return $this->db->delete('user', $id);
    }

    public function getUserById($id)
    {
        return $this->db->get_where('user', $id);
    }

    public function ubah($data, $id)
    {
        return $this->db->update('user', $data, $id);
    }

    public function editprofile($nama, $email, $nomor, $id)
    {
        $this->db->set('nama', $nama);
        $this->db->set('no_telp', $nomor);
        $this->db->set('email', $email);
        $this->db->where('id_user', $id);
        return $this->db->update('user');
    }
}
