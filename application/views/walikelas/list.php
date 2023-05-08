<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Daftar Mata Pelajaran</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><?php echo anchor('mapel/add', '<i class="fa fa-edit"></i>', 'title="Tambah Data"'); ?></li>
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
								<table id="mytable" class="table table-striped table-bordered dataTable" style="width: 100%" role="grid">
									<thead>
									<tr>
										<th>NO</th>
										<th>ROMBEL</th>
										<th>NAMA JURUSAN</th>
										<th>KELAS</th>
										<th>NAMA WALIKELAS</th>
									</tr>
									</thead>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.0/jquery.dataTables.js"></script>-->
<!--<script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.js"></script>-->

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"></script>-->


<script type="text/javascript">
	function updateDataWalikelas(id_walikelas) {
		var id_guru = $("#guru"+id_walikelas).val();
		// alert(id_guru);
		// exit;
		$.ajax( {
				type:'GET',
				url :'<?php echo base_url() ?>index.php/walikelas/updateWalikelas',
				data:'id_walikelas='+id_walikelas+'&id_guru='+id_guru,
				success:function (html) {
				}
			}
		)
	}
</script>

<script>
	$(document).ready(function() {
		var t = $('#mytable').DataTable( {
			"ajax": '<?php echo site_url('walikelas/data'); ?>',
			"order": [[ 2, 'asc' ]],
			"columns": [
				{
					"data": null,
					"width": "50px",
					"sClass": "text-center",
					"orderable": false,
				},

				{ "data": "nama_rombel", "width": "200px" },
				{ "data": "nama_jurusan", "width": "200px" },
				{ "data": "kelas", "width": "100px" },
				{ "data": "nama_guru", "width": "200px" },
			]
		} );

		t.on( 'order.dt search.dt', function () {
			t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
				cell.innerHTML = i+1;
			} );
		} ).draw();
	} );
</script>
