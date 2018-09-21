<table width="100%">
  <tr>
    <td width="25%" align=center>
      <img src="<?=base_url();?>assets/img/logo_royal.png">
    </td>
    <td>
      <table width="100%">
        <tr>
          <td width="100%" align=center>
                <span style="font-size:20px;">Rumah Sakit Royal Surabaya</span><br>
                <br>
                <span style="font-size:12px;">
                  Rungkut Industri 1/1, Surabaya, Indonesia<br>
                Phone : (+62 31) 8476111<br>
                email : info@rsroyalsurabaya.com
                </span>

          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
<hr>
<br>
<br>
<table width="100%" border="1" style="border-collapse:collapse;font-size:12px;" >
  <tr>
    <th >Kode Barang</th>
    <th>Nama Barang</th>
    <th width="10%">Stok Barang</th>
    <th>Satuan</th>
  </tr>
  <?php
  $no = 1;
  foreach($this->showData as $showData ){
  //var_dump($showData);
  ?>
  <tr>
    <td ><?php echo $showData->KODE_BARANG; ?></td>
    <td ><?php echo $showData->NAMA_BARANG; ?></td>
    <td align="right" ><?php echo $showData->JUMLAH_STOK; ?> </td>
    <td><?php echo $showData->NAMA_SATUAN_BARANG; ?></td>
  </tr>
  <?php
  $no++;
  }
  ?>
</table>
