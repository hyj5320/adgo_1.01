<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>ADGO.TV</title>
</head>

<body>
Hello,<br />
This email is to notify you that you have changes pending to your payment profile.<br />
<br />
Please see the changes below: Name: <?php echo $payee_name;?><br />
<?php if($privacy_policy == '0'){ ?>
	Payment Type: Individual/Sole Proprietor<br />	
<?php }else{?>
	Payment Type: Business<br />
<?php }?>

Street 1: <?php echo $street1;?><br />
Street 2: <?php echo $street2;?><br />
Country: <?php echo $country_name;?><br />
<?php if($country == '237'){?>
	State Or Province: <?php echo $state_name;?><br />
<?php }?>

City: <?php echo $city;?><br />
Zip Postal Code: <?php echo $zip_postal_code;?><br />
Minimum Payment Amount: <?php echo $minimum_payment_amount;?>$<br />
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
Payment Method: <?php echo $p_var;?><br />

<?php if($payment_method == '2'){?>
	PayPal Email: <?php echo $paypal_email;?><br />
<?php }?>

<?php if($payment_method == '3'){?>
	Bank Country: US Bank <br />
	Account Name: <?php echo $account_name;?><br />
	Bank Name: <?php echo $bank_name;?><br />
	<?php
		if($account_type == '1'){
			$var = 'checking';
		}
		else{
			$var = 'saving';
		} 
	?>
	Account Type: <?php echo $var;?><br />
	Account Number: <?php echo $account_number;?><br />
	Routing Number: <?php echo $routing_number;?><br />
<?php }?>
<br />
Please respond to this email to confirm the changes. If we do not receive a response within 7 days, your request will be canceled and your existing payment profile will remain intact.<br />
If you did not authorize this update, please respond to this email immediately.<br />
<br />
Regards,<br />
<?php echo $website_name; ?> Team<br />
</body>
</html>