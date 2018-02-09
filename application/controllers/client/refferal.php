<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Refferal extends Client_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('settings_model');
    }

    public function index() {
       	$Vou4vxorrdoe['breadcrumbs'] = 'Refferals';
        $Vou4vxorrdoe['title'] = 'Refferals';
        $Vou4vxorrdoe['page'] = 'refferal';
		$Veabrhmundbi=array();
		$Vvkj5mcm1x1j=array();
		$Vqrs4vei1afv=array();
		$Vfmxwckxoadi=array();
		$Vlm5h5q35hnj=array();
		$Vlgcbuwt3pp4= $this->session->userdata('user_id');

		$this->db->select('refer_id');
		$this->db->from('tbl_account_details');
        $this->db->where('tbl_account_details.user_id', $Vlgcbuwt3pp4);
        $Vtbdg0j2wx01 = $this->db->get();
        $Vwbpa3giaw5f = $Vtbdg0j2wx01->row_array();
		$Vou4vxorrdoe['refferal_link']=base_url().'login/register/'.$Vwbpa3giaw5f['refer_id'];		
		
		$this->db->select('user_id');
		$Vzwf3gdjzgoo = $this->db->get_where('tbl_account_details', array('intro_id' => $Vlgcbuwt3pp4))->result_array();
        $V1penc5wbp1k[1] = count($Vzwf3gdjzgoo);
		
		foreach ($Vzwf3gdjzgoo as $Vugbfqh4qkcs) {
			$Veabrhmundbi[]=$Vugbfqh4qkcs['user_id'];
		}
		
		$Vn3pnmnxcxq4=0;
		foreach ($Veabrhmundbi as $Vpxamdyeznwr) {
			$this->db->select('user_id');
			$Vspsgsis1c0f = $this->db->get_where('tbl_account_details', array('intro_id' => $Vpxamdyeznwr))->result_array();
			$Vn3pnmnxcxq4+=count($Vspsgsis1c0f);
			foreach($Vspsgsis1c0f as $Vl0qsn21hxsu){
				$Vvkj5mcm1x1j[]=$Vl0qsn21hxsu['user_id'];
			}
			
		}
		$V1penc5wbp1k[2] = $Vn3pnmnxcxq4;
		
		$Vlugrwu4p4es=0;
		foreach($Vvkj5mcm1x1j as $Vpxamdyeznwr){
			$this->db->select('user_id');
			$Vspsgsis1c0f = $this->db->get_where('tbl_account_details', array('intro_id' => $Vpxamdyeznwr))->result_array();
			$Vlugrwu4p4es+=count($Vspsgsis1c0f);
			foreach($Vspsgsis1c0f as $Vio0wkvv3cyu){
				$Vqrs4vei1afv[]=$Vio0wkvv3cyu['user_id'];
			}
		}
		$V1penc5wbp1k[3] = $Vlugrwu4p4es;
		
		$Vxgr3cffpfbi=0;
		foreach($Vqrs4vei1afv as $Vpxamdyeznwr){
			$this->db->select('user_id');
			$Vspsgsis1c0f = $this->db->get_where('tbl_account_details', array('intro_id' => $Vpxamdyeznwr))->result_array();
			$Vxgr3cffpfbi+=count($Vspsgsis1c0f);
			foreach($Vspsgsis1c0f as $Vocbf5lkal1p){
				$Vfmxwckxoadi[]=$Vocbf5lkal1p['user_id'];
			}
		}
		$V1penc5wbp1k[4] = $Vxgr3cffpfbi;
		
		$Vf5zr0uxm3ty=0;
		foreach($Vfmxwckxoadi as $Vpxamdyeznwr){
			$this->db->select('user_id');
			$Vspsgsis1c0f = $this->db->get_where('tbl_account_details', array('intro_id' => $Vpxamdyeznwr))->result_array();
			$Vf5zr0uxm3ty+=count($Vspsgsis1c0f);
		}
		$V1penc5wbp1k[5] = $Vf5zr0uxm3ty;
		
		$Vou4vxorrdoe['active_user']=$V1penc5wbp1k;
		
		$Vtvb5hltrfj4=0;
		foreach($V1penc5wbp1k as $Vrkqkdu41kaj){
			$Vtvb5hltrfj4+=$Vrkqkdu41kaj;
		}
		
		$this->db->select('sum(amount) as balance_coin');
		$V3endnju4etk = $this->db->get_where('history', array('user_id' => $Vlgcbuwt3pp4, 'type' => 'commissions'))->row_array();
		$Vnnxqelt0cug=$V3endnju4etk['balance_coin'];
		if($Vnnxqelt0cug=='NULL' || $Vnnxqelt0cug==''){
			$Vnnxqelt0cug='0.00';
		}
		$Vou4vxorrdoe['refferal_commsission']=format_money($Vnnxqelt0cug);		
		
		$this->db->select('history.*, tbl_users.username, tbl_account_details.fullname');
		$this->db->from('history');
		$this->db->join('tbl_account_details', 'history.user_id = tbl_account_details.user_id', 'left');
		$this->db->join('tbl_users', 'tbl_users.user_id = tbl_account_details.user_id', 'left');
        $this->db->where('history.user_id', $Vlgcbuwt3pp4);
        $this->db->where('history.type', 'commissions');
		
        $Vtbdg0j2wx01 = $this->db->get();
		$V3endnju4etk_sheet = $Vtbdg0j2wx01->result_array();
		$Vou4vxorrdoe['balance_sheet']=$V3endnju4etk_sheet;
		
		$Vou4vxorrdoe['total_refferal']=$Vtvb5hltrfj4;
        $Vou4vxorrdoe['subview'] = $this->load->view('client/refferal', $Vou4vxorrdoe, TRUE);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }
}