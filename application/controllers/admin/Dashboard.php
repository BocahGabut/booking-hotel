<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
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
            'title' => "Dashboard"
        );
        $this->load->view('admin/dashboard', $data);
    }

    public function load()
    {
        $this->db->group_by('tipekamar');
        $this->db->join('tipe_kamar', 'tipe_kamar.id_tipekamar = kamar.tipekamar');
        $hasil = $this->db->get('kamar');

        $this->db->select_sum('tipekamar');
        $count = $this->db->get('kamar')->result();

        foreach ($count as $ct) {
            $val = $ct->tipekamar;
        }

        foreach ($hasil->result() as $has) {
            $resultSet[] =
                array(
                    'label' => $has->nama_tipekamar,
                    'value' => $val
                );
        }
        echo json_encode($resultSet);
    }
}
