<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Feedback extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
    }

    public function index(){
		$Vou4vxorrdoe['breadcrumbs'] = $Vou4vxorrdoe['title'] = $Vou4vxorrdoe['page'] = "Testimonial";
		$Vou4vxorrdoe['count_feed'] = $this->client_model->check_data('tbl_testimonial',array('testimonial_status !=' => 2));
		$Vou4vxorrdoe['fetch_feed'] = $this->client_model->fetch_data_all('tbl_testimonial',array('testimonial_status !=' => 2));		
		
		$Vou4vxorrdoe['subview'] = $this->load->view('admin/feedback/index',$Vou4vxorrdoe,true);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
	}
	
	function status(){
		$Vpxamdyeznwr = $this->input->post('user_id');
		$Va5zq3yanff3 = $this->input->post('status');
		$Vgtdlyxr3t3p = array('testimonial_status' => $this->input->post('status'));
		$Vpamueiovyi0 = array('testimonial_user_id' => $this->input->post('user_id'));
		if($Va5zq3yanff3 == 0){
			$this->client_model->update_data('tbl_testimonial',$Vgtdlyxr3t3p,$Vpamueiovyi0);
			echo "<a href='#' alt='$Vpxamdyeznwr' data-toggle='tooltip' data-placement='top' data-original-title='View' title='Activate' id='activate' class='btn btn-success'><span class='fa fa-check-square-o'></span></a>";
		}else{			
			$this->client_model->update_data('tbl_testimonial',$Vgtdlyxr3t3p,$Vpamueiovyi0);
			echo "<a href='#' alt='$Vpxamdyeznwr' data-toggle='tooltip' data-placement='top' data-original-title='View' title='Deactivate' id='deactivate' class='btn btn-primary'><span class='fa fa-close'></span></a>";
		}
		die;		
	}
	
	function delete($Vpxamdyeznwr=null){
		$Vgtdlyxr3t3p = array('testimonial_status' => 2);
		$Vpamueiovyi0 = array('testimonial_user_id' => $Vpxamdyeznwr);
		$this->client_model->update_data('tbl_testimonial',$Vgtdlyxr3t3p,$Vpamueiovyi0);
		$V4pigtpor0ln = "success";
		$Vb0xezrtkohj = 'Selected testimonial has been deleted.';
		set_message($V4pigtpor0ln, $Vb0xezrtkohj);
		redirect('admin/feedback');
	}
    
}
