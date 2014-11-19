<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
    
<script type="text/javascript">        
    $(document).ready(function(){
    	$("select[name='inquiry']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    })
</script>

<div id="content">
	<section class="page-top">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<ul class="breadcrumb">
						<li><a href="<?php echo base_url()?>">Home</a></li>
						<li class="active">Contact Us</li>
					</ul>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<h2>Get in Touch With US</h2>
				</div>
			</div>
		</div>
	</section>

	<div class="container">
		<div class="row">
			<div class="col-md-12">		
		        <h3 class="applTitle" style="color:black;"><b>Contact</b> Us</h3>
		    </div>
		</div>
	</div>

	<div class="container" style="padding-bottom:30px">
		<div class="row">
			<div class="col-md-6">
		        <div class="applyFormCenterLine"></div>

		     	<div class="contactUsControl">
	      	  		<div class=contactlInn>
	        	
	         		   <div class="contactInfoL">
							<?php echo form_open('auth/contact');?>
								
							<div class="col-md-6">
		         		   		<p ><label>Your name</label><input name="name" type="text" value="" placeholder="" class="form-control"></p>
		         		   		<p ><label>Company </label><input name="company" type="text" value="" placeholder="" class="form-control"></p>
		         		   	</div>
		         			<div class="col-md-6">
		         				<p ><label>Your email address </label><input name="email" type="text" value="" placeholder="" class="form-control"></p>
		         		   		<p ><label>Phone Number </label><input name="phone" type="text" value="" placeholder="" class="form-control"></p>
		         			</div>
		         			<div class="col-md-12">
		         		   		<p ><label>Type of inquiry </label>
	         		   			<select name="inquiry" class="form-control">
	         		   				<option>Please Select...</option>
				                    <option value="Advertising"  >Advertising</option>
				                    <option value="Publisher"  >Publisher</option>
				                    <option value="General"  >General</option>
				                    <option value="Billing"  >Billing</option>
	         		   			</select>
	         		   			</p>
         		   			
         		   			<!-- email address can be canged to a php syntax -->	
         					<p>Or feel free to email us at <a href="mailto:info@adgo.tv" title="">info@adgo.tv</a></p>
         		   			</div>


	         			</div>

         		   </div>
	         	</div>
           	</div>     
	     	<div class="contactUsControl">
					<div class=contactlInn>
					<div class="col-md-6">
						<p >Message * 
							<textarea maxlength="5000" data-msg-required="Please enter your message." rows="9" class="form-control" name="message" id="message" required style="margin-top:5px; margin-bottom:10px"></textarea>
		                    <div class="contBtn">       		           
								<div class="form-password-btn" style="">
		                  	  		<button class="btn btn-block btn-primary" type="submit" >Send Message</button>
		                  		</div>
		                   	</div>
	                   	</p>   
		           		<?php echo form_close(); ?>

		            </div> 

		 		</div>
		 	</div>
		 </div>
 	</div>		
	<!-- Google Maps -->
	
</div>
<div class="container" style="padding-top:20px">
	<div class="row">
		<div class="col-md-12">
			<div id="googlemaps" class="google-map"></div>
		</div>
	</div>
</div>

<!-- google map API -->
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
				address: "33838 Pacific Highway S Federal way",
				html: "<strong>Federal Way Office</strong><br>33838 Pacific Highway",
				icon: {	
					image: "img/pin.png",
					iconsize: [26, 46],
					iconanchor: [12, 46]
				},
				popup: true
			}];

			// Map Initial Location
			var initLatitude = 47.320301;
			var initLongitude = -122.311699;

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

