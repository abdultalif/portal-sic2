<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Template_form extends CI_Controller
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
            'judul' => 'Template Form',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'template' => $this->Arsip->cektemplate()->result_array()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar', $data);
        $this->load->view('template-form/index', $data);
        $this->load->view('template/footer');
    }

    public function tambah()
    {
        $data = [
            'judul' => 'Upload Template Form',
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
            $this->load->view('template-form/upload');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/template-form/';
            $config['allowed_types']  = 'pdf';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('notif', 'Type File Tidak Support.');
                redirect('template_form/tambah');
            } else {
                $upload = $this->upload->data();
                $data = [
                    'file' => $upload['file_name'],
                    'kode' => $this->input->post('kode'),
                    'nama_template' => $this->input->post('nama'),
                    'jenis' => $this->input->post('jenis'),
                    'tanggal' => $this->input->post('tanggal'),
                    'dibuat' => time(),
                    'id_user' => $this->session->userdata('id_user')
                ];
                $this->Arsip->tambahtemplate($data);
                $this->session->set_flashdata('pesan', 'Data berhasil ditambah.');
                redirect('template_form');
            }
        }
    }

    public function ubah($id)
    {
        $data = [
            'judul' => 'Upload Template Form',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'template' => $this->Arsip->cekTemplatebyid($id)->row_array()
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
            $this->load->view('template-form/update');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/template-form/';
            $config['allowed_types']  = 'pdf';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $file_baru = $this->upload->data('file_name');
                unlink('assets/file/template-form/' . $this->input->post('file_lama'));
            } else {
                $file_baru = $this->input->post('file_lama');
            }
            $data = [
                'file' => $file_baru,
                'kode' => $this->input->post('kode'),
                'nama_template' => $this->input->post('nama'),
                'jenis' => $this->input->post('jenis'),
                'tanggal' => $this->input->post('tanggal')
            ];
            $this->Arsip->updatetemplate($data, ['id_template' => $id]);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('template_form');
        }
    }

    public function hapus()
    {
        $id = ['id_template' => $this->uri->segment('3')];
        $sql = $this->db->get_where('template_form', $id)->row_array();
        $path = 'assets/file/template-form/' . $sql['file'];
        unlink($path);
        $this->Arsip->hapusTemplate($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('template_form');
    }
}
