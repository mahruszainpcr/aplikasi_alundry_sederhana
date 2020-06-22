<?php $this->load->view('templates/header');?>
<div class="row" style="margin-bottom: 20px">
            <div class="col-md-4">
                <h2>Angka <?php echo $button ?></h2>
            </div>
            <div class="col-md-8 text-center">
                <div id="message">
                    <?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                </div>
            </div>
        </div>
        <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="int">A <?php echo form_error('A') ?></label>
            <input type="text" class="form-control" name="A" id="A" placeholder="A" value="<?php echo $A; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">B <?php echo form_error('B') ?></label>
            <input type="text" class="form-control" name="B" id="B" placeholder="B" value="<?php echo $B; ?>" />
        </div>
	    <div class="form-group">
            <label for="int">C <?php echo form_error('C') ?></label>
            <input type="text" class="form-control" name="C" id="C" placeholder="C" value="<?php echo $C; ?>" />
        </div>
	    <input type="hidden" name="id" value="<?php echo $id; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('angka') ?>" class="btn btn-default">Cancel</a>
	</form><?php $this->load->view('templates/footer');?>