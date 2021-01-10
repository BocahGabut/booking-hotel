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
                        <label>Nomor Ktp</label>
                        <input type="number" name="ktp" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Nama Penghuni</label>
                        <input type="text" name="nama" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Nomor Hp</label>
                        <input type="number" name="hp" class="form-control" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button onclick="save('<?php echo base_url() . 'admin/guest/save' ?>','<?php echo base_url() . 'admin/guest' ?>');" class="btn btn-success">Save</button>
                </div>
            </form>
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
                <div class="modal-body ">
                    <div class="form-group">
                        <label>Nomor Ktp</label>
                        <input type="number" id="ktp" name="ktp" class="form-control" required="">
                        <input type="number" readonly required hidden id="id" name="id" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Nama Penghuni</label>
                        <input type="text" id="nama" name="nama" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="email" id="email" name="email" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Nomor Hp</label>
                        <input type="number" id="hp" name="hp" class="form-control" required="">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button onclick="update('<?php echo base_url() . 'admin/guest/update' ?>','<?php echo base_url() . 'admin/guest' ?>');" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>