<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
    
            	<div class="payments">

					<table cellpadding="0" cellspacing="0" id="reportTbl">		
						<tr>			
						    <th width="16%">Month</th>			
						    <th width="16%">Revenue</th>			
						    <th width="16%">Minimum Payment</th>			
						    <th width="16%">Carried Over</th>		
						    <th width="15%">Total Due</th>
						    <th class="lastTh" width="40%">Status</th>	
						</tr>
						<?php if(count($result) < 1){?>
				    		<tr>
				    			<td colspan="6">No data available in table</td>
				    		</tr>
				    	<?php }else{?>
							<?php foreach($result as $row){?>
								<tr>
									<td><?php echo substr($row->date, 0, 7);?></td>
									<td><?php echo $row->revenue;?></td>
									<td>$<?php echo $row->minimum_payment_amount;?></td>
									<td><?php echo $row->carried_over;?></td>
									<td><?php echo $row->revenue + $row->carried_over;?></td>
									<td><a href="<?php echo base_url()?>paymentprofile/">Minimum Not Met</a></td>
								</tr>
							<?php }?>
						<?php }?>
					</table>
	         	</div>
            	
            <!-- CONTENTS END -->
	         </div> 
 		 </div>
	 	<div id="footerBlock"></div>
	</div>
</div>
<!-- HEAD END -->