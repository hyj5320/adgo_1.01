Hello,
This email is to notify you that you have changes pending to your payment profile.

Please see the changes below: Name: <?php echo $payee_name;?>
<?php if($privacy_policy == '0'){ ?>
	Payment Type: Individual/Sole Proprietor
<?php }else{?>
	Payment Type: Business
<?php }?>
Street 1: <?php echo $street1;?>
Street 2: <?php echo $street2;?>
Country: <?php echo $country_name;?>
<?php if($country == '237'){?>
	State Or Province: <?php echo $state_name;?>
<?php }?>
City: <?php echo $city;?>
Zip Postal Code: <?php echo $zip_postal_code;?>
Minimum Payment Amount: <?php echo $minimum_payment_amount;?>$
<?php
	if($payment_method == '1'){
		$p_var = 'Payment by Check';
	}
	else if($payment_method == '2'){
		$p_var = 'Payment by PayPal';
	}
	else{
		$p_var = 'Payment by ACH';
	} 
?>

Payment Method: <?php echo $p_var;?>
<?php if($payment_method == '2'){?>
PayPal Email: <?php echo $paypal_email;?>
<?php }?>

<?php if($payment_method == '3'){?>
Bank Country: US Bank <br />
Account Name: <?php echo $account_name;?>
Bank Name: <?php echo $bank_name;?>
<?php
	if($account_type == '1'){
		$var = 'checking';
	}
	else{
		$var = 'saving';
	} 
?>
Account Type: <?php echo $var;?>
Account Number: <?php echo $account_number;?>
Routing Number: <?php echo $routing_number;?>
<?php }?>

Please respond to this email to confirm the changes. If we do not receive a response within 7 days, your request will be canceled and your existing payment profile will remain intact.
If you did not authorize this update, please respond to this email immediately.

Regards,
<?php echo $website_name; ?> Team.
