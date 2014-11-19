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
    
<script type="text/javascript">        
    $(document).ready(function(){
    	$("select[name='timezone1']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    	$("select[name='timezone2']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    	$("select[name='site_category']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    })
</script>
	
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
	
	<div class="container">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<section class="panel">
					<header class="panel-heading">	
						<h4 style="color:black;"><b>Publisher Information</b></h4>
					</header>
				</section>
					
				<div class="panel-body">
					<form class="form-horizontal form-bordered" method="get">
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Email</label>
							<div class="col-md-8">
								<input name="email" type="text" class="form-control" id="inputDefault">
								<?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?>
							</div>
						</div>
	
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Password</label>
							<div class="col-md-8">
								<input name="password" type="password" class="form-control" id="inputDefault">
								<?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$password[$email['name']]:''; ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Verify Password</label>
							<div class="col-md-8">
								<input name="confirm_password" type="password" class="form-control" id="inputDefault">
								<?php echo form_error($confirm_password['name']); ?><?php echo isset($errors[$confirm_password['name']])?$errors[$confirm_password['name']]:''; ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Comapny Name</label>
							<div class="col-md-8">
								<input name="company" type="text" class="form-control" id="inputDefault">
								<?php echo form_error($company['name']); ?><?php echo isset($errors[$company['name']])?$errors[$company['name']]:''; ?>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Conctact Name</label>
							<div class="col-md-8">
								<input name="username" type="text" class="form-control" id="inputDefault">
								<?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Phone Number</label>
							<div class="col-md-8">
								<input name="phone" type="text" class="form-control" id="inputDefault">
								<?php echo form_error($phone['name']); ?><?php echo isset($errors[$phone['name']])?$errors[$phone['name']]:''; ?>
							</div>
						</div>
						
						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Time Zone</label>
							<div class="col-md-8">
		     		   			<select name="timezone1" id="timezone1" class="select-block ">
		     		   				<option>Please Select...</option>
		     		   			</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">Country</label>
							<div class="col-md-8">
		     		   			<select name="timezone1" id="timezone1" class="select-block ">
		     		   				<option>Please Select...</option>
		     		   			</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-3 control-label" for="inputDefault">State</label>
							<div class="col-md-8">
								<input name="state" type="text" class="form-control" id="inputDefault">
								<?php echo form_error($state['name']); ?><?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?>
							</div>
						</div>

					</form>
				</div>
			</div>

			<div class="col-md-5">
						<div id="content">
	          <h1 class="applTitle">Publisher Application Form</h1>
	          <div class="applyFormCenterLine"></div>
	     	  <p  class="topSlog">Please answer the questions below to apply to the Mad Ads Media publisher network.</p>   

	     	  <div class="application">
	      	  		<div class="applInn">
	        	
	         		   <div class="applInfoL">
	         		   		<h3>Publisher Information</h3>
	         		   		<p ><label>Email </label><input name="email" type="text" value="" placeholder="" class="form-control"></p>
	         		   		<label style="width:430px; color: red;"><?php echo form_error($email['name']); ?><?php echo isset($errors[$email['name']])?$errors[$email['name']]:''; ?></label>
	         		   		
	         		   		<p ><label>Password </label><input name="password" type="password" value="" placeholder="" class="form-control"></p>
	         		   		<label style="width:430px; color: red;"><?php echo form_error($password['name']); ?><?php echo isset($errors[$password['name']])?$errors[$password['name']]:''; ?></label>
	         		   		
	         		   		<p ><label>Verify Password </label><input name="confirm_password" type="password" value="" placeholder="" class="form-control"></p>
	         		   		<label style="width:430px; color: red;"><?php echo form_error($confirm_password['name']); ?><?php echo isset($errors[$confirm_password['name']])?$errors[$confirm_password['name']]:''; ?></label>
	         		   		
	         		   		<p ><label>Company Name </label><input name="company" type="text" value="" placeholder="" class="form-control"></p>
	         		   		<label style="width:430px; color: red;"><?php echo form_error($company['name']); ?><?php echo isset($errors[$company['name']])?$errors[$company['name']]:''; ?></label>
	         		   		
	         		   		<p ><label>Contact Name </label><input name="username" type="text" value="" placeholder="" class="form-control"></p>
	         		   		<label style="width:430px; color: red;"><?php echo form_error($username['name']); ?><?php echo isset($errors[$username['name']])?$errors[$username['name']]:''; ?></label>
	         		   		
	         		   		<p ><label>Phone Number </label><input name="phone" type="text" value="" placeholder="" class="form-control"></p>
	         		   		<label style="width:430px; color: red;"><?php echo form_error($phone['name']); ?><?php echo isset($errors[$phone['name']])?$errors[$phone['name']]:''; ?></label>
	         		   		
	         		   		<p ><label>Time Zone </label> </p>
	         		   		<div style=" width: 315px; height: 42px;float:right;margin-right:5px">
	         		   			<select name="timezone1" id="timezone1" class="select-block ">
	         		   				<option>Please Select...</option>
	         		   			</select>
	         		   		</div>
	         		   		<label style="width:430px; color: red;"><?php echo form_error($timezone1['name']); ?><?php echo isset($errors[$timezone1['name']])?$errors[$timezone1['name']]:''; ?></label>
	         		   		
	         		   		<p ><label>Country </label> </p>
	         		   		<div style=" width: 315px; height: 42px;float:right;margin-right:5px">
	         		   			<select name="timezone2" id="timezone2" class="select-block ">
	         		   				<option>Please Select...</option>
	         		   			</select>
	         		   		</div>
	         		   		<label style="width:430px; color: red;"><?php echo form_error($timezone2['name']); ?><?php echo isset($errors[$timezone2['name']])?$errors[$timezone2['name']]:''; ?></label>
	         		   		
	         		   		<p ><label>State </label><input type="text" name="state" value="" placeholder="" class="form-control"></p>
	         		   		<label style="width:430px; color: red;"><?php echo form_error($state['name']); ?><?php echo isset($errors[$state['name']])?$errors[$state['name']]:''; ?></label>
	         		   </div>
	         
	         			<div class="applInfoR">
	         				<h3>About Your Site</h3>
	         			
	         				<div style="width: 100%;height: 30px;margin-top: 18px;">
	         					<p><label>Site Type </label></p>
	         					<label class="radio selectTypeRadio" ><input type="radio" name="site_kind" id="optionsRadios1" value="1" data-toggle="radio">WebSite</label>
	         					<label class="radio selectTypeRadio" ><input type="radio" name="site_kind" id="optionsRadios1" value="2" data-toggle="radio">Application</label>
	         					<label class="radio selectTypeRadio" ><input type="radio" name="site_kind" id="optionsRadios1" value="3" data-toggle="radio">Tumblr Account</label>
	         				</div>
	         				<label style="width:430px; color: red;"><?php echo form_error($site_kind['name']); ?><?php echo isset($errors[$site_kind['name']])?$errors[$site_kind['name']]:''; ?></label>
	         				   
	         				<p ><label>URL </label><input name="site_url" type="text" value="" placeholder="" class="form-control"></p>
	         				<label style="width:430px; color: red;"><?php echo form_error($site_url['name']); ?><?php echo isset($errors[$site_url['name']])?$errors[$site_url['name']]:''; ?></label>
	         				
	         				<p ><label>Title </label><input name="site_title" type="text" value="" placeholder="" class="form-control"></p>
	         				<label style="width:430px; color: red;"><?php echo form_error($site_title['name']); ?><?php echo isset($errors[$site_title['name']])?$errors[$site_title['name']]:''; ?></label>
	         				
	         				<p ><label>Description </label><input name="site_description" type="text" value="" placeholder="" class="form-control"></p>
	         				<label style="width:430px; color: red;"><?php echo form_error($site_description['name']); ?><?php echo isset($errors[$site_description['name']])?$errors[$site_description['name']]:''; ?></label>
	         				
	         				<p ><label>Keywords </label><input name="site_keywords" type="text" value="" placeholder="" class="form-control"></p>
	         				<label style="width:430px; color: red;"><?php echo form_error($site_keywords['name']); ?><?php echo isset($errors[$site_keywords['name']])?$errors[$site_keywords['name']]:''; ?></label>
	         				
	         				<p ><label>Category </label> </p>
         					<div style=" width: 315px; height: 42px;float:right;margin-right:5px">
	         		   			<select name="site_category" id="site_category" class="select-block ">
	         		   				<option>Please Select...</option>
	         		   			</select>
			         		   	<label style="width:430px; color: red;"><?php echo form_error($site_category['name']); ?><?php echo isset($errors[$site_category['name']])?$errors[$site_category['name']]:''; ?></label>
	         		   		</div>
	         		   	
	         		   		<div style="width: 100%;height: 30px;margin-top: 18px">
	         					<p><label>Privacy Policy </label></p>
	         					<label class="radio selectPrivacyRadio" ><input type="radio" name="privacy" id="optionsRadios1" value="1" data-toggle="radio">No</label>
	         					<label class="radio selectPrivacyRadio" ><input type="radio" name="privacy" id="optionsRadios1" value="2" data-toggle="radio">Yes</label>
         					</div>
	         				<label style="width:430px; color: red;"><?php echo form_error($privacy['name']); ?><?php echo isset($errors[$privacy['name']])?$errors[$privacy['name']]:''; ?></label>
	         					
	         				<p ><label>Daily Visits </label><input name="daily_visits" type="text" value="" placeholder="" class="form-control"></p>
	         				<label style="width:430px; color: red;"><?php echo form_error($daily_visits['name']); ?><?php echo isset($errors[$daily_visits['name']])?$errors[$daily_visits['name']]:''; ?></label>
	         				
	         				<h1 id="checkAgreeService">I agree to the Terms of Service/Publisher Guidelines         
	         				</h1>  
	         				<label class="checkbox" for="checkbox1" style="float:right;margin-top: 25px;" ><input type="checkbox" name="agree" value="1" id="checkbox1" data-toggle="checkbox"> </label>
	         				
			           		 <button name="register" class="btn btn-lg btn-block btn-info" type="submit" class="btn btn-info">APPLY</button>
			           		 
	         				<div class="clearfix"></div>
         				</div>
           		 </div>
           		 <?php echo form_close(); ?>
           		 
           		 <div class="applInn">
	           		 <div class="applyFormCenterLongLine" style="margin-left: 20px"></div>
	           		 <div class="applStrL">
	           		     <h3 style="color: #3399db">Why ADGO?</h3>
	                	<ul>
		                	<li><a href="#" title="">Optimization agree to the Terms of Service/Publisher Guidelines </a></li>
		                	<li><a href="#" title="">Optimization agree to the Terms of Service/Publisher Guidelines </a></li>
		                	<li><a href="#" title="">Optimization agree to the Terms of Service/Publisher Guidelines </a></li>
		                	<li><a href="#" title="">Optimization agree to the Terms of Service/Publisher Guidelines </a></li>
		                	<li><a href="#" title="">Optimization agree to the Terms of Service/Publisher Guidelines </a></li>
		                	<li><a href="#" title="">Optimization agree to the Terms of Service/Publisher Guidelines </a></li>
	                	</ul>
	           		 </div>
	           		 <div class="applStrR">
	           		     <h3 >Contact US</h3>
	                	 <ul>
		                	<li><a href="#" title="">Have any questions  before joining?</a></li>
		                	<li> <a href="<?php echo base_url()?>auth/contact" title="">Feel free to use the<font style="color: #DE3232">&nbsp;contact form</font> or <font style="color: #DE3232">&nbsp;email&nbsp;</font> us at</a></li>
		                 </ul>
		                	
	                	<div class="applRbox">
	                		<a href="<?php echo base_url()?>cpm/" title="">
                			<P>HOW MUCH CAN I MAKE?</P>
                			<!-- <P>See just how much revenue we can make you with our Revenue Calculator.</P> -->
                  	 		 <p class="howMuch">See just how much revenue<br> we can make you with our Revenue Calculator.</p>  
              		  		<div class="imgCalcR"></div>
              		  		<div class="clearfix"></div>
              		  		</a>
              		   </div>  
	              		  	
		           	</div>
	           	 </div>
	           	 <script type="text/javascript">
				    <?php foreach ($timezone_arr as $row){?>
						$("#timezone1").append("<option value='<?php echo $row->timezone_id;?>'><?php echo $row->timezone_name;?></option>");
					<?php }?>
					<?php foreach ($country_arr as $row){?>
						$("#timezone2").append("<option value='<?php echo $row->country_id;?>'><?php echo $row->country_name;?></option>");
					<?php }?>
					<?php foreach ($category_arr as $row){?>
						$("#site_category").append("<option value='<?php echo $row->category_id;?>'><?php echo $row->category_name;?></option>");
					<?php }?>
				</script>
	          </div>
 		 </div>

			</div>
		</div>
	</div>

 
   	<script type="text/javascript">
	    <?php foreach ($timezone_arr as $row){?>
			$("#timezone1").append("<option value='<?php echo $row->timezone_id;?>'><?php echo $row->timezone_name;?></option>");
		<?php }?>
		<?php foreach ($country_arr as $row){?>
			$("#timezone2").append("<option value='<?php echo $row->country_id;?>'><?php echo $row->country_name;?></option>");
		<?php }?>
		<?php foreach ($category_arr as $row){?>
			$("#site_category").append("<option value='<?php echo $row->category_id;?>'><?php echo $row->category_name;?></option>");
		<?php }?>
	</script>
   
	 <div id="footerBlock"></div>
	 
</div>
