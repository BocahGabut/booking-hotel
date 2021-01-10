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
            <div class="checkbox checbox-switch switch-primary">
              <label>
                <input type="checkbox" name="switch" onclick="showhide(this);" id="switch" />
                <span></span>
                Range Nomer Kamar
              </label>
            </div>
          </div>
          <div class="form-group" id="single">
            <label>Nomer Kamar</label>
            <input type="text" name="nomor_kamar" class="form-control">
          </div>
          <div class="row">
            <div class="form-group col-2" style="display: none" id="nomer">
              <label>Nomer Kamar</label>
              <input type="text" name="nomor" class="form-control">
            </div>
            <div class="form-group col-5" style="display: none" id="from">
              <label>From</label>
              <input type="number" value="0" name="from" class="form-control">
            </div>
            <div class="form-group col-5" style="display: none" id="to">
              <label>To</label>
              <input type="number" value="0" name="to" class="form-control">
            </div>
          </div>
          <div class="form-group">
            <label>Lantai Kamar</label>
            <input type="number" name="lantai" class="form-control" required="">
          </div>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button onclick="save('<?php echo base_url() . 'admin/room/save' ?>','<?php echo base_url() . 'admin/room' ?>');" class="btn btn-success">Save</button>
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
          <div class="form-group" id="single">
            <label>Nomer Kamar</label>
            <input type="text" name="id_kamar" id="id_kamar" class="form-control" readonly hidden>
            <input type="text" name="nomor_kamar" id="nomor_kamar" class="form-control" readonly>
          </div>
          <div class="form-group">
            <label>Lantai Kamar</label>
            <input type="number" name="lantai" id="lantai" class="form-control" required="">
          </div>
          <div class="form-group">
            <label>Tipe Kamar</label>
            <select class=" form-control" id="tipe" name="tipe">
              <?php
              foreach ($type as $ty) {
              ?>
                <option value="<?php echo $ty->id_tipekamar ?>"><?php echo $ty->nama_tipekamar ?></option>
              <?php
              }
              ?>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button onclick="update('<?php echo base_url() . 'admin/room/update' ?>','<?php echo base_url() . 'admin/room' ?>');" class="btn btn-success">Update</button>
        </div>
      </form>
    </div>
  </div>
</div>