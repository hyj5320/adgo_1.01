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

		<!-- jquery from original design -->
		<script src="<?php echo base_url()?>include/js/jquery.flipCounter.1.2.pack.js"></script>
	    
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

				<!-- If login user print user information on top-->
				<?php if( ($this->session->userdata('user_id')) && $uri != "/auth/contact/" && $uri != "/cpm" && $uri != "/cpm/calculator" &&
										 $uri != "/auth/send_again/" && $uri != "/admin/report" && $uri != "/admin/report/" && $uri != "/admin/site" && $uri != "/admin/site/" &&
										 $uri != "/admin/approval" && $uri != "/admin/adcode" && $uri != "/admin/users"  && $uri != "/admin/users_search"
				){?>
				
					<nav style="margin-right:20px;">
						<ul class="nav nav-pills nav-top">
							<li><a href="#" title="">Hi, <?php echo $this->session->userdata('username')?> !</a></li>
						</ul>
				</nav>
				
				<?php } ?>

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
							
							<!-- case for user login -->		 		 
							<?php } elseif( ($this->session->userdata('user_id')) && $uri != "/auth/contact/" && $uri != "/cpm" && $uri != "/cpm/calculator" &&
										 $uri != "/auth/send_again/" && $uri != "/admin/report" && $uri != "/admin/report/" && $uri != "/admin/site" && $uri != "/admin/site/" &&
										 $uri != "/admin/approval" && $uri != "/admin/adcode" && $uri != "/admin/users"  && $uri != "/admin/users_search"
							){?>
									 
					            		<li><a href="<?php echo base_url()?>report/" title="">Earnings</a></li>
					            		<li><a href="<?php echo base_url()?>adcode/" title="" class="addCode">Ad Code</a></li>
					            		<li><a href="<?php echo base_url()?>payments/" title="">Payments</a></li>
					            		<li><a href="<?php echo base_url()?>paymentprofile/" title="" class="paymProf">Payment Profile</a></li> 
					            		<li><a href="<?php echo base_url()?>new_site/" title="" class="addCode">Add New Site</a></li>
    				            		<li><a href="<?php echo base_url()?>con_info" title="" class="contInfLink">Contact Info</a></li>
		            					<li><a href="<?php echo base_url()?>auth/change_password" title="" class="passw">Password</a></li> 
		                    			<li><a href="<?php echo base_url()?>auth/logout" title="" >Logout</a></li>

		                	<!-- case for not registered user-->
							<?php } else { ?>
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

<!-- taking this out for now..

<?php if($uri != "/" && $uri != "/main" && $uri != "/main/"){?>
		 		 <div class="headerTopLine"></div>
<?php } ?>

-->


