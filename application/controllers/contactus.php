<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Contactus extends MY_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        $this->load->helper('captcha');
    }
    public function index() {
    	$Vnynxdo3iifg = array(
			'word'  => generateCode(5),
			'img_path'  => './uploads/captcha/',
			'img_url'   =>base_url().'uploads/captcha/',
			'font_path' => './images/arial.ttf',
			'img_width' => '150',
			'img_height' => 30,
			'expiration' => 7200
			);
		foreach (new DirectoryIterator('./uploads/captcha/') as $fileInfo) {
			if(!$fileInfo->isDot()) {
				unlink($fileInfo->getPathname());
			}
		}
        $Vd4ye0uklqtg = create_captcha($Vnynxdo3iifg);
        $Vou4vxorrdoe['cap']=$Vd4ye0uklqtg;
		$Vou4vxorrdoe['title'] = lang('contact') . ' ' . config_item('company_name');
        $this->load->view('contact', $Vou4vxorrdoe);
	}
	
	public function send_mail(){
		$Vou4vxorrdoe = array(
			config_item('company_domain'),
			$this->input->post('from', TRUE),
			$this->input->post('subject', TRUE),
			$this->input->post('message', TRUE),
		);
		$Vmh4nbblpmvn = $this->login_model->check_by(array('email_group' => 'contact_email'), 'tbl_email_templates');
		 $V52ujzwbr0ov = str_replace(array("{SITE_NAME}", "{EMAIL}", "{SUBJECT}", "{MESSAGE}"), $Vou4vxorrdoe, $Vmh4nbblpmvn->template_body);
		 $Vo5qwinqzuyk=config_item('company_email');
		 
		$Verlwfuqi3pq['recipient'] = $Vo5qwinqzuyk;
        $Verlwfuqi3pq['subject'] = $this->input->post('subject', TRUE);
        $Verlwfuqi3pq['message'] = $V52ujzwbr0ov;
        $Verlwfuqi3pq['resourceed_file'] = '';
        $this->login_model->send_email($Verlwfuqi3pq);
		$V4pigtpor0ln='success';
		$Vb0xezrtkohj='Message Sent Successfully';
		set_message($V4pigtpor0ln, $Vb0xezrtkohj);
		redirect('contactus');
	}
}