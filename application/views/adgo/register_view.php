<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<?php
$email = array(
		'name'	=> 'email',
		'id'	=> 'email',
		'value'	=> set_value('email'),
		'maxlength'	=> 80,
		'size'	=> 30,
);
$password = array(
		'name'	=> 'password',
		'id'	=> 'password',
		'value' => set_value('password'),
		'maxlength'	=> $this->config->item('password_max_length', 'adgo_auth'),
		'size'	=> 30,
);
$confirm_password = array(
		'name'	=> 'confirm_password',
		'id'	=> 'confirm_password',
		'value' => set_value('confirm_password'),
		'maxlength'	=> $this->config->item('password_max_length', 'adgo_auth'),
		'size'	=> 30,
);

$company = array(
		'name'	=> 'company',
		'id'	=> 'company',
		'value' => set_value('company'),
		'maxlength'	=> $this->config->item('company'),
		'size'	=> 30,
);

$username = array(
	'name'	=> 'username',
	'id'	=> 'username',
	'value' => set_value('username'),
	'maxlength'	=> $this->config->item('username_max_length', 'adgo_auth'),
	'size'	=> 30,
);

$phone = array(
	'name'	=> 'phone',
	'id'	=> 'phone',
	'value' => set_value('phone'),
	'maxlength'	=> '13',
	'size'	=> 30,
);

$state = array(
		'name'	=> 'state',
		'id'	=> 'state',
		'value' => set_value('state'),
		'maxlength'	=> '30',
		'size'	=> 30,
);

$site_url = array(
	'name'	=> 'site_url',
	'id'	=> 'site_url',
	'value' => set_value('site_url'),
	'maxlength'	=> '30',
	'size'	=> 30,
);

$site_title = array(
		'name'	=> 'site_title',
		'id'	=> 'site_title',
		'value' => set_value('site_title'),
		'maxlength'	=> '30',
		'size'	=> 30,
);

$site_description = array(
		'name'	=> 'site_description',
		'id'	=> 'site_description',
		'value' => set_value('site_description'),
		'maxlength'	=> '30',
		'size'	=> 30,
);

$site_keywords = array(
		'name'	=> 'site_keywords',
		'id'	=> 'site_keywords',
		'value' => set_value('site_keywords'),
		'maxlength'	=> '30',
		'size'	=> 30,
);

$daily_visits = array(
		'name'	=> 'daily_visits',
		'id'	=> 'daily_visits',
		'value' => set_value('daily_visits'),
		'maxlength'	=> '30',
		'size'	=> 30,
);

$timezone1 = array(
		'name'	=> 'timezone1',
		'id'	=> 'timezone1',
		'value' => set_value('timezone1'),
		'maxlength'	=> '5',
		'size'	=> 5,
);

$timezone2 = array(
		'name'	=> 'timezone2',
		'id'	=> 'timezone2',
		'value' => set_value('timezone2'),
		'maxlength'	=> '5',
		'size'	=> 5,
);

$site_kind = array(
		'name'	=> 'site_kind',
		'id'	=> 'site_kind',
		'value' => set_value('site_kind'),
		'maxlength'	=> '5',
		'size'	=> 5,
);

$site_category = array(
		'name'	=> 'site_category',
		'id'	=> 'site_category',
		'value' => set_value('site_category'),
		'maxlength'	=> '5',
		'size'	=> 5,
);

$privacy = array(
		'name'	=> 'privacy',
		'id'	=> 'privacy',
		'value' => set_value('privacy'),
		'maxlength'	=> '5',
		'size'	=> 5,
);

?>

<?php $attributes = array('name' => 'tx_editor_form', 'id' => 'tx_editor_form');?>
<?php echo form_open($this->uri->uri_string(), $attributes); ?>
    

	
<div id="content">

	<section class="page-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url()?>">Home</a></li>
						<li class="active">Apply Now</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h2>Application Form</h2>
				</div>
			</div>
		</div>
	</section>
	
	<div class="container" style="text-align:left;">
		<div class="row">
			<div class="col-md-6">
				<section class="panel">
					<header class="panel-heading">	
						<h4 style="color:black;"><b>Publisher Information</b></h4>
					</header>
				</section>
					
				<div class="panel-body">
					<div class="form-horizontal form-bordered">
						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Email</label>
							<div class="col-md-7">
								<input name="email" type="text" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></label>
							</div>
						</div>
	
						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Password</label>
							<div class="col-md-7">
								<input name="password" type="password" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$password[$email['name']]:''; ?></label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Verify Password</label>
							<div class="col-md-7">
								<input name="confirm_password" type="password" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($confirm_password['name']); ?><?php echo isset($errors[$confirm_password['name']])?$errors[$confirm_password['name']]:''; ?></label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Comapny Name</label>
							<div class="col-md-7">
								<input name="company" type="text" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($company['name']); ?><?php echo isset($errors[$company['name']])?$errors[$company['name']]:''; ?></label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Conctact Name</label>
							<div class="col-md-7">
								<input name="username" type="text" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></label>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Phone Number</label>
							<div class="col-md-7">
								<input name="phone" type="text" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($phone['name']); ?><?php echo isset($errors[$phone['name']])?$errors[$phone['name']]:''; ?></label>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Time Zone</label>
							<div class="col-md-7">
		     		   			<select name="timezone1" id="timezone1" class="form-control">
		     		   				<option>Please Select...</option>
		     		   			</select>
		     		   			<label style="color:red;"><?php echo form_error($timezone1['name']); ?><?php echo isset($errors[$timezone1['name']])?$errors[$timezone1['name']]:''; ?></label>
							</div>
							
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Country</label>
							<div class="col-md-7">
		     		   			<select name="timezone2" id="timezone2" class="form-control">
		     		   				<option>Please Select...</option>
		     		   			</select>
							<label style="color:red;"><?php echo form_error($timezone2['name']); ?><?php echo isset($errors[$timezone2['name']])?$errors[$timezone2['name']]:''; ?></label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">State</label>
							<div class="col-md-7">
								<input name="state" type="text" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($state['name']); ?><?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?></label>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6">
				
				<section class="panel">
					<header class="panel-heading">	
						<h4 style="color:black;"><b>About Your Site</b></h4>
					</header>
				</section>
				
				<div class="panel-body">
					<div class="form-horizontal form-bordered">

						<!--  radio -->
						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Site Type</label>
							<div class="col-md-8">
								<div class="radio">
		         					<label style="margin-right:3px">
		         						<input type="radio" name="site_kind" id="optionsRadios1" value="1" data-toggle="radio">WebSite
		         					</label>
		         					<label style="margin-right:3px">
		         						<input type="radio" name="site_kind" id="optionsRadios1" value="2" data-toggle="radio">Application
		         					</label>
		         					<label>
		         						<input type="radio" name="site_kind" id="optionsRadios1" value="3" data-toggle="radio">Tumblr Account											
									</label>
								</div>
								<label style="color:red;"><?php echo form_error($site_kind['name']); ?><?php echo isset($errors[$site_kind['name']])?$errors[$site_kind['name']]:''; ?></label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">URL</label>
							<div class="col-md-7">
								<input name="site_url" type="text" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($site_url['name']); ?><?php echo isset($errors[$site_url['name']])?$errors[$site_url['name']]:''; ?></label>
							</div>
						</div>
	
						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Title</label>
							<div class="col-md-7">
								<input name="site_title" type="text" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($site_title['name']); ?><?php echo isset($errors[$site_title['name']])?$errors[$site_title['name']]:''; ?></label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Description</label>
							<div class="col-md-7">
								<input name="site_description" type="text" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($site_description['name']); ?><?php echo isset($errors[$site_description['name']])?$errors[$site_description['name']]:''; ?></label>
							</div>
						</div>
	
						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Keywords</label>
							<div class="col-md-7">
								<input name="site_keywords" type="text" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($site_keywords['name']); ?><?php echo isset($errors[$site_keywords['name']])?$errors[$site_keywords['name']]:''; ?></label>
							</div>
						</div>
						

						<!-- option -->
						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Category</label>
							<div class="col-md-7">
		     		   			<select name="site_category" id="site_category" class="form-control">
		     		   				<option>Please Select...</option>
		     		   			</select>
							<label style="color:red;"><?php echo form_error($site_category['name']); ?><?php echo isset($errors[$site_category['name']])?$errors[$site_category['name']]:''; ?></label>
							</div>
						</div>
			
						<!--  radio -->
						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Privacy Policy</label>
							<div class="col-md-7">
								<div class="radio">
		         					<label style="margin-right:10px">
		         						<input type="radio" name="privacy" id="optionsRadios1" value="1" data-toggle="radio">No
		         					</label>
		         					<label>
		         						<input type="radio" name="privacy" id="optionsRadios1" value="2" data-toggle="radio">Yes
		         					</label>
		         				</div>
		         				<label style="color:red;"><?php echo form_error($privacy['name']); ?><?php echo isset($errors[$privacy['name']])?$errors[$privacy['name']]:''; ?></label>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label" style="text-align:left">Daily Visits</label>
							<div class="col-md-7">
								<input name="daily_visits" type="text" class="form-control" id="inputDefault">
								<label style="color:red;"><?php echo form_error($daily_visits['name']); ?><?php echo isset($errors[$daily_visits['name']])?$errors[$daily_visits['name']]:''; ?></label>
							</div>
						</div>
					</div>
				</div>
				

				<!--  check box with new window -->
				<div class="form-group">
					<label class="col-md-10 control-label" style="text-align:left"><b>I agree to the Terms of Service/Publisher Guidelines</b>
							<input type="checkbox" name="agree" value="1" id="agree" data-toggle="checkbox" style="margin-left:30px" onchange= "viewTerm()" >  <!-- viewTerm() -->
					</label>
					
				</div>
				
				<div>
					<button name="register" class="btn btn-block btn-primary" type="submit">APPLY</button>
				</div>
				 <?php echo form_close(); ?>
			</div>
		</div>
	</div>

 
   	<script type="text/javascript">

   		//fancy box 
   		$(document).ready(function() {
		$(".fancybox").fancybox();
		$("select[name='timezone1']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    	$("select[name='timezone2']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    	$("select[name='site_category']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
		});

	    <?php foreach ($timezone_arr as $row){?>
			$("#timezone1").append("<option value='<?php echo $row->timezone_id;?>'><?php echo $row->timezone_name;?></option>");
		<?php }?>
		<?php foreach ($country_arr as $row){?>
			$("#timezone2").append("<option value='<?php echo $row->country_id;?>'><?php echo $row->country_name;?></option>");
		<?php }?>
		<?php foreach ($category_arr as $row){?>
			$("#site_category").append("<option value='<?php echo $row->category_id;?>'><?php echo $row->category_name;?></option>");
		<?php }?>

	    <?php foreach ($timezone_arr as $row){?>
			$("#timezone1").append("<option value='<?php echo $row->timezone_id;?>'><?php echo $row->timezone_name;?></option>");
		<?php }?>
		<?php foreach ($country_arr as $row){?>
			$("#timezone2").append("<option value='<?php echo $row->country_id;?>'><?php echo $row->country_name;?></option>");
		<?php }?>
		<?php foreach ($category_arr as $row){?>
			$("#site_category").append("<option value='<?php echo $row->category_id;?>'><?php echo $row->category_name;?></option>");
		<?php }?>
	
	    function viewTerm()
	    {
	        if($('#agree:checked').val() == 1)
	        { 
	           
	            $.fancybox({
	                    'width'	: '60%',
	                    'height': '50%',
	                    'href'  : '<?php echo base_url()?>images/term.php',
	                    'autoScale'     : false,
	                    'transitionIn'  : 'none',
	                    'transitionOut'	: 'none',
	                    'type'		: 'iframe'
	            });  
	       

	            $('#error_term').css('display', 'none');
	        }
    	}
	</script>
   
	<div id="footerBlock"></div>
	 

</div>

<!-- Add jQuery library -->
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>

<!-- Add mousewheel plugin (this is optional) -->
<script type="text/javascript" src="/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>

<!-- Add fancyBox -->
<link rel="stylesheet" href="/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
<script type="text/javascript" src="/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>

<!-- Optionally add helpers - button, thumbnail and/or media -->
<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

<link rel="stylesheet" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>


