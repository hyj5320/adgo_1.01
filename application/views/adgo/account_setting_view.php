<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<script type="text/javascript">        
    	function modefiTextArea(){
    		checked = $('#notifications').is(":checked");
    		var noti;
    		if(checked) noti = '1';
    		else noti = '0'
    		$('[name=notifications]').val(noti);
    	}
</script>

<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li class="active">Account Setting</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Account Infomation</h2>
			</div>
		</div>
	</div>
</section>


<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-3">
           	</div>     
			<div class="col-md-6">
				<div class="panel-body">
					<?php
					$attributes = array('name' =>'updateform', 'id' => '');
					echo form_open("con_info/update", $attributes); 
					?>
					
					<div class="form-horizontal form-bordered">
						
						<div class="form-group" >
					    	<label class="col-md-5 control-label" style="text-align:left">Contact Name</label>
						    <div class="col-md-7">
						    	<input type="text" name="username" value="" placeholder="" class="form-control" id="inputDefault">
						    </div>							
						</div>

						<div class="form-group" >
					    	<label class="col-md-5 control-label" style="text-align:left">Company</label>
						    <div class="col-md-7">
						    	<input type="text" name="company" value="" placeholder="" class="form-control" id="inputDefault">
						    </div>							
						</div>

						<div class="form-group" >
					    	<label class="col-md-5 control-label" style="text-align:left">Email</label>
						    <div class="col-md-7">
						    	<input type="text" name="email" value="" placeholder="" class="form-control" id="inputDefault">
						    </div>							
						</div>

						<div class="form-group" >
					    	<label class="col-md-5 control-label" style="text-align:left">Phone</label>
						    <div class="col-md-7">
						    	<input type="text" name="phone" value="" placeholder="" class="form-control" id="inputDefault">
						    </div>							
						</div>

						<div class="form-group" >
					    	<label class="col-md-5 control-label" style="text-align:left">Notifications</label>
						    <div class="col-md-7">
						    	<label class="checkbox" for="checkbox1" style="float:right;">
						    		
						    		<input type="checkbox" data-toggle="checkbox" id="notifications" value="" placeholder="" id="inputDefault">
						    	</label>
						    </div>							
						</div>
						
						<div class="form-group">
							<div class="col-md-12">
								<a href="<?php echo base_url()?>auth/change_password">Link to password change</a><br>
								<a href="<?php echo base_url()?>new_site/">Link to add new site</a><br>
							</div>
						</div>
						<button class="btn btn-block btn-primary" type="submit">Submit</button>
		
					</div>
					<?php echo form_close(); ?>
					
				</div>
            </div> 
 		</div>
 	</div>
 </div>		



	         	
<script type="text/javascript">
	$('[name=username]').val('<?php echo $username?>');
	$('[name=company]').val('<?php echo $company?>');
	$('[name=email]').val('<?php echo $email?>');
	$('[name=phone]').val('<?php echo $phone?>');
	if(<?php echo $notifications;?> > 0){
	    $("input:checkbox[id='notifications']").attr("checked", true);
	}
</script>