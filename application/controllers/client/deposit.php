<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Deposit extends Client_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('settings_model');
        $this->load->model('plan_model');
    }

    public function index() {
		
		if($this->input->post('currency_bitcoin')=='Payeer'){
			$Vdbcc4kfryqk = $this->db->query("insert into deposit(member_id,plan_id,payment_thro,amount,compound_amount,compound_rate,invest_date,status) 
			values('".$this->session->userdata('user_id')."','".$this->input->post('plan_id')."','payeer','".$this->input->post('amount')."','".$this->input->post('amount')."','".$this->input->post('compound')."','".date('Y-m-d H:i:s')."','new')");
			$V01s5bklpb5m= $this->db->insert_id();
			
			$V1n3tsycu3r2 = number_format($this->input->post('amount'), 2);
			$Vs3xkrzrt2om = 'USD'; 
			$Vukbxtadkbxy = $this->config->item('payeer_shop_id'); 
			$Vqngdasoygsq = base64_encode('Amount Deposit from '.$this->session->userdata('user_name')); 
			$Vou4vxorrdoe['m_shop'] = $Vukbxtadkbxy;
			$Vou4vxorrdoe['m_orderid'] = $V01s5bklpb5m;
			$Vou4vxorrdoe['m_amount'] = $V1n3tsycu3r2;
			$Vou4vxorrdoe['m_desc'] = $Vqngdasoygsq;
			$V5tbg3zyjvxi = $this->config->item('payeer_shop_secret_key');

			$Vh334qetxws4 = array(
				$Vukbxtadkbxy,
				$V01s5bklpb5m,
				$V1n3tsycu3r2,
				$Vs3xkrzrt2om,
				$Vqngdasoygsq,
				$V5tbg3zyjvxi
			);	

			$Vy31ea41yieh	 = strtoupper(hash('sha256', implode(':', $Vh334qetxws4)));
			$Vou4vxorrdoe['sign'] = $Vy31ea41yieh;
		}
		$Vou4vxorrdoe['breadcrumbs'] = "Investment Plans";
		$Vou4vxorrdoe['title'] = 'Investment Plans';
		$Vou4vxorrdoe['page'] = 'buy';
		$this->plan_model->_table_name = 'tbl_plans'; 
		$this->plan_model->_order_by = 'plan_id';
		$Vou4vxorrdoe['all_plan_info'] = $this->plan_model->get();
		$Vou4vxorrdoe['coinpayment']=coinpayment();
		$Vou4vxorrdoe['amount']=$this->input->post('amount');
		$Vou4vxorrdoe['address']=$this->input->post('currency_bitcoin');
		$Vou4vxorrdoe['compound']=$this->input->post('compound');
		$Vou4vxorrdoe['plan_id']=$this->input->post('plan_id');
		$Vou4vxorrdoe['subview'] = $this->load->view('client/deposit', $Vou4vxorrdoe, TRUE);
		$this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }
}
