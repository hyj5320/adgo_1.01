<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
<script type="text/javascript">        
    	function modefiTextArea(){
    		checked = $('#notifications').is(":checked");
    		var noti;
    		if(checked) noti = '1';
    		else noti = '0'
    		$('[name=notifications]').val(noti);
    	}
</script>
		
			<div class="newsite">
            	<h1 class="newsitelTitle">Contact Info</h1>
				<div class="newsiteinner">

					<?php
						$attributes = array('name' =>'updateform', 'id' => '');
						echo form_open("con_info/update", $attributes); 
					?>
						
						<p ><label>Contact Name </label><input name="username" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Company </label><input name="company" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Email </label><input name="email" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Phone </label><input name="phone" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Notifications </label><label class="checkbox" for="checkbox1" style="float:left;width:40px" >
         		   		<input type="checkbox" value="" id="notifications" data-toggle="checkbox" onchange="modefiTextArea();"></label></p>
         		   		<h1 id="checkConnectInfoService">(Email me with news & updates)</h1>
         		   		<div class="form-ewsite-btn" style="">
	         		   		<button class="btn btn-lg btn-block btn-inverse" type="submit" class="btn btn-info">Submit</button>
         		   		</div>
         		   		<p ><label></label><input name="notifications" type="hidden" value="" placeholder="" class="form-control"></p>
					</div>
	         	</div>
	         	<?php echo form_close(); ?>
	         	
	         	<script type="text/javascript">
				    $('[name=username]').val('<?php echo $username?>');
				    $('[name=company]').val('<?php echo $company?>');
				    $('[name=email]').val('<?php echo $email?>');
				    $('[name=phone]').val('<?php echo $phone?>');
					if(<?php echo $notifications;?> > 0){
					    $("input:checkbox[id='notifications']").attr("checked", true);
					}
			   </script>
            </div>
        </div>
     <div id="footerBlock"></div>
	</div>
</div>