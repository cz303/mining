<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Calculate extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('plan_model');
    }
    public function index($val = 0) {
        $this->plan_model->_table_name = 'tbl_plans'; //table name
        $this->plan_model->_order_by = 'power';
        $all_plan_info = $this->plan_model->get();

        $arr = array();
        $count = count($all_plan_info);
        $i = 0;
        for(;$i < $count; $i++){
            $arr[] = array(
                            'from'   => $all_plan_info[$i]->power,
                            'to'   => array_key_exists($i+1, $all_plan_info)?$all_plan_info[$i+1]->power:'',
                            'price' => $all_plan_info[$i]->price,
                        );
        }
        $curr = false;
        $currPrice = 0;
        foreach($arr as $a){
            if($val > $a['from']-1){
                $currPrice =  $a['price'];
            }
        }
        $priceOfYourItemBTC = file_get_contents("https://blockchain.info/tobtc?currency=USD&value=".($val*$currPrice));
        echo $val*$currPrice.",".$priceOfYourItemBTC;
	}




    function calculate_plan($planid, $compount){

        
            $fetch = $this->db->get_where("tbl_plans", array('plan_id'  =>$planid))->row_array();

            
            
            
            $initial_amount = $fetch['plan_min_amt'];
            
            $amount = $fetch['plan_max_amt'];
            
            $interest = $fetch['max_interest'];
            
            $matured_status = $fetch['interest_type'];
            
            $min_amount = $fetch['plan_min_amt'];
            
            $pricipal_return = $fetch['release_status'];
            
            $period_type = $fetch['period_type'];
					  $iperiod_type = $fetch['iperiod_type'];
            
        $period_type_arr=array(
            '1'=>'Hour',
            '2'=>'Day',
            '3'=>'Week',
            '4'=>'Month',
            '5'=>'Year'
        );
		
		$iperiod_type_arr=array(
            '1'=>'Hourly',
            '2'=>'Daily',
            '3'=>'Weekly',
            '4'=>'Monthly',
            '5'=>'Yearly'
        );

        $iperiods_status=$iperiod_type_arr[$iperiod_type];
        $periods_status=$period_type_arr[$period_type];
            
            
            if($matured_status == '2')
            {
                $matured_status_msg = '( After Matured )';
                
                $days = 1;
            }
            else
            {
                $matured_status_msg = '';
                
                $days = $fetch['period'];
            }
            
            
            
            
            
            $profit = 0;
            
            $i = 1;
            
            while($i <= $days)
            {
                $result = $amount * $interest /100;
                
                $compounding = ($result * $compount) / 100;
                
                $amount = $amount + $compounding; 
                
                $interest_amount = $result -  $compounding;
                
                $profit = $profit + $interest_amount;
                
                $i++;
            }
            
                $profit = $profit;  
                
                //$principal_amount = $amount + $profit;            
            
            
            
            if($pricipal_return == 'on')
            {
                               
                $total_returns = $amount + $profit; 
            }
            else
            {
                                
                $total_returns = $profit;
            }
           
            $investment_length = $fetch['period'].'&nbsp;'.$iperiods_status;
             $interest_length = $fetch['max_interest'];
            if($total_returns=='')
            {
                $total_returns=0;
            }
            if($profit=='')
            {
                $profit=0;
            }
                         
            echo $fetch['plan_max_amt'].'|'.$min_amount.'|'.$interest_length.'|'.$investment_length.'|'.number_format($total_returns,2,'.','').'|'.number_format($profit,2,'.','').'|'.$matured_status_msg;exit;
     
    }

    function calculate_plan_amt($planid, $amt, $interest){
        $fetch = $this->db->get_where("tbl_plans", array('plan_id'  =>$planid))->row_array();
					  $initial_amount = $amt;
					  $amount = $amt;
					  $interest = $fetch['max_interest'];
					  $matured_status = $interest;
					  $min_amount = $fetch['plan_min_amt'];
					  $pricipal_return = $fetch['release_status'];
					  $period_type = $fetch['period_type'];
					  $iperiod_type = $fetch['iperiod_type'];
            
        $period_type_arr=array(
            '1'=>'Hour',
            '2'=>'Day',
            '3'=>'Week',
            '4'=>'Month',
            '5'=>'Year'
        );
		
		$iperiod_type_arr=array(
            '1'=>'Hourly',
            '2'=>'Daily',
            '3'=>'Weekly',
            '4'=>'Monthly',
            '5'=>'Yearly'
        );

        $iperiods_status=$iperiod_type_arr[$iperiod_type];
        $periods_status=$period_type_arr[$period_type];
       if($matured_status == '2')
            {
                $matured_status_msg = '( After Matured )';
                
                $days = 1;
            }
            else
            {
                $matured_status_msg = '';
                
                $days = $fetch['period'];
            }
            
            
            if($pricipal_return == 'on')
            {
                $calinterest = $amount * $interest / 100 ;
                
                $profit = $calinterest *  $days;
                
                $total_returns = $amount + $profit;
            }
            else
            {
                $calinterest = $amount * $interest / 100 ;
                
                $profit = $calinterest *  $days;
                
                $total_returns = $profit;
            }
            
             $investment_length = $fetch['period'].'&nbsp;'.$iperiods_status;
             $interest_length = $fetch['max_interest'];
                 
                   echo $amt.'|'.$min_amount.'|'.$interest_length.'|'.$investment_length.'|'.number_format($total_returns,2).'|'.number_format($profit,2).'|'.$matured_status_msg;exit;
       }  

     function calculate_compound($planid, $amt, $compound){

        
		$fetch = $this->db->get_where("tbl_plans", array('plan_id'  =>$planid))->row_array();
		$initial_amount = $amt;
        $amount = $amt;
        $interest = $fetch['max_interest'];
        $profit = 0;
        $days = $fetch['period']; 
        $i = 1;
       
        while($i <= $days)
        {
            $result = $amount * $interest /100;
            $compounding = ($result * $compound) / 100;
            $amount = $amount + $compounding; 
            $interest_amount = $result -  $compounding;
            $profit = $profit + $interest_amount;
            $i++;
        }
      
        if($profit==''){
            $profit=0;
        }
        $principal_amount = $initial_amount + $profit;
        echo number_format($principal_amount, 2, '.', '').'|'.number_format($profit, 2, '.', '');exit;

     }           
}	
