
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
							<label class="control-label col-sm-4" >Nama Client :</label>
							<div class="col-sm-6">
							<input type="hidden" id="ID_CLIENT"  value="<?php echo $this->oldData->ID_CLIENT; ?>" name="ID_CLIENT">
								<input type="input" class="form-control required" id="NAMA_CLIENT"  name="NAMA_CLIENT" value="<?php echo $this->oldData->NAMA_CLIENT; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" >eMail Client :</label>
							<div class="col-sm-4">
								<input type="input" class="form-control required email" id="EMAIL_CLIENT" name="EMAIL_CLIENT" value="<?php echo $this->oldData->EMAIL_CLIENT; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" >Telp Client :</label>
							<div class="col-sm-3">
								<input type="input" class="form-control required number" id="TELP_CLIENT" name="TELP_CLIENT" value="<?php echo $this->oldData->TELP_CLIENT; ?>">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" >Password :</label>
							<div class="col-sm-3">
								<input type="input" class="form-control required" id="PASSWORD" name="PASSWORD" value="<?php echo $this->oldData->PASSWORD; ?>">
							</div>
						</div>
						<?php //var_dump($this->dataSatuanBarang);?>
						<div class="form-group">
							<label class="control-label col-sm-4" for="email">Status Client :</label>
							<div class="col-sm-2">
								<select class="form-control"  name="STATUS">
									<option value="1" <?php if( $this->oldData->STATUS=='1') echo "selected"; ?>>Aktif</option>
									<option value="0" <?php if( $this->oldData->STATUS=='0') echo "selected"; ?>>Tidak Aktif</option>				
								</select>
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
