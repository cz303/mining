<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Calculateplan extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('plan_model');
    }
    public function index($Vwk2nao2d33x = 0) {
        $this->plan_model->_table_name = 'tbl_plans'; 
        $this->plan_model->_order_by = 'power';
        $V5kj2psgzsyp = $this->plan_model->get();

        $Vd5mgesqkq2x = array();
        $Vytbsuz3c5qz = count($V5kj2psgzsyp);
        $Vfhiq1lhsoja = 0;
        for(;$Vfhiq1lhsoja < $Vytbsuz3c5qz; $Vfhiq1lhsoja++){
            $Vd5mgesqkq2x[] = array(
                            'from'   => $V5kj2psgzsyp[$Vfhiq1lhsoja]->power,
                            'to'   => array_key_exists($Vfhiq1lhsoja+1, $V5kj2psgzsyp)?$V5kj2psgzsyp[$Vfhiq1lhsoja+1]->power:'',
                            'price' => $V5kj2psgzsyp[$Vfhiq1lhsoja]->price,
                        );
        }
        $Vkm3p3c3xg1w = false;
        $Vkm3p3c3xg1wPrice = 0;
        foreach($Vd5mgesqkq2x as $Vi3y3l1uvwp3){
            if($Vwk2nao2d33x > $Vi3y3l1uvwp3['from']-1){
                $Vkm3p3c3xg1wPrice =  $Vi3y3l1uvwp3['price'];
            }
        }
        $Vvcuyzttbjqk = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=".($Vwk2nao2d33x*$Vkm3p3c3xg1wPrice));
        echo $Vwk2nao2d33x*$Vkm3p3c3xg1wPrice.",".$Vvcuyzttbjqk;
	}
}	
