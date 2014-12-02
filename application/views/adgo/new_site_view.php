<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>

<script type="text/javascript">        
    $(document).ready(function(){
    	$("select[name='site_category']").selectpicker({style: 'btn-hg btn-primary', menuStyle: 'dropdown-inverse'});
    })
</script>

<!-- content top -->
<section class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url()?>">Home</a></li>
                    <li class="active">ADD SITE</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Add Your Site</h2>
            </div>
        </div>
    </div>
</section>


<div id="content">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
            </div>     
            <div class="col-md-6">
                <?php echo form_open('new_site/add_site');?>
                <div class="panel-body">
                    <div class="form-horizontal form-bordered">
                        <div class="form-group">
                            <label class="col-md-4 control-label" style="text-align:left;">Site Type</label>
                            <div class="col-md-8">
                                <div class="radio">
                                    <label style="margin-right:5px">
                                        <input type="radio" name="site_kind" id="site_kind" value="0" data-toggle="radio">WebSite
                                    </label>
                                    <label style="margin-right:5px">
                                        <input type="radio" name="site_kind" id="site_kind" value="1" data-toggle="radio">Application
                                    </label>
                                    <label>
                                        <input type="radio" name="site_kind" id="site_kind" value="2" data-toggle="radio">Tumblr Account                                           
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-md-4 control-label" style="text-align:left;">URL</label>
                            <div class="col-md-8">
                                <input name="site_url" type="text" value="" placeholder="" class="form-control">
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label" style="text-align:left;">Title</label>
                            <div class="col-md-8">
                                </label><input name="site_title" type="text" value="" placeholder="" class="form-control">
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label" style="text-align:left;">Description</label>
                            <div class="col-md-8">
                                <input name="site_description" type="text" value="" placeholder="" class="form-control">
                            </div>
                        </div>

                         <div class="form-group">
                            <label class="col-md-4 control-label" style="text-align:left;">Keywords</label>
                            <div class="col-md-8">
                                <input name="site_keywords" type="text" value="" placeholder="" class="form-control">
                            </div>
                        </div>
                         <div class="form-group">
                            <label class="col-md-4 control-label" style="text-align:left;">Category</label>
                            <div class="col-md-8">
                                <select name="site_category" class="form-control">
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
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label" style="text-align:left;">Privacy Policy</label>
                            <div class="col-md-8">
                                <label class="radio selectPrivacyRadio" style="padding-left: 20px;"><input type="radio" name="privacy" id="privacy" value="0" data-toggle="radio">No</label>
                                <label class="radio selectPrivacyRadio" style="padding-left: 20px;"><input type="radio" name="privacy" id="privacy" value="1" data-toggle="radio">Yes</label>
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="col-md-4 control-label" style="text-align:left;">Daily Visits</label>
                            <div class="col-md-8">
                                <input name="daily_visits" type="text" value="" placeholder="" class="form-control">
                            </div>
                        </div>
                        
                        <button class="btn btn-block btn-primary" type="submit" >Submit</button>

                    </div>
                </div>
            </div>
 <!-- CONTENTS END -->
        </div>
    </div>
 </div> 


