<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

            	<div class="payments" >
					<table id="adminTbl" border="1px;">		
						<tr>
							<th>id</th>			
						    <th>user_email</th>
						    
						    <th></th>
						    <th class="lastTh"></th>
						</tr>
						
						<?php foreach($list as $row){?>
							<?php
								$attributes = array('name' =>'approvalform', 'id' => '');
								echo form_open("admin/approval", $attributes); 
							?>
							<tr>
								<td><input type="text" name="id" value="<?php echo $row->id?>" placeholder="" style="height: 20px; width: 15px;" readonly></td>
								<td><input type="text" name="email" value="<?php echo $row->email?>" placeholder="" style="height: 20px;"></td>
								<td><button type="submit" style="height: 20px;">approval & send mail</button></td>
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