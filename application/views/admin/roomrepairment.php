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
                            <div class="col-md-12 m-b-15">
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
                        <br>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="card-body">
                                        <form id="form_save">
                                            <div class="form-group">
                                                <label>Nomor Kamar</label>
                                                <select class="js-basic-single form-control" name="room">
                                                    <option disabled selected>~~ Please Selected ~~</option>
                                                    <?php
                                                    foreach ($room as $typ) {
                                                    ?>
                                                        <option value="<?php echo $typ->id_kamar ?>"><?php echo $typ->nomor_kamar ?></option>
                                                    <?php } ?>
                                                </select>

                                            </div>
                                            <label>Tanggal</label>
                                            <div class="input-group" data-date="23/11/2018" data-date-format="hh/bb/tttt">
                                                <input type="date" class="form-control" name="from">
                                                <span class="input-group-addon">To</span>
                                                <input class="form-control" type="date" name="to">
                                            </div>
                                            <br>
                                            <div class="form-group">
                                                <label>Catatan</label>
                                                <textarea name="note" class="form-control"></textarea>
                                            </div>
                                            <div class="float-right">
                                                <button onclick="save('<?php echo base_url() . 'admin/roomrepairment/save' ?>','<?php echo base_url() . 'admin/roomrepairment' ?>');" class="btn btn-success">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="card card-statistics">
                                    <div class="card-header">
                                        <h4>Data Kamar</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="datatable-wrapper table-responsive">
                                            <table id="data_table" class="display compact table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nomer Kamar</th>
                                                        <th>Tgl Perbaikan</th>
                                                        <th>Catatan</th>
                                                        <th>Status</th>
                                                        <th>Karywan</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $no = 1;
                                                    foreach ($repair as $tr) { ?>
                                                        <tr>
                                                            <td><?php echo $no++ ?></td>
                                                            <td><?php echo $tr->nomor_kamar ?></td>
                                                            <td><?php echo $tr->tgl_mulai . ' -> ' . $tr->tgl_mulai ?></td>
                                                            <td><?php echo $tr->catatan ?></td>
                                                            <td>Perbaikan</td>
                                                            <td><?php echo $tr->id_karyawan ?></td>
                                                            <td>

                                                                <a onclick="edit('<?php echo $tr->id_perbaikan ?>')" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                                                    <button type="button" data-toggle="tooltip" data-placement="top" title="Edit" class="btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-edit"></i>
                                                                    </button>
                                                                </a>
                                                                <a onclick="delete_message('<?php echo $tr->id_perbaikan ?>','<?php echo base_url(); ?>admin/roomrepairment/delete','<?php echo base_url(); ?>admin/roomrepairment')" class="mb-6 btn-floating waves-effect waves-light red accent-2">
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
        $this->load->view('admin/modal/repairment_modal');
        $this->load->view('_lib/footer');
        ?>
        <script type="text/javascript">
            $(document).ready(function() {
                $('.js-basic-single').select2();
                //$('.js-basic-single').select2({
                // dropdownParent: $('#collapse3-1')
                //});
            });
        </script>
        <script>
            function edit(id) {
                $.ajax({
                    url: "<?php echo base_url(); ?>admin/roomrepairment/edit",
                    type: "post",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        var baris = '';
                        for (var i = 0; i < data.length; i++) {
                            $('#edit').modal('show');
                            document.getElementById("id").value = '' + data[i].id_perbaikan;
                            document.getElementById("room").value = '' + data[i].id_kamar;
                            document.getElementById("from").value = '' + data[i].tgl_mulai;
                            document.getElementById("to").value = '' + data[i].tgl_selesai;
                            document.getElementById("note").value = '' + data[i].catatan;
                        }
                    }
                });
            }
        </script>