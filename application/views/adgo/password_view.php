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
            	<?php echo form_open($this->uri->uri_string()); ?>
            	<div class="newsite" >
            	<h1 class="newsitelTitle">Update Password</h1>
					<div class="newsiteinner" >
					    <p >
					    	<label>Old Password </label>
					    	<input type="password" name="old_password" value="" placeholder="" class="form-control">
					    </p>
						<label style="width: 500px;margin-left: 5px;"><?php echo form_error($old_password['name']); ?><?php echo isset($errors[$old_password['name']])?$errors[$old_password['name']]:''; ?></label>
					</div>
					
					<div class="newsiteinner" >
         		   		<p >
         		   			<label>New Password </label>
         		   			<input type="password" name="new_password" value="" placeholder="" class="form-control">
         		   		</p>
		         		<label style="width: 500px;margin-left: 5px;"><?php echo form_error($new_password['name']); ?><?php echo isset($errors[$new_password['name']])?$errors[$new_password['name']]:''; ?></label>
         		   	</div>
         		   	
         		   	<div class="newsiteinner" >
         		   		<p>
         		   			<label style="line-height:1.5;">Confirm New Password </label>
         		   			<input type="password" name="confirm_new_password" value="" placeholder="" class="form-control">
         		   		</p>
		         		<label style="width: 500px;margin-left: 5px;"><?php echo form_error($confirm_new_password['name']); ?><?php echo isset($errors[$confirm_new_password['name']])?$errors[$confirm_new_password['name']]:''; ?></label>
         		   	</div>
         		   		
         		   	<div class="form-ewsite-btn">
         		   		<button class="btn btn-lg btn-block btn-inverse" type="submit" name="change">Submit</button>
         		   	</div>
	         	</div>
	         	<?php echo form_close(); ?>
	         <!-- CONTENTS END -->
	         </div> 
 		 </div>
	 	<div id="footerBlock"></div>
	</div>
</div>
<!-- HEAD END -->
