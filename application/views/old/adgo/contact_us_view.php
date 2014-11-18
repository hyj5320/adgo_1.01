<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>
    
	<script type="text/javascript">        
	    $(document).ready(function(){
	    	$("select[name='inquiry']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
	    })
	</script>

	<div id="content">
          <h1 class="applTitle">Contact Us</h1>
          <div class="applyFormCenterLine"></div>
     	  <p  class="topSlog">Note : These stars are being generated using the historical data from our</p>   
	  
     	  <div class="contactUsControl">
      	  		<div class=contactlInn>
        	
         		   <div class="contactInfoL">
						<?php echo form_open('auth/contact');?>
         		   		<p ><label>Full Name</label><input name="name" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Title </label><input name="title" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Company </label><input name="company" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Email </label><input name="email" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Phone </label><input name="phone" type="text" value="" placeholder="" class="form-control"></p>

         		   		<p ><label>Type of inquiry </label> </p>
         		   		<div style=" width: 315px; height: 42px;float:right;margin-right:5px">
	         		   			<select name="inquiry" class="select-block ">
	         		   				<option>Please Select...</option>
				                    <option value="Advertising"  >Advertising</option>
				                    <option value="Publisher"  >Publisher</option>
				                    <option value="General"  >General</option>
				                    <option value="Billing"  >Billing</option>
	         		   			</select>
	         		   			</div>
	         		   </div>
	         
           	                                                                                                                                                              
           			 <div>
           			 	<textarea name="question" rows="10" cols="10" onfocus="if (this.value=='message..') this.value=''" onblur="if (this.value==''){this.value='message..'}">message..</textarea></div>
                     <div class="contBtn"> 
                  	  <p>Or feel free to email us at <a href="mailto:<?php echo $site_mail;?>" title=""><?php echo $site_mail;?></a></p>           
                  	  <div class="form-password-btn" style="">
                  	  	<button class="btn btn-lg btn-block btn-inverse" type="submit" >Send</button>
                  	  </div>
                   	 </div>   
	           		<?php echo form_close(); ?>
	           		
	           		 </div>
					<div class="clearfix"></div>
					<div class="contactMap">
						<h1 ><?php echo $site_company_name;?></h1>
     	  				<p  ><?php echo $site_company_address;?> | <font color="#2d94ce">Phone </font><?php echo $site_company_phone;?> | <font color="#2d94ce">email</font> <?php echo $site_company_email;?></p> 
     	  				<div class="contactLocalMap"></div>
					</div>
 
	          </div>
              
 		 </div>
 		 
 		 <div id="footerBlock"></div>
 		 
	</div>
</div>