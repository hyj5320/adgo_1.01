<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<section class="page-top">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb">
					<li><a href="<?php echo base_url()?>">Home</a></li>
					<li class="active">PAYMENTS</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<h2>Payment History</h2>
			</div>
		</div>
	</div>
</section>


<div id="content">
	<div class="container" style="height: 400px;">
		<div class="row">
			<div class="col-md-12">
				<div class="payments">

					<table class="table table-bordered table-striped table-condensed mb-none center">		
						<thead>
							<tr>			
							    <th class="center">Month</th>			
							    <th class="center">Revenue</th>			
							    <th class="center">Minimum Payment</th>			
							    <th class="center">Carried Over</th>		
							    <th class="center">Total Due</th>
							    <th class="center">Status</th>	
							</tr>							
						</thead>
						<tbody>
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
						</tbody>
					</table>
				</div>
			</div>
 		</div>
 	</div>
 </div>



<!-- CONTENTS END -->