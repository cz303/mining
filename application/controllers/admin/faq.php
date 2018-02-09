<?php
class Faq extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->load->model('Page_model');
		$this->lang->load('page');
	}
	
	function index($Vzn01ppcgbhy = '', $V3eoetwcxhav = '')
	{
		$this->load->helper('ckeditor');
        $this->data['ckeditor'] = array(
            'id' => 'ck_editor',
            'path' => 'asset/js/ckeditor',
            'config' => array(
                'toolbar' => "Full",
                'width' => "100%",
                'height' => "400px"
            )
        );
		$Vwfsll4zanwn = false;
		if ($Vzn01ppcgbhy == 'create') {
		
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('answer', 'lang:answer', 'trim|required');
			$this->form_validation->set_message('required', lang('answer_value_required'));
			
			
			if($this->form_validation->run() == false){
				$this->session->set_flashdata('validation_errors',validation_errors());
				ciredirect(base_url() . 'admin/faq', 'refresh');
				
			}else{
				
				
				$Vou4vxorrdoe['question']		= $this->input->post('question');
				$Vou4vxorrdoe['answer']		= $this->input->post('answer');
				$Vou4vxorrdoe['date']		= date('Y-m-d');
				$Vou4vxorrdoe['time']		= date('H:i:s');
				
				$this->db->insert('faq',$Vou4vxorrdoe);
				
				$this->session->set_flashdata('msg', lang('success_66'));
				
				redirect(base_url() . 'admin/faq/', 'refresh');
			}
		}else
		if ($Vzn01ppcgbhy == 'do_update') {
			
			$this->load->helper('url');
			$this->load->helper('form');
			$this->load->library('form_validation');
			
			$this->form_validation->set_rules('answer', 'lang:answer', 'trim|required');
			$this->form_validation->set_message('required', lang('answer_value_required'));
			
			
			if($this->form_validation->run() == false){
				$this->session->set_flashdata('errormsg',validation_errors());
				redirect(base_url() . 'admin/faq/edit/'.$V3eoetwcxhav, 'refresh');
			}else{
				
				$Vou4vxorrdoe['question']		= $this->input->post('question');
				$Vou4vxorrdoe['answer']		= $this->input->post('answer');
				$Vou4vxorrdoe['date']		= date('Y-m-d');
				$Vou4vxorrdoe['time']		= date('H:i:s');
				
				$this->db->where(array(
					'faq_id' => $V3eoetwcxhav
				));
				$this->db->update('faq',$Vou4vxorrdoe);
				
				$this->session->set_flashdata('msg', lang('success_67'));
				redirect(base_url() . 'admin/faq/', 'refresh');
			}
		   
		} else if ($Vzn01ppcgbhy == 'edit') {
			$Vbwoad54av45 = $V3eoetwcxhav;
			$Vou4vxorrdoe['edit_data']   = $this->db->get_where('faq',array('faq_id' => $V3eoetwcxhav))->row_array();
			if(!$Vou4vxorrdoe['edit_data']){
				
				$this->session->set_flashdata('errormsg', lang('error_14'));
				redirect(base_url().'admin/faq/','refresh');
			}
			$Vou4vxorrdoe['page_name']  = 'editfaq';
			$Vou4vxorrdoe['title'] = lang('update_faq');

			$Vou4vxorrdoe['subview'] = $this->load->view('admin/editfaq', $Vou4vxorrdoe, TRUE);
	        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
				
			
		}else
		if ($Vzn01ppcgbhy == 'delete') {
			
			$this->db->delete('faq',array('faq_id'=>$V3eoetwcxhav));
			$this->session->set_flashdata('msg', lang('success_68'));
			
			redirect(base_url() . 'admin/faq/', 'refresh');
		}else {
			$this->db->order_by('faq_id','desc');
			$Vou4vxorrdoe['faq_list']      = $this->db->get('faq')->result_array();
			$Vou4vxorrdoe['title'] = 'FAQ';
	        $Vou4vxorrdoe['page'] = 'FAQ';

			$Vou4vxorrdoe['subview'] = $this->load->view('admin/faq_list', $Vou4vxorrdoe, TRUE);
	        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
	    }
	}
	
}	