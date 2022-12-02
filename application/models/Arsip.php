<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Arsip extends CI_Model
{
    public function cekData()
    {
        $this->db->select('*');
        $this->db->from('legalitas');
        $this->db->join('user', 'user.id_user = legalitas.id_user');
        return $this->db->get();
    }

    public function cekDatabyid($id)
    {
        $this->db->select('*');
        $this->db->from('legalitas');
        $this->db->join('user', 'user.id_user = legalitas.id_user');
        $this->db->where('id_legalitas', $id);
        return $this->db->get();
    }

    public function tambah($data)
    {
        return $this->db->insert('legalitas', $data);
    }

    public function hapusLegalitas($id)
    {
        return $this->db->delete('legalitas', $id);
    }

    public function ubah($data, $id)
    {
        return $this->db->update('legalitas', $data, $id);
    }

    public function ceksistem()
    {
        $this->db->select('*');
        $this->db->from('sistem_mutu');
        $this->db->join('user', 'user.id_user = sistem_mutu.id_user');
        return $this->db->get();
    }

    public function ceksistemId($id)
    {
        $this->db->select('*');
        $this->db->from('sistem_mutu');
        $this->db->join('user', 'user.id_user = sistem_mutu.id_user');
        $this->db->where('id_sistem', $id);
        return $this->db->get();
    }

    public function tambahSistem($data)
    {
        return $this->db->insert('sistem_mutu', $data);
    }
    public function updateSistem($data, $id)
    {
        return $this->db->update('sistem_mutu', $data, $id);
    }

    public function hapusSistem($id)
    {
        return $this->db->delete('sistem_mutu', $id);
    }

    public function cektemplate()
    {
        $this->db->select('*');
        $this->db->from('template_form');
        $this->db->join('user', 'user.id_user = template_form.id_user');
        return $this->db->get();
    }

    public function cekTemplatebyid($id)
    {
        $this->db->select('*');
        $this->db->from('template_form');
        $this->db->join('user', 'user.id_user = template_form.id_user');
        $this->db->where('id_template', $id);
        return $this->db->get();
    }

    public function tambahtemplate($data)
    {
        return $this->db->insert('template_form', $data);
    }

    public function updatetemplate($data, $id)
    {
        return $this->db->update('template_form', $data, $id);
    }

    public function hapusTemplate($id)
    {
        return $this->db->delete('template_form', $id);
    }

    public function cekrab()
    {
        $this->db->select('*');
        $this->db->from('rab');
        $this->db->join('user', 'user.id_user = rab.id_user');
        return $this->db->get();
    }

    public function cekrabid($id)
    {
        $this->db->select('*');
        $this->db->from('rab');
        $this->db->join('user', 'user.id_user = rab.id_user');
        $this->db->where('id_rab', $id);
        return $this->db->get();
    }

    public function tambahrab($data)
    {
        return $this->db->insert('rab', $data);
    }


    public function updaterab($data, $id)
    {
        return $this->db->update('rab', $data, $id);
    }

    public function hapusrab($id)
    {
        return $this->db->delete('rab', $id);
    }

    public function cekkontrak()
    {
        $this->db->select('*');
        $this->db->from('kontrak');
        $this->db->join('user', 'user.id_user = kontrak.id_user');
        return $this->db->get();
    }

    public function cekkontrakid($id)
    {
        $this->db->select('*');
        $this->db->from('kontrak');
        $this->db->join('user', 'user.id_user = kontrak.id_user');
        $this->db->where('id_kontrak', $id);
        return $this->db->get();
    }

    public function tambahkontrak($data)
    {
        return $this->db->insert('kontrak', $data);
    }

    public function ubahkontrak($data, $id)
    {
        return $this->db->update('kontrak', $data, $id);
    }

    public function hapuskontrak($id)
    {
        return $this->db->delete('kontrak', $id);
    }

    public function cektagihan()
    {
        $this->db->select('*');
        $this->db->from('tagihan');
        $this->db->join('user', 'user.id_user = tagihan.id_user');
        return $this->db->get();
    }

    public function cektagihanid($id)
    {
        $this->db->select('*');
        $this->db->from('tagihan');
        $this->db->join('user', 'user.id_user = tagihan.id_user');
        $this->db->where('id_tagihan', $id);
        return $this->db->get();
    }

    public function tambahtagihan($data)
    {
        return $this->db->insert('tagihan', $data);
    }
    public function ubahtagihan($data, $id)
    {
        return $this->db->update('tagihan', $data, $id);
    }

    public function hapustagihan($id)
    {
        return $this->db->delete('tagihan', $id);
    }

    public function cekpendahuluan()
    {
        $this->db->select('*');
        $this->db->from('l_pendahuluan');
        $this->db->join('user', 'user.id_user = l_pendahuluan.id_user');
        return $this->db->get();
    }
    public function cekpendahuluanid($id)
    {
        $this->db->select('*');
        $this->db->from('l_pendahuluan');
        $this->db->join('user', 'user.id_user = l_pendahuluan.id_user');
        $this->db->where('id_pendahuluan', $id);
        return $this->db->get();
    }

    public function tambahpendahuluan($data)
    {
        return $this->db->insert('l_pendahuluan', $data);
    }

    public function ubahpendahuluan($data, $id)
    {
        return $this->db->update('l_pendahuluan', $data, $id);
    }

    public function hapuspendahuluan($id)
    {
        return $this->db->delete('l_pendahuluan', $id);
    }

    public function cekakhir()
    {
        $this->db->select('*');
        $this->db->from('l_akhir');
        $this->db->join('user', 'user.id_user = l_akhir.id_user');
        return $this->db->get();
    }

    public function cekakhirid($id)
    {
        $this->db->select('*');
        $this->db->from('l_akhir');
        $this->db->join('user', 'user.id_user = l_akhir.id_user');
        $this->db->where('id_akhir', $id);
        return $this->db->get();
    }

    public function tambahakhir($data)
    {
        return $this->db->insert('l_akhir', $data);
    }

    public function ubahakhir($data, $id)
    {
        return $this->db->update('l_akhir', $data, $id);
    }

    public function hapusakhir($id)
    {
        return $this->db->delete('l_akhir', $id);
    }

    public function cekproses()
    {
        $this->db->select('*');
        $this->db->from('b_proses');
        $this->db->join('user', 'user.id_user = b_proses.id_user');
        return $this->db->get();
    }

    public function cekprosesid($id)
    {
        $this->db->select('*');
        $this->db->from('b_proses');
        $this->db->join('user', 'user.id_user = b_proses.id_user');
        $this->db->where('id_proses', $id);
        return $this->db->get();
    }

    public function tambahproses($data)
    {
        return $this->db->insert('b_proses', $data);
    }


    public function updateproses($data, $id)
    {
        return $this->db->update('b_proses', $data, $id);
    }

    public function hapusproses($id)
    {
        return $this->db->delete('b_proses', $id);
    }

    public function ceksublisi()
    {
        $this->db->select('*');
        $this->db->from('b_sublisensi');
        $this->db->join('user', 'user.id_user = b_sublisensi.id_user');
        return $this->db->get();
    }

    public function ceksublisiid($id)
    {
        $this->db->select('*');
        $this->db->from('b_sublisensi');
        $this->db->join('user', 'user.id_user = b_sublisensi.id_user');
        $this->db->where('id_sublisi', $id);
        return $this->db->get();
    }

    public function tambahsublisi($data)
    {
        return $this->db->insert('b_sublisensi', $data);
    }


    public function updatesublisi($data, $id)
    {
        return $this->db->update('b_sublisensi', $data, $id);
    }

    public function hapussublisi($id)
    {
        return $this->db->delete('b_sublisensi', $id);
    }

    public function cek_u_balik()
    {
        $this->db->select('*');
        $this->db->from('b_u_balik');
        $this->db->join('user', 'user.id_user = b_u_balik.id_user');
        return $this->db->get();
    }

    public function cek_u_balikid($id)
    {
        $this->db->select('*');
        $this->db->from('b_u_balik');
        $this->db->join('user', 'user.id_user = b_u_balik.id_user');
        $this->db->where('id_umpan', $id);
        return $this->db->get();
    }

    public function tambah_u_balik($data)
    {
        return $this->db->insert('b_u_balik', $data);
    }


    public function update_u_balik($data, $id)
    {
        return $this->db->update('b_u_balik', $data, $id);
    }

    public function hapus_u_balik($id)
    {
        return $this->db->delete('b_u_balik', $id);
    }

    public function cekpenilaian()
    {
        $this->db->select('*');
        $this->db->from('b_penilaian');
        $this->db->join('user', 'user.id_user = b_penilaian.id_user');
        return $this->db->get();
    }

    public function cekpenilaianid($id)
    {
        $this->db->select('*');
        $this->db->from('b_penilaian');
        $this->db->join('user', 'user.id_user = b_penilaian.id_user');
        $this->db->where('id_nilai', $id);
        return $this->db->get();
    }

    public function tambahpenilaian($data)
    {
        return $this->db->insert('b_penilaian', $data);
    }


    public function updatepenilaian($data, $id)
    {
        return $this->db->update('b_penilaian', $data, $id);
    }

    public function hapuspenilaian($id)
    {
        return $this->db->delete('b_penilaian', $id);
    }

    public function cekkuisioner()
    {
        $this->db->select('*');
        $this->db->from('b_kuisioner');
        $this->db->join('user', 'user.id_user = b_kuisioner.id_user');
        return $this->db->get();
    }

    public function cekkuisionerid($id)
    {
        $this->db->select('*');
        $this->db->from('b_kuisioner');
        $this->db->join('user', 'user.id_user = b_kuisioner.id_user');
        $this->db->where('id_kuisioner', $id);
        return $this->db->get();
    }

    public function tambahkuisioner($data)
    {
        return $this->db->insert('b_kuisioner', $data);
    }


    public function updatekuisioner($data, $id)
    {
        return $this->db->update('b_kuisioner', $data, $id);
    }

    public function hapuskuisioner($id)
    {
        return $this->db->delete('b_kuisioner', $id);
    }

    public function cektreviewer()
    {
        $this->db->select('*');
        $this->db->from('b_t_reviewer');
        $this->db->join('user', 'user.id_user = b_t_reviewer.id_user');
        return $this->db->get();
    }

    public function cektreviewerid($id)
    {
        $this->db->select('*');
        $this->db->from('b_t_reviewer');
        $this->db->join('user', 'user.id_user = b_t_reviewer.id_user');
        $this->db->where('id_review', $id);
        return $this->db->get();
    }

    public function tambahtreviewer($data)
    {
        return $this->db->insert('b_t_reviewer', $data);
    }


    public function updatetreviewer($data, $id)
    {
        return $this->db->update('b_t_reviewer', $data, $id);
    }

    public function hapustreviewer($id)
    {
        return $this->db->delete('b_t_reviewer', $id);
    }

    public function cektpk()
    {
        $this->db->select('*');
        $this->db->from('b_tpk');
        $this->db->join('user', 'user.id_user = b_tpk.id_user');
        return $this->db->get();
    }

    public function cektpkid($id)
    {
        $this->db->select('*');
        $this->db->from('b_tpk');
        $this->db->join('user', 'user.id_user = b_tpk.id_user');
        $this->db->where('id_tpk', $id);
        return $this->db->get();
    }

    public function tambahtpk($data)
    {
        return $this->db->insert('b_tpk', $data);
    }


    public function updatetpk($data, $id)
    {
        return $this->db->update('b_tpk', $data, $id);
    }

    public function hapustpk($id)
    {
        return $this->db->delete('b_tpk', $id);
    }

    public function cekkdb()
    {
        $this->db->select('*');
        $this->db->from('b_kdb');
        $this->db->join('user', 'user.id_user = b_kdb.id_user');
        return $this->db->get();
    }

    public function cekkdbid($id)
    {
        $this->db->select('*');
        $this->db->from('b_kdb');
        $this->db->join('user', 'user.id_user = b_kdb.id_user');
        $this->db->where('id_kdb', $id);
        return $this->db->get();
    }

    public function tambahkdb($data)
    {
        return $this->db->insert('b_kdb', $data);
    }


    public function updatekdb($data, $id)
    {
        return $this->db->update('b_kdb', $data, $id);
    }

    public function hapuskdb($id)
    {
        return $this->db->delete('b_kdb', $id);
    }

    public function count($table)
    {
        return $this->db->count_all($table);
    }
}
