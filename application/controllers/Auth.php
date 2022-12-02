<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('ModelUser');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('dashboard');
        }
        $mugiwara = ['Luffy', 'Zoro', 'Sanji', 'Nami', 'Usop', 'Robin', 'Jinbe', 'Chopper', 'Franky', 'Brook'];
        $data = [
            'judul' => 'Login',
            'captcha' => $mugiwara[rand(0, 9)]
        ];
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => '{field} belum di isi',
            'valid_email' => '{field} tidak valid'
        ]);
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'required' => '{field} belum di isi'
        ]);

        $this->form_validation->set_rules('captcha', 'Captcha', 'required|matches[captcha_code]', [
            'required' => '{field} belum di isi',
            'matches' => '{field} Tidak Sama'
        ]);

        $this->form_validation->set_rules('captcha_code', 'Captcha', 'matches[captcha]');

        if ($this->form_validation->run() == false) {
            $this->load->view('auth/login', $data);
        } else {
            $this->_login();
        }
    }

    private function _login()
    {
        $email = htmlspecialchars($this->input->post('email', true));
        $password = $this->input->post('password', true);

        $user = $this->ModelUser->cekData(['email' => $email])->row_array();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'email' => $user['email'],
                        'role' => $user['role'],
                        'id_user' => $user['id_user'],
                        'nama' => $user['nama'],
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('pesan', 'Berhasil Login.');
                    redirect('dashboard');
                } else {
                    $this->session->set_flashdata('notif', 'Password Salah');
                    redirect('auth');
                }
            } else {
                $this->session->set_flashdata('notif', 'Akun Belum Di Aktifasi!! Silahkan Hubungi admin');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('notif', 'Email Tidak Terdaftar');
            redirect('auth');
        }
    }

    private function _sendEmail($token)
    {
        $config = [
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_user' => 'abdultalif95@gmail.com',
            'smtp_pass' => 'jifmrewhtzdqvzwm',
            'smtp_port' => 465,
            'mailtype'  => 'html',
            'charset'   => 'utf-8',
            'newline'   => "\r\n"
        ];

        $this->email->initialize($config);

        $this->email->from('SIC@gmail.com', 'Sarbi International Certification');
        $this->email->to($this->input->post('email'));


        $this->email->subject('Reset Password');
        $this->email->message('Click this link to reset your password : <a href="' . base_url() . 'auth/resetpassword?email=' . $this->input->post('email') . '&token=' . urlencode($token) . '">Reset Password</a>');

        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            die;
        }
    }

    public function resetPassword()
    {
        $email = $this->input->get('email');
        $token = $this->input->get('token');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            $user_token = $this->db->get_where('user_token', ['token' => $token])->row_array();

            if ($user_token) {
                $this->session->set_userdata('reset_email', $email);
                $this->changePassword();
            } else {
                $this->session->set_flashdata('notif', 'Reset Password gagal! Token salah.');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('notif', 'Reset password gagal! Email salah.');
            redirect('auth');
        }
    }

    public function changePassword()
    {
        cek();
        $this->form_validation->set_rules('password1', 'Password', 'trim|required|min_length[5]|matches[password2]', [
            'required' => '{field} belum di isi',
            'min_length' => '{field} Minimal 3 digit',
            'matches' => 'Password dan confirm password tidak sama'
        ]);
        $this->form_validation->set_rules('password2', 'Repeat Password', 'trim|required|min_length[5]|matches[password1]', [
            'required' => '{field} belum di isi',
            'min_length' => '{field} Minimal 3 digit',
            'matches' => 'Password dan confirm password tidak sama'
        ]);

        if ($this->form_validation->run() == false) {
            $data['judul'] = 'Reset Password';
            $this->load->view('auth/change-password', $data);
        } else {
            $password = password_hash($this->input->post('password1'), PASSWORD_DEFAULT);
            $email = $this->session->userdata('reset_email');

            $this->db->set('password', $password);
            $this->db->where('email', $email);
            $this->db->update('user');

            $this->session->unset_userdata('reset_email');

            $this->db->delete('user_token', ['email' => $email]);

            $this->session->set_flashdata('pesan', 'Password berhasil di reset! Silahkan login');
            redirect('auth');
        }
    }

    public function forgotpassword()
    {
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => '{field} belum di isi',
            'valid_email' => '{field} tidak valid'
        ]);
        $this->form_validation->set_rules('captcha', 'Captcha', 'required|matches[captcha_code]', [
            'required' => '{field} belum di isi',
            'matches' => '{field} Tidak Sama'
        ]);

        $this->form_validation->set_rules('captcha_code', 'Captcha', 'matches[captcha]');

        if ($this->form_validation->run() == false) {
            $mugiwara = ['Luffy', 'Zoro', 'Sanji', 'Nami', 'Usop', 'Robin', 'Jinbe', 'Chopper', 'Franky', 'Brook'];
            $data = [
                'judul' => 'Login',
                'captcha' => $mugiwara[rand(0, 9)]
            ];
            $this->load->view('auth/forgot', $data);
        } else {
            $email = $this->input->post('email');
            $user = $this->db->get_where('user', ['email' => $email])->row_array();

            if ($user) {
                $token = base64_encode(random_bytes(32));
                $user_token = [
                    'email' => $email,
                    'token' => $token,
                    'date_created' => time()
                ];

                $this->db->insert('user_token', $user_token);
                $this->_sendEmail($token);

                $this->session->set_flashdata('pesan', 'Periksa email anda untuk reset password');
                redirect('auth');
            } else {
                $this->session->set_flashdata('notif', 'Email Tidak Terdaftar');
                redirect('auth');
            }
        }
    }

    public function login_scan()
    {
        $this->load->view('auth/scan_login');
    }

    public function cek_login_scan()
    {
        $id_user = $this->input->post('id_user');

        $user = $this->ModelUser->cekData(['id_user' => $id_user])->row_array();

        if ($user) {
            $data = [
                'email' => $user['email'],
                'role' => $user['role'],
                'id_user' => $user['id_user'],
                'nama' => $user['nama'],
                'image' => $user['image']
            ];
            $this->session->set_userdata($data);
            $this->session->set_flashdata('pesan', 'Berhasil Login.');
            redirect('dashboard');
        } else {
            $this->session->set_flashdata('notif', 'User tidak ditemukan');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role');
        $this->session->unset_userdata('id_user');
        $this->session->unset_userdata('nama');

        $this->session->set_flashdata('pesan', 'Anda Telah Logout');
        redirect('auth');
    }
}
