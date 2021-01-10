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
                <div class="modal-body ">
                    <div class="form-group">
                        <label>Nama Fasilitas</label>
                        <input type="text" name="fasilitas" class="form-control" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button onclick="save('<?php echo base_url() . 'admin/facility/save' ?>','<?php echo base_url() . 'admin/facility' ?>');" class="btn btn-success">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="form_update">
                <div class="modal-body ">
                    <div class="form-group">
                        <label>Nama Fasilitas</label>
                        <input type="text" name="id" id="id_fasilitas" class="form-control" required="" readonly hidden>
                        <input type="text" name="fasilitas" id="nama_fasilitas" class="form-control" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button onclick="update('<?php echo base_url() . 'admin/facility/update' ?>','<?php echo base_url() . 'admin/facility' ?>');" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>