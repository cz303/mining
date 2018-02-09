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



    public function index($Vqv4dekdt1r5='deposit') {       
       
		
		if($this->input->get_post('search')){
			$Vqv4dekdt1r5 = $this->input->get_post('type');
			$V0k5ydrxt5s3 = $this->input->get_post('payment_thro');
			$Vrxjj0h4wrdx = date('Y-m-d H:i:s',strtotime($this->input->get_post('start_date')));
			$Va2vpqbmy0yp =  date('Y-m-d H:i:s',strtotime($this->input->get_post('end_date')."+1 day -1 seconds"));
			
			$this->db->select('tbl_account_details.fullname,tbl_users.username,tbl_users.email,tbl_account_details.phone, history.amount, history.payment_thro, history.date,history.description')
			->from('history')
			->join('tbl_account_details', 'history.user_id = tbl_account_details.user_id')
			->join('tbl_users','tbl_users.user_id = tbl_account_details.user_id');
			
			if($Vqv4dekdt1r5 != 'all_trans')
				$this->db->where('history.type', $Vqv4dekdt1r5);
			if($V0k5ydrxt5s3 != 'all_ecurrencies')
				$this->db->where('history.payment_thro', $V0k5ydrxt5s3);
			
			$this->db->where("(date >= '$Vrxjj0h4wrdx' AND date <= '$Va2vpqbmy0yp')");
			
			$Viwwxhwmhgb3 = $this->db->get();
			#echo $this->db->last_query();
		}else{
			$Vqv4dekdt1r5 = $Vqv4dekdt1r5;
			$Vrxjj0h4wrdx = date('Y-m-d H:i:s',strtotime("-1 year +1 day"));
			$Va2vpqbmy0yp =  date('Y-m-d H:i:s',strtotime("+1 day -1 seconds"));
			
			$this->db->where("(date >= '$Vrxjj0h4wrdx' AND date <= '$Va2vpqbmy0yp')");
			
			$this->db->select('tbl_account_details.fullname,tbl_users.username,tbl_users.email,tbl_account_details.phone, history.amount, history.payment_thro, history.date,history.description')
			->from('history')
			->join('tbl_account_details', 'history.user_id = tbl_account_details.user_id')
			->join('tbl_users','tbl_users.user_id = tbl_account_details.user_id');
				
			$this->db->where('history.type', $Vqv4dekdt1r5);
			$Viwwxhwmhgb3 = $this->db->get();
		}
		
		$Vmbipsbfpbo1['type']= $Vqv4dekdt1r5;
		if($Vqv4dekdt1r5 == 'all_trans'){
			$Vzsilubmptkm = 'All Transactions List';
			$Vmbipsbfpbo1['title'] = $Vzsilubmptkm;
		}else{
			$Vzsilubmptkm = lang($Vqv4dekdt1r5);
			$Vmbipsbfpbo1['title'] = 'Transactions List of '.$Vzsilubmptkm;
		}
		
		
		
		$Vmbipsbfpbo1['trans_types']= get_list_of_trans_type();
		$Vmbipsbfpbo1['ecurrencies_list']= get_list_of_currencies();
		
		$Vmbipsbfpbo1['trans_details']=$Viwwxhwmhgb3;
		$Vmbipsbfpbo1['subview'] = $this->load->view('admin/transaction/index', $Vmbipsbfpbo1, TRUE);
        $this->load->view('admin/_layout_main', $Vmbipsbfpbo1);
    }

    public function deposit(){
        $Vmbipsbfpbo1['title'] = 'List of Deposits';
        $Vmbipsbfpbo1['page'] = 'deposits';
        $Vmbipsbfpbo1['type']='bonus';
		
		$Viwwxhwmhgb3 = $this->db->select('tbl_account_details.fullname,tbl_users.username,tbl_users.email,tbl_account_details.phone,tbl_plans.plan_name, deposit.amount, deposit.invest_date, deposit.transaction_id, deposit.status, deposit.maturity_date')
         ->from('deposit')
         ->join('tbl_plans', 'tbl_plans.plan_id = deposit.plan_id')
		 ->join('tbl_users','tbl_users.user_id = deposit.member_id')
		 ->join('tbl_account_details', 'tbl_users.user_id = tbl_account_details.user_id')
         ->order_by('deposit.deposit_id','desc')
         ->get();
         
		 $Vmbipsbfpbo1['payment_gateways']=get_list_of_currencies();
        $Vmbipsbfpbo1['client_transactions'] = $Viwwxhwmhgb3;
		
		
        $Vmbipsbfpbo1['subview'] = $this->load->view('admin/deposits', $Vmbipsbfpbo1, TRUE);
        $this->load->view('admin/_layout_main', $Vmbipsbfpbo1);
    }
	
	public function send_bonus(){
        $Vmbipsbfpbo1['title'] = 'Send Bonus';
        $Vmbipsbfpbo1['page'] = 'Send Bonus';
        $Vmbipsbfpbo1['type']='bonus';
        $Vmbipsbfpbo1['subview'] = $this->load->view('admin/transaction/send_bonus', $Vmbipsbfpbo1, TRUE);
        $this->load->view('admin/_layout_main', $Vmbipsbfpbo1);
    }

    public function send_penality(){
        $Vmbipsbfpbo1['title'] = 'Send Penality';
        $Vmbipsbfpbo1['page'] = 'Send Penality';
        $Vmbipsbfpbo1['type']='penality';
        $Vmbipsbfpbo1['subview'] = $this->load->view('admin/transaction/send_bonus', $Vmbipsbfpbo1, TRUE);
        $this->load->view('admin/_layout_main', $Vmbipsbfpbo1);
    }
	
	

    
	public function submit_bonus(){
        $Vqv4dekdt1r5_bonus = $this->input->post('type', TRUE);
        $Vgroacsjmyjb = $this->input->post('amount', TRUE);
        $V0k5ydrxt5s3 = $this->input->post('payment_thro', TRUE);
        $Vt5ws5uzdveq=date('Y-m-d H:i:s');
        $Vyn3rll5wgp4=ucfirst($Vqv4dekdt1r5_bonus).' by Admin';
        $Vjcf33ezstj4 = $this->input->post('sent_option', TRUE);
		  if($Vqv4dekdt1r5_bonus=='bonus'){
		   $Vraiboq1oore = "BON".rand(0,9999999);
		  }
		  else{
		   $Vraiboq1oore = "PEN".rand(0,9999999);
		  }
        $Vzpvlb4yrmby=array(
            'amount' => $Vgroacsjmyjb,
            'type' => $Vqv4dekdt1r5_bonus,
            'payment_thro' => $V0k5ydrxt5s3,
            'date' => $Vt5ws5uzdveq,
            'description' => $Vyn3rll5wgp4,
            'transcation_id' => $Vraiboq1oore,
        );

        if($Vjcf33ezstj4==2){

            $Vnyjad1py332=$this->db->select('tbl_users.user_id,  tbl_account_details.fullname, tbl_users.email')
            ->from('tbl_users')
            ->join('tbl_account_details', 'tbl_users.user_id = tbl_account_details.user_id')
            ->where("role_id <>", 1)
            ->get();
            $V1t1t5dsw0gp=$Vnyjad1py332->result();
            if (!empty($V1t1t5dsw0gp)) {
                foreach($V1t1t5dsw0gp as $Vrsy4gm13jjf){
                    $Vkex41tzvotd=array();
                    $Vkex41tzvotd=$Vzpvlb4yrmby;
                    $Vkex41tzvotd['user_id']=$Vrsy4gm13jjf->user_id;
                    $this->plan_model->_table_name = 'history';
                    $this->plan_model->_primary_key = 'id';
                    $this->plan_model->save($Vkex41tzvotd);
                }
            }
            $Vqv4dekdt1r5="success";
            $Voms5yqfnc0j=ucfirst($Vqv4dekdt1r5_bonus)." is sent to all users.";
        }
        else{

            if($this->input->post('username')!=''){
                $Vbtnvkpk0a4d=array();
                $Vsfv5gahkfek=explode(',', $this->input->post('username'));
                foreach($Vsfv5gahkfek as $Vzw1gzirynou){
                    $Vurzekcvh1v4=array();
                    $Vurzekcvh1v4=$this->db->get_where('tbl_users',array('email' => trim($Vzw1gzirynou)))->row_array();
                    if(!empty($Vurzekcvh1v4)){
                        $Vbtnvkpk0a4d[]=$Vurzekcvh1v4['user_id'];
                    }
                }
                
                if(empty($Vbtnvkpk0a4d)){
                    $Vqv4dekdt1r5="error";
                    $Voms5yqfnc0j="Please write valid username.";
                }
                else
                {
                    $Vnyjad1py332=$this->db->select('tbl_users.user_id,  tbl_account_details.fullname, tbl_users.email')
                    ->from('tbl_users')
                    ->join('tbl_account_details', 'tbl_users.user_id = tbl_account_details.user_id')
                    ->where_in("tbl_users.user_id", $Vbtnvkpk0a4d)
                    ->get();
                    
                    $V1t1t5dsw0gp=$Vnyjad1py332->result();
                    if (!empty($V1t1t5dsw0gp)) {
                        foreach($V1t1t5dsw0gp as $Vrsy4gm13jjf){
                            $Vkex41tzvotd=array();
                            $Vkex41tzvotd=$Vzpvlb4yrmby;
                            $Vkex41tzvotd['user_id']=$Vrsy4gm13jjf->user_id;
                            $this->plan_model->_table_name = 'history';
                            $this->plan_model->_primary_key = 'id';
                            $this->plan_model->save($Vkex41tzvotd);
                        }
                    }
                    $Vqv4dekdt1r5="success";
                    $Voms5yqfnc0j=ucfirst($Vqv4dekdt1r5_bonus)." has been sent to specific users";
                }
            }
            else{
                $Vqv4dekdt1r5="error";
                $Voms5yqfnc0j="Please write valid username.";
            }
        }

        set_message($Vqv4dekdt1r5, $Voms5yqfnc0j);

        redirect('admin/transaction/send_'.$Vqv4dekdt1r5_bonus);
    }
	
	
}
