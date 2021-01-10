<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Guest extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'title' => "Data Penghuni Hotel",
            'gst' => $this->model->show_data('penghuni')->result()
        );
        $this->load->view('admin/guest', $data);
    }

    public function save()
    {
        $data = array(
            'nama_penghuni' => $this->input->post('nama'),
            'no_ktp' => $this->input->post('ktp'),
            'email' => $this->input->post('email'),
            'nomor_hp' => $this->input->post('hp')
        );
        $insert = $this->model->save('penghuni', $data);
        echo json_encode($insert);
    }

    public function update()
    {
        $where = array(
            'id_penghuni' => $this->input->post('id')
        );
        $data = array(
            'nama_penghuni' => $this->input->post('nama'),
            'no_ktp' => $this->input->post('ktp'),
            'email' => $this->input->post('email'),
            'nomor_hp' => $this->input->post('hp')
        );

        $update =  $this->model->update('penghuni', $where, $data);
        echo json_encode($update);
    }

    public function edit()
    {
        $resultSet = array();
        $id = $this->input->post('id');

        $where = array(
            'id_penghuni' => $id
        );
        $hasil = $this->model->show_data('penghuni', $where)->result();
        foreach ($hasil as $has) {
            $resultSet[] = $has;
        }
        echo json_encode($resultSet);
    }

    public function delete()
    {
        $data = array(
            'id_penghuni' => $this->input->post('id')
        );

        $this->model->delete('penghuni', $data);
    }
}
