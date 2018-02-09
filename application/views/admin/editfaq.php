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
    	<!-- CONTROL TABS START -->
		<ul class="nav nav-tabs bordered">
			<li class="<?php  echo 'active';?>">
            	<a href="#add" data-toggle="tab"><i class="entypo-plus-circled"></i>
					Edit FAQ
                </a>
            </li>
		</ul>
    	<!-- CONTROL TABS END -->
        
		<div class="tab-content">
			<!-- CREATION FORM STARTS -->
			<div class="tab-pane box <?php  echo 'active';?>" id="add" style="padding: 5px">
                <div class="box-content">
					<div>
					<?php if(validation_errors()){?>
						<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							<strong><?php echo validation_errors();?></strong>
						</div>
					<?php }?>
					</div>
                	<?php echo form_open_multipart('admin/faq/index/do_update/'.$edit_data['faq_id'] , array('class' => 'form-horizontal form-groups-bordered validate1','id'=>'city_add_form','target'=>'_top'));?>
                        <div class="padded">
                           
							<div class="form-group">
                                <label class="col-sm-3 control-label">Question<span class="required">*</span></label>
                                <div class="col-sm-6">
                                   <input type="text" class="form-control" name="question" placeholder="<?php echo lang('question');?>" data-validate="required" data-message-required="<?php echo lang('value_required');?>" value="<?php echo $edit_data['question'];?>"/>
                                </div>
                            </div>
							<div class="form-group">
                                <label class="col-sm-3 control-label">Answer<span class="required">*</span></label>
                                <div class="col-sm-8">
                                   <textarea class="form-control redactor" name="answer" placeholder="<?php echo lang('answer');?>" data-validate="required" data-message-required="<?php echo lang('value_required');?>"><?php echo $edit_data['answer'];?></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                              <div class="col-sm-offset-3 col-sm-5">
                                  <button type="submit" class="btn btn-info"><?php echo lang('update');?></button>
                              </div>
							</div>
                    </form>                
                </div>                
			</div>
		
		</div>
	</div>
</div>



                    
<script type="text/javascript">

jQuery(document).ready(function($)
{
	
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