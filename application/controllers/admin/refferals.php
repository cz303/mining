<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Refferals extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('settings_model');
    }

    public function index() {
    	$Veuazwwxbqbp=array();
    	for($Vfhiq1lhsoja=1;$Vfhiq1lhsoja<6;$Vfhiq1lhsoja++){
    		$Veuazwwxbqbp[]='ref_level_'.$Vfhiq1lhsoja;
    	}
		$V1g4ukddiiis=$Veuazwwxbqbp;
		foreach($V1g4ukddiiis as $Vseq1edikdvg)
		{
			$Vtbdg0j2wx01 = $this->db->where('config_key', $Vseq1edikdvg)->get('tbl_config');
			$Vnqvn5nlut4s=$Vtbdg0j2wx01->result();
			$Vou4vxorrdoe[$Vnqvn5nlut4s[0]->config_key]=$Vnqvn5nlut4s[0]->value;
		}
		$Vou4vxorrdoe['title']='Affiliate Level Setting';
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/refferals/index', $Vou4vxorrdoe, true);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    

    public function save_data() {
    	$Veuazwwxbqbp=array();
    	for($Vfhiq1lhsoja=1;$Vfhiq1lhsoja<6;$Vfhiq1lhsoja++){
    		$Veuazwwxbqbp[]='ref_level_'.$Vfhiq1lhsoja;
    	}
        $Vfhiq1lhsojanput_data = $this->settings_model->array_from_post($Veuazwwxbqbp);
        
        foreach ($Vfhiq1lhsojanput_data as $Vseq1edikdvg => $Vp4xjtpabm0l) {
            $Vou4vxorrdoe = array('value' => ($Vp4xjtpabm0l/100));
            $this->db->where('config_key', $Vseq1edikdvg)->update('tbl_config', $Vou4vxorrdoe);
            $Vdlhcakgj0dn = $this->db->where('config_key', $Vseq1edikdvg)->get('tbl_config');
            if ($Vdlhcakgj0dn->num_rows() == 0) {
                $this->db->insert('tbl_config', array("config_key" => $Vseq1edikdvg, "value" => ($Vp4xjtpabm0l/100)));
            }
        }
        $Vb0xezrtkohj = lang('save_affiliate_level_settings');
        $V4pigtpor0ln = 'success';
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
		redirect('admin/refferals');
         
    }
}
