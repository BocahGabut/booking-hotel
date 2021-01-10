<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dailyprice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = 'tipe_kamar.id_tipekamar = harga_kamar.id_tipekamar';

        $data = array(
            'title' => "Data Harga Kamar",
            'price' => $this->model->join('harga_kamar', 'tipe_kamar', $data)->result(),
            'type' => $this->model->show_data('tipe_kamar')->result()
        );
        $this->load->view('admin/dailyprice', $data);
    }

    public function save()
    {
        $data = array(
            'id_tipekamar' => $this->input->post('type'),
            'harga_kamar' => $this->input->post('price'),
            'pajak' => $this->input->post('pajak')
        );
        $insert = $this->model->save('harga_kamar', $data);
        echo json_encode($insert);
    }

    public function update()
    {
        $where = array(
            'id_hargakamar' => $this->input->post('id')
        );
        $data = array(
            'id_tipekamar' => $this->input->post('type'),
            'harga_kamar' => $this->input->post('price'),
            'pajak' => $this->input->post('pajak')
        );
        $update =  $this->model->update('harga_kamar', $where, $data);
        echo json_encode($update);
    }

    public function edit()
    {
        $resultSet = array();
        $id = $this->input->post('id');

        $where = array(
            'id_hargakamar' => $id
        );
        $hasil = $this->model->show_data('harga_kamar', $where)->result();
        foreach ($hasil as $has) {
            $resultSet[] = $has;
        }
        echo json_encode($resultSet);
    }

    public function delete()
    {
        $data = array(
            'id_hargakamar' => $this->input->post('id')
        );

        $this->model->delete('harga_kamar', $data);
    }
}
