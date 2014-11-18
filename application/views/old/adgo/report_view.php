<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>include/css/jquery.datepick.css"> 
	<link href="<?php echo base_url()?>include/css/jquery.jqplot.css" media="screen" rel="stylesheet" type="text/css" />
	
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jquery.plugin.min.js"></script> 
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jquery.datepick.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jquery.jqplot.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jqplot.highlighter.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jqplot.cursor.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jqplot.dateAxisRenderer.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jqplot.canvasTextRenderer.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jqplot.canvasAxisTickRenderer.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jqplot.categoryAxisRenderer.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jqplot.barRenderer.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jqplot.pointLabels.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jqplot.enhancedLegendRenderer.min.js"></script>
	
	<script type="text/javascript" src="<?php echo base_url()?>include/js/jquery.easyPaginate.js"></script>
	
	<style>
		div.reportMainNav {
		    text-align: center;
		    margin: 1em 0;
		}
	
		div.reportMainNav span {
		    display: inline-block;
		    width: 1.8em;
		    height: 1.8em;
		    line-height: 1.8;
		    text-align: center;
		    cursor: pointer;
		    background: #D6DBDF;
		    color: #fff;
		    margin-right: 0.5em;
		}
	
		div.reportMainNav span.active {
		    background: #0DC999;
		}
	</style>
		
<script type="text/javascript">        
    $(document).ready(function(){
    	$("select[name='size']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    	$("select[name='site']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});

    	$('#popupDateStart').datepick({"dateFormat": 'mm-dd-yyyy'});
    	$('#popupDateEnd').datepick({"dateFormat" : 'mm-dd-yyyy'});
		
    	$('table.display').each(function() {
    	    var currentPage = 0;
    	    var numPerPage = 5;
    	    var $table = $(this);
    	    $table.bind('repaginate', function() {
    	        $table.find('tbody tr').hide().slice(currentPage * numPerPage, (currentPage + 1) * numPerPage).show();
    	    });
    	    
    	    $table.trigger('repaginate');
    	    var numRows = $table.find('tbody tr').length;
    	    var numPages = Math.ceil(numRows / numPerPage);
    	    
    	    var $pager = $('.reportMainNav');
    	    var $previous = $('<span class="previous"><<</spnan>');
    	    var $next = $('<span class="next">>></spnan>');
    	    
    	    for (var page = 0; page < numPages; page++) {
    	        $('<span class="page-number"></span>').text(page + 1).bind('click', {
    	            newPage: page
    	        }, function(event) {
    	            currentPage = event.data['newPage'];
    	            $table.trigger('repaginate');
    	            $(this).addClass('active').siblings().removeClass('active');
    	        }).appendTo($pager).addClass('clickable');
    	    }
    	    $pager.insertAfter($table).find('span.page-number:first').addClass('active');
    	    $previous.insertBefore('span.page-number:first');
    	    $next.insertAfter('span.page-number:last');
    	}); 

		var line1 = [<?php foreach($result as $row){?>['<?php echo substr($row->date, 0, 10);?>', <?php echo $row->impressions;?>,'<table class=\"jqplot-highlighter\"><tr><td>Date:</td><td><?php echo substr($row->date, 0, 10);?></td></tr><tr><td>Impressions:</td><td><?php echo $row->impressions;?></td></tr><tr><td>Revenue:</td><td>$<?php echo $row->revenue;?></td></tr><tr><td>eCPM:</td><td>$<?php echo $row->ecpm;?></td></tr></table>'],<?php }?>];
		var line2 = [<?php foreach($result as $row){?>['<?php echo substr($row->date, 0, 10);?>', <?php echo $row->revenue;?>,'<table class=\"jqplot-highlighter\"><tr><td>Date:</td><td><?php echo substr($row->date, 0, 10);?></td></tr><tr><td>Impressions:</td><td><?php echo $row->impressions;?></td></tr><tr><td>Revenue:</td><td>$<?php echo $row->revenue;?></td></tr><tr><td>eCPM:</td><td>$<?php echo $row->ecpm;?></td></tr></table>'],<?php }?>];
		var line3 = [<?php foreach($result as $row){?>['<?php echo substr($row->date, 0, 10);?>', <?php echo $row->paid_impressions;?>,'<table class=\"jqplot-highlighter\"><tr><td>Date:</td><td><?php echo substr($row->date, 0, 10);?></td></tr><tr><td>Impressions:</td><td><?php echo $row->impressions;?></td></tr><tr><td>Revenue:</td><td>$<?php echo $row->revenue;?></td></tr><tr><td>eCPM:</td><td>$<?php echo $row->ecpm;?></td></tr></table>'],<?php }?>];
	     	
        var plot2 = $.jqplot('chartdiv', [line1, line2, line3], 
                {
    				series:[{renderer:$.jqplot.highlighter, label:'Impressions', color:'#0B92CA'}, 
    	    				{xaxis:'xaxis', yaxis:'y2axis', label:'Revenue', color:'#0DC999'}, 
    	    				{renderer:$.jqplot.highlighter, label:'Paid Impressions', color:'#FFD202'}],
            		axesDefaults:{tickRenderer: $.jqplot.CanvasAxisLabelRenderer,},
            		highlighter:{
    						show: true,
            				showMarker:false,
           				    tooltipAxes: 'both',
            				yvalues: 3,
		            		formatString:'<!--%s%s-->%s'
                			},    
	                legend: {
	                	renderer: $.jqplot.EnhancedLegendRenderer,
	                    show: true,
	                    placement: 'outsideGrid',
	                    location: 'n',
	                    rendererOptions: {numberRows: 1,marginBottom:20}
	                },    
	                axes: {
		                  xaxis: {
		                    renderer: $.jqplot.DateAxisRenderer,
		                      tickOptions:{
		                        formatString:'%b %#d'
		                      },
		                  },
	                  	yaxis: {
	                    	autoscale:true,
	                      	tickOptions:{
	                        	formatString:'%s'
	                       	 }    
	                      },
	                      
			            y2axis: { 
						    autoscale:true,
						    tickOptions:{
						    	formatString:'$%.2f'
						    }    
			            }
    			}
    		});
   		 });
</script>

<script type="text/javascript">
	function valid_datePicker() {
	    var sDateArray = jQuery.trim($('#popupDateStart').val()).split('-');
		var eDateArray = jQuery.trim($('#popupDateEnd').val()).split('-');

		var sDate = sDateArray[2] + sDateArray[0] + sDateArray[1];
		var eDate = eDateArray[2] + eDateArray[0] + eDateArray[1];

		var size = $("#size option:selected").val();
		var site = $("#site option:selected").val();

		if(eDate < sDate){
			$('#popupDateStart').val($.datepick.formatDate( 'mm-dd-yyyy', $.datepick.today()));
			$('#popupDateEnd').val($.datepick.formatDate( 'mm-dd-yyyy', $.datepick.today()));
			alert("Query start and end dates do not fit the criteria.");
			return;
		}
		else{
			document.searchform.submit();
		}
	}
</script>

					<div class="reportMain">
						<div class="reportMainTop">
							<?php
								$attributes = array('name' =>'searchform', 'id' => '');
								echo form_open("report/search", $attributes); 
							?>
							<p ><label style="width: 100px;">Earnings</label>
								<input id="popupDateStart" name="startDate" type="text" value="" placeholder="" class="iconDateInput form-control">
								<script type="text/javascript">document.searchform.startDate.value="<?php echo $startDate?>";</script>
								<span class="datespan">~</span>
								<input id="popupDateEnd" name="endDate" type="text" value="" placeholder="" class="iconDateInput form-control">
								<script type="text/javascript">document.searchform.endDate.value="<?php echo $endDate?>";</script>
							</p>
						
							<div class="btnDatePeriodGroup">
							 <button  class="btnDatePeriod"  type="button" onclick="valid_datePicker();">UPDATE</button>
							 <button  class="btnDatePeriod"  type="button" onclick="$('#popupDateStart').datepick('setDate', 0);$('#popupDateEnd').datepick('setDate', 0);valid_datePicker();">TODAY</button>
							 <button  class="btnDatePeriod"  type="button" onclick="$('#popupDateStart').datepick('setDate', -7);$('#popupDateEnd').datepick('setDate', 0);valid_datePicker();">LAST 7DAYS</button>
							 <button  class="btnDatePeriod"  type="button" onclick="$('#popupDateStart').datepick('setDate', -30);$('#popupDateEnd').datepick('setDate', 0);valid_datePicker();">LAST 30DAYS</button>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="reportMainSelect">
							<p style="float:left"><label>Size </label> </p>
	         		   		<div style=" width: 215px; height: 22px;float:left;margin-right:5px">
	         		   			<select name="size" id="size" class="select-block reportMainSelectSize" onchange="document.forms['searchform'].submit();">
           						     <option value="0">All Media Types</option>
                                    <option value="2">728x90 Banner</option>
                                            <option value="1">300x250 Medium Rectangle</option>
                                            <option value="3">160x600 SkyScraper</option>
                                            <option value="8">120x600 Skyscraper</option>
                                            <option value="7">468x60 Banner</option>
                                            <option value="6">Pop-unders</option>
                                            <option value="9">320x50 Mobile Banner</option>
                                            <option value="10">300x600 Half Page</option>
                                            <option value="13">125x125 Button</option>
                                            <option value="11">336x280 Large Rectangle</option>
                                            <option value="12">Video Ads</option>
                                            <option value="14">234x60 Custom</option>
	         		   			</select>
	         		   			<script type="text/javascript">document.searchform.size.value="<?php echo $size?>";</script>
	         		   			</div>
	         		   			
							<p style="float:left"><label>Site</label> </p>
	         		   		<div style=" width: 215px; height: 22px;float:left;margin-right:5px">
	      	  		   			<select name="site" id="site" class="select-block reportMainSelectSize" onchange="document.forms['searchform'].submit();">
             					   <option value="0">All Sites</option>
	         		   			</select>
	         		   			<script type="text/javascript">document.searchform.site.value="<?php echo $site?>";</script>
	         		   			</div>
	         		   	</div>
	         		   	<?php echo form_close(); ?>
	         		   	
	         		   <table cellpadding="0" class="display" cellspacing="0" id="reportTbl">
						    <thead>
						        <tr>
						            <th>Date</th>			
						            <th>Impressions</th>
						            <th>Paid Impressions</th>
						            <th>eCPM</th>			
						            <th class="lastTh">Revenue</th>
						        </tr>
						    </thead>
						    
						    <tbody>
						    	<?php if(count($result) < 1){?>
						    		<tr>
						    			<td colspan="5">No data available in table</td>
						    		</tr>
						    	<?php }else{?>
							    	<?php foreach($result as $row){?>
										<tr>
											<td><?php echo substr($row->date, 0, 10)?></td>
											<td><?php echo $row->impressions?></td>
											<td><?php echo $row->paid_impressions?></td>
											<td>$<?php echo $row->ecpm?></td>
											<td><span class="gtip">$<?php echo $row->revenue?></span></td>
										</tr>
									<?php }?>
						    	<?php }?>
						    </tbody>
						    
						    <tfoot>
						       <?php foreach ($result_sum as $row){?>
								   <tr>
								      <td class="total">Totals </td>
						      		  <td class="total"><?php if(count($result) > 0){?><?php echo $row->impressions?><?php } else{?>0<?php }?></td>
								      <td class="total"><?php if(count($result) > 0){?><?php echo $row->paid_impressions?><?php } else{?>0<?php }?></td>
								      <td class="total"><?php if(count($result) > 0){?>$<?php echo $row->ecpm?><?php } else{?>0<?php }?></td>
								      <td class="total lastTd"><?php if(count($result) > 0){?>$<?php echo $row->revenue?><?php } else{?>0<?php }?></td>
								   </tr>
						       <?php }?>
						    </tfoot>
						</table>
						
						<div class="reportMainNav" style="text-align: center;">
						</div>
						
					    <div class="clearfix"></div>
            			<div class="reportMainChart"><h5>Estimates Only. Numbers can take up to 2 days to finalize.</h5>	
    						<p><div id="chartdiv" style="height: 300px; width: 750px;"></div>	</p></div>
					    </div>

           <!-- CONTENTS END -->
           		<script>
	           		<?php foreach ($site_list as $row){?>
		    			$("#site").append("<option value='<?php echo $row->id;?>'><?php echo $row->site_title;?></option>");
		    		<?php }?>
				</script>
	         </div> 
 		 </div>
	 	<div id="footerBlock"></div>
	</div>
</div>
<!-- HEAD END -->