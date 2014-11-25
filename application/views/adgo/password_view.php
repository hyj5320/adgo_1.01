<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
$old_password = array(
	'name'	=> 'old_password',
	'id'	=> 'old_password',
	'value' => set_value('old_password'),
	'size' 	=> 30,
);
$new_password = array(
	'name'	=> 'new_password',
	'id'	=> 'new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'adgo_auth'),
	'size'	=> 30,
);
$confirm_new_password = array(
	'name'	=> 'confirm_new_password',
	'id'	=> 'confirm_new_password',
	'maxlength'	=> $this->config->item('password_max_length', 'adgo_auth'),
	'size' 	=> 30,
);
?>


<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li class="active">PASSWORD</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Change Password</h2>
			</div>
		</div>
	</div>
</section>


<div id="content">
	<div class="container">
		<div class="row">
			<?php echo form_open($this->uri->uri_string()); ?>
			<div class="col-md-3">
           	</div>     
			<div class="col-md-6">
				<div class="panel-body">
					<div class="form-horizontal form-bordered">
						<div class="form-group" >
					    	<label class="col-md-5 control-label" style="text-align:left">Old Password</label>
						    <div class="col-md-7">
						    	<input type="password" name="old_password" value="" placeholder="" class="form-control" id="inputDefault">
						    	<label style="color:red;"><?php echo form_error($old_password['name']); ?><?php echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; ?></label>
						    </div>	
						</div>

						<div class="form-group" >
					    	<label class="col-md-5 control-label" style="text-align:left">New Password</label>
						    <div class="col-md-7">
						    	<input type="password" name="new_password" value="" placeholder="" class="form-control" id="inputDefault">
						    	<label style="color:red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></label>
						    </div>	
						</div>

						<div class="form-group" >
					    	<label class="col-md-5 control-label" style="text-align:left">Confirm New Password</label>
						    <div class="col-md-7">
						    	<input type="password" name="confirm_new_password" value="" placeholder="" class="form-control" id="inputDefault">
						    	<label style="color:red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></label>
						    </div>	
						</div>
					   		
					   	<div class="form-group">
					   		<button class="btn btn-block btn-primary" type="submit" name="change">Submit</button>
					   	</div>
					</div>
				</div>
            </div> 
            <?php echo form_close(); ?>
 		</div>
 	</div>
 </div>	


				
<!-- CONTENTS END -->
