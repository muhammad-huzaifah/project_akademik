<div class="right_col" role="main" xmlns="http://www.w3.org/1999/html">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Komponen Biaya</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><?php echo anchor('setup/add', '<i class="fa fa-edit"></i>', 'title="Tambah Data"'); ?></li>
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                                   aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table table-bordered">
                                    <tr><td style="width: 200px">TAHUN AKADEMIK</td><td>:  <?php echo get_tahun_akademik_aktif('tahun_akademik') ?></td></tr>
                                    <tr><td>SEMESTER</td><td>: <?php echo get_tahun_akademik_aktif('semester_aktif') ?></td></tr>
                                </table>
                            </div>

                            <div class="col-sm-12">
                                <?php
                                echo form_open('keuangan/setup')
                                ?>
                                    <table class="table table-striped table-bordered dataTable" style="width: 100%" role="grid">
                                        <?php
                                            foreach($jenis_pembayaran->result() as $row) {
                                                echo "<tr><td>$row->nama_jenis_pembayaran</td>
                                                          <td><input type='int' value='".check_komponen_biaya($row->id_jenis_pembayaran)."' class='form-control' name='$row->id_jenis_pembayaran' placeholder='Masukkan Data $row->nama_jenis_pembayaran'></td>
                                                      </tr>";
                                            }
                                        ?>
                                        <tr><td colspan="2"><button type="submit" name="submit" class="btn btn-danger btn-sm" >SIMPAN PERUBAHAN</button></td></tr>
                                    </table>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

