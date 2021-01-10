<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Roomfacility extends CI_Controller
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
            'title' => "Data Fasilitas Kamar",
            'fact_room' => $this->model->fasilitas('fasilitas_tipekamer')->result()
        );
        $this->load->view('admin/roomfacility', $data);
        $this->remove_all();
    }

    public function add_data()
    {
        $data = array(
            'title' => "Tambah Fasilitas Kamar",
            'type' => $this->model->show_data('tipe_kamar')->result(),
            'fact' => $this->model->show_data('fasilitas')->result()
        );
        $this->load->view('admin/form/add_data', $data);
        $this->remove_all();
    }

    public function add_cart()
    {
        $data = array(
            'id'      => $this->input->post('id'),
            'qty'     => 1,
            'price'   => 0,
            'name'    => $this->input->post('fasilitas')
        );

        $this->cart->insert($data);
        echo $this->load();
    }

    public function load()
    {
        $output = null;
        $no = 1;
        foreach ($this->cart->contents() as $has) {

            $onclick = "update_cart('$has[rowid]','$has[qty]')";

            $output .=
                '<tr>' .
                '<td>' . $no++ . '</td>' .
                '<td>' . $has['name'] . '</td>' .
                '<td>' . '<input class="form-control"  id="row_qty" typ="number" value="' . $has['qty'] . '">' . '</input>'
                . '<input class="form-control" id="row_id" readonly hidden typ="number" value="' . $has['rowid'] . '">' . '</input>'
                . '</td>' .
                '<td>' . '<button data-toggle="tooltip" data-placement="top" title="Update" type="button" onclick="' . $onclick . '" class=" btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-minus"></i>
                </button>' . '<button data-toggle="tooltip" data-placement="top" title="Remove" type="button" onclick="remove_cart();" class=" btn btn-icon btn-danger mr-1 mb-1"><i class="fa fa-close"></i>
                </button>' . '</td>' .
                '</tr>';
        }
        echo json_encode($output);
    }

    function remove_cart()
    {
        $data = array(
            'rowid' => $this->input->post('id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        echo $this->load();
    }

    function edit_remove()
    {
        $data = array(
            'rowid' => $this->input->post('id'),
            'qty' => 0,
        );
        $this->cart->update($data);
        $this->edit(false);
    }

    function update_cart()
    {
        $data = array(
            'rowid' => $this->input->post('id'),
            'qty' => $this->input->post('qty') - 1,
        );
        $this->cart->update($data);
        echo $this->load();
    }

    public function show_cart()
    {
        $show_data = $this->cart->contents();
        echo '<pre>';
        print_r($show_data);
    }

    public function remove_all()
    {
        foreach ($this->cart->contents() as $items) {
            $data = array(
                'rowid'   => $items['rowid'],
                'qty'     => 0
            );
            $this->cart->update($data);
        }
    }

    public function save()
    {
        foreach ($this->cart->contents() as $has) {
            $data = array(
                'tipekamar' => $this->input->post('tipe'),
                'jumlah_fasilitas' => $has['qty'],
                'fasilitas' => $has['id']
            );
            $insert = $this->model->save('fasilitas_tipekamer', $data);
        }
        echo json_encode($insert);
        $this->remove_all();
    }

    public function edit($status)
    {
        $id = $this->uri->segment(4);

        $where = array(
            'tipekamar' => $id
        );

        if ($status == true) {
            $this->cart_first($where);
        } else if ($status == false) {
            $this->remove_all();
        }

        $data = array(
            'title' => "Tambah Fasilitas Kamar",
            'type' => $this->model->show_data('tipe_kamar')->result(),
            'fact' => $this->model->show_data('fasilitas')->result(),
            'factroom' => $this->model->edit_fasilitas($where)->result()
        );
        $this->load->view('admin/form/edit_data', $data);
    }


    function cart_first($where)
    {
        $join = "fasilitas.id_fasilitas = fasilitas_tipekamer.fasilitas";

        $edit_cart = $this->model->join('fasilitas_tipekamer', 'fasilitas', $join, $where)->result();
        foreach ($edit_cart as $edt) {

            $cart_data = array(
                'id'      => $edt->id_fasilitas,
                'qty'     => $edt->jumlah_fasilitas,
                'price'   => 0,
                'name'    => $edt->nama_fasilitas
            );
            $this->cart->insert($cart_data);
        }
    }

    public function delete()
    {
        $data = array(
            'tipekamar' => $this->input->post('id')
        );

        $this->model->delete('fasilitas_tipekamer', $data);
    }
}
