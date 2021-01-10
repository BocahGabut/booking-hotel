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
                                    <div class="card-body">
                                        <?php
                                        foreach ($web as $wb) {
                                        ?>
                                            <form id="form_update">
                                                <div class="form-group">
                                                    <label>Nama Hotel</label>
                                                    <input value="<?php echo $wb->nama_hotel ?>" type="text" name="nama" class="form-control" required="">
                                                    <input value="<?php echo $wb->id_option ?>" type="text" name="id" class="form-control" readonly hidden required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>No Telephone Hotel</label>
                                                    <input value="<?php echo $wb->no_tlpn ?>" type="number" name="tlpn" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Salam</label>
                                                    <input value="<?php echo $wb->salam ?>" type="text" name="salam" class="form-control" required="">
                                                </div>
                                                <div class="form-group">
                                                    <label>Nama Hotel</label>
                                                    <textarea name="alamat" class="form-control"><?php echo $wb->alamat ?></textarea>
                                                </div>
                                                <div class="form-group">
                                                    <button style="float: right" onclick="update('<?php echo base_url() . 'admin/pengaturan/update' ?>','<?php echo base_url() . 'admin/pengaturan' ?>');" class=" btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        <?php } ?>
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
        $this->load->view('admin/modal/employee_modal');
        $this->load->view('_lib/footer');
        ?>

        <script>
            function edit(id) {
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/employee/edit",
                    type: "post",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        var baris = '';
                        for (var i = 0; i < data.length; i++) {
                            $('#edit').modal('show');
                            document.getElementById("id").value = '' + data[i].id_karyawan;
                            document.getElementById("nama").value = '' + data[i].nama_karyawan;
                            document.getElementById("username").value = '' + data[i].username;
                            document.getElementById("old").value = '' + data[i].password;
                            document.getElementById("role").value = '' + data[i].status;
                        }
                    }
                });
            }
        </script>