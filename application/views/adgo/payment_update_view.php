<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>


<!-- content top -->
<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li class="active">PAYMENT UPDATE</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Update Payment Profile</h2>
			</div>
		</div>
	</div>
</section>


<div id="content">
	<div class="container">
		<div class="row">
			<?php
			$attributes = array('name' =>'paymentW9form', 'id' => '');
			echo form_open("payment_update/update", $attributes); 
			?>
			<div class="col-md-2">
    		
           	</div>  

			<div class="col-md-8">
				<div class="form-horizontal form-bordered">
					
					<div class="form-group">
						<label class="col-md-6 control-label" style="text-align:left;">
							<b>Name (on your income tax return)</b>
						</label>
						<div class="col-md-6">
							<input type="text" value="" placeholder="" class="form-control" value="" name="name" id="inputDefault">
						</div>
					</div>	

					<div class="form-group">
						<label class="col-md-6 control-label" style="text-align:left;">
							<b>Business/disregarded entity name</b>
						</label>
						<div class="col-md-6">
							<input type="text" value="" placeholder="" class="form-control" value="" name="business_name" id="inputDefault">
						</div>
					</div>

					<div class="form-group">
						<label class="col-md-6 control-label" style="text-align:left;">
							<b>Federal Tax classification</b>
						</label>
						<div class="col-md-6">
							<div class="FederalRadioList">
								<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="1" data-toggle="radio">Individual/sole proprietor</label> 
								<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="2" data-toggle="radio">C Corporation</label> 
								<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="3" data-toggle="radio">S Corporation </label> 
								<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="4" data-toggle="radio">Partnership</label> 
								<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="5" data-toggle="radio">Trust/estate</label> 
								<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="6" data-toggle="radio">Limited liability company</label> 
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label" style="text-align:left;">
							<b>Address</b>
						</label>
						<div class="col-md-6">
							<input type="text" placeholder="" class="form-control" name="address" id="inputDefault">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label" style="text-align:left;">
							<b>City, State, and Zipcode</b>
						</label>
						<div class="col-md-6">
							<input type="text" placeholder="" class="form-control" name="city_state_zipcode" id="inputDefault">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label" style="text-align:left;">
							<b>Account number lists</b>
						</label>
						<div class="col-md-6">
							<input type="text" placeholder="" class="form-control" name="account_number" id="inputDefault">
						</div>
					</div>
					<div class="form-group">
						<label class="col-md-6 control-label" style="text-align:left;">
							<b>Requester info (Optional)</b>
						</label>
						<div class="col-md-6">
							<textarea class="paymenttextarea" name="requesters_name" rows="10" cols="40" onfocus="" onblur="" id="inputDefault"></textarea>

						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2">
			</div>
			<div class="col-md-8">
				<div class="form-horizontal form-bordered">
					<div class="form-group">
						<div class="col-md-12">
								<b>Tax payer identification number (Optional)</b><br><br>
							
								Enter your TIN in the appropriate box. The
								TIN provided must match the name given on the "Name" line to avoid
								backup withholding. For individuals, this is your social security
								number (SSN). However, for a resident alien, sole proprietor, or
								disregarded entity, see the Part I instructions on page 3. For other
								entities, it is your employer identification number (EIN). If you do
								not have a number, see How to get a TIN on page 3.<br><br>
							
								<b>Note.</b> If the account is in more than one name, see the chart on page
								4 for guidelines on whose number to enter. 
								<a target="_blank" href="http://www.irs.gov/pub/irs-pdf/fw9.pdf">(http://www.irs.gov/pub/irs-pdf/fw9.pdf)</a>
						</div>
					</div>

					<div class="form-group">
						<div class="col-md-6">
							<p>Social Security Number</p>
							<input type="text" value="" placeholder="" class="form-control" name="social_security_number">
						</div>


						<div class="col-md-6">
							<p>Employer Identification Number</p>
							<input type="text" value="" placeholder="" class="form-control" name="employer_identification_number">
						</div>								
					</div>


					<div class="form-group">
						<div class="col-md-12">
							<b>Certification</b><br>
							<ul>
								<li>Under penalties of perjury, I certify that:</li>
								<li>1. The number shown on this form is my correct taxpayer
									identification number (or I am waiting for a number to be issued to
									me), and</li>
								<li>2. I am not subject to backup withholding because: (a) I am
									exempt from backup withholding, or (b) I have not been notified by
									the Internal Revenue Service (IRS) that I am subject to backup
									withholding as a result of a failure to report all interest or
									dividends, or (c) the IRS has notified me that I am no longer
									subject to backup withholding, and</li>
								<li>3. I am a U.S. citizen or other U.S. person.</li>
							</ul>
						</div>
					</div>		

					<div class="form-group">
						<label class="col-md-12">
							Signature
						</label>
						<div class="col-md-6">
							<p>Digital Signature</p>
							<input type="text" value="" placeholder="" class="form-control" name="digital_signature">
						</div>
						<div class="col-md-6">
							<p>Date</p>
							<input type="text" value="" placeholder="" class="form-control" name="date">
						</div>
					</div>
					<div class="col-md-12 center">
						<div class="form-group">
							<button style="cursor: pointer; background-color: #34495E; color: #ffffff; border: 0px" type="button" onclick="update();">Create New</button>
						</div>
					</div>
					<div class="col-md-12">
						<button class="btn btn-primary btn-block" type="submit" onclick="query();">Submit</button>
					</div>	
					
				</div>
			</div>
		</div>					
	</div>
</div>
				

		
							
		
		<?php echo form_close(); ?>
		</div>
	</div>
</div>

<script type="text/javascript">
    $("input:radio[name='federal_tax']:radio[value='<?php echo $federal_tax;?>']").attr("checked",true);

    $('[name=name]').val('<?php echo $name;?>');
    $('[name=business_name]').val('<?php echo $business_name;?>');
    $('[name=tax_classification]').val('<?php echo $tax_classification;?>');
    $('[name=address]').val('<?php echo $address;?>');
    $('[name=city_state_zipcode]').val('<?php echo $city_state_zipcode;?>');
    $('[name=account_number]').val('<?php echo $account_number;?>');
    $('[name=social_security_number]').val('<?php echo $social_security_number;?>');
    $('[name=employer_identification_number]').val('<?php echo $employer_identification_number;?>');
    $('[name=digital_signature]').val('<?php echo $digital_signature;?>');
    $('[name=date]').val('<?php echo $date;?>');
    
    $('[name=requesters_name]').text('<?php echo $requesters_name;?>');
    $('[name=last_change]').text('This W-9 was digitally submitted and signed on <?php echo $last_change_time?> from IP: <?php echo $last_change_ip;?>');

    $("input").prop('disabled', true);
    $("textarea").prop('disabled', true);
</script>

<script type="text/javascript">
	function update() {
		$("input:radio[name='federal_tax']:radio[value='<?php echo $federal_tax;?>']").attr("checked",true);

	    $('[name=name]').val('');
	    $('[name=business_name]').val('');
	    $('[name=tax_classification]').val('');
	    $('[name=address]').val('');
	    $('[name=city_state_zipcode]').val('');
	    $('[name=account_number]').val('');
	    $('[name=social_security_number]').val('');
	    $('[name=employer_identification_number]').val('');
	    $('[name=digital_signature]').val('');
	    $('[name=date]').val('');
	    
	    $('[name=requesters_name]').text('');

	    $("input").prop('disabled', false);
	    $("textarea").prop('disabled', false);

	    var nowDateTime = newDate.getFullYear() + '-' + newDate.getMonth()+1 + '-' + newDate.getDate() + ' ' + newDate.getHours() + ':' + newDate.getMinutes() + ':' + newDate.getSeconds();
	    $('[name=date]').val(nowDateTime);
	}
</script>

</div>
</div>
<div id="footerBlock"></div>

</div>
</div>
