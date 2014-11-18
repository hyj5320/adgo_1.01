<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<script type="text/javascript">        
    $(document).ready(function(){
    	$("select[name='site_category']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    })
</script>

            	
            	<div class="newsite">
            	<h1 class="newsitelTitle">About Your Site</h1>
					<div class="newsiteinner">
						<?php echo form_open('new_site/add_site');?>
         				<div style="width: 100%;height: 30px;margin-top: 18px;">
         					<p><label>Site Type </label></p>
         					<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="site_kind" id="site_kind" value="0" data-toggle="radio">WebSite</label>
         					<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="site_kind" id="site_kind" value="1" data-toggle="radio">Application</label>
         					<label class="radio selectTypenewsite" style="padding-left: 15px;"><input type="radio" name="site_kind" id="site_kind" value="2" data-toggle="radio">Tumblr Account</label>
         				</div>
	         				
					    <p ><label>URL </label><input name="site_url" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Title </label><input name="site_title" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Description </label><input name="site_description" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Keywords </label><input name="site_keywords" type="text" value="" placeholder="" class="form-control"></p>
         		   		<p ><label>Category</label> </p>
         		   		<div style=" width: 380px; height: 42px;float:left;margin-right:5px">
	         		   		<select name="site_category" class="select-block ">
	         		   			<option value="0">Please Select...</option>
                                <option value="50">Art and Design</option>
                                <option value="11">Automotive</option>
                                <option value="51">Books, Literature, and Writing</option>
                                <option value="2">Business/Finance/Investing</option>
                                <option value="52">Celebrity</option>
                                <option value="53">Comics</option>
                                <option value="6">Computers, Internet, Email</option>
                                <option value="5">Culture &amp; Entertainment</option>
                                <option value="20">Education/Reference</option>
                                <option value="23">Family/Parenting</option>
                                <option value="54">Fashion &amp; Beauty</option>
                                <option value="18">Food &amp; Drink</option>
                                <option value="8">Games &amp; Gaming</option>
                                <option value="55">Games: Browser-based</option>
                                <option value="9">Health &amp; Lifestyle</option>
                                <option value="19">Hispanic</option>
                                <option value="17">Hobbies/Special Interests</option>
                                <option value="56">Home &amp; Garden</option>
                                <option value="22">Humor/Comedy</option>
                                <option value="57">Living Green</option>
                                <option value="7">Movies/Videos/TV</option>
                                <option value="1">Multiservice Portals/Search Engines</option>
                                <option value="14">Music/Broadcasts/Radio</option>
                                <option value="3">News and Current Events</option>
                                <option value="24">Other</option>
                                <option value="58">Pets &amp; Animals</option>
                                <option value="59">Photography</option>
                                <option value="60">Politics</option>
                                <option value="64">Profile Customization</option>
                                <option value="15">Real Estate</option>
                                <option value="16">Shopping</option>
                                <option value="13">Social Networking/Communities</option>
                                <option value="61">Sports</option>
                                <option value="62">T-shirts, Shoes, &amp; Apparel</option>
                                <option value="21">Technology</option>
                                <option value="10">Travel</option>
                                <option value="12">Wallpapers/Screensavers</option>
                                <option value="63">Weddings</option>            
	         		   		</select>
	         		   	</div>
	         		   		
         		   		<div style="width: 100%;height: 30px;margin-top: 18px">
         					<p><label>Privacy Policy </label></p>
         					<label class="radio selectPrivacyRadio" style="padding-left: 15px;"><input type="radio" name="privacy" id="privacy" value="0" data-toggle="radio">No</label>
         					<label class="radio selectPrivacyRadio" style="padding-left: 15px;"><input type="radio" name="privacy" id="privacy" value="1" data-toggle="radio">Yes</label>
         				</div>
         				
	         		   	<p ><label>Daily Visits </label><input name="daily_visits" type="text" value="" placeholder="" class="form-control"></p>
	         		   	<div class="form-ewsite-btn" style="">
	         		   		<button class="btn btn-lg btn-block btn-inverse" type="submit" >Submit</button>
	         		   	</div>
					</div>
					<?php echo form_close(); ?>
	         	</div>
	         <!-- CONTENTS END -->
	         </div> 
 		 </div>
	 	<div id="footerBlock"></div>
	</div>
</div>
<!-- HEAD END -->
