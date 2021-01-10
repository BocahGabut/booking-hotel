<div class="modal fade" id="save" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_save">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Tipe Kamar</label>
                        <select class="js-basic-single form-control" name="type">
                            <option disabled selected>~~ Please Selected ~~</option>
                            <?php
                            foreach ($type as $typ) {
                            ?>
                                <option value="<?php echo $typ->id_tipekamar ?>"><?php echo $typ->nama_tipekamar ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div>
                        <div class="form-group">
                            <label>Harga Kamar</label>
                            <input type="number" name="price" class="form-control" required="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Pajak Kamar</label>
                        <input type="number" name="pajak" class="form-control" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button onclick="save('<?php echo base_url() . 'admin/dailyprice/save' ?>','<?php echo base_url() . 'admin/dailyprice' ?>');" class="btn btn-success">Save</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_update">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Tipe Kamar</label>
                        <select class="js-basic-single form-control" id="type" name="type">
                            <option disabled selected>~~ Please Selected ~~</option>
                            <?php
                            foreach ($type as $typ) {
                            ?>
                                <option value="<?php echo $typ->id_tipekamar ?>"><?php echo $typ->nama_tipekamar ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Kamar</label>
                        <input id="id" type="text" name="id" class="form-control" readonly hidden required="">
                        <input id="harga" type="number" name="price" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Pajak Kamar</label>
                        <input type="number" id="pajak" name="pajak" class="form-control" required="">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button onclick="update('<?php echo base_url() . 'admin/dailyprice/update' ?>','<?php echo base_url() . 'admin/dailyprice' ?>');" class="btn btn-success">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>