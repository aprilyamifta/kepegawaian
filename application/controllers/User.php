<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        is_logged_in();
        date_default_timezone_set('Asia/Jakarta');
        $this->get_datasess = $this->db->get_where('user', ['username' =>
        $this->session->userdata('username')])->row_array();
        $this->load->model('M_Front');
        $this->load->model('M_User');
        $this->get_datasetupapp = $this->M_Front->fetchsetupapp();
    }

    public function setting()
    {
        $data = [
            'title' => 'Setting',
            'user' => $this->get_datasess,
            'dataapp' => $this->get_datasetupapp,
            'listremember' => $this->M_User->fetchrememberme()
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('user/setting', $data);
        $this->load->view('layout/footer', $data);
    }

    public function profile()
    {
        $data = [
            'title' => 'My Profile',
            'user' => $this->get_datasess,
            'dataapp' => $this->get_datasetupapp
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('user/profile', $data);
        $this->load->view('layout/footer', $data);
    }

    public function absensiku()
    {
        $data = [
            'title' => 'Data Kehadiran',
            'user' => $this->get_datasess,
            'dataapp' => $this->get_datasetupapp
        ];
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('user/absensi', $data);
        $this->load->view('layout/footer', $data);
    }

    public function kinerjaku()
    {
        $data = [
            'title' => 'Kinerja Pegawai',
            'user' => $this->get_datasess,
            'dataapp' => $this->get_datasetupapp
        ];

        $data['kinerjaku'] = $this->db->get_where('db_kinerja', ['nama_pegawai' => $this->get_datasess['username']])->result();
        $this->load->view('layout/header', $data);
        $this->load->view('layout/navbar', $data);
        $this->load->view('layout/sidebar', $data);
        $this->load->view('user/kinerja', $data);
        $this->load->view('layout/footer', $data);
    }

    public function inputkinerja()
    {
        $data = [
            'title' => 'Kinerja Pegawai',
            'user' => $this->get_datasess,
            'dataapp' => $this->get_datasetupapp
        ];

        $data_kinerja = [
            'nama_pegawai' => $this->get_datasess['username'],
            'kode_pegawai' => $this->get_datasess['kode_pegawai'],
            'tgl_kinerja' => date('Y-m-d'),
            'jam_mulai' => date('H:i:s'),
            'mengerjakan' => $this->input->post('mengerjakan'),
        ];
        $this->db->insert('db_kinerja', $data_kinerja);
        redirect('/user/kinerjaku');
    }
}
