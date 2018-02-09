<style>
.display_none{
	display:none;
}
label.error,.required{
	color:red;
}
</style>
<div class="row">
	<div class="col-md-12">
		<div id="headerMsg" class="">
			<?php if($this->session->flashdata('msg')){?>
			<div class="alert alert-success alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong><?php echo $this->session->flashdata('msg');?></strong>
			</div>
			<?php }?>
			<?php if($this->session->flashdata('errormsg')){?>
			<div class="alert alert-danger alert-dismissible" role="alert">
				<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong><?php echo lang($this->session->flashdata('errormsg'));?></strong>
			</div>
			<?php }?>
		</div>
		
		<?php  $validation_errors = $this->session->flashdata('validation_errors');?>
		<div class="nav-tabs-custom">
	    	<!-- CONTROL TABS START -->
			<ul class="nav nav-tabs bordered">
				<li class="<?php if(!isset($validation_errors) || $validation_errors =='') echo 'active';?>">
	            	<a href="#list" data-toggle="tab"><i class="entypo-menu"></i> 
						FAQ List
	                    	</a></li>
				<li class="<?php if(isset($validation_errors) && $validation_errors !='') echo 'active';?>">
	            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
						Add FAQ
	               	</a>
	            </li>
			</ul>
	    	<!-- CONTROL TABS END -->
	        
			<div class="tab-content">
	            <!-- TABLE LISTING STARTS -->
	            <div class="tab-pane box <?php if(!isset($validation_errors) || $validation_errors =='') echo 'active';?>" id="list">
	                <table class="table table-bordered datatable" id="table_export">
	                	<thead>
	                		<tr>
	                    		<th><div>#</div></th>
	                    		<th><div><?php echo lang('question');?></div></th>
								<th><div>Actions</div></th>
							</tr>
						</thead>
	                    <tbody>
	                    	<?php 
							$count = 1;
							foreach($faq_list as $row):
						     ?>
	                        <tr>
	                            <td><?php echo $count++;?></td>
								<td><?php echo $row['question']?></td>
	                            <td>
		                            <div class="btn-group">
		                                <button type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown">
		                                    Action <span class="caret"></span>
		                                </button>
		                                <ul class="dropdown-menu dropdown-default pull-right" role="menu">
		                                    <!-- EDITING LINK -->
		                                    <li>
		                                        <a href="<?php echo base_url();?>admin/faq/index/edit/<?php echo $row['faq_id'];?>" >
		                                            <i class="entypo-pencil"></i>
		                                            <?php echo lang('edit');?>
		                                        </a>
		                                    </li>
		                                    <li class="divider"></li>

		                                    <!-- DELETION LINK -->
		                                    <li>
		                                        <a href="#" onclick="confirm_modal('<?php echo base_url();?>admin/faq/index/delete/<?php echo $row['faq_id'];?>/');">
		                                            <i class="entypo-trash"></i>
		                                            <?php echo lang('delete');?>
		                                        </a>
		                                    </li>
		                                </ul>
		                            </div>
	        					</td>
	                        </tr>
	                        <?php endforeach;?>
	                    </tbody>
	                </table>
				</div>
	            <!-- TABLE LISTING ENDS -->
				<!-- CREATION FORM STARTS -->
				<div class="tab-pane box <?php if(isset($validation_errors) && $validation_errors !='') echo 'active';?>" id="add" style="padding: 5px">
	                <div class="box-content">
						<div>
						<?php if($validation_errors){?>
							<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
								<strong><?php echo $validation_errors;?></strong>
							</div>
						<?php }?>
						</div>
	                	<?php echo form_open_multipart('admin/faq/index/create' , array('class' => 'form-horizontal form-groups-bordered validate1','id'=>'city_add_form','target'=>'_top'));?>
	                        <div class="padded">
								<div class="form-group">
	                                <label class="col-sm-3 control-label">Question<span class="required">*</span></label>
	                                <div class="col-sm-6">
	                                   <input type="text" class="form-control" name="question" placeholder="Question" data-validate="required" data-message-required="" />
	                                </div>
	                            </div>
								<div class="form-group">
	                                <label class="col-sm-3 control-label">Answer<span class="required">*</span></label>
	                                <div class="col-sm-8">
	                                   <textarea class="form-control textarea" name="answer" placeholder="Answer" data-validate="required" data-message-required=""> </textarea>
	                                </div>
	                            </div>
	                        </div>
	                        <div class="form-group">
	                          	<div class="col-sm-offset-3 col-sm-5">
	                            	<button type="submit" class="btn btn-info"><?php echo lang('save');?></button>
	                          	</div>
							</div>
	                    </form>                
	                </div>                
				</div>
				<!-- CREATION FORM ENDS -->
			</div>
		</div>

	</div>
</div>
<!--  DATA TABLE EXPORT CONFIGURATIONS -->                      
<script type="text/javascript">
jQuery(document).ready(function($)
{
	var baseurl = '<?php echo base_url();?>';
	var datatable = $("#table_export").dataTable();
	$(".dataTables_wrapper select").select2({
		minimumResultsForSearch: -1
	});
	//----------------------------------------------------------------------------------
	/* 
	* city add form validation
	*/
	$('#city_add_form').validate({
		rules: {
			question: {
				required: true	,
			},
		},
		messages: {
			question: {
				required: "<?php echo lang('value_required');?>",
			},
		},
		submitHandler: function(ev){
			ev.submit();
			return true;
		}
	});
});
</script>

<script type="text/javascript">
	function confirm_modal(delete_url)
	{
		jQuery('#modal-4').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
	
	function alert_modal(msg)
	{
		jQuery('#alert_modal').modal('show', {backdrop: 'static'});
		jQuery('#alert_modal .modal-title').text(msg);
	}
	
	function confirm_modal2(msg)
	{
		jQuery('#confirm_modal2').modal('show', {backdrop: 'static'});
		jQuery('#confirm_modal2 .modal-title').text(msg);
	}
	
	</script>
    
    <!-- (Normal Modal)-->
    <div class="modal fade" id="modal-4">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;">Are you sure to delete this information ?</h4>
                </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-danger" id="delete_link">delete</a>
                    <button type="button" class="btn btn-info" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
	
	<!-- (Alert Modal)-->
    <div class="modal fade" id="alert_modal">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;"></h4>
                </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                   <button type="button" class="btn btn-default" data-dismiss="modal">Ok</button>
                </div>
            </div>
        </div>
    </div>
	
	<!-- (Confirm Modal)-->
    <div class="modal fade" id="confirm_modal2">
        <div class="modal-dialog">
            <div class="modal-content" style="margin-top:100px;">
                
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" style="text-align:center;color:red;"></h4>
                </div>
                <div class="modal-footer" style="margin:0px; border-top:0px; text-align:center;">
                    <a href="#" class="btn btn-default confirm_modal_value"  input_val="yes">Ok</a>
                    <button type="button" class="btn btn-default confirm_modal_value" input_val="no" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </div>
    </div>
	