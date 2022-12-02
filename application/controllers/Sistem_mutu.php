<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Sistem_mutu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelUser', 'Arsip']);
        cek_login();
    }

    public function index()
    {
        $data = [
            'judul' => 'Sistem Mutu',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'sistem' => $this->Arsip->ceksistem()->result_array()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar', $data);
        $this->load->view('sistem-mutu/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Upload Legalitas',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
        ];

        $this->form_validation->set_rules('kode', 'Kode', 'required', [
            'required' => 'Kode belum di isi'
        ]);

        $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
            'required' => 'Jenis belum di isi',
        ]);

        $this->form_validation->set_rules('nama', 'Dokumen', 'required', [
            'required' => 'Dokumen belum di isi'
        ]);

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
            'required' => 'Tanggal belum di isi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('sistem-mutu/upload');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/sistem-mutu/';
            $config['allowed_types']  = 'pdf';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('notif', 'Type File Tidak Support.');
                redirect('sistem_mutu/tambah');
            } else {
                $upload = $this->upload->data();
                $data = [
                    'file' => $upload['file_name'],
                    'kode' => $this->input->post('kode'),
                    'nama_sistem' => $this->input->post('nama'),
                    'jenis' => $this->input->post('jenis'),
                    'tanggal' => $this->input->post('tanggal'),
                    'dibuat' => time(),
                    'id_user' => $this->session->userdata('id_user')
                ];
                $this->Arsip->tambahSistem($data);
                $this->session->set_flashdata('pesan', 'User berhasil ditambah.');
                redirect('sistem_mutu');
            }
        }
    }
    public function ubah($id)
    {
        $data = [
            'judul' => 'Upload Legalitas',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'sistem' => $this->Arsip->ceksistemId($id)->row_array()
        ];

        $this->form_validation->set_rules('kode', 'Kode', 'required', [
            'required' => 'Kode belum di isi'
        ]);

        $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
            'required' => 'Jenis belum di isi',
        ]);

        $this->form_validation->set_rules('nama', 'Dokumen', 'required', [
            'required' => 'Dokumen belum di isi'
        ]);

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
            'required' => 'Tanggal belum di isi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('sistem-mutu/update');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/sistem-mutu/';
            $config['allowed_types']  = 'pdf';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $file_baru = $this->upload->data('file_name');
                unlink('assets/file/sistem-mutu/' . $this->input->post('file_lama'));
            } else {
                $file_baru = $this->input->post('file_lama');
            }
            $data = [
                'file' => $file_baru,
                'kode' => $this->input->post('kode'),
                'nama_sistem' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'tanggal' => $this->input->post('tanggal'),
                'id_user' => $this->session->userdata('id_user')
            ];
            $this->Arsip->updateSistem($data, ['id_sistem' => $id]);
            $this->session->set_flashdata('pesan', 'User berhasil ditambah.');
            redirect('sistem_mutu');
        }
    }

    public function hapus()
    {
        $id = ['id_sistem' => $this->uri->segment('3')];
        $sql = $this->db->get_where('sistem_mutu', $id)->row_array();
        $path = 'assets/file/sistem-mutu/' . $sql['file'];
        unlink($path);
        $this->Arsip->hapusSistem($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('sistem_mutu');
    }
}
