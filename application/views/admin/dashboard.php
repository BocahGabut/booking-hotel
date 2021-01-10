<?php
defined('BASEPATH') or exit('No direct script access allowed');
$this->load->view('_lib/header');
$this->load->view('_lib/navbar_top');
?>

<body class="light-sidebar">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="<?php echo base_url('assets/template/') ?>img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>

            <div class="app-container">
                <div class="app-main" id="main">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-6 col-xxl-3 m-b-30">
                                <div class="card card-statistics h-100 m-b-0 bg-pink">
                                    <div class="card-body">
                                        <h2 class="text-white mb-0">
                                            <?php
                                            $kmr = $this->db->get('kamar');
                                            echo $kmr->num_rows();
                                            ?>
                                        </h2>
                                        <p class="text-white">Data Kamar</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-xxl-3 m-b-30">
                                <div class="card card-statistics h-100 m-b-0 bg-primary">
                                    <div class="card-body">
                                        <h2 class="text-white mb-0">
                                            <?php
                                            $kmr = $this->db->get('booking');
                                            echo $kmr->num_rows();
                                            ?>
                                        </h2>
                                        <p class="text-white">Data Transaksi</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-xxl-3 m-b-30">
                                <div class="card card-statistics h-100 m-b-0 bg-orange">
                                    <div class="card-body">
                                        <h2 class="text-white mb-0">
                                            <?php
                                            $kmr = $this->db->get('tipe_kamar');
                                            echo $kmr->num_rows();
                                            ?>
                                        </h2>
                                        <p class="text-white">Tipe Kamar</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-6 col-xxl-3 m-b-30">
                                <div class="card card-statistics h-100 m-b-0 bg-info">
                                    <div class="card-body">
                                        <h2 class="text-white mb-0">
                                            <?php
                                            $kmr = $this->db->get('karyawan');
                                            echo $kmr->num_rows();
                                            ?>
                                        </h2>
                                        <p class="text-white">Data Karyawan</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-xxl-3 m-b-30">
                                <div class="card card-statistics h-100 m-b-0 bg-success">
                                    <div class="card-body">
                                        <h2 class="text-white mb-0">
                                            <?php
                                            $this->db->select_sum('total_bayar');
                                            $this->db->where('status', 'CK');
                                            $kmr = $this->db->get('booking')->result();
                                            foreach ($kmr as $km) {
                                                echo 'Rp. ' . number_format($km->total_bayar) . ',0-';
                                            }
                                            ?>
                                        </h2>
                                        <p class="text-white">Total Pemasukan</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php
        $this->load->view('_lib/footer');
        ?>