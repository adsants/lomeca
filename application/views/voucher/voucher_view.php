
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
          <?php
          if($this->session->userdata('id_client')!='0'){
          ?>
          <a href="<?=base_url();?><?=$this->uri->segment(1);?>/add"><span class="btn btn-primary"><i class="fa fa-plus"></i> Tambah Data</span></a>
          <?php
          }
          ?>
      	</div>
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8">
					<div class="row">
						<form method="get">
						<div class="col-sm-4 col-md-offset-2">
							<select class="form-control" name="field">
								<option <?php if($this->input->get('field')=='NAMA_VOUCHER') echo "selected"; ?> value="NAMA_VOUCHER">Berdasarkan Nama Voucher</option>
								<option <?php if($this->input->get('field')=='KODE_VOUCHER') echo "selected"; ?> value="KODE_VOUCHER">Berdasarkan Kode Voucher</option>
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
                <th>Nama Vocuher</th>
                <th>Kode</th>
                <th>Keterangan </th>
                <th>Mulai Tampil</th>
                <th>Akhir Tampil</th>
                <th>Mulai Berlaku</th>
                <th>Akhir Berlaku</th>
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
            <?php
            if($this->session->userdata('id_client')!='0'){
            ?>
						<a href="<?=base_url();?><?=$this->uri->segment(1);?>/edit/<?php echo $showData->ID_VOUCHER; ?>"><span class="btn btn-warning btn-xs"><i class="fa fa-edit"></i></span></a>
            <?php
            }
            ?>
          </td>
					<td align="center"><?php echo $no; ?>.</td>
					<td ><?php echo $showData->NAMA_VOUCHER; ?></td>
					<td ><?php echo $showData->KODE_VOUCHER; ?></td>
					<td ><?php echo $showData->KETERANGAN_VOUCHER; ?></td>
					<td ><?php echo $showData->MULAI_AKTIF_INDO; ?></td>
					<td ><?php echo $showData->AKHIR_AKTIF_INDO; ?></td>
					<td ><?php echo $showData->BERLAKU_MULAI_INDO; ?></td>
					<td ><?php echo $showData->BERLAKU_AKHIR_INDO; ?></td>
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
