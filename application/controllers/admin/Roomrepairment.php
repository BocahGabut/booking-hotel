<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roomrepairment extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('username') == "") {
            redirect(base_url() . 'login');
        }
        $this->load->helper('text');
    }

    public function index()
    {
        $data = array(
            'title' => "Data Perbaikan Kamar",
            'room' => $this->model->show_data('kamar')->result(),
            'repair' => $this->model->repair()->result()
        );
        $this->load->view('admin/roomrepairment', $data);
    }

    public function save()
    {
        $kd_user = $this->session->userdata('id_user');
        $data = array(
            'id_kamar' => $this->input->post('room'),
            'tgl_mulai' => $this->input->post('from'),
            'tgl_selesai' => $this->input->post('to'),
            'catatan' => $this->input->post('note'),
            'id_karyawan' => $kd_user
        );
        $insert = $this->model->save('perbaikan_kamar', $data);
        echo json_encode($insert);
    }

    public function update()
    {
        $where = array(
            'id_perbaikan' => $this->input->post('id')
        );
        $data = array(
            'id_kamar' => $this->input->post('room'),
            'tgl_mulai' => $this->input->post('from'),
            'tgl_selesai' => $this->input->post('to'),
            'catatan' => $this->input->post('note'),
            'id_karyawan' => ''
        );
        $update =  $this->model->update('perbaikan_kamar', $where, $data);
        echo json_encode($update);
    }

    public function edit()
    {
        $resultSet = array();
        $id = $this->input->post('id');

        $where = array(
            'id_perbaikan' => $id
        );
        $hasil = $this->model->show_data('perbaikan_kamar', $where)->result();
        foreach ($hasil as $has) {
            $resultSet[] = $has;
        }
        echo json_encode($resultSet);
    }

    public function delete()
    {
        $data = array(
            'id_perbaikan' => $this->input->post('id')
        );

        $this->model->delete('perbaikan_kamar', $data);
    }
}
