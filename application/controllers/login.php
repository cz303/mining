<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Login extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('captcha');
        
    }

    public function index() {
        
        $V30jjdy1dlfz = $this->session->userdata('url');
        $Vbfatyoohaps = $this->session->userdata('redirectAfter');
        $this->login_model->loggedin() == FALSE || redirect($V30jjdy1dlfz);

        $Vh4p4zmshpew = $this->login_model->rules;
        $this->form_validation->set_rules($Vh4p4zmshpew);
        if ($this->form_validation->run() == TRUE) {
             
            
            if ($this->login_model->login() == TRUE) {
                
                
                if(!empty($Vbfatyoohaps)){
                    
                    $this->session->unset_userdata('redirectAfter');
                    redirect($Vbfatyoohaps);
                }
                else
                    redirect('client/dashboard');
                    
            } else {
                
                $this->session->set_flashdata('error', lang('incorrect_email_or_username'));
                redirect('login', 'refresh');
            }
        }
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
        $Vou4vxorrdoe['title'] = 'Login';
        $Vou4vxorrdoe['subview'] = $this->load->view('login/login_form', $Vou4vxorrdoe, TRUE);
        $this->load->view('login', $Vou4vxorrdoe);
    }

    public function register($Vq1uykxyljmj=null) {
        if($Vq1uykxyljmj){
            $Vou4vxorrdoe['reffer_id']=$Vq1uykxyljmj;
        }
        $Vou4vxorrdoe['title'] = 'Registeration';
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
        $Vou4vxorrdoe['subview'] = $this->load->view('login/register', $Vou4vxorrdoe, TRUE);
        $this->load->view('login', $Vou4vxorrdoe);
    }

    public function forgot_password() {
        $Vou4vxorrdoe['title'] = 'Forgot Password';
        if (isset($_POST) && !empty($_POST)) {
            $V2apncigjekm = $this->login_model->get_user_details($this->input->post('email_or_username', TRUE));
            if (!empty($V2apncigjekm)) {
                $Vou4vxorrdoe = array(
                    'user_id' => $V2apncigjekm->user_id,
                    'username' => $V2apncigjekm->username,
                    'email' => $V2apncigjekm->email,
                    'new_pass_key' => md5(rand() . microtime()),
                );
                $this->login_model->set_password_key($V2apncigjekm->user_id, $Vou4vxorrdoe['new_pass_key']);

                $this->send_email('forgot_password', $Vou4vxorrdoe['email'], $Vou4vxorrdoe);
                $V4pigtpor0ln = 'success';
                $Vb0xezrtkohj = lang('message_new_password_confir');
                set_message($V4pigtpor0ln, $Vb0xezrtkohj);
                redirect('login');
            } else {
                $V4pigtpor0ln = 'error';
                $Vb0xezrtkohj = lang('email_or_usernme_error');
                set_message($V4pigtpor0ln, $Vb0xezrtkohj);
                redirect('login/forgot_password');
            }
        }
        $Vou4vxorrdoe['subview'] = $this->load->view('login/forgot_password', $Vou4vxorrdoe, TRUE);
        $this->load->view('login', $Vou4vxorrdoe);
    }

    public function reset_password($Vpxamdyeznwr, $V1w2dmhk1fxr) {
        $Vou4vxorrdoe['title'] = lang('welcome_to') . ' ' . config_item('company_name');

        $V0yeegukll4i = $this->login_model->can_reset_password($Vpxamdyeznwr, $V1w2dmhk1fxr, $this->config->item('forgot_password_expire', 'login'));
		$Vu4ujhnpufk0 = rand(100000,9999999);
        if ($V0yeegukll4i == true) {
            $this->login_model->get_reset_password($Vpxamdyeznwr, $V1w2dmhk1fxr,$Vu4ujhnpufk0);
            $V2apncigjekm = $this->db->where('user_id', $Vpxamdyeznwr)->get('tbl_users')->row();
            $Vou4vxorrdoe = array(
                'username' => $V2apncigjekm->username,
                'email' => $V2apncigjekm->email,
                'new_password' => $Vu4ujhnpufk0,
            );
            
            $this->send_email('reset_password', $Vou4vxorrdoe['email'], $Vou4vxorrdoe);
            $V4pigtpor0ln = 'success';
            $Vb0xezrtkohj = lang('message_new_password_sent');
        } else {
            $V4pigtpor0ln = 'error';
            $Vb0xezrtkohj = lang('message_expire');
        }
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('login');
    }

    public function registered_user() {

        $Vgfv0zj35dze = $this->login_model->array_from_post(array('email', 'username', 'intro_name'));
        $Vgz3ev0v0xjq = $this->db->where(array('email' => $Vgfv0zj35dze['email']))->get('tbl_users')->row();
        $Vqvpdcr5rvzv = $this->db->where(array('username' => $Vgfv0zj35dze['username']))->get('tbl_users')->row();
        $Vssdkuzajqti='';
        $Vssdkuzajqti_var = $this->input->post('intro_name');
        $Vkrjrtj2iipm = 0;
        $Vzr33sxjoyju = false;
        if($Vssdkuzajqti_var!='')
        {
            $Vssdkuzajqti = $this->db->where(array('refer_id' => $Vssdkuzajqti_var))->get('tbl_account_details')->row_array();
           
            if(!empty($Vssdkuzajqti))
            {
                $Vkrjrtj2iipm = $Vssdkuzajqti['user_id'];
                
            }
            else {
                $Vzr33sxjoyju = true;
            }
        }
        
        if (!empty($Vgz3ev0v0xjq) || !empty($Vqvpdcr5rvzv)) {
            $V4pigtpor0ln = 'error';
            if (!empty($Vgz3ev0v0xjq)) {
                $Vb0xezrtkohj = lang('existing_email');
            } elseif (!empty($Vqvpdcr5rvzv)) {
                $Vb0xezrtkohj = lang('existing_username');
            }
            else{
                $Vb0xezrtkohj = "Wrong Referral Id";
            }
            set_message($V4pigtpor0ln, $Vb0xezrtkohj);
            redirect('login/register');
        } else {
            $Vgfv0zj35dze['password'] = $this->login_model->hash($this->input->post('password', true));
            $Vgfv0zj35dze['new_email_key'] = md5(rand() . microtime());
            $Vgfv0zj35dze['role_id'] = 2;
            $Vgfv0zj35dze['last_ip'] = $this->input->ip_address;
            $Vgfv0zj35dze['created'] = date('Y-m-d H:i:s');
            unset($Vgfv0zj35dze['intro_name']);
            $this->login_model->_table_name = 'tbl_users';
            $this->login_model->_primary_key = 'user_id';
            
            $Vgfv0zj35dze['user_id'] = $this->login_model->save($Vgfv0zj35dze);

            
            $Vpafgvo0k4r1 = $this->login_model->array_from_post(array('client_status', 'name', 'email'));
            $Vpafgvo0k4r1['primary_contact'] = 0;
            
            $this->login_model->_table_name = 'tbl_client';
            $this->login_model->_primary_key = 'client_id';
            $Viiarmsgtlwc['company'] = $this->login_model->save($Vpafgvo0k4r1);
            $Viiarmsgtlwc['user_id'] = $Vgfv0zj35dze['user_id'];
            $Viiarmsgtlwc['fullname'] = $this->input->post('name', TRUE);
            $this->login_model->_table_name = 'tbl_account_details';
            $this->login_model->_primary_key = 'account_details_id';
            $this->login_model->save($Viiarmsgtlwc);
            $Vl2c3boclu2o = "Update tbl_account_details set `question`= '".$this->input->post('question')."', `answer`= '".$this->input->post('answer')."', `country`= '".$this->input->post('cboCountry')."', `state`= '".$this->input->post('state')."', `pm_num`= '', `st_pay`= '', `paypal`= '', `bitcoin`= '".$this->input->post('bitcoin')."', `eth`= '', `dashcoin`= '', `litcoin`= '', `payeer`= '', `neteller`= '', `skrill`= '', `intro_id`= '".$Vkrjrtj2iipm."',ip_address='".$_SERVER['SERVER_ADDR']."',refer_id='".randomPrefix1(2).randomPrefix(10)."' where user_id = '".$Vgfv0zj35dze['user_id']."'";
            
            $this->db->query($Vl2c3boclu2o);

            $Vgfv0zj35dze['activation_period'] = config_item('email_activation_expire') / 3600;
            $Vgfv0zj35dze['password'] = $this->input->post('password', true);
            $this->send_email('activate', $Vgfv0zj35dze['email'], $Vgfv0zj35dze);
            $V4pigtpor0ln = 'success';
            $Vb0xezrtkohj = lang('registration_success');
            set_message($V4pigtpor0ln, $Vb0xezrtkohj);
            redirect('login');
        }
    }

    function send_email($V4pigtpor0ln, $Vo5qwinqzuyk, &$Vou4vxorrdoe) {
        switch ($V4pigtpor0ln) {
            case 'activate':
                return $this->send_activation_email($Vo5qwinqzuyk, $Vou4vxorrdoe);
                break;
            case 'forgot_password':
                return $this->send_email_forgot_password($Vo5qwinqzuyk, $Vou4vxorrdoe);
                break;
            case 'reset_password':
                return $this->send_email_reset_password($Vo5qwinqzuyk, $Vou4vxorrdoe);
                break;
        }
    }

    function send_activation_email($Vo5qwinqzuyk, $Vou4vxorrdoe) {

        $Vo5qwinqzuyk_template = $this->login_model->check_by(array('email_group' => 'activate_account'), 'tbl_email_templates');

        $Vtzbpbfbcmwx = str_replace("{ACTIVATE_URL}", site_url('/login/activate/' . $Vou4vxorrdoe['user_id'] . '/' . $Vou4vxorrdoe['new_email_key']), $Vo5qwinqzuyk_template->template_body);
        $Vppga0du4hd4 = str_replace("{ACTIVATION_PERIOD}", $Vou4vxorrdoe['activation_period'], $Vtzbpbfbcmwx);
        $Vswiwuwopaq1 = str_replace("{USERNAME}", $Vou4vxorrdoe['username'], $Vppga0du4hd4);
        $Vavkplwqhag3 = str_replace("{EMAIL}", $Vou4vxorrdoe['email'], $Vswiwuwopaq1);
        $Vi4kpsxfozfu = str_replace("{PASSWORD}", $Vou4vxorrdoe['password'], $Vavkplwqhag3);
        $Vb0xezrtkohj = str_replace("{SITE_NAME}", config_item('company_name'), $Vi4kpsxfozfu);

        $Verlwfuqi3pq['recipient'] = $Vo5qwinqzuyk;
        $Verlwfuqi3pq['subject'] = '[ ' . config_item('company_name') . ' ]' . ' ' . $Vo5qwinqzuyk_template->subject;
        $Verlwfuqi3pq['message'] = $Vb0xezrtkohj;
        $Verlwfuqi3pq['resourceed_file'] = '';

        $this->login_model->send_email($Verlwfuqi3pq);
    }

    function activate($Vpxamdyeznwr, $Vvlye3rk5u3n) {
        
        if ($this->login_model->activate_user($Vpxamdyeznwr, $Vvlye3rk5u3n)) {  
           
            
            $V4pigtpor0ln = 'success';
            $Vb0xezrtkohj = lang('activation_completed');
            set_message($V4pigtpor0ln, $Vb0xezrtkohj);
            redirect('login');
        } else {
            
            $V4pigtpor0ln = 'error';
            $Vb0xezrtkohj = lang('activation_failed');
            set_message($V4pigtpor0ln, $Vb0xezrtkohj);
            redirect('login');
        }
    }

    function send_email_forgot_password($Vo5qwinqzuyk, $Vou4vxorrdoe) {
        $Vo5qwinqzuyk_template = $this->login_model->check_by(array('email_group' => 'forgot_password'), 'tbl_email_templates');

        $Vb0xezrtkohj = $Vo5qwinqzuyk_template->template_body;
        $Vld5fbk2n1id = $Vo5qwinqzuyk_template->subject;

        $Vura4yg5rc05 = str_replace("{SITE_URL}", base_url() . 'login', $Vb0xezrtkohj);
        $Vunjdawbwhmv = str_replace("{PASS_KEY_URL}", base_url() . 'login/reset_password/' . $Vou4vxorrdoe['user_id'] . '/' . $Vou4vxorrdoe['new_pass_key'], $Vura4yg5rc05);
        $Vb0xezrtkohj = str_replace("{SITE_NAME}", config_item('company_name'), $Vunjdawbwhmv);

        $Verlwfuqi3pq['recipient'] = $Vo5qwinqzuyk;

        $Verlwfuqi3pq['subject'] = '[ ' . config_item('company_name') . ' ] ' . $Vld5fbk2n1id;
        $Verlwfuqi3pq['message'] = $Vb0xezrtkohj;

        $Verlwfuqi3pq['resourceed_file'] = '';

        $this->login_model->send_email($Verlwfuqi3pq);
    }

    function send_email_reset_password($Vo5qwinqzuyk, $Vou4vxorrdoe) {
        $Vo5qwinqzuyk_template = $this->login_model->check_by(array('email_group' => 'reset_password'), 'tbl_email_templates');

        $Vb0xezrtkohj = $Vo5qwinqzuyk_template->template_body;
        $Vld5fbk2n1id = $Vo5qwinqzuyk_template->subject;

        $Vswiwuwopaq1 = str_replace("{USERNAME}", $Vou4vxorrdoe['username'], $Vb0xezrtkohj);
        $Vavkplwqhag3 = str_replace("{EMAIL}", $Vou4vxorrdoe['email'], $Vswiwuwopaq1);
        $Vi4kpsxfozfu = str_replace("{NEW_PASSWORD}", $Vou4vxorrdoe['new_password'], $Vavkplwqhag3);
        $Vb0xezrtkohj = str_replace("{SITE_NAME}", config_item('company_name'), $Vi4kpsxfozfu);

        $Verlwfuqi3pq['recipient'] = $Vo5qwinqzuyk;

        $Verlwfuqi3pq['subject'] = '[ ' . config_item('company_name') . ' ]' . $Vld5fbk2n1id;
        $Verlwfuqi3pq['message'] = $Vb0xezrtkohj;

        $Verlwfuqi3pq['resourceed_file'] = '';

        $this->login_model->send_email($Verlwfuqi3pq);
    }

    public function reset_email($Vpxamdyeznwr, $Vvlye3rk5u3n) {
        
        if ($this->login_model->activate_new_email($Vpxamdyeznwr, $Vvlye3rk5u3n)) { 
            $this->logout();
            $V4pigtpor0ln = 'success';
            $Vb0xezrtkohj = lang('new_email_activated');
        } else {                
            $V4pigtpor0ln = 'success';
            $Vb0xezrtkohj = lang('new_email_failed');
        }
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('login');
    }

    function activate_new_email($Vpxamdyeznwr, $Vvlye3rk5u3n) {
        if ((strlen($Vpxamdyeznwr) > 0) AND ( strlen($Vvlye3rk5u3n) > 0)) {
            return $this->login_model->activate_new_email($Vpxamdyeznwr, $Vvlye3rk5u3n);
        }
        return FALSE;
    }

    public function logout() {
        $this->login_model->logout();
        redirect('login');
    }

    
    
    public function check_availability() {
   
        $Vwbpa3giaw5f = $this->login_model->check_availability();
        if ($Vwbpa3giaw5f) {
            echo 'true';
        } else {
            echo 'false';
        }
        
    }
    public function check_introname() {

        $Vwbpa3giaw5f = $this->login_model->check_introname();
        if ($Vwbpa3giaw5f) {
            echo 'true';
        } else {
            echo 'false';
        }
        
    }
}
