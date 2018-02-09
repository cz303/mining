<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
    }

    

    public function create_user($Vwfsll4zanwn = null) {
        $Vou4vxorrdoe['title'] = 'Create User';

        if (!empty($Vwfsll4zanwn)) {
            $Vou4vxorrdoe['user_id'] = $Vwfsll4zanwn;
        } else {
            $Vou4vxorrdoe['user_id'] = null;
        }

        $this->user_model->_table_name = 'tbl_menu'; 
        $this->user_model->_order_by = 'menu_id';
        $Vslpxnxdegop = $this->user_model->get();

        foreach ($Vslpxnxdegop as $Vaukiiv3p4cm) {
            $Va0wqjr5n5w4['parents'][$Vaukiiv3p4cm->parent][] = $Vaukiiv3p4cm;
        }

        $Vou4vxorrdoe['result'] = $this->buildChild(0, $Va0wqjr5n5w4);

        $this->user_model->_table_name = 'tbl_users'; 
        $this->user_model->_order_by = 'user_id';
        $Vou4vxorrdoe['user_login_details'] = $this->user_model->get_by(array('user_id' => $Vou4vxorrdoe['user_id']), true);

        if ($Vou4vxorrdoe['user_login_details']) {
        } else {
            $Vou4vxorrdoe['user_login_details'] = $this->user_model->get_new_user();
        }

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/user/create_user', $Vou4vxorrdoe, true);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    

    public function buildChild($V3jkqexf4nr0, $Va0wqjr5n5w4) {
        if (isset($Va0wqjr5n5w4['parents'][$V3jkqexf4nr0])) {
            foreach ($Va0wqjr5n5w4['parents'][$V3jkqexf4nr0] as $Vqu4sc4flnwk) {
                if (!isset($Va0wqjr5n5w4['parents'][$Vqu4sc4flnwk->menu_id])) {
                    $Vwbpa3giaw5f[$Vqu4sc4flnwk->label] = $Vqu4sc4flnwk->menu_id;
                }
                if (isset($Va0wqjr5n5w4['parents'][$Vqu4sc4flnwk->menu_id])) {
                    $Vwbpa3giaw5f[$Vqu4sc4flnwk->label][$Vqu4sc4flnwk->menu_id] = self::buildChild($Vqu4sc4flnwk->menu_id, $Va0wqjr5n5w4);
                }
            }
        }

        return $Vwbpa3giaw5f;
    }

    public function user_list($Vrrb21ym0qp1 = NULL, $Vwfsll4zanwn = NULL) {

        $Vpxamdyeznwr = $Vwfsll4zanwn;

        if ($Vrrb21ym0qp1 == 'edit_user') {
            $Vou4vxorrdoe['active'] = 2;
            $this->user_model->_table_name = 'tbl_users'; 
            $this->user_model->_order_by = 'user_id';
            $Vou4vxorrdoe['login_info'] = $this->user_model->get_by(array('user_id' => $Vpxamdyeznwr), true);
        } else {
            $Vou4vxorrdoe['active'] = 1;
        }
        $this->user_model->_table_name = 'tbl_menu'; 
        $this->user_model->_order_by = 'menu_id';
        $Vslpxnxdegop = $this->user_model->get();
        foreach ($Vslpxnxdegop as $Vaukiiv3p4cm) {
            $Va0wqjr5n5w4['parents'][$Vaukiiv3p4cm->parent][] = $Vaukiiv3p4cm;
        }

        $Vou4vxorrdoe['result'] = $this->buildChild(0, $Va0wqjr5n5w4);


        $Vou4vxorrdoe['title'] = 'User List';

        
        $this->user_model->_table_name = 'tbl_languages';
        $this->user_model->_order_by = 'name';
        $Vou4vxorrdoe['languages'] = $this->user_model->get();

        $this->user_model->_table_name = 'tbl_users'; 
        $this->user_model->_order_by = 'user_id';
        $Vou4vxorrdoe['all_user_info'] = $this->user_model->get();

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/user/user_list', $Vou4vxorrdoe, true);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    public function user_details($Vwfsll4zanwn) {
        $Vou4vxorrdoe['title'] = lang('user_details');
        $Vou4vxorrdoe['id'] = $Vwfsll4zanwn;
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/user/user_details', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    

    public function save_user() {

        $Vucee0bravo2 = $this->user_model->array_from_post(array('username', 'email', 'role_id'));
        $Vpxamdyeznwr = $this->input->post('user_id', true);
        
        $Vdf3a5upds0t = array('username' => $Vucee0bravo2['username']);
        $Vo5qwinqzuyk = array('email' => $Vucee0bravo2['email']);
        
        if (!empty($Vpxamdyeznwr)) { 
            $V3f5esxrtq1d = array('user_id !=' => $Vpxamdyeznwr);
        } else { 
            $V3f5esxrtq1d = null;
        }
        
        $Vel4znxovui5 = $this->user_model->check_update('tbl_users', $Vdf3a5upds0t, $V3f5esxrtq1d);
        $Vgz3ev0v0xjq = $this->user_model->check_update('tbl_users', $Vo5qwinqzuyk, $V3f5esxrtq1d);
        if (!empty($Vel4znxovui5) || !empty($Vgz3ev0v0xjq)) { 
            if (!empty($Vel4znxovui5)) {
                $Vyrkodvljby0 = $Vucee0bravo2['username'];
            } else {
                $Vyrkodvljby0 = $Vucee0bravo2['email'];
            }
            
            $V4pigtpor0ln = 'error';
            $Vb0xezrtkohj = "<strong style='color:#000'>" . $Vyrkodvljby0 . '</strong>  ' . lang('already_exist');
        } else { 
            $Vucee0bravo2['last_ip'] = $this->input->ip_address();


            if (empty($Vpxamdyeznwr)) {
                $Vsnnardgofbr = $this->input->post('password', TRUE);
                $Vucee0bravo2['password'] = $this->hash($Vsnnardgofbr);
                $Vucee0bravo2['online_status'] = 0;
            }

            

            $this->user_model->_table_name = 'tbl_users'; 
            $this->user_model->_primary_key = 'user_id'; 
            if (!empty($Vpxamdyeznwr)) {
                $Vwfsll4zanwn = $this->user_model->save($Vucee0bravo2, $Vpxamdyeznwr);
            } else {
                $Vwfsll4zanwn = $this->user_model->save($Vucee0bravo2);
            }            

            
            $Vgutdwsqtdte = $this->user_model->array_from_post(array('fullname', 'company', 'locale', 'language', 'phone', 'mobile', 'skype', 'departments_id'));
            $Vn0oic3dct4n = $this->input->post('account_details_id', TRUE);
            if (!empty($_FILES['avatar']['name'])) {
                $Vwk2nao2d33x = $this->user_model->uploadImage('avatar');
                $Vwk2nao2d33x == TRUE || redirect('admin/user/user_list');
                $Vgutdwsqtdte['avatar'] = $Vwk2nao2d33x['path'];
            }

            $Vgutdwsqtdte['user_id'] = $Vwfsll4zanwn;

            $this->user_model->_table_name = 'tbl_account_details'; 
            $this->user_model->_primary_key = 'account_details_id'; 
            if (!empty($Vn0oic3dct4n)) {
                $this->user_model->save($Vgutdwsqtdte, $Vn0oic3dct4n);
            } else {
                $this->user_model->save($Vgutdwsqtdte);
            }

            $Vgwdaxxrfbfz = array(
                'user' => $this->session->userdata('user_id'),
                'module' => 'user',
                'module_field_id' => $Vwfsll4zanwn,
                'activity' => 'activity_added_new_user',
                'icon' => 'fa-user',
                'value1' => $Vucee0bravo2['username']
            );
            $this->user_model->_table_name = 'tbl_activities';
            $this->user_model->_primary_key = "activities_id";
            $this->user_model->save($Vgwdaxxrfbfz);

            if (!empty($Vpxamdyeznwr)) {
                $Vb0xezrtkohj = lang('update_user_info');
            } else {
                $Vb0xezrtkohj = lang('save_user_info');
            }
            $V4pigtpor0ln = 'success';
        }
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/user/user_list'); 
    }

    

    public function delete_user($Vwfsll4zanwn = null) {
        if (!empty($Vwfsll4zanwn)) {
            $Vwfsll4zanwn = $Vwfsll4zanwn;
            $Vpxamdyeznwr = $this->session->userdata('user_id');

            
            if ($Vwfsll4zanwn == $Vpxamdyeznwr) {
                
                
                $V4pigtpor0ln = 'error';
                $Vb0xezrtkohj = 'Sorry You can not delete your own account!';
                set_message($V4pigtpor0ln, $Vb0xezrtkohj);
                redirect('admin/user/user_list'); 
            } else {
                
                
                $this->user_model->_table_name = 'tbl_users'; 
                $this->user_model->_order_by = 'user_id';
                $Vwbpa3giaw5f = $this->user_model->get_by(array('user_id' => $Vwfsll4zanwn), true);

                if (!empty($Vwbpa3giaw5f)) {
                    
                    $this->user_model->_table_name = 'tbl_account_details';
                    $this->user_model->delete_multiple(array('user_id' => $Vwfsll4zanwn));

                    $this->user_model->_table_name = 'tbl_activities';
                    $this->user_model->delete_multiple(array('user' => $Vwfsll4zanwn));

                    $this->user_model->_table_name = 'tbl_users';
                    $this->user_model->delete_multiple(array('user_id' => $Vwfsll4zanwn));

                    $this->user_model->_table_name = 'tbl_tickets';
                    $this->user_model->delete_multiple(array('reporter' => $Vwfsll4zanwn));

                    $this->user_model->_table_name = 'tbl_tickets_replies';
                    $this->user_model->delete_multiple(array('replierid' => $Vwfsll4zanwn));
					
                    
                    $this->user_model->_table_name = "tbl_todo"; 
                    $this->user_model->delete_multiple(array('user_id' => $Vwfsll4zanwn));

                    
                    $V4pigtpor0ln = 'success';
                    $Vb0xezrtkohj = 'User Delete Successfully!';
                    set_message($V4pigtpor0ln, $Vb0xezrtkohj);
                    redirect('admin/user/user_list'); 
                } else {
                    
                    $V4pigtpor0ln = 'error';
                    $Vb0xezrtkohj = 'Sorry this user not find in database!';
                    set_message($V4pigtpor0ln, $Vb0xezrtkohj);
                    redirect('admin/user/user_list'); 
                }
            }
        }
    }

    public function change_status($Vfulfsai1dsz, $Vwfsll4zanwn) {
        
        if ($Vfulfsai1dsz == 1) {
            $Vzjcdynyc23y = 'Active';
        } else {
            $Vzjcdynyc23y = 'Deactive';
        }
        $Vdf3a5upds0t = array('user_id' => $Vwfsll4zanwn);
        $Vrrb21ym0qp1 = array('activated' => $Vfulfsai1dsz);
        $this->user_model->set_action($Vdf3a5upds0t, $Vrrb21ym0qp1, 'tbl_users');

        $Vgwdaxxrfbfz = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'user',
            'module_field_id' => $Vwfsll4zanwn,
            'activity' => 'activity_change_status',
            'icon' => 'fa-user',
            'value1' => $Vfulfsai1dsz,
        );
        $this->user_model->_table_name = 'tbl_activities';
        $this->user_model->_primary_key = "activities_id";
        $this->user_model->save($Vgwdaxxrfbfz);

        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = "User " . $Vzjcdynyc23y . " Successfully!";
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/user/user_list'); 
    }

    public function set_banned($Vfulfsai1dsz, $Vwfsll4zanwn) {

        if ($Vfulfsai1dsz == 1) {
            $Vzjcdynyc23y = lang('banned');
            $Vrrb21ym0qp1 = array('activated' => 0, 'banned' => $Vfulfsai1dsz, 'ban_reason' => $this->input->post('ban_reason', TRUE));
        } else {
            $Vzjcdynyc23y = lang('unbanned');
            $Vrrb21ym0qp1 = array('activated' => 1, 'banned' => $Vfulfsai1dsz);
        }
        $Vdf3a5upds0t = array('user_id' => $Vwfsll4zanwn);

        $this->user_model->set_action($Vdf3a5upds0t, $Vrrb21ym0qp1, 'tbl_users');

        $Vgwdaxxrfbfz = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'user',
            'module_field_id' => $Vwfsll4zanwn,
            'activity' => 'activity_change_status',
            'icon' => 'fa-user',
            'value1' => $Vfulfsai1dsz,
        );
        $this->user_model->_table_name = 'tbl_activities';
        $this->user_model->_primary_key = "activities_id";
        $this->user_model->save($Vgwdaxxrfbfz);

        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = "User " . $Vzjcdynyc23y . " Successfully!";
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/user/user_list'); 
    }

    public function change_banned($Vwfsll4zanwn) {

        $Vou4vxorrdoe['user_id'] = $Vwfsll4zanwn;
        $Vou4vxorrdoe['modal_subview'] = $this->load->view('admin/user/_modal_banned_reson', $Vou4vxorrdoe, FALSE);
        $this->load->view('admin/_layout_modal', $Vou4vxorrdoe);
    }

    public function hash($Vlkger5ehs4w) {
        return hash('sha512', $Vlkger5ehs4w . config_item('encryption_key'));
    }


    function todo($V1gd2krlc4cw = '', $Vjibjqhe3bac = '', $Vzau5j4qlldp = '') {
        if ($V1gd2krlc4cw == 'add') {
            $this->add_todo();
        }
        if ($V1gd2krlc4cw == 'reload_incomplete_todo') {
            $this->get_incomplete_todo();
        }
        if ($V1gd2krlc4cw == 'mark_as_done') {
            $this->mark_todo_as_done($Vjibjqhe3bac);
        }
        if ($V1gd2krlc4cw == 'mark_as_undone') {
            $this->mark_todo_as_undone($Vjibjqhe3bac);
        }
        if ($V1gd2krlc4cw == 'swap') {

            $this->swap_todo($Vjibjqhe3bac, $Vzau5j4qlldp);
        }
        if ($V1gd2krlc4cw == 'delete') {
            $this->delete_todo($Vjibjqhe3bac);
        }
        $Vlivr1yz2m3i['opened'] = 1;
        $this->session->set_userdata($Vlivr1yz2m3i);
        redirect('admin/dashboard/');
    }

    function add_todo() {
        $Vou4vxorrdoe['title'] = $this->input->post('title');
        $Vou4vxorrdoe['user_id'] = $this->session->userdata('user_id');

        $this->db->insert('tbl_todo', $Vou4vxorrdoe);
        $Vjibjqhe3bac = $this->db->insert_id();

        $Vou4vxorrdoe['order'] = $Vjibjqhe3bac;
        $this->db->where('todo_id', $Vjibjqhe3bac);
        $this->db->update('tbl_todo', $Vou4vxorrdoe);
    }

    function mark_todo_as_done($Vjibjqhe3bac = '') {
        $Vou4vxorrdoe['status'] = 1;
        $this->db->where('todo_id', $Vjibjqhe3bac);
        $this->db->update('tbl_todo', $Vou4vxorrdoe);
    }

    function mark_todo_as_undone($Vjibjqhe3bac = '') {
        $Vou4vxorrdoe['status'] = 0;
        $this->db->where('todo_id', $Vjibjqhe3bac);
        $this->db->update('tbl_todo', $Vou4vxorrdoe);
    }

    function swap_todo($Vjibjqhe3bac = '', $Vzau5j4qlldp = '') {
        $Va22k3bvcbjp = 0;
        $V5gbqzgk0fws = $this->db->get_where('tbl_todo', array('todo_id' => $Vjibjqhe3bac))->row()->order;
        $Vbt51zuiztyf = $this->session->userdata('user_id');

        
        if ($Vzau5j4qlldp == 'up') {

            
            $this->db->order_by('order', 'ASC');
            $Vlivr1yz2m3i_lists = $this->db->get_where('tbl_todo', array('user_id' => $Vbt51zuiztyf))->result_array();
            $Vei4iaton4n3 = count($Vlivr1yz2m3i_lists);

            
            foreach ($Vlivr1yz2m3i_lists as $Vlivr1yz2m3i_list) {
                $Vwfsll4zanwn_list[] = $Vlivr1yz2m3i_list['todo_id'];
                $Vtcotp1r0r3y[] = $Vlivr1yz2m3i_list['order'];
            }
        }

        
        if ($Vzau5j4qlldp == 'down') {

            
            $this->db->order_by('order', 'DESC');
            $Vlivr1yz2m3i_lists = $this->db->get_where('tbl_todo', array('user_id' => $Vbt51zuiztyf))->result_array();
            $Vei4iaton4n3 = count($Vlivr1yz2m3i_lists);

            
            foreach ($Vlivr1yz2m3i_lists as $Vlivr1yz2m3i_list) {
                $Vwfsll4zanwn_list[] = $Vlivr1yz2m3i_list['todo_id'];
                $Vtcotp1r0r3y[] = $Vlivr1yz2m3i_list['order'];
            }
        }

        
        for ($Vfhiq1lhsoja = 0; $Vfhiq1lhsoja < $Vei4iaton4n3; $Vfhiq1lhsoja++) {
            if ($V5gbqzgk0fws == $Vtcotp1r0r3y[$Vfhiq1lhsoja]) {
                if ($Va22k3bvcbjp > 0) {
                    $Vnmtlm3l2ctx = $Vtcotp1r0r3y[$Vfhiq1lhsoja - 1];
                    $Vvegh2dnama5 = $Vwfsll4zanwn_list[$Vfhiq1lhsoja - 1];

                    
                    $Vou4vxorrdoe['order'] = $Vnmtlm3l2ctx;
                    $this->db->where('todo_id', $Vjibjqhe3bac);
                    $this->db->update('tbl_todo', $Vou4vxorrdoe);

                    
                    $Vou4vxorrdoe['order'] = $V5gbqzgk0fws;
                    $this->db->where('todo_id', $Vvegh2dnama5);
                    $this->db->update('tbl_todo', $Vou4vxorrdoe);
                }
            } else
                $Va22k3bvcbjp++;
        }
    }

    function delete_todo($Vjibjqhe3bac = '') {
        $this->db->where('todo_id', $Vjibjqhe3bac);
        $this->db->delete('tbl_todo');
    }

    function get_incomplete_todo() {
        $Vbt51zuiztyf = $this->session->userdata('user_id');
        $this->db->where('user_id', $Vbt51zuiztyf);
        $this->db->where('status', 0);
        $Vuq34jlhekzm = $this->db->get('tbl_todo');

        $Vfhiq1lhsojancomplete_todo_number = $Vuq34jlhekzm->num_rows();
        if ($Vfhiq1lhsojancomplete_todo_number > 0) {
            echo '<span class="badge badge-secondary">';
            echo $Vfhiq1lhsojancomplete_todo_number;
            echo '</span>';
        }
    }
	
	function transactions($Vwfsll4zanwn){
		
		$Vk0sdsugtrb0=$this->db->select('history.amount, history.payment_thro, history.description, history.type, history.date')
         ->from('history')
         ->join('tbl_account_details', 'history.user_id = tbl_account_details.user_id')
		 ->where('tbl_account_details.user_id', $Vwfsll4zanwn)
         ->where_in('history.type', array('bonus', 'penality'))
         ->get();
        $Vbt51zuiztyf_data=$this->db->get_where('tbl_account_details',array('user_id' => $Vwfsll4zanwn))->row_array(); 
		$Vou4vxorrdoe['title'] = 'Transaction List of '.$Vbt51zuiztyf_data['fullname'];
		$Vou4vxorrdoe['trans_details']=$Vk0sdsugtrb0;
		$Vou4vxorrdoe['subview'] = $this->load->view('admin/user/transaction', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
	}
}
