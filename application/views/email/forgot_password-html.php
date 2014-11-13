<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Create a new password on <?php echo $website_name; ?></title>
</head>

<body>
Dear Publisher,<br />
<br />
Reset your password by following the steps below:<br />
<br />
1. Click this link or copy and paste it into your web browser:<br />
<nobr><a href="<?php echo site_url('auth/reset_password/'.$user_id.'/'.$new_pass_key); ?>" style="color: #3366cc;"><?php echo site_url('auth/reset_password/'.$user_id.'/'.$new_pass_key); ?></a></nobr><br />
<br />
2. Follow the on-screen instructions to reset your password.<br />
<br />
Regards,<br />
<?php echo $website_name; ?> Staff<br />
<br />
</body>
</html>