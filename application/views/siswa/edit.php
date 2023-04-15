<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Formulir Edit Siswa</h3>
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
								echo form_open_multipart('siswa/edit', 'id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""');
								echo form_hidden('nim', $siswa['nim']);
							?>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NIM<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" value="<?php echo $siswa['nim'];?>" readonly="" placeholder="Masukkan NIM" id="first-name" required="required" class="form-control ">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">NAMA LENGKAP<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" value="<?php echo $siswa['nama'];?>" name="nama" placeholder="Masukkan Nama Lengkap" id="last-name" name="last-name" required="required" class="form-control">
								</div>
							</div>

							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">TEMPAT LAHIR <span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input id="middle-name" name="tempat_lahir" placeholder="Masukkan Tempat Lahir" type="text" value="<?php echo $siswa['tempat_lahir'];?>" name="middle-name" required="required" class="form-control">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">TANGGAL LAHIR<span class="required">*</span>
								</label>
								<div class="col-md-2 col-sm-2 ">
									<input id="birthday" name="tanggal_lahir" class="date-picker form-control" placeholder="dd-mm-yyyy" type="text" value="<?php echo $siswa['tanggal_lahir'];?>" required="required" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)">
									<script>
										function timeFunctionLong(input) {
											setTimeout(function() {
												input.type = 'text';
											}, 60000);
										}
									</script>
								</div>
							</div>

							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">JENIS KELAMIN <span class="required">*</span>
								</label>
								<div class="col-md-2 col-sm-2">
									<?php
										echo form_dropdown('gender', array('P'=>'Pria', 'W'=>'Wanita'), $siswa['gender'], 'class="form-control"');
									?>
								</div>
							</div>

							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">AGAMA <span class="required">*</span>
								</label>
								<div class="col-md-3 col-sm-3">
									<?php
									echo cmb_dinamis('agama', 'tabel_agama', 'nama_agama', 'kd_agama', $siswa['kd_agama']);
									?>
								</div>
							</div>

							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">FOTO <span class="required">*</span>
								</label>
								<input type="file" name="userfile" class="col-md-3 col-sm-3">
								<img src="<?php echo base_url()."/uploads/".$siswa['foto'];?>" width="200px">
							</div>

							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">PILIH ROMBEL<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<?php echo cmb_dinamis ('rombel', 'tabel_rombel', 'nama_rombel', 'id_rombel', $siswa['id_rombel'])?>
								</div>
							</div>

							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<?php
										echo anchor('siswa', 'Kembali', array('class'=>'btn btn-primary'));
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
