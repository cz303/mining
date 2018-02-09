<?php  $this->load->view('header'); ?>
<script src="<?php echo base_url(); ?>asset/js/jquery-1.10.2.min.js"></script>         
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js" type="text/javascript"></script>
<div style="min-height:100%;min-height:54vh;">
       <section class="workhow">
<div class="container">
<div class="row">
    

    <div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
        <div class="users form row">
			<?php if($this->session->flashdata('success')) echo "<div class='col-md-offset-3 col-md-6 alert alert-success text-center'>".$this->session->flashdata('success')."</div>"; ?>
            <form action="<?php echo base_url();?>contactus/send_mail" class="col-md-12 col-sm-12 contt" id="UserLoginForm" name="UserLoginForm" method="post" accept-charset="utf-8">
                <div style="display:none;"><input name="_method" value="POST" type="hidden"></div>
                <div class="col-md-12 us contact-heading" align="center">
                  CONTACT US
                </div>
                <div class="error_login">
                </div>
            <div class="person inner-login-form">
            <div class="col-md-12 col-sm-12" style="padding: 0px;">
                          
                <div class="form-group">
                    <label class="control-label">Email</label>                
                    <input type="email" required="true" class="form-control person" value="" name="from" placeholder="Email">                           
                </div>
                <div class="form-group">
                    <label class="control-label">Subject</label>                
                    <input type="tel" required="true" class="form-control person" name="subject" placeholder="Phone">                
                </div>
                <?php if (config_item('captcha_in_contact') == '1') {
                        ?>
                        <div class="form-group">
                            <div class="row" style="padding-left: 15px; padding-bottom: 0px;">
                                <div class="captcha-form col-xs-9" style="padding: 0px;">
                                    <label class="control-label">Captcha Code <span style="color:#FF0000;">*</span> </label>
                                    
                                    <input type="text" id="confirmcaptch" name="confirmcaptch" class="form-control" required/>
                                    <input type="hidden" value="<?php echo $cap['word']?>" name="captcha" id="captcha">
                                </div>
                                <div class="captch-img col-xs-3"><?php echo $cap['image'];?></div>
                            </div>
                        </div>
                        <?php
                        }
                    ?>

                </div>
                <div class="col-md-12 col-sm-12" style="padding: 0px;">
                <div class="form-group">
                    <label class="control-label">Message </label>            
                   <textarea name="message" class="form-control" rows="6"></textarea>
                </div>
                    <button class="btn btn-theme col-xs-4" id="loginBtn" type="submit" style="margin: 0px;">Submit</button> 
                </div>
            </div>        
        
               
                </form></div>

    </div>

</div>

</div>

</section>
		</div>
 <?php  $this->load->view('footer'); ?>
<script src="<?php echo base_url('asset/dist/jquery.validate.js');?>"></script>
<script src="<?php echo base_url() ?>asset/js/toastr.min.js"></script>
<script>
 $().ready(function() {
         $("#UserLoginForm").validate({
            rules: {
                subject: {
                    required: true,
                },
               from: {
                    required: true,
                    email:true
                },
                message: {
                    required: true,
                },
                
                <?php 
                    if (config_item('captcha_in_login') == '1') {
                ?>
                confirmcaptch: {
                    required: true,
                    equalTo: "#captcha"
                },
                <?php } ?>
            },
            messages: {
                subject: {
                    required: "Please enter subject",
                },
                from: {
                    required: "Please enter email",
                    email:"Please enter valid email"
                },
                message: {
                    required: "Please enter message",
                },
                <?php
                if (config_item('captcha_in_login') == '1') { 
                ?> 
                confirmcaptch: {
                    required: "Please enter captcha value",
                    equalTo: "Your captcha value is incorrect"
                },
                <?php }?>
            }
         
        });
    });
    </script>