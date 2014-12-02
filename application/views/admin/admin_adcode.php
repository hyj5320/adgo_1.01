<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<!-- content top -->
<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li class="active">ADCODE</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Provide Adcode For Customer</h2>
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
								    <th >id</th>			
								    <th >email</th>
								    <th >url</th>			
								    <th >title</th>
								    <th >size</th>
								    <th >code</th>
								    <th ></th>
								</tr>
							</tead>
							<tbody>
								<?php foreach($list as $row){?>
									<?php
										$attributes = array('name' =>'makecodeform', 'id' => '');
										echo form_open("admin/makeCode", $attributes); 
									?>
										<tr>
											<td ><input type="text" name="id" value="<?php echo $row->id;?>" placeholder=""></td>
											<td ><input type="text" name="email" value="<?php echo $row->email;?>" placeholder=""></td>
											<td ><input type="text" name="site_url" value="<?php echo $row->site_url;?>" placeholder=""></td>
											<td ><input type="text" name="site_title" value="<?php echo $row->site_title;?>" placeholder=""></td>
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
											<td ><textarea type="text" name="code" value="" placeholder="ex:>> http://ads-by.madadsmedia.com/tags/20992/8816/async/slider/300x250.js"></textarea></td>
											<td ><button type="submit">make code</button></td>
										</tr>
									<?php echo form_close(); ?>
								<?php }?>
							</tbody>
						</table>
					</div>	
					<div class="clearfix" style="height: 20px;"></div>
           		</div>
 			</div>
		</div>	
	</div>			
</div>
          