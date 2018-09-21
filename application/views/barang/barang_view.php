
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
          <br>
          <br>
          <a href="<?=base_url();?>cetak/barang" target="_blank"><span class="btn btn-primary"><i class="fa fa-print"></i> Cetak Data Barang</span></a>
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
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Keterangan </th>
                <th>Stok Barang</th>
                <th>Satuan</th>
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
						////// cara ambil Button Edit ( link edit )
						echo $this->template_view->getEditButton(base_url().$this->uri->segment(1)."/edit/".$showData->ID_BARANG);
						?>
						&nbsp;
						<?php
						////// cara ambil Button Delete (pesan yang ingin ditampilkan, link Delete)
						echo $this->template_view->getDeleteButton($showData->NAMA_BARANG,base_url().$this->uri->segment(1)."/delete/".$showData->ID_BARANG);
						?>
					</td>
					<td align="center"><?php echo $no; ?>.</td>
					<td ><?php echo $showData->KODE_BARANG; ?></td>
					<td ><?php echo $showData->NAMA_BARANG; ?></td>
					<td ><?php echo $showData->KETERANGAN_BARANG; ?></td>
					<td ><?php echo $showData->JUMLAH_STOK; ?> </td>
          <td><?php echo $showData->NAMA_SATUAN_BARANG; ?></td>
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
