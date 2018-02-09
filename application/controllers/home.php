<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Home extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->model('plan_model');
        $this->load->model('user_model');
    }
    public function index() {
		
		$Vou4vxorrdoe['title'] = lang('welcome_to') . ' ' . config_item('company_name');
        $Vttvc4msxnjm=period_type();
        $Vypkzdoadnl3=iperiod_type();
        $this->plan_model->_table_name = 'tbl_plans'; 
        $this->plan_model->_order_by = 'plan_id';
        $Vou4vxorrdoe['all_plan_info'] = $this->plan_model->get();
        $Vou4vxorrdoe['testimonials_list'] = $this->user_model->get_list_of_testimonials();
		
		
        $Vou4vxorrdoe['subview'] = '';
        $Vou4vxorrdoe['period_type']=$Vttvc4msxnjm;
        $Vou4vxorrdoe['iperiod_type']=$Vypkzdoadnl3;
        $this->load->view('home', $Vou4vxorrdoe);
	}
	
	public function faq() {
		
		$this->load->model('login_Model');
		$Vou4vxorrdoe['title'] = lang('faq');
		
		$Vou4vxorrdoe['faq_list'] = $this->login_Model->get_list_of_faq();
        $this->load->view('faq', $Vou4vxorrdoe);
	}
}	
