<script src="<?php echo base_url(); ?>assets/book/vendors/js/vendors.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/vendors/js/ui/jquery.sticky.js"></script>
<script src="<?php echo base_url(); ?>assets/book/js/core/app-menu.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/js/core/app.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/js/scripts/components.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/js/scripts/customizer.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/js/scripts/footer.min.js"></script>

<script src="<?php echo base_url(); ?>assets/book/vendors/js/tables/datatable/pdfmake.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/vendors/js/tables/datatable/vfs_fonts.js"></script>
<script src="<?php echo base_url(); ?>assets/book/vendors/js/tables/datatable/datatables.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/vendors/js/tables/datatable/datatables.buttons.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/vendors/js/tables/datatable/buttons.html5.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/vendors/js/tables/datatable/buttons.print.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/vendors/js/tables/datatable/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/vendors/js/tables/datatable/datatables.bootstrap4.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/js/scripts/datatables/datatable.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/js/scripts/modal/components-modal.min.js"></script>


<script src="<?php echo base_url(); ?>assets/book/js/scripts/rupiah.js"></script>
<script src="<?php echo base_url(); ?>assets/book/js/scripts/live-search.js"></script>

<script src="<?php echo base_url(); ?>assets/book/vendors/js/forms/spinner/jquery.bootstrap-touchspin.js"></script>
<script src="<?php echo base_url('assets/template/') ?>js/custom.js"></script>


<script src="<?php echo base_url(); ?>assets/book/js/scripts/extensions/sweet-alerts.min.js"></script>
<script src="<?php echo base_url(); ?>assets/book/vendors/js/extensions/sweetalert2.all.min.js"></script>


<script src='<?php echo base_url(); ?>assets/packages/core/main.js'></script>
<script src='<?php echo base_url(); ?>assets/packages/interaction/main.js'></script>
<script src='<?php echo base_url(); ?>assets/packages/daygrid/main.js'></script>
<script src='<?php echo base_url(); ?>assets/packages/timegrid/main.js'></script>
<script src='<?php echo base_url(); ?>assets/packages/list/main.js'></script>

<script>
    function goBack() {
        window.history.back()
    }
</script>

<script>
    $(document).ready(function() {
        var table = $('#data_table1').DataTable({
            responsive: true
        });

        new $.fn.dataTable.FixedHeader(table);
    });
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var date_now = Date.now();

        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
            height: 'parent',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth' //,timeGridWeek,timeGridDay,listWeek'
            },
            defaultView: 'dayGridMonth',
            defaultDate: date_now,
            navLinks: false, // can click day/week names to navigate views
            editable: false,
            eventLimit: false, // allow "more" link when too many events
            events: 'booking/load',
        });

        calendar.render();
    });
</script>