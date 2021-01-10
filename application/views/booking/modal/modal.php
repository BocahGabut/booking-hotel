<div class="modal fade text-left" id="tamu" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Data Tamu</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_save">
                <div class="modal-body">
                    <label>Nomor KTP</label>
                    <div class="form-group">
                        <input type="number" required class="form-control" name="tmu_noktp">
                    </div>
                    <label>Nama Penghuni</label>
                    <div class="form-group">
                        <input type="text" required class="form-control" name="tmu_nama">
                    </div>
                    <label>No Hp</label>
                    <div class="form-group">
                        <input type="number" required name="tmu_nomor" class="form-control">
                    </div>
                    <label>Email</label>
                    <div class="form-group">
                        <input type="email" required name="tmu_email" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button onclick="save('<?php echo base_url() . 'booking/booking/add_tamu' ?>','<?php echo base_url() . 'booking/booking' ?>');" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="modal_calender" tabindex="-1" role="dialog" aria-labelledby="myModalLabel16" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel16">Data Booking</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id='calendar-container' style="padding: 10px;">
                    <div id='calendar'></div>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="checkin" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Check IN</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="datatable-wrapper table-responsive">
                    <table id="data_table1" class="display compact table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Penghuni</th>
                                <th>Nomor Kamar</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            foreach ($check as $tr) { ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $tr->nama_penghuni ?></td>
                                    <td><?php echo $tr->nomor_kamar ?></td>
                                    <td>
                                        <?php
                                        if ($tr->status == "CK") {
                                            echo "Check Out";
                                        } else if ($tr->status == "I") {
                                            echo "Check In";
                                        } else if ($tr->status == "C") {
                                            echo "Cancel";
                                        } else if ($tr->status == "B") {
                                            echo "Booking";
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <a onclick="status('<?php echo $tr->id_booking ?>','I','Check In')" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                            <button type="button" data-toggle="tooltip" data-placement="top" title="Check In" class="btn btn-icon btn-success mr-1 mb-1"><i class="fa fa-edit"></i>
                                            </button>
                                        </a>
                                        <a onclick="status('<?php echo $tr->id_booking ?>','C','Cancel')" class="mb-6 btn-floating waves-effect waves-light red accent-2">
                                            <button data-toggle="tooltip" data-placement="top" title="Cancel" type="button" class="btn btn-icon btn-danger mr-1 mb-1"><i class="fa fa-trash"></i>
                                            </button>
                                        </a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">

            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="pembayaran" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Pembayaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_bayar">
                <div class="modal-body">
                    <label>Cari Data Penghuni</label>
                    <div class="form-group">
                        <input type="text" onkeyup="transaksi();" required class="form-control" id="pmb_cari">
                    </div>
                    <label>Nama Penghuni -> Email -> Nomor Kamar</label>
                    <div class="form-group">
                        <input type="text" required readonly class="form-control" id="pmb_nama" name="nama">
                        <input type="text" required hidden readonly class="form-control" id="pmb_id" name="id">
                    </div>
                    <label>Total Pembayaran (Rp.)</label>
                    <div class="form-group">
                        <input type="number" readonly required id="pmb_pmb" name="pembayaran" class="form-control">
                    </div>
                    <label>Jumlah Bayar (Rp.)</label>
                    <div class="form-group">
                        <input type="number" required onkeyup="kembalian();" id="pmb_jml" name="jml_bayar" class="form-control">
                    </div>
                    <label>Kembalian (Rp.)</label>
                    <div class="form-group">
                        <input type="number" readonly required id="pmb_kmb" name="nomor" class="form-control">
                        <input type="text" readonly hidden id="pmb_nokmr" class="form-control">
                        <input type="text" readonly hidden id="pmb_tpkmr" class="form-control">
                        <input type="text" readonly hidden id="pmb_hrg" class="form-control">
                        <input type="text" readonly hidden id="pmb_lama" class="form-control">
                        <input type="text" readonly hidden id="pmb_dsk" class="form-control">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                    <button onclick="bayar('<?php echo base_url() . 'booking/booking/bayar' ?>','<?php echo base_url() . 'booking/booking' ?>');" type="button" class="btn btn-success">Bayar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade text-left" id="modal_struck" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Print Preview</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="print_this">
                <?php
                foreach ($option as $opt) {
                ?>
                    <center>
                        <h5><?php echo $opt->nama_hotel ?></h5>
                        <h6><?php echo  $opt->alamat ?></h6>
                        <h6><?php echo 'Tlpn ' . $opt->no_tlpn ?></h6>
                        <h6 id="no_faktur"></h6>
                    </center>
                    <div style="border-style: dashed; border-width: 0.5px; border-color:black;" class="mb-1 mt-2">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="ml-2">Time </h6>
                        </div>
                        <div class="col-6">
                            <h6 class="ml-4"><?php date_default_timezone_set('asia/jakarta');
                                                $time = time();
                                                echo date('Y/m/d H:i:s', $time) ?></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="ml-2">Kasir </h6>
                        </div>
                        <div class="col-6">
                            <h6 class="ml-4">Restu Maulana</h6>
                        </div>
                    </div>
                    <div class="mt-2 mb-1" style="border-style: dashed; border-width: 0.5px; border-color:black;">
                    </div>
                    <div class="row ml-1 mr-1">
                        <div class="col-4">
                            <h6>Nomor Kamar</h6>
                        </div>
                        <div class="col-3">
                            <h6>Tipe Kamar</h6>
                        </div>
                        <div class="col-5">
                            <h6>Harga Per Malam</h6>
                        </div>
                        <br>
                        <div class="col-4">
                            <label id="struck_nokmr"></label>
                        </div>
                        <div class="col-3">
                            <label id="struck_tp"></label>
                        </div>
                        <div class="col-5">
                            <label id="struck_harga"></label>
                            <label> X </label>
                            <label id="struck_lama_hinap"></label>
                        </div>
                    </div>
                    <div class="mt-1 mb-1" style="border-style: dashed; border-width: 0.5px; border-color:black;">
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="ml-2">Subtotal </h6>
                        </div>
                        <div class="col-6">
                            <h6 class="ml-4" id="struck_sub"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="ml-2">Diskon </h6>
                        </div>
                        <div class="col-6">
                            <h6 class="ml-4" id="struck_dsk"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="ml-2">Bayar </h6>
                        </div>
                        <div class="col-6">
                            <h6 class="ml-4" id="struck_bayar"></h6>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <h6 class="ml-2">Kembalian </h6>
                        </div>
                        <div class="col-6">
                            <h6 class="ml-4" id="struck_kmb"></h6>
                        </div>
                    </div>
                    <div style="border-style: dashed; border-width: 0.5px; border-color:black;" class="mb-1 mt-2">
                    </div>
                    <center class="mt-1">
                        <h5><?php echo $opt->salam ?></h5>
                    </center>
                <?php } ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
                <button OnClick="print_struck('print_this')" type="button" class="btn btn-success">Print</button>
            </div>
        </div>
    </div>
</div>