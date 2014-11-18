<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

				<div class="payments" >
					<table id="adminSearchTbl" border="1px;">
            			<tr>
            			<?php
							$attributes = array('name' =>'searchform', 'id' => '');
							echo form_open("admin/users", $attributes); 
						?>
							<th><button type="submit" style="height: 30px;">ALL</button></th>
						<?php echo form_close(); ?>	
						<?php
							$attributes = array('name' =>'searchform', 'id' => '');
							echo form_open("admin/users_search", $attributes); 
						?>	
						    <th>email or website</th>
						    <th><input type="text" name="search" value="" placeholder="" style="height: 30px; width: 200px;"></th>
						    <th><button type="submit" style="height: 30px;">search</button></th>
						<?php echo form_close(); ?>
						</tr>
            		</table>

					<table id="adminTbl" border="1px;">		
						<tr>
							<th>id</th>
							<th>website</th>
						    <th>email</th>
						    <th>company</th>
						    <th>name</th>
						    <th>phone</th>
						    <th>timezone</th>
						    <th>level</th>
						    <th>joinDate</th>
						    <th>lastLogin</th>
						    <th>status</th>
						    <th>comment</th>
						    <th></th>
						    <th class="lastTh"></th>
						</tr>
						<?php foreach($list as $row){?>
							<?php
								$attributes = array('name' =>'modifyform', 'id' => '');
								echo form_open("admin/users_modify", $attributes); 
							?>
								<tr>
									<td><input type="text" name="id" value="<?php echo $row->id;?>" placeholder="" style="height: 30px; width: 30px;" readonly></td>
									<td><input type="text" name="site_url" value="<?php echo $row->site_url;?>" placeholder="" style="height: 30px;"></td>
									<td><input type="text" name="email" value="<?php echo $row->email;?>" placeholder="" style="height: 30px;"></td>
									<td><input type="text" name="company" value="<?php echo $row->company;?>" placeholder="" style="height: 30px;"></td>
									<td><input type="text" name="username" value="<?php echo $row->username;?>" placeholder="" style="height: 30px;"></td>
									<td><input type="text" name="phone" value="<?php echo $row->phone;?>" placeholder="" style="height: 30px;"></td>
									<td>
										<select name="timezone1" class="select-block">
											<option value="0" selected></option>
											<?php foreach ($timezone_arr as $val){?>
												<?php if($row->timezone1 == $val->timezone_id){?>
													<option value="<?php echo $val->timezone_id;?>" selected><?php echo $val->timezone_name;?></option>
												<?php } else{?>
													<option value="<?php echo $val->timezone_id;?>"><?php echo $val->timezone_name;?></option>
												<?php }?>
											<?php }?>
			         		   			</select>
									</td>
									
									<td><input type="text" name="level" value="<?php echo $row->level;?>" placeholder="" style="height: 30px; width: 50px;"></td>
									<td><input type="text" name="created" value="<?php echo $row->created;?>" placeholder="" style="height: 30px;"></td>
									<td><input type="text" name="last_login" value="<?php echo $row->last_login;?>" placeholder="" style="height: 30px;"></td>
									<td>
										<select name="activated" id="activated" class="select-block">
			         		   				<option value="0" <?php if($row->activated == 0){?>selected<?php }?>>Pending</option>
			         		   				<option value="1" <?php if($row->activated == 1){?>selected<?php }?>>Approved</option>
			         		   			</select>
									</td>
									<td><textarea type="text" name="admin_comment" value="" placeholder="" style="height: 30px; width: 150px; font-size: 12px;"><?php echo $row->admin_comment;?></textarea></td>
									<td><button type="submit" style="height: 30px;">modify</button></td>
									<td><button type="button" style="height: 30px;" onclick="location.href='<?php echo base_url()?>admin/users_delete/<?php echo $row->id?>'">delete</button></td>
								</tr>
							<?php echo form_close(); ?>
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