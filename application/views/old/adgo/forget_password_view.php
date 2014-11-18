<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

		<div id="content">
			<div class="check-Password-text">
				<p>Use the form below to retrieve your password.</p>
				<p>Access to the email address associated with your account is
					required.</p>
			</div>
			
			<div class="contentCenterLine"></div>
			
			<div class="form-check-Password">
				<?php echo form_open('auth/forgot_password');?>
				<label>Email</label>
				<div class="form-password-btn" style="">
					<button class="btn btn-lg btn-block btn-inverse" type="submit" >Submit</button>
				</div>
				<div class="form-password-input" style="">
					<input name="email" type="text" value="" placeholder="" class="form-control ">
				</div>
				<?php echo form_close(); ?>
			</div>
		</div>

 	<div id="footerBlock" style="height: 330px;"></div>
	</div>
</div>
