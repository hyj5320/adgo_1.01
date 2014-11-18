<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
$login = array(
	'name'	=> 'login',
	'id'	=> 'login',
	'value' => set_value('login'),
	'maxlength'	=> 80,
	'size'	=> 30,
);

$password = array(
	'name'	=> 'password',
	'id'	=> 'password',
	'size'	=> 30,
);

$captcha = array(
		'name'	=> 'captcha',
		'id'	=> 'captcha',
		'maxlength'	=> 8,
);
?>

<script type="text/javascript">
	function clear(){
	}
</script>
		
<meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
<?php echo form_open($this->uri->uri_string()); ?>
	
 	<div id="content">

 		<section class="page-top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="breadcrumb">
							<li><a href="<?php echo base_url()?>">Home</a></li>
							<li class="active">Log In</li>
						</ul>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12">
						<h2>Log In</h2>
					</div>
				</div>
			</div>
		</section>
 		<div class="container">
 			<div class="row">
 				<div class="col-md-4"></div>
 				<div class="col-md-4">
	   	 			<div id="check-login-form" class="login-col" style="height: 600px;">
				   	     <h4>LOGIN</h4>
				         <div class="form-group" >
				           	<input type="text" name="login" value="" placeholder="Email"  class="form-control input-hg input-login-form" onclick="clear();">
				           	<label id="id_error" style="color: red;"><?php echo form_error($login['name']); ?><?php echo isset($errors[$login['name']])?$errors[$login['name']]:''; ?></label>
				            <span class="fui-mail login-form-icon"></span>
				          </div>
				          
				          <div class="form-group">
			           		 <input type="password" name="password"  value="" placeholder="Password" class="form-control input-hg input-login-form" onclick="clear();">
			           		 <label id="pw_error" style="color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></label>
			           		 <span class="fui-lock login-form-icon"></span>
			       		  </div>
			       		  
			       		  <?php if ($show_captcha) {
								if ($use_recaptcha) { ?>
									<table border="0">
										<tr>
											<td>
												<div id="recaptcha_image"></div>
											</td>
											<td>
												<a href="javascript:Recaptcha.reload()">Get another CAPTCHA</a>
												<div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')">Get an audio CAPTCHA</a></div>
												<div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')">Get an image CAPTCHA</a></div>
											</td>
										</tr>
										<tr>
											<td>
												<div class="recaptcha_only_if_image">Enter the words above</div>
												<div class="recaptcha_only_if_audio">Enter the numbers you hear</div>
											</td>
											<td><input type="text" id="recaptcha_response_field" name="recaptcha_response_field" /></td>
											<td style="color: red;"><?php echo form_error('recaptcha_response_field'); ?></td>
											<?php echo $recaptcha_html; ?>
										</tr>
										<?php } else { ?>
										<tr>
											<td>
												<p style="text-align: center;">Enter Authentication Code</p>
												<?php echo $captcha_html; ?>
											</td>
										</tr>
										<tr>
											<td><div style="margin-top: 10px;"><input type="text" name="captcha"  value="" placeholder="" class="form-control input-hg input-login-form"></div></td>
											<td style="color: red;"><?php echo form_error($captcha['name']); ?></td>
										</tr>
									</table>
							<?php }
						  } ?>
			       		  
			       		  <div style="margin-top: 20px;">
			            		<ul>
				                	<li><a href="<?php echo base_url()?>auth/forgot_password" title="">Forget your password?</a></li>
				                </ul>
			               </div>
						                	
			       		  <button class="btn btn-block btn-primary" type="submit">LOGIN</button>
					      
	     			 </div>
	      		</div>
	      	</div>
	      <div>
		<?php echo form_close(); ?>
 	</div>
	 	
		<div id="footerBlock"></div>
		 
	</div>
</div>
