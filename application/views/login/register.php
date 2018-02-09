<script src='https://www.google.com/recaptcha/api.js'></script>
<div id="login">
    <div class="container">
        <div class="users form row">
            <form action="<?php echo base_url() ?>login/registered_user" class="col-md-4 col-md-offset-4" id="UserRegisterForm" method="post" accept-charset="utf-8">
                <div style="display:none;"><input name="_method" value="POST" type="hidden"></div>
                <div class="logo">
					<?php if (config_item('logo_or_icon') == 'logo_title') { ?>
						<!--<img class="login_logo" style="border-radius: 50px" src="<?= base_url() . config_item('company_logo') ?>" class="m-r-sm">-->
						<h2>Register</h2>
					<?php } elseif ($this->config->item('logo_or_icon') == 'icon') { ?>
						<i class="fa <?= $this->config->item('site_icon') ?>"></i>
						<span style="font-size: 20px;"><?= config_item('company_name') ?></span>
					<?php } ?>
                </div>
				<?= message_box('success'); ?>    
				<div class="error_login">
					<?php echo validation_errors(); ?>        
					<?php
					$error = $this->session->flashdata('error');
					if (!empty($error)) {
						?>
						<div class="alert alert-danger"><?php echo $this->session->flashdata('error'); ?></div>
					<?php } ?>        
				</div>
				
            <div class="person inner-login-form">
                
                        <div class="form-group" >
                            <label class="control-label"><?= lang('full_name') ?></label>
                            <input type="text" name="name" required="true" class="form-control person" placeholder="<?= lang('full_name') ?>" >                        
                        </div>
                             
                        <div class="form-group">
                            <label class="control-label"><?= lang('email') ?></label>                
                            <input type="email" required="true" class="form-control person" value="" name="email">                
                        </div>
                   
               
              
                    
                        <div class="form-group">
                            <label class="control-label"><?= lang('username') ?></label>                
                            <input type="text" required="true" class="form-control person"  name="username">
                        </div>
                 
                        <div class="form-group">
                            <label class="control-label"><?= lang('password') ?></label>                
                            <input type="password" id="password" required="true" class="form-control person"  name="password">                
                        </div>
                   
               

                
                   
                        <div class="form-group">
                            <label class="control-label"><?= lang('confirm_password') ?> </label>            
                            <input type="password" required="true" class="form-control person" value="" name="confirm_password">
                        </div>
                
                    
                        <div class="form-group">
                            <label class="control-label">Security Question <span style="color:#FF0000;">*</span></label>
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
                        $js = 'id="question" onChange="some_function();" class="form-control person" title="If you forget your password we will ask you for the answer to your security question."';

                        form_dropdown('question', $options, 'large', $js);

                            ?>
                             <input type="text" required="true" class="form-control person" value="" name="question">
                            
                                   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        </div>
                    
                

                <div class="form-group">
                    <label class="control-label">Security Answer <span style="color:#FF0000;">*</span></label>            
                    <!-- <input type="password" required="true" class="form-control person" value="" name="confirm_password"> -->
                    <input type="password" name="answer" onkeyup="checkanswer(this);"  class="form-control person" id="answer" title="Enter your answer to your security question." value="" />                            
                </div>
				
				<div class="form-group">
                    <label class="control-label">Refferal ID</label>            
                    <!-- <input type="password" required="true" class="form-control person" value="" name="confirm_password"> -->
                    <input type="text" name="intro_name" class="form-control person" id="intro_name" value="<?php echo @$reffer_id; ?>" />                            
                </div>
                
               
            
            <?php if (config_item('country_in_reg') == '1') { ?>

            <div class="contact_details">
                <h4 style="border-bottom:none;margin:0 0 10px;" >Contact Details</h4>
                <div class="form-group">
                    <label class="control-label">Country <span style="color:#FF0000;">*</span></label>                
                    <!-- <input type="text" required="true" class="form-control company" value="" name="name" > -->
                    <?php $country = '';
                        CreateOption('country', $country,'country_master')?>
                </div>   
               </div>
            <?php }
                if (config_item('captcha_in_reg') == '1') {
            ?>
            <div class="form-group">
                <div class="row" style="padding-left: 15px;">
                    <div class="captcha-form col-xs-9" style="padding: 0px;">
                        <label class="control-label">Captcha Code <span style="color:#FF0000;">*</span> </label>
                        
                        <input type="text" id="confirmcaptch" name="confirmcaptch" class="form-control" required/>
                        <input type="hidden" value="<?php echo $cap['word']?>" name="captcha" id="captcha">
                    </div>
                    <div class="captch-img col-xs-3"><?php echo $cap['image'];?></div>
                </div>
            </div>
            <?php  }?>
            </div>
            
                    
                    <div class="form-group">
                        <button class="btn btn-theme col-xs-12" id="loginBtn" type="submit" style="margin-left: 0px;"><?= lang('sign_up') ?></button> 
                    </div>
                    <div class="col-xs-12 form-group links">	
                        <div class="register-btns">				
                            <div class="or-message">- OR -</div>
                            <?= lang('already_have_an_account') ?>
                            <a href="<?= base_url() ?>login" class=""><?= lang('sign_in') ?></a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<style>
.captcha label{
    font-weight:bold;
    font-style:italic;
    font-size:25px;
}
</style>