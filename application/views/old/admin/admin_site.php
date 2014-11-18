<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
    
            	<div class="payments">
					<table id="adminTbl" border="1px;">		
						<tr>
							<th>usa</th>			
						    <th>uk</th>
						    <th>canada</th>
						    <th>australia</th>
						    <th >international</th>
						    <th class="lastTh"></th>
						</tr>
						
						<?php
							$attributes = array('name' =>'cpmform', 'id' => '');
							echo form_open("admin/site", $attributes); 
						?>
							<?php foreach($cpm as $row){?>
								<tr>
									<td><input type="text" name="usa" value="<?php echo $row->usa?>" placeholder="" style="height: 30px;"></td>
									<td><input type="text" name="uk" value="<?php echo $row->uk?>" placeholder="" style="height: 30px;"></td>
									<td><input type="text" name="canada" value" value="<?php echo $row->canada?>" placeholder="" style="height: 30px;"></td>
									<td><input type="text" name="australia" value="<?php echo $row->australia?>" placeholder="" style="height: 30px;"></td>
									<td><input type="text" name="international" value="<?php echo $row->international?>" placeholder="" style="height: 30px;"></td>
									<td><button type="submit" style="height: 30px;">modify</button></td>
								</tr>
							<?php }?>
						<?php echo form_close(); ?>
					</table>		
					
					<table id="adminTbl" border="1px;">		
						<tr>
							<th>site title</th>			
						    <th>site email</th>
						    <th>site phone</th>
						    <th>site url</th>
						    <th>company name</th>			
						    <th>company phone</th>
						    <th>company address</th>
						    <th>company email</th>
						    <th class="lastTh"></th>
						</tr>
						
						<?php
							$attributes = array('name' =>'site_info_form', 'id' => '');
							echo form_open("admin/site", $attributes); 
						?>
							<tr>
								<td><input type="text" name="site_title" value="<?php echo $site_title?>" placeholder="" style="height: 30px;"></td>
								<td><input type="text" name="site_mail" value="<?php echo $site_mail?>" placeholder="" style="height: 30px;width: 200px;"></td>
								<td><input type="text" name="site_mobile" value" value="<?php echo $site_mobile?>" placeholder="" style="height: 30px;"></td>
								<td><input type="text" name="site_url" value="<?php echo $site_url?>" placeholder="" style="height: 30px; width: 200px;"></td>
								<td><input type="text" name="site_company_name" value="<?php echo $site_company_name?>" placeholder="" style="height: 30px;"></td>
								<td><input type="text" name="site_company_phone" value="<?php echo $site_company_phone?>" placeholder="" style="height: 30px;width: 200px;"></td>
								<td><input type="text" name="site_company_address" value" value="<?php echo $site_company_address?>" placeholder="" style="height: 30px; width: 200px"></td>
								<td><input type="text" name="site_company_email" value="<?php echo $site_company_email?>" placeholder="" style="height: 30px; width: 200px;"></td>
								<td><button type="submit" style="height: 30px;">modify</button></td>
							</tr>
						<?php echo form_close(); ?>
					</table>
					
					<table id="adminTbl" border="1px;">		
						<tr>
							<th>site facebook</th>			
						    <th>site twitter</th>
						    <th class="lastTh"></th>
						</tr>
						
						<?php
							$attributes = array('name' =>'site_info_form', 'id' => '');
							echo form_open("admin/site", $attributes); 
						?>
							<tr>
								<td><input type="text" name="facebook" value="<?php echo $facebook?>" placeholder="" style="height: 30px; width: 300px;"></td>
								<td><input type="text" name="twitter" value="<?php echo $twitter?>" placeholder="" style="height: 30px; width: 300px;"></td>
								<td><button type="submit" style="height: 30px;">modify</button></td>
							</tr>
						<?php echo form_close(); ?>
					</table>		
					
					<table id="adminTbl" border="1px;">		
						<tr>
							<th>site privacy policy</th>			
						    <th class="lastTh"></th>
						</tr>
						
						<?php
							$attributes = array('name' =>'site_info_txt_form', 'id' => '');
							echo form_open("admin/site", $attributes); 
						?>
							<tr>
								<td>
									<textarea type="text" name="site_privacy_policy" value="" placeholder="" style="height: 300px; width: 800px; font-size: 12px;">
									<?php echo $site_privacy_policy?>
									</textarea>
								</td>
								<td><button type="submit" style="height: 30px;">modify</button></td>
							</tr>
						<?php echo form_close(); ?>
					</table>
	         	</div>
	         	
            <!-- CONTENTS END -->
	         </div> 
 		 </div>
	 	<div id="footerBlock"></div>
	</div>
</div>
<!-- HEAD END -->