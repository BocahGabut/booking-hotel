<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_lib/header');
?>

<body class="light-sidebar">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="<?php echo base_url('assets/template/') ?>img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>

            <div class="app-container">

                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1><?php echo $title ?></h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <a href="<?php echo base_url() . 'admin/roomfacility/add_data' ?>" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                            <button type="button" data-toggle="tooltip" data-placement="top" title="Add Data" class="btn btn-icon btn-info mr-1 mb-1"><i class="fa fa-plus"></i>
                                            </button>
                                        </a>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <?php echo $this->session->flashdata('pesan') ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <div class="datatable-wrapper table-responsive">
                                            <table id="data_table" class="display compact table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tipe Kamar</th>
                                                        <th>Fasilitas ~~ Jumlah Fasilitas</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($fact_room as $tr) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $tr->nama_tipekamar ?></td>
                                                            <td>
                                                                <?php
                                                                $where = array(
                                                                    'tipekamar' => $tr->tipekamar
                                                                );
                                                                $this->db->join('fasilitas', 'fasilitas.id_fasilitas = fasilitas_tipekamer.fasilitas');
                                                                $hasil = $this->model->show_data('fasilitas_tipekamer', $where);
                                                                foreach ($hasil->result() as $fas) {
                                                                    echo '-> ' . $fas->nama_fasilitas . ' ~~ ' . $fas->jumlah_fasilitas;
                                                                    echo '<br>';
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>

                                                                <a onclick="delete_message('<?php echo $tr->tipekamar ?>','<?php echo base_url(); ?>admin/roomfacility/delete','<?php echo base_url(); ?>admin/roomfacility')" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                                                    <button data-toggle="tooltip" data-placement="top" title="Delete" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="fa fa-trash"></i>
                                                                    </button>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end container-fluid -->
                </div>

            </div>
        </div>

        <script>
            function edit(id) {
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/room/edit",
                    type: "post",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        var baris = '';
                        for (var i = 0; i < data.length; i++) {
                            $('#edit').modal('show');
                            document.getElementById("id_kamar").value = '' + data[i].id_kamar;
                            document.getElementById("nomor_kamar").value = '' + data[i].nomor_kamar;
                            document.getElementById("lantai").value = '' + data[i].lantai;
                            document.getElementById("tipe").value = '' + data[i].id_tipekamar;
                        }
                    }
                });
            };

            function add_cart() {
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/roomfacility/add_cart",
                    type: "post",
                    data: $('#form_fas').serialize(),
                    dataType: 'json',
                    success: function(data) {
                        console.log($('#form_fas').serialize());
                    }
                });
            };
        </script>
        <?php
        $this->load->view('_lib/footer');
        ?>