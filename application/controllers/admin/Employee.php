<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Employee extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'title' => "Data Karyawan Hotel",
            'gst' => $this->model->show_data('karyawan')->result()
        );
        $this->load->view('admin/employee', $data);
    }

    public function save()
    {
        $id = base_convert(microtime(false), 18, 36);
        $data = array(
            'id_karyawan' => $id,
            'nama_karyawan' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => md5($this->input->post('password')),
            'status' => $this->input->post('status')
        );
        $insert = $this->model->save('karyawan', $data);
        echo json_encode($insert);
    }

    public function update()
    {
        $where = array(
            'id_karyawan' => $this->input->post('id')
        );

        $pass = null;
        if ($this->input->post('password') == '') {
            $pass = $this->input->post('old_password');
        } else {
            $pass = md5($this->input->post('password'));
        }

        $data = array(
            'nama_karyawan' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $pass,
            'status' => $this->input->post('status')
        );

        $update =  $this->model->update('karyawan', $where, $data);
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
