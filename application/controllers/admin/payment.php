<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Payment extends Admin_Controller {

    public function __construct() {
        parent::__construct();
       
		$this->load->model('settings_model');
    }

	public function index() {
		$V1g4ukddiiis= Array(
			'perfect_money_member_id' , 
			'perfect_money_status' , 
			'perfect_money_account_id' , 
			'perfect_money_phrase_hash' , 
			'bitcoin_merchant_id' , 
			'coin_payments_status' , 
			'bitcoin_public_key' , 
			'bitcoin_private_key' , 
			'coin_payments_ipn_key' , 
			'payeer_shop_id' , 
			'payeer_status' , 
			'payeer_shop_secret_key' , 
			'payeer_account' , 
			'payeer_api_user' , 
			'payeer_api_secret' , 
			'advcash_email' , 
			'advcash_status' , 
			'advcash_sci_name' , 
			'advcash_sci_batch_key' , 
			'advcash_withdraw_email' , 
			'advcash_api_name' , 
			'advcash_api_password' , 
		
		);
		foreach($V1g4ukddiiis as $Vseq1edikdvg)
		{
			$Vtbdg0j2wx01 = $this->db->where('config_key', $Vseq1edikdvg)->get('tbl_config');
			$Vnqvn5nlut4s=$Vtbdg0j2wx01->result();
			$Vou4vxorrdoe[$Vnqvn5nlut4s[0]->config_key]=$Vnqvn5nlut4s[0]->value;
		}
		$Vou4vxorrdoe['title']='Payment Setting';
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/payment/index', $Vou4vxorrdoe, true);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    

    public function save_data() {

        $Vqzoklqdzo35 = $this->settings_model->array_from_post(array('bitcoin_status', 'bitcoin_title', 'withdraw_commission', 'bitcoin_comments', 'bitcoin_selectmode', 'bit_publickey', 'bit_privatekey', 'btc_code' ));
		
		foreach ($Vqzoklqdzo35 as $Vseq1edikdvg => $Vp4xjtpabm0l) {
			if($Vseq1edikdvg=='bitcoin_status'){
				if($Vp4xjtpabm0l==''){
					$Vp4xjtpabm0l=0;
				}
				else
				{
					$Vp4xjtpabm0l=1;
				}
			}
			
            $Vou4vxorrdoe = array('value' => $Vp4xjtpabm0l);
            $this->db->where('config_key', $Vseq1edikdvg)->update('tbl_config', $Vou4vxorrdoe);
            $Vdlhcakgj0dn = $this->db->where('config_key', $Vseq1edikdvg)->get('tbl_config');
            if ($Vdlhcakgj0dn->num_rows() == 0) {
                $this->db->insert('tbl_config', array("config_key" => $Vseq1edikdvg, "value" => $Vp4xjtpabm0l));
            }
        }
        $Vb0xezrtkohj = lang('save_payment_settings');
        $V4pigtpor0ln = 'success';
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
		redirect('admin/payment');
         
    }    
	
	
	public function save_payment_data() {
					
		$Vqzoklqdzo35 = $this->input->post();
		if(!$this->input->post('perfect_money_status')){
			$Vqzoklqdzo35['perfect_money_status'] = '0';
		}
		if(!$this->input->post('coin_payments_status')){
			$Vqzoklqdzo35['coin_payments_status'] = '0';
		}
		if(!$this->input->post('coin_payments_status')){
			$Vqzoklqdzo35['coin_payments_status'] = '0';
		}
		if(!$this->input->post('payeer_status')){
			$Vqzoklqdzo35['payeer_status'] = '0';
		}
		if(!$this->input->post('advcash_status')){
			$Vqzoklqdzo35['advcash_status'] = '0';
		}
		
		foreach ($Vqzoklqdzo35 as $Vseq1edikdvg => $Vp4xjtpabm0l) {
	
            $Vou4vxorrdoe = array('value' => $Vp4xjtpabm0l);
            $this->db->where('config_key', $Vseq1edikdvg)->update('tbl_config', $Vou4vxorrdoe);
            $Vdlhcakgj0dn = $this->db->where('config_key', $Vseq1edikdvg)->get('tbl_config');
            if ($Vdlhcakgj0dn->num_rows() == 0) {
                $this->db->insert('tbl_config', array("config_key" => $Vseq1edikdvg, "value" => $Vp4xjtpabm0l));
            }
        }
        $Vb0xezrtkohj = lang('save_payment_settings');
        $V4pigtpor0ln = 'success';
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
		redirect('admin/payment');
         
    }    

}
