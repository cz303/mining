<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Buy extends Client_Controller {

     public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('settings_model');
        $this->load->model('plan_model');
    }

    public function index($Veqmjvrkbugp = false) {
        
		$Vpxamdyeznwr =  $this->session->userdata("user_id");
		
		$Vou4vxorrdoe['breadcrumbs'] = "Investment Plans";
        $Vou4vxorrdoe['title'] = 'Investment Plans';
        $Vou4vxorrdoe['page'] = 'investment_plans';
        $this->plan_model->_table_name = 'tbl_plans'; 
        $this->plan_model->_order_by = 'plan_id';
        $Vou4vxorrdoe['all_plan_info'] = $this->plan_model->get();
        $Vypkzdoadnl3=iperiod_type();
        $Vttvc4msxnjm=period_type();
        $Vou4vxorrdoe['iperiod_type'] = $Vypkzdoadnl3;
        $Vou4vxorrdoe['period_type'] = $Vttvc4msxnjm;
        if($Veqmjvrkbugp!=false){
            $Vou4vxorrdoe['plan_id']=$Veqmjvrkbugp;
            $Vawpne0kjtuy=$this->db->get_where('tbl_plans', array('plan_id'=>$Veqmjvrkbugp))->row();
            $Vou4vxorrdoe['min_amt']=$Vawpne0kjtuy->plan_min_amt;
            $Vou4vxorrdoe['max_amt']=$Vawpne0kjtuy->plan_max_amt;
        }

        $Vk0sdsugtrb0=$this->db->select('tbl_plans.plan_name, deposit.amount, deposit.invest_date, deposit.transaction_id, deposit.status, deposit.maturity_date')
         ->from('deposit')
         ->join('tbl_plans', 'tbl_plans.plan_id = deposit.plan_id')
         ->where('deposit.member_id', $this->session->userdata("user_id"))
		 ->limit(10)
		 ->order_by('deposit.deposit_id','desc')
         ->get();
         
		 $Vou4vxorrdoe['payment_gateways']=get_list_of_currencies();
        $Vou4vxorrdoe['client_transactions'] = $Vk0sdsugtrb0;
        
		
		
		
        $Vou4vxorrdoe['subview'] = $this->load->view('client/buy', $Vou4vxorrdoe, TRUE);
        
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }
    
	
	
	function purchase_plan($Veqmjvrkbugp = false){
        $this->index($Veqmjvrkbugp);
    }

    function get_plan_limit($Veqmjvrkbugp){
        $Vawpne0kjtuy=$this->db->get_where('tbl_plans', array('plan_id'=>$Veqmjvrkbugp))->row();
		$Vaz1w03avwud=number_format($Vawpne0kjtuy->plan_min_amt, '2', '.', '');
		$Vxxgp2k2k4nh=number_format($Vawpne0kjtuy->plan_max_amt, '2', '.', '');
		echo $Vaz1w03avwud.'&'.$Vxxgp2k2k4nh;

    }
    
}
