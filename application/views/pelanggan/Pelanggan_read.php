<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Pelanggan Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>Kode Pelanggan</td><td><?php echo $Kode_Pelanggan; ?></td></tr>
	    <tr><td>Nama Pelanggan</td><td><?php echo $Nama_Pelanggan; ?></td></tr>
	    <tr><td>Alamat Pelanggan</td><td><?php echo $Alamat_pelanggan; ?></td></tr>
	    <tr><td>Nomor HP</td><td><?php echo $Nomor_HP; ?></td></tr>
	    <tr><td>Jenis Pelanggan</td><td><?php echo $Jenis_Pelanggan; ?></td></tr>
	    <tr><td>Tanggal Aktif</td><td><?php echo $Tanggal_Aktif; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('pelanggan') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>