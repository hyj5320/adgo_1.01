<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>


<div id="footerBlock" style="height: 330px;"></div>

	<div id="content">

 		<section class="page-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url()?>">Home</a></li>
							<li class="active">Password Lost</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Find Password</h2>
					</div>
				</div>
			</div>
		</section>
 		<div class="container">
 			<div class="row">
 				<div class="col-md-4"></div>
 				<div class="col-md-4">
	   	 			<div id="check-login-form" class="login-col" style="height: 600px;">
			   	     	<div class="check-Password-text">
							<p>Use the form below to retrieve your password.</p>
							<p>Access to the email address associated with your account is
								required.</p>
						</div>
						
						<?php echo form_open('auth/forgot_password');?>
				        <div class="form-group" >
				           	<input type="text" name="email" value="" placeholder="Email"  class="form-control input-hg input-login-form" onclick="clear();">
				           	<label id="id_error" style="color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></label>
				            <span class="fui-mail login-form-icon"></span>
				        </div>
				        
				        <button class="btn btn-block btn-primary" type="submit">Summit</button>  
						
						      
	      		</div>
	      	</div>
	      </div>
		<?php echo form_close(); ?>
 		</div>
	 	
		<div id="footerBlock"></div>
		 
	</div>
</div>
