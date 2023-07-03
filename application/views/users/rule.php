<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">

			<div class="col-md-4 col-sm-4 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Level User</h2>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-sm-12">
								<table id="mytable" class="table table-striped table-bordered dataTable" style="width: 100%" role="grid">
									<tr><td style="text-align: center" >Pilih Level</td><td><?php echo cmb_dinamis('level_user', 'tabel_level_user', 'nama_level', 'id_level_user', null, "id='level_user'")?></td></tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-8 col-sm-8">
				<div class="x_panel">
					<div class="x_title">
						<h2>Hak Akses Modul</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div id="tabel"></div>
						<div class="row">
							<div class="col-sm-12">

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
			loadData();
		}
	);
</script>

<script type="text/javascript">
	function loadData() {
		var level_user = $("#level_user").val();
		$.ajax( {
				type:'GET',
				url :'<?php echo base_url() ?>index.php/users/modul',
				data:'level_user='+level_user,
				success:function (html) {
					$("#tabel").html(html);
				}
			}
		)
	}

	function addRule(id_modul) {
		// alert('some');
		var level_user = $("#level_user").val();
		$.ajax( {
				type:'GET',
				url :'<?php echo base_url() ?>index.php/users/addrule',
				data: 'level_user='+level_user+'&id_menu='+id_modul,
				success:function (html) {
					// $("#tabel").html(html);
					alert('sukses memberikan akses');
				}
			}
		)
	}


</script>
