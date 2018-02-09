<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Bitcoin extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('settings_model');
		$this->load->model('login_model');
    }

	function errorAndDie($Vkeuxziscyaj='') {
			die('IPN Error: '.$Vkeuxziscyaj);
	}
    public function index() {
		$Vcycuvoxsncn = 'USD';
		$Vf1i3okfsfvx = $_REQUEST['txn_id'];
		$Veqmjvrkbugp = $Vgadcm5ovj4v=$_REQUEST['item_name'];
		$Vpxamdyeznwr=$Vcv5yluaeg2e = $_REQUEST['item_number'];
		$V431y4v0wtnk = $Vzqszcbo4neu=floatval($_REQUEST['amount1']);
		$Vzqszcbo4neu2 = floatval($_REQUEST['amount2']);
		$V5rv1sxojkxs = $_REQUEST['currency1'];
		$Vtliyspnydak = $_REQUEST['currency2'];
		$Va5zq3yanff3 = intval($_REQUEST['status']);
		$Va5zq3yanff3_text = $_REQUEST['status_text'];
		$Vrq4sirtaz32 = $_REQUEST['on1'];
		if($Vtliyspnydak=='BTC'){
			$Vtliyspnydak='Bitcoin';
		}
		else if($Vtliyspnydak=='ETH'){
			$Vtliyspnydak='Ethereum';
		}
		else if($Vtliyspnydak=='DASH'){
			$Vtliyspnydak='DASH';
		}
		else if($Vtliyspnydak=='LTC'){
			$Vtliyspnydak='Litcoin';
		}
		else if($Vtliyspnydak=='XMR'){
			$Vtliyspnydak='Monero';
		}

		

		
		$Vypjulqujr2q=$this->db->where(array('plan_id' => $Veqmjvrkbugp))->get('tbl_plans')->row_array();
		$V3j2s2awamy5=date('Y-m-d');
		$Vloow0ofeahg=$Vypjulqujr2q['period'];
		$Va3uqpnchzks = $this->calculateMature($V3j2s2awamy5,$Vloow0ofeahg);
		if ($Va5zq3yanff3 >= 100 || $Va5zq3yanff3 == 2) {
			$Va5zq3yanff3_val='active';
			
			
		} else if ($Va5zq3yanff3 < 0) {
			$Va5zq3yanff3_val='new';
			
		} else {
			$Va5zq3yanff3_val='new';
			echo "payment status is pending";
			
		}
		
		if($Vcv5yluaeg2e!=''){
			$Vdbcc4kfryqk = $this->db->query("INSERT INTO `history`(`id`, `user_id`, `amount`, `type`, `description`, `date`, `payment_thro`, `no_withdraw`, `reference_number`, `transaction_id`, `status`) VALUES ('0','".$Vcv5yluaeg2e."','".$V431y4v0wtnk."','deposit','".$Va5zq3yanff3_text."','".date('Y-m-d H:i:s')."','".$Vtliyspnydak."','0','0','".$Vf1i3okfsfvx."','".$Va5zq3yanff3."')");
			$Vujjqtihuzdx=$this->db->where(array('transaction_id' => $Vf1i3okfsfvx))->get('deposit')->row_array();
			if(empty($Vujjqtihuzdx)){
				$Vdbcc4kfryqk = $this->db->query("INSERT INTO `deposit`(`deposit_id`, `member_id`, `plan_id`, `amount`, `compound_amount`, `invest_date`, `maturity_date`, `status`, `intrest_alloted`, `payment_thro`, `intrest_earned`, `intrest_earned_date`, `transaction_id`, `cron_date`, `compound_rate`) VALUES ('0','".$Vcv5yluaeg2e."','".$Veqmjvrkbugp."','".$V431y4v0wtnk."','".$V431y4v0wtnk."','".date('Y-m-d H:i:s')."','".$Va3uqpnchzks."','".$Va5zq3yanff3_val."','0','".$Vtliyspnydak."','0','0','".$Vf1i3okfsfvx."','".date('Y-m-d H:i:s')."', '".$Vrq4sirtaz32."')");
			}
			else{
				$this->db->query("UPDATE deposit SET status='".$Va5zq3yanff3_val."', cron_date='".date('Y-m-d H:i:s')."' where transaction_id='".$Vf1i3okfsfvx."'");
			}
		}
		
		if($Vdbcc4kfryqk)
		{
			if ($Va5zq3yanff3 >= 100 || $Va5zq3yanff3 == 2) {
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
						$Vflzvo5tdwgm=$this->config->item('ref_level_1');
						if($Vflzvo5tdwgm!=0){
							$this->get_levelcommission($Vabnhsh3i2yo,$Vzqszcbo4neu,1,$Vpxamdyeznwr,$Veqmjvrkbugp,$Vpxamdyeznwr);		
						}
					}
					exit();
				}
			}
		}
    }
	
	public function calculateMature($V4dtm5zzggg0,$Vloow0ofeahg)
    {
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
