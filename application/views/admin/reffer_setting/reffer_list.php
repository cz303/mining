<?php include_once 'asset/admin-ajax.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.default.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.common.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kendo.all.min.js"></script>
<?= message_box('success'); ?>
<?= message_box('error'); ?>
<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs">
        <li class="<?= $active == 1 ? 'active' : ''; ?>"><a href="#manage" data-toggle="tab"><?= lang('all_reffer') ?></a></li>
        <li class="<?= $active == 2 ? 'active' : ''; ?>"><a href="#new" data-toggle="tab"><?= lang('new_reffer') ?></a></li>                                                                     
    </ul>
    <div class="tab-content no-padding">
        <!-- ************** general *************-->
        <div class="tab-pane <?= $active == '1' ? 'active' : ''; ?>" id="manage">
            <table class="table table-striped" id="DataTables">
                <thead>
                    <tr>
                        <th class="col-sm-3"><?= lang('image') ?></th>
                        <th class="col-sm-3"><?= lang('size') ?></th>                        
                        <th class="col-sm-3"><?= lang('action') ?></th>

                    </tr>
                </thead>
                <tbody>                    
                    <?php
					
                    if (!empty($all_reffer_info)): 
						foreach ($all_reffer_info as $v_info) :
                           // $account_info = $this->plan_model->check_by(array('reffer_id' => $v_info->reffer_id), 'tbl_account_details');
                            ?>

                                <tr>
                                    <td><img src="<?= base_url().$v_info->site_image_path ?>" alt="" width="100"></td>        								
                                    <td><?php echo $size_arr[($v_info->bansize)]; ?></td>
                                    <td>
										<?php echo btn_edit('admin/reffer_setting/reffer_list/edit_reffer/' . $v_info->reffer_id); ?>
										<?php echo btn_delete('admin/reffer_setting/delete_reffer/' . $v_info->reffer_id); ?>
                                    </td>
                                </tr>
                                <?php
                            
                        endforeach;
                        ?>
                    <?php else : ?>
                    <td colspan="5">
                        <strong>There is no data to display</strong>
                    </td>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        <div class="tab-pane <?= $active == '2' ? 'active' : ''; ?>" id="new">
            <form role="form" id="refferForm" enctype="multipart/form-data" action="<?php echo base_url(); ?>admin/reffer_setting/save_reffer" method="post" class="form-horizontal form-groups-bordered">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            <label class="col-sm-4 control-label"><strong><?= lang('size') ?> </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <select name="bansize" id="bansize" onchange="bansize_val(this.value)">
									<option value=''>Select</option>
									<?php foreach($size_arr as $key=>$value){
										$select_txt='';
										if($reffer_info->bansize==$key){
											$select_txt='selected';
										}
										echo '<option value="'.$key.'" '.$select_txt.'>'.$value.'</option>';
									}?>
								
								</select>
                            </div>
                        </div>
						<div class="form-group">
                            <label class="col-sm-4 control-label"><strong><?= lang('image') ?> </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input type="file" class="input-sm form-control" name="site_image_path">
								<div id="size_desc">
								<?php if (!empty($reffer_info)) {
										echo "Banner Size (w * h): ".$reffer_info->bansize;
								}?>
								</div>
								<?php if (!empty($reffer_info)) {?>
								<img src="<?= base_url().$reffer_info->site_image_path ?>" alt="" width="100" style="padding:10px 0px ">
								<?php }?>
                                <input type="hidden" class="input-sm form-control" value="<?php
                                if (!empty($reffer_info)) {
                                    echo $reffer_info->site_image_path;
                                }
                                ?>"  name="old_image" >
								<input type="hidden" class="input-sm form-control" value="<?php
                                if (!empty($reffer_info)) {
                                    echo $reffer_info->reffer_id;
                                }
                                ?>"  name="reffer_id" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-4"></label>
                            <div class="col-sm-8">
                                <button type="submit" id="sbtn" class="btn btn-primary"><?php echo!empty($reffer_id) ? lang('update') : lang('submit') ?></button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


<script>
	function bansize_val(val){
		if(val!=''){
			str="Banner Size (w * h): "+val;
			$('#size_desc').html(str);
		}
		else{
			$('#size_desc').html('');
		}
	}

    $().ready(function() {
            // validate signup form on keyup and submit
        $("#refferForm").validate({
            rules: {
            	bansize: {
                    required: true,
				},
				site_image_path: {
					<?php if(empty($reffer_id)) { ?>
					required: true,
					<?php } ?>
					extension: "jpg"
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
				bansize: {
					required: "Please choose size ",
				},
				site_image_path: {
					<?php if(empty($reffer_id)) { ?>
					required: "Please upload image",
					<?php } ?>
					extension: "Please enter image with extension jpg"
				},

            }
        });
     });
</script>