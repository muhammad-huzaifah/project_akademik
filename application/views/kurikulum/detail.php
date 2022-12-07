<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-5 col-sm-5 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Filter Data</h2>

						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-sm-12">
								<table class="table table-bordered">
									<tr><td>Jurusan</td><td><?php echo cmb_dinamis('jurusan', 'tabel_jurusan', 'nama_jurusan', 'kd_jurusan' ) ;?></td></tr>
									<tr><td>Kelas</td><td>
											<select id="kelas" class="form-control">
												<?php for ($i=1;$i<=$info['jumlah_kelas'];$i++) {
													echo "<option value='$i'>Kelas $i</option>";
												}
												?>
											</select>
										</td></tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-7 col-sm-7 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Daftar Pelajaran</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><?php echo anchor('kurikulum/add', '<i class="fa fa-edit"></i>', 'title="Tambah Data"'); ?></li>
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
										<th>MATA PELAJARAN</th>
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

