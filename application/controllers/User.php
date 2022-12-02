<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
        cek_login();
        $this->load->library('Ciqrcode');
    }
    public function index()
    {
        $data = [
            'judul' => 'Data User',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'users' => $this->ModelUser->cekData()->result_array(),
            'role' => ['Admin', 'Kasir']
        ];

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('user/index', $data);
        $this->load->view('template/footer', $data);
    }

    public function add()
    {
        $data = [
            'judul' => 'Tambah User',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array()
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'required', [
            'required' => 'Nama belum di isi'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'required', [
            'required' => 'Role belum di isi'
        ]);

        $this->form_validation->set_rules('no', 'Role', 'required|integer', [
            'required' => 'Role belum di isi',
            'integer' => 'Harus angka'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[user.email]', [
            'required' => 'Nama belum di isi',
            'valid_email' => 'Format harus email',
            'is_unique' => 'Email sudah terdaftar'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('user/tambah', $data);
            $this->load->view('template/footer', $data);
        } else {
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'password' => password_hash('12345', PASSWORD_DEFAULT),
                'image' => 'default.jpg',
                'no_telp' => $this->input->post('no'),
                'role' => $this->input->post('role'),
                'is_active' => 1,
                'tanggal_input' => time()
            ];

            $this->ModelUser->tambah($data);
            $this->session->set_flashdata('pesan', 'User berhasil ditambah.');
            redirect('user');
        }
    }

    public function edit()
    {
        $data = [
            'judul' => 'Data User',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'users' => $this->ModelUser->cekData()->result_array(),
            'role' => ['Admin', 'Kasir']
        ];

        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => '{field} Harus di isi'
        ]);
        $this->form_validation->set_rules('email', 'Email', 'trim|required', [
            'required' => '{field} Harus di isi'
        ]);
        $this->form_validation->set_rules('no', 'Nomor Telp', 'trim|required', [
            'required' => '{field} Harus di isi'
        ]);
        $this->form_validation->set_rules('role', 'Role', 'trim|required', [
            'required' => '{field} Harus di isi'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('user/index', $data);
            $this->load->view('template/footer');
        } else {
            $id = $this->input->post('id');
            $data = [
                'nama' => $this->input->post('nama'),
                'email' => $this->input->post('email'),
                'no_telp' => $this->input->post('no'),
                'role' => $this->input->post('role')
            ];
            $this->ModelUser->ubah($data, ['id_user' => $id]);
            $this->session->set_flashdata('pesan', 'Data berhasil diubah.');
            redirect('user');
        }
    }

    public function editprofile()
    {
        $data = [
            'judul' => 'Edit Profile',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array()
        ];

        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', [
            'required' => 'Email harus di isi',
            'valid_email' => 'Email tidak valid'
        ]);
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', [
            'required' => 'Nama harus di isi'
        ]);
        $this->form_validation->set_rules('no', 'Nomor', 'trim|required|integer', [
            'required' => 'Nomor harus di isi',
            'integer' => 'Nomor harus angka'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/navbar', $data);
            $this->load->view('user/edit_profile', $data);
            $this->load->view('template/footer');
        } else {
            $email = $this->input->post('email');
            $nama = $this->input->post('nama');
            $nomor = $this->input->post('no');
            $id = $this->input->post('id');

            //if image uploaded
            $upload_image = $_FILES['image']['name'];
            if ($upload_image) {
                $config['upload_path'] = './assets/images/logo/';
                $config['allowed_types'] = 'gif|jpg|png';
                $config['max_size']     = '2048';
                $config['encrypt_name']     = true;

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['image'];
                    if ($old_image != 'default.jpg') {
                        unlink('assets/images/logo/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('image', $new_image);
                } else {
                    $this->session->set_flashdata('notif', 'Type File Tidak Support.');
                    redirect('user/editprofile');
                }
            }

            $this->ModelUser->editprofile($nama, $email, $nomor, $id);
            $this->session->set_flashdata('pesan', 'Data Profile berhasil diubah.');
            redirect('user/myprofile');
        }
    }


    public function myprofile()
    {
        $data = [
            'judul' => 'MyProfile',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'qr' => $this->QRUser($this->session->userdata('id_user'))
        ];
    }

    public function QRUser($id)
    {
        $email = $this->session->userdata('email');
        $data['judul'] = 'MyProfile';
        $data['user'] = $this->ModelUser->cekData(['email' => $email])->row_array();
        $data['data'] = $id;
        $data['size'] = 7;
        $data['savename'] = FCPATH . 'assets/images/qr-code/' . $this->session->userdata('id_user') . '.png';
        $this->ciqrcode->generate($data);

        $data['query'] = $this->ModelUser->cekData(['id_user' => $id])->row();
        $data['qruser'] = '<img width="150" src="' . base_url() . 'assets/images/qr-code/' . $this->session->userdata('id_user') . '.png" />';

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/navbar', $data);
        $this->load->view('user/myprofile', $data);
        $this->load->view('template/footer');
    }

    public function print_barcode()
    {
        $data['query'] = $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array();
        $data['tess'] = '<img src="' . base_url() . 'assets/img/qr-code/' . $this->session->userdata('id_user') . '.png">';

        $this->load->view('user/print_barcode', $data);
    }


    public function changepass()
    {
        $data = [
            'judul' => 'Ubah Password',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
        ];

        $this->form_validation->set_rules('lama', 'Curent Password', 'trim|required');
        $this->form_validation->set_rules('baru', 'New Password', 'trim|required|min_length[3]|matches[konfirm]');
        $this->form_validation->set_rules('konfirm', 'Confirm Password', 'trim|required|matches[baru]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar', $data);
            $this->load->view('template/navbar', $data);
            $this->load->view('user/change_password', $data);
            $this->load->view('template/footer', $data);
        } else {
            $password_lama = $this->input->post('lama');
            $password_baru = $this->input->post('baru');

            if (!password_verify($password_lama, $data['user']['password'])) {
                $this->session->set_flashdata('notif', 'Curent Password Salah !!!');
                redirect('user/changepass');
            } else {
                $password_hash = password_hash($password_baru, PASSWORD_DEFAULT);

                $this->db->set('password', $password_hash);
                $this->db->where('email', $this->session->userdata('email'));
                $this->db->update('user');
                $this->session->set_flashdata('pesan', 'Password Berhasil Di Update.');
                redirect('user/changepass');
            }
        }
    }

    public function activeuser($id)
    {
        $status = $this->ModelUser->is_active('user', ['id_user' => $id])['is_active'];
        if ($status == 1) {
            $active = 0;
            $this->ModelUser->activated(['is_active' => $active], ['id_user' => $id]);
            $this->session->set_flashdata("pesan", "User Dinonaktifkan.");
        } else {
            $active = 1;
            $this->ModelUser->activated(['is_active' => $active], ['id_user' => $id]);
            $this->session->set_flashdata('pesan', 'User Diaktifkan.');
        }
        redirect('user');
    }

    public function hapus($id)
    {
        $this->ModelUser->hapus(['id_user' => $id]);
        $this->session->set_flashdata('pesan', 'User berhasil hapus.');
        redirect('user');
    }

    public function multi_delete()
    {
        $check = $this->input->post('checked', FILTER_SANITIZE_STRING);

        foreach ($check as $id) {
            $this->db->delete('user', ['id_user' => $id]);
        }

        $this->session->set_flashdata('pesan', 'Data berhasil dihapus.');
        redirect('user');
    }
}
