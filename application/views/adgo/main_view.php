<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- impression counter -->
<!-- http://bundlr.com/clips/50ea86e09a8d4d00020013e6 -->
<script type="text/javascript">
	jQuery(document).ready(function(){
		$("#AdRequestsCounter").flipCounter({
			number:0,
			numIntegralDigits:1,
			numFractionalDigits:0,
			digitClass:"counter-digit",
			counterFieldName:"counter-value",
			digitHeight:40,
			digitWidth:30,
			imagePath:"<?php echo base_url()?>include/img/flipCounter-medium.png",
			easing: false,
			duration:500000,
			onAnimationStarted:false,
			onAnimationStopped:false,
			onAnimationPaused:false,
			onAnimationResumed:false
		});
		$("#AdRequestsCounter").flipCounter("setNumber",42);
		$("#AdRequestsCounter").flipCounter("renderCounter",50);
		$("#AdRequestsCounter").flipCounter(
			"startAnimation",
			{
					number: 0, 
					end_number: 4877543,
					easing: jQuery.easing.easeOutCubic,
					duration: 500000,
			}
		);
	});
</script>

<div role="main" class="main">
				<div class="slider-container">
					<div class="slider" id="revolutionSlider" data-plugin-revolution-slider data-plugin-options='{"startheight": 500}'>
						<ul>
							<li data-transition="fade" data-slotamount="12" data-masterspeed="2000" >
								<img src="images/slides/slide-bg.jpg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
							<!-- first talking bubble -->
							
							<div class="tp-caption main-label sft stb"
								data-x="90"
								data-y="170"
								data-speed="300"
								data-start="500"
								data-easing="easeOutExpo">ADVERTISERS</div>

							<div class="tp-caption sfl stb visible-lg"
								data-x="70"
								data-y="215"
								data-speed="300"
								data-start="500"
								data-easing="easeOutExpo"><img src="images/underline_yellow.png" alt=""></div>

							<div class="tp-caption bottom-label sft stl"
								data-x="90"
								data-y="240"
								data-speed="300"
								data-start="1000"
								data-easing="easeOutExpo"><strong>HMM... WHERE CAN WE<br> ADVERTISE?</strong></div>

							<div class="tp-caption top-label sfl stl"
								data-x="50"
								data-y="80"
								data-speed="300"
								data-start="2000"
								data-easing="easeOutExpo"><img src="images/GO1_Circle1.png" alt=""></div>
							
							<div class="tp-caption main-label sft stb"
								data-x="850"
								data-y="170"
								data-speed="300"
								data-start="2500"
								data-easing="easeOutExpo">PUBLISHERS</div>

							<div class="tp-caption sfl stb visible-lg"
								data-x="830"
								data-y="215"
								data-speed="300"
								data-start="2500"
								data-easing="easeOutExpo"><img src="images/underline_blue.png" alt=""></div>

							<!-- second talking bubble -->
							<div class="tp-caption bottom-label sft"
								data-x="850"
								data-y="240"
								data-speed="300"
								data-start="3500"
								data-easing="easeOutBack"><strong>HOW DO WE GENERATE <br> MORE REVENUE?</strong></div>

							<div class="tp-caption top-label sfr stl"
								data-x="800"
								data-y="110"
								data-speed="300"
								data-start="4000"
								data-easing="easeOutExpo"><img src="images/GO1_Circle2.png" alt=""></div>
							
							<div class="tp-caption sft"
								data-x="430"
								data-y="180"
								data-speed="500"
								data-start="5000"
								data-easing="easeOutBack"><img src="images/Go1_a.png" alt=""></div>

							<div class="tp-caption sft"
								data-x="600"
								data-y="220"
								data-speed="500"
								data-start="5000"
								data-easing="easeOutBack"><img src="images/Go1_b.png" alt=""></div>

							<!-- ADGO time -->
							<div class="tp-caption sfb"
								data-x="470"
								data-y="140"
								data-speed="500"			
								data-start="6500"
								data-easing="easeOutBack"><img src="images/Go1_c.png" alt=""></div>
							</li>

							<li data-transition="fade" data-slotamount="12" data-masterspeed="2000" >
				
								<img src="images/slides/slide-bg.jpg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
				
									<div class="tp-caption main-label sft stb"
										 data-x="135"
										 data-y="230"
										 data-speed="900"
										 data-start="1000"
										 data-easing="easeOutExpo" style="font-size: 40px;">ADVERTISERS</div>
				
									<div class="tp-caption main-label sft stb"
										 data-x="720"
										 data-y="230"
										 data-speed="900"
										 data-start="3000"
										 data-easing="easeOutExpo" style="font-size: 40px;">PUBLISHERS</div>

									<div class="tp-caption top-label sfl stl"
										data-x="115"
										data-y="275"
										data-speed="300"
										data-start="2000"
										data-easing="easeOutExpo"><img src="images/underline_yellow.png" alt=""></div>
									
									<div class="tp-caption top-label sfl stl"
										data-x="700"
										data-y="275"
										data-speed="300"
										data-start="4000"
										data-easing="easeOutExpo"><img src="images/underline_blue.png" alt=""></div>

									<div class="tp-caption sft stb"
										 data-x="100"
										 data-y="170"
										 data-speed="600"
										 data-start="5500"
										 data-easing="easeOutExpo"><img src="images/go2.png" alt=""></div>
							</li>

							<li data-transition="fade" data-slotamount="12" data-masterspeed="2000" >
				
								<img src="images/slides/slide-bg.jpg" data-bgfit="cover" data-bgposition="left top" data-bgrepeat="no-repeat">
													
									<div class="tp-caption main-label sft stb"
										 data-x="510"
										 data-y="170"
										 data-speed="900"
										 data-start="3000"
										 data-easing="easeOutExpo" style="font-size: 40px;">PUBLISHERS</div>
									
									<div class="tp-caption sfl stb"
										 data-x="190"
										 data-y="240"
										 data-speed="600"
										 data-start="2000"
										 data-easing="easeOutExpo"><img src="images/people.png" alt=""></div>

									<div class="tp-caption main-label sft stb"
										 data-x="190"
										 data-y="170"
										 data-speed="900"
										 data-start="1000"
										 data-easing="easeOutExpo" style="font-size: 40px;">ADVERTISERS</div>
									
									<div class="tp-caption sfl stb"
										 data-x="550"
										 data-y="235"
										 data-speed="600"
										 data-start="4000"
										 data-easing="easeOutExpo"><img src="images/$$$.png" alt=""></div>

									<div class="tp-caption sft stb"
										 data-x="130"
										 data-y="100"
										 data-speed="600"
										 data-start="5000"
										 data-easing="easeOutExpo"><img src="images/go3_Circles.png" alt=""></div>

									<div class="tp-caption sft stb"
										 data-x="800"
										 data-y="200"
										 data-speed="600"
										 data-start="6500"
										 data-easing="easeOutExpo"><img src="images/Go3.png" alt=""></div>	





							</li>
						</ul>
					</div>
				</div>

				<div class="home-intro">
						<div class="container">
					
							<div class="row">
								<div class="col-md-8">
									<br>
									<h4 class="top_content_footer">LET US DO THE <strong class="top_content_footer_em">HEAVY LIFTING</strong> FOR YOU!</h4>
								</div>
								<div class="col-md-4">
									<div class="get-started">
										<a href="<?php echo base_url()?>auth/register" class="btn btn-lg btn-primary" class="btn btn-lg btn-primary">Get Started Now!</a>
										<div class="learn-more">or <a href="<?php echo base_url()?>about/">learn more.</a></div>
									</div>
								</div>
							</div>
					
						</div>
					</div>

					<div class="container">
						
						<div class="row center" style="margin-top:40px;">
							<div class="col-md-12">
								<h2>
									<strong>Success</strong>
									with your Business... and
									<strong>Beyond</strong>
								</h2>
								<p class="featured lead">
									Adgo.tv is an online advertising firm. Adgo.tv helps publishers monetize their sites while helping <br>
									advertisers forcus their ads to targeted audience. Adgo.tv has exceeded majority of their competitors <br>
									on individual payouts and have turned the industry to help both sides of the coin realize the maximum on <br>
									returns for all parties invloved.
								</p>
							</div>
						</div>

					</div>

					<div class="home-concept">
						<div class="container">

							<div class="row center">
								<span class="sun"></span>
								<span class="cloud"></span>
								<div class="col-md-2 col-md-offset-1" style="margin-bottom:130px">
									<div class="process-image" data-appear-animation="bounceIn">
										<img src="images/ready.png" alt="" />
									
										<strong>READY</strong>
										<p class="main_content_small" style="margin-top:20px">
											<b style="color:black;">READY</b> to start<br>
											monetizing<br>
											your site<br>
										</p>
									</div>
								</div>
								<div class="col-md-2" style="margin-bottom:130px">
									<div class="process-image" data-appear-animation="bounceIn" data-appear-animation-delay="200" >
										<img src="images/set.png" alt="" />
										<strong>SET</strong>
										<p class="main_content_small" style="margin-top:20px">
											It's time to <b style="color:black;">SET</b><br>
											on the Perfect<br>
											Partnership<br>
										</p>
									</div>
								</div>
								<div class="col-md-2" style="margin-bottom:130px">
									<div class="process-image" data-appear-animation="bounceIn" data-appear-animation-delay="400" >
										<img src="images/go.png" alt="" />
										<strong>GO</strong>
										<p class="main_content_small" style="margin-top:20px">
											<b style="color:black;">GO</b> with the Adgo.tv<br>
											Gorilla to do the<br>
											heavy lifting for you<br>
										</p>
									</div>
								</div>
								<div class="col-md-4 col-md-offset-1" style="padding-bottom:30px">
									<div class="project-image">
										<div id="fcSlideshow" class="fc-slideshow">
											<ul class="fc-slides">
												<li><img class="img-responsive" src="images/money.png" /></li>
												<li><img class="img-responsive" src="images/calculator.png" /></li>
											</ul>
										</div>
										<strong class="our-work">SHOW ME THE $$$</strong>
									</div>
								</div>
							</div>

						</div>
					</div>

					<div class="container">

						<div class="row">
							<hr class="tall" />
						</div>

					</div>


					<div class="map-section">
						<section class="featured footer map" style="padding-top:0px; padding-bottom:25px; background: #0088cc;">
							<div class="container">
								<div class="row center">
									<div class="col-md-12">
										
										<h3 class="top_content_footer" style="padding-top:20px; margin-bottom:20px;">Impressions Served</h3>
	     	 							<div id="AdRequestsCounter"><input type="hidden" name="counter-value" value="10000"/></div>
									</div>
								</div>
							</div>
						</section>
					</div>
				</div>
		
