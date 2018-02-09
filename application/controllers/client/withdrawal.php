<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Withdrawal extends Client_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('plan_model');
    }



    public function index() {  
		
		$Vou4vxorrdoe['breadcrumbs'] = 'Withdrawal';
        $Vou4vxorrdoe['active'] = '1';
        $Vou4vxorrdoe['sub']=1;
        $Vou4vxorrdoe['page'] = 'withdrawal';
        $Vou4vxorrdoe['title'] = 'List of wihdrawals';
        $Vou4vxorrdoe['all_withdraw_info'] = array(); 
        $Vou4vxorrdoe['approve_status']=array(0=>'Sent for Aproval',1=>'Approved');
        $Vou4vxorrdoe['subview'] = $this->load->view('client/withdraw', $Vou4vxorrdoe, true);	
		
		$this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }

    public function withdrawal_history() {
        $Vpxamdyeznwr = $this->session->userdata('user_id');
		
		$Vou4vxorrdoe['breadcrumbs'] = 'Withdrawal';
        $Vou4vxorrdoe['active'] = '1';
        $Vou4vxorrdoe['page'] = 'withdrawal';
        $Vou4vxorrdoe['sub']=2;
        $Vou4vxorrdoe['title'] = 'Withdrawal History';
        $Vou4vxorrdoe['all_withdraw_info'] = $this->db->get_where('withdraw', array('member_id'=>$this->session->userdata('user_id'), 'status'=>1))->result();
        $Vou4vxorrdoe['approve_status']=array(0=>'Sent for Aproval',1=>'Approved');
        
		$Vou4vxorrdoe['withdraw_history']= $this->db->get_where('history',array('user_id'=> $Vpxamdyeznwr,'type'=>'withdrawal','status'=>1))->result();
		
		
		$Vou4vxorrdoe['subview'] = $this->load->view('client/withdraw_history', $Vou4vxorrdoe, true);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }
  

    

    public function save_withdrawal() {
		$Vpxamdyeznwr = $this->session->userdata('user_id');
		$V1ppoj02aqp1 = user_total_balence($Vpxamdyeznwr);
		
		
		
        $V0hxs4gpe3xd = $this->input->post();        
        $this->db->select('count(*) as num');
        $this->db->where("user_id = '".$this->session->userdata('user_id')."'");
        $this->db->like('date', date('Y-m-'));
        $Vuq34jlhekzm = $this->db->get('history');
        $Vgbsdgexogkr = $Vuq34jlhekzm->row_array();
         if($this->input->post('amount') > $V1ppoj02aqp1['withdrawable_balence']){
			$V4pigtpor0ln = "error";
            $Vb0xezrtkohj = lang('withdrawal_amount_exceed');
			set_message($V4pigtpor0ln, $Vb0xezrtkohj);
			redirect('client/withdrawal');
			die();
		}else
		if($Vgbsdgexogkr['num']>=$this->config->item('withdraw_allow_month')){
           
			$V4pigtpor0ln = "error";
            $Vb0xezrtkohj = lang('already_withdrawal');
			set_message($V4pigtpor0ln, $Vb0xezrtkohj);
			redirect('client/withdrawal');
			die();
        }
        else{
            		
			$V0hxs4gpe3xd2 = array();
			$V0hxs4gpe3xd2['amount'] = $this->input->post('amount');
			$V0hxs4gpe3xd2['payment_thro'] = $this->input->post('payment_thro');
			$V0hxs4gpe3xd2['description'] = $this->input->post('comment');
			
			$V0hxs4gpe3xd2['user_id'] = $Vpxamdyeznwr;
			$V0hxs4gpe3xd2['type'] = 'withdraw_pending';
			$V0hxs4gpe3xd2['date'] = date('Y-m-d H:i:s');
			
			$this->db->insert('history',$V0hxs4gpe3xd2);
			$this->db->last_query();			
			
            $Vou4vxorrdoe = array(
            config_item('company_domain'),
            $this->session->userdata('name'),
            $this->input->post('request_date', TRUE),
            $this->input->post('amount', TRUE),
            $this->input->post('comment', TRUE),
        );
        $Vmh4nbblpmvn = $this->login_model->check_by(array('email_group' => 'withdraw_email_to_admin'), 'tbl_email_templates');
        $V52ujzwbr0ov = str_replace(array("{SITE_NAME}", "{USER}", "{REQUEST_DATE}", "{AMOUNT}", "{COMMENT}"), $Vou4vxorrdoe, $Vmh4nbblpmvn->template_body);
        $Vo5qwinqzuyk=config_item('company_email');
        $Vld5fbk2n1id = $Vmh4nbblpmvn->subject;
        $Vld5fbk2n1id = str_replace("{AMOUNT}", $this->input->post('amount', TRUE), $Vld5fbk2n1id);

         
        $Verlwfuqi3pq['recipient'] = $Vo5qwinqzuyk;
        $Verlwfuqi3pq['subject'] = $Vld5fbk2n1id;
        $Verlwfuqi3pq['message'] = $V52ujzwbr0ov;
        $Verlwfuqi3pq['resourceed_file'] = '';
        $this->login_model->send_email($Verlwfuqi3pq);

            $V4pigtpor0ln = "success";
            $Vb0xezrtkohj = lang('save_withdrawal');
        }
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('client/withdrawal');
         
    }
}
