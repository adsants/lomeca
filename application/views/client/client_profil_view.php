
<!-- Content Header (Page header) -->
<section class="content">
	<div class="row">
		<div class="col-xs-12">
			<div class="box">
				<div class="box-header">
					<h4><?php echo $this->template_view->nama_menu('nama_menu'); ?></h4>
					<hr>
				</div>
				<div class="box-body">

						<div class="row">
						<div class="col-sm-6">

								<form class="form-horizontal" id="form_standar">
							<div class="form-group">
								<label class="control-label col-sm-4" >Nama  :</label>
								<div class="col-sm-8">
									<input type="input" class="form-control required" id="NAMA_CLIENT"  name="NAMA_CLIENT" value="<?php echo $this->oldData->NAMA_CLIENT; ?>">
									<input type="hidden" class="form-control required" name="IMAGE_CLIENT" id="IMAGE_CLIENT" value="<?php echo $this->oldData->IMAGE_CLIENT; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" >eMail  :</label>
								<div class="col-sm-7">
									<input type="input" class="form-control required email" id="EMAIL_CLIENT" name="EMAIL_CLIENT" value="<?php echo $this->oldData->EMAIL_CLIENT; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" >Telp  :</label>
								<div class="col-sm-6">
									<input type="input" class="form-control required number" id="TELP_CLIENT" name="TELP_CLIENT" value="<?php echo $this->oldData->TELP_CLIENT; ?>">
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-sm-4" >Password :</label>
								<div class="col-sm-6">
									<input type="input" class="form-control required" id="PASSWORD" name="PASSWORD" value="<?php echo $this->oldData->PASSWORD; ?>">
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<img src="<?php echo base_url();?>assets/img/loading.gif" id="loading" style="display:none">
									<p id="pesan_error" style="display:none" class="text-warning" style="display:none"></p>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-offset-4 col-sm-8">
									<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
									<a href="<?=base_url()."".$this->uri->segment(1);?>">
										<span class="btn btn-warning"><i class="fa fa-remove"></i> Batal</span>
									</a>
								</div>
							</div>
						</form>
						</div>


						<div class="col-sm-6">
							<form class="form-horizontal" id="form_upload_profil">
									<div class="col-sm-12">
										<div class="form-group">
											<label class="control-label col-sm-3" >
												Image Profil :
											</label>

											<div class="col-sm-6">
												<input type="file" class="form-control"  name="userfile">
											</div>
											<div class="col-sm-3">
												<button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Upload</button>
											</div>
										</div>

										<div class="form-group">
											<label class="control-label col-sm-3" ></label>
											<div class="col-sm-8">
												<span id="loading_upload"></span>
												<span id="DIV_IMAGE_PROMO" style="display:nonse">
													<img src="<?=base_url();?>uploads/profil/<?php echo $this->oldData->IMAGE_CLIENT ?>" id="image_"  width="100%">
												</span>
											</div>
										</div>
									</div>
								</form>

						</div>
						</div>

				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
