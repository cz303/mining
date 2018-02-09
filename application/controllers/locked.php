<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Locked extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
		$Vpxamdyeznwr = $this->session->userdata('user_id');
		if($Vpxamdyeznwr == NULL){
			redirect('login');
		}
    }
    public function index() {
        $Vou4vxorrdoe['title'] = lang('welcome_to') . ' ' . config_item('company_name');
        $this->load->view('login/lock_screen', $Vou4vxorrdoe);
    }

    public function check_login($Vswiwuwopaq1) {
        $Vsnnardgofbr = $this->input->post('password', TRUE);
        
        $this->admin_model->_table_name = 'tbl_users';
        $this->admin_model->_order_by = 'user_id';

        $Vhpl54alqzc2 = $this->admin_model->get_by(array(
            'username' => $Vswiwuwopaq1,
            'password' => $this->hash($Vsnnardgofbr),
                ), TRUE);
        if (!empty($Vhpl54alqzc2) && $Vhpl54alqzc2->activated == 1 && $Vhpl54alqzc2->banned == 0) {
            $this->admin_model->set_action(array('user_id' => $Vhpl54alqzc2->user_id), array('online_status' => '1'), 'tbl_users');
            if ($Vhpl54alqzc2->role_id != '2') {

                $Vou4vxorrdoe = array(
                    'user_flag' => 1,
                );
                $this->session->set_userdata($Vou4vxorrdoe);
                redirect('admin/dashboard');
            } else {
                $Vou4vxorrdoe = array(
                    'user_flag' => 2,
                );
                $this->session->set_userdata($Vou4vxorrdoe);
                redirect('client/dashboard');
            }
        } else {
            $this->session->set_flashdata('error', lang('incorrect_password'));
            redirect('locked');
        }
    }

    public function lock_screen() {
        $this->session->unset_userdata('user_flag');
        redirect('locked');
    }

    public function hash($Vlkger5ehs4w) {
        return hash('sha512', $Vlkger5ehs4w . config_item('encryption_key'));
    }

}
