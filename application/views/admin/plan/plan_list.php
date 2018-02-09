<?php include_once 'asset/admin-ajax.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.default.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.common.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kendo.all.min.js"></script>
<?= message_box('success'); ?>
<?= message_box('error'); ?>
<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs">
        <li class="<?= $active == 1 ? 'active' : ''; ?>"><a href="#manage" data-toggle="tab"><?= lang('all_plans') ?></a></li>
        <li class="<?= $active == 2 ? 'active' : ''; ?>"><a href="#new" data-toggle="tab"><?= lang('add_plan') ?></a></li>                                                                     
    </ul>
    <div class="tab-content no-padding">
        <!-- ************** general *************-->
        <div class="tab-pane <?= $active == '1' ? 'active' : ''; ?>" id="manage">
            <table class="table table-striped" id="DataTables">
                <thead>
                    <tr>
                        <th class="col-sm-2"><?= lang('plan_name') ?></th>
						<th class="col-sm-2"><?= lang('plan_min_amt') ?> ($)</th>
                        <th class="col-sm-2"><?= lang('plan_max_amt') ?> ($)</th>
                        <th class="col-sm-2"><?= lang('plan_profit_per') ?></th>
                        <th class="col-sm-2"><?= lang('investment_length') ?></th>
                        <th class="col-sm-2"><?= lang('action') ?></th>

                    </tr>
                </thead>
                <tbody>                    
                    <?php
					
                    if (!empty($all_plan_info)): 
						foreach ($all_plan_info as $v_info) :
                                ?>

                                <tr>
                                    <td><?php echo $v_info->plan_name ?></td>
                                    <td><?php echo ($v_info->plan_min_amt) ?></td>
                                    <td><?php echo ($v_info->plan_max_amt) ?></td>
                                    <td><?php echo ($v_info->max_interest).'% '.$iperiod_type[$v_info->iperiod_type] ?></td>
                                    <td><?php echo ($v_info->period).' '.$period_type[$v_info->period_type] ?></td> 
                                    <td>
										<?php echo btn_edit('admin/plan/plan_list/edit_plan/' . $v_info->plan_id); ?>
										<a href="<?php echo base_url(); ?>admin/plan/delete_plan/<?php echo $v_info->plan_id;?>" class="btn btn-danger btn-xs" title="" data-toggle="tooltip" data-placement="top" onclick="return confirm('You are about to delete a record. This cannot be undone. Are you sure?');" data-original-title="Delete"><i class="fa fa-trash-o"></i></a>
                                    </td>


                                </tr>
                                <?php
                            
                        endforeach;
                        ?>
                    <?php else : ?>
                    <tr>	
	                    <td colspan="6">
	                        <strong>There is no data to display</strong>
	                    </td>
	                </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane <?= $active == '2' ? 'active' : ''; ?>" id="new">
            <form role="form" id="planForm" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/plan/save_plan" method="post" class="form-horizontal form-groups-bordered">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-6 control-label"><strong><?= lang('plan_name') ?> </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="input-sm form-control" value="<?php
                                if (!empty($plan_info)) {
                                    echo $plan_info->plan_name;
                                }
                                ?>" placeholder="<?= lang('eg') ?> <?= lang('plan_name') ?>" name="plan_name" required>
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-sm-6 control-label"><strong><?= lang('plan_min_amt') ?> </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="input-sm form-control" value="<?php
                                if (!empty($plan_info)) {
                                    echo $plan_info->plan_min_amt;
                                }
                                ?>" placeholder="<?= lang('eg') ?> <?= lang('plan_min_amt') ?>" name="plan_min_amt" id="plan_min_amt" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-6 control-label"><strong><?= lang('plan_max_amt') ?> </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="input-sm form-control" value="<?php
                                if (!empty($plan_info)) {
                                    echo $plan_info->plan_max_amt;
                                }
                                ?>" placeholder="<?= lang('eg') ?> <?= lang('plan_max_amt') ?>" name="plan_max_amt" id="plan_max_amt" required data-min="plan_min_amt">
                            </div>
                        </div>

                        

                        <div class="form-group">
                            <label class="col-sm-6 control-label"><strong><?= lang('interest') ?> </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6 checkbox-info">
                                <input type="checkbox" class="input-sm form-control" value="<?php
                                if (!empty($plan_info)) {
                                    echo $plan_info->interest_type;
                                }
                                else echo '0';
                                ?>" <?php
                                if (!empty($plan_info) && ($plan_info->interest_type==1)) {
                                    echo "checked";
                                }
                                ?> name="interest_type">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-6 control-label"><strong><?= lang('release_status') ?> </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6 checkbox-info">
                                <input type="checkbox" class="input-sm form-control" value="<?php
                                if (!empty($plan_info)) {
                                    echo $plan_info->release_status;
                                }
                                else echo '0';
                                ?>" <?php
                                if (!empty($plan_info) && ($plan_info->release_status==1)) {
                                    echo "checked";
                                }
                                ?> name="release_status">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label"><strong>Profit </strong></label>
                            <div class="col-sm-6">&nbsp;</div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-6 control-label"><strong><?= lang('plan_profit') ?> (%)</strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                            
                                <input type="text" class="input-sm form-control" value="<?php
                                if (!empty($plan_info)) {
                                    echo $plan_info->max_interest;
                                }
                                ?>" name="max_interest" id="max_interest" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-6 control-label"><strong><?= lang('plan_period_type') ?> </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6">


                                <select class="input-sm form-control" id="period_type" name="period_type" required>
                                <?php

                                    foreach($period_type as $pkey=>$pval){
                                        $selected='';
                                        if (!empty($plan_info)) {
                                            if($plan_info->period_type==$pkey){
                                                $selected='selected';
                                            }
                                         }

                                        echo '<option value="'.$pkey.'" '.$selected.'>'.$pval.'</option>';
                                    }
                                ?>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-6 control-label"><strong><?= lang('investment_length') ?> </strong></label>
                            <div class="col-sm-6">&nbsp;</div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-6 control-label"><strong><?= lang('period') ?> (Days)</strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <input type="text" class="input-sm form-control" value="<?php
                                if (!empty($plan_info)) {
                                    echo $plan_info->period;
                                }
                                ?>" name="period" id="period" required>
                                
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-6 control-label"><strong><?= lang('duration_type') ?> </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-6">
                                <select class="input-sm form-control" id="iperiod_type" name="iperiod_type" required>
                                <?php

                                	foreach($iperiod_type as $dkey=>$dval){
                                		$selected='';
                                		if (!empty($iperiod_type)) {
                                   			if($plan_info->iperiod_type==$dkey){
                                   				$selected='selected';
											}
                               			 }

                                		echo '<option value="'.$dkey.'" '.$selected.'>'.$dval.'</option>';
                                	}
                                ?>
                                </select>
                            </div>
                        </div>

                        <input type="hidden" class="input-sm form-control" value="<?php echo!empty($plan_id) ? $plan_id : '' ?>" name="plan_id" required>
                        <div class="form-group">
                            <label class="col-sm-6"></label>
                            <div class="col-sm-6">
                                <button type="submit" id="sbtn" class="btn btn-primary"><?php echo!empty($plan_id) ? lang('update_plan') : lang('create_plan') ?></button>
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
            	plan_name: {
                    required: true,
                },
                plan_min_amt: {
					required: true,
					number: true,
					//min: 10
                },
                plan_max_amt: {
					required: true,
					number: true,
					min: 10,
					greaterThan: '#plan_min_amt'
                },
                max_interest: {
                    required: true,
                    number: true,
                },
                
                period: {
                    required: true,
                },
                iperiod_type: {
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
				plan_name: {
					required: "Please enter plan name",
				},
				plan_min_amt: {
					required: "Please provide value for power",
					number: "Please enter correct value for power"
				},   
				plan_max_amt: {
					required: "Please provide value for power",
					number: "Please enter correct value for power"
				},
				max_interest: {
					required: "Please provide value for power",
					number: "Please enter correct value for power"
				},
				
				period: {
					required: "Please provide value for power",
					number: "Please enter correct value for power"
				},
				iperiod_type: {
					required: "Please provide value for power",
				},
				
            }
        });
     });
</script>
<script>

  </script>
  