<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Facility extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = array(
            'title' => "Data Fasilitas",
            'fact' => $this->model->show_data('fasilitas')->result()
        );
        $this->load->view('admin/facility', $data);
    }

    public function save()
    {
        $data = array(
            'nama_fasilitas' => $this->input->post('fasilitas')
        );
        $insert = $this->model->save('fasilitas', $data);
        echo json_encode($insert);
    }

    public function edit()
    {
        $resultSet = array();
        $id = $this->input->post('id');

        $where = array(
            'id_fasilitas' => $id
        );
        $hasil = $this->model->show_data('fasilitas', $where)->result();
        foreach ($hasil as $has) {
            $resultSet[] = $has;
        }
        echo json_encode($resultSet);
    }

    public function update()
    {
        $where = array(
            'id_fasilitas' => $this->input->post('id')
        );
        $data = array(
            'nama_fasilitas' => $this->input->post('fasilitas')
        );

        $update =  $this->model->update('fasilitas', $where, $data);
        echo json_encode($update);
    }

    public function delete()
    {
        $data = array(
            'tipekamar' => $this->input->post('id')
        );

        $this->model->delete('fasilitas_tipekamar', $data);
    }
}
