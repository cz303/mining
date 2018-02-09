<?php echo message_box('success') ?>

<div class="row">

    <!-- Start Form -->
	
	
    <div class="col-lg-12">

        <form role="form" id="form" action="<?php echo base_url(); ?>admin/settings/save_settings" method="post" class="form-horizontal  ">

            <section class="panel panel-default">

                <header class="panel-heading  "><?= lang('company_details') ?></header>

                <div class="panel-body">

                    <input type="hidden" name="settings" value="<?= $load_setting ?>">

                    <input type="hidden" name="languages" value="<?php
					
                    if (!empty($translations)) {

                        echo implode(",", $translations);

                    }

                    ?>">



                    <?php if (count($translations) > 0) : ?>



                        

                        <div class="tab-content" >

                            <div class="tab-pane fade in active" id="tab-english">

                            <?php endif; ?>

                            <div class="form-group">

                                <label class="col-lg-3 control-label"><?= lang('company_name') ?> <span class="text-danger">*</span></label>

                                <div class="col-lg-7">

                                    <input type="text"  name="company_name" class="form-control" value="<?= $this->config->item('company_name') ?>" required>

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-lg-3 control-label"><?= lang('company_legal_name') ?> <span class="text-danger">*</span></label>

                                <div class="col-lg-7">

                                    <input type="text" name="company_legal_name" class="form-control" value="<?= $this->config->item('company_legal_name') ?>" required>

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-lg-3 control-label">Company Start On <span class="text-danger">*</span></label>

                                <div class="col-lg-7">

                                    <input type="text" name="company_start" class="form-control" value="<?= $this->config->item('company_start') ?>" required>

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-lg-3 control-label"><?= lang('contact_person') ?> </label>

                                <div class="col-lg-7">

                                    <input type="text" class="form-control"  value="<?= $this->config->item('contact_person') ?>" name="contact_person">                                

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-lg-3 control-label"><?= lang('company_address') ?> <span class="text-danger">*</span></label>

                                <div class="col-lg-7">

                                    <textarea class="form-control" name="company_address" required><?= $this->config->item('company_address') ?></textarea>

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-lg-3 control-label"><?= lang('country') ?></label>

                                <div class="col-lg-7">

                                    <select class="form-control " style="width:210px" name="company_country" >

                                        <optgroup label="<?= lang('selected_country') ?>">

                                            <option value="<?= $this->config->item('company_country') ?>"><?= $this->config->item('company_country') ?></option>

                                        </optgroup>

                                        <optgroup label="<?= lang('other_countries') ?>">

                                            <?php foreach ($countries as $country): ?>

                                                <option value="<?= $country->value ?>"><?= $country->value ?></option>

                                            <?php endforeach; ?>

                                        </optgroup>

                                    </select>

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-lg-3 control-label"><?= lang('city') ?></label>

                                <div class="col-lg-7">

                                    <input type="text" class="form-control" value="<?= $this->config->item('company_city') ?>" name="company_city">

                                </div>

                            </div>

                            <div class="form-group">

                                <label class="col-lg-3 control-label"><?= lang('zip_code') ?> </label>

                                <div class="col-lg-3">

                                    <input type="text" class="form-control"  value="<?= $this->config->item('company_zip_code') ?>" name="company_zip_code">

                                </div>

                            </div>



                            <?php if (count($translations) > 0) : ?>

                            </div>

                            <?php foreach ($translations as $lang) :

                                ?>

                                <div class="tab-pane fade" id="tab-<?= $lang ?>">



                                    <div class="form-group">

                                        <label class="col-lg-3 control-label"><?= lang('company_name') ?> </label>

                                        <div class="col-lg-7">

                                            <input type="text" name="company_name_<?= $lang ?>" class="form-control" value="<?= $this->config->item('company_name_' . $lang) ?>">

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-3 control-label"><?= lang('company_legal_name') ?></label>

                                        <div class="col-lg-7">

                                            <input type="text" name="company_legal_name_<?= $lang ?>" class="form-control" value="<?= $this->config->item('company_legal_name_' . $lang) ?>">

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-3 control-label"><?= lang('contact_person') ?> </label>

                                        <div class="col-lg-7">

                                            <input type="text" class="form-control"  value="<?= $this->config->item('contact_person_' . $lang) ?>" name="contact_person_<?= $lang ?>">                                        

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-3 control-label"><?= lang('company_address') ?> </label>

                                        <div class="col-lg-7">

                                            <textarea class="form-control" name="company_address_<?= $lang ?>"><?= $this->config->item('company_address_' . $lang) ?></textarea>

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-3 control-label"><?= lang('city') ?></label>

                                        <div class="col-lg-7">

                                            <input type="text" class="form-control" value="<?= $this->config->item('company_city_' . $lang) ?>" name="company_city_<?= $lang ?>">

                                        </div>

                                    </div>

                                    <div class="form-group">

                                        <label class="col-lg-3 control-label"><?= lang('country') ?></label>

                                        <div class="col-lg-7">

                                            <input type="text" class="form-control" value="<?= $this->config->item('company_country_' . $lang) ?>" name="company_country_<?= $lang ?>">

                                        </div>

                                    </div>

                                </div>

                            <?php endforeach; ?>

                        </div>

                    <?php endif; ?>

                    <div class="form-group">

                        <label class="col-lg-3 control-label"><?= lang('company_phone') ?></label>

                        <div class="col-lg-3">

                            <input type="text" class="form-control" value="<?= $this->config->item('company_phone') ?>" name="company_phone">

                        </div>

                    </div>                

                    <div class="form-group">

                        <label class="col-lg-3 control-label"><?= lang('company_email') ?></label>

                        <div class="col-lg-7">

                            <input type="email" class="form-control" value="<?= $this->config->item('company_email') ?>" name="company_email">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 control-label"><?= lang('company_domain') ?></label>

                        <div class="col-lg-7">

                            <input type="text" class="form-control" value="<?= $this->config->item('company_domain') ?>" name="company_domain">

                        </div>

                    </div>

                    <div class="form-group">

                        <label class="col-lg-3 control-label"><?= lang('company_vat') ?></label>

                        <div class="col-lg-7">

                            <input type="text" class="form-control" value="<?= $this->config->item('company_vat') ?>" name="company_vat">

                        </div>

                    </div>
					
					<div class="form-group">

                        <label class="col-lg-3 control-label"><?= lang('facebook_link') ?></label>

                        <div class="col-lg-7">

                            <input type="text" class="form-control" value="<?= $this->config->item('facebook_link') ?>" name="facebook_link">

                        </div>

                    </div>
					
					<div class="form-group">

                        <label class="col-lg-3 control-label"><?= lang('twitter_link') ?></label>

                        <div class="col-lg-7">

                            <input type="text" class="form-control" value="<?= $this->config->item('twitter_link') ?>" name="twitter_link">

                        </div>

                    </div>
					<div class="form-group">

                        <label class="col-lg-3 control-label"><?= lang('instagram_link') ?></label>

                        <div class="col-lg-7">

                            <input type="text" class="form-control" value="<?= $this->config->item('instagram_link') ?>" name="instagram_link">

                        </div>

                    </div>
					
					<div class="form-group">

                        <label class="col-lg-3 control-label"><?= lang('seo_title') ?></label>

                        <div class="col-lg-7">

                            <input type="text" class="form-control" value="<?php echo $this->config->item('seo_title'); ?>" name="seo_title">

                        </div>

                    </div>
					<div class="form-group">

                        <label class="col-lg-3 control-label"><?= lang('meta_data') ?></label>

                        <div class="col-lg-7">

                            <textarea rows="3" class="form-control"  name="meta_data"><?php echo $this->config->item('meta_data'); ?></textarea>

                        </div>

                    </div>
					
					<div class="form-group">

                        <label class="col-lg-3 control-label"><?= lang('google_analytic_code') ?></label>

                        <div class="col-lg-7">

                            <input type="text" class="form-control" value="<?php echo $this->config->item('google_analytic_code'); ?>" name="google_analytic_code">
							<p><?php echo lang('google_analytic_desc');?></p>
                        </div>

                    </div>
					<div class="form-group">

                        <label class="col-lg-3 control-label"><?= lang('google_webmaster_tool_code') ?></label>

                        <div class="col-lg-7">

                            <input type="text" class="form-control" value="<?php echo $this->config->item('google_webmaster_tool_code'); ?>" name="google_webmaster_tool_code">
							<p><?php echo lang('google_webmaster_desc');?></p>
                        </div>

                    </div>

                </div>

                <div class="form-group">

                    <label class="col-lg-3"></label>

                    <div class="col-lg-7">

                        <button type="submit" class="btn btn-sm btn-primary"><?= lang('save_changes') ?></button>

                    </div>

                </div>

            </section>

        </form>

    </div>

    <!-- End Form -->

</div>



