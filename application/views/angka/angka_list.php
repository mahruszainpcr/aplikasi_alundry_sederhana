<?php $this->load->view('templates/header');?>
        <div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Angka List</h2>
            </div>
            <div class="col-md-4 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
            <div class="col-md-4 text-right">
				<div style="margin-top:20px;">
                <?php echo anchor(site_url('angka/create'), 'Create', 'class="btn btn-primary"'); ?>
	    </div></div>
        </div>
        <table class="table table-bordered table-striped" id="mytable">
            <thead>
                <tr>
                    <th width="80px">No</th>
		    <th>A</th>
		    <th>B</th>
		    <th>C</th>
            <th>D</th>
            <th>E</th>
		    <th width="200px">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($data as $key => $value) {
                    ?>
                    <tr>
                    <th width="80px"><?php echo $key+1; ?></th>
		    <th><?php echo $value->A;?></th>
		    <th><?php echo $value->B;?></th>
		    <th><?php echo $value->C;?></th>
            <th><?php $D=sqrt(pow($value->A*$value->B,4));echo $D;?></th>
            <th><?php echo ($value->C*pow($D,2))/2;?></th>
		    <th width="200px">
                    <a href="<?php echo site_url('angka/update/'.$value->id); ?>" class="btn btn-warning">Edit</a>
                    <a href="<?php echo site_url('angka/delete/'.$value->id); ?>" class="btn btn-danger">Hapus</a>
            </th>
            </tr>
                    <?php
                }
                ?>
            </tbody>
	    
        </table><?php $this->load->view('templates/footer'); ?><script type="text/javascript">
           