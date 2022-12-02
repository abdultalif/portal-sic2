<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tagihan extends CI_Controller
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
            'judul' => 'Tagihan',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'tagihan' => $this->Arsip->cektagihan()->result_array()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar', $data);
        $this->load->view('tagihan/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Upload Tagihan',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
        ];

        $this->form_validation->set_rules('nomor', 'Nomor', 'required', [
            'required' => 'Nomor belum di isi',
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

        $this->form_validation->set_rules('tahap', 'Tahap', 'required', [
            'required' => 'Tahun belum di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('tagihan/upload');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/tagihan/';
            $config['allowed_types']  = 'pdf|png|jpg|jpeg';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('notif', 'Type File Tidak Support.');
                redirect('tagihan/tambah');
            } else {
                $upload = $this->upload->data();
                $data = [
                    'nama_tagihan' => $this->input->post('nama'),
                    'file' => $upload['file_name'],
                    'skema' => $this->input->post('skema'),
                    'lingkup' => $this->input->post('lingkup'),
                    'tanggal' => $this->input->post('tanggal'),
                    'no_kontrak' => $this->input->post('nomor'),
                    'tahap_tagihan' => $this->input->post('tahap'),
                    'dibuat' => time(),
                    'id_user' => $this->session->userdata('id_user')
                ];
                $this->Arsip->tambahtagihan($data);
                $this->session->set_flashdata('pesan', 'User berhasil ditambah.');
                redirect('tagihan');
            }
        }
    }

    public function ubah($id)
    {
        $data = [
            'judul' => 'Upload Tagihan',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'tagihan' => $this->Arsip->cektagihanid($id)->row_array()
        ];

        $this->form_validation->set_rules('nomor', 'Nomor', 'required', [
            'required' => 'Nomor belum di isi',
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

        $this->form_validation->set_rules('tahap', 'Tahap', 'required', [
            'required' => 'Tahun belum di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('tagihan/update');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/tagihan/';
            $config['allowed_types']  = 'pdf|png|jpg|jpeg';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $file_baru = $this->upload->data('file_name');
                unlink('assets/file/tagihan/' . $this->input->post('file_lama'));
            } else {
                $file_baru = $this->input->post('file_lama');
            }
            $data = [
                'nama_tagihan' => $this->input->post('nama'),
                'file' => $file_baru,
                'skema' => $this->input->post('skema'),
                'lingkup' => $this->input->post('lingkup'),
                'tanggal' => $this->input->post('tanggal'),
                'no_kontrak' => $this->input->post('nomor'),
                'tahap_tagihan' => $this->input->post('tahap')
            ];
            $this->Arsip->ubahtagihan($data, ['id_tagihan' => $id]);
            $this->session->set_flashdata('pesan', 'User berhasil diubah.');
            redirect('tagihan');
        }
    }

    public function hapus()
    {
        $id = ['id_tagihan' => $this->uri->segment('3')];
        $sql = $this->db->get_where('tagihan', $id)->row_array();
        $path = 'assets/file/tagihan/' . $sql['file'];
        unlink($path);
        $this->Arsip->hapustagihan($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('tagihan');
    }
}
