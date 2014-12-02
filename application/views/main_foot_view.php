<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

			<?php $uri = $_SERVER["REQUEST_URI"]; ?>
			<!-- EXPORT AS A FOOTER VIEW -->
			<footer id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-3">
							<div class="pages">
								<h4>Pages</h4>
								<a href="<?php echo base_url()?>main" id="footer_content">Home</a><br>
								<a href="<?php echo base_url()?>about/" id="footer_content">About Us</a><br>
								<a href="<?php echo base_url()?>auth/contact" id="footer_content">Contact Us</a><br>
							</div>
						</div>
						<div class="col-md-3">

							<!-- hide when user is logged in -->
							<?php if( !( ($this->session->userdata('user_id')) && $uri != "/auth/contact/" && $uri != "/cpm" && $uri != "/cpm/calculator" &&
								 $uri != "/auth/send_again/" && $uri != "/admin/report" && $uri != "/admin/report/" && $uri != "/admin/site" && $uri != "/admin/site/" &&
								 $uri != "/admin/approval" && $uri != "/admin/adcode" && $uri != "/admin/users"  && $uri != "/admin/users_search"
							) ) {?>
							<h4>Publishers</h4>
							<div id="footer_content">
								<a href="<?php echo base_url()?>auth/register" >Apply Now</a><br>
								<a href="<?php echo base_url()?>cpm/" >Our Rates</a><br>
							</div>
							<?php } ?>
						</div>

						<div class="col-md-2">
							<h4>Follow Us</h4>
							<div class="social-icons">
								<ul class="social-icons">
									<li class="facebook"><a href="https://www.facebook.com/adgotv" target="_blank" data-placement="bottom" rel="tooltip" title="Facebook">Facebook</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="footer-copyright">
					<div class="container">
						<div class="row">

							<div class="col-md-7">
								
							</div>
							<div class="col-md-3">
								<div id="footer_content" style="float:right;"><br>© Copyright 2014. All Rights Reserved.</div>
							</div>
							<div class="col-md-2">
								<a href="<?php echo base_url()?>" class="logo">
									<img alt="Porto Website Template" class="img-responsive" src="<?php echo base_url()?>images/Logo_Bottom.png">
								</a>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

	</body>
</html>


<!-- Specific Page Vendor and Views -->
<script src="<?php echo base_url()?>HTML/vendor/rs-plugin/js/jquery.themepunch.tools.min.js"></script>
<script src="<?php echo base_url()?>HTML/vendor/rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
<script src="<?php echo base_url()?>HTML/vendor/circle-flip-slideshow/js/jquery.flipshow.js"></script>
<script src="<?php echo base_url()?>HTML/js/views/view.home.js"></script>
