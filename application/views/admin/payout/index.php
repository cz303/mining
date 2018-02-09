<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.default.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.common.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kendo.all.min.js"></script>
<?= message_box('success'); ?>
<?= message_box('error'); ?>
<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#new" data-toggle="tab"><?= lang('payout_setting') ?></a></li>                                                                     
    </ul>
	    <div class="tab-content no-padding">
        <!-- ************** general *************-->
			<div class="tab-pane active" id="new">
				<form role="form" id="payoutForm" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/payout/save_data" method="post" class="form-horizontal form-groups-bordered">
				<div class="row">
						<div class="col-sm-6">
							<div class="form-group">
								<label class="col-sm-6 control-label"><strong><?= lang('withdraw_minimum') ?> </strong><span class="text-danger">*</span></label>
								<div class="col-sm-6">
									<input type="text" class="input-sm form-control" value="<?php
									if (!empty($withdraw_minimum)) {
										echo $withdraw_minimum;
									}
									?>" placeholder="<?= lang('eg') ?> <?= lang('withdraw_minimum') ?>" name="withdraw_minimum" required>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-6 control-label"><strong><?= lang('withdraw_maximum') ?> </strong><span class="text-danger">*</span></label>
								<div class="col-sm-6">
									<input type="text" class="input-sm form-control" value="<?php
									if (!empty($withdraw_maximum)) {
										echo $withdraw_maximum;
									}
									?>" placeholder="<?= lang('eg') ?> <?= lang('withdraw_maximum') ?>" name="withdraw_maximum" required>
									  
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-6 control-label"><strong><?= lang('withdraw_allow_month') ?> </strong><span class="text-danger">*</span></label>
								<div class="col-sm-6">
									<input type="text" class="input-sm form-control" value="<?php
									if (!empty($withdraw_allow_month)) {
										echo $withdraw_allow_month;
									}
									?>" placeholder="<?= lang('eg') ?> <?= lang('withdraw_allow_month') ?>" name="withdraw_allow_month" required>
									  
								</div>
							</div>
							
							<div class="form-group">
								<label class="col-sm-4"></label>
								<div class="col-sm-8">
									<button type="submit" id="sbtn" class="btn btn-primary"><?php echo lang('submit') ?></button>
								</div>
							</div>

						</div>
					</div>
				
				</form>
			</div>
	</div>

</div>
<script>

    $().ready(function() {

            // validate signup form on keyup and submit
        $("#payoutForm").validate({
            rules: {
            	withdraw_minimum: {
                    required: true,
                    number: true,
                },
                withdraw_maximum: {
					required: true,
					number: true,
                },
				withdraw_allow_month: {
					required: true,
					number: true,
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
				withdraw_minimum: {
					required: "Please enter minimum amout for withdrawal",
					number: "Please enter correct value of minimum amount"
				},
				withdraw_maximum: {
					required: "Please enter maximum amout for withdrawal",
					number: "Please enter correct value of maximum amount"
				},  
				withdraw_allow_month: {
					required: "Please enter number of withdraw alloted in month",
					number: "Please enter correct value for this field"
				},   

            }
        });
     });
</script>