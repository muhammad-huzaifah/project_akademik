<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Formulir Edit Rombongan Belajar</h3>
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
								echo form_open('rombel/edit', 'id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""');
								echo form_hidden('id_rombel', $rombel['id_rombel']);
							?>
						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NAMA ROMBONGAN BELAJAR<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								<input type="text" value="<?php echo $rombel ['nama_rombel'] ?> " name="nama_rombel" placeholder="Masukkan Nama Rombongan Belajar" id="first-name" required="required" class="form-control ">
							</div>
						</div>

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">JURUSAN<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								<?php echo cmb_dinamis('jurusan', 'tabel_jurusan', 'nama_jurusan', 'kd_jurusan', $rombel['kd_jurusan']) ?>
							</div>
						</div>

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">KELAS<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								<select name="kelas" class="form-control">
									<?php for ($i=1;$i<=$info['jumlah_kelas'];$i++) {
										echo "<option value='$i' ";
										echo $rombel['kelas']==$i?'selected':'';
										echo ">Kelas $i</option>";
									}
									?>
								</select>

							</div>
						</div>

							<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<?php
										echo anchor('rombel', 'Kembali', array('class'=>'btn btn-primary'));
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
