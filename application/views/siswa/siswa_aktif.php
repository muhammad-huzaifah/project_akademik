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
								<table class="table table-striped table-bordered dataTable" style="width: 100%" role="grid">
									<tr><td>Jurusan</td><td><?php echo cmb_dinamis('jurusan', 'tabel_jurusan', 'nama_jurusan', 'kd_jurusan');?></td></tr>
									<tr><td>Rombel</td><td><?php echo cmb_dinamis('jurusan', 'tabel_jurusan', 'nama_jurusan', 'kd_jurusan', null, "id='jurusan'")?></td></tr>
								</table>
							</div>

							<div class="col-sm-7">
								<h2>Data Siswa</h2>
								<table id="mytable" class="table table-striped table-bordered dataTable" style="width: 100%" role="grid">
									<thead>
									<tr>
										<th>NO</th>
										<th>NIM</th>
										<th>NAMA</th>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.21/css/dataTables.bootstrap.min.css"></script>

<script type="text/javascript">
	$(document).ready(function () {
			loadData();
		}
	);
</script>

<script type="text/javascript">
	function loadData() {
		var jurusan = $("#jurusan").val();
		alert(jurusan);
		exit;
		$.ajax( {
				type:'GET',
				url:'<?php echo base_url()?>index.php/jadwal/dataJadwal',
				data:'jurusan='+jurusan+'&kelas='+kelas+'&id_kurikulum=<?php echo $this->uri->segment(3)?>',
				success:function(html) {
					$("#tabel").html(html);
				}
			}
		)
	}

</script>


<script>
	$(document).ready(function() {
		var t = $('#mytable').DataTable( {
			"ajax": '<?php echo site_url('siswa/data'); ?>',
			"order": [[ 2, 'asc' ]],
			"columns": [
				{
					"data": null,
					"width": "50px",
					"sClass": "text-center",
					"orderable": false,
				},
				{
					"data": "nim",
					"width": "120px",
					"sClass": "text-center"
				},
				{ "data": "nama", "width": "100px" },
			]
		} );

		t.on( 'order.dt search.dt', function () {
			t.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
				cell.innerHTML = i+1;
			} );
		} ).draw();
	} );
</script>
