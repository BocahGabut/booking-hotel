<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('booking/_lib/header');
?>

<body class="horizontal-layout horizontal-menu 2-columns  navbar-floating footer-static " data-open="hover" data-menu="horizontal-menu" data-col="4-columns">
    <div class="content">
        <div class="content-wrapper">
            <div class="content-body">
                <div class="row">
                    <div class="col-8">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Booking</h5>
                                    <a onclick="logout_message()" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                        <button data-toggle="tooltip" data-placement="top" title="Logout" type="button" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1"><i class="fa fa-sign-out"></i></button>
                                    </a>
                                    <?php echo $this->session->flashdata('pesan') ?>
                                </div>
                                <div class="card-content">
                                    <div class="card-body card-dashboard" style="height: 590px;">
                                        <form action="<?php echo base_url() . 'booking/booking/submit' ?>" method="POST">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Cari Tamu</label>
                                                        <input onkeyup="cari(this);" type="text" id="kode" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="col-8">
                                                    <div class="form-group">
                                                        <label>Nama Tamu -> email</label>
                                                        <input hidden readonly type="text" name="id_penghuni" id="id_penghuni" class="form-control" required="">
                                                        <input readonly type="text" id="nama_penghuni" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="col-1">
                                                    <div class="mt-2 mb-1">
                                                        <a data-target="#tamu" data-toggle="modal" class=" btn-floating waves-effect waves-light red accent-2">
                                                            <button data-toggle="tooltip" data-placement="top" title="Add Tamu" type="button" class="btn btn-icon btn-icon rounded-circle btn-warning mr-1 mb-1"><i class="fa fa-plus"></i></button>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Nomor Kamar</label>
                                                        <input type="text" id="nomor_kamar" class="form-control" onkeyup="kamar('<?php echo date('y-m-d h:i:s') ?>');">
                                                        <input type="text" readonly required hidden id="id_kamar" name="id_kamar" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Check In</label>
                                                        <input type="date" name="checkin" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Lama Tinggal</label>
                                                        <input onkeyup="hitung();" type="number" name="tinggal" id="tinggal" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>Detail Fasilitas</h5>
                                            <div style="height: 140px;">
                                                <div style="overflow: auto; height: 150px">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover-animation mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>Nama Fasilitas</th>
                                                                    <th>Qty</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="table">

                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h5>Detail Transaksi</h5>
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>Harga Kamar (Rp.)</label>
                                                        <input readonly type="number" id="harga" name="" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="col-4">
                                                    <div class="form-group">
                                                        <label>Pajak (%)</label>
                                                        <input readonly type="number" id="pajak" name="" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="col-3">
                                                    <div class="form-group">
                                                        <label>Diskon (%)</label>
                                                        <input readonly type="number" id="diskon" name="diskon" class="form-control" required="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>Total Harga (Rp)</label>
                                                        <input readonly type="number" id="total" name="total" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="col-5">
                                                    <div class="form-group">
                                                        <label>Total Bayar (Rp)</label>
                                                        <input readonly type="number" id="bayar" name="bayar" class="form-control" required="">
                                                    </div>
                                                </div>
                                                <div class="col-2 mt-2 mb-1">
                                                    <div style="float: left">
                                                        <button type="submit" class="btn btn-success">Submit</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div>
                            <div class="card">
                                <div class="card-header">
                                    <h5>Menu</h5>

                                    <center>
                                        <div class="card-content">
                                            <div class="card-body card-dashboard">
                                                <div class="row">
                                                    <div class="col-12 ">
                                                        <center>
                                                            <a data-target="#modal_calender" data-toggle="modal">
                                                                <button class="btn btn-primary" style="width: 100%">Check Tanggal Booking</button>
                                                            </a>
                                                        </center>
                                                    </div>
                                                </div>
                                                <center>
                                                    <div class="row">
                                                        <div class="col-12  mt-1 mb-1">
                                                            <a data-target="#pembayaran" data-toggle="modal">
                                                                <button class="btn btn-warning" style="width: 100%">Pembayaran</button>
                                                            </a>
                                                        </div>
                                                        <div class="col-12  mt-1 mb-1">
                                                            <a data-target="#checkin" data-toggle="modal">
                                                                <button class="btn btn-success" style="width: 100%">Check In</button>
                                                            </a>
                                                        </div>

                                                    </div>
                                                </center>
                                            </div>
                                        </div>
                                    </center>
                                </div>
                            </div>
                            <div>
                                <div class="card" style="height: 390px; ">
                                    <div class="card-header">
                                        <h4 class="card-title">Floor Map</h4>
                                    </div>
                                    <div class="card-content">
                                        <div style="height: 310px;">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="col-11 ml-1 mr-1">
                                                        <div class="form-group">
                                                            <label>Lantai</label>
                                                            <select class=" form-control" id="lantai" name="tipe">
                                                                <option selected disabled>~~ Silahkan Pilih ~~</option>
                                                                <?php
                                                                foreach ($floor as $ty) {
                                                                ?>
                                                                    <option value="<?php echo $ty->lantai ?>"><?php echo $ty->lantai ?></option>
                                                                <?php
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div style="height: 200px">
                                                        <div id="detail_lantai" style="overflow: auto; height: 205px; width: 100%">

                                                        </div>
                                                    </div>
                                                    <div class="ml-1 mb-1 mt-1">
                                                        <center>
                                                            <h5>Keterangan :</h5>
                                                            <div class="badge badge-success badge-md mr-1 mb-1"> Tersedia </div>
                                                            <div class="badge badge-blue badge-md mr-1 mb-1"> Di Tempati </div>
                                                            <div class="badge badge-danger badge-md mr-1 mb-1"> Perbaikan </div>
                                                        </center>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $this->load->view('booking/modal/modal');
        $this->load->view('booking/_lib/footer');
        ?>

        <script>
            function cari() {
                var id = document.getElementById("kode").value;
                $.ajax({
                    url: "<?php echo base_url(); ?>booking/booking/get_tamu",
                    type: "post",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        var baris = '';
                        if (id.length < 1) {
                            document.getElementById("nama").value = '';
                        } else {
                            for (var i = 0; i < data.length; i++) {
                                if (data.length > 0) {
                                    document.getElementById("id_penghuni").value = '' + data[i].id_penghuni;
                                    document.getElementById("nama_penghuni").value = '' + data[i].nama_penghuni + ' -> ' + data[i].email;
                                } else {

                                }
                            }
                        }
                    }
                });
            }

            function hitung() {
                var a = document.getElementById("tinggal").value;
                var b = document.getElementById("total").value;
                var result = parseFloat(b) * parseFloat(a);
                if (!isNaN(result)) {
                    document.getElementById('bayar').value = result;
                }
            }

            function kembalian() {
                var a = document.getElementById("pmb_pmb").value;
                var b = document.getElementById("pmb_jml").value;
                var result = parseFloat(b) - parseFloat(a);
                if (!isNaN(result)) {
                    document.getElementById('pmb_kmb').value = result;
                }
            }

            function status(id, status, pesan) {
                $.ajax({
                    url: "<?php echo base_url(); ?>booking/booking/status",
                    type: "post",
                    data: {
                        id: id,
                        status: status
                    },
                    dataType: 'json',
                    success: function(data) {
                        Swal.fire({
                            type: "success",
                            title: "Success!",
                            text: pesan + " Success",
                            confirmButtonClass: "btn btn-success"
                        }).then(function(t) {
                            window.location.href = "<?php echo base_url(); ?>booking/booking";
                        });
                    }
                });
            };

            function transaksi() {
                var id = document.getElementById("pmb_cari").value;
                $.ajax({
                    url: "<?php echo base_url(); ?>booking/booking/get_check",
                    type: "post",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        var baris = '';
                        if (id.length < 1) {
                            document.getElementById("pmb_nama").value = '';
                            document.getElementById("pmb_pmb").value = '';
                            document.getElementById("pmb_id").value = '';
                            document.getElementById("pmb_nokmr").value = '';
                            document.getElementById("pmb_tpkmr").value = '';
                            document.getElementById("pmb_hrg").value = '';
                            document.getElementById("pmb_kmr").value = '';
                        } else {
                            for (var i = 0; i < data.length; i++) {
                                if (data.length > 0) {
                                    document.getElementById("pmb_nama").value = '' + data[i].nama_penghuni + ' -> ' + data[i].email + ' -> ' + data[i].nomor_kamar;
                                    document.getElementById("pmb_pmb").value = '' + data[i].total_bayar;
                                    document.getElementById("pmb_id").value = '' + data[i].id_booking;
                                    document.getElementById("pmb_nokmr").value = '' + data[i].nomor_kamar;
                                    document.getElementById("pmb_tpkmr").value = '' + data[i].nama_tipekamar;
                                    document.getElementById("pmb_hrg").value = '' + data[i].harga_kamar;
                                    document.getElementById("pmb_dsk").value = '' + data[i].diskon + '%';
                                    document.getElementById("pmb_lama").value = '' + data[i].lama_tinggal + ' Malam';
                                    document.getElementById("pmb_kmr").value = '' + data[i].id_kamar;
                                } else {

                                }
                            }
                        }
                    }
                });
            }

            function kamar(tgl) {
                var id = document.getElementById("nomor_kamar").value;
                $.ajax({
                    url: "<?php echo base_url(); ?>booking/booking/get_kamar",
                    type: "post",
                    data: {
                        id: id
                    },
                    dataType: 'json',
                    success: function(data) {
                        var baris = '';
                        if (id.length < 1) {

                        } else {
                            for (var i = 0; i < data.length; i++) {
                                var pph = data[i].pajak / 100 * data[i].harga_kamar;
                                var diskon = document.getElementById("diskon").value / 100 * data[i].harga_kamar;
                                var total = data[i].harga_kamar - diskon + pph;

                                if (data.length > 0) {
                                    document.getElementById("harga").value = '' + data[i].harga_kamar;
                                    if (tgl >= data[i].tgl_mulai && tgl <= data[i].tgl_selesai) {
                                        document.getElementById("diskon").value = '' + data[i].persentase;
                                    } else {
                                        document.getElementById("diskon").value = '' + 0;
                                    }
                                    document.getElementById("pajak").value = '' + data[i].pajak;
                                    document.getElementById("id_kamar").value = '' + data[i].id_kamar;
                                    document.getElementById("total").value = '' + total;
                                    //var b = 1;
                                    var table_data = data[i];
                                    for (var a = 0; a < data.length; a++) {
                                        if (a > 0 && id.length >= 4) {
                                            document.getElementById("table").innerHTML +=
                                                '<tr>' +
                                                '<td>' + data[i].nama_fasilitas + '</td>' +
                                                '<td>' + data[i].jumlah_fasilitas + '</td>' +
                                                '</tr>';
                                            //a = 0;
                                        }
                                        document.getElementById("table").remove +=
                                            '<tr>' +
                                            '<td>' + data[i].nama_fasilitas + '</td>' +
                                            '<td>' + data[i].jumlah_fasilitas + '</td>' +
                                            '</tr>';

                                    }
                                } else {
                                    document.getElementById("table").remove +=
                                        '<tr>' +
                                        '<td>' + data[i].nama_fasilitas + '</td>' +
                                        '<td>' + data[i].jumlah_fasilitas + '</td>' +
                                        '</tr>';
                                }
                            }
                        }
                    }
                });
            }

            function bayar(url, target) {
                event.preventDefault();
                $.ajax({
                    url: url,
                    data: $('#form_bayar').serialize(),
                    type: "post",
                    async: false,
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            type: "success",
                            title: "Success!",
                            text: "Pembayaran Success Dilakukan",
                            confirmButtonClass: "btn btn-success"
                        }).then(function(t) {
                            $('#pembayaran').modal('hide');
                            $('#modal_struck').modal('show');
                            document.getElementById("no_faktur").innerText = 'No Faktur ' + '#' + document.getElementById("pmb_id").value;
                            document.getElementById("struck_bayar").innerText = document.getElementById("pmb_jml").value;
                            document.getElementById("struck_sub").innerText = document.getElementById("pmb_pmb").value;
                            document.getElementById("struck_kmb").innerText = document.getElementById("pmb_kmb").value;
                            document.getElementById("struck_nokmr").innerText = document.getElementById("pmb_nokmr").value;
                            document.getElementById("struck_tp").innerText = document.getElementById("pmb_tpkmr").value;
                            document.getElementById("struck_harga").innerText = document.getElementById("pmb_hrg").value;
                            document.getElementById("struck_lama_hinap").innerText = document.getElementById("pmb_lama").value;
                            document.getElementById("struck_dsk").innerText = document.getElementById("pmb_dsk").value;
                        });
                    }
                });
            }

            function print_struck(divName) {
                var printContents = document.getElementById(divName).innerHTML;
                //var awal_content = document.getElementById(awal).innerHTML;
                var originalContents = document.body.innerHTML;
                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;
                location.reload();
            }

            function logout_message() {
                event.preventDefault();
                Swal.fire({
                    title: "Anda Yakin ?",
                    text: "Akan Logout ???",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, Logout!",
                    confirmButtonClass: "btn btn-primary",
                    cancelButtonClass: "btn btn-danger ml-1",
                    buttonsStyling: !1
                }).then(function(t) {
                    t.value ? Swal.fire({
                            type: "success",
                            text: "Logout Baerhasil :)",
                            confirmButtonClass: "btn btn-success"
                        }).then(function(succ) {
                            window.location.href = "<?php echo base_url(); ?>booking/booking/logout";
                        }) :
                        t.dismiss === Swal.DismissReason.cancel && Swal.fire({
                            title: "Cancelled",
                            text: "Logout Gagal :)",
                            type: "error",
                            confirmButtonClass: "btn btn-success"
                        })
                })
            };
        </script>