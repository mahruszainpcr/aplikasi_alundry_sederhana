<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Transaksi pencucian Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>No Faktur</td><td><?php echo $No_Faktur; ?></td></tr>
	    <tr><td>Tanggal Faktur</td><td><?php echo $Tanggal_Faktur; ?></td></tr>
	    <tr><td>Kode Pelanggan</td><td><?php echo $Kode_Pelanggan; ?></td></tr>
	    <tr><td>Jenis Paket</td><td><?php echo $Jenis_Paket; ?></td></tr>
	    <tr><td>Harga</td><td><?php echo $Harga; ?></td></tr>
	    <tr><td>Jumlah Kilo</td><td><?php echo $Jumlah_Kilo; ?></td></tr>
	    <tr><td>Diskon</td><td><?php echo $Diskon; ?></td></tr>
	    <tr><td>Total Harga</td><td><?php echo $Total_Harga; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('transaksi_pencucian') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>