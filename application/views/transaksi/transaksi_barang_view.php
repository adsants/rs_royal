
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
					//// cara ambil button Add
					echo $this->template_view->getAddButton();
					?>
				</div>
				<div class="col-sm-2">
				</div>
				<div class="col-sm-8">
					<div class="row">
						<form method="get">
						<div class="col-sm-4 col-md-offset-2">
							<select class="form-control" name="field">
								<option <?php if($this->input->get('field')=='NAMA_BARANG') echo "selected"; ?> value="NAMA_BARANG">Berdasarkan Nama Barang</option>

  								<option <?php if($this->input->get('field')=='KODE_BARANG') echo "selected"; ?> value="KODE_BARANG">Berdasarkan Kode Barang</option>
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
                <th colspan="" width="5%">No.</th>
                <th>Tanggal</th>
                <th>Kode & Nama Barang</th>
                <th>Oleh</th>
                <th>Keterangan </th>
                <th>Jumlah Transaksi Barang</th>
              </tr>
            </thead>
            <tbody>
				<?php
				$no = $this->input->get('per_page')+ 1;
				foreach($this->showData as $showData ){
					//var_dump($showData);
				?>
				<tr>

					<td align="center"><?php echo $no; ?>.</td>
					<td ><?php echo $showData->TGL_TRANSAKSI_INDO; ?></td>
					<td ><?php echo $showData->KODE_BARANG; ?><br><?php echo $showData->NAMA_BARANG; ?></td>
          <td><?php echo $showData->NAMA_USER; ?></td>
					<td ><?php echo $showData->KETERANGAN; ?></td>
					<td ><?php echo $showData->JUMLAH_TRANSAKSI; ?> <?php echo $showData->NAMA_SATUAN_BARANG; ?></td>
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
