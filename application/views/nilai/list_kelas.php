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
        </table>

        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <h2>Daftar Kelas</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>No</th>
                                    <th>Kelas</th>
                                    <th>Jurusan</th>
                                    <th>MATA PELAJARAN</th>
                                    <th>HARI</th>
                                    <th>JAM</th>
                                    <th>RUANG</th>
                                    <th>AKSI</th>
                                </tr>
                                <?php
                                $no=1;
                                foreach ($jadwal->result() as $row) {
                                    echo "<tr>
											<td>$no</td>
											<td>$row->kelas</td>
											<td>$row->nama_jurusan</td>
											<td>$row->nama_mapel</td>
											<td>$row->hari</td>
											<td>$row->jam</td>
											<td>$row->nama_ruangan</td>
											<td>".anchor('nilai/rombel/'.$row->id_rombel,'<i class="fa fa-eye"></i>', "title='Lihat_Kelas'")."</td>
										  </tr>";
                                    $no++;
                                }
                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



