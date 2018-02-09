<div id="login">

    <div class="container">

        <div class="users form row">

            <form action="<?php echo base_url() ?>login/forgot_password" class="col-md-4 col-md-offset-4" id="UserLoginForm" method="post" accept-charset="utf-8">

                <div style="display:none;"><input name="_method" value="POST" type="hidden"></div>

                 <div class="logo">
				 <h2><?php echo $title;?></h2>
					
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

                    <div class="col-xs-12 form-group required"><label for="<?= lang('email') ?>/<?= lang('username') ?>" class=" control-label"><?= lang('email') ?>/<?= lang('username') ?></label><input name="email_or_username" class="form-control" placeholder="<?= lang('email') ?>/<?= lang('username') ?>" id="<?= lang('email') ?>/<?= lang('username') ?>" required="required" type="text"></div>

                   

                        

                    </div>

                    

                    <div class="col-xs-12 form-group">

                        <button class="btn btn-theme btn-lg btn-block col-xs-12 " id="loginBtn" type="submit"><?= lang('submit') ?></button> 

                    </div>

                    <div class="col-xs-12 form-group links">

					<?php if (config_item('allow_client_registration') == 'TRUE') { ?>

                        <a href="<?= base_url() ?>login/register"><?= lang('get_your_account') ?></a> 

					<?php } ?>

                        <a class="forgot-password" href="<?= base_url() ?>login"><?= lang('remember_password') ?></a> 

                    </div>

                </div>

            </form>

        </div>

    </div>

</div>



