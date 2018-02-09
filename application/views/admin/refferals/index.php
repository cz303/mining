<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.default.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.common.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kendo.all.min.js"></script>
<?= message_box('success'); ?>
<?= message_box('error'); ?>
<!-- Main charts -->
<div class="panel panel-flat">
  <div class="panel-body">
    <!-- Traffic sources -->
    <div class="col-md-12">
      <h3><?php echo $title;?></h3>
      <h5>In Percentage (%)</h5>
      <form role="form" id="payoutForm" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/refferals/save_data" method="post" class="form-horizontal form-groups-bordered">
				<div class="row">
					<div class="col-sm-6">
						<?php for($i=1;$i<6;$i++){?>
							<div class="form-group">
								<label class="col-sm-6 control-label"><strong>Commission Percentage for Level <?php echo $i?></strong><span class="text-danger">*</span></label>
								<div class="col-sm-6">
									<input type="text" class="input-sm form-control" value="<?php echo $this->config->item('ref_level_'.$i) *100;			
									?>" placeholder="Commission Percentage for Level <?php echo $i?>" name="ref_level_<?php echo $i;?>" required>
								</div>
							</div>
							<?php } ?>
							
							<div class="form-group">
								<label class="col-sm-6"></label>
								<div class="col-sm-6">
									<button type="submit" id="sbtn" class="btn btn-primary"><?php echo lang('submit') ?></button>
								</div>
							</div>

						</div>
					</div>
				
			</form>
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