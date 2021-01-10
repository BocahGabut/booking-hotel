<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Room extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $data = 'tipe_kamar.id_tipekamar = kamar.tipekamar';

        $data = array(
            'title' => "Data Kamar",
            'type' => $this->model->show_data('tipe_kamar')->result(),
            'room' => $this->model->join('kamar', 'tipe_kamar', $data, null, 'nomor_kamar ' . 'DESC')->result()
        );
        $this->load->view('admin/room', $data);
    }

    public function save()
    {
        $switch = $this->input->post('switch');

        $a = $this->input->post('from');
        $b = $this->input->post('to');
        $selisih = $b - $a;

        if (isset($switch)) {
            for ($i = 0; $i < $selisih + 1; $i++) {
                $batas = str_pad($a++, 3, "0", STR_PAD_LEFT);
                $kodetampil = $this->input->post('nomor') . $batas;
                $data = array(
                    'nomor_kamar' => $kodetampil,
                    'lantai' => $this->input->post('lantai'),
                    'tipekamar' => $this->input->post('tipe')
                );
                $insert = $this->model->save('kamar', $data);
            }
        } else {
            $data = array(
                'nomor_kamar' => $this->input->post('nomor_kamar'),
                'lantai' => $this->input->post('lantai'),
                'tipekamar' => $this->input->post('tipe')
            );
            $insert = $this->model->save('kamar', $data);
        }
        //redirect(base_url() . 'admin/room');
        echo json_encode($insert);
    }

    public function update()
    {
        $where = array(
            'id_kamar' => $this->input->post('id_kamar')
        );
        $data = array(
            'nomor_kamar' => $this->input->post('nomor_kamar'),
            'lantai' => $this->input->post('lantai'),
            'tipekamar' => $this->input->post('tipe')
        );

        $update =  $this->model->update('kamar', $where, $data);
        echo json_encode($update);
    }

    public function edit()
    {
        $resultSet = array();
        $id = $this->input->post('id');

        $where = array(
            'id_kamar' => $id
        );
        $data = 'tipe_kamar.id_tipekamar = kamar.tipekamar';
        $hasil = $this->model->join('kamar', 'tipe_kamar', $data, $where)->result();
        foreach ($hasil as $has) {
            $resultSet[] = $has;
        }
        echo json_encode($resultSet);
    }

    public function delete()
    {
        $data = array(
            'id_kamar' => $this->input->post('id')
        );

        $this->model->delete('kamar', $data);
    }

    public function delete_all()
    {
        $this->model->delete_all('kamar');
    }
}
