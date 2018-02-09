<script type="text/javascript">
$(function(){
$("#datepicker1").datepicker({dateFormat: 'yy-mm-dd'}).attr('readonly', 'readonly');
$("#datepicker2").datepicker({dateFormat: 'yy-mm-dd'}).attr('readonly', 'readonly');
//{dateFormat: 'mm-dd-yy', altField: '#datepicker2_alt', altFormat: 'yy-mm-dd'}
});
</script>
<section class="col-sm-12">                                
    <div class="col-sm-8  ">
    	<!-- <div class="alert1 alert-info" style="text-align:center;">
			<strong><?php echo sprintf(lang('times_used'), @$num_uses);?></strong>
		</div> -->
    </div>        
    <section class="">
        <!-- Load the settings form in views -->
        <div class="row">
    		<!-- Start Form -->
    		<div class="col-lg-12">
        		<form role="form" id="form" action="<?php echo base_url('admin/coupons/form/'.$id);?>" method="post" class="form-horizontal  " novalidate="novalidate">
		            <section class="panel panel-default">
		                <header class="panel-heading  ">Coupon Form</header>
		                <div class="panel-body">
		                    <input name="settings" value="general" type="hidden">
		                    <input name="languages" value=",0" type="hidden">

	                        <ul class="nav nav-tabs" role="tablist">
	                            <li><a class="active" data-toggle="tab" href="#tab-english">Form</a></li>
	                            <li><a data-toggle="tab" href="#tab-"></a></li>
                                <li><a data-toggle="tab" href="#tab-0"></a></li>
	                        </ul>
	                        <br>
	                        <div class="tab-content">
	                            <div class="" id="tab-english">
	                                <div class="form-group">
	                                	<label class="col-lg-3 control-label">Coupon Code</label>
	                                	<div class="col-lg-7">
	                                		<?php
											$data	= array('name'=>'code', 'value'=>set_value('code', $code), 'class'=>'form-control');
											echo form_input($data);
											?>
	                                	</div>
	                            	</div>
	                            	<div class="form-group">
	                                	<label class="col-lg-3 control-label">Max Uses</label>
	                                	<div class="col-lg-7">
	                                		<?php
											$data	= array('name'=>'max_uses', 'value'=>set_value('max_uses', $max_uses), 'class'=>'form-control');
											echo form_input($data);
											?>
	                                	</div>
	                            	</div>

	                            	<div class="form-group">
	                                	<label class="col-lg-3 control-label">Limit Per Order</label>
	                                	<div class="col-lg-7">
	                                		<?php
											$data	= array('name'=>'max_product_instances', 'value'=>set_value('max_product_instances', $max_product_instances), 'class'=>'form-control');
											echo form_input($data);
											?>
	                                	</div>
	                            	</div>
	                            	<div class="form-group">
	                                	<label class="col-lg-3 control-label">Enable On (UTC)</label>
	                                	<div class="col-lg-7">
	                                		<?php
											$data	= array('id'=>'datepicker1', 'name' => 'start_date', 'value'=>set_value('start_date', ($start_date)), 'class'=>'span3');
											echo form_input($data);
											?>
											<input type="button" value="Clear" class="btn" onclick="$('#datepicker1').val('');" />
											<!-- <input type="hidden" name="start_date" value="<?php echo set_value('start_date', $start_date) ?>" id="datepicker1_alt" readonly /> -->
	                                	</div>
	                            	</div>
	                            	<div class="form-group">
	                                	<label class="col-lg-3 control-label">Disable On (UTC)</label>
	                                	<div class="col-lg-7">
	                                		<?php
											$data	= array('id'=>'datepicker2', 'name'=>"end_date", 'value'=>set_value('end_date', ($end_date)), 'class'=>'span3');
											echo form_input($data);
											?>
											<input type="button" value="Clear"  class="btn" onclick="$('#datepicker2').val('');" />
											<!-- <input type="hidden" name="end_date" value="<?php echo set_value('end_date', $end_date) ?>" id="datepicker2_alt" readonly /> -->
	                                	</div>
	                            	</div>
									<div class="form-group hide">
	                                	<label class="col-lg-3 control-label">Coupon Type</label>
	                                	<div class="col-lg-7">
	                                		<?php
										 		$options = array(
												'price'  => lang('price_discount'),
												//'shipping' => lang('free_shipping')
								               	);
												echo form_dropdown('reduction_target', $options,  $reduction_target, 'id="gc_coupon_type" class="form-control"');
											?>
	                                	</div>
	                            	</div>
	                            	<div class="form-group">
	                                	<label class="col-lg-3 control-label">Reduction Amount</label>
	                                	<div class="col-lg-7">
	                                		<div class="">
											<?php	$options = array(
								                  'percent'  => lang('percentage'),
												  'fixed' => lang('fixed')
								               	);
												echo ' '.form_dropdown('reduction_type', $options,  $reduction_type, 'class="form-control"');
											?>
											</div>
											<div class="">
												<?php
													$data	= array('id'=>'reduction_amount', 'name'=>'reduction_amount', 'value'=>set_value('reduction_amount', $reduction_amount), 'class'=>'form-control');
													echo form_input($data);?>
											</div>
	                                	</div>
	                            	</div>
								</div>

	                        </div>
		                </div>
		                <div class="form-group">
		                    <label class="col-lg-3"></label>
		                    <div class="col-lg-7">
		                        <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
		                    </div>
		                </div>
		            </section>
        		</form>
    		</div>
    		<!-- End Form -->
		</div>

        <!-- End of settings Form -->
    </section>
</section>

<script type="text/javascript">
$('form').submit(function() {
	$('.btn').attr('disabled', true).addClass('disabled');
});

$(document).ready(function(){
	//$("#gc_tabs").tabs();
	
	if($('#gc_coupon_type').val() == 'shipping')
	{
		$('#gc_coupon_price_fields').hide();
	}
	
	$('#gc_coupon_type').bind('change keyup', function(){
		if($(this).val() == 'price')
		{
			$('#gc_coupon_price_fields').show();
		}
		else
		{
			$('#gc_coupon_price_fields').hide();
		}
	});
	
	if($('#gc_coupon_appliesto_fields').val() == '1')
	{
		$('#gc_coupon_products').hide();
	}
	
	$('#gc_coupon_appliesto_fields').bind('change keyup', function(){
		if($(this).val() == 0)
		{
			$('#gc_coupon_products').show();
		}
		else
		{
			$('#gc_coupon_products').hide();
		}
	});
});

</script>