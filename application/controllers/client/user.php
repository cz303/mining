<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class User extends Client_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('user_model');
        $this->load->model('client_model');
    }

    public function user_list($Vrrb21ym0qp1 = NULL, $Vwfsll4zanwn = NULL) {

        $Vou4vxorrdoe['active'] = 1;
        
        $this->client_model->_table_name = 'tbl_languages';
        $this->client_model->_order_by = 'name';
        $Vou4vxorrdoe['languages'] = $this->client_model->get();
        
        $this->client_model->_table_name = 'tbl_locales';
        $this->client_model->_order_by = 'name';
        $Vou4vxorrdoe['locales'] = $this->client_model->get();

        $Vou4vxorrdoe['title'] = 'User List';
        $Vou4vxorrdoe['page'] = lang('users');
        $Vou4vxorrdoe['breadcrumbs'] = lang('users');

        $Vxfqlpr4rext = $this->session->userdata('client_id');
        if (!empty($Vxfqlpr4rext)) {
            $Vou4vxorrdoe['all_user_info'] = $this->client_model->get_client_contacts($Vxfqlpr4rext);
        }
        $Vou4vxorrdoe['subview'] = $this->load->view('client/user/user_list', $Vou4vxorrdoe, true);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }

    public function user_details($Vwfsll4zanwn) {
        $Vou4vxorrdoe['title'] = lang('user_details');
        $Vou4vxorrdoe['id'] = $Vwfsll4zanwn;
        $Vou4vxorrdoe['user_role'] = $this->user_model->select_user_roll_by_id($Vwfsll4zanwn);

        $Vou4vxorrdoe['subview'] = $this->load->view('client/user/user_details', $Vou4vxorrdoe, TRUE);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }

    

    public function save_user() {
        $Vou4vxorrdoe = $this->client_model->array_from_post(array('fullname', 'phone', 'mobile', 'skype', 'language', 'locale'));
        $Vou4vxorrdoe['company'] = $this->session->userdata('client_id');
        $Vgfv0zj35dze = $this->client_model->array_from_post(array('email', 'username', 'password',));
        $Vgz3ev0v0xjq = $this->client_model->check_by(array('email' => $Vgfv0zj35dze['email']), 'tbl_users');
        $Vqvpdcr5rvzv = $this->client_model->check_by(array('username' => $Vgfv0zj35dze['username']), 'tbl_users');

        if ($Vgfv0zj35dze['password'] == $this->input->post('confirm_password')) {
            $Vwmkcgc5dsil['password'] = $this->hash($Vgfv0zj35dze['password']);

            if (!empty($Vqvpdcr5rvzv)) {
                $Vb0xezrtkohj['error'][] = 'This Username Already Used ! ';
            } else {
                $Vwmkcgc5dsil['username'] = $Vgfv0zj35dze['username'];
            }
            if (!empty($Vgz3ev0v0xjq)) {
                $Vb0xezrtkohj['error'][] = 'This email Address Already Used ! ';
            } else {
                $Vwmkcgc5dsil['email'] = $Vgfv0zj35dze['email'];
            }
        } else {
            $Vb0xezrtkohj['error'][] = 'Sorry Your Password and Confirm Password Does not match !';
        }

        if (!empty($Vwmkcgc5dsil['password']) && !empty($Vwmkcgc5dsil['username']) && !empty($Vwmkcgc5dsil['email'])) {

            $Vwmkcgc5dsil['role_id'] = 2;

            $this->client_model->_table_name = 'tbl_users';
            $this->client_model->_primary_key = 'user_id';
            $Vpxamdyeznwr = $this->client_model->save($Vwmkcgc5dsil);

            $Vou4vxorrdoe['user_id'] = $Vpxamdyeznwr;

            $this->client_model->_table_name = 'tbl_account_details';
            $this->client_model->_primary_key = 'account_details_id';
            $Vxfevkys0cqy = $this->client_model->save($Vou4vxorrdoe);
            
            $Vjng1i3wzykj = $this->client_model->check_by(array('client_id' => $Vou4vxorrdoe['company']), 'tbl_client');

            if ($Vjng1i3wzykj->primary_contact == 0) {
                $Vk43xwwj04ko['primary_contact'] = $Vxfevkys0cqy;
                $this->client_model->_table_name = 'tbl_client';
                $this->client_model->_primary_key = 'client_id';
                $this->client_model->save($Vk43xwwj04ko, $Vou4vxorrdoe['company']);
            }

            $Vgwdaxxrfbfz = array(
                'user' => $this->session->userdata('user_id'),
                'module' => 'Add Contact',
                'module_field_id' => $Vwfsll4zanwn,
                'activity' => 'activity_added_new_contact',
                'icon' => 'fa-user',
                'value1' => $Vou4vxorrdoe['fullname']
            );
            $this->client_model->_table_name = 'tbl_activities';
            $this->client_model->_primary_key = "activities_id";
            $this->client_model->save($Vgwdaxxrfbfz);
        }

        $Vb0xezrtkohj['success'] = lang('save_user_info');
        if (!empty($Vb0xezrtkohj['error'])) {
            $this->session->set_userdata($Vb0xezrtkohj);
            redirect('client/user/user_list'); 
        } else {

            $this->session->set_userdata($Vb0xezrtkohj);
            redirect('client/user/user_list'); 
        }
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
        redirect('client/dashboard/');
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

}
