<footer class="footer">
    <div class="row">
        <div class="col-12 col-sm-6 text-center text-sm-left">
            <p>&copy; Copyright 2019. All rights reserved.</p>
        </div>
        <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
            <p>Hand-crafted made with <i class="fa fa-heart text-danger mx-1"></i> by Potenza</p>
        </div>
    </div>
</footer>
<!-- end footer -->
</div>
<!-- end app-wrap -->
</div>
<script src="<?php echo base_url('assets/template/') ?>js/vendors.js"></script>
<script src="<?php echo base_url('assets/template/') ?>js/app.js"></script>
<script src="<?php echo base_url('assets/template/') ?>js/custom.js"></script>

<script>
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

<script>
    $(document).ready(function() {
        var table = $('#data_table').DataTable({
            responsive: true
        });

        new $.fn.dataTable.FixedHeader(table);
    });

    $(document).ready(function() {
        var table = $('#data_table-1').DataTable({
            responsive: true
        });

        new $.fn.dataTable.FixedHeader(table);
    });

    $(document).ready(function() {
        var table = $('#data_table-2').DataTable({
            responsive: true
        });

        new $.fn.dataTable.FixedHeader(table);
    });
</script>

</body>

</html>