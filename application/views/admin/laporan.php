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
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <?php echo $this->session->flashdata('pesan') ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <h4>Option</h4>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="<?php echo base_url() . 'admin/laporan/laporan' ?>">
                                            <div class="form-group">
                                                <label>Laporan Berdasarkan</label>
                                                <select class="form-control" id="lap" name="lap" onchange="showhide()">
                                                    <option value="0">Full Data</option>
                                                    <option value="1">Last Week</option>
                                                    <option value="2">Last Months</option>
                                                    <option value="3">Range</option>
                                                </select>
                                            </div>
                                            <div id="range" style="display: none">
                                                <label>Tanggal</label>
                                                <div class="input-group" data-date="23/11/2018" data-date-format="hh/bb/tttt">
                                                    <input type="date" class="form-control" name="from">
                                                    <span class="input-group-addon">To</span>
                                                    <input class="form-control" type="date" name="to">
                                                </div>
                                            </div>
                                            <div class="form-group mt-3" style="float: right">
                                                <button type="submit" class="btn btn-success">Get Data</button>
                                            </div>
                                        </form>
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

            function showhide() {
                if (document.getElementById('lap').value == "3") {
                    document.getElementById('range').style.display = 'block';
                } else {
                    document.getElementById('range').style.display = 'none';
                }
            };
        </script>