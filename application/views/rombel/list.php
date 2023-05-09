<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Daftar Rombongan Belajar</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><?php echo anchor('rombel/add', '<i class="fa fa-edit"></i>', 'title="Tambah Data"'); ?></li>
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
									<table id="mytable" class="table table-striped table-bordered dataTable" style="width: 100%" role="grid">
										<thead>
											<tr>
												<th>NO</th>
												<th>NAMA ROMBONGAN BELAJAR</th>
												<th>JURUSAN</th>
												<th>KELAS</th>
												<th>AKSI</th>
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


<script>
	$(document).ready(function() {
		var t = $('#mytable').DataTable( {
			"ajax": '<?php echo site_url('rombel/data'); ?>',
			"order": [[ 2, 'asc' ]],
			"columns": [
				{
					"data": null,
					"width": "50px",
					"sClass": "text-center",
					"orderable": false,
				},
				{ "data": "nama_rombel", "width": "150px" },
				{ "data": "nama_jurusan", "width": "200px" },
				{ "data": "kelas", "width": "100px" },
				{ "data": "aksi", "width": "100px" },
			]
		} );

		t.on( 'order.dt search.dt', function () {
			t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
				cell.innerHTML = i+1;
			} );
		} ).draw();
	} );
</script>
