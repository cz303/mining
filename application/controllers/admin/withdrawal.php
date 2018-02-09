<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Withdrawal extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('plan_model');
    }



    public function index($V11pkgviu51d=0) {
        
        $Vou4vxorrdoe['breadcrumbs'] = 'Withdrawal';
        $Vou4vxorrdoe['active'] = '1';
        $Vou4vxorrdoe['page'] = 'Withdrawal';
        $Vou4vxorrdoe['title'] = 'List of wihdrawals';
        $Vwbpa3giaw5f=$this->db->select('withdraw.*, tbl_account_details.fullname')
         ->from('withdraw')
         ->join('tbl_account_details', 'withdraw.member_id = tbl_account_details.user_id')
         ->where('withdraw.status', $V11pkgviu51d)
         ->get();
        $Vou4vxorrdoe['all_withdraw_info'] = $Vwbpa3giaw5f;
        $Vou4vxorrdoe['approve_status']=array(0=>'Sent for Aproval',1=>'Approved');
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/withdraw', $Vou4vxorrdoe, true);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    public function approved_withdrawal($V11pkgviu51d=1) {
        
        $Vou4vxorrdoe['breadcrumbs'] = 'Withdrawal';
        $Vou4vxorrdoe['active'] = '1';
        $Vou4vxorrdoe['page'] = 'Withdrawal';
        $Vou4vxorrdoe['title'] = 'List of wihdrawals';
        $Vwbpa3giaw5f=$this->db->select('withdraw.*, tbl_account_details.fullname')
         ->from('withdraw')
         ->join('tbl_account_details', 'withdraw.member_id = tbl_account_details.user_id')
         ->where('withdraw.status', $V11pkgviu51d)
         ->get();
        $Vou4vxorrdoe['all_withdraw_info'] = $Vwbpa3giaw5f;
        $Vou4vxorrdoe['approve_status']=array(0=>'Sent for Aproval',1=>'Approved');
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/withdraw', $Vou4vxorrdoe, true);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

  

    

    public function approve($Vfhglt1zwjvx='') {

        $Ve3dsas5532p['status']=1;     
        $Ve3dsas5532p['withdraw_date']=date('Y-m-d');   
        $this->plan_model->_table_name = 'withdraw';
        $this->plan_model->_primary_key = 'withdraw_id';
        $this->plan_model->save($Ve3dsas5532p, $Vfhglt1zwjvx);

        $Vwbpa3giaw5f=$this->db->select('withdraw.*, tbl_account_details.fullname, tbl_users.email')
         ->from('withdraw')
         ->join('tbl_account_details', 'withdraw.member_id = tbl_account_details.user_id')
         ->join('tbl_users', 'withdraw.member_id = tbl_users.user_id')
         ->where('withdraw_id', $Vfhglt1zwjvx)
         ->get()->row();
         $Vou4vxorrdoe = array(
            config_item('company_domain'),
            $Vwbpa3giaw5f->fullname,
            $Vwbpa3giaw5f->amount,
        );

        $Vmh4nbblpmvn = $this->login_model->check_by(array('email_group' => 'withdraw_email_to_user'), 'tbl_email_templates');
        $V52ujzwbr0ov = str_replace(array("{SITE_NAME}", "{USERNAME}", "{AMOUNT}"), $Vou4vxorrdoe, $Vmh4nbblpmvn->template_body);
        $Vo5qwinqzuyk=$Vwbpa3giaw5f->email;
        $Vld5fbk2n1id = $Vmh4nbblpmvn->subject;
        $Vld5fbk2n1id = str_replace("{AMOUNT}", $Vwbpa3giaw5f->amount, $Vld5fbk2n1id);

         
        $Verlwfuqi3pq['recipient'] = $Vo5qwinqzuyk;
        $Verlwfuqi3pq['subject'] = $Vld5fbk2n1id;
        $Verlwfuqi3pq['message'] = $V52ujzwbr0ov;
        $Verlwfuqi3pq['resourceed_file'] = '';
        $this->login_model->send_email($Verlwfuqi3pq);

        $V4pigtpor0ln='success';
        $Vb0xezrtkohj=lang('approve_user_request');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/withdrawal');
         
    }
}
