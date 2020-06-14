<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Transaksi pencucian <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">No Faktur <?php echo form_error('No_Faktur') ?></label>
            <input type="text" class="form-control" name="No_Faktur" id="No_Faktur" placeholder="No Faktur" value="<?php echo $No_Faktur; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tanggal Faktur <?php echo form_error('Tanggal_Faktur') ?></label>
            <input type="date" class="form-control" name="Tanggal_Faktur" id="Tanggal_Faktur" placeholder="Tanggal Faktur" value="<?php echo $Tanggal_Faktur; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Kode Pelanggan <?php echo form_error('Kode_Pelanggan') ?></label>
            <select name="Kode_Pelanggan" class="form-control">
            <?php 
            $pelanggan=$this->db->query("select * from Pelanggan")->result();
            foreach ($pelanggan as $key => $value) {
            ?>
                  <option value="<?php echo $value->Kode_Pelanggan; ?>"
                <?php
                if($Kode_Pelanggan==$value->Kode_Pelanggan){
                    echo "selected";
                }
                ?>
                ><?php echo $value->Nama_Pelanggan; ?></option>
            <?php
            }
            ?>
              
            </select>
            
        </div>
	    <div class="form-group">
            <label for="varchar">Jenis Paket <?php echo form_error('Jenis_Paket') ?></label>
            <select name="Jenis_Paket" class="form-control">
                <option value="Cucian + Setrika (Harga 10.000/kg)"
                <?php
                if($Jenis_Paket=="Cucian + Setrika (Harga 10.000/kg)"){
                    echo "selected";
                }
                ?>
                >Cucian + Setrika (Harga 10.000/kg)</option>
                <option value="Cuci Saja (Harga 6.000/kg)"
                <?php
                if($Jenis_Paket=="Cuci Saja (Harga 6.000/kg)"){
                    echo "selected";
                }
                ?>>Cuci Saja (Harga 6.000/kg)</option>
                 <option value="Setrika Saja (Harga 4.000/kg)"
                <?php
                if($Jenis_Paket=="Setrika Saja (Harga 4.000/kg)"){
                    echo "selected";
                }
                ?>>Setrika Saja (Harga 4.000/kg)</option>
            </select>
            
        </div>
	    <!-- <div class="form-group">
            <label for="double">Harga <?php echo form_error('Harga') ?></label>
            <input type="text" class="form-control" name="Harga" id="Harga" placeholder="Harga" value="<?php echo $Harga; ?>" />
        </div> -->
	    <div class="form-group">
            <label for="double">Jumlah Kilo <?php echo form_error('Jumlah_Kilo') ?></label>
            <input type="text" class="form-control" name="Jumlah_Kilo" id="Jumlah_Kilo" placeholder="Jumlah Kilo" value="<?php echo $Jumlah_Kilo; ?>" />
        </div>
	    <!-- <div class="form-group">
            <label for="double">Diskon <?php echo form_error('Diskon') ?></label>
            <input type="text" class="form-control" name="Diskon" id="Diskon" placeholder="Diskon" value="<?php echo $Diskon; ?>" />
        </div> -->
	    <!-- <div class="form-group">
            <label for="double">Total Harga <?php echo form_error('Total_Harga') ?></label>
            <input type="text" class="form-control" name="Total_Harga" id="Total_Harga" placeholder="Total Harga" value="<?php echo $Total_Harga; ?>" />
        </div> -->
	    <input type="hidden" name="id_transaksi" value="<?php echo $id_transaksi; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('transaksi_pencucian') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>