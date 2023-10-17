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
                    <h2>Daftar Siswa</h2>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered">
                                <tr>
                                    <th>NIS</th>
                                    <th>NAMA</th>
                                    <th>NILAI</th>
                                </tr>
                                <?php
                                    foreach ($siswa as $row) {
                                        echo "<tr>
                                                    <td style='width: 100px'>$row->nim</td>
                                                    <td style='width: 100px'>". strtoupper($row->nama)."</td>
                                                    <td style='width: 100px'><input type='int' onkeyup='updateNilai(\"$row->nim\")' id='nilai".$row->nim."' value='".check_nilai($row->nim, $this->uri->segment(3))."' class='form-control'</td>
                                              </tr>";
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

<script type="text/javascript">
    function updateNilai (nim) {
        var nilai  = $("#nilai"+nim).val();
        $.ajax( {
                type:'GET',
                url:'<?php echo base_url()?>index.php/nilai/update_nilai',
                data:'nim='+nim+'&id_jadwal='+<?php echo $this->uri->segment(3)?>+'&nilai='+nilai,
                success:function(html) {
                    // $("#dataSiswa").html(html);
                }
            }
        )
    }
</script>


