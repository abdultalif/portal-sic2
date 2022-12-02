<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kontrak extends CI_Controller
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
            'judul' => 'Kontrak',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'kontrak' => $this->Arsip->cekkontrak()->result_array()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar', $data);
        $this->load->view('kontrak/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Upload kontrak',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
        ];

        $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
            'required' => 'Pilih Jenis',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Perusahaan belum di isi'
        ]);

        $this->form_validation->set_rules('skema', 'Skema', 'required', [
            'required' => 'Skema belum di isi'
        ]);

        $this->form_validation->set_rules('lingkup', 'Lingkup', 'required', [
            'required' => 'Lingkup belum di isi'
        ]);

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
            'required' => 'Tanggal belum di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('kontrak/upload');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/kontrak/';
            $config['allowed_types']  = 'pdf|rar|zip';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('notif', 'Type File Tidak Support.');
                redirect('kontrak/tambah');
            } else {
                $upload = $this->upload->data();
                $data = [
                    'nama_kontrak' => $this->input->post('nama'),
                    'file' => $upload['file_name'],
                    'skema' => $this->input->post('skema'),
                    'lingkup' => $this->input->post('lingkup'),
                    'tanggal' => $this->input->post('tanggal'),
                    'jenis' => $this->input->post('jenis'),
                    'dibuat' => time(),
                    'id_user' => $this->session->userdata('id_user')
                ];
                $this->Arsip->tambahkontrak($data);
                $this->session->set_flashdata('pesan', 'User berhasil ditambah.');
                redirect('kontrak');
            }
        }
    }

    public function ubah($id)
    {
        $data = [
            'judul' => 'Upload kontrak',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'kontrak' => $this->Arsip->cekkontrakid($id)->row_array(),
        ];

        $this->form_validation->set_rules('jenis', 'Jenis', 'required', [
            'required' => 'Pilih Jenis',
        ]);

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Perusahaan belum di isi'
        ]);

        $this->form_validation->set_rules('skema', 'Skema', 'required', [
            'required' => 'Skema belum di isi'
        ]);

        $this->form_validation->set_rules('lingkup', 'Lingkup', 'required', [
            'required' => 'Lingkup belum di isi'
        ]);

        $this->form_validation->set_rules('tanggal', 'Tanggal', 'required', [
            'required' => 'Tanggal belum di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('kontrak/update');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/kontrak/';
            $config['allowed_types']  = 'pdf|rar|zip';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $file_baru = $this->upload->data('file_name');
                unlink('assets/file/kontrak/' . $this->input->post('file_lama'));
            } else {
                $file_baru = $this->input->post('file_lama');
            }
            $data = [
                'nama_kontrak' => $this->input->post('nama'),
                'file' => $file_baru,
                'skema' => $this->input->post('skema'),
                'lingkup' => $this->input->post('lingkup'),
                'tanggal' => $this->input->post('tanggal'),
                'jenis' => $this->input->post('jenis')
            ];
            $this->Arsip->ubahkontrak($data, ['id_kontrak' => $id]);
            $this->session->set_flashdata('pesan', 'User berhasil diubah.');
            redirect('kontrak');
        }
    }

    public function hapus()
    {
        $id = ['id_kontrak' => $this->uri->segment('3')];
        $sql = $this->db->get_where('kontrak', $id)->row_array();
        $path = 'assets/file/kontrak/' . $sql['file'];
        unlink($path);
        $this->Arsip->hapuskontrak($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('kontrak');
    }
}
