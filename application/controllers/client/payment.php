<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Payment extends Client_Controller {

    public function __construct() {
        
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('settings_model');
    }

    public function index() {
        redirect('client/dashboard');
    }
    public function transactions() {
        $Vou4vxorrdoe['breadcrumbs'] = "Transactions";
        $Vou4vxorrdoe['title'] = 'My Transactions';
        $Vou4vxorrdoe['page'] = 'transactions';
        $Vou4vxorrdoe['subview'] = $this->load->view('client/transactions', $Vou4vxorrdoe, TRUE);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }
    public function repayment() {
        $Vou4vxorrdoe['breadcrumbs'] = "Repayment";
        $Vou4vxorrdoe['title'] = 'Repayments';
        $Vou4vxorrdoe['page'] = 'repayment';
        $Vou4vxorrdoe['subview'] = $this->load->view('client/repayment', $Vou4vxorrdoe, TRUE);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }
    public function payment_settings() {
        $Vou4vxorrdoe['breadcrumbs'] = "Payment Settings";
        $Vou4vxorrdoe['title'] = 'My Payment Settings';
        $Vou4vxorrdoe['page'] = 'payment_settings';
        $Vou4vxorrdoe['subview'] = $this->load->view('client/payment_settings', $Vou4vxorrdoe, TRUE);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }
    public function payment_history() {
        $Vou4vxorrdoe['breadcrumbs'] = "Payment History";
        $Vou4vxorrdoe['title'] = 'My Payment History';
        $Vou4vxorrdoe['page'] = 'payment_history';
        $Vou4vxorrdoe['subview'] = $this->load->view('client/payment_history', $Vou4vxorrdoe, TRUE);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }
    
}
