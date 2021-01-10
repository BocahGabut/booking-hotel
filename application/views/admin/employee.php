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
                                        <a data-target="#save" data-toggle="modal" class="mb-6 btn-floating waves-effect waves-light red accent-2">
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
                                                        <th>Nama Karyawan</th>
                                                        <th>Username</th>
                                                        <th>Role</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($gst as $tr) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $tr->nama_karyawan ?></td>
                                                            <td><?php echo $tr->username ?></td>
                                                            <td>
                                                                <?php
                                                                if ($tr->status == "0") {
                                                                    echo "Admin";
                                                                } else {
                                                                    echo "Karyawan";
                                                                }
                                                                ?>
                                                            </td>
                                                            <td>
                                                                <a onclick="edit('<?php echo $tr->id_karyawan ?>')" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-edit"></i>
                                                                    </button>
                                                                </a>
                                                                <a onclick="delete_message('<?php echo $tr->id_karyawan ?>','<?php echo base_url(); ?>admin/employee/delete','<?php echo base_url(); ?>admin/employee')" class="mb-6 btn-floating waves-effect waves-light red accent-2">
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