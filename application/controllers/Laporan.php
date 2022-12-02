<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model(['ModelUser', 'Arsip']);
        cek_login();
    }

    public function pendahuluan()
    {
        $data = [
            'judul' => 'Laporan Pendahuluan',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'pendahuluan' => $this->Arsip->cekpendahuluan()->result_array()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar', $data);
        $this->load->view('laporan/pendahuluan', $data);
        $this->load->view('template/footer');
    }

    public function tambahPendahuluan()
    {
        $data = [
            'judul' => 'Upload Laporan Pendahuluan',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
        ];

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
            $this->load->view('laporan/upload-pendahuluan');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/laporan-pendahuluan/';
            $config['allowed_types']  = 'rar|pdf|zip';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('notif', 'Type File Tidak Support.');
                redirect('laporan/tambahPendahuluan');
            } else {
                $upload = $this->upload->data();
                $data = [
                    'nama_pendahuluan' => $this->input->post('nama'),
                    'file' => $upload['file_name'],
                    'skema' => $this->input->post('skema'),
                    'lingkup' => $this->input->post('lingkup'),
                    'tahun' => $this->input->post('tahun'),
                    'dibuat' => time(),
                    'id_user' => $this->session->userdata('id_user')
                ];
                $this->Arsip->tambahpendahuluan($data);
                $this->session->set_flashdata('pesan', 'Laporan Pendahuluan berhasil ditambah.');
                redirect('laporan/pendahuluan');
            }
        }
    }

    public function ubahPendahuluan($id)
    {
        $data = [
            'judul' => 'Upload Laporan Pendahuluan',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'pendahuluan' => $this->Arsip->cekpendahuluanid($id)->row_array()
        ];


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
            $this->load->view('laporan/update-pendahuluan');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/laporan-pendahuluan/';
            $config['allowed_types']  = 'rar|pdf|zip';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $file_baru = $this->upload->data('file_name');
                unlink('assets/file/laporan-pendahuluan/' . $this->input->post('file_lama'));
            } else {
                $file_baru = $this->input->post('file_lama');
            }
            $data = [
                'nama_pendahuluan' => $this->input->post('nama'),
                'file' => $file_baru,
                'skema' => $this->input->post('skema'),
                'lingkup' => $this->input->post('lingkup'),
                'tahun' => $this->input->post('tahun')
            ];
            $this->Arsip->ubahpendahuluan($data, ['id_pendahuluan' => $id]);
            $this->session->set_flashdata('pesan', 'Laporan Pendahuluan berhasil diubah.');
            redirect('laporan/pendahuluan');
        }
    }

    public function hapusPendahuluan()
    {
        $id = ['id_pendahuluan' => $this->uri->segment('3')];
        $sql = $this->db->get_where('l_pendahuluan', $id)->row_array();
        $path = 'assets/file/laporan-pendahuluan/' . $sql['file'];
        unlink($path);
        $this->Arsip->hapuspendahuluan($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('laporan/pendahuluan');
    }
    public function akhir()
    {
        $data = [
            'judul' => 'Laporan Akhir',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'akhir' => $this->Arsip->cekakhir()->result_array()
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar', $data);
        $this->load->view('laporan/akhir', $data);
        $this->load->view('template/footer');
    }

    public function tambahakhir()
    {
        $data = [
            'judul' => 'Upload Laporan Akhir',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
        ];


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
            $this->load->view('laporan/upload-akhir');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/laporan-akhir/';
            $config['allowed_types']  = 'rar|pdf|zip';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);

            if (!$this->upload->do_upload('file')) {
                $this->session->set_flashdata('notif', 'Type File Tidak Support.');
                redirect('laporan/tambahPendahuluan');
            } else {
                $upload = $this->upload->data();
                $data = [
                    'nama_akhir' => $this->input->post('nama'),
                    'file' => $upload['file_name'],
                    'skema' => $this->input->post('skema'),
                    'lingkup' => $this->input->post('lingkup'),
                    'tahun' => $this->input->post('tahun'),
                    'dibuat' => time(),
                    'id_user' => $this->session->userdata('id_user')
                ];
                $this->Arsip->tambahakhir($data);
                $this->session->set_flashdata('pesan', 'Laporan Akhir berhasil ditambah.');
                redirect('laporan/akhir');
            }
        }
    }

    public function ubahakhir($id)
    {
        $data = [
            'judul' => 'Upload Laporan Akhir',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'akhir' => $this->Arsip->cekakhirid($id)->row_array()
        ];

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
            $this->load->view('laporan/update-akhir');
            $this->load->view('template/footer');
        } else {
            $config['upload_path']    = './assets/file/laporan-akhir/';
            $config['allowed_types']  = 'rar|pdf|zip';
            $config['encrypt_name']  = true;

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('file')) {
                $file_baru = $this->upload->data('file_name');
                unlink('assets/file/laporan-akhir/' . $this->input->post('file_lama'));
            } else {
                $file_baru = $this->input->post('file_lama');
            }
            $data = [
                'nama_akhir' => $this->input->post('nama'),
                'file' => $file_baru,
                'skema' => $this->input->post('skema'),
                'lingkup' => $this->input->post('lingkup'),
                'tahun' => $this->input->post('tahun')
            ];
            $this->Arsip->ubahakhir($data, ['id_akhir' => $id]);
            $this->session->set_flashdata('pesan', 'Laporan Akhir berhasil diubah.');
            redirect('laporan/akhir');
        }
    }

    public function hapusakhir()
    {
        $id = ['id_akhir' => $this->uri->segment('3')];
        $sql = $this->db->get_where('l_akhir', $id)->row_array();
        $path = 'assets/file/laporan-akhir/' . $sql['file'];
        unlink($path);
        $this->Arsip->hapusakhir($id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('laporan/akhir');
    }
}
