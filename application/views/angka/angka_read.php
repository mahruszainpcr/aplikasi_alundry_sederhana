<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Angka Read</h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <table class="table">
	    <tr><td>A</td><td><?php echo $A; ?></td></tr>
	    <tr><td>B</td><td><?php echo $B; ?></td></tr>
	    <tr><td>C</td><td><?php echo $C; ?></td></tr>
	    <tr><td></td><td><a href="<?php echo site_url('angka') ?>" class="btn btn-default">Cancel</a></td></tr>
	</table><?php $this->load->view('templates/footer');?>