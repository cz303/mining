<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Feedback extends Client_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
    }

    public function index(){
		$Vou4vxorrdoe['breadcrumbs'] = $Vou4vxorrdoe['title'] = $Vou4vxorrdoe['page'] = "Feedback";
		$Vou4vxorrdoe['count_feed'] = $this->client_model->check_data('tbl_testimonial' , array('testimonial_user_id' => $this->session->userdata('user_id')));
		$Vou4vxorrdoe['fetch_feed'] = $this->client_model->fetch_data('tbl_testimonial' , array('testimonial_user_id' => $this->session->userdata('user_id')));
		
		if($_POST){
			
			if($Vou4vxorrdoe['count_feed'] == 0){
				$Vexasqk11sah = array(
					'testimonial_user_id' => $this->input->post('testimonial_user_id'),
					'testimonial_feedback' => $this->input->post('testimonial_feedback'),
					'testimonial_status' => 0
				);
				$this->client_model->insert_data('tbl_testimonial' , $Vexasqk11sah);
				
				$V4pigtpor0ln = "success";
				$Vb0xezrtkohj = 'Feedback sent successfully.';
				set_message($V4pigtpor0ln, $Vb0xezrtkohj);
				redirect('client/feedback');
			}else{
				$V4pigtpor0ln = "error";
				$Vb0xezrtkohj = 'Feedback already exist.';
				set_message($V4pigtpor0ln, $Vb0xezrtkohj);
				redirect('client/feedback');
			}
		}
		$Vou4vxorrdoe['subview'] = $this->load->view('client/feedback',$Vou4vxorrdoe,true);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
	}
    
}
