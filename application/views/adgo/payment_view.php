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
            	<div class="payment">
            	<h1 class="paymentTitle">Payment Profile</h1>
					<div class="paymentinner">
						<h3>W-9 Management</h3>
						<?php
							$attributes = array('name' =>'updateform', 'id' => '');
							echo form_open("paymentprofile/update", $attributes); 
						?>
						<p>
                            <label name="last_update" id="last_update" style="width: 420px;"></label>
                            <button  type="button" style="cursor: pointer;background-color:#34495E;color:#ffffff;border:0px" onclick="location.href='<?php echo base_url()?>payment_update/'">Update</button>
                        </p> 
                              
                        <h3>General Information</h3>
					    <p ><label>Account ID </label><label name="account_id" id="account_id" value=""></label>
         		   		<p ><label>Payee Name </label><input name="payee_name" id="payee_name" type="text"  placeholder="" class="form-control" value=""></p>
         		   		<div style="width: 100%;height: 30px;">
         					<p><label>Privacy Policy </label></p>
         					<label class="radio selectpaymentinner" style="padding-left: 15px;">
         						<input name="privacy_policy" type="radio" id="optionsRadios1" value="0" data-toggle="radio">
         						Individual/Sole Proprietor
         					</label>
         					
         					<label class="radio selectpaymentinner" style="padding-left: 15px;">
         						<input name="privacy_policy" type="radio" id="optionsRadios1" value="1" data-toggle="radio">
         						Business
         					</label>
         				</div>
         		   		<p ><label>Street </label><input name="street1" id="street1" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>&nbsp; </label><input name="street2" id="street2" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Country</label> </p>
         		   		<div style=" width: 380px; height: 42px;float:left;margin-right:5px">
	         		   		<select name="country" id="country" class="select-block">
	         		   			<option value="0" >Please Select...</option>
							</select>
	         		   	</div>
	         		   		
	         		   	<p ><label>State or Province</label> </p>
	         		   	<div style=" width: 380px; height: 42px;float:left;margin-right:5px">
	         		   		<select id="state_or_province" name="state_or_province" class="select-block">
	         		   			<option value="0" >Please Select...</option>
	         		   		</select>
	         		   	</div>
	         		   	
         		   		<p ><label>City </label><input name="city" id="city" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Zip / Postal Code </label><input name="zip_postal_code" id="zip_postal_code" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Minimum Payment Amount </label> </p>
	         		   	<div style=" width: 380px; height: 42px;float:left;margin-right:5px">
	         		   		<select name="minimum_payment_amount" id="minimum_payment_amount" class="select-block ">
                                	 <option value="0">Please Select...</option>
                                	 <option value="50">$50</option>
                                     <option value="100">$100</option>
                                     <option value="250">$250</option>
                                     <option value="500">$500</option>
                                     <option value="1000">$1000</option>
	         		   		</select>
	         		   	</div>
	         		   	
	         		   	<h3 style="padding-top:80px">Payment Info</h3>
	         		   	<p ><label>Payment Method </label> </p>
         		   		<div style=" width: 380px; height: 42px;float:left;margin-right:5px">
	         		   		<select name="payment_method" id="payment_method" class="select-block" onchange="methodChange();">
                               <option value="1">Payment by Check</option>
                               <option value="2">Payment by PayPal</option>
                               <option value="3">Payment by ACH</option>
	         		   		</select>
	         		   	</div>
	         		   	
	         		   	<div id="method">
	         		   	</div>
	         		   		
	         		   	<h3 style="padding-top:80px">Payment Change history</h3>
	         		   	<p name="change_time_ip" id="change_time_ip"></p>
	         		   		 
	         		   	<div class="form-payment-btn" style="">
	         		   		<button class="btn btn-lg btn-block btn-inverse" type="button" onclick="update();">Submit</button>
	         		   	</div>
	         		   	<?php echo form_close(); ?>
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
	
		         $('[name=account_id]').text('<?php echo $user_id;?>');
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
	         
	         </div> 
 		 </div>
	 	<div id="footerBlock"></div>
	</div>
</div>
<!-- HEAD END -->
