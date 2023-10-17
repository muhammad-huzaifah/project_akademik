<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>

        <table class="table table-bordered">
            <tr>
                <td style="width: 200px">TAHUN AKADEMIK</td><td>: <?php echo get_tahun_akademik_aktif('tahun_akademik')?></td>
            </tr>
            <tr>
                <td>SEMESTER</td><td>: <?php echo get_tahun_akademik_aktif('semester_aktif')?></td>
            </tr>
            <tr><td>JURUSAN</td><td>: KELAS<?php echo $rombel ['kelas'].' '.$rombel ['nama_jurusan']?> (<?php echo $rombel ['nama_rombel'] ?>)</td></tr>
            <tr><td>MATA PELAJARAN</td><td>: <?php echo $rombel ['nama_mapel']?></td></tr>
        </table>

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Jadwal Mengajar</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



