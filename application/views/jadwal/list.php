<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Filter Data</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
<!--							<form class="col-sm-12">-->
								<table class="table table-bordered">
									<?php echo form_open('jadwal/cetak_jadwal');?>
									<tr><td>Jurusan</td><td><?php echo cmb_dinamis('jurusan', 'tabel_jurusan', 'nama_jurusan', 'kd_jurusan', null, "id='jurusan' onChange='loadData()'");?></td></tr>
									<tr><td>Kelas</td>
										<td>
											<select id="kelas" class="form-control" onchange="loadRombel () ()">
												<?php for ($i=1;$i<=$info['jumlah_kelas'];$i++) {
													echo "<option value='$i'>Kelas $i</option>";
												}
												?>
											</select>
										</td>
									</tr>
									<tr>
										<td>rombel</td>
										<td><div id="showRombel"></div></td>
									</tr>

									<tr><td colspan="2">
											<!-- Button trigger modal -->
											<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
												Jadwal Otomatis
											</button>
											<button type="submit" name="export_jadwal" class="btn btn-danger btn-sm">Cetak PDF</button>
<!--											--><?php //echo anchor('kurikulum/adddetail/'.$this->uri->segment(3), '<i class="fa fa-edit"></i> Tambah Data', "title='Tambah Data' class='btn btn-danger btn-sm'"); ?>
<!--											--><?php //echo anchor('kurikulum', 'kembali', "class='btn btn-success btn-sm'");?>
										</td>
									</tr>

								</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Jadwal Pelajaran</h2>
						<ul class="nav navbar-right panel_toolbox">
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
								<div id="tabel"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function () {
			// loadData();
			loadRombel();
		}
	);
</script>

<script type="text/javascript">
	// function loadData() {

	function loadRombel() {
		var kelas 	= $("#kelas").val();
		var jurusan = $("#jurusan").val();
		// alert (kelas);
		// alert (jurusan);
		// exit;
		// alert ('load rombel sukses');
		// exit;
		$.ajax( {
				type:'GET',
				url :'<?php echo base_url() ?>index.php/jadwal/show_rombel',
				data:'kelas='+kelas+'&jurusan='+jurusan,
				success:function (html) {
					$("#showRombel").html(html);
					loadPelajaran();
				}
			}
		)
	}

	function loadPelajaran() {
		var kelas 	= $("#kelas").val();
		var jurusan = $("#jurusan").val();
		var rombel 	= $("#rombel").val();
		// alert ('load pelajaran sukses');
		// alert(rombel);
		// exit;
		$.ajax( {
				type:'GET',
				url:'<?php echo base_url()?>index.php/jadwal/dataJadwal',
				data:'jurusan='+jurusan+'&kelas='+kelas+'&rombel='+rombel+'&id_kurikulum=<?php echo $this->uri->segment(3)?>',
				success:function(html) {
					$("#tabel").html(html);
					// loadRombel();
				}
			}
		)
	}

	function updateGuru(id) {
		// alert('sas');
		var guru = $ ("#guru"+id).val();
		// alert(guru);
		$.ajax( {
				type:'GET',
				url:'<?php echo base_url()?>index.php/jadwal/updateGuru',
				data:'id_guru='+guru+'&id_jadwal='+id,
				success:function (html) {
					loadData();
				}
			}
		)
	}

	function updateRuangan(id) {
		var kd_ruangan = $ ("#ruangan"+id).val();
		// alert(kd_ruangan);
		// exit;
		$.ajax( {
				type:'GET',
				url:'<?php echo base_url()?>index.php/jadwal/updateRuangan',
				data:'kd_ruangan='+kd_ruangan+'&id_jadwal='+id,
				success:function (html) {
					loadData();
				}
			}
		)
	}

	function updateHari(id) {
		var hari = $("#hari" + id).val();
		// alert(hari);
		// exit;
		$.ajax({
				type: 'GET',
				url: '<?php echo base_url()?>index.php/jadwal/updateHari',
				data: 'hari=' + hari + '&id_jadwal=' + id,
				success: function (html) {
					loadData();
				}
			}
		)
	}

		function updateJam(id) {
			var jam = $("#jam"+id).val();
			// alert(jam);
			// exit;
			$.ajax( {
					type:'GET',
					url:'<?php echo base_url()?>index.php/jadwal/updateJam',
					data:'jam='+jam+'&id_jadwal='+id,
					success:function (html){
						loadData();
					}
				}
			)
		}

	function filterData() {
		loadData();
	}

</script>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<?php
			echo form_open('jadwal/generate_jadwal')
			?>
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Jadwal Otomatis</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<table class="table table-bordered">
					<tr><td>Kurikulum</td><td><?php echo cmb_dinamis('kurikulum', 'tabel_kurikulum', 'nama_kurikulum', 'id_kurikulum'); ?></td></tr>
					<tr><td>Semester</td><td><?php echo form_dropdown('semester', array('1'=>'Semester 1', '2'=>'Semester 2'), null, "class='form-control'"); ?></td></tr>
				</table>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="submit" name="submit" class="btn btn-primary">Data Otomatis</button>
			</div>
		</div>
		</form>
	</div>
</div>

