<?php include_once 'asset/admin-ajax.php'; ?>

<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.default.min.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/kendo.common.min.css" />
<script type="text/javascript" src="<?php echo base_url(); ?>asset/js/kendo.all.min.js"></script>
<?= message_box('success'); ?>
<?= message_box('error'); ?>
<div class="nav-tabs-custom">
    <!-- Tabs within a box -->
    <ul class="nav nav-tabs">
        <li class="<?= $active == 1 ? 'active' : ''; ?>"><a href="#manage" data-toggle="tab"><?= lang('withdrawal_list') ?></a></li>                                                                     
    </ul>
    <div class="tab-content no-padding">
        <!-- ************** general *************-->
        <div class="tab-pane <?= $active == '1' ? 'active' : ''; ?>" id="manage">
            <table class="table table-striped" id="DataTables">
                <thead>
                    <tr>
                        <th class="col-sm-2"><?= lang('member') ?></th>
                        <th class="col-sm-2"><?= lang('request_date') ?></th>
						<th class="col-sm-2"><?= lang('amount') ?> ($)</th>
                        <th class="col-sm-2"><?= lang('comment') ?></th>
                        <th class="col-sm-2"><?= lang('status') ?></th>
                        <th class="col-sm-2"><?= lang('action') ?></th>

                    </tr>
                </thead>
                <tbody>                    
                    <?php
                    if (!empty($all_withdraw_info) && $all_withdraw_info->num_rows>0): 
						foreach ($all_withdraw_info->result() as $v_info) :
                                ?>

                                <tr>
                                    <td id="member_<?php echo $v_info->withdraw_id;?>"><?php echo $v_info->fullname; ?></td>
                                    <td id="request_date_<?php echo $v_info->withdraw_id;?>"><?php echo date("F d, Y", strtotime($v_info->request_date)) ?></td>
                                    <td id="amount_<?php echo $v_info->withdraw_id;?>"><?php echo ($v_info->amount) ?></td>
                                    <td><?php 
                                    		if(strlen($v_info->comment)>150){
                                    			echo substr($v_info->comment, 0 ,150)."...";
                                    		}
                                    		else{
                                    			echo $v_info->comment;
                                    		}
                                     	?>
                                     	<span class="hide" id="comment_<?php echo $v_info->withdraw_id;?>"><?php echo $v_info->comment;?></span>
                                    </td>
                                    <td><span id="status_<?php echo $v_info->withdraw_id;?>"><?php 
                                    	echo $approve_status[$v_info->status];
                                    	if($v_info->status==1){
                                    		echo ' On '.date("F d, Y", strtotime($v_info->withdraw_date));
                                    	}
                                    	?>
                                    	</span>
                                    </td>	
                                    <td>
										<a href="javascript:void(0)" class="btn btn-info btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" onclick="show_popup(<?php echo $v_info->withdraw_id?>)"><span class="fa fa-list-alt"></span></a>
                                        <?php if($v_info->status!=1){?>
                                        <a href="<?php echo base_url();?>admin/withdrawal/approve/<?php echo $v_info->withdraw_id;?>" class="btn btn-success btn-xs" data-toggle="tooltip" data-placement="top" title="" data-original-title="Approve"><span class="fa fa-check"></span></a>
                                        <?php } ?>
                                    </td>


                                </tr>
                                <?php
                            
                        endforeach;
                        ?>
                    <?php else : ?>
                    <tr>	
	                    <td colspan="5">
	                        <strong>There is no data to display</strong>
	                    </td>
	                </tr>
                <?php endif; ?>
                </tbody>
            </table>
        </div>
        
    </div>
</div>

<script>
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


