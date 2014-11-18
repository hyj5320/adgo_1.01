<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
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
			<?php echo form_open($this->uri->uri_string()); ?>
			<div id="content">
		   	 <div id="check-login-form" class="login-col" style="height: 400px;">
		   	     <h4>Reset Password</h4>
		         <div class="form-group" >
		           	<input type="password" name="new_password" value="" placeholder="New Password" class="form-control">
		           	<label style="color: red;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></label>
		          </div>
		          
		          <div class="form-group">
         		   	 <input type="password" name="confirm_new_password" value="" placeholder="Confirm New Password" class="form-control">
	           		 <label style="color: red;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></label>
	       		  </div>
				                	
	       		  <button class="btn btn-lg btn-block btn-info" type="submit" class="btn btn-info">Submit</button>
		      </div>
		      
			<?php echo form_close(); ?>
	 		</div>
 		 </div>
	 	<div id="footerBlock"></div>
	</div>
</div>
<!-- HEAD END -->