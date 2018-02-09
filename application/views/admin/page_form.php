<section class="col-sm-12">                                
    <div class="col-sm-8  ">                
    </div>        
    <section class="">
        <!-- Load the settings form in views -->
        <div class="row">
    		<!-- Start Form -->
    		<div class="col-lg-12">
        		<form role="form" id="form" action="<?php echo base_url('admin/pages/form/'.$id);?>" method="post" class="form-horizontal  " novalidate="novalidate">
		            <section class="panel panel-default">
		                <header class="panel-heading  ">Page Form</header>
		                <div class="panel-body">
		                    <input name="settings" value="general" type="hidden">
		                    <input name="languages" value=",0" type="hidden">

	                        <ul class="nav nav-tabs" role="tablist">
	                            <li><a class="active" data-toggle="tab" href="#tab-english">Content</a></li>
                                <li><a data-toggle="tab" href="#tab-">Attributes</a></li>
                                <li><a data-toggle="tab" href="#tab-0">SEO</a></li>
	                        </ul>
	                        <br>
	                        <div class="tab-content">
	                            <div class="tab-pane fade in active" id="tab-english">
	                                <div class="form-group">
	                                	<label class="col-lg-3 control-label">Page Title <span class="text-danger">*</span></label>
	                                	<div class="col-lg-7">
	                                    	<?php
											$data	= array('name'=>'title', 'value'=>set_value('title', $title), 'class'=>'form-control');
											echo form_input($data);
											?>
	                                    	<!-- <input name="company_name" class="form-control" value="Mining" required="" aria-required="true" type="text"> -->
	                                	</div>
	                            	</div>
	                            	<div class="form-group">
	                                	<label class="col-lg-3 control-label">Content <span class="text-danger">*</span></label>
	                                	<div class="col-lg-7">
	                                		<?php
											$data	= array('name'=>'content', 'class'=>'form-control textarea', 'value'=>set_value('content', $content));
											echo form_textarea($data);
											?>
	                                    	<!-- <input name="content" class="form-control" value="<?php set_value('content', $content)?>" aria-required="true" type="text"> -->
	                                	</div>
	                            	</div>
								</div>
	                            <div class="tab-pane fade" id="tab-">
	                            	<div class="form-group">
                                        <label class="col-lg-3 control-label">Menu Title</label>
                                        <div class="col-lg-7">
                                        	<?php
											$data	= array('name'=>'menu_title', 'value'=>set_value('menu_title', $menu_title), 'class'=>'form-control');
											echo form_input($data);
											?>
                                            <!-- <input name="company_name_" class="form-control" value="" type="text"> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Slug </label>
                                        <div class="col-lg-7">
                                        	<?php
											$data	= array('name'=>'slug', 'value'=>set_value('slug', $slug), 'class'=>'form-control');
											echo form_input($data);
											?>
                                            <!-- <input name="company_name_" class="form-control" value="" type="text"> -->
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Parent </label>
                                        <div class="col-lg-7">
                                        	<?php
											$options	= array();
											$options[0]	= lang('top_level');
											function page_loop($pages, $dash = '', $id=0)
											{
												$options	= array();
												foreach($pages as $page)
												{
													//this is to stop the whole tree of a particular link from showing up while editing it
													if($id != $page->id)
													{
														$options[$page->id]	= $dash.' '.$page->title;
														$options			= $options + page_loop($page->children, $dash.'-', $id);
													}
												}
												return $options;
											}
											$options	= $options + page_loop($pages, '', $id);
											echo form_dropdown('parent_id', $options,  set_value('parent_id', $parent_id), 'class="form-control"');
											?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Sequence </label>
                                        <div class="col-lg-7">
                                        	<?php
											$data	= array('name'=>'sequence', 'value'=>set_value('sequence', $sequence), 'class'=>'form-control');
											echo form_input($data);
											?>
                                        </div>
                                    </div>
	                            </div>
	                            <div class="tab-pane fade" id="tab-0">
	                            	<div class="form-group">
                                        <label class="col-lg-3 control-label">SEO Title </label>
                                        <div class="col-lg-7">
                                        	<?php
											$data	= array('name'=>'seo_title', 'value'=>set_value('seo_title', $seo_title), 'class'=>'form-control');
											echo form_input($data);
											?>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-lg-3 control-label">Meta Data</label>
                                        <div class="col-lg-7">
                                        	<?php
											$data	= array('rows'=>'3', 'name'=>'meta', 'value'=>set_value('meta', html_entity_decode($meta)), 'class'=>'form-control');
											echo form_textarea($data);
											?>
                                            <!-- <input name="company_legal_name_0" class="form-control" value="" type="text"> -->
                                        </div>
                                    </div>
	                            </div>
	                        </div>
		                </div>
		                <div class="form-group">
		                    <label class="col-lg-3"></label>
		                    <div class="col-lg-7">
		                        <button type="submit" class="btn btn-sm btn-primary">Save Changes</button>
		                    </div>
		                </div>
		            </section>
        		</form>
    		</div>
    		<!-- End Form -->
		</div>

        <!-- End of settings Form -->
    </section>
</section>