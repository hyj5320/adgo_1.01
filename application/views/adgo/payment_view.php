<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

    
<script type="text/javascript">        
    $(document).ready(function(){
    	$("select[name='country']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    	$("select[name='state_or_province']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    	$("select[name='minimum_payment_amount']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    	$("select[name='payment_method']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    })
</script>
<script type="text/javascript">
	function update() {
		var method = $('[name=payment_method]').val();
		if(method == '2'){
			if($('[name=paypal_email]').val().length < 1){
				alert("Paypal Email");
				return;
			}
		}
		else if(method == '3'){
			if($('[name=account_number]').val() != $("#confirm_account_number").val()){
				alert("Account Number");
				return;
			}
			if($('[name=routing_number]').val() != $("#confirm_routing_number").val()){
				alert("Routing Number");
				return;
			}
		}
		document.updateform.submit();
	}
</script>
	

<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li class="active">PAYMENT PROFILE</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Payment Profile Update</h2>
			</div>
		</div>
	</div>
</section>


<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<div class="panel-heading panel">
			    	<h4 style="color:black;"><b>General Information</b></h3>
				</div>
				<div class="panel-body">
					<div class="form-horizontal form-bordered">
						<div class="form-group">
							<div class="col-md-4 control-label" style="text-align:left;">Payee Name</div>
							<div class="col-md-7">
								<input name="payee_name" id="payee_name inputDefault" type="text"  placeholder="" class="form-control" value="">	
								<label></label>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-4 control-label" style="text-align:left;">Privacy Policy</div>
							<div class="col-md-7">
								<div class="radio">
									<label for="radio" style="margin-right:10px;">
										<input name="privacy_policy" type="radio" id="optionsRadios1" value="0" data-toggle="radio">
										Individual/Sole Proprietor
									</label>
									<label for="radio">
										<input name="privacy_policy" type="radio" id="optionsRadios1" value="1" data-toggle="radio">
										Business
									</label>
								</div>
								<label></label>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-4 control-label" style="text-align:left;">Street</div>
							<div class="col-md-7">
								<input name="street1" id="street1" type="text"  placeholder="" class="form-control" value="">	
							</div>
						</div>

						<div class="form-group" >
							<div class="col-md-4 control-label" style="text-align:left;"></div>
							<div class="col-md-7">
								<input name="street2" id="street2" type="text"  placeholder="" class="form-control" value="">	
								<label></label>
							</div>
						</div>

						<div class="form-group" style="text-align:left;">
							<div class="col-md-4 control-label" style="text-align:left;">Country</div>
							<div class="col-md-7">
								<select name="country" id="country" class="form-control">
			   						<option value="0" >Please Select...</option>
			   					</select>
							</div>
						</div>

						<div class="form-group" style="text-align:left;">
							<div class="col-md-4 control-label" style="text-align:left;">State / Province</div>
							<div class="col-md-7">
								<select id="state_or_province" name="state_or_province" class="form-control">
			   						<option value="0" >Please Select...</option>
			   					</select>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-4 control-label" style="text-align:left;">City</div>
							<div class="col-md-7">
								<input name="city" id="city" type="text"  placeholder="" class="form-control" value="">	
						
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-4 control-label" style="text-align:left;">Zip / Postal Code</div>
							<div class="col-md-7">
								<input name="zip_postal_code" id="zip_postal_code" type="text"  placeholder="" class="form-control" value="">	
								<label></label>
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-4 control-label" style="text-align:left;">Minimum Panyment Amount</div>
							<div class="col-md-7">
						   		<select name="minimum_payment_amount" id="minimum_payment_amount" class="form-control">
						        	 <option value="0">Please Select...</option>
						        	 <option value="50">$50</option>
						             <option value="100">$100</option>
						             <option value="250">$250</option>
						             <option value="500">$500</option>
						             <option value="1000">$1000</option>
						   		</select>	
							</div>
						</div>
					</div>
				</div>
			</div>

				   	
			<div class="col-md-6">
				<div class="panel-heading panel">
			    	<h4 style="color:black;"><b>W-9 Management</b></h3>
				</div>
				
				<?php
					$attributes = array('name' =>'updateform', 'id' => '');
					echo form_open("paymentprofile/update", $attributes); 
				?>
				

				<div class="form-group" style="margin-bottom:30px;">
					<div class="col-md-9 control-label">
						<label name="last_update" id="last_update"></label>
	        		</div>
	        		<div class="col-md-3">
	        			<button  type="button" style="cursor: pointer;background-color:#34495E;color:#ffffff;border:0px" onclick="location.href='<?php echo base_url()?>payment_update/'">Update</button>
	    			</div>
	    		</div>
				

				<div class="panel-heading panel">
			    	<h4 style="color:black;"><b>Payment Info</b></h3>
				</div>
				
				<div class="form-group form-horizontal" style="margin-bottom:30px;">
					<div class="col-md-6 control-label" style="text-align:left;">
						<label>Payment Method </label>
					</div>
				   	<div class="col-md-6">
				   		<select name="payment_method" id="payment_method" class="form-control" onchange="methodChange();">
					       <option value="1">Payment by Check</option>
					       <option value="2">Payment by PayPal</option>
					       <option value="3">Payment by ACH</option>
				   		</select>
				   	</div>

				</div>
			   	
				
				<div class="panel-heading panel">
			    	<h4 style="color:black;"><b>Payment Change history</b></h3>
				</div>   		
				
				<div class="form-group">
					<div class="col-md-12">
						<label name="change_time_ip" id="change_time_ip"><label>
					</div>
			   		
			   	</div>
			   	<div class="form-payment-btn" style="">
			   		<button class="btn btn-block btn-primary" type="button" onclick="update();">Submit</button>
			   	</div>
				<?php echo form_close(); ?>
            </div> 
 		</div>
 	</div>
 </div>	

<!-- CONTENTS END -->

<script type="text/javascript">
	<?php foreach ($country_arr as $row){?>
		$("#country").append("<option value='<?php echo $row->country_id;?>'><?php echo $row->country_name;?></option>");
	<?php }?>

	<?php foreach ($state_arr as $row){?>
		$("#state_or_province").append("<option value='<?php echo $row->state_id;?>'><?php echo $row->state_name;?></option>");
	<?php }?>

	<?php if(isset($w9_name) && isset($w9_time)){?>
         $('[name=last_update]').text('<?php echo $w9_name;?> Submitted on <?php echo $w9_time;?>');
	<?php }?>

	<?php if(isset($payee_name)){?>
	  	 $('[name=minimum_payment_amount]').val("<?php echo $minimum_payment_amount;?>"); 
	     $("input:radio[name='privacy_policy']:radio[value='<?php echo $privacy_policy;?>']").attr("checked",true);

	     $('[name=payee_name]').val('<?php echo $payee_name;?>');
	     $('[name=street1]').val('<?php echo $street1;?>');
	     $('[name=street2]').val('<?php echo $street2;?>');
	     $('[name=city]').val('<?php echo $city;?>');
	     $('[name=zip_postal_code]').val('<?php echo $zip_postal_code;?>');

	     $('[name=change_time_ip]').text('<?php echo $last_change_time;?> - Payment detail were changed from IP.<?php echo $last_change_ip;?>');

	 	 $('[name=country]').val("<?php echo $country;?>");
	 	 $('[name=state_or_province]').val("<?php echo $state_or_province;?>");
	<?php }?>

</script>
			
<script type="text/javascript">
	function methodChange(){
		var methodNode = document.getElementById("method");
		while (methodNode.firstChild) {
			methodNode.removeChild(methodNode.firstChild);
		}
		
		var method = $('[name=payment_method]').val();
		
		if(method == '2'){
			$("#method").append('<p ><label>PayPal Email </label><input name="paypal_email" type="text" value="" placeholder="" class="form-control"></p>');
		}
		else if(method == '3'){
			$("#method").append('<p><label>Bank Country </label></p><label class="radio selectpaymentinner" style="padding-left: 15px;">US Bank </label>');
			$("#method").append('<p ><label>Account Name </label><input id="account_name" name="account_name" type="text" value="" placeholder="" class="form-control"></p>');
			$("#method").append('<p ><label>Bank Name </label><input id="bank_name" name="bank_name" type="text" value="" placeholder="" class="form-control"></p>');
			$("#method").append('<p ><label>Account Type </label></p><div style=" width: 380px; height: 42px;float:left;margin-right:5px"><select name="account_type" id="account_type" class="select-block"><option value="1">checking</option><option value="2">saving</option></select></div>');
			$("#method").append('<p ><label>Account Number </label><input id="account_number" name="account_number" type="password" value="" placeholder="" class="form-control"></p>');
			$("#method").append('<p ><label>Confirm Account Number </label><input id="confirm_account_number" type="password" value="" placeholder="" class="form-control"></p>');
			$("#method").append('<p ><label>Routing Number </label><input id="routing_number" name="routing_number" type="password" value="" placeholder="" class="form-control"></p>');
			$("#method").append('<p ><label>Confirm Routing Number </label><input id="confirm_routing_number" type="password" value="" placeholder="" class="form-control"></p>');
		}

		$("select[name='account_type']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
	}
</script>
 
