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

class Reffer_Model extends MY_Model {

    public $_table_name;
    public $_order_by;
    public $_primary_key;

    public function select_reffer_by_id($reffer_id) {
        $this->db->select('*', false);
        $this->db->from('tbl_reffer');
        $this->db->where('tbl_reffer.reffer_id', $reffer_id);
        $query_result = $this->db->get();
        $result = $query_result->result();

        return $result;
    }

}
