<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Rab extends CI_Controller
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
            'judul' => 'RAB',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'rab' => $this->Arsip->cekrab()->result_array()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar', $data);
        $this->load->view('rab/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Upload RAB',
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

        $this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[4]|min_length[4]', [
            'required' => 'Tahun belum di isi',
            'min_length' => 'Minimal 4',
            'max_length' => 'Maksimal 4',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('rab/upload');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/rab/';
            $config['allowed_types']  = 'pdf|rar|zip|xls|xlsx';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('notif', 'Type File Tidak Support.');
                redirect('rab/tambah');
            } else {
                $upload = $this->upload->data();
                $data = [
                    'nama_rab' => $this->input->post('nama'),
                    'file' => $upload['file_name'],
                    'skema' => $this->input->post('skema'),
                    'lingkup' => $this->input->post('lingkup'),
                    'tahun' => $this->input->post('tahun'),
                    'jenis' => $this->input->post('jenis'),
                    'dibuat' => time(),
                    'id_user' => $this->session->userdata('id_user')
                ];
                $this->Arsip->tambahrab($data);
                $this->session->set_flashdata('pesan', 'User berhasil ditambah.');
                redirect('rab');
            }
        }
    }

    public function ubah($id)
    {
        $data = [
            'judul' => 'Upload RAB',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'rab' => $this->Arsip->cekrabid($id)->row_array(),
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

        $this->form_validation->set_rules('tahun', 'Tahun', 'required|max_length[4]|min_length[4]', [
            'required' => 'Tahun belum di isi',
            'min_length' => 'Minimal 4',
            'max_length' => 'Maksimal 4',
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('rab/update');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/rab/';
            $config['allowed_types']  = 'pdf|rar|zip|xls|xlsx';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $file_baru = $this->upload->data('file_name');
                unlink('assets/file/rab/' . $this->input->post('file_lama'));
            } else {
                $file_baru = $this->input->post('file_lama');
            }
            $data = [
                'nama_rab' => $this->input->post('nama'),
                'file' => $file_baru,
                'skema' => $this->input->post('skema'),
                'lingkup' => $this->input->post('lingkup'),
                'tahun' => $this->input->post('tahun'),
                'jenis' => $this->input->post('jenis')
            ];
            $this->Arsip->updaterab($data, ['id_rab' => $id]);
            $this->session->set_flashdata('pesan', 'User berhasil diubah.');
            redirect('rab');
        }
    }

    public function hapus()
    {
        $id = ['id_rab' => $this->uri->segment('3')];
        $sql = $this->db->get_where('rab', $id)->row_array();
        $path = 'assets/file/sistem-mutu/' . $sql['file'];
        unlink($path);
        $this->Arsip->hapusrab($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('rab');
    }
}
