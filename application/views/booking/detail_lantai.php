<div>
    <div>
        <center>
            <?php
            $tgl = date("Y-m-d");
            foreach ($floor as $fl) {
                $hasil = $this->model->cek_kamar($fl->nomor_kamar);
                $tmp = $this->model->cek_booking($fl->nomor_kamar);
                if ($hasil->num_rows() > 0) {
                    foreach ($hasil->result() as $u) {
                        if ($tgl >= $u->tgl_mulai && $tgl <= $u->tgl_selesai) { ?>

                            <div style="width: 50px" class="badge badge-danger badge-md ml-1 mb-1"> <?php echo $fl->nomor_kamar ?> </div>

                        <?php
                        } else {
                        ?>
                            <div style="width: 50px" class="badge badge-success badge-md ml-1 mb-1"> <?php echo $fl->nomor_kamar ?> </div>
                        <?php
                        }
                    }
                } else if ($tmp->num_rows() > 0) {
                    foreach ($tmp->result() as $u) {
                        $end = date('Y-m-d', strtotime($u->lama_tinggal . 'day', strtotime($u->tgl_checkin)));
                        if ($u->status == 'I' && $tgl >= $u->tgl_checkin && $tgl <= $end) { ?>

                            <div style="width: 50px" class="badge badge-blue badge-md ml-1 mb-1"> <?php echo $fl->nomor_kamar ?> </div>

                        <?php } else if ($u->status == 'I') {
                        ?>

                            <div style="width: 50px" class="badge badge-blue badge-md ml-1 mb-1"> <?php echo $fl->nomor_kamar ?> </div>

                        <?php } else { ?>
                            <div style="width: 50px" class="badge badge-success badge-md ml-1 mb-1"> <?php echo $fl->nomor_kamar ?> </div>
                        <?php } ?>

                    <?php
                    }
                } else {
                    ?>
                    <div style="width: 50px" class="badge badge-success badge-md ml-1 mb-1"> <?php echo $fl->nomor_kamar ?> </div>
            <?php
                }
            }
            ?>
        </center>
    </div>
</div>