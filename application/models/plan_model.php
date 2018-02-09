<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

/*
 * 	@author : themetic.net
 * 	date	: 21 April, 2015
 * 	Inventory & Invoice Management System
 * 	http://themetic.net
 *  version: 1.0
 */

class Plan_Model extends MY_Model {

    public $_table_name;
    public $_order_by;
    public $_primary_key;

    public function select_plan_by_id($user_id) {
        $this->db->select('tbl_plans.*', false);
        $this->db->select('pay_period.*', false);
        $this->db->select('pay_period.*', false);
        $this->db->from('tbl_plans');
        $this->db->join('pay_period', 'tbl_plans.period_type  = pay_period.pay_period_id', 'left');
        $this->db->where('tbl_plans.plan_id', $user_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

    public function get_new_plan() {
        $post = new stdClass();
        $post->plan_name = '';

        return $post;
    }

}
