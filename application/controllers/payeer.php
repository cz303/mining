<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Payeer extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('settings_model');
		$this->load->model('login_model');
    }
	
	public function index(){
		
		$Vfmdebzx5lxa=$_REQUEST['m_orderid'];		
		$Vtz1ujkvd5vg = $this->db->where(array('deposit_id' => $Vfmdebzx5lxa))->get('deposit')->row_array();
		$Vlgcbuwt3pp4=$Vpxamdyeznwr=$V2wyxp4sp1aq=$Vtz1ujkvd5vg['member_id'];
		$Vzqszcbo4neu=$_REQUEST['m_amount'];
		$Veqmjvrkbugp=$Vtz1ujkvd5vg['plan_id'];
		
		if (isset($_REQUEST['m_operation_id']) && isset($_REQUEST['m_sign'])){			
			$Vh334qetxws4 = array($_REQUEST['m_operation_id'],
				$_REQUEST['m_operation_ps'],
				$_REQUEST['m_operation_date'],
				$_REQUEST['m_operation_pay_date'],
				$_REQUEST['m_shop'],
				$_REQUEST['m_orderid'],
				$_REQUEST['m_amount'],
				$_REQUEST['m_curr'],
				$_REQUEST['m_desc'],
				$_REQUEST['m_status'],
				$this->config->item('payeer_shop_secret_key')
			);
	
	
			$Vpp5hpfacbq0 = strtoupper(hash('sha256', implode(':', $Vh334qetxws4))); 
			
			if ($_REQUEST['m_sign'] == $Vpp5hpfacbq0 && $_REQUEST['m_status'] == 'success'){
				$Va5zq3yanff3 = 100;
				$Va5zq3yanff3_text = "Deposit By Payeer";				
				$Vf1kwqxxhqpziew_B = $this->db->where(array('plan_id' => $Veqmjvrkbugp))->get('tbl_plans')->row_array();
				
				$Vh1j4ohzr3fk = $Vzqszcbo4neu;
				
				$V3j2s2awamy5=date('Y-m-d');	
				$Vloow0ofeahg = $Vf1kwqxxhqpziew_B['period'];
					
				if($Vf1kwqxxhqpziew_B['iperiod_type'] == 2)
					$Vloow0ofeahg =$Vloow0ofeahg;
				else if($Vf1kwqxxhqpziew_B['iperiod_type'] == 3)
					$Vloow0ofeahg = $Vloow0ofeahg * 7; 
				else if($Vf1kwqxxhqpziew_B['iperiod_type'] == 4)
					$Vloow0ofeahg = $Vloow0ofeahg * 30;
				else if($Vf1kwqxxhqpziew_B['iperiod_type'] == 5)
					$Vloow0ofeahg = $Vloow0ofeahg * 365;
							
				if($Vf1kwqxxhqpziew_B['iperiod_type'] == 1){
					$Va3uqpnchzks = date('Y-m-d H:i:s ',strtotime($V3j2s2awamy5. ' + '.$Vloow0ofeahg.' hours'));
				}
				else{		 
					$Va3uqpnchzks = $this->calculateMature($V3j2s2awamy5,$Vloow0ofeahg);
				}
				$Vf1i3okfsfvx = "DEP".rand(0,9999999);	
				$Vhhdiejtstvg=$this->db->where(array('transaction_id' => $Vf1i3okfsfvx, 'payment_thro'=> 'perfect_money'))->get('history')->row_array();
				
				if ( empty($Vhhdiejtstvg) ){
					$Vdbcc4kfryqk = $this->db->query("INSERT INTO `history`(`id`, `user_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) VALUES ('0','".$Vpxamdyeznwr."','".$Vzqszcbo4neu."','deposit','".$Va5zq3yanff3_text."','".date('Y-m-d H:i:s')."','payeer','0','0','".$Vf1i3okfsfvx."','".$Va5zq3yanff3."')");
				
					$Vxsr2uq4ti4h = $this->db->query("update deposit set status='active',invest_date='$V3j2s2awamy5',maturity_date='$Va3uqpnchzks',transaction_id='".$Vf1i3okfsfvx."', cron_date='".date('Y-m-d H:i:s')."' where deposit_id='".$_REQUEST['m_orderid']."'");		
					
					$Vuq34jlhekzm=$this->db->select('tbl_users.user_id, tbl_users.username, tbl_account_details.fullname, tbl_users.email, tbl_account_details.intro_id')
						->from('tbl_users')
						->join('tbl_account_details', 'tbl_users.user_id = tbl_account_details.user_id')
						->where("tbl_users.user_id", $Vpxamdyeznwr)
						->get();
					if ( $Vuq34jlhekzm->num_rows() > 0 ){
						$Vhdntiicvg34 = $Vuq34jlhekzm->row_array();
					
						$Vabnhsh3i2yo=$Vhdntiicvg34['intro_id'];
						$Veogga54cpgo=$Vhdntiicvg34['fullname'];
						$Vlyqw1opjnxe=$Vhdntiicvg34['email'];					
						if($Vabnhsh3i2yo!=''){
							$this->get_levelcommission($Vabnhsh3i2yo,$Vzqszcbo4neu,1,$Vabnhsh3i2yo,$Veqmjvrkbugp,$Vpxamdyeznwr);
						}
					}
							
				}
			}
			$V4pigtpor0ln = 'success';
		$Vb0xezrtkohj = lang('deposit_success');
		set_message($V4pigtpor0ln, $Vb0xezrtkohj);		
		redirect("client/investment_plan");
		}
	}
	
	public function calculateMature($V4dtm5zzggg0,$Vloow0ofeahg){
		$Vaxg5pf4dhts = strtotime("+".$Vloow0ofeahg." days", strtotime($V4dtm5zzggg0));
		return  date("Y-m-d", $Vaxg5pf4dhts);
    }
	
	public function get_levelcommission($Vabnhsh3i2yo,$Vzqszcbo4neu,$Vr1ehei34kfq,$Vlgcbuwt3pp4,$Vmfshskcsyyz,$V2wyxp4sp1aq){

		$Vuq34jlhekzm=$this->db->select('tbl_users.user_id,  tbl_account_details.fullname, tbl_users.email, tbl_account_details.intro_id, tbl_users.username')
				->from('tbl_users')
				->join('tbl_account_details', 'tbl_users.user_id = tbl_account_details.user_id')
				->where("tbl_users.user_id", $Vabnhsh3i2yo)
				->get();
				if ( $Vuq34jlhekzm->num_rows() > 0 ){
					$Vrcvgela3get = $Vuq34jlhekzm->row_array();
			
			$Vssdkuzajqti=$Vrcvgela3get['username'];
			$Vkrjrtj2iipm=$Vrcvgela3get['intro_id'];
			$Vury3gkktczg=$Vrcvgela3get['username'];
			
			$Vr1ehei34kfq_commission=$this->config->item('ref_level_'.$Vr1ehei34kfq);
			
			if($Vr1ehei34kfq_commission>0){
				$Vfqbdyqi5cra=$Vzqszcbo4neu*$Vr1ehei34kfq_commission;
				
				$V5ny0izq5xgs=$this->db->where(array('user_id' => $V2wyxp4sp1aq))->get('tbl_users')->row_array();	
				
				$Vzk4wpoissgi="Referral Commission Earned From ".$V5ny0izq5xgs['username'];
				$Vyjjdk22xshi=date('Y-m-d h:i:s');
				$Vxfidi1wftrb = "REF".rand(0,9999999);
				
				$Vowzfpmepjpl="insert into history (user_id,amount,type,description,transaction_id) values ('$Vabnhsh3i2yo','$Vfqbdyqi5cra','commissions','$Vzk4wpoissgi','$Vxfidi1wftrb')";
				$Vkyknyylh3f1=$this->db->query($Vowzfpmepjpl);
				
				$Vr1ehei34kfq+=1;			
				if($Vr1ehei34kfq<6){
				
					$this->get_levelcommission($Vkrjrtj2iipm,$Vzqszcbo4neu,$Vr1ehei34kfq,$Vabnhsh3i2yo,$Vmfshskcsyyz,$V2wyxp4sp1aq);
				}
			}
		}   
    }
	
	public function success(){
		$V4pigtpor0ln = 'success';
		$Vb0xezrtkohj = lang('deposit_success');
		set_message($V4pigtpor0ln, $Vb0xezrtkohj);		
		redirect("client/investment_plan");
	}		
	
	public function error(){
		$V4pigtpor0ln = 'error';
		$Vb0xezrtkohj = lang('deposit_error');
		set_message($V4pigtpor0ln, $Vb0xezrtkohj);		
		redirect("client/investment_plan");
	}
}