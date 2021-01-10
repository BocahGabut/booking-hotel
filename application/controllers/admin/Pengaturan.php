<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pengaturan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'title' => "Data Hotel",
            'web' => $this->model->show_data('website')->result()
        );
        $this->load->view('admin/pengaturan', $data);
    }

    public function update()
    {
        $where = array(
            'id_option' => $this->input->post('id')
        );

        $data = array(
            'nama_hotel' => $this->input->post('nama'),
            'alamat' => $this->input->post('alamat'),
            'no_tlpn' => $this->input->post('tlpn'),
            'salam' => $this->input->post('salam')
        );

        $update =  $this->model->update('website', $where, $data);
        echo json_encode($update);
    }

    public function edit()
    {
        $resultSet = array();
        $id = $this->input->post('id');

        $where = array(
            'id_karyawan' => $id
        );
        $hasil = $this->model->show_data('karyawan', $where)->result();
        foreach ($hasil as $has) {
            $resultSet[] = $has;
        }
        echo json_encode($resultSet);
    }

    public function delete()
    {
        $data = array(
            'id_karyawan' => $this->input->post('id')
        );

        $this->model->delete('karyawan', $data);
    }
}
