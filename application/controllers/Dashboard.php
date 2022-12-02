<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        cek_login();
        $this->load->model(['ModelUser', 'Arsip']);
    }
    public function index()
    {
        $data = [
            'judul' => 'Dasboard',
            'user' => $this->ModelUser->cekData(['id_user' => $this->session->userdata('id_user')])->row_array(),
            'legalitas' => $this->Arsip->count('legalitas'),
            'sistem_mutu' => $this->Arsip->count('sistem_mutu'),
            'template_form' => $this->Arsip->count('template_form'),
            'rab' => $this->Arsip->count('rab'),
            'kontrak' => $this->Arsip->count('kontrak'),
            'tagihan' => $this->Arsip->count('tagihan'),
            'l_pendahuluan' => $this->Arsip->count('l_pendahuluan'),
            'l_akhir' => $this->Arsip->count('l_akhir')
        ];
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/navbar', $data);
        $this->load->view('dashboard', $data);
        $this->load->view('template/footer', $data);
    }
}
