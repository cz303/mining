<?php echo message_box('success'); ?>
<?php echo message_box('error'); ?>
<?php
$user_id = $this->session->userdata('user_id');
$profile_info = $this->db->where('user_id', $user_id)->get('tbl_account_details')->row();



$user_info = $this->db->where('user_id', $user_id)->get('tbl_users')->row();
$languages = $this->db->order_by('name', 'ASC')->get('tbl_languages')->result();
$locales = $this->db->order_by('name')->get('tbl_locales')->result();
?>
<style type="text/css">
    #id_error_msg{
        display: none;
    }
    .form-groups-bordered > .form-group{
        padding-bottom: 0px
    }
</style>
<div class="row">    
    <div class="col-sm-6 wrap-fpanel">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <strong><?= lang('update_profile') ?></strong>
                </div>                
            </div>
            <div class="panel-body">
                <form role="form" id="update_profile" enctype="multipart/form-data" style="display: initial" action="<?php echo base_url(); ?>client/settings/profile_updated" method="post" class="form-horizontal form-groups-bordered">                        

                    <div class="form-group">
                        <label class="col-lg-4 control-label"><strong><?= lang('full_name') ?></strong> <span class="text-danger">*</span></label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="fullname" value="<?= $profile_info->fullname ?>" required>
                        </div>
                    </div>                    

                    <?php
                    //if ($profile_info->company > 0) {
                        
						$client_info = $this->db->where('user_id', $profile_info->user_id)->get('tbl_users');
						$client_info =  $client_info->row();
						
						$user_id = $profile_info->user_id;
						$company_address = $profile_info->address;
						$email = $client_info->email;
						$fullname = $profile_info->fullname;
						
						?>
                        <div class="form-group hide">
                            <label class="col-lg-4 control-label"><strong>
                                    <?= lang('name') ?> </strong></label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="name" value="<?= $fullname ?>">
                                <input type="hidden" class="form-control" name="client_id" value="<?= $user_id ?>" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-4 control-label"><strong><?= lang('email') ?></strong> </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="email" value="<?= $user_info->email ?>" disabled="disabled">
                            </div>
                        </div>
                        <div class="form-group hide">
                            <label class="col-lg-4 control-label"><strong><?= lang('address') ?></strong> </label>
                            <div class="col-lg-8">
                                <input type="text" class="form-control" name="address" value="<?= $company_address ?>" required>
                            </div>
                        </div>

                    <?php //} ?>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><strong><?= lang('phone') ?></strong></label>
                        <div class="col-lg-8">
                            <input type="text" class="form-control" name="phone" value="<?= $profile_info->phone ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-lg-4 control-label"><strong>Security Question</strong></label>
                        <div class="col-lg-8">
                        <?php
                            $options = array(
							  ''  => '- Select One -',
							  'What is the first name of your favorite uncle?'      => 'What is the first name of your favorite uncle?',
							  'Where did you meet your spouse?'                     => 'Where did you meet your spouse?',
							  'What is your oldest cousins name?'                   => 'What is your oldest cousins name?',
							  'What is your youngest childs nickname?'              => 'What is your youngest childs nickname?',
							  'What is your oldest childs nickname?'                => 'What is your oldest childs nickname?',
							  'What is the first name of your oldest niece?'        => 'What is the first name of your oldest niece?',
							  'What is the first name of your oldest nephew?'       => 'What is the first name of your oldest nephew?',
							  'What is the first name of your favorite aunt?'       => 'What is the first name of your favorite aunt?',
							  'Where did you spend your honeymoon?'                 => 'Where did you spend your honeymoon?',
							);
                            //$shirts_on_sale = array('small', 'large');
                            //echo form_dropdown('shirts', $options, $shirts_on_sale);
                            $js = 'id="question" onChange="some_function();" class="form-control" title="If you forget your password we will ask you for the answer to your security question."';

                            form_dropdown('question', $options, $profile_info->question, $js);

                        ?>
                        <input type="text" class="form-control" name="question" value="<?= $profile_info->question?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><strong>Security Answer</strong></label>
                        <div class="col-lg-8">
                            <input type="password" name="answer" onkeyup="checkanswer(this);"  class="form-control person" id="answer" title="Enter your answer to your security question." value="<?php echo $profile_info->answer ?>" /> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><strong>Country</strong></label>
                        <div class="col-lg-8">
                            <?php $country = '';
                            CreateOption('country', $profile_info->country,'country_master')
                            ?>
                            <!-- <input type="text" class="form-control" name="phone" value="<?= $profile_info->phone ?>"> -->
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><strong>State/Province</strong></label>
                        <div class="col-lg-8">
                            <input name="state" type="text" class="form-control person" id="state"  title="Enter your State/Province (Optional)" value="<?php echo $profile_info->state;?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><strong>Bitcoin Address</strong></label>
                        <div class="col-lg-8">
                            <input type="text" name="bitcoin" id="bitcoin" title="Enter your Bitcoin Account." class="form-control" value="<?php echo $profile_info->bitcoin ?>"  />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label"><strong>Payeer Address</strong></label>
                        <div class="col-lg-8">
                            <input type="text" name="payeer" id="payeer" title="Enter your Payeer Account." class="form-control" value="<?php echo $profile_info->payeer ?>"  />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label"><strong>Advcash Address</strong></label>
                        <div class="col-lg-8">
                            <input type="text" name="advcash" id="advcash" title="Enter your Advcash Account." class="form-control" value="<?php echo $profile_info->advcash ?>"  />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label"><strong>Perfect Money Address</strong></label>
                        <div class="col-lg-8">
                            <input type="text" name="perfect_money" id="perfect_money" title="Enter your Perfect Money Account." class="form-control" value="<?php echo $profile_info->perfect_money ?>"  />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label"><strong>LTC Address</strong></label>
                        <div class="col-lg-8">
                            <input type="text" name="ltc" id="ltc" title="Enter your LTC Account." class="form-control" value="<?php echo $profile_info->ltc ?>"  />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label"><strong>DASH Address</strong></label>
                        <div class="col-lg-8">
                            <input type="text" name="dash" id="dash" title="Enter your DASH Account." class="form-control" value="<?php echo $profile_info->dashcoin ?>"  />
                        </div>
                    </div>
					<div class="form-group">
                        <label class="col-lg-4 control-label"><strong>ETH Address</strong></label>
                        <div class="col-lg-8">
                            <input type="text" name="eth" id="eth" title="Enter your ETH Account." class="form-control" value="<?php echo $profile_info->eth ?>"  />
                        </div>
                    </div>
                    <div class="form-group hide">
                        <label class="col-lg-4 control-label"><strong><?= lang('language') ?></strong></label>
                        <div class="col-lg-8">
                            <select name="language" class="form-control">

                                <?php foreach ($languages as $lang) : ?>
                                    <option value="<?= $lang->name ?>"<?= ($profile_info->language == $lang->name ? ' selected="selected"' : '') ?>><?= ucfirst($lang->name) ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group hide">
                        <label class="col-lg-4 control-label"><strong><?= lang('locale') ?></strong></label>
                        <div class="col-lg-8">
                            <select class="  form-control" name="locale">

                                <?php foreach ($locales as $loc) : ?>
                                    <option value="<?= $loc->locale ?>"<?= ($profile_info->locale == $loc->locale ? ' selected="selected"' : '') ?>><?= $loc->name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-4 control-label"><strong><?= lang('profile_photo') ?></strong></label>
                        <div class="col-lg-7" >                                                        
                            <div class="fileinput fileinput-new" data-provides="fileinput">
                                <div class="fileinput-new thumbnail" style="width: 210px;" >
                                    <?php if ($profile_info->avatar != '') : ?>
                                        <img src="<?php echo base_url() . $profile_info->avatar; ?>" >  
                                    <?php else: ?>
                                        <img src="http://placehold.it/350x260" alt="Please Connect Your Internet">     
                                    <?php endif; ?>                                 
                                </div>
                                <div class="fileinput-preview fileinput-exists thumbnail" style="width: 210px;" ></div>
                                <div>
                                    <span class="btn btn-default btn-file">
                                        <span class="fileinput-new">
                                            <input type="file" name="avatar"  value="upload"  data-buttonText="<?= lang('choose_file') ?>" id="myImg" />
                                            <span class="fileinput-exists"><?= lang('change') ?></span>    
                                        </span>
                                        <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput"><?= lang('remove') ?></a>
                                </div>
                                <div id="valid_msg" style="color: #e11221"></div>
                            </div>    
                        </div>
                    </div> 
                    <div class="form-group">
                        <label class="col-lg-4 control-label"></label>
                        <div class="col-lg-8">
                            <button type="submit" class="btn btn-sm btn-primary"><?= lang('update_profile') ?></button>
                        </div>
                    </div>  
                </form>
			</div>            
        </div>
    </div>
    <div class="col-sm-6 wrap-fpanel">
        <div class="panel panel-default" data-collapsed="0">
            <div class="panel-heading">
                <div class="panel-title">
                    <strong><?= lang('change_password') ?></strong>
                </div>                
            </div>
            <div class="panel-body">
                <form role="form" id="change_password" action="<?php echo base_url(); ?>client/settings/set_password" method="post" class="form-horizontal form-groups-bordered">                        
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?= lang('old_password') ?><span class="required"> *</span></label>
                        <div class="col-sm-7">
                            <input type="password" name="old_password" value="" class="form-control"  placeholder="Enter Your Old Password" />
                            <span id="id_error_msg"><small style="padding-left:10px;color:red;font-size:10px">Your Entered Password Do Not Match !</small></span>
                        </div>
                    </div>                                        
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?= lang('new_password') ?><span class="required"> *</span></label>
                        <div class="col-sm-7">
                            <input type="password" name="new_password" id="new_password" value="" class="form-control"  placeholder="Enter Your <?= lang('new_password') ?>"/>
                        </div>
                    </div>                                        
                    <div class="form-group">
                        <label for="field-1" class="col-sm-4 control-label"><?= lang('confirm_password') ?> <span class="required"> *</span></label>
                        <div class="col-sm-7">
                            <input type="password" name="confirm_password" value="" class="form-control"  placeholder="Enter Your <?= lang('confirm_password') ?>"/>
                        </div>
                    </div>                                        

                    <div class="form-group">
                        <div class="col-sm-offset-4 col-sm-5">
                            <button type="submit" id="sbtn" class="btn btn-primary"><?= lang('change_password') ?></button>                            
                        </div>
                    </div>   
                </form>
            </div>            
        </div>          
    </div>   
</div>   