<?php
$group = $this->uri->segment(4);

if (!empty($group)) {
    $group = $group;
} else {
    $group = 'user';
}
$template_group = $group;

$editor = $this->data;
switch ($template_group) {

    case "user": $default = "activate_account";
        break;
}
$sub_menu = $this->uri->segment(5);
if (!empty($sub_menu)) {
    $sub_menu = $sub_menu;
} else {
    $sub_menu = $default;
}
$setting_email = $sub_menu;


$email['user'] = array("activate_account", "change_email", "forgot_password", "registration", "reset_password", "contact_email", "withdraw_email_to_admin", "withdraw_email_to_user");
?>
<form action="<?= base_url() ?>admin/settings/templates/<?= $setting_email ?>" method="post"  class="bs-example form-horizontal">
    <div class="row">
        <div class="col-lg-12">
                  
            <section class="panel panel-default">
                <header class="panel-heading  "> <?= lang('email_templates') ?></header>
                <div class="panel-body">
                    <div class="col-sm-12">
                        <div class="btn-group">
                            <?php
                            foreach ($email[$template_group] as $temp) :
                                $lang = $temp;

                                switch ($temp) {
                                    case "registration": $lang = 'register_email';
                                }
                                ?>
                                <a href="<?= base_url() ?>admin/settings/templates/<?= $template_group; ?>/<?= $temp; ?>" class="<?php
                                if ($setting_email == $temp) {
                                    echo "active";
                                }
                                ?> btn btn-default"><?= lang($lang) ?></a>
                               <?php endforeach; ?>
                        </div>
                    </div>
                    <input type="hidden" name="email_group" value="<?= $setting_email; ?>">
                    <input type="hidden" name="return_url" value="<?= base_url() ?>admin/settings/templates/<?= $template_group . '/' . $setting_email; ?>">
                    <div class="form-group">
                        <label class="col-lg-12"><?= lang('subject') ?></label>
                        <div class="col-lg-12">
                            <input class="form-control" name="subject" value="<?=
                            $this->settings_model->get_any_field('tbl_email_templates', array(
                                'email_group' => $setting_email
                                    ), 'subject')
                            ?>" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-lg-12"><?= lang('message') ?></label>
                        <div class="col-lg-12">
                            <textarea class="form-control" id="ck_editor" style="height: 600px;"  name="email_template">
                                <?=
                                $this->settings_model->get_any_field('tbl_email_templates', array(
                                    'email_group' => $setting_email
                                        ), 'template_body')
                                ?></textarea>                      
                            <?php echo display_ckeditor($editor['ckeditor']); ?>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">                
                    <button type="submit" class="btn btn-sm btn-primary"><?= lang('save_changes') ?></button>                
                </div>
            </section>
        </div>
    </div>
</form>
<style>
.btn-default{
margin:10px;
}
</style>