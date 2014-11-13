<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>	
    
	<script type="text/javascript">        
	    $(document).ready(function(){
	
	    })
	</script>
	
	<div id="content">
        <h1 class="applTitle"><font style="color:#2a93c9">AD</font>GO.TV Revenue Calculator</h1>
        <div class="applyFormCenterLine"></div>
      	<p class="topCpm">Note: These stats are being generated using the historical data from our 'General/Entertainment' sites.<br />
       This category of sites typically has the lowest CPM of all sites. If your site does not fall into this category,<br />
        you can expect higher CPMs/revenue than what will be shown. </p> 
     	  
     	  <div class="application">
      	  		<div class="applInn">
         		   <div class="CpmInfoL">
         		   		<?php echo form_open('cpm/calculator');?>
         		   		<h3>Enter Your Traffic Stats Below to Estimate </br>Your Daily/Monthly Revenue</h3>
         		   		<p ><label>Daily Ad Impressions </label><input name="impressions" type="text" value="" placeholder="" class="form-control"></p>
         		   		<h3 style="border-bottom:none;border-top:solid 1px #b2b2b2;padding-top:15px;fontsize:15px">Percentage of Visitors by Country </h3>
         		   		
         		   		<p ><label>USA (example: 75%) </label><input name="usa" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>United Kingdom </label><input name="uk" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Canada</label><input name="canada" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Australia</label><input name="australia" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Rest of World/International</label><input name="international" type="text" value="" placeholder="" class="form-control"></p>
         		   		
         		   	<div class="form-password-btn" style="">
         		   		<button class="btn btn-lg btn-block btn-inverse" type="submit" >Calculator</button>
         		   	</div>
         		   </div>
         		   <?php echo form_close(); ?>
         
         			<div class="CpmInfoR">
         				<h3 style="border-bottom:none;">&nbsp;</h3>
         		   		<h3 style="border-bottom:none;border-top:solid 2px #151e27;padding-top:10px;fontsize:15px;color:#6e6e6e;margin-top:20px">Output Estimate Revenue</h3>
         				<div style="width:100%;height:200px;background-color:#242f3a;border-radius: 6px">
         					<p ><label name="tx_impressions" >Impressions:</label></p>
         					<p ><label name="tx_cpm">Your eCPM: <font style="color:#ed145b"></font></label></p>
         					<p ><label name="tx_drevenue">Estimated Daily Revenue: <font style="color:#ed145b"></font></label></p>
         					<p ><label name="tx_mrevenue">Estimated Monthly Revenue: <font style="color:#ed145b"></font></label></p>
         				</div>

         				<div class="clearfix"></div>
         				<div class="form-CpmInfoR-btn" style=""><a href="<?php echo base_url()?>auth/register" class="btn btn-lg btn-block btn-inverse">Apply now <span class="fui-triangle-right-large" style="font-size:4px;margin-left:10px;color:#aeb6bf;top:-2px"></span></a></div>
         			</div>
           		 </div>
          </div>
 		</div>
 		
 		<script type="text/javascript">
 		 	$('[name=impressions]').val('<?php echo $impressions?>');

 		 	$('[name=usa]').val('<?php echo $usa?>');
 		 	$('[name=uk]').val('<?php echo $uk?>');
 		 	$('[name=canada]').val('<?php echo $canada?>');
 		 	$('[name=australia]').val('<?php echo $australia?>');
 		 	$('[name=international]').val('<?php echo $international?>');

 		 	$('[name=tx_impressions]').text('Impressions: <?php echo $impressions?>');
 		 	$('[name=tx_cpm]').text('Your eCPM: $<?php echo $ecpm?>');
 		 	$('[name=tx_drevenue]').text('Estimated Daily Revenue: $<?php echo $dvar?>');
 		 	$('[name=tx_mrevenue]').text('Estimated Monthly Revenue: $<?php echo $mvar?>');
 		</script>
 		
 		<div id="footerBlock"></div>
	</div>
</div>