<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<script>
    $(document).ready(function(){
        $(".tab").click(function(){
        	var t = $(this).attr("id");
			if(t == "ft"){
				$("#st").removeClass("active");
				$("#ft").addClass("active");
			}
			else{
				$("#ft").removeClass("active");
				$("#st").addClass("active");
			}
            var v = $(this).attr("v");
            $(".tab-pane").css("display", "none");
            $(".tab-pane").eq(v).css("display", "block");
        });
         
    });
</script>

       		<div class="adcode">
            	<h1 class="adcodeTitle">Generate Ad Code</h1>
					<div class="adcodeinner">
						<div class="adCodetop">
							<b style="color:#ee155a">Please Note:</b>
							<b style="color:#737373;border-bottom: solid 1px #737373;">
							These ad tags will only work for the domain which was approved.</br>  
							Attempting to run these tags on any other domain will result in non-paying public service ads being displayed.</br>  
							If you wish to run these ads on any other domain, please submit the site for approval or contact us</b>
						</div>
						
						<?php
							$attributes = array('name' =>'searchform', 'id' => '');
							echo form_open("adcode/search", $attributes); 
						?>
							
						<p style=" width: 150px;float:left;"><label >Generate Code For</label></p>
	         		   	<div style=" width: 100px; height:50px;float:left;margin-right:5px">
	         		   		<select name="site" id="site" style="height:25px;margin-top:5px" onchange="document.forms['searchform'].submit();">
							</select>
                        </div>
                       <?php echo form_close(); ?>
                                         
	         			<div class="clearfix"></div>
	         			
					 	<div class="adcodecenter">
						 	<ul class="nav nav-tabs nav-append-content">
				         	  	<li id="ft" class="tab active" v="0"><a>Javascript</a></li>
				          	  	<li id="st" class="tab" v="1"><a>iframe</a></li>
				         	 </ul>
			         	 
			            	 <div class="tab-content">
						        <div class="tab-pane active" id="tab1">
						             <h1>Recommended Ad Sizes</h1>
						             
						             <div name="code" id="code"></div>
						             
						        </div>
						        
				            	<div class="tab-pane" id="tab2">

				            	</div>
			            	</div>
					 	</div>
 						
					</div>
	         	</div>
	         	<!-- CONTENTS END -->
	         	<script type="text/javascript">
				    <?php foreach ($site as $row){?>
						$("#site").append("<option value='<?php echo $row->id;?>'><?php echo $row->site_title;?></option>");
					<?php }?>


					<?php foreach ($code as $row){?>
						var i = <?php echo $row->size;?>;
						var size;
						switch (i) {
						  case 2    : size = "728x90 Banner";
						   break;
						  case 1   : size = "728x90";
						   break;
						  case 3  : size = "160x600 SkyScraper";
						   break;
						  case 8  : size = "120x600 Skyscraper";
			               break;
						  case 7  : size = "468x60 Banner";
			               break;
						  case 6  : size = "Pop-unders";
			               break;
						  case 9  : size = "320x50 Mobile Banner";
			               break;
						  case 10  : size = "300x600 Half Page";
			               break;
						  case 13  : size = "125x125 Button";
			               break;
						  case 11  : size = "336x280 Large Rectangle";
			               break;
						  case 12  : size = "Video Ads";
			               break;
						  case 13  : size = "234x60 Custom";
			               break;
						  default  : size = "";
						  break;
						}

						var select = document.getElementById("site");
						var option_text   = select.options[select.selectedIndex].text;

						$("#code").append("<p style='margin-bottom:0px'>"+size+"Medium Rectangle (Highest CPM Ad Size):</p>");
						$("#code").append("<label style='line-height:1.2'>Make this ad slide in on the page (yields a higher CPM).</label>");
						$("#code").append("<div class='clearfix'>");
						$("#code").append("<textarea>&lt;!-- ADGO.TV Asynchronous Ad Tag For "+ option_text +"--&gt;\r\n&lt;!-- Size: "+ size +"--&gt;\r\n&lt;script src=\"<?php echo $row->code;?>\" type=\"text/javascript\"&gt;&lt;/script&gt;\r\n&lt;!-- ADGO.TV Asynchronous Ad Tag For "+ option_text +"  --&gt;\r\n");
						$("#code").append("</textarea>");
						$("#code").append("</div>");

						$('[name=site]').val("<?php echo $row->site;?>");
					<?php }?>
				</script>
	         </div> 
 		 </div>
	 	<div id="footerBlock"></div>
	</div>
</div>
<!-- HEAD END -->
