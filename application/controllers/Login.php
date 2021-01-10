<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'title' => "Dashboard"
        );
        $this->load->view('login', $data);
    }

    function aksi_login()
    {
        $username = $this->input->post('username');
        $password = md5($this->input->post('password'));
        $where = array(
            'username' => $username,
            'password' => $password
        );
        $cek = $this->model->cek_login($where);
        if ($cek->num_rows() > 0) {
            foreach ($cek->result() as $sess) {
                $sess_data['logged_in'] = 'Sudah Loggin';
                $sess_data['id_user'] = $sess->id_karyawan;
                $sess_data['username'] = $sess->username;
                $sess_data['level'] = $sess->status;
                $this->session->set_userdata($sess_data);
            }
            if ($this->session->userdata('level') == '0') {
                redirect(base_url() . 'admin/dashboard');
            } elseif ($this->session->userdata('level') == '1') {
                redirect(base_url() . 'booking/booking');
            }
        } else {
            $this->session->set_flashdata('pesan', '<br>
            <label class="error-msg">Maaf Username Atau Password Anda Salah !!</label>
            <br>
            <label class="sub-msg">Silahkan Anda Coba Lagi</label>');
            redirect(base_url() . 'login');
        }
    }
}
