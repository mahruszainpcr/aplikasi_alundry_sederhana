<?php $this->load->view('templates/header');?>
        <div class="row" style="margin-bottom: 20px;">
        <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;width:100%}
.tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  overflow:hidden;padding:10px 5px;word-break:normal;}
.tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
  font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
.tg .tg-0r18{border-color:inherit;font-size:14px;text-align:center;vertical-align:top}
.tg .tg-8ot9{border-color:inherit;font-size:15px;text-align:center;vertical-align:top}
.tg .tg-ev0v{background-color:#dae8fc;border-color:inherit;font-weight:bold;text-align:left;vertical-align:top}
.tg .tg-c3ow{border-color:inherit;text-align:center;vertical-align:top}
.tg .tg-0pky{border-color:inherit;text-align:left;vertical-align:top}
.tg .tg-n533{background-color:#dae8fc;border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-lku7{background-color:#00d2cb;border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
.tg .tg-feq9{background-color:#9698ed;border-color:inherit;font-weight:bold;text-align:center;vertical-align:top}
</style>
<table class="tg">
<thead>
  <tr>
    <th class="tg-0r18" colspan="8"><span style="font-weight:bold">LAUNDRY TRANSFORMER</span></th>
  </tr>
</thead>
<tbody>
  <tr>
    <td class="tg-8ot9" colspan="8"><span style="font-weight:bold">LAPORAN TRANSAKSI CUCIAN</span></td>
  </tr>
  <tr>
    <td class="tg-c3ow" colspan="8">Jln. Durian No.35 Pekanbaru Riau</td>
  </tr>
  <tr>
    <td class="tg-0pky" colspan="8"></td>
  </tr>
  <tr>
    <td class="tg-n533">No</td>
    <td class="tg-ev0v">Nomor Faktur Cucian</td>
    <td class="tg-ev0v">Tanggal Faktur Cucian</td>
    <td class="tg-ev0v">Nama Pelanggan</td>
    <td class="tg-ev0v">Jenis Pelanggan</td>
    <td class="tg-ev0v">Jumlah Kilo</td>
    <td class="tg-ev0v">Diskon</td>
    <td class="tg-ev0v">Total Harga</td>
  </tr>
  <?php
    $laporan=$this->db->query("SELECT * FROM `Pelanggan`,transaksi_pencucian WHERE Pelanggan.Kode_Pelanggan=transaksi_pencucian.Kode_Pelanggan")->result();
    $totalHarganya=0;
    $totalDiskonnya=0;
    foreach ($laporan as $key => $value) {
        $totalHarganya+=$value->Total_Harga;
        $totalDiskonnya+=$value->Diskon;
        ?>
     <tr>
    <td class="tg-c3ow"><?php echo $key+1; ?></td>
    <td class="tg-0pky"><?php echo $value->No_Faktur; ?></td>
    <td class="tg-0pky"><?php echo $value->Tanggal_Faktur; ?></td>
    <td class="tg-0pky"><?php echo $value->Nama_Pelanggan; ?></td>
    <td class="tg-0pky"><?php echo $value->Jenis_Pelanggan; ?></td>
    <td class="tg-0pky"><?php echo $value->Jumlah_Kilo; ?></td>
    <td class="tg-0pky"><?php echo $value->Diskon; ?></td>
    <td class="tg-0pky"><?php echo $value->Total_Harga; ?></td>
  </tr>
        <?php
    }
  ?>
 
  <tr>
    <td class="tg-lku7" colspan="6">Total Diskon</td>
    <td class="tg-0pky"><?php echo $totalDiskonnya; ?></td>
    <td class="tg-0pky"></td>
  </tr>
  <tr>
    <td class="tg-feq9" colspan="7">Total Harga</td>
    <td class="tg-0pky"><?php echo $totalHarganya; ?></td>
  </tr>
</tbody>
</table>
        </div>
<?php $this->load->view('templates/footer'); ?>