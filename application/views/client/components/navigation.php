<!-- Left side column. contains the logo and sidebar -->

<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->

    <?php

    $user_id = $this->session->userdata('user_id');

    $profile_info = $this->db->where('user_id', $user_id)->get('tbl_account_details')->row();

    $user_info = $this->db->where('user_id', $user_id)->get('tbl_users')->row();

    ?>

    <section class="sidebar">    

        <div class="user-panel">

            <div class="pull-left image">

                <img src="<?= base_url() . $profile_info->avatar ?>" class="img-circle" alt="User Image" />

            </div>

            <div class="pull-left info">

                <p><?= $profile_info->fullname ?></p>

                <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> Online</a>

            </div>

        </div>        


        <!-- sidebar menu: : style can be found in sidebar.less -->        



        <?php

        //echo $this->menu->dynamicMenu();

        ?>

        <ul class="sidebar-menu">

            <li class="<?php

            if (!empty($page)) {

                echo $page == lang('dashboard') ? 'active' : '';

            }

            ?>">

                <a href="<?php echo base_url(); ?>client/dashboard/"> <i class="fa fa-dashboard"></i><span><?= lang('dashboard') ?></span></a>

            </li>                

            <li class="<?php if (!empty($page)){ echo $page == 'buy' ? 'active' : ''; }?>">

                <a href="<?php echo base_url(); ?>client/investment_plan"> <i class="fa fa-folder-open-o"></i><span>Investment Plans</span></a>

            </li>

            
            <li class="<?php if (!empty($page)){ echo ($page == 'withdrawal')? 'active' : ''; }?>"><a href="<?php echo base_url(); ?>client/withdrawal"> <i class="fa fa-rocket"></i><span>Make Withdraw</span></a>
            </li>
			<li class="<?php if (!empty($page)){ echo ($page == 'deposit')? 'active' : ''; }?>"><a href="<?php echo base_url(); ?>client/transaction/deposit"> <i class="fa fa-money"></i><span>Deposits</span></a>
            </li>
            

            <li class="treeview  <?php

            if (!empty($page)) {

                echo $page == 'transaction' ? 'active' : '';

            }

            ?>">

                <a href="javascript:void(0)"> <i class="fa fa-money"></i><span>Transaction</span><i class="fa fa-angle-right pull-right"></i></a>

                <ul  class="treeview-menu">

                    <li class="<?= (!empty($sub) && $sub == 1 ? 'active' : ' ') ?>">

                        <a href="<?= base_url() ?>client/transaction/index/deposit"> <i class="fa fa-circle-o"></i><span>Deposit History</span></a>

                    </li> 
					
					<li class="<?= (!empty($sub) && $sub == 2 ? 'active' : ' ') ?>">

                        <a href="<?= base_url() ?>client/transaction/index/withdraw_pending"> <i class="fa fa-circle-o"></i><span>Withdrawal Requests</span></a>

                    </li> 

                    <li class="<?= (!empty($sub) && $sub == 3 ? 'active' : ' ') ?>">
						
                        <a href="<?= base_url() ?>client/transaction/index/withdrawal"> <i class="fa fa-circle-o"></i><span>Withdrawal History</span></a>

                    </li> 
					<li class="<?= (!empty($sub) && $sub == 4 ? 'active' : ' ') ?>">
						
                        <a href="<?= base_url() ?>client/transaction/index/bonus"> <i class="fa fa-circle-o"></i><span>Bonus</span></a>

                    </li> 
					<li class="<?= (!empty($sub) && $sub == 5 ? 'active' : ' ') ?>">
						
                        <a href="<?= base_url() ?>client/transaction/index/penality"> <i class="fa fa-circle-o"></i><span>Penality</span></a>

                    </li> 
                    
                </ul> 

            </li>
			
			<li class="<?php if (!empty($page)){ echo $page == 'refferal' ? 'active' : ''; }?>"><a href="<?php echo base_url(); ?>client/refferal"> <i class="fa fa-share-alt"></i><span>Refferals</span></a>
            </li>

            <li class="treeview  <?php

            if (!empty($page)) {

                echo $page == lang('tickets') ? 'active' : '';

            }

            ?>">

                <a href="javascript:void(0)"> <i class="fa fa-ticket"></i><span><?= lang('tickets') ?></span><i class="fa fa-angle-right pull-right"></i></a>

                <ul  class="treeview-menu">

                    <li class="<?= (!empty($sub) && $sub == 1 ? 'active' : ' ') ?>">

                        <a href="<?= base_url() ?>client/tickets/answered"> <i class="fa fa-circle-o"></i><span><?= lang('answered') ?></span></a>

                    </li> 

                    <li class="<?= (!empty($sub) && $sub == 2 ? 'active' : ' ') ?>">

                        <a href="<?= base_url() ?>client/tickets/open"> <i class="fa fa-circle-o"></i><span><?= lang('open') ?></span></a>

                    </li> 

                    <li class="<?= (!empty($sub) && $sub == 3 ? 'active' : ' ') ?>">

                        <a href="<?= base_url() ?>client/tickets/in_progress"> <i class="fa fa-circle-o"></i><span><?= lang('in_progress') ?></span></a>

                    </li> 

                    <li class="<?= (!empty($sub) && $sub == 4 ? 'active' : ' ') ?>">

                        <a href="<?= base_url() ?>client/tickets/closed"> <i class="fa fa-circle-o"></i><span><?= lang('closed') ?></span></a>

                    </li> 

                    <li class="<?= (!empty($sub) && $sub == 5 ? 'active' : ' ') ?>">

                        <a href="<?= base_url() ?>client/tickets"> <i class="fa fa-ticket"></i><span><?= lang('all_tickets') ?></span></a>

                    </li> 

                </ul> 

            </li>

          

            <li class="<?php

            if (!empty($page)) {

                echo $page == lang('settings') ? 'active' : '';

            }

            ?>">

                <a href="<?php echo base_url(); ?>client/settings/"> <i class="fa fa-cogs"></i><span><?= lang('settings') ?></span></a>

            </li>
            <li class="">
                <a href="<?php echo base_url(); ?>login/logout"> <i class="fa fa-sign-out"></i><span><?= lang('logout') ?></span></a>
            </li>

        </ul>

    </section>

    <!-- /.sidebar -->

</aside>