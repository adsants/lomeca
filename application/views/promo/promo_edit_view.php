
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
					<form class="form-horizontal" id="form_standar">

						<div class="row">
						<div class="col-sm-6">

						<div class="form-group">
							<label class="control-label col-sm-3" >Nama Promo :</label>
							<div class="col-sm-8">
								<input type="input" class="form-control required" id="NAMA_PROMO"  name="NAMA_PROMO" value="<?php echo $this->oldData->NAMA_PROMO; ?>">
								<input type="hidden" class="form-control" id="IMAGE_PROMO"  name="IMAGE_PROMO" value="<?php echo $this->oldData->IMAGE_PROMO; ?>">
								<input type="hidden" class="form-control" id="ID_PROMO"  name="ID_PROMO" value="<?php echo $this->oldData->ID_PROMO; ?>">
							</div>
						</div>

						<div class="form-group">
							<label class="control-label col-sm-3" >Keterangan :</label>
							<div class="col-sm-9">
								<textarea class="form-control required" id="KETERANGAN_PROMO"  name="KETERANGAN_PROMO"><?php echo $this->oldData->KETERANGAN_PROMO; ?></textarea>
							</div>
						</div>

						</div>


						<div class="col-sm-6">

						<div class="form-group">
							<label class="control-label col-sm-4" >Waktu Akhir Tampil :</label>
						<!--	<div class="col-sm-4">

								<input class="form-control required" name="MULAI_AKTIF" id="datepicker"  value="<?php echo $this->oldData->MULAI_AKTIF_INDO; ?>" data-date-format='dd-mm-yyyy'>

							</div>-->
							<div class="col-sm-4">
								<input class="form-control required" name="AKHIR_AKTIF" id="datepicker2"  value="<?php echo $this->oldData->AKHIR_AKTIF_INDO; ?>" data-date-format='dd-mm-yyyy'>
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


						</div>
						</div>

					</form>


					<form class="form-horizontal" id="form_upload_promo">
							<div class="col-sm-6">
								<hr>
								<div class="form-group">
									<label class="control-label col-sm-3" >
										Image Promo :
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
											<img src="<?=base_url();?>uploads/promo/<?php echo $this->oldData->IMAGE_PROMO ?>" id="image_"  width="100%">
										</span>
									</div>
								</div>
							</div>
						</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
