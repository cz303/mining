<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Plan extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('plan_model');
    }

    public function plan_list($Vrrb21ym0qp1 = NULL, $Vwfsll4zanwn = NULL) {
        $Vypkzdoadnl3=array(
            '1'=>'Hourly',
            '2'=>'Daily',
            '3'=>'Weekly',
            '4'=>'Monthly',
            '5'=>'Yearly'
        );
        $Vttvc4msxnjm=array(
            '1'=>'Hour',
            '2'=>'Day',
            '3'=>'Week',
            '4'=>'Month',
            '5'=>'Year'
        );
        $Veqmjvrkbugp = $Vwfsll4zanwn;

        if ($Vrrb21ym0qp1 == 'edit_plan') {
			
           $this->plan_model->_table_name = 'tbl_plans'; 
            $this->plan_model->_order_by = 'plan_id';
            $Vou4vxorrdoe['plan_info'] = $this->plan_model->get_by(array('plan_id' => $Veqmjvrkbugp), true);
			$Vou4vxorrdoe['plan_id'] = $Vwfsll4zanwn;
            $Vou4vxorrdoe['active'] = '2';
        } else {
            $Vou4vxorrdoe['active'] = '1';
        }
        $Vou4vxorrdoe['title'] = 'Plan List';

        $this->plan_model->_table_name = 'tbl_plans'; 
        $this->plan_model->_order_by = 'plan_id';
        $Vou4vxorrdoe['all_plan_info'] = $this->plan_model->get();
        $Vou4vxorrdoe['period_type']=$Vttvc4msxnjm;
        $Vou4vxorrdoe['iperiod_type']=$Vypkzdoadnl3;
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/plan/plan_list', $Vou4vxorrdoe, true);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

  

    

    public function save_plan() {

        $Vypjulqujr2q = $this->input->post();
        $Veqmjvrkbugp = $this->input->post('plan_id', true);
        
        $Vdf3a5upds0t = array('plan_name' => $Vypjulqujr2q['plan_name']);
        
		
        if (!empty($Veqmjvrkbugp)) { 
            $V3f5esxrtq1d = array('plan_id !=' => $Veqmjvrkbugp);
        } else { 
            $V3f5esxrtq1d = null;
        }
        
        $V2qoyz3gt53l = $this->plan_model->check_update('tbl_plans', $Vdf3a5upds0t, $V3f5esxrtq1d);
        if (!empty($V2qoyz3gt53l)) { 
            if (!empty($V2qoyz3gt53l)) {
                $Vyrkodvljby0 = $Vypjulqujr2q['plan_name'];
            }
            
            $V4pigtpor0ln = 'error';
            $Vb0xezrtkohj = "<strong style='color:#000'>" . $Vyrkodvljby0 . '</strong>  ' . lang('already_exist');
        } else { 
            $Vet23zymsgv4=array('interest_type', 'release_status');
            foreach($Vet23zymsgv4 as $Vseq1edikdvg){
                if(isset($Vypjulqujr2q[$Vseq1edikdvg])){
                   $Vypjulqujr2q[$Vseq1edikdvg]=1; 
                }
                else{
                   $Vypjulqujr2q[$Vseq1edikdvg]=0; 
                }
            }

            $this->plan_model->_table_name = 'tbl_plans'; 
            $this->plan_model->_primary_key = 'plan_id'; 
			
			
			
            if (!empty($Veqmjvrkbugp)) {
                $Vwfsll4zanwn = $this->plan_model->save($Vypjulqujr2q, $Veqmjvrkbugp);
            } else {
                $Vwfsll4zanwn = $this->plan_model->save($Vypjulqujr2q);
            }

            if (!empty($Veqmjvrkbugp)) {
                $Vb0xezrtkohj = lang('update_plan_info');
            } else {
                $Vb0xezrtkohj = lang('save_plan_info');
            }
            $V4pigtpor0ln = 'success';
        }
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
		redirect('admin/plan/plan_list');
         
    }

    

    public function delete_plan($Vwfsll4zanwn = null) {
        if (!empty($Vwfsll4zanwn)) {
			 $this->plan_model->_table_name = 'tbl_plans'; 
            $this->plan_model->_order_by = 'plan_id';
            $Vawpne0kjtuy = $this->plan_model->get_by(array('plan_id' => $Vwfsll4zanwn), true);
			if(!empty($Vawpne0kjtuy)){	
				$this->plan_model->_table_name = 'tbl_plans';
				$this->plan_model->delete_multiple(array('plan_id' => $Vwfsll4zanwn));
				
				$V4pigtpor0ln = 'success';
				$Vb0xezrtkohj = 'Plan Delete Successfully!';
			   
				
			} else {
				
				$V4pigtpor0ln = 'error';
				$Vb0xezrtkohj = 'Sorry this plan not find in database!';
			}  
		}
		else
		{
			$V4pigtpor0ln = 'error';
			$Vb0xezrtkohj = 'Please choose a plan to delete!';
		}
		set_message($V4pigtpor0ln, $Vb0xezrtkohj);
		redirect('admin/plan/plan_list');				
    } 

}
