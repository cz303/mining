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

class User_Model extends MY_Model {

    public $_table_name;
    public $_order_by;
    public $_primary_key;


    public function get_new_user() {
        $post = new stdClass();
        $post->user_name = '';
        $post->name = '';
        $post->email = '';
        $post->flag = 3;
        $post->employee_login_id = '';

        return $post;
    }
	
	
	public function get_list_of_testimonials() {
        $this->db->select('tbl_test.*,tbl_acc.fullname,tbl_acc.avatar');
		$this->db->order_by('tbl_test.testimonial_id','desc');
		$this->db->join('tbl_account_details as tbl_acc','tbl_acc.user_id = tbl_test.testimonial_user_id');
		$db_result = $this->db->get_where('tbl_testimonial as tbl_test',array('tbl_test.testimonial_status'=>'1'));
		if($db_result && $db_result->num_rows()>0){
			return $db_result->result_array();
		}else{
			return false;
		}
    }
}
