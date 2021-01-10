<aside class="app-navbar">
    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_dark">
        <ul class="metismenu " id="sidebarNav">
            <li class="nav-static-title">Navigation Menu</li>
            <li class="<?php echo $this->uri->segment(2) == 'dashboard' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/dashboard" aria-expanded="false"><i class="nav-icon ti ti ti-dashboard"></i><span class="nav-title">Dashboard</span></a> </li>
            <li class="<?php echo $this->uri->segment(2) == 'room' || $this->uri->segment(2) == 'roomtype' || $this->uri->segment(2) == 'facility' || $this->uri->segment(2) == 'roomfacility' || $this->uri->segment(2) == 'roomrepairment' ? 'active' : ''; ?>">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="fasle">
                    <i class="nav-icon ti ti-layout"></i>
                    <span class="nav-title">Management Kamar</span>
                </a>
                <ul aria-expanded="false">
                    <li class="<?php echo $this->uri->segment(2) == 'room' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/room'>Kamar</a> </li>
                    <li class="<?php echo $this->uri->segment(2) == 'roomtype' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/roomtype'>Tipe Kamar</a> </li>
                    <li class="<?php echo $this->uri->segment(2) == 'facility' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/facility'>Fasilitas</a> </li>
                    <li class="<?php echo $this->uri->segment(2) == 'roomfacility' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/roomfacility'>Fasilitas Kamar</a> </li>
                    <li class="<?php echo $this->uri->segment(2) == 'roomrepairment' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/roomrepairment'>Perbaikan Kamar</a>
                    </li>
                </ul>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'dailyprice' || $this->uri->segment(2) == 'diskonprice' ? 'active' : ''; ?>">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="fasle">
                    <i class="nav-icon ti ti-stats-up"></i>
                    <span class="nav-title">Management Harga</span>
                </a>
                <ul aria-expanded="false">
                    <li class="<?php echo $this->uri->segment(2) == 'dailyprice' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/dailyprice'>Harga</a> </li>
                    <li class="<?php echo $this->uri->segment(2) == 'diskonprice' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/diskonprice'>Diskon</a> </li>
                </ul>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'employee' || $this->uri->segment(2) == 'guest' ? 'active' : ''; ?>">
                <a class="has-arrow" href="javascript:void(0)" aria-expanded="fasle">
                    <i class="nav-icon ti ti-id-badge"></i>
                    <span class="nav-title">Management User</span>
                </a>
                <ul aria-expanded="false">
                    <li class="<?php echo $this->uri->segment(2) == 'guest' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/guest'>Tamu</a> </li>
                    <li class="<?php echo $this->uri->segment(2) == 'employee' ? 'active' : ''; ?>"> <a href='<?php echo base_url(); ?>admin/employee'>Karyawan</a> </li>
                </ul>
            </li>
            <li class="<?php echo $this->uri->segment(2) == 'laporan' ? 'active' : ''; ?>"><a href='<?php echo base_url(); ?>admin/laporan' aria-expanded="false"><i class="nav-icon ti ti ti-bar-chart-alt"></i><span class="nav-title">Laporan</span></a> </li>
            <li class="<?php echo $this->uri->segment(2) == 'pengaturan' ? 'active' : ''; ?>"><a href="<?php echo base_url(); ?>admin/pengaturan" aria-expanded="false"><i class="nav-icon ti ti ti-settings"></i><span class="nav-title">Pengaturan</span></a> </li>
        </ul>
    </div>
    <!-- end sidebar-nav -->
</aside>