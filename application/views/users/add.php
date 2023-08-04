<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Formulir Tambah Users</h3>
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
								echo form_open_multipart('users/add', 'id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""');
							?>
							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">NAMA LENGKAP<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="nama_lengkap" placeholder="Masukkan Nama Lengkap" required="required" class="form-control ">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">USERNAME<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="text" name="username" placeholder="Masukkan username" required="required" class="form-control">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align" >PASSWORD<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<input type="password" name="password" placeholder="Masukkan password" required="required" class="form-control">
								</div>
							</div>

							<div class="item form-group">
								<label class="col-form-label col-md-3 col-sm-3 label-align">LEVEL USER<span class="required">*</span>
								</label>
								<div class="col-md-6 col-sm-6 ">
									<?php
									echo cmb_dinamis('id_level_user', 'tabel_level_user', 'nama_level', 'id_level_user')
									;?>
								</div>
							</div>

							<div class="item form-group">
								<label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">FOTO <span class="required">*</span>
								</label>
								<input type="file" name="userfile" class="col-md-3 col-sm-3">
							</div>

							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<?php
										echo anchor('users', 'Kembali', array('class'=>'btn btn-primary'));
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
