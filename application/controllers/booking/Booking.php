<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Booking extends CI_Controller
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
            'type' => $this->model->show_data('tipe_kamar')->result(),
            'option' => $this->model->show_data('website')->result(),
            'check' => $this->model->data_chekin()->result(),
            'floor' => $this->model->floor()->result(),
            'title' => "Dashboard"
        );
        $this->load->view('booking/index', $data);
    }

    public function get_data()
    {
        $kode = $this->uri->segment('4');

        $where = array(
            'lantai' => $kode
        );

        $data = array(
            'floor' => $this->model->show_data('kamar', $where)->result()
        );
        $this->load->view('booking/detail_lantai', $data);
    }

    public function status()
    {
        $where = array(
            'id_booking' => $this->input->post('id')
        );


        $stat = null;
        if ($this->input->post("status") == "I") {
            $stat = "I";
        } else {
            $stat = "C";
        }
        $data = array(
            'status' => $stat
        );

        $update =  $this->model->update('booking', $where, $data);
        echo json_encode($update);
    }

    public function bayar()
    {
        $where = array(
            'id_booking' => $this->input->post('id')
        );
        $data = array(
            'status' => 'CK'
        );

        $update =  $this->model->update('booking', $where, $data);
        echo json_encode($update);
    }

    public function get_kamar()
    {
        $kode = $this->input->post('id');

        $hasil = $this->model->data_kamar($kode);
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $has) {
                $resultSet[] = $has;
            }
        } else {
            $resultSet[] = 'not found';
        }
        echo json_encode($resultSet);
    }

    public function get_tamu()
    {
        $kode = $this->input->post('id');

        $hasil = $this->model->data_tamu($kode);
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $has) {
                $resultSet[] = $has;
            }
        } else {
            $resultSet[] = 'not found';
        }
        echo json_encode($resultSet);
    }

    public function get_check()
    {
        $kode = $this->input->post('id');

        $hasil = $this->model->check_pembayaran($kode);
        if ($hasil->num_rows() > 0) {
            foreach ($hasil->result() as $has) {
                $resultSet[] = $has;
            }
        } else {
            $resultSet[] = 'not found';
        }
        echo json_encode($resultSet);
    }

    public function load()
    {
        $id = ''; //$this->input->post('id');
        $hasil = '';

        if ($id > 0) {
            $hasil = $this->model->full_calender($id);
        } else {
            $hasil = $this->model->full_calender($id);
        }

        foreach ($hasil->result() as $has) {
            $end = date('Y-m-d', strtotime($has->lama_tinggal + 1 . 'day', strtotime($has->tgl_checkin)));
            $resultSet[] =
                array(
                    'title' => $has->nomor_kamar . ' -> ' . $has->nama_penghuni,
                    'start' => $has->tgl_checkin,
                    'end'   => $end,
                    'url' => '#'
                );
        }
        echo json_encode($resultSet);
    }

    public function add_tamu()
    {
        $data = array(
            'nama_penghuni' => $this->input->post('tmu_nama'),
            'no_ktp' => $this->input->post('tmu_noktp'),
            'email' => $this->input->post('tmu_email'),
            'nomor_hp' => $this->input->post('tmu_nomor')
        );
        $insert = $this->model->save('penghuni', $data);
        echo json_encode($insert);
    }


    public function submit()
    {
        $kd_user = $this->session->userdata('id_user');
        $no_fak = $this->model->no_faktur();
        $data = array(
            'id_booking' => $no_fak,
            'tgl_checkin' => $this->input->post('checkin'),
            'tgl_booking' => date('Y-m-d'),
            'id_penghuni' => $this->input->post('id_penghuni'),
            'id_kamar' => $this->input->post('id_kamar'),
            'status' => 'B',
            'id_karyawan' => $kd_user,
            'lama_tinggal' => $this->input->post('tinggal'),
            'total_bayar' => $this->input->post('bayar'),
            'diskon' => $this->input->post('diskon')
        );
        $this->model->save('booking', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert">
        <p class="mb-0">
          Submit Data Berhasil............
        </p>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>');
        redirect(base_url() . 'booking/booking');
    }

    public function logout()
    {
        $this->session->unset_userdata('username');
        $this->session->unset_userdata('level');
        session_destroy();
        redirect(base_url('login'));
    }
}
