<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

            	<div class="payments" >
					<table id="adminTbl" border="1px;">		
						<tr>			
						    <th >id</th>			
						    <th >email</th>
						    <th >url</th>			
						    <th >title</th>
						    <th >size</th>
						    <th >code</th>
						    <th ></th>
						</tr>
						<?php foreach($list as $row){?>
							<?php
								$attributes = array('name' =>'makecodeform', 'id' => '');
								echo form_open("admin/makeCode", $attributes); 
							?>
								<tr>
									<td ><input type="text" name="id" value="<?php echo $row->id;?>" placeholder="" style="height: 30px; width: 20px;"></td>
									<td ><input type="text" name="email" value" value="<?php echo $row->email;?>" placeholder="" style="height: 30px;"></td>
									<td ><input type="text" name="site_url" value="<?php echo $row->site_url;?>" placeholder="" style="height: 30px;"></td>
									<td ><input type="text" name="site_title" value="<?php echo $row->site_title;?>" placeholder="" style="height: 30px;"></td>
									<td >
										<select name="size" id="size" class="select-block reportMainSelectSize">
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
									</td>
									<td ><textarea type="text" name="code" value="" placeholder="ex:>> http://ads-by.madadsmedia.com/tags/20992/8816/async/slider/300x250.js" style="height: 100px; width: 800px; font-size: 12px;"></textarea></td>
									<td ><button type="submit" style="height: 30px; width: 80px;">make code</button></td>
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