<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of admistrator
 *
 * @author pc mart ltd
 */
class Dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('invoice_model');
    }

    public function index($action = NULL) {
        $data['title'] = config_item('company_name');
        $data['page'] = lang('dashboard');

        $data['all_member'] = $this->admin_model->count_members();
        $data['active_member'] = $this->admin_model->count_members('active');
        $data['banned_member'] = $this->admin_model->count_members('banned');
        $data['deactived_member'] = $this->admin_model->count_members('deactived');
        $data['total_plan'] = $this->admin_model->count_plans();
        
        $result = $this->admin_model->cal_all_member_bal();
        $data['total_member_bal'] = $result['total_balence'];
        $data['total_member_deposit'] = $result['total_active_deposit'];
        
        $data['total_withdraw'] = $result['total_withdraw'];
        $data['total_withdraw_pending'] = $result['total_withdraw_requets'];
        $data['total_penality'] = $result['total_penality'];
        
        
        
        #calculating todayin and out 
        $data['today_inout'] = $this->admin_model->cal_total_bal_in_out('today');
        
        $data['this_weak_inout'] = $this->admin_model->cal_total_bal_in_out('this_weak');
        $data['this_month_inout'] = $this->admin_model->cal_total_bal_in_out('this_month');
        $data['this_year_inout'] = $this->admin_model->cal_total_bal_in_out('this_year');
        $data['total_inout_amout'] = $this->admin_model->cal_total_bal_in_out('total');
        
        
        
        $user_id = $this->session->userdata('user_id');
        $user_info = $this->admin_model->check_by(array('user_id' => $user_id), 'tbl_users');
        $data['role'] = $user_info->role_id;
        
        $this->load->model('tickets_model');
        $this->tickets_model->_table_name = 'tbl_tickets';
        $this->tickets_model->_order_by = 'tickets_id';
        $data['all_tickets_info'] = $this->tickets_model->get_by(array('status' => 'open'), FALSE);
        
        // printr($data['all_tickets_info']);
       
        $data['subview'] = $this->load->view('admin/main_content', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }

    
    
    
    public function get_transactions_list($year, $type) {// this function is to create get monthy recap report 
        for ($i = 1; $i <= 12; $i++) { // query for months
            if ($i >= 1 && $i <= 9) { // if i<=9 concate with Mysql.becuase on Mysql query fast in two digit like 01.
                $start_date = $year . "-" . '0' . $i . '-' . '01';
                $end_date = $year . "-" . '0' . $i . '-' . '31';
            } else {
                $start_date = $year . "-" . $i . '-' . '01';
                $end_date = $year . "-" . $i . '-' . '31';
            }
            $get_expense_list[$i] = $this->admin_model->get_transactions_list_by_date($type, $start_date, $end_date); // get all report by start date and in date 
        }
        return $get_expense_list; // return the result
    }

    public function set_language($lang) {
        $this->session->set_userdata('lang', $lang);
        redirect($_SERVER["HTTP_REFERER"]);
    }

}
