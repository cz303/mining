<div class="row"> 
    <div class="col-lg-12">
        <div class="col-md-3">
            <ul class="nav holiday_navbar">
                <li class="<?php echo ($load_setting == 'general') ? 'active' : ''; ?>">
                    <a href="<?= base_url() ?>admin/settings">
                        <i class="fa fa-fw fa-info-circle"></i>
                        <?php echo lang('company_details') ?>
                    </a>
                </li>
                <li class="<?php echo ($load_setting == 'system') ? 'active' : ''; ?>">
                    <a href="<?= base_url() ?>admin/settings/system">
                        <i class="fa fa-fw fa-desktop"></i>
                        <?php echo lang('system_settings') ?>
                    </a>
                </li>
                <li class="<?php echo ($load_setting == 'email_settings') ? 'active' : ''; ?>">
                    <a href="<?= base_url() ?>admin/settings/email">                        
                        <i class="fa fa-fw fa-envelope-o"></i>
                        <?php echo lang('email_settings') ?>
                    </a>
                </li>                
                <li class="<?php echo ($load_setting == 'templates') ? 'active' : ''; ?>">
                    <a href="<?= base_url() ?>admin/settings/templates">
                        <i class="fa fa-fw fa-pencil-square"></i>
                        <?php echo lang('email_templates') ?>
                    </a>
                </li>      
                <li class="<?php echo ($load_setting == 'theme') ? 'active' : ''; ?>">
                    <a href="<?= base_url() ?>admin/settings/theme">
                        <i class="fa fa-fw fa-code"></i>
                        <?php echo lang('theme_settings') ?>
                    </a>
                </li>
            </ul>
        </div>    

        <section class="col-sm-9">                                
            <div class="col-sm-8  ">                

                <?php if ($load_setting == 'email') { ?>
                    <div style="margin-bottom: 10px;margin-left: -15px" class="<?php
                    if ($load_setting != 'email') {
                        echo 'hidden';
                    }
                    ?>">
                        <a href="<?= base_url() ?>admin/settings/email&view=alerts" class="btn btn-info"><i class="fa fa fa-inbox text"></i>
                            <span class="text"><?php echo lang('alert_settings') ?></span>
                        </a>
                    </div>
                <?php } ?>

            </div>        
            <section class="">
                <!-- Load the settings form in views -->
                <?= $this->load->view('admin/settings/' . $load_setting) ?>
                <!-- End of settings Form -->
            </section>
        </section>      
    </div>
</div>
