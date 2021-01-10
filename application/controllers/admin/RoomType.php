<?php
defined('BASEPATH') or exit('No direct script access allowed');

class RoomType extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'title' => "Tipe Kamar",
            'type_room' => $this->model->show_data('tipe_kamar')->result()
        );
        $this->load->view('admin/roomtype', $data);
    }

    public function save()
    {
        $id = base_convert(microtime(false), 18, 36);

        $data = array(
            'id_tipekamar' => $id,
            'nama_tipekamar' => $this->input->post('type')
        );
        $insert = $this->model->save('tipe_kamar', $data);
        echo json_encode($insert);
    }

    public function update()
    {
        $where = array(
            'id_tipekamar' => $this->input->post('id')
        );
        $data = array(
            'nama_tipekamar' => $this->input->post('type')
        );

        $update =  $this->model->update('tipe_kamar', $where, $data);
        echo json_encode($update);
    }

    public function edit()
    {
        $resultSet = array();
        $id = $this->input->post('id');

        $where = array(
            'id_tipekamar' => $id
        );

        $hasil = $this->model->show_data('tipe_kamar', $where)->result();
        foreach ($hasil as $has) {
            $resultSet[] = $has;
        }
        echo json_encode($resultSet);
    }

    public function delete()
    {
        $data = array(
            'id_tipekamar' => $this->input->post('id')
        );

        $this->model->delete('tipe_kamar', $data);
    }
}
