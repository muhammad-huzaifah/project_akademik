<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_content">
						<div class="row">
							<div class="col-sm-5">
								<h2>Filter Data</h2>
								<?php echo form_open('siswa/data_by_rombel_excel'); ?>
									<table class="table table-striped table-bordered dataTable" style="width: 100%" role="grid">
										<tr><td>Jurusan</td><td><?php echo cmb_dinamis('jurusan', 'tabel_jurusan', 'nama_jurusan', 'kd_jurusan', null, "id='jurusan' onchange='loadData()'");?></td></tr>
										<tr><td>Rombel</td><td><div id="rombel"></div></td></tr>
										<tr><td></td><td><button type="submit" class="btn btn-danger btn-sm">Export Data</button></td></tr>
									</table>
								</form>
							</div>

							<div class="col-sm-7">
								<h2>Data Siswa</h2>
								<div id="dataSiswa"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"></script>

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
			var jurusan = $("#jurusan").val();
			// alert(jurusan);
			// exit;
			$.ajax( {
					type:'GET',
					url:'<?php echo base_url()?>index.php/rombel/show_combobox_rombel_by_jurusan',
					data:'jurusan='+jurusan,
					success:function(html) {
						$("#rombel").html(html);
						loadSiswa(rombel);
					}
				}
			)
		}

		function loadSiswa(rombel) {
			var rombel = $("#rombel2").val();

			// alert('ujeb');
			$.ajax( {
					type:'GET',
					url:'<?php echo base_url()?>index.php/siswa/load_data_siswa_by_rombel',
					data:'rombel='+rombel,
					success:function(html) {
						$("#dataSiswa").html(html);
					}
				}
			)
		}
</script>
