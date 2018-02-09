<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Payout extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('settings_model');
    }

    public function index() {
		$V1g4ukddiiis=array('withdraw_minimum', 'withdraw_maximum', 'withdraw_allow_month');
		foreach($V1g4ukddiiis as $Vseq1edikdvg)
		{
			$Vtbdg0j2wx01 = $this->db->where('config_key', $Vseq1edikdvg)->get('tbl_config');
			$Vnqvn5nlut4s=$Vtbdg0j2wx01->result();
			$Vou4vxorrdoe[$Vnqvn5nlut4s[0]->config_key]=$Vnqvn5nlut4s[0]->value;
		}
		$Vou4vxorrdoe['title']='Payout Setting';
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/payout/index', $Vou4vxorrdoe, true);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    

    public function save_data() {        $Vqzoklqdzo35 = $this->settings_model->array_from_post(array('withdraw_minimum', 'withdraw_maximum', 'withdraw_allow_month'));
        foreach ($Vqzoklqdzo35 as $Vseq1edikdvg => $Vp4xjtpabm0l) {
            $Vou4vxorrdoe = array('value' => $Vp4xjtpabm0l);
            $this->db->where('config_key', $Vseq1edikdvg)->update('tbl_config', $Vou4vxorrdoe);
            $Vdlhcakgj0dn = $this->db->where('config_key', $Vseq1edikdvg)->get('tbl_config');
            if ($Vdlhcakgj0dn->num_rows() == 0) {
                $this->db->insert('tbl_config', array("config_key" => $Vseq1edikdvg, "value" => $Vp4xjtpabm0l));
            }
        }				
         $Vb0xezrtkohj = "Withdraw Amount has been Updated";
         $V4pigtpor0ln = 'success';
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);		
		redirect('admin/payout');
         
    }
}
