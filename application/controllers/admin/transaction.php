<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Transaction extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('plan_model');
        $this->load->helper('alert');
    }



    public function index($type='deposit') {       
       
		
		if($this->input->get_post('search')){
			$type = $this->input->get_post('type');
			$payment_thro = $this->input->get_post('payment_thro');
			$start_date = date('Y-m-d H:i:s',strtotime($this->input->get_post('start_date')));
			$end_date =  date('Y-m-d H:i:s',strtotime($this->input->get_post('end_date')."+1 day -1 seconds"));
			
			$this->db->select('tbl_account_details.fullname,tbl_users.username,tbl_users.email,tbl_account_details.phone, history.amount, history.payment_thro, history.date,history.description')
			->from('history')
			->join('tbl_account_details', 'history.user_id = tbl_account_details.user_id')
			->join('tbl_users','tbl_users.user_id = tbl_account_details.user_id');
			
			if($type != 'all_trans')
				$this->db->where('history.type', $type);
			if($payment_thro != 'all_ecurrencies')
				$this->db->where('history.payment_thro', $payment_thro);
			
			$this->db->where("(date >= '$start_date' AND date <= '$end_date')");
			
			$transaction = $this->db->get();
			#echo $this->db->last_query();
		}else{
			$type = $type;
			$start_date = date('Y-m-d H:i:s',strtotime("-1 year +1 day"));
			$end_date =  date('Y-m-d H:i:s',strtotime("+1 day -1 seconds"));
			
			$this->db->where("(date >= '$start_date' AND date <= '$end_date')");
			
			$this->db->select('tbl_account_details.fullname,tbl_users.username,tbl_users.email,tbl_account_details.phone, history.amount, history.payment_thro, history.date,history.description')
			->from('history')
			->join('tbl_account_details', 'history.user_id = tbl_account_details.user_id')
			->join('tbl_users','tbl_users.user_id = tbl_account_details.user_id');
				
			$this->db->where('history.type', $type);
			$transaction = $this->db->get();
		}
		
		$data['type']= $type;
		if($type == 'all_trans'){
			$subtitle = 'All Transactions List';
			$data['title'] = $subtitle;
		}else{
			$subtitle = lang($type);
			$data['title'] = 'Transactions List of '.$subtitle;
		}
		
		
		
		$data['trans_types']= get_list_of_trans_type();
		$data['ecurrencies_list']= get_list_of_currencies();
		
		$data['trans_details']=$transaction;
		$data['subview'] = $this->load->view('admin/transaction/index', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }

    public function deposit(){
        $data['title'] = 'List of Deposits';
        $data['page'] = 'deposits';
        $data['type']='bonus';
		
		$transaction = $this->db->select('tbl_account_details.fullname,tbl_users.username,tbl_users.email,tbl_account_details.phone,tbl_plans.plan_name, deposit.amount, deposit.invest_date, deposit.transaction_id, deposit.status, deposit.maturity_date')
         ->from('deposit')
         ->join('tbl_plans', 'tbl_plans.plan_id = deposit.plan_id')
		 ->join('tbl_users','tbl_users.user_id = deposit.member_id')
		 ->join('tbl_account_details', 'tbl_users.user_id = tbl_account_details.user_id')
         ->order_by('deposit.deposit_id','desc')
         ->get();
         //echo $this->db->last_query();die;
		 $data['payment_gateways']=get_list_of_currencies();
        $data['client_transactions'] = $transaction;
		
		
        $data['subview'] = $this->load->view('admin/deposits', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
	
	public function send_bonus(){
        $data['title'] = 'Send Bonus';
        $data['page'] = 'Send Bonus';
        $data['type']='bonus';
        $data['subview'] = $this->load->view('admin/transaction/send_bonus', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }

    public function send_penality(){
        $data['title'] = 'Send Penality';
        $data['page'] = 'Send Penality';
        $data['type']='penality';
        $data['subview'] = $this->load->view('admin/transaction/send_bonus', $data, TRUE);
        $this->load->view('admin/_layout_main', $data);
    }
	
	

    
	public function submit_bonus(){
        $type_bonus = $this->input->post('type', TRUE);
        $amount = $this->input->post('amount', TRUE);
        $payment_thro = $this->input->post('payment_thro', TRUE);
        $request_date=date('Y-m-d H:i:s');
        $description=ucfirst($type_bonus).' by Admin';
        $sent_option = $this->input->post('sent_option', TRUE);
		  if($type_bonus=='bonus'){
		   $transcation_id = "BON".rand(0,9999999);
		  }
		  else{
		   $transcation_id = "PEN".rand(0,9999999);
		  }
        $full_data=array(
            'amount' => $amount,
            'type' => $type_bonus,
            'payment_thro' => $payment_thro,
            'date' => $request_date,
            'description' => $description,
            'transcation_id' => $transcation_id,
        );

        if($sent_option==2){

            $result=$this->db->select('tbl_users.user_id,  tbl_account_details.fullname, tbl_users.email')
            ->from('tbl_users')
            ->join('tbl_account_details', 'tbl_users.user_id = tbl_account_details.user_id')
            ->where("role_id <>", 1)
            ->get();
            $users_info=$result->result();
            if (!empty($users_info)) {
                foreach($users_info as $v_user){
                    $new_data=array();
                    $new_data=$full_data;
                    $new_data['user_id']=$v_user->user_id;
                    $this->plan_model->_table_name = 'history';
                    $this->plan_model->_primary_key = 'id';
                    $this->plan_model->save($new_data);
                }
            }
            $type="success";
            $message=ucfirst($type_bonus)." is sent to all users.";
        }
        else{

            if($this->input->post('username')!=''){
                $users_array=array();
                $users_emails=explode(',', $this->input->post('username'));
                foreach($users_emails as $user_email){
                    $user_data=array();
                    $user_data=$this->db->get_where('tbl_users',array('email' => trim($user_email)))->row_array();
                    if(!empty($user_data)){
                        $users_array[]=$user_data['user_id'];
                    }
                }
                
                if(empty($users_array)){
                    $type="error";
                    $message="Please write valid username.";
                }
                else
                {
                    $result=$this->db->select('tbl_users.user_id,  tbl_account_details.fullname, tbl_users.email')
                    ->from('tbl_users')
                    ->join('tbl_account_details', 'tbl_users.user_id = tbl_account_details.user_id')
                    ->where_in("tbl_users.user_id", $users_array)
                    ->get();
                    
                    $users_info=$result->result();
                    if (!empty($users_info)) {
                        foreach($users_info as $v_user){
                            $new_data=array();
                            $new_data=$full_data;
                            $new_data['user_id']=$v_user->user_id;
                            $this->plan_model->_table_name = 'history';
                            $this->plan_model->_primary_key = 'id';
                            $this->plan_model->save($new_data);
                        }
                    }
                    $type="success";
                    $message=ucfirst($type_bonus)." has been sent to specific users";
                }
            }
            else{
                $type="error";
                $message="Please write valid username.";
            }
        }

        set_message($type, $message);

        redirect('admin/transaction/send_'.$type_bonus);
    }
	
	
}
