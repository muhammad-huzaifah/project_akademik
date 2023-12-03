<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
<<<<<<< HEAD
				<h3>Formulir Tambah Nama Group</h3>
=======
				<h3>Formulir Tambah Mata Pelajaran</h3>
>>>>>>> origin/master
			</div>
		</div>
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
							</li>
							<li class="dropdown">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><i class="fa fa-wrench"></i></a>
								<ul class="dropdown-menu" role="menu">
									<li><a class="dropdown-item" href="#">Settings 1</a>
									</li>
									<li><a class="dropdown-item" href="#">Settings 2</a>
									</li>
								</ul>
							</li>
							<li><a class="close-link"><i class="fa fa-close"></i></a>
							</li>
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<br>

							<?php
<<<<<<< HEAD
								echo form_open_multipart('sms_group/add', 'id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""');
							?>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">NAMA GROUP<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="nama_group" placeholder="Masukkan Nama Group" id="last-name" name="last-name" required="required" class="form-control">
								</div>
							</div><div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">FILE EXCEL<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="file" name="userfile" id="last-name" name="last-name" required="required" class="form-control">
=======
								echo form_open('mapel/add', 'id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""');
							?>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">KODE MATA PELAJARAN<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="kd_mapel" placeholder="Masukkan Kode Mata Pelajaran" id="first-name" required="required" class="form-control ">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">NAMA MATA PELAJARAN<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="nama_mapel" placeholder="Masukkan Nama Mata Pelajaran" id="last-name" name="last-name" required="required" class="form-control">
>>>>>>> origin/master
								</div>
							</div>

							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<?php
<<<<<<< HEAD
										echo anchor('sms_group', 'Kembali', array('class'=>'btn btn-primary'));
=======
										echo anchor('mapel', 'Kembali', array('class'=>'btn btn-primary'));
>>>>>>> origin/master
									?>
									<button type="submit" name="submit" class="btn btn-success">Simpan</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
