<header class="main-header">
    <?php
		$user_id = $this->session->userdata('user_id');
		$profile_info = $this->db->where('user_id', $user_id)->get('tbl_account_details')->row();
		$user_info = $this->db->where('user_id', $user_id)->get('tbl_users')->row();
		if (config_item('company_logo') == '') {
		   $img=base_url() .'asset/images/logo.png';
		} else {
		   $img = base_url() . config_item('company_logo');
		}
	?>


    <a href="<?= base_url() ?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
		<span class="logo-mini"><img style="width: 48px;height: 48px;border-radius: 50px" src="<?= $img ?>" class="m-r-sm"></span>
		<!-- logo for regular state and mobile devices -->
		<span class="logo-lg">
			<img style="width: 100px;height: 30px;" src="<?= $img ?>" >
		</span>
       
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
        </a>        
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <!-- User Account: style can be found in dropdown.less -->
                <li class="dropdown user user-menu">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                        <img src="<?= base_url() . $profile_info->avatar ?>" class="user-image" alt="User Image" />
                        <span class="hidden-xs"><?= $profile_info->fullname ?></span>
                    </a>
                    <ul class="dropdown-menu">
                        <!-- User image -->
                        <li class="user-header">
                            <img src="<?= base_url() . $profile_info->avatar ?>" class="img-circle" alt="User Image" />
                            <p>
                                <?= $profile_info->fullname ?>
                                <small><?= lang('last_login') . ':' ?>
                                    <?php
                                    if ($user_info->last_login == '0000-00-00 00:00:00') {
                                        $login_time = "-";
                                    } else {
                                        $login_time = strftime(config_item('date_format') . " %H:%M:%S", strtotime($user_info->last_login));
                                    }
                                    echo $login_time;
                                    ?>
                                </small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <?php /*?>
                        <li class="user-body">
                            <div class="col-xs-4 text-center">                                                                
                                <a href="<?= base_url() ?>admin/settings/activities" ><?= lang('activities') ?></a>
                            </div>
                            <div class="col-xs-4 text-center">

                            </div>
                            <div class="col-xs-4 text-center">                                
                                <a href="<?= base_url() ?>locked/lock_screen" ><?= lang('lock_screen') ?></a>
                            </div>
                        </li>
                        <?php */?>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <div class="pull-left">
                                <a href="<?= base_url() ?>admin/settings/update_profile" class="btn btn-default btn-flat"><?= lang('update_profile') ?></a>
                            </div>
                            <div class="pull-right">
                                <a href="<?= base_url() ?>login/logout" class="btn btn-default btn-flat"><?= lang('logout') ?></a>
                            </div>
                        </li>
                    </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->

                <li>
                    <a href="#" data-toggle="control-sidebar"><i class="fa fa-bars"></i>
                        <span class="label label-danger"><?php
                            $user = $this->session->userdata('user_id');
                            $this->db->where('user_id', $user);
                            $this->db->where('status', 0);
                            $query = $this->db->get('tbl_todo');

                            $incomplete_todo_number = $query->num_rows();
                            if ($incomplete_todo_number > 0) {
                                echo $incomplete_todo_number;
                            }
                            ?></span>
                    </a>
                </li>
            </ul>
        </div>

    </nav>
</header>
<!-- Control Sidebar -->
<?php
$opened = $this->session->userdata('opened');
$this->session->unset_userdata('opened');
?>
<aside class="control-sidebar control-sidebar-dark <?php
if (!empty($opened)) {
    echo 'control-sidebar-open';
}
?>">
    <style>
        .active{
            background:none;
        }
    </style>
    <!-- Create the tabs -->    
    <!-- Tab panes -->
    <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane active" style="background:none;" id="control-sidebar-home-tab">
            <h2 style="color: #EFF3F4;font-weight: 100;text-align: center;">
                <?php echo date("l"); ?>
                <br />
                <?php echo date("jS F, Y"); ?>
            </h2>
            <form action="<?= base_url() ?>admin/user/todo/add" method="post" class="form-horizontal form-groups" style="margin-top: 40px">
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-1">
                        <textarea class="form-control" required type="text" name="title" placeholder="+<?= lang('add_todo') ?>" style="background-color: #364559;border: 1px solid #4F595E;color: rgba(170,170,170 ,1);" data-validate="required"></textarea>
                    </div>
                    <input type="submit" value="<?= lang('add') ?>" class="btn btn-success btn-xs"  />
                </div>
            </form>
            <table style="width: 83%;margin-left: 22px;">
                <?php
                $this->db->where('user_id', $user_id);
                $this->db->order_by('order', 'asc');
                $todos = $this->db->get('tbl_todo')->result_array();
                foreach ($todos as $row):
                    ?>
                    <tr>
                        <td>
                    <li id="todo_1" 
                        style="<?php if ($row['status'] == 1): ?>text-decoration: line-through;<?php endif; ?>font-size: 13px;
                        <?php if ($row['status'] == 0): ?>color: #fff;<?php endif; ?>;">
                        <?php echo $row['title']; ?>
                    </li>
                    </td>
                    <td style="text-align:right;">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default btn-sm dropdown-toggle " data-toggle="dropdown"
                                    style="padding:0px;background-color: #303641;border: 0px;-ms-transform: rotate(90deg); /* IE 9 */
                                    -webkit-transform: rotate(90deg); /* Chrome, Safari, Opera */
                                    transform: rotate(90deg);">
                                <i class="entypo-dot-2" style="color:#B4BCBE;"></i> 
                                <span class="" style="visibility:hidden; width:0px;"></span>
                            </button>
                            <ul class="dropdown-menu dropdown-default pull-right" role="menu" style="text-align:left;">
                                <li>
                                    <?php if ($row['status'] == 0): ?>
                                        <a href="<?= base_url() ?>admin/user/todo/mark_as_done/<?php echo $row['todo_id']; ?>">
                                            <i class="entypo-check"></i>
                                            <?php echo lang('mark_completed'); ?>
                                        </a>
                                    <?php endif; ?>
                                    <?php if ($row['status'] == 1): ?>
                                        <a href="<?= base_url() ?>admin/user/todo/mark_as_undone/<?php echo $row['todo_id']; ?>">
                                            <i class="entypo-cancel"></i>
                                            <?php echo lang('mark_incomplete'); ?>
                                        </a>
                                    <?php endif; ?>
                                </li>


                                <li>
                                    <a href="<?= base_url() ?>admin/user/todo/swap/<?php echo $row['todo_id']; ?>/up">
                                        <i class="entypo-up"></i>
                                        <?php echo lang('move_up'); ?>
                                    </a>
                                    <a href="<?= base_url() ?>admin/user/todo/swap/<?php echo $row['todo_id']; ?>/down">
                                        <i class="entypo-down"></i>
                                        <?php echo lang('move_down'); ?>
                                    </a>
                                </li>
                                <li class="divider"></li>


                                <li>
                                    <a href="<?= base_url() ?>admin/user/todo/delete/<?php echo $row['todo_id']; ?>">
                                        <i class="entypo-trash"></i>
                                        <?= lang('delete'); ?>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </td>
                    </tr>
                <?php endforeach; ?>
            </table>

            <div id="idCalculadora"></div>

        </div><!-- /.tab-pane -->                
    </div>
</aside><!-- /.control-sidebar -->
<link rel="stylesheet" href="<?= base_url() ?>asset/js/plugins/calculator/SimpleCalculadorajQuery.css">
<script src="<?= base_url() ?>asset/js/plugins/calculator/SimpleCalculadorajQuery.js"></script>
<script>
    $("#idCalculadora").Calculadora({'EtiquetaBorrar': 'Clear', TituloHTML: ''});
</script>