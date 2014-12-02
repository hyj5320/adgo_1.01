<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
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
							<h4>Publishers</h4>
							<div id="footer_content">
								<a href="<?php echo base_url()?>auth/register" >Apply Now</a><br>
								<a href="<?php echo base_url()?>cpm/" >Our Rates</a><br>
							</div>
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
								<a href="index.html" class="logo">
									<img alt="Porto Website Template" class="img-responsive" src="<?php echo base_url()?>images/logo_Bottom.png">
								</a>
							</div>
						</div>
					</div>
				</div>
			</footer>
		</div>

		<!-- Vendor -->
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

		<script src="http://maps.google.com/maps/api/js?sensor=false"></script> 		 
		<script>

			/*
			Map Settings

				Find the Latitude and Longitude of your address:
					- http://universimmedia.pagesperso-orange.fr/geo/loc.htm
					- http://www.findlatitudeandlongitude.com/find-address-from-latitude-and-longitude/

			*/

			// Map Markers
			var mapMarkers = [{
				address: "33838 Pacific Highway S Suite A201 Federal way",
				html: "<strong>Federal Way Office</strong><br>33838 Pacific Highway S Suite A201 Federal way",
				icon: {	
					image: "img/pin.png",
					iconsize: [26, 46],
					iconanchor: [12, 46]
				},
				popup: true
			}];

			// Map Initial Location
			var initLatitude = 47.29799749624088;
			var initLongitude = -122.3128616809845;

			// Map Extended Settings
			var mapSettings = {
				controls: {
					draggable: true,
					panControl: true,
					zoomControl: true,
					mapTypeControl: true,
					scaleControl: true,
					streetViewControl: true,
					overviewMapControl: true
				},
				scrollwheel: false,
				markers: mapMarkers,
				latitude: initLatitude,
				longitude: initLongitude,
				zoom: 16
			};

			var map = $("#googlemaps").gMap(mapSettings);

			// Map Center At
			var mapCenterAt = function(options, e) {
				e.preventDefault();
				$("#googlemaps").gMap("centerAt", options);
			}

		</script>
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

	</body>
</html>
