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
                                            <button onclick="window.history.back();" type="button" data-toggle="tooltip" data-placement="top" title="Kembali" class="btn btn-icon btn-info mr-1 mb-1"><i class="fa fa-mail-reply-all"></i>
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
                                        <?php
                                        foreach ($factroom as $fctr) { ?>
                                            <form id="form_save">
                                                <div class="modal-body ">
                                                    <div class="form-group">
                                                        <label>Tipe Kamar</label>
                                                        <select class=" form-control" name="tipe">
                                                            <option value="<?php echo $fctr->tipekamar ?>"><?php echo $fctr->nama_tipekamar . ' (Selected)' ?></option>
                                                            <?php
                                                            foreach ($type as $ty) {
                                                            ?>
                                                                <option value="<?php echo $ty->id_tipekamar ?>"><?php echo $ty->nama_tipekamar ?></option>
                                                            <?php
                                                            }
                                                            ?>
                                                        </select>
                                                    </div>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-6">
                                                            <label>Fasilitas Tersedia</label>
                                                            <div class="datatable-wrapper table-responsive">
                                                                <table id="data_table-1" class="display compact table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Fasilitas</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php
                                                                        $no = 1;
                                                                        foreach ($fact as $tr) { ?>
                                                                            <tr>
                                                                                <td><?php echo $no++ ?></td>
                                                                                <td><?php echo $tr->nama_fasilitas ?></td>
                                                                                <td>
                                                                                    <button onclick="add_cart('<?php echo $tr->id_fasilitas ?>','<?php echo $tr->nama_fasilitas ?>');" data-toggle="tooltip" data-placement="top" title="Tambah" type="button" class="btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-plus"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        <div class="col-6">
                                                            <label>Detail Fasilitas</label>
                                                            <div class="datatable-wrapper table-responsive">
                                                                <table id="data_table-2" class="display compact table table-striped table-bordered">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>No</th>
                                                                            <th>Fasilitas</th>
                                                                            <th>Jumlah Fasilitas</th>
                                                                            <th>Action</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody id="detail_fas">
                                                                        <?php
                                                                        $no = 1;
                                                                        foreach ($this->cart->contents() as $has) {
                                                                        ?>
                                                                            <tr>
                                                                                <td><?php echo $no++ ?></td>
                                                                                <td><?php echo $has['name'] ?></td>
                                                                                <td><input class="form-control" id="row_qty" typ="number" value="<?php echo $has['qty'] ?>"></input></td>
                                                                                <td>
                                                                                    <button data-toggle="tooltip" data-placement="top" title="Update" type="button" onclick="' . $onclick . '" class=" btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-minus"></i>
                                                                                    </button>
                                                                                    <button data-toggle="tooltip" data-placement="top" title="Remove" type="button" onclick="remove_cart('<?php echo $has['rowid'] ?>','<?php echo base_url() . 'admin/roomfacility/edit/' . $fctr->tipekamar ?>');" class=" btn btn-icon btn-danger mr-1 mb-1"><i class="fa fa-close"></i>
                                                                                    </button>
                                                                                </td>
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div style="float: right">
                                                    <button onclick="save('<?php echo base_url() . 'admin/roomfacility/save' ?>','<?php echo base_url() . 'admin/roomfacility' ?>');" class="btn btn-success">Update</button>
                                                </div>
                                            </form>
                                        <?php } ?>
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
                function add_cart(id, fasilitas) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>admin/roomfacility/add_cart",
                        type: "post",
                        data: {
                            id: id,
                            fasilitas: fasilitas
                        },
                        dataType: 'json',
                        success: function(data) {
                            window.location = url
                        }
                    });
                };

                function remove_cart(id, url) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>admin/roomfacility/edit_remove",
                        type: "post",
                        data: {
                            id: id,
                        },
                        dataType: 'json',
                        success: function(data) {
                            window.location = url
                        }
                    });
                };

                function update_cart(id, qty) {
                    $.ajax({
                        url: "<?php echo base_url(); ?>admin/roomfacility/update_cart",
                        type: "post",
                        data: {
                            id: id,
                            qty: qty,
                        },
                        dataType: 'json',
                        success: function(data) {
                            //console.log(id);
                            $('#detail_fas').html(data);
                        }
                    });
                };
            </script>

            <?php
            $this->load->view('_lib/footer');
            ?>