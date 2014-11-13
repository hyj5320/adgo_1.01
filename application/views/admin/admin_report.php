<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

            	<div class="payments" >
					<?php
						$attributes = array('name' =>'inputform', 'id' => '');
						echo form_open("admin/report", $attributes); 
					?>
					<table id="adminTbl" border="1px;">		
						<tr>			
						    <th>user_email</th>
						    <th>size</th>
						    <th>site</th>
						    <th>date</th>
						    <th>impressions</th>
						    <th>paid_impressions</th>
						    <th>ecpm</th>
						    <th>revenue</th>
						    <th>carried_over</th>
						    <th class="lastTh"></th>
						</tr>
						<tr>
							<td><input type="text" name="user_email" value="" placeholder="" style="height: 30px;"></td>
							<td><input type="text" name="size" value="" placeholder="" style="height: 30px;"></td>
							<td><input type="text" name="site" value="" placeholder="" style="height: 30px;"></td>
							<td><input type="text" name="date" value="" placeholder="" style="height: 30px;"></td>
							<td><input type="text" name="impressions" value="" placeholder="" style="height: 30px;"></td>
							<td><input type="text" name="paid_impressions" value="" placeholder="" style="height: 30px;"></td>
							<td><input type="text" name="ecpm" value="" placeholder="" style="height: 30px;"></td>
							<td><input type="text" name="revenue" value="" placeholder="" style="height: 30px;"></td>
							<td><input type="text" name="carried_over" value="" placeholder="" style="height: 30px;"></td>
							<td><button type="submit" style="height: 30px;">sumit&confirm</button></td>
						</tr>
					</table>
					<?php echo form_close(); ?>
					
					<div class="clearfix" style="height: 20px;"></div>
					
					<table id="adminTbl" border="1px;">		
						<tr>
							<th>id</th>			
						    <th>user_email</th>
						    <th>size</th>
						    <th>site</th>
						    <th>date</th>
						    <th>impressions</th>
						    <th>paid_impressions</th>
						    <th>ecpm</th>
						    <th>revenue</th>
						    <th>carried_over</th>
						    <th></th>
						    <th class="lastTh"></th>
						</tr>
						
						<?php foreach($list as $row){?>
							<?php
								$attributes = array('name' =>'modifyform', 'id' => '');
								echo form_open("admin/report_modify", $attributes); 
							?>
							<tr>
								<td><input type="text" name="id" value="<?php echo $row->id?>" placeholder="" style="height: 20px; width: 15px;" readonly></td>
								<td><input type="text" name="user_email" value="<?php echo $row->user_email?>" placeholder="" style="height: 20px;"></td>
								<td><input type="text" name="size" value" value="<?php echo $row->size?>" placeholder="" style="height: 20px;"></td>
								<td><input type="text" name="site" value="<?php echo $row->site?>" placeholder="" style="height: 20px;"></td>
								<td><input type="text" name="date" value="<?php echo $row->date?>" placeholder="" style="height: 20px;"></td>
								<td><input type="text" name="impressions" value="<?php echo $row->impressions?>" placeholder="" style="height: 20px;"></td>
								<td><input type="text" name="paid_impressions" value="<?php echo $row->paid_impressions?>" placeholder="" style="height: 20px;"></td>
								<td><input type="text" name="ecpm" value="<?php echo $row->ecpm?>" placeholder="" style="height: 20px;"></td>
								<td><input type="text" name="revenue" value="<?php echo $row->revenue?>" placeholder="" style="height: 20px;"></td>
								<td><input type="text" name="carried_over" value="<?php echo $row->carried_over?>" placeholder="" style="height: 20px;"></td>
								<td><button type="submit" style="height: 20px;">modify</button></td>
								<td><button type="button" style="height: 20px;" onclick="location.href='<?php echo base_url()?>admin/report_delete/<?php echo $row->id?>'">delete</button></td>
							</tr>
							<?php echo form_close(); ?>
						<?php }?>
					</table>
					
					<div class="clearfix" style="height: 20px;"></div>
	         	</div>
            <!-- CONTENTS END -->
	         </div> 
 		 </div>
	 	<div id="footerBlock"></div>
	</div>
</div>
<!-- HEAD END -->