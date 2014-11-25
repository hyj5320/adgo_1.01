<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- content top -->
<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li class="active">REPORT</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Report Daily Statistics</h2>
			</div>
		</div>
	</div>
</section>


<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
            	<div class="payments" >

					<?php
						$attributes = array('name' =>'inputform', 'id' => '');
						echo form_open("admin/report", $attributes); 
					?>
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-condensed mb-none">
							<thead>	
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
							</thead>
							<tbody>
								<tr>
									<td><input type="text" name="user_email" value="" placeholder="" style="width:100px;"></td>
									<td><input type="text" name="size" value="" placeholder="" style="width:100px;"></td>
									<td><input type="text" name="site" value="" placeholder="" style="width:100px;"></td>
									<td><input type="text" name="date" value="" placeholder="" style="width:100px;"></td>
									<td><input type="text" name="impressions" value="" placeholder="" style="width:100px;"></td>
									<td><input type="text" name="paid_impressions" value="" placeholder="" style="width:100px;"></td>
									<td><input type="text" name="ecpm" value="" placeholder="" style="width:100px;"></td>
									<td><input type="text" name="revenue" value="" placeholder="" style="width:100px;"></td>
									<td><input type="text" name="carried_over" value="" placeholder="" style="width:100px;"></td>
									<td><button type="submit">sumit&confirm</button></td>
								</tr>
							</tbody>
						</table>
					<?php echo form_close(); ?>
					</div>
					<div class="clearfix" style="height: 20px;"></div>
					
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-condensed mb-none">
							<thead>
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
							</thead>
							<?php foreach($list as $row){?>
								<?php
									$attributes = array('name' =>'modifyform', 'id' => '');
									echo form_open("admin/report_modify", $attributes); 
								?>
								<tbody>
									<tr>
										<td><input type="text" name="id" value="<?php echo $row->id?>" placeholder="" readonly style="width:50px;"></td>
										<td><input type="text" name="user_email" value="<?php echo $row->user_email?>" placeholder="" style="width:150px;"></td>
										<td><input type="text" name="size" value="<?php echo $row->size?>" placeholder="" style="width:50px;"></td>
										<td><input type="text" name="site" value="<?php echo $row->site?>" placeholder="" style="width:100px;"></td>
										<td><input type="text" name="date" value="<?php echo $row->date?>" placeholder="" style="width:100px;"></td>
										<td><input type="text" name="impressions" value="<?php echo $row->impressions?>" placeholder=""></td>
										<td><input type="text" name="paid_impressions" value="<?php echo $row->paid_impressions?>" placeholder="" style="width:100px;"></td>
										<td><input type="text" name="ecpm" value="<?php echo $row->ecpm?>" placeholder="" style="width:100px;"></td>
										<td><input type="text" name="revenue" value="<?php echo $row->revenue?>" placeholder="" style="width:100px;"></td>
										<td><input type="text" name="carried_over" value="<?php echo $row->carried_over?>" placeholder="" style="width:100px;"></td>
										<td><button type="submit">modify</button></td>
										<td><button type="button" onclick="location.href='<?php echo base_url()?>admin/report_delete/<?php echo $row->id?>'">delete</button></td>
									</tr>
								</tobdy>
								<?php echo form_close(); ?>
							<?php }?>
						</table>
					</div>
					<div class="clearfix"></div>
				</div>
            </div> 
 		</div>
 	</div>
 </div>	

<!-- CONTENTS END -->
