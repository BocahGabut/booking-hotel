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
                                        <a class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                            <button onclick="print_laporan('content_print');" type=" button" data-toggle="tooltip" data-placement="top" title="Print" class="btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-print"></i>
                                            </button>
                                        </a>
                                        <a href="<?php echo base_url() . 'admin/laporan' ?>" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                            <button type="button" data-toggle="tooltip" data-placement="top" title="Kembali" class="btn btn-icon btn-info mr-1 mb-1"><i class="fa fa-mail-reply-all"></i>
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
                                <div id="content_print" class="card card-statistics">
                                    <div class="card-body">
                                        <center>
                                            <h3><?php echo $ket ?></h3>
                                        </center>
                                        <div class="table-responsive">
                                            <table id="export-table" class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Tanggal Booking</th>
                                                        <th>Tanggal Checkin</th>
                                                        <th>Nomor Kamar</th>
                                                        <th>Lama Tinggal</th>
                                                        <th>Total Bayar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($laporan as $tr) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $tr->tgl_booking ?></td>
                                                            <td><?php echo $tr->tgl_checkin ?></td>
                                                            <td><?php echo $tr->nomor_kamar ?></td>
                                                            <td><?php echo $tr->lama_tinggal ?></td>
                                                            <td><?php echo $tr->total_bayar ?></td>
                                                        </tr>
                                                    <?php } ?>
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th colspan="4">
                                                            Total Pemasukan
                                                        </th>
                                                        <th colspan="2">
                                                            <center>
                                                                <?php
                                                                foreach ($total as $ttl) {
                                                                    echo 'Rp. ' . number_format($ttl->total_bayar) . ',0-';
                                                                }
                                                                ?>
                                                            </center>
                                                        </th>
                                                    </tr>
                                                </tfoot>
                                            </table>
                                        </div>
                                        <div class="row">
                                            <div class="col-10">

                                            </div>
                                            <div style="float: right;" class="col-2">
                                                <center>
                                                    <?php
                                                    $tgl = date("d, M Y");
                                                    $id = $this->session->userdata('id_user');
                                                    $this->db->where('id_karyawan', $id);
                                                    $hasil = $this->db->get('karyawan')->result();
                                                    foreach ($hasil as $hsl) {
                                                    ?>

                                                        <h5>
                                                            <?php
                                                            echo $tgl;
                                                            ?>
                                                        </h5>
                                                        <br>
                                                        <br>
                                                        <br>
                                                        <h5>
                                                            <?php
                                                            echo $hsl->nama_karyawan;
                                                            ?>
                                                        </h5>
                                                    <?php } ?>
                                                </center>
                                            </div>
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

        <?php
        $this->load->view('admin/modal/type_modal');
        $this->load->view('_lib/footer');
        ?>

        <script>
            function edit_type(id) {
                $.ajax({
                    url: " <?php echo base_url(); ?>admin/roomtype/edit",
                    type: "post",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        var baris = '';
                        for (var i = 0; i < data.length; i++) {
                            $('#edit').modal('show');
                            document.getElementById("id_type").value = '' + data[i].id_tipekamar;
                            document.getElementById("type_kamar").value = '' + data[i].nama_tipekamar;
                        }
                    }
                });
            }

            function print_laporan(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload();
            }

            function showhide() {
                if (document.getElementById('lap').value == "3") {
                    document.getElementById('range').style.display = 'block';
                } else {
                    document.getElementById('range').style.display = 'none';
                }
            };
        </script>