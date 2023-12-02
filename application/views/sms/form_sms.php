<div class="right_col" role="main">
	<div class="">
		<div class="clearfix"></div>
		<div class="row">
			<div class="col-md-12 col-sm-12 ">
				<div class="x_panel">
					<div class="x_title">
						<h2>Daftar SMS Group</h2>
						<ul class="nav navbar-right panel_toolbox">
						</ul>
						<div class="clearfix"></div>
					</div>
					<div class="x_content">
						<div class="row">
							<div class="col-sm-12">
								<?php
									echo form_open('sms/send');
								?>
								<table id="mytable" class="table table-striped table-bordered dataTable" style="width: 100%" role="grid">
									<tr><td>GROUP SMS</td><td><?php echo cmb_dinamis('group','tabel_sms_group', 'nama_group', 'id')?></td></tr>
									<tr><td>Teks</td><td><textarea name="pesan" id="" class="form-control"></textarea></td></tr>
									<tr><td></td><td><button type="submit" name="submit" class="btn btn-success btn-sm">Kirim Pesan</button></td></tr>
								</table>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


