<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Diskonprice extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = 'tipe_kamar.id_tipekamar = diskon.id_tipekamar';

        $data = array(
            'title' => "Data Diskon Kamar",
            'price' => $this->model->join('diskon', 'tipe_kamar', $data)->result(),
            'type' => $this->model->show_data('tipe_kamar')->result()
        );
        $this->load->view('admin/diskonprice', $data);
    }

    public function save()
    {
        $data = array(
            'id_tipekamar' => $this->input->post('type'),
            'persentase' => $this->input->post('percentace'),
            'tgl_mulai' => $this->input->post('from'),
            'tgl_selesai' => $this->input->post('to')
        );
        $insert = $this->model->save('diskon', $data);
        echo json_encode($insert);
    }

    public function update()
    {
        $where = array(
            'id_diskon' => $this->input->post('id')
        );
        $data = array(
            'id_tipekamar' => $this->input->post('type'),
            'persentase' => $this->input->post('percentace'),
            'tgl_mulai' => $this->input->post('from'),
            'tgl_selesai' => $this->input->post('to')
        );
        $update =  $this->model->update('diskon', $where, $data);
        echo json_encode($update);
    }

    public function edit()
    {
        $resultSet = array();
        $id = $this->input->post('id');

        $where = array(
            'id_diskon' => $id
        );
        $hasil = $this->model->show_data('diskon', $where)->result();
        foreach ($hasil as $has) {
            $resultSet[] = $has;
        }
        echo json_encode($resultSet);
    }

    public function delete()
    {
        $data = array(
            'id_diskon' => $this->input->post('id')
        );

        $this->model->delete('diskon', $data);
    }
}
