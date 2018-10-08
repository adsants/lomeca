
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
						<div class="form-group">
							<label class="control-label col-sm-4" >Nama Promo :</label>
							<div class="col-sm-5">
								<input type="input" class="form-control required" id="NAMA_PROMO"  name="NAMA_PROMO">
							</div>
						</div>
					
						<div class="form-group">
							<label class="control-label col-sm-4" >Keterangan :</label>
							<div class="col-sm-6">
								<textarea class="form-control required" id="KETERANGAN_PROMO"  name="KETERANGAN_PROMO"></textarea>
							</div>
						</div>
						
						<div class="form-group">
							<label class="control-label col-sm-4" >Tampil :</label>
							<div class="col-sm-2">
								
								<input class="form-control" name="MULAI_AKTIF" id="datepicker" value="" data-date-format='dd-mm-yyyy'> 
						
							</div>
							<div class="col-sm-2">								
								<input class="form-control" name="AKHIR_AKTIF" id="datepicker2" value="" data-date-format='dd-mm-yyyy'>			
							</div>
						</div>
						
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-10">
								<img src="<?php echo base_url();?>assets/img/loading.gif" id="loading" style="display:none">
								<p id="pesan_error" style="display:none" class="text-warning" style="display:none"></p>
							</div>
						</div>
						<div class="form-group">
							<div class="col-sm-offset-4 col-sm-10">
								<button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
								<a href="<?=base_url()."".$this->uri->segment(1);?>">
									<span class="btn btn-warning"><i class="fa fa-remove"></i> Batal</span>
								</a>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- /.content -->
