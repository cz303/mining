<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Global_Controller extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('global_model');
        $this->load->model('admin_model');

	}

    

    public function check_current_password($Vwk2nao2d33x) {
        $Vsnnardgofbr = $this->hash($Vwk2nao2d33x);
        $V35uywc3c02g = $this->admin_model->check_by(array('password' => $Vsnnardgofbr), 'tbl_users');
        $Vwbpa3giaw5f = NULL;
        if (empty($V35uywc3c02g)) {
            $Vwbpa3giaw5f = '<small style="padding-left:10px;color:red;font-size:10px">Your Entered Password Do Not Match !<small>';
        }
        echo $Vwbpa3giaw5f;
    }

    public function check_existing_user_name($Vury3gkktczg, $Vpxamdyeznwr = null) {
        $Vwbpa3giaw5f = $this->admin_model->check_user_name($Vury3gkktczg, $Vpxamdyeznwr);
        if ($Vwbpa3giaw5f) {
            echo 'This User Name is Exist!';
        }
    }

    public function hash($Vlkger5ehs4w) {
        return hash('sha512', $Vlkger5ehs4w . config_item('encryption_key'));
    }

}
