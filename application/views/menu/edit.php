<div class="right_col" role="main">
	<div class="">
		<div class="page-title">
			<div class="title_left">
				<h3>Formulir Edit Menu</h3>
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
							echo form_open('menu/edit', 'id="demo-form2" data-parsley-validate="" class="form-horizontal form-label-left" novalidate=""');
							echo form_hidden('id', $menu['id']);
						?>

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">NAMA MENU<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								<input type="text" value="<?php echo $menu['nama_menu']?>" name="nama menu" placeholder="Masukkan Nama Menu" id="first-name" required="required" class="form-control ">
							</div>
						</div>

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">LINK<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								<input type="text" <?php echo $menu['link']?> name="link" placeholder="Masukkan Link" id="last-name" name="last-name" required="required" class="form-control">
							</div>
						</div>

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">ICON<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								<input type="text" value="<?php echo $menu['icon']?>" name="icon" placeholder="Masukkan Kode Icon" id="last-name" name="last-name" required="required" class="form-control">
							</div>
						</div>

						<div class="item form-group">
							<label class="col-form-label col-md-3 col-sm-3 label-align" for="last-name">IS MAIN MENU<span class="required">*</span>
							</label>
							<div class="col-md-6 col-sm-6 ">
								<select name="is_main_menu" id="" class="form-control">
									<option value="0">MAIN MENU</option>
									<?php
									$tabel_menu = $this->db->get('tabel_menu');
									foreach ($tabel_menu->result() as $row) {
										echo "<option value='$row->id'";
										echo $row->id==$menu['is_main_menu']?'selected':'';
										echo ">$row->nama_menu</option>";
									}
									?>
								</select>
							</div>
						</div>

						<div class="ln_solid"></div>
							<div class="item form-group">
								<div class="col-md-6 col-sm-6 offset-md-3">
									<?php
										echo anchor('menu', 'Kembali', array('class'=>'btn btn-primary'));
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
