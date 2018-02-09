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

class Price_Model extends MY_Model {

    public $_table_name;
    public $_order_by;
    public $_primary_key;

    public function select_price_by_id($price_id) {
        $this->db->select('*', false);
        $this->db->from('tbl_price');
        $this->db->where('tbl_price.price_id', $price_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

    public function get_new_price() {
        $post = new stdClass();
        $post->plan_name = '';

        return $post;
    }

}
