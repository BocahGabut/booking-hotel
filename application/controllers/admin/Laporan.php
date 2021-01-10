<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = array(
            'title' => "Laporan Transaksi",
            'type_room' => $this->model->show_data('tipe_kamar')->result()
        );
        $this->load->view('admin/laporan', $data);
    }

    public function laporan()
    {

        $startDate1 = date('Y-m-d', strtotime("-1 week"));
        $startDate2 = date('Y-m-d', strtotime("-30 week"));
        $endDate   = date('Y-m-d', strtotime("now"));

        $laporan = null;
        $total = null;
        $ket = null;
        if ($this->input->post("lap") == "0") {
            $data = "kamar.id_kamar = booking.id_kamar";
            $laporan = $this->model->full_data('booking', 'kamar', $data)->result();
            $total = $this->model->getsum_data();
            $ket = "Semua Data Booking";
        } else if ($this->input->post("lap") == "1") {
            $laporan = $this->model->last_week()->result();
            $total = $this->model->getsum_data("tgl_booking BETWEEN '" . $startDate1 . "' AND '" . $endDate . "' ");
            $ket = "Data Booking 7 Hari Yang Lalu";
        } else if ($this->input->post("lap") == "2") {
            $laporan = $this->model->last_month()->result();
            $total = $this->model->getsum_data("tgl_booking BETWEEN '" . $startDate2 . "' AND '" . $endDate . "' ");
            $ket = "Data Booking 30 Hari Yang Lalu";
        } else if ($this->input->post("lap") == "3") {
            $laporan = $this->model->range($this->input->post("from"), $this->input->post("to"))->result();
            $total = $this->model->getsum_data("tgl_booking BETWEEN '" . $this->input->post("from") . "' AND '" . $this->input->post("to") . "' ");
            $ket = "Data Booking " . $this->input->post("from") . ' Sampai ' . $this->input->post("to");
        }

        $data = array(
            'title' => "Detail Laporan",
            'laporan' => $laporan,
            'total' => $total,
            'ket' => $ket
        );
        $this->load->view('admin/detail_laporan', $data);
    }
}
