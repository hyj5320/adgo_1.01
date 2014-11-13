<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<html>
	<head>
		<title>ADGO.TV</title>
		
		<link href="<?php echo base_url()?>include/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link href="<?php echo base_url()?>include/css/style.css" rel="stylesheet" type="text/css" />   
		<link href="<?php echo base_url()?>include/css/counter.css" media="screen" rel="stylesheet" type="text/css" />
		
		<link href="<?php echo base_url()?>include/css/flat-ui.css" rel="stylesheet">
	    <link href="<?php echo base_url()?>include/css/demo.css" rel="stylesheet">
		
		<script src="<?php echo base_url()?>include/js/application.js"></script>
		
		<script src="<?php echo base_url()?>include/js/jquery-1.10.2.min.js"></script>
	    <script src="<?php echo base_url()?>include/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="<?php echo base_url()?>include/js/jquery-1.8.3.min.js"></script>
		<script src="<?php echo base_url()?>include/js/jquery-2.0.3.min.js"></script>
	    
		<script src="<?php echo base_url()?>include/js/bootstrap.min.js"></script>
	    <script src="<?php echo base_url()?>include/js/bootstrap-select.js"></script>
	    <script src="<?php echo base_url()?>include/js/bootstrap-switch.js"></script>
		
	    <script src="<?php echo base_url()?>include/js/jquery.ui.touch-punch.min.js"></script>
	    <script src="<?php echo base_url()?>include/js/jquery.tagsinput.js"></script>
	    <script src="<?php echo base_url()?>include/js/jquery.placeholder.js"></script>
		<script src="<?php echo base_url()?>include/js/jquery.flipCounter.1.2.pack.js"></script>
		<script src="<?php echo base_url()?>include/js/jquery.easing.1.3.js"></script>  
	    <script src="<?php echo base_url()?>include/js/flatui-checkbox.js"></script>
	    <script src="<?php echo base_url()?>include/js/flatui-radio.js"></script>
	    <script src="<?php echo base_url()?>include/js/holder.js"></script>
	    <script src="<?php echo base_url()?>include/js/flatui-fileinput.js"></script>
	    <script src="<?php echo base_url()?>include/js/typeahead.js"></script>
	    
	</head>
	
	<body style="margin: 0px">
		<div id="wrapper">
			<div id="mainInsideIn">	
			<?php $uri = $_SERVER["REQUEST_URI"]; ?>
			
				<div id="headerTop">
		    		<div id="hTopInn">
			    		 <div id="logo"><a href="<?php echo base_url()?>" title=""><img src="<?php echo base_url()?>include/img/topLogo.png"  width="248" height="97" alt="" /></a></div> 
			            	<div id="topMenu">
			            		<ul>
			            		<?php if($this->session->userdata('level') == '10'){?>
			            				<li><a href="<?php echo base_url()?>admin/site" title="" class=""><span>Site</span></a></li>
			            				<li><a href="<?php echo base_url()?>admin/users" title="" class=""><span>Users</span></a></li>
					                	<li><a href="<?php echo base_url()?>admin/report" title="" class=""><span>Report</span></a></li>
					                	<li><a href="<?php echo base_url()?>admin/approval" title="" class=""><span>approval</span></a></li>
					                	<li><a href="<?php echo base_url()?>admin/adcode" title="" class=""><span>adcode</span></a></li>
					                	<li><a href="<?php echo base_url()?>auth/logout" title="" class=""><span>logout</span></a></li>
			            		<?php } else{?>
									<?php if( !$this->session->userdata('user_id')){?>
										<?php if(strpos($uri, 'login')){?> <li class="cur"><a href="<?php echo base_url()?>auth/login" title=""><span>Login</span></a></li>
										<?php }else {?> <li><a href="<?php echo base_url()?>auth/login" title=""><span>Login</span></a></li><?php }?>
										
										<?php if(strpos($uri, 'register')){?> <li class="cur"><a href="<?php echo base_url()?>auth/register" title=""><span>Apply Now</span></a></li>
										<?php }else{?> <li><a href="<?php echo base_url()?>auth/register" title=""><span>Apply Now</span></a></li><?php }?>
										
										<?php if(strpos($uri, 'about')){?> <li class="cur"><a href="<?php echo base_url()?>about/" title=""><span>Why Us?</span></a></li>
										<?php }else{?> <li><a href="<?php echo base_url()?>about/" title=""><span>Why Us?</span></a></li><?php }?>
										
										<?php if(strpos($uri, 'cpm')){?> <li class="cur"><a href="<?php echo base_url()?>cpm/" title=""><span>Our Rates</span></a></li>
										<?php }else{?> <li><a href="<?php echo base_url()?>cpm/" title=""><span>Our Rates</span></a></li><?php }?>
										
										<?php if(strpos($uri, 'contact')){?> <li class="cur"><a href="<?php echo base_url()?>auth/contact" title=""><span>Contact Us</span></a></li>
										<?php }else{?> <li><a href="<?php echo base_url()?>auth/contact" title=""><span>Contact Us</span></a></li><?php }?>
									<?php }else{?>
										<?php if(strpos($uri, 'contact')){?> 
												<li><a href="<?php echo base_url()?>report/" ><span>My Account</span></a></li>
												<li class="cur"><a href="<?php echo base_url()?>auth/contact" title=""><span>Contact Us</span></a></li>
										<?php }else{?> 
												<li class="cur"><a href="<?php echo base_url()?>report/" ><span>My Account</span></a></li>
												<li><a href="<?php echo base_url()?>auth/contact" title=""><span>Contact Us</span></a></li>
										<?php }?>
					                <?php }?>
			            		<?php }?>
			            		
			                     </ul>
			           		</div>
		      		  </div>
		 		 </div>
		 		 
<?php if($uri != "/" && $uri != "/main" && $uri != "/main/"){?>
		 		 <div class="headerTopLine"></div>
<?php } ?>
		 		 
<?php if($this->session->userdata('user_id')){?>
	<?php if($uri != "/auth/contact/" && $uri != "/auth/contact" && $uri != "/about/" && $uri != "/about" && $uri != "/cpm/" &&
			 $uri != "/cpm" && $uri != "/cpm/calculator" && $uri != "/main" && $uri != "/" && $uri != "/main/" &&
			 $uri != "/auth/send_again" && $uri != "/auth/send_again/" && 
			 $uri != "/admin/report" && $uri != "/admin/report/" && $uri != "/admin/site" && $uri != "/admin/site/" &&
			 $uri != "/admin/approval" && $uri != "/admin/approval/" && $uri != "/admin/adcode" && $uri != "/admin/adcode/" &&
			 $uri != "/admin/users" && $uri != "/admin/users/" && $uri != "/admin/users_search" && $uri != "/admin/users_search/"
			 ){?>
			 
				<div id="content" style=" padding:0px;" >
		           <div id="report" style="width: 1100px;">
		        		<div id="reportL">
			        		<div class="publisher">
			                	<h4><span><?php echo $this->session->userdata('username')?></span></h4>
			                    <p class="publMail"><a href="#" title=""><?php echo $this->session->userdata('email')?></a></p>
			                    <p class="logOut"><a href="<?php echo base_url()?>auth/logout" title="" ><span>LOGOUT</span></a></p>
			                </div>
		        		
			            	<ul>
			            		<?php if(strpos($uri, 'report')){?>
				                	<li class="cur reportIconImg1"><a href="<?php echo base_url()?>report/" title=""><span>Earnings</span></a></li>
			            		<?php }else{?>
			            			<li class="reportIconImg1"><a href="<?php echo base_url()?>report/" title=""><span>Earnings</span></a></li>
			            		<?php }?>
			            		
			            		<?php if(strpos($uri, 'adcode')){?>
			            			<li class="cur reportIconImg2"><a href="<?php echo base_url()?>adcode/" title="" class="addCode"><span>Ad Code</span></a></li>
			            		<?php }else{?>
			            			<li class="reportIconImg2"><a href="<?php echo base_url()?>adcode/" title="" class="addCode"><span>Ad Code</span></a></li>
			            		<?php }?>
			            		
			            		<?php if(strpos($uri, 'con_info')){?>
				                	<li class="cur reportIconImg3"><a href="<?php echo base_url()?>con_info" title="" class="contInfLink"><span>Contact Info</span></a></li> 
			            		<?php }else{?>
			            			<li class="reportIconImg3"><a href="<?php echo base_url()?>con_info" title="" class="contInfLink"><span>Contact Info</span></a></li> 
			            		<?php }?>
			            		
			            		<?php if(strpos($uri, 'auth')){?>
				                	<li class="cur reportIconImg4"><a href="<?php echo base_url()?>auth/change_password" title="" class="passw"><span>Password</span></a></li>  
			            		<?php }else{?>
			            			<li class="reportIconImg4"><a href="<?php echo base_url()?>auth/change_password" title="" class="passw"><span>Password</span></a></li> 
			            		<?php }?>
			            		
			            		<?php if(strpos($uri, 'payments')){?>
				                	<li class="cur reportIconImg5"><a href="<?php echo base_url()?>payments/" title=""><span>Payments</span></a></li>
			            		<?php }else{?>
			            			<li class="reportIconImg5"><a href="<?php echo base_url()?>payments/" title=""><span>Payments</span></a></li>
			            		<?php }?>
			            		
			            		<?php if(strpos($uri, 'paymentprofile') ||strpos($uri, 'update')){?>
				                	<li class="cur reportIconImg6"><a href="<?php echo base_url()?>paymentprofile/" title="" class="paymProf"><span>Payment Profile</span></a></li> 
			            		<?php }else{?>
			            			<li class="reportIconImg6"><a href="<?php echo base_url()?>paymentprofile/" title="" class="paymProf"><span>Payment Profile</span></a></li> 
			            		<?php }?>
			            		
			            		<?php if(strpos($uri, 'new_site')){?>
				                	<li class="cur reportIconImg7"><a href="<?php echo base_url()?>new_site/" title="" class="addCode"><span>Add New Site</span></a></li>
			            		<?php }else{?>
			            			<li class="reportIconImg7"><a href="<?php echo base_url()?>new_site/" title="" class="addCode"><span>Add New Site</span></a></li>
			            		<?php }?>
			                </ul>
		            	</div>
	<?php } ?>
<?php } ?>

