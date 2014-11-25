<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>


<!-- content top -->
<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li class="active">APROVAL</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Approve Pending User</h2>
			</div>
		</div>
	</div>
</section>


<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="payments" >
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-condensed mb-none">
							<thead>			
								<tr>
									<th>id</th>			
								    <th>user_email</th>
								    
								    <th></th>
								</tr>
							</thead>
							<tbody>
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
							</tbody>
						</table>
					</div>
					<div class="clearfix" style="height: 20px;"></div>
				</div>
				<!-- CONTENTS END -->
            </div> 
 		</div>
 	</div>
 </div>	


