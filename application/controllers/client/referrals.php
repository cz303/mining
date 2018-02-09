<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Referrals extends Client_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('settings_model');
    }

    public function index() {
        $Vou4vxorrdoe['breadcrumbs'] = "Buy";
        $Vou4vxorrdoe['title'] = 'Buy Plans';
        $Vou4vxorrdoe['page'] = 'buy';
        $Vou4vxorrdoe['subview'] = $this->load->view('client/referrals', $Vou4vxorrdoe, TRUE);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }
   
}
