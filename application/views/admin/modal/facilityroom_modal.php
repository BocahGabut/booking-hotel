<div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_save">
                <div class="modal-body ">
                    <div class="form-group">
                        <label>Tipe Kamar</label>
                        <select class=" form-control" name="tipe">
                            <option selected disabled>~~ Silahkan Pilih ~~</option>
                            <?php
                            foreach ($type as $ty) {
                            ?>
                                <option value="<?php echo $ty->id_tipekamar ?>"><?php echo $ty->nama_tipekamar ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
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
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $tr->fasilitas ?></td>
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

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button onclick="save('<?php echo base_url() . 'admin/roomfacility/save' ?>','<?php echo base_url() . 'admin/roomfacility' ?>');" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>