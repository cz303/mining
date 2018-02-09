<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Account extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('account_model');

        $this->load->helper('ckeditor');
        $this->data['ckeditor'] = array(
            'id' => 'ck_editor',
            'path' => 'asset/js/ckeditor',
            'config' => array(
                'toolbar' => "Full",
                'width' => "99.8%",
                'height' => "400px"
            )
        );
    }

    public function manage_account($Vwfsll4zanwn = NULL) {
        $Vou4vxorrdoe['title'] = lang('manage_account');
        if ($Vwfsll4zanwn) {
            $Vou4vxorrdoe['active'] = 2;
            $Vou4vxorrdoe['account_info'] = $this->account_model->check_by(array('account_id' => $Vwfsll4zanwn), 'tbl_accounts');
        } else {
            $Vou4vxorrdoe['active'] = 1;
        }
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/account/manage_account', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

    public function save_account($Vwfsll4zanwn = NULL) {
        $this->account_model->_table_name = 'tbl_accounts';
        $this->account_model->_primary_key = 'account_id';

        $Vou4vxorrdoe = $this->account_model->array_from_post(array('account_name', 'description', 'balance'));

        
        $Vdf3a5upds0t = array('account_name' => $Vou4vxorrdoe['account_name']);
        
        if (!empty($Vwfsll4zanwn)) { 
            $Vydt1ejvh0zg = array('account_id !=' => $Vwfsll4zanwn);
        } else { 
            $Vydt1ejvh0zg = null;
        }

        
        $Vntqlraoam5c = $this->account_model->check_update('tbl_accounts', $Vdf3a5upds0t, $Vydt1ejvh0zg);
        if (!empty($Vntqlraoam5c)) { 
            
            $V4pigtpor0ln = 'error';
            $Vzjcdynyc23y = "<strong style='color:#000'>" . $Vou4vxorrdoe['account_name'] . '</strong>  ' . lang('already_exist');
        } else { 
            $Vxfevkys0cqy = $this->account_model->save($Vou4vxorrdoe, $Vwfsll4zanwn);
            if (!empty($Vwfsll4zanwn)) {
                $Vwfsll4zanwn = $Vwfsll4zanwn;
                $Vrrb21ym0qp1 = 'activity_update_account';
                $Vzjcdynyc23y = lang('update_account');
            } else {
                $Vwfsll4zanwn = $Vxfevkys0cqy;
                $Vrrb21ym0qp1 = 'activity_save_account';
                $Vzjcdynyc23y = lang('save_account');
            }
            $Vvi3juzyk4ik = array(
                'user' => $this->session->userdata('user_id'),
                'module' => 'account',
                'module_field_id' => $Vwfsll4zanwn,
                'activity' => $Vrrb21ym0qp1,
                'icon' => 'fa-circle-o',
                'value1' => $Vou4vxorrdoe['account_name']
            );
            $this->account_model->_table_name = 'tbl_activities';
            $this->account_model->_primary_key = 'activities_id';
            $this->account_model->save($Vvi3juzyk4ik);
            
            $V4pigtpor0ln = "success";
        }
        $Vb0xezrtkohj = $Vzjcdynyc23y;
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/account/manage_account');
    }

    public function delete_account($Vwfsll4zanwn) {
        
        $Vrrb21ym0qp1 = 'activity_delete_account';
        $Vzjcdynyc23y = lang('delete_account');
        $Voxh2atroohz = $this->account_model->check_by(array('account_id' => $Vwfsll4zanwn), 'tbl_accounts');
        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'account',
            'module_field_id' => $Vwfsll4zanwn,
            'activity' => $Vrrb21ym0qp1,
            'icon' => 'fa-circle-o',
            'value1' => $Voxh2atroohz->account_name
        );
        $this->account_model->_table_name = 'tbl_activities';
        $this->account_model->_primary_key = 'activities_id';
        $this->account_model->save($Vvi3juzyk4ik);

        $this->account_model->_table_name = "tbl_transactions"; 
        $this->account_model->delete_multiple(array('account_id' => $Vwfsll4zanwn));

        $this->account_model->_table_name = "tbl_transfer"; 
        $this->account_model->delete_multiple(array('to_account_id' => $Vwfsll4zanwn));
        $this->account_model->delete_multiple(array('from_account_id' => $Vwfsll4zanwn));

        $this->account_model->_table_name = 'tbl_accounts';
        $this->account_model->_primary_key = 'account_id';
        $this->account_model->delete($Vwfsll4zanwn);

        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = $Vzjcdynyc23y;
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/account/manage_account');
    }

    public function account_balance() {
        $Vou4vxorrdoe['title'] = lang('account_balance');
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/account/account_balance', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

}
