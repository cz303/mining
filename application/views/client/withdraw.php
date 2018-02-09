<?php include_once 'asset/admin-ajax.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.default.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.common.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kendo.all.min.js"></script>
<?= message_box('success'); ?>
<?= message_box('error'); ?>
<?php
$user_id = $this->session->userdata('user_id');
$this->db->select('bitcoin,payeer,advcash,perfect_money,ltc,dashcoin,eth');
$profile_info = $this->db->where('user_id', $user_id)->get('tbl_account_details')->row_array();

#print_r($profile_info);die();
$user_withdrawal_bal = user_total_balence($user_id)['withdrawable_balence'];


?>
<style>
.withdraw-account {
    background: #36c6d3 none repeat scroll 0 0;
    border-radius: 2px;
    color: #fff;
    font-size: 18px;
    margin: 10px 15px 20px 20px;
    padding: 10px;
    text-align: center;
}
</style>
<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs">
        <!--li class="<?= $active == 1 ? 'active' : ''; ?>"><a href="#manage" data-toggle="tab"><?= lang('withdrawal_list') ?></a></li>
        -->
		<li class="active"><a href="#new" data-toggle="tab"><?= lang('new_widthdrawal') ?></a></li>                                                                     
    </ul>
    <div class="tab-content no-padding">
        
		<div class="tab-pane active" id="new">
            <form role="form" id="planForm" enctype="multipart/form-data" action="<?php echo base_url(); ?>client/withdrawal/save_withdrawal" method="post" class="form-horizontal form-groups-bordered">
                
				<div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
							<div class="row">
                                <div class="col-md-12">
							       <div class="withdraw-account">Your Withdrawable Amount($): <?php echo $user_withdrawal_bal;?></div>
                                </div>
                            </div>
							<label class="col-sm-4 control-label"><strong><?= lang('amount') ?> ($)</strong><span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="text" class="input-sm form-control" value="" placeholder="<?= lang('eg') ?> <?= lang('amount') ?>" name="amount" required>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-4 control-label"><strong><?= ('Withdraw method') ?></strong><span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <select  class="input-sm form-control" value="" placeholder="<?= ('withdraw_method') ?>" name="payment_thro" required>
									<?php 
										$content = '';
										foreach($profile_info as $key=>$value){
											$content .= ($value != '')?'<option value="'.$key.'">'.lang($key).'</option>':'';
										}
										echo $content;
									?>
								</select>
                            </div>
                        </div>
						
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><strong><?= lang('comment') ?> </strong><span class="text-danger"></span></label>
                            <div class="col-sm-8">
                                <textarea class="input-sm form-control" value=""  name="comment" id="comment"></textarea>
                            </div>
                        </div>
                        <input type="hidden" class="input-sm form-control" value="<?php echo date("Y-m-d") ?>" name="request_date" required>
                        <input type="hidden" class="input-sm form-control" value="<?php echo $this->session->userdata('user_id'); ?>" name="member_id" required >
                        <div class="form-group">
                            <label class="col-sm-4"></label>
                            <div class="col-sm-8">
                                <button type="submit" id="sbtn" class="btn btn-primary"><?php echo lang('create_request') ?></button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>

    $('document').ready(function() {

    	$.validator.addMethod("greaterThan",

		function (value, element, param) {
		  var $element = $(element)
			  , $min;
		  if (typeof(param) === "string") {
			  $min = $(param);
		  } else {
			  $min = $("#" + $element.data("min"));
		  }
		  if (this.settings.onfocusout) {
			$min.off(".validate-greaterThan").on("blur.validate-greaterThan", function () {
			  $element.valid();
			});
		  }
		  return parseInt(value) > parseInt($min.val());
		}, "Max must be greater than minimum amount");

        // validate signup form on keyup and submit
        $("#planForm").validate({
            rules: {
            	
                amount: {
					required: true,
					number: true,
					min: <?php echo $this->config->item('withdraw_minimum');?>,
					max: <?php echo $this->config->item('withdraw_maximum');?>
                },
				payment_thro: {
					required: true,
				},
               
            },
			highlight: function(element) {
				$(element).closest('.form-group').addClass('has-error');
			},
			unhighlight: function(element) {
				$(element).closest('.form-group').removeClass('has-error');
			},
			errorElement: 'span',
			errorClass: 'help-block',
            errorPlacement: function(error, element) {
				if (element.parent('.input-group').length) {
				error.insertAfter(element.parent());
				} else {
				error.insertAfter(element);
				}
			},
            messages: {
				
				amount: {
					required: "Please provide value for amount",
					number: "Please enter correct value for amount"
				},  
				payment_thro: {
					required: "Withdraw is required!",
				},				
				
				
            }
        });
     });


function show_popup(id){
	var amt=$('#amount_'+id).html();
	var request_date=$('#request_date_'+id).html();
	var comment=$('#comment_'+id).html(); 
	var str="Amount($): "+amt+"<br/><br/>Request On:"+request_date+"<br/><br/>Comment:"+comment;
	$('#demoModal #modal-body').html(str);	
	$('#demoModal').modal('show');
}
</script>
<div class="modal fade" id="demoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">View Request</h4>
			</div>
			<div class="modal-body" id="modal-body"></div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
