<?php

class Admin_Model extends MY_Model {

    public $_table_name;
    public $_order_by;
    public $_primary_key;

    public function select_menu_by_uri($uriSegment) {

        $this->db->select('tbl_menu.*', FALSE);
        $this->db->from('tbl_menu');
        $this->db->where('link', $uriSegment);
        $query_result = $this->db->get();
       
        if ($query_result->num_rows()>0) {			$result = $query_result->row();
            $menuId[] = $result->menu_id;
            $menuId = $this->select_menu_by_id($result->parent, $menuId);
        } else {

            return false;
        }
        if (!empty($menuId)) {
            $lastId = end($menuId);
            $parrent = $this->select_menu_first_parent($lastId);
            array_push($menuId, $parrent->parent);
            return $menuId;
        }
    }

    public function select_menu_by_id($id, $menuId) {
        $this->db->select('tbl_menu.*', FALSE);
        $this->db->from('tbl_menu');
        $this->db->where('menu_id', $id);
        $query_result = $this->db->get();
        $result = $query_result->row();
        if (count($result)) {
            array_push($menuId, $result->menu_id);
            if ($result->parent != 0) {
                $result = self::select_menu_by_id($result->parent, $menuId);
            }
        }
        return $menuId;
    }

    public function select_menu_first_parent($lastId) {
        $this->db->select('tbl_menu.*', FALSE);
        $this->db->from('tbl_menu');
        $this->db->where('menu_id', $lastId);
        $query_result = $this->db->get();
        $result = $query_result->row();
        return $result;
    }

    public function get_transactions_list_by_date($type, $start_date, $end_date) {
        $this->db->select('tbl_transactions.*', FALSE);
        $this->db->from('tbl_transactions');
        $this->db->where('type', $type);
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function get_transactions_list_by_month($start_date, $end_date) {
        $this->db->select('tbl_transactions.*', FALSE);
        $this->db->from('tbl_transactions');
        $this->db->where('date >=', $start_date);
        $this->db->where('date <=', $end_date);
        $query_result = $this->db->get();
        $result = $query_result->result();
        return $result;
    }

    public function calculate_amount($year, $month) {
        $amount = $this->db->select_sum('amount')
                        ->where(array('month_paid' => $month, 'year_paid' => $year))
                        ->get('tbl_payments')
                        ->row()->amount;
        return ($amount > 0) ? $amount : 0;
    }

    public function check_user_name($user_name, $user_id) {
        $this->db->select('tbl_users.*', false);
        $this->db->from('tbl_users');
        if ($user_id) {
            $this->db->where('user_id !=', $user_id);
        }
        $this->db->where('username', $user_name);
        $query_result = $this->db->get();
        $result = $query_result->row();

        return $result;
    }
	
	public function count_members($delimiter= 'all') {
        if($delimiter == 'active'){
			$this->db->where(array('activated'=>'1','banned' =>'0'));
		}
		if($delimiter == 'deactived'){
			$this->db->where(array('activated'=>'0','banned' =>'0'));
		}
		if($delimiter == 'banned'){
			$this->db->where(array('banned' =>'1'));
		}
		$member_count = $this->db->count_all_results('tbl_users');
        if($member_count == NULL){
			$member_count = 0;
		}
        return $member_count;
    }
	
	public function count_plans() {
        
		$total_plan = $this->db->count_all_results('tbl_plans');
        if($total_plan == NULL){
			$total_plan = 0;
		}
        return $total_plan;
    }
	
	public function cal_all_member_bal() {
        $this->db->select('sum(amount) as earning_amount_sum');
		$this->db->where(array('type'=>'intrest_earned'));
		$db_result = $this->db->get('history');
		$data['total_earned'] = $db_result->row()->earning_amount_sum;
		
		#total_withdraw				
		$this->db->select('sum(amount) as total_withdraw');
		$this->db->where(array('type'=>'withdrawal'));
		$db_result = $this->db->get('history');
		$data['total_withdraw'] = $db_result->row()->total_withdraw;
		
		#total_withdraw_requets				
		$this->db->select('sum(amount) as total_withdraw_requets');
		$this->db->where(array('type'=>'withdraw_pending'));
		$db_result = $this->db->get('history');
		$data['total_withdraw_requets'] = $db_result->row()->total_withdraw_requets;
		
		#active_deposit				
		$this->db->select('sum(amount) as active_deposit');
		$this->db->where(array('status'=>'active'));
		$db_result = $this->db->get('deposit');
		$data['total_active_deposit'] = ($db_result->row()->active_deposit==NuLL)?0:$db_result->row()->active_deposit;;
		
		
		#total_commissions				
		$this->db->select('sum(amount) as total_commissions');
		$this->db->where(array('type'=>'commissions'));
		$db_result = $this->db->get('history');
		$data['total_commissions'] = $db_result->row()->total_commissions;
		
		
		#total_bonus				
		$this->db->select('sum(amount) as total_bonus');
		$this->db->where(array('type'=>'bonus'));
		$db_result = $this->db->get('history');
		$data['total_bonus'] = $db_result->row()->total_bonus;
		
		#total_penality				
		$this->db->select('sum(amount) as total_penality');
		$this->db->where(array('type'=>'penality'));
		$db_result = $this->db->get('history');
		$data['total_penality'] = $db_result->row()->total_penality;
		
		foreach($data as $key=>$val){
			if($val== NULL){
				$data[$key] = 0.00;
			}else{
				$data[$key] = (float)$val;
			}
		}

		/*$data['total_balence'] = $data['total_earned']
								+$data['total_bonus']
								+$data['total_commissions']
								-$data['total_penality']
								-$data['total_withdraw'];	*/
		$data['total_balence'] = $data['total_active_deposit']-$data['total_withdraw'];
			
		return $data;
    }
	
	public function cal_total_bal_in_out($delimiter = 'total') {
        
		#cal in amount
		if($delimiter== 'today'){
			$start_date = date('Y-m-d 00:00:00');
			$end_date = date('Y-m-d H:i:s',strtotime(date('Y-m-d').' +1 day -1 sec'));
		}else if($delimiter== 'this_weak'){
			$start_date = date('Y-m-d H:i:s',strtotime(date('Y-m-d').' -6 day'));;
			$end_date = date('Y-m-d H:i:s',strtotime(date('Y-m-d').' +1 day -1 sec'));
		}else if($delimiter== 'this_month'){
			$start_date = date('Y-m-01 00:00:00');
			$end_date = date('Y-m-d H:i:s',strtotime(date('Y-m-d').' +1 day -1 sec'));
		}else if($delimiter== 'this_year'){
			$start_date = date('Y-01-01 00:00:00');
			$end_date = date('Y-m-d H:i:s',strtotime(date('Y-m-d').' +1 day -1 sec'));
		}
		if($delimiter != 'total'){
			$this->db->where("(date(invest_date) >= '$start_date' AND date(invest_date) <= '$end_date')");
		}
		$this->db->select('sum(amount) as total_in_ammount');
		$this->db->where("(status ='active')");
		$total_in_ammount = $this->db->get('deposit')->row()->total_in_ammount;
		
		/*echo $this->db->last_query();
		echo '<br/>';
		echo '<br/>';
		*/
		if($total_in_ammount == NULL){
			$total_in_ammount = 0.00;
		}
		
		
		#cal out amount
		if($delimiter== 'today'){
			$start_date = date('Y-m-d 00:00:00');
			$end_date = date('Y-m-d H:i:s',strtotime(date('Y-m-d').' +1 day -1 sec'));
		}else if($delimiter== 'this_weak'){
			$start_date = date('Y-m-d H:i:s',strtotime(date('Y-m-d').' -6 day'));;
			$end_date = date('Y-m-d H:i:s',strtotime(date('Y-m-d').' +1 day -1 sec'));
		}else if($delimiter== 'this_month'){
			$start_date = date('Y-m-01 00:00:00');
			$end_date = date('Y-m-d H:i:s',strtotime(date('Y-m-d').' +1 day -1 sec'));
		}else if($delimiter== 'this_year'){
			$start_date = date('Y-01-01 00:00:00');
			$end_date = date('Y-m-d H:i:s',strtotime(date('Y-m-d').' +1 day -1 sec'));
		}
		if($delimiter != 'total'){
			$this->db->where("(date >= '$start_date' AND date <= '$end_date')");
		}
		$this->db->select('sum(amount) as total_out_ammount');
		$this->db->where("(type ='withdrawal')");
		$total_out_ammount = $this->db->get('history')->row()->total_out_ammount;
		
		if($total_out_ammount == NULL){
			$total_out_ammount = 0.00;
		}
		
		
		$data['total_in_ammount'] = $total_in_ammount;
		$data['total_out_ammount'] = $total_out_ammount;
		$data['total_inout_ammount'] = $total_in_ammount - $total_out_ammount;
		
        return $data;
    }
	
}
