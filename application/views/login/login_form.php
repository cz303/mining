<div id="login">

    <div class="container">

        <div class="users form row">

            <form action="<?php echo base_url() ?>login" class="col-md-4 col-md-offset-4" id="UserLoginForm" method="post" accept-charset="utf-8">

                <div style="display:none;"><input name="_method" value="POST" type="hidden"></div>

                 <div class="logo">
					<h2>Login</h2>
					
				  
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

                <div class="row inner-login-form">

                    <div class="col-xs-12 form-group required"><label for="<?= lang('username') ?>" class="control-label"><?= lang('username') ?></label><input name="user_name" class="form-control" placeholder="<?= lang('username') ?>" id="<?= lang('username') ?>" required="required" type="text"></div>

                    <div class="col-xs-12 form-group required"><label for="<?= lang('password') ?>" class="control-label"><?= lang('password') ?></label><input name="password" class="form-control" placeholder="<?= lang('password') ?>" id="UserPassword" required="required" type="password"></div>

                    <?php if (config_item('captcha_in_login') == '1') {
                        ?>
                        <div class="col-xs-12 form-group required">
                        <div class="row" style="padding-left: 15px;">
                            <div class="captcha-form col-xs-9" style="padding: 0px;">
                                <label for="<?= lang('captcha') ?>" class="control-label"><?= lang('captcha') ?></label>
                                <input name="confirmcaptch" class="form-control" placeholder="<?= lang('captcha') ?>" id="confirmcaptch" required="required">
                                <input name="captcha" class="form-control" id="captcha" required="required" value="<?php echo $cap['word'];?>" type="hidden">
                            </div>
                            <div class="captch-img col-xs-3"><?php echo  $cap['image'];?></div>
                            </div>
                        </div>

                        <!-- <div class="col-xs-12 form-group captcha-img"><?php //echo  $cap['image'];?> -->
                            

                        </div>
                        <?php
                        }
                    ?>


                    <div class="col-xs-12 form-group">

                        <button class="btn btn-theme" id="loginBtn" type="submit"><?= lang('sign_in') ?></button> 

                    </div>

                    
                        <div class="col-xs-12 form-group links">
    					   <?php if (config_item('allow_client_registration') == 'TRUE') { ?>
                            <a class="btn btn-lg" href="<?= base_url() ?>login/register"><?= lang('get_your_account') ?></a>
    					   <?php } ?>
                            <a class="forgot-password" href="<?= base_url() ?>login/forgot_password"><?= lang('forgot_password') ?></a>
                        </div>
                    

                </div>

            </form>

        </div>

    </div>

</div>



