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
                        <label>Room Name</label>
                        <input type="text" readonly id="id" name="id" class="form-control" hidden>
                        <select class="form-control" name="room" id="room" disabled selected>
                            <option disabled selected>~~ Please Selected ~~</option>
                            <?php
                            foreach ($room as $typ) {
                            ?>
                                <option value="<?php echo $typ->id_kamar ?>"><?php echo $typ->nomor_kamar ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <label>Date</label>
                    <div class="input-group" data-date="23/11/2018" data-date-format="hh/bb/tttt">
                        <input type="date" class="form-control" name="from" id="from">
                        <span class="input-group-addon">To</span>
                        <input class="form-control" type="date" name="to" id="to">
                    </div>
                    <div class="form-group">
                        <label>Note</label>
                        <textarea name="note" class="form-control" id="note"></textarea>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button onclick="update('<?php echo base_url() . 'admin/roomrepairment/update' ?>','<?php echo base_url() . 'admin/roomrepairment' ?>');" class="btn btn-success">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>
</div>