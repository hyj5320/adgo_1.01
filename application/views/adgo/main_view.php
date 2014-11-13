<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
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
					duration:10000,
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
							end_number: <?php echo $total?>,
							easing: jQuery.easing.easeOutCubic,
							duration: 5000,
					}
				);
			});
		</script>
		
 		 <div id="header">
     		<div id="headInn"><img src="<?php echo base_url()?>include/img/topHeader.png" width="1003" height="450" alt="" /></div>
	     	 	<div id="adsServed" style="float: left; margin-left: 33%;"><h3>Impressions Served: &nbsp;</h3></div>
	     	 	<div id="AdRequestsCounter" style="margin-top: 10px;"><input type="hidden" name="counter-value" value="100"/></div>
   		 </div>
   		    
 		 <div id="content">
 		 	<div class="contInf" onclick="location.href='<?php echo base_url()?>about/'">
 		 		<div class="cont1">&nbsp;</div>
 		 	</div>
 		 	
 		 	<div class="contInf" onclick="location.href='<?php echo base_url()?>about/'">
 		 		<div class="cont2">&nbsp;</div>
 		 	</div>
 		 	
 		 	<div class="contInf" onclick="location.href='<?php echo base_url()?>about/'">
 		 		<div class="cont3">&nbsp;</div>
 		 	</div>
 		 	
 		 	<div class="companyLogo">
	        	<table cellpadding="0" cellspacing="0" class="companyTbl">
	        		<script>
			        	var imgArray = ["google","mediaplex","dubleClick","micrAdv","turn","aol","openX","appnexus","brandSc","mediaMath","quancast","invitemedia"];
			        	
						for(var i = 1; i < imgArray.length + 1; i++){
							if(i%4 == 1){
								var j = i+4;
								document.write('<tr>');
							}
							
							document.write('<td>');
							document.write('<a href="#" title="" ><img src="<?php echo base_url()?>include/img/mainLogos/' + imgArray[i-1] + '.png"  alt="" /></a>');
							document.write('<a href="#" title="" class="hovLogo"><img src="<?php echo base_url()?>include/img/mainLogos/' + imgArray[i-1]  + 'Hov.png"  alt="" /></a>');
							document.write('</td>');

							if(i == j){
								document.write('</tr>');
							}
						}
					</script>
	            </table>
	        </div>
 		 </div>
		 		 
 		 <div id="footerBlock"></div>
 		 
	</div>
</div>
		
