<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Legalitas extends CI_Controller
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
            'judul' => 'Legalitas',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'users' => $this->Arsip->cekData()->result_array()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar', $data);
        $this->load->view('legalitas/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Upload Legalitas',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
        ];

        $this->form_validation->set_rules('nama', 'Dokumen', 'required', [
            'required' => 'Dokumen belum di isi'
        ]);

        $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
            'required' => 'Jenis belum di isi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('legalitas/upload');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/legalitas/';
            $config['allowed_types']  = 'pdf|jpg|png';
            $config['encrypt_name']       = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('notif', 'Type File Tidak Support.');
                redirect('legalitas/tambah');
            } else {
                $upload = $this->upload->data();
                $data = [
                    'file' => $upload['file_name'],
                    'nama_file' => $this->input->post('nama'),
                    'jenis' => $this->input->post('jenis'),
                    'dibuat' => time(),
                    'id_user' => $this->session->userdata('id_user')
                ];
                $this->Arsip->tambah($data);
                $this->session->set_flashdata('pesan', 'Legalitas berhasil ditambah.');
                redirect('legalitas');
            }
        }
    }
    public function ubah($id)
    {
        $data = [
            'judul' => 'Edit Legalitas',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'data' => $this->Arsip->cekDatabyid($id)->row_array()
        ];

        $this->form_validation->set_rules('nama', 'Dokumen', 'required', [
            'required' => 'Dokumen belum di isi'
        ]);

        $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
            'required' => 'Jenis belum di isi',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('legalitas/update');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/legalitas/';
            $config['allowed_types']  = 'pdf|jpg|png';
            $config['encrypt_name']   = true;

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('file')) {
                $file_baru = $this->upload->data('file_name');
                unlink('assets/file/legalitas/' . $this->input->post('file_old'));
            } else {
                $file_baru = $this->input->post('file_old');
            }
            $data = [
                'file' => $file_baru,
                'nama_file' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
            ];
            $this->Arsip->ubah($data, ['id_legalitas' => $id]);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('legalitas');
        }
    }

    public function hapus()
    {
        $id = ['id_legalitas' => $this->uri->segment('3')];
        $sql = $this->db->get_where('legalitas', $id)->row_array();
        $path = 'assets/file/legalitas/' . $sql['file'];
        unlink($path);
        $this->Arsip->hapusLegalitas($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('legalitas');
    }
}
