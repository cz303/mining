<?php
session_start();
/**
 * Description of MY_Controller
 *
 */
class MY_Controller extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('admin_model');
        $this->load->model('global_model');
        messages_helper();
        $this->payments->messages_helper();
        $Vzptpiyqx42v = $this->session->userdata("lang") == null ? "english" : $this->session->userdata("lang");
        $this->lang->load($Vzptpiyqx42v, $Vzptpiyqx42v);
        
        $Vro4ory0b1e5 = $this->uri->segment(1);
        $Vp41snhueuhp = $this->uri->segment(2);
        $Vjpnogcupvwh = $this->uri->segment(3);
        $Vjxxz0rhsdzb = $this->uri->segment(4);
        if ($Vjpnogcupvwh) {
            $Vjpnogcupvwh = '/' . $Vjpnogcupvwh;
        }
        if ($Vjxxz0rhsdzb) {
            $Vjxxz0rhsdzb = '/' . $Vjxxz0rhsdzb;
        }
        $Vpkuddwy345n = $Vro4ory0b1e5 . '/' . $Vp41snhueuhp . $Vjpnogcupvwh . $Vjxxz0rhsdzb;
        $V25t3phxeyfj['menu_active_id'] = $this->admin_model->select_menu_by_uri($Vpkuddwy345n);
        $V25t3phxeyfj['menu_active_id'] == false || $this->session->set_userdata($V25t3phxeyfj);
        $this->admin_model->_table_name = "tbl_config"; 
        $this->admin_model->_order_by = "config_key";
        $Vxwnqza2lotb = $this->admin_model->get();
        foreach ($Vxwnqza2lotb as $Vktvhhrmd1wv) {
            $this->config->set_item($Vktvhhrmd1wv->config_key, $Vktvhhrmd1wv->value);
        }
        date_default_timezone_set(config_item('timezone'));
    }
}

class Admin_Controller extends MY_Controller {
    function __construct() {
        parent::__construct();		
        $this->load->model('global_model');
        $this->load->model('admin_model');
        $V4pigtpor0ln = $this->session->userdata('user_type');
        if ($V4pigtpor0ln == 1) {
            $this->admin_model->_table_name = "tbl_menu"; 
            $this->admin_model->_order_by = "menu_id";
            $_SESSION["user_roll"] = $this->admin_model->get();
        } else {
            $Vamx3m1uwd0i = $this->session->userdata('user_id');
            $_SESSION["user_roll"] = $this->global_model->select_user_roll($Vamx3m1uwd0i);
        }
        
        $Vejmaqrdxkdj = $this->session->userdata('user_flag');
        if (!empty($Vejmaqrdxkdj)) {
            if ($Vejmaqrdxkdj != '1') {
                $Vbfatyoohaps = $this->session->userdata('url');
                redirect($Vbfatyoohaps);
            }
        } else {
            redirect('locked');
        }
    }
}

class Client_Controller extends MY_Controller {

    function __construct() {
        parent::__construct();
        $Vejmaqrdxkdj = $this->session->userdata('user_flag');
        if (!empty($Vejmaqrdxkdj)) {
            if ($Vejmaqrdxkdj != 2) {
                $Vbfatyoohaps = $this->session->userdata('url');
                redirect($Vbfatyoohaps);
            }
        } else {
            redirect('locked');
        }
    }

}