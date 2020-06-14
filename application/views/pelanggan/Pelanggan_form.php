<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Pelanggan <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Kode Pelanggan <?php echo form_error('Kode_Pelanggan') ?></label>
            <input type="text" class="form-control" name="Kode_Pelanggan" id="Kode_Pelanggan" placeholder="Kode Pelanggan" value="<?php echo $Kode_Pelanggan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nama Pelanggan <?php echo form_error('Nama_Pelanggan') ?></label>
            <input type="text" class="form-control" name="Nama_Pelanggan" id="Nama_Pelanggan" placeholder="Nama Pelanggan" value="<?php echo $Nama_Pelanggan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Alamat Pelanggan <?php echo form_error('Alamat_pelanggan') ?></label>
            <input type="text" class="form-control" name="Alamat_pelanggan" id="Alamat_pelanggan" placeholder="Alamat Pelanggan" value="<?php echo $Alamat_pelanggan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Nomor HP <?php echo form_error('Nomor_HP') ?></label>
            <input type="text" class="form-control" name="Nomor_HP" id="Nomor_HP" placeholder="Nomor HP" value="<?php echo $Nomor_HP; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Pelanggan <?php echo form_error('Jenis_Pelanggan') ?></label>
            <select name="Jenis_Pelanggan" class="form-control">
                <option value="General"
                <?php
                if($Jenis_Pelanggan=="General"){
                    echo "selected";
                }
                ?>
                >General</option>
                <option value="Platinum"
                <?php
                if($Jenis_Pelanggan=="Platinum"){
                    echo "selected";
                }
                ?>>Platinum</option>
            </select>
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Aktif <?php echo form_error('Tanggal_Aktif') ?></label>
            <input type="date" class="form-control" name="Tanggal_Aktif" id="Tanggal_Aktif" placeholder="Tanggal Aktif" value="<?php echo $Tanggal_Aktif; ?>" />
        </div>
	    <input type="hidden" name="id_pelanggan" value="<?php echo $id_pelanggan; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pelanggan') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>