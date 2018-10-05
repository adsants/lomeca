
<!-- Content Header (Page header) -->
<section class="content">
  <div class="row">
    <div class="col-xs-12">
      <div class="box">

        <div class="box-header">
			<h4><?php echo $this->template_view->nama_menu('nama_menu'); ?></h4>
			<hr>
			<div class="row">
				<div class="col-sm-2">
				
          <a href="<?=base_url();?><?=$this->uri->segment(1);?>/add"><span class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</span></a>
				</div>
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8">
					<div class="row">
						<form method="get">
						<div class="col-sm-4 col-md-offset-2">
							<select class="form-control" name="field">
								<option <?php if($this->input->get('field')=='NAMA_BARANG') echo "selected"; ?> value="NAMA_BARANG">Berdasarkan Nama Barang</option>
								<option <?php if($this->input->get('field')=='KETERANGAN_BARANG') echo "selected"; ?> value="KETERANGAN_BARANG">Berdasarkan Keterangan</option>
							</select>
						</div>
						<div class="col-sm-6">
								<div class="input-group">
									<input type="text" class="form-control" name="keyword" placeholder="Masukkan Kata Kunci" value="<?php echo $this->input->get('keyword'); ?>">
									<div class="input-group-btn">
										<button class="btn btn-default" type="submit">
										<i class="glyphicon glyphicon-search"></i>
										</button>
										<?php if($this->input->get('field')){ ?>
										<a href="<?=base_url();?><?php echo $this->uri->segment(1);?>">
											<span class="btn btn-success"><i class="glyphicon glyphicon-refresh"></i></span>
										</a>
										<?php } ?>
									</div>
								</div>
						</div>
						</form>
					</div>
				</div>
			</div>
		</div>

        <div class="box-body box-table">
        <table class="table table-bordered">
            <thead>
              <tr>
                <th colspan="2" width="15%">No.</th>
                <th>Nama Client</th>
                <th>eMail</th>
                <th>Telp </th>
                <th>Status</th>
                <th>Password</th>
              </tr>
            </thead>
            <tbody>
				<?php
				$no = $this->input->get('per_page')+ 1;
				foreach($this->showData as $showData ){
					//var_dump($showData);
				?>
				<tr>
					<td align="center">
					
					</td>
					<td align="center"><?php echo $no; ?>.</td>
					<td ><?php echo $showData->NAMA_CLIENT; ?></td>
					<td ><?php echo $showData->EMAIL_CLIENT; ?></td>
					<td ><?php echo $showData->TELP_CLIENT; ?></td>
					<td ><?php echo $showData->STATUS; ?> </td>
					<td><?php echo $showData->PASSWORD; ?></td>
				</tr>
				<?php
				$no++;
				}
				if(!$this->showData){
					echo "<tr><td colspan='25' align='center'>Data tidak ada.</td></tr>";
				}
				?>
            </tbody>
        </table>
        <center>
			<?php echo $this->pagination->create_links();?>
			<br>
			<span class="btn btn-default">Jumlah Data : <b><?php echo $this->jumlahData;?></b></span>
		</center>

        </div>
    </div>
  </div>
</section>
<!-- /.content -->
