<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<!DOCTYPE html>
<meta http-equiv="content-type" content="text/html; charset=utf-8">

<html>
	<head>
		<style>
			.top_content_footer{
				color:white;
			}
			.top_content_footer_em{
				color:#0088cc;
				font-size:1.3em;
			}
			#footer_content{
				color:#555;
			}
			.main_content_small{
				color:#777777;
				font-size: 1.1em;
				line-height:1.3em;
				font-family: "Open Sans", Arial, sans-serif;
			}
		</style>

		<!-- Basic -->
		<meta charset="utf-8">
		<title>ADGO.TV</title>		
		<meta name="keywords" content="Ad Network" />
		<meta name="description" content="Ad Network">
		<meta name="author" content="Adgo.tv">

		<!-- Mobile Metas -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- Web Fonts  -->
		<link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">

		<!-- Vendor CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/vendor/bootstrap/bootstrap.css">
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/vendor/fontawesome/css/font-awesome.css">
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/vendor/owlcarousel/owl.carousel.css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/vendor/owlcarousel/owl.theme.css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/vendor/magnific-popup/magnific-popup.css" media="screen">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/css/theme.css">
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/css/theme-elements.css">
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/css/theme-blog.css">
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/css/theme-shop.css">
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/css/theme-animate.css">

		<!-- Skin CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/css/skins/default.css">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/css/custom.css">

		<!-- Head Libs -->
		<script src="<?php echo base_url()?>HTML/vendor/modernizr/modernizr.js"></script>

		<!-- Current Page CSS -->
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/vendor/rs-plugin/css/settings.css" media="screen">
		<link rel="stylesheet" href="<?php echo base_url()?>HTML/vendor/circle-flip-slideshow/css/component.css" media="screen">

		<!-- Vendor // Orginally was in footer -->
		<script src="<?php echo base_url()?>HTML/vendor/jquery/jquery.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/jquery.appear/jquery.appear.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/jquery.easing/jquery.easing.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/jquery-cookie/jquery-cookie.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/bootstrap/bootstrap.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/common/common.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/jquery.validation/jquery.validation.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/jquery.stellar/jquery.stellar.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/jquery.gmap/jquery.gmap.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/twitterjs/twitter.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/isotope/jquery.isotope.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/owlcarousel/owl.carousel.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/jflickrfeed/jflickrfeed.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/magnific-popup/jquery.magnific-popup.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/vide/jquery.vide.js"></script>
		
		<!-- Theme Base, Components and Settings -->
		<script src="<?php echo base_url()?>HTML/js/theme.js"></script>
		
		<!-- Specific Page Vendor and Views -->
		<script src="<?php echo base_url()?>HTML/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
		<script src="<?php echo base_url()?>HTML/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
		<script src="<?php echo base_url()?>HTML/js/views/view.home.js"></script>
		
		<!-- Theme Custom -->
		<script src="<?php echo base_url()?>HTML/js/custom.js"></script>
		
		<!-- Theme Initialization Files -->
		<script src="<?php echo base_url()?>HTML/js/theme.init.js"></script>
		

		<!-- Google Analytics: Change UA-XXXXX-X to be your site's ID. Go to http://www.google.com/analytics/ for more information.
		<script type="text/javascript">
		
			var _gaq = _gaq || [];
			_gaq.push(['_setAccount', 'UA-12345678-1']);
			_gaq.push(['_trackPageview']);
		
			(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
			})();
		
		</script>
		 -->

		<!--[if IE]>
			<link rel="stylesheet" href="<?php echo base_url()?>css/ie.css">
		<![endif]-->

		<!--[if lte IE 8]>
			<script src="vendor/respond/respond.js"></script>
			<script src="vendor/excanvas/excanvas.js"></script>
		<![endif]-->
	

	</head>
	
	<div class="body">
		<header id="header">
			<?php $uri = $_SERVER["REQUEST_URI"]; ?>
			<div class="container">
				<h1 class="logo">
					<a href="<?php echo base_url()?>main">
						<img alt="Porto" width="220" height="80" data-sticky-width="160" data-sticky-height="60" src="<?php echo base_url()?>images/logo.png">
					</a>
				</h1>
				<button class="btn btn-responsive-nav btn-inverse" data-toggle="collapse" data-target=".nav-main-collapse">
					<i class="fa fa-bars"></i>
				</button>
			</div>
			<div class="navbar-collapse nav-main-collapse collapse">
				<div class="container">
					<nav class="nav-main mega-menu">
						<ul class="nav nav-pills nav-main" id="mainMenu">
							<!-- case for admin login -->
			            	<?php if($this->session->userdata('level') == '10'){?>
	            				<li><a href="<?php echo base_url()?>admin/site" title="" class=""><span>Site</span></a></li>
	            				<li><a href="<?php echo base_url()?>admin/users" title="" class=""><span>Users</span></a></li>
			                	<li><a href="<?php echo base_url()?>admin/report" title="" class=""><span>Report</span></a></li>
			                	<li><a href="<?php echo base_url()?>admin/approval" title="" class=""><span>approval</span></a></li>
			                	<li><a href="<?php echo base_url()?>admin/adcode" title="" class=""><span>adcode</span></a></li>
			                	<li><a href="<?php echo base_url()?>auth/logout" title="" class=""><span>logout</span></a></li>
			                
							<!-- case for no-login --> 
			                <?php } else{ ?>
								<?php if( !$this->session->userdata('user_id')){?>
								<li><a href="<?php echo base_url()?>main">Home</a></li>
								<li><a href="<?php echo base_url()?>auth/register">APPPLY NOW</a></li>
								<li><a href="<?php echo base_url()?>about/">WHY US?</a>	</li>
								<li><a href="<?php echo base_url()?>cpm/">OUR RATES</a></li>
								<li><a href="<?php echo base_url()?>news/">NEWS</a></li>
								<li><a href="<?php echo base_url()?>auth/contact">CONTACT US</a></li>
								<li><a href="<?php echo base_url()?>auth/login" title="">LOG IN</a></li>
							<?php } ?>
						</ul>
					</nav>
				</div>
			</div>
		</header>

		
		<!--  taking this out for now ..             		
								
			            		
									<?php if( !$this->session->userdata('user_id')){?>
										<?php if(strpos($uri, 'login')){?> <li><a href="<?php echo base_url()?>auth/login" title=""><span>Login</span></a></li>
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
		


		-->	

<?php if($uri != "/" && $uri != "/main" && $uri != "/main/"){?>
		 		 <div class="headerTopLine"></div>
<?php } ?>


<!-- case for user login -->		 		 
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

