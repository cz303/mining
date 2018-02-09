<?php  $this->load->view('header'); ?>

<div class="login-page">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-4"><!--leftbar start here-->
                <div class="left-sidebar">
                    <div class="navigation-links">
    
                        <?php if( $this->login_model->loggedin()==FALSE){ ?>
                        <h3>Login</h3>
                        <div class="left-loginbar">
                            <form action="<?php echo base_url();?>login" id="UserLoginForm" method="post" accept-charset="utf-8" novalidate="novalidate">
                                <div style="display:none;"><input name="_method" value="POST" type="hidden"></div>
                                <div class="row inner-login-form">
                                    <div class="col-xs-12 form-group required" aria-required="true"><input name="user_name" class="form-control valid" placeholder="Username" id="Username" required="required" type="text" aria-required="true" aria-invalid="false"></div>
                                    <div class="col-xs-12 form-group required" aria-required="true"><input name="password" class="form-control valid" placeholder="Password" id="UserPassword" required="required" type="password" aria-required="true" aria-invalid="false"></div>
                                </div>
                                <div class="col-xs-12 form-group sign-btn">
                                    <button class="btn btn-theme" id="loginBtn" type="submit">Sign in</button>
                                </div>
                                <div class="col-xs-12 form-group links">
                                    <a class="forgot-password" href="<?php echo base_url();?>login/forgot_password">Forgot password?</a>
                                </div>
                            </form>
                        </div>
                        <?php } else {

                            ?>
                            <h3>Menu</h3>
                        <ul class="list-inline">
                            
                            <?php if($this->session->userdata('client_id')){?>
                            <li><a href="<?php echo base_url();?>/client/dashboard"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Dashboard</a></li>
                            <li><a href="<?php echo base_url();?>/client/buy"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Buy</a></li>
                            <li><a href="<?php echo base_url();?>/client/transaction/deposit"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Your Deposit</a></li>
                            <li><a href="<?php echo base_url();?>client/withdrawal"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Withdraw</a></li>
                            <li><a href="<?php echo base_url();?>client/withdrawal/withdrawal_history"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Withdrawals History</a></li>
                            <li><a href="<?php echo base_url();?>client/settings"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Setting</a></li>
                            <?php } else { ?>
                                <li><a href="<?php echo base_url();?>admin/dashboard"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Dashboard</a></li>
                                <li><a href="<?php echo base_url();?>admin/plans"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Plans</a></li>
                                <li><a href="<?php echo base_url();?>admin/user/user_list"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Users</a></li>
                                <li><a href="<?php echo base_url();?>admin/transaction/index/deposit"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Deposits</a></li>
                                <li><a href="<?php echo base_url();?>admin/transaction/index/bonus"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Bonus</a></li>
                                <li><a href="<?php echo base_url();?>admin/transaction/index/penality"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Penality</a></li>
                                 <li><a href="<?php echo base_url();?>admin/transaction/send_bonus"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Send Bonus</a></li>
                                <li><a href="<?php echo base_url();?>admin/transaction/send_penality"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Send Penality</a></li>
                                <li><a href="<?php echo base_url();?>admin/withdrawal"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Withdrawal</a></li>
                                <li><a href="<?php echo base_url();?>admin/withdrawal/approved_withdrawal"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Withdrawals History</a></li>
                                <li><a href="<?php echo base_url();?>admin/pages"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>CMS Pages</a></li>
                                <li><a href="<?php echo base_url();?>admin/mailbox"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Mailbox</a></li>
                                <li><a href="<?php echo base_url();?>admin/settings"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Setting</a></li>
                                 <li><a href="<?php echo base_url();?>admin/settings/templates"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Email Templates</a></li>
                            <?php }?>
                            
                            <li><a href="<?php echo base_url();?>login/logout"><i class="fa fa-hand-o-right fa-2x" aria-hidden="true"></i>Logout</a></li>
                        </ul>
                        <?php } ?>
                    </div>

                    <div class="navigation-links">
                        <h3>Info</h3>
                        <table class="table">
                            <tr>
                                <th>Started</th>
                                <td><?php echo date("F d, Y", strtotime($this->config->item('company_start')));?></td>
                            </tr>
                            <tr>
                                <th>Running days</th>
                                <td>
                                    <?php
                                        $now = time(); // or your date as well
                                        $your_date = strtotime($this->config->item('company_start'));
                                        $datediff = $now - $your_date;

                                        echo floor($datediff / (60 * 60 * 24));
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Total accounts</th>
                                <td><?= count($this->db->get_where('tbl_users', array('role_id <>'=>1))->result()); ?></td>
                            </tr>
                            <tr>
                                <th>Active accounts</th>
                                <td><?= count($this->db->get_where('tbl_users', array('role_id <>'=>1, 'banned'=>0))->result()); ?></td>
                            </tr>
                            <tr>
                                <th>Total deposited </th>
                                <td> $ 
                                    <?php
                                        $q=$this->db->select('sum(amount) as amount',FALSE)
                                          ->from('deposit')
                                          ->group_by('transaction_id')
                                          ->get();
                                        $deposit_info=$q->result();
                                        if($deposit_info)
                                            echo number_format($deposit_info[0]->amount,2);
                                        else 
                                            echo '0.00';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Total withdraw</th>
                                <td>$ 
                                    <?php
                                        $p=$this->db->select('sum(amount) as amount',FALSE)
                                          ->from('history')
                                          ->where('type', 'withdrawal')
                                          ->get();
                                        $withdraw_info=$p->result();
                                        if(empty($withdraw_info))
                                            echo ($withdraw_info[0]->amount);
                                        else
                                            echo '0.00';
                                    ?>
                                </td>
                            </tr>
                            <tr>
                                <th>Members online</th>
                                <td><?= count($this->db->get_where('tbl_users', array('role_id <>'=>1, 'online_status'=>1))->result()); ?></td>
                            </tr>
                        </table>
                    </div>
                    <div class="navigation-links">
                        <h3>Dollar price per ounce</h3>
                        <div class="stats-img">
                            <img src="//kitconet.com/charts/metals/gold/t24_au_en_usoz_2.gif" width="172" height="114">
                        </div>
                    </div>
                    <div class="navigation-links">
                        <h3>Euro price per ounce</h3>
                        <div class="stats-img">
                            <img src="//kitconet.com/charts/metals/gold/t24_au_en_euoz_2.gif" width="172" height="114">
                        </div>
                    </div>
                </div>
            </div><!--leftbar close here-->
            <div class="col-md-9 col-sm-8"><!--rightbar start here-->
                <div class="login-form-inside framebody">
                    <?= $subview; ?>
                </div>
            </div><!--rightbar close here-->


        </div>
    </div>
</div>
<?php  $this->load->view('footer'); ?>

        <!-- jQuery 2.1.4 -->
        <script src="<?php echo base_url(); ?>asset/js/jquery-1.10.2.min.js"></script>         
        <!-- Bootstrap 3.3.2 JS -->
        <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js" type="text/javascript"></script>             
        <script type="text/javascript">
            $(document).ready(function() {
                var client_stusus = $('#client_stusus').val();
                if (client_stusus == '2') {
                    $(".company").removeAttr('disabled');
                } else {
                    $('.company').hide();
                    $(".company").attr('disabled', 'disabled');
                }
                $('#client_stusus').change(function() {
                    if ($('#client_stusus').val() == '1') {
                        $('.person').show();
                        $('.company').hide();
                        $(".company").attr('disabled', 'disabled');
                        $(".person").removeAttr('disabled');
                    } else {
                        $('.person').hide();
                        $('.company').show();
                        $(".person").attr('disabled', 'disabled');
                        $(".company").removeAttr('disabled');
                    }
                });
            });
        </script>
		<style>
.inner-wrapper {
    background-size: cover;
    background:#00607b;
    position: relative;
}
</style>
<script src="<?php echo base_url('asset/dist/jquery.validate.js');?>"></script>
<script src="<?php echo base_url() ?>asset/js/toastr.min.js"></script>
<script type="text/javascript">var baseURL = '<?php echo base_url();?>';</script>
<script>
 $().ready(function() {
        // validate signup form on keyup and submit
        $("#UserRegisterForm").validate({
            
            rules: {
                name: "required",
                //lastname: "required",
                username: {
                    required: true,
                    minlength: 5,
                    //loginRegex: true,
                    remote:{
                        url: baseURL + "login/check_availability",
                        type: "post",
                        data: {
                            param: 'student_registration_username'
                        }
                    }
                },
                password: {
                    required: true,
                    minlength: 5
                },
                confirm_password: {
                    required: true,
                    minlength: 5,
                    equalTo: "#password"
                },
                email: {
                    required: true,
                    email: true,
                    remote:{
                        url: baseURL + "login/check_availability",
                        type: "post",
                        data: {
                            param: 'student_registration_email'
                        }
                    }
                },
                question: {
                    required: true
                },
                answer: {
                    required: true
                },
                
                <?php if (config_item('country_in_reg') == '1') { ?>
                
                cboCountry:{
                    required: true
                },
                <?php } 
                    if (config_item('captcha_in_reg') == '1') {
                ?>
                confirmcaptch: {
                    required: true,
                    equalTo: "#captcha"
                },
                <?php } ?>
                intro_name:{
                    remote:{
                        param:{
                            url: baseURL + "login/check_introname",
                            type: "post",
                            data: {
                                param: 'student_registration_introname'
                            },
                        },
                        depends: function(element) {
                            return $.trim($('#intro_name').val()) != '';
                        }                        
                    }
                },
                bitcoin:{
                    minlength: 32,
                    maxlength: 36,
                }
                /*topic: {
                    required: "#newsletter:checked",
                    minlength: 2
                },
                agree: "required"*/
            },
            messages: {
                name: "Please enter your full name",
                //lastname: "Please enter your lastname",
                username: {
                    required: "Please enter a username",
                    minlength: "Your username must consist of at least 5 characters",
                    remote: "This username already exists. Please try forget password option to retrieve your user name and password"
                },
                password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long"
                },
                confirm_password: {
                    required: "Please provide a password",
                    minlength: "Your password must be at least 5 characters long",
                    equalTo: "Please enter the same password as above"
                },
                email: {
                    required: "Please enter a valid email address",
                    email: "Please enter a valid email address",
                    remote: "This email id already exists. Please try forget password option to retrieve your user name and password"
                },
                question: {
                    required: "Please enter a security question",
                },
                answer: {
                    required: "Please enter your security question's answer",
                },
                
                <?php if (config_item('country_in_reg') == '1') { ?>
                cboCountry:{
                    required: "Please select your country",
                },
                <?php }
                if (config_item('captcha_in_reg') == '1') { 
                ?> 
                confirmcaptch: {
                    required: "Please enter captcha value",
                    equalTo: "Your captcha value is incorrect"
                },
                <?php }?>
                intro_name:{
                    remote: "This affiliate id does not exists."
                },
                bitcoin:{
                    minlength: "Length of bitcoin address is 32 to 36",
                    maxlength: "Length of bitcoin address is 32 to 36",
                },
                
                //agree: "Please accept our policy",
                //topic: "Please select at least 2 topics"
            }
            //,
            /*submitHandler: function (form) {
                var introName = $.trim($('#intro_name').val());
                if(introName != '')
                {
                    $.ajax{
                        url: baseURL + "login/check_availability",
                        type: "POST",
                        data: "param=student_registration_username&username="+introName,
                        success: function(resp){
                            alert(resp);
                            return false;
                        }
                    }
                }
            }*/
        });

        /*// propose username by combining first- and lastname
        $("#username").focus(function() {
            var firstname = $("#firstname").val();
            var lastname = $("#lastname").val();
            if (firstname && lastname && !this.value) {
                this.value = firstname + "." + lastname;
            }
        });

        //code to hide topic selection, disable for demo
        var newsletter = $("#newsletter");
        // newsletter topics are optional, hide at first
        var inital = newsletter.is(":checked");
        var topics = $("#newsletter_topics")[inital ? "removeClass" : "addClass"]("gray");
        var topicInputs = topics.find("input").attr("disabled", !inital);
        // show when newsletter is checked
        newsletter.click(function() {
            topics[this.checked ? "removeClass" : "addClass"]("gray");
            topicInputs.attr("disabled", !this.checked);
        });*/


         $("#UserLoginForm").validate({
            rules: {
                user_name: {
                    required: true,
                },
                password: {
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
                user_name: {
                    required: "Please enter a username or email",
                },
                password: {
                    required: "Please enter password",
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