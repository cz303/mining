<div class="panel panel-flat">
	<div class="panel-body">
    	<!-- Traffic sources -->
        <?= message_box('success'); ?>
        <?= message_box('error'); ?>
    	<div class="col-md-12">
      		<h3><?php echo $title;?></h3>
      		<form role="form" id="userform" enctype="multipart/form-data" action="<?php echo base_url();?>admin/transaction/submit_bonus" method="post" class="form-horizontal form-groups-bordered" novalidate="novalidate">
                <div class="row">
                    <div class="col-sm-6">
                        <input id="username_flag" value="" type="hidden">
                        <input name="user_id" value="4" type="hidden">
                        <input name="account_details_id" value="6" type="hidden">

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><strong>Amount ($)</strong><span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <input class="input-sm form-control" value="1" placeholder="e.g " name="amount" required="" aria-required="true" aria-invalid="false" type="text">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><strong>Being sent to </strong><span class="text-danger">*</span></label>
                            <div class="col-sm-8">
                                <select class="input-sm form-control" name="sent_option" required="" aria-required="true" aria-invalid="false">
                                <option value="1">Specified users (enter a usernames below)</option>
                                <option value="2">All Users</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-4 control-label"><strong>Enter Users name </strong></label>
                            <div class="col-sm-8">
                                <input class="input-sm form-control" value="" name="username" aria-required="true" aria-invalid="false" type="text">
                                <small>Use commas for seperated user</small>
                            </div>
                        </div>

                        <div class="form-group">
		                    <label class="col-sm-4 control-label"></label>
		                    <div class="col-sm-8">
		                    	<input value="<?php echo $type;?>" name="type" type="hidden">
                                <input value="USD" name="payment_thro" type="hidden">
		                        <button type="submit" class="btn btn-sm btn-primary" name="submit">Submit</button>
		                    </div>
		                </div>

                    </div>
                </div>
            </form>
		</div>
	</div>
</div>