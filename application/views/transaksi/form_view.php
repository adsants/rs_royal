
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
							<label class="control-label col-sm-4" >Nama Barang :</label>
							<div class="col-sm-4">
								<input type="input" class="form-control required" id="NAMA_BARANG_AUTOCOMPLETE" placeholder="Ketikkan Kode atau Nama Barang ..." name="NAMA_BARANG">
								<input type="hidden" class="form-control required" id="ID_BARANG" name="ID_BARANG">
								<span id="dataBarang"></span>
							</div>
						</div>


						<div class="form-group">
							<label class="control-label col-sm-4" >Jumlah Barang Masuk:</label>
							<div class="col-sm-1">
								<input type="input" class="form-control required number" id="JUMLAH_TRANSAKSI"  name="JUMLAH_TRANSAKSI">
							</div>
						</div>
						<div class="form-group">
							<label class="control-label col-sm-4" >Keterangan :</label>
							<div class="col-sm-6">
								<textarea type="input" class="form-control" id="KETERANGAN" name="KETERANGAN"></textarea>
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
