<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- content top -->
<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li class="active">SITE</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Site Information</h2>
			</div>
		</div>
	</div>
</section>


<div id="content">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="payments">
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-condensed mb-none">	
							<thead>
								<tr>
									<th>usa</th>			
								    <th>uk</th>
								    <th>canada</th>
								    <th>australia</th>
								    <th >international</th>
								    <th class="lastTh"></th>
								</tr>
							</thead>
							<tbody>	
							<?php
								$attributes = array('name' =>'cpmform', 'id' => '');
								echo form_open("admin/site", $attributes); 
							?>
								<?php foreach($cpm as $row){?>
									<tr>
										<td><input type="text" name="usa" value="<?php echo $row->usa?>" placeholder=""></td>
										<td><input type="text" name="uk" value="<?php echo $row->uk?>" placeholder=""></td>
										<td><input type="text" name="canada" value="<?php echo $row->canada?>" placeholder=""></td>
										<td><input type="text" name="australia" value="<?php echo $row->australia?>" placeholder=""></td>
										<td><input type="text" name="international" value="<?php echo $row->international?>" placeholder=""></td>
										<td><button type="submit" style="height: 30px;">modify</button></td>
									</tr>
								<?php }?>
							<?php echo form_close(); ?>
							</tbody>
						</table>		
					</div>
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-condensed mb-none">
							<thead>		
								<tr>		
								    <th>site email</th>
								    <th>site url</th>
								    <th>company name</th>			
								    <th>company phone</th>
								    <th>company address</th>
								    <th>company email</th>
								    <th class="lastTh"></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$attributes = array('name' =>'site_info_form', 'id' => '');
									echo form_open("admin/site", $attributes); 
								?>
									<tr>
										<td><input type="text" name="site_mail" value="<?php echo $site_mail?>" placeholder=""></td>
										<td><input type="text" name="site_url" value="<?php echo $site_url?>" placeholder=""></td>
										<td><input type="text" name="site_company_name" value="<?php echo $site_company_name?>" placeholder=""></td>
										<td><input type="text" name="site_company_phone" value="<?php echo $site_company_phone?>" placeholder=""></td>
										<td><input type="text" name="site_company_address" value="<?php echo $site_company_address?>" placeholder=""></td>
										<td><input type="text" name="site_company_email" value="<?php echo $site_company_email?>" placeholder=""></td>
										<td><button type="submit">modify</button></td>
									</tr>
								<?php echo form_close(); ?>
							</tbody>
						</table>
					</div>
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-condensed mb-none">
							<thead>
								<tr>
									<th>site facebook</th>			
								    <th>site twitter</th>
								    <th class="lastTh"></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$attributes = array('name' =>'site_info_form', 'id' => '');
									echo form_open("admin/site", $attributes); 
								?>
									<tr>
										<td><input type="text" name="facebook" value="<?php echo $facebook?>" placeholder=""></td>
										<td><input type="text" name="twitter" value="<?php echo $twitter?>" placeholder=""></td>
										<td><button type="submit" style="height: 30px;">modify</button></td>
									</tr>
								<?php echo form_close(); ?>
							</tbody>
						</table>		
					</div>
					<div class="table-responsive">
						<table class="table table-bordered table-striped table-condensed mb-none">
							<thead>
								<tr>
									<th>site privacy policy</th>			
								    <th class="lastTh"></th>
								</tr>
							</thead>
							<tbody>
								<?php
									$attributes = array('name' =>'site_info_txt_form', 'id' => '');
									echo form_open("admin/site", $attributes); 
								?>
									<tr>
										<td>
											<textarea type="text" name="site_privacy_policy" value="" placeholder="" style="font-size: 12px;">
											<?php echo $site_privacy_policy?>
											</textarea>
										</td>
										<td><button type="submit" style="height: 30px;">modify</button></td>
									</tr>
								<?php echo form_close(); ?>
							</tbody>
						</table>
				 	</div>
			 	</div>
				<!-- CONTENTS END -->
            </div> 
 		</div>
 	</div>
 </div>	
				