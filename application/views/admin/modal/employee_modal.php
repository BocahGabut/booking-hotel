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
                        <label>Nama Karyawan</label>
                        <input type="text" name="nama" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" name="username" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class=" form-control" name="status">
                            <option value="" disabled selected>~~ Silahkan Pilih ~~</option>
                            <option value="0">Admin</option>
                            <option value="1">Karyawan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button onclick="save('<?php echo base_url() . 'admin/employee/save' ?>','<?php echo base_url() . 'admin/employee' ?>');" class="btn btn-success">Save</button>
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
                        <label>Nama Karyawan</label>
                        <input type="text" readonly hidden id="id" name="id" class="form-control" required="">
                        <input type="text" id="nama" name="nama" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <input type="text" id="username" name="username" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control" required="">
                        <input type="password" readonly hidden id="old" name="old_password" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label>Role</label>
                        <select class=" form-control" id="role" name="status">
                            <option value="" disabled selected>~~ Silahkan Pilih ~~</option>
                            <option value="0">Admin</option>
                            <option value="1">Karyawan</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    <button onclick="update('<?php echo base_url() . 'admin/employee/update' ?>','<?php echo base_url() . 'admin/employee' ?>');" class="btn btn-success">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>