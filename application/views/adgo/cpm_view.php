<?php if (!defined('BASEPATH')) exit('No direct script access allowed');?>	

<script type="text/javascript">        
    $(document).ready(function(){

    })
</script>


<!-- content top -->
<section class="page-top">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="<?php echo base_url()?>">Home</a></li>
                    <li class="active">Our Rates</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <h2>Revenue Calculator</h2>
            </div>
        </div>
    </div>
</section>


<div id="content">
    <div class="container">
        <div class="row">
            <?php echo form_open('cpm/calculator');?>
            
            <div class="col-md-2"></div>

            <div class="col-md-10">
                <h3 style="color:#6e6e6e;">Enter Your Traffic Stats Below to Estimate<br>Your Daily/Monthly Revenue</h3>
            </div>

            
            <div class="col-md-2"></div>

            <!-- first column -->
            <div class="col-md-4">
                <div style="border-bottom:none;border-top:solid 2px #151e27;padding-top:10px;fontsize:15px;color:#6e6e6e; margin-bottom:20px;"></div>

                <label class="col-md-6 control-label">Daily Ad Impressions</label>
                <div class="col-md-6">
                    <input name="impressions" type="text" value="" placeholder="" class="form-control" id="inputDefault">
                </div>
                
                <div class="col-md-12" style="border-bottom:none;border-top:solid 1px #151e27; margin-top:30px; margin-bottom:20px;">
                    <h4 style="padding-top:10px;fontsize:15px;color:#6e6e6e;">Percentage of Visitors by Country</h4>
                </div>
                
                <div class="form-group">
                    <label class="col-md-6 control-label">USA (example: 75%)</label>
                    <div class="col-md-6">
                        <input name="usa" type="text" value="" placeholder="" class="form-control" id="inputDefault">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-6 control-label">United Kingdom</label>
                    <div class="col-md-6">
                        <input name="uk" type="text" value="" placeholder="" class="form-control" id="inputDefault">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-6 control-label">Canada</label>
                    <div class="col-md-6">
                        <input name="canada" type="text" value="" placeholder="" class="form-control" id="inputDefault">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-6 control-label">Australia</label>
                    <div class="col-md-6">
                        <input name="australia" type="text" value="" placeholder="" class="form-control" id="inputDefault">
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-md-6 control-label">Rest of World/International</label>
                    <div class="col-md-6">
                        <input name="international" type="text" value="" placeholder="" class="form-control" id="inputDefault">
                    </div>
                </div>

                <div class="form-password-btn" style="">
                    <button class="btn btn-block btn-primary" type="submit" style="margin-bottom:20px;">Calculator</button>
                </div>

            </div>     
            <?php echo form_close(); ?>

            <!-- second column -->
            <div class="col-md-4">
                <h4 style="border-bottom:none;border-top:solid 2px #151e27;padding-top:10px;fontsize:15px;color:#6e6e6e;">Output Estimate Revenue</h4>
                <div style="width:100%;height:200px;background-color:#242f3a;border-radius: 6px; padding-left:20px; padding-top:20px; color:white;">
                    <label name="tx_impressions" >Impressions:</label>
                    <br><label name="tx_cpm">Your eCPM: <font style="color:#ed145b"></font></label>
                    <br><label name="tx_drevenue">Estimated Daily Revenue: <font style="color:#ed145b"></font></label>
                    <br><label name="tx_mrevenue">Estimated Monthly Revenue: <font style="color:#ed145b"></font></label>
                </div>

                <div class="clearfix"></div>
                <div class="form-CpmInfoR-btn" style="padding-bottom:40px;"><a href="<?php echo base_url()?>auth/register" class="btn btn-block btn-primary btn-lg">Apply now <span class="fui-triangle-right-large" style="font-size:4px;margin-left:10px;color:#aeb6bf;top:-2px"></span></a></div>
                <script type="text/javascript">
                    $('[name=impressions]').val('<?php echo $impressions?>');

                    $('[name=usa]').val('<?php echo $usa?>');
                    $('[name=uk]').val('<?php echo $uk?>');
                    $('[name=canada]').val('<?php echo $canada?>');
                    $('[name=australia]').val('<?php echo $australia?>');
                    $('[name=international]').val('<?php echo $international?>');

                    $('[name=tx_impressions]').text('Impressions: <?php echo $impressions?>');
                    $('[name=tx_cpm]').text('Your eCPM: $<?php echo $ecpm?>');
                    $('[name=tx_drevenue]').text('Estimated Daily Revenue: $<?php echo $dvar?>');
                    $('[name=tx_mrevenue]').text('Estimated Monthly Revenue: $<?php echo $mvar?>');
                </script>
                <div class="col-md-3"></div>
                <div class="col-md-9">    
                    <img src = "<?php echo base_url()?>images/Go_Money.png" style="width:250px; height:200px;">
                </div>
            </div> 
        </div>
    </div>
 </div> 
	  