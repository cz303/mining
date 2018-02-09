<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Dashboard extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('invoice_model');
    }

    public function index($V1luewdx5uxj = NULL) {
        $Vmbipsbfpbo1['title'] = config_item('company_name');
        $Vmbipsbfpbo1['page'] = lang('dashboard');

        $Vmbipsbfpbo1['all_member'] = $this->admin_model->count_members();
        $Vmbipsbfpbo1['active_member'] = $this->admin_model->count_members('active');
        $Vmbipsbfpbo1['banned_member'] = $this->admin_model->count_members('banned');
        $Vmbipsbfpbo1['deactived_member'] = $this->admin_model->count_members('deactived');
        $Vmbipsbfpbo1['total_plan'] = $this->admin_model->count_plans();
        
        $Vnyjad1py332 = $this->admin_model->cal_all_member_bal();
        $Vmbipsbfpbo1['total_member_bal'] = $Vnyjad1py332['total_balence'];
        $Vmbipsbfpbo1['total_member_deposit'] = $Vnyjad1py332['total_active_deposit'];
        
        $Vmbipsbfpbo1['total_withdraw'] = $Vnyjad1py332['total_withdraw'];
        $Vmbipsbfpbo1['total_withdraw_pending'] = $Vnyjad1py332['total_withdraw_requets'];
        $Vmbipsbfpbo1['total_penality'] = $Vnyjad1py332['total_penality'];
        
        
        
        #calculating todayin and out 
        $Vmbipsbfpbo1['today_inout'] = $this->admin_model->cal_total_bal_in_out('today');
        
        $Vmbipsbfpbo1['this_weak_inout'] = $this->admin_model->cal_total_bal_in_out('this_weak');
        $Vmbipsbfpbo1['this_month_inout'] = $this->admin_model->cal_total_bal_in_out('this_month');
        $Vmbipsbfpbo1['this_year_inout'] = $this->admin_model->cal_total_bal_in_out('this_year');
        $Vmbipsbfpbo1['total_inout_amout'] = $this->admin_model->cal_total_bal_in_out('total');
        
        
        
        $Vlhkdfkmjeo4 = $this->session->userdata('user_id');
        $Vrhk0vn1mqgs = $this->admin_model->check_by(array('user_id' => $Vlhkdfkmjeo4), 'tbl_users');
        $Vmbipsbfpbo1['role'] = $Vrhk0vn1mqgs->role_id;
        
        $this->load->model('tickets_model');
        $this->tickets_model->_table_name = 'tbl_tickets';
        $this->tickets_model->_order_by = 'tickets_id';
        $Vmbipsbfpbo1['all_tickets_info'] = $this->tickets_model->get_by(array('status' => 'open'), FALSE);
        
        
       
        $Vmbipsbfpbo1['subview'] = $this->load->view('admin/main_content', $Vmbipsbfpbo1, TRUE);
        $this->load->view('admin/_layout_main', $Vmbipsbfpbo1);
    }

    
    
    
    public function get_transactions_list($Vwiow0rfxocj, $Vqv4dekdt1r5) {
        for ($Vydw21efn2ty = 1; $Vydw21efn2ty <= 12; $Vydw21efn2ty++) { 
            if ($Vydw21efn2ty >= 1 && $Vydw21efn2ty <= 9) { 
                $Vrxjj0h4wrdx = $Vwiow0rfxocj . "-" . '0' . $Vydw21efn2ty . '-' . '01';
                $Va2vpqbmy0yp = $Vwiow0rfxocj . "-" . '0' . $Vydw21efn2ty . '-' . '31';
            } else {
                $Vrxjj0h4wrdx = $Vwiow0rfxocj . "-" . $Vydw21efn2ty . '-' . '01';
                $Va2vpqbmy0yp = $Vwiow0rfxocj . "-" . $Vydw21efn2ty . '-' . '31';
            }
            $V2ffnbe5eef4[$Vydw21efn2ty] = $this->admin_model->get_transactions_list_by_date($Vqv4dekdt1r5, $Vrxjj0h4wrdx, $Va2vpqbmy0yp); 
        }
        return $V2ffnbe5eef4; 
    }

    public function set_language($Vh4k0medfeio) {
        $this->session->set_userdata('lang', $Vh4k0medfeio);
        redirect($_SERVER["HTTP_REFERER"]);
    }

}
