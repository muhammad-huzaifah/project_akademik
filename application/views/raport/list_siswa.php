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
            <tr>
                <td>JURUSAN</td>
                <td> : KELAS <?php echo $rombel['kelas'].' '.$rombel['nama_jurusan']?> ( <?php echo $rombel['nama_rombel']?> )
                </td>
            </tr>
        </table>

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Siswa</h2>
                    <div class="clearfix"></div>
                    <table class="table table-bordered">
                        <tr><th>NIM</th><th>NAMA</th><th>LIHAT NILAI</th></tr>
                        <?php
                            foreach ($siswa->result() as $row) {
                                 echo "<tr>
                                            <td style='width: 100px'>$row->nim</td>
                                            <td>$row->nama</td>
                                            <td style='width: 200px;'>".anchor('raport/nilai_semester/'.$row->nim, 'Lihat Raport', 'class="btn btn-success btn-sm"')."</td>
                                       </tr>";
                            }
                        ?>
                    </table>
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



