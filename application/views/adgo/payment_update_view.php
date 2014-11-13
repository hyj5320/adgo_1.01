<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<div class="payment">
	<h1 class="paymentTitle">Payment Profile</h1>
	<div class="paymentinner">
		<?php
			$attributes = array('name' =>'paymentW9form', 'id' => '');
			echo form_open("payment_update/update", $attributes); 
		?>
							
		<h3>Name (as shown on your income tax return)</h3>
		<p>
			<input type="text" value="" placeholder="" class="form-control" value="" name="name">
		</p>
		<h3>Business Name/disregarded entity name, if different from above</h3>
		<p>
			<input type="text" value="" placeholder="" class="form-control" value="" name="business_name">
		</p>

		<h3>Check appropriate box for Federal Tax</h3>
		<div class="FederalRadioList">
			<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="1" data-toggle="radio">Individual/sole proprietor</label> 
			<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="2" data-toggle="radio">C Corporation</label> 
			<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="3" data-toggle="radio">S Corporation </label> 
			<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="4" data-toggle="radio">Partnership</label> 
			<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="5" data-toggle="radio">Trust/estate</label> 
			<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="6" data-toggle="radio">Limited liability company</label> 
			<label style="width: 500px; padding: 0px">Enter the tax classification (C=C Corporation, S=S Corporation, P=Partnership)</label>
			<input type="text" placeholder="" class="form-control" name="tax_classification">
		</div>
		<div
			style="width: 120px; height: 120px; float: left; margin: 80px 0 0 10px; display: block">
			<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="federal_tax" id="federal_tax" value="7" data-toggle="radio">Limited liability company</label>
		</div>

		<div class="clearfix"></div>

		<h3>Address</h3>

		<p>
			<input type="text" placeholder="" class="form-control" name="address">
		</p>
		<h3>City, State, and ZIP code</h3>

		<p>
			<input type="text" placeholder="" class="form-control" name="city_state_zipcode">
		</p>

		<h3>List account number(s) here (optional)</h3>

		<p>
			<input type="text" placeholder="" class="form-control" name="account_number">
		</p>


		<h3>Requesters name and address (optional)</h3>
		<textarea class="paymenttextarea" name="requesters_name" rows="10" cols="10" onfocus="" onblur=""></textarea>

		<h3>Tax Payer Identification Number (TIN)</h3>
		<p class="textcolorgrey">Enter your TIN in the appropriate box. The
			TIN provided must match the name given on the "Name" line to avoid
			backup withholding. For individuals, this is your social security
			number (SSN). However, for a resident alien, sole proprietor, or
			disregarded entity, see the Part I instructions on page 3. For other
			entities, it is your employer identification number (EIN). If you do
			not have a number, see How to get a TIN on page 3.</p>
		<p class="textcolorgrey">
			Note. If the account is in more than one name, see the chart on page
			4 for guidelines on whose number to enter. <a target="_blank" href="http://www.irs.gov/pub/irs-pdf/fw9.pdf">(http://www.irs.gov/pub/irs-pdf/fw9.pdf)</a>
		</p>
		<div style="width: 50%; float: left">
			<p>Social Security Number</p>
			<input style="width: 300px" type="text" value="" placeholder="" class="form-control" name="social_security_number">
		</div>

		<div style="width: 50%; float: left">
			<p>Employer Identification Number</p>
			<input style="width: 300px" type="text" value="" placeholder="" class="form-control" name="employer_identification_number">
		</div>
		<div class="clearfix"></div>
		<h3>Certification</h3>
		<div class="CertificationDiv">
			<ul>
				<li><b>Under penalties of perjury, I certify that:</b></li>
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

		<h3>Signature</h3>
		<div style="width: 75%; float: left;">
			<p name="last_change"></p>
		</div>

		<div style="width: 25%; float: left; margin-top: 20px">
			<button style="cursor: pointer; background-color: #34495E; color: #ffffff; border: 0px" type="button" onclick="update();">Create New</button>
		</div>

		<div style="width: 50%; float: left; margin-top: 50px">
			<p>Digital Signature</p>
			<input style="width: 300px" type="text" value="" placeholder="" class="form-control" name="digital_signature">
		</div>

		<div style="width: 50%; float: left; margin-top: 50px">
			<p>Date</p>
			<input style="width: 300px" type="text" value="" placeholder="" class="form-control" name="date">
		</div>
		<div class="clearfix"></div>
		<div class="form-payment-btn" style="">
			<button class="btn btn-lg btn-block btn-inverse" type="submit" onclick="query();">Submit</button>
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
