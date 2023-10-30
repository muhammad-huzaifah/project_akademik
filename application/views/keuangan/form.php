<div class="right_col" role="main">
    <div class="">
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>BIO DATA SISWA</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php echo form_open('keuangan/form'); ?>
                                <table id="mytable" class="table table-striped table-hover table-bordered dataTable"
                                       style="width: 100%" role="grid">
                                    <tr>
                                        <td>NIS</td>
                                        <td class=""><input name="nis" onkeyup="isi_otomatis()" type="text" id="nis" placeholder="Nomor Induk Siswa"
                                                            class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>NAMA</td>
                                        <td><input type="text" id="nama" placeholder="Masukkan Nama"
                                                   class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>JURUSAN</td>
                                        <td><input type="text" id="jurusan" placeholder="Masukkan Jurusan"
                                                   class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>KELAS</td>
                                        <td><input type="text" id="kelas" placeholder="Masukkan Kelas"
                                                   class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>ROMBEL</td>
                                        <td><input type="text" id="rombel" placeholder="Masukkan Rombel"
                                                   class="form-control"></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-6 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>FORM TRANSAKSI</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="mytable" class="table table-striped table-hover table-bordered dataTable"
                                       style="width: 100%" role="grid">
                                    <tr>
                                        <td>TANGGAL</td>
                                        <td class=""><input type="date" name="tanggal" placeholder="Input Tanggal"
                                                            class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>JENIS PEMBAYARAN</td>
                                        <td><?php echo cmb_dinamis('jenis_pembayaran', 'tabel_jenis_Pembayaran', 'nama_jenis_pembayaran', 'id_jenis_pembayaran'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>JUMLAH PEMBAYARAN</td>
                                        <td><input type="int" name="jumlah_pembayaran"
                                                   placeholder="Input Jumlah Pembayaran" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>KETERANGAN</td>
                                        <td><input type="text" name="keterangan" placeholder="Keterangan Transaksi"
                                                   class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <button type="submit" name="submit" class="btn-primary btn-sm">SIMPAN
                                                TRANSAKSI
                                            </button>
                                        </td>
                                        <td></td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script type="text/javascript">
    function isi_otomatis(){
        var nis = $("#nis").val();
        $.ajax({
            url: '<?php echo base_url()?>index.php/keuangan/form_siswa_autocomplete',
            data:"nis="+nis,
        }).success(function (data) {
            var json = data,
                obj = JSON.parse(json);
            $('#nama').val(obj.nama);
            $('#kelas').val(obj.kelas);
            $('#jurusan').val(obj.jurusan);
            $('#rombel').val(obj.rombel);
        });
    }
</script>