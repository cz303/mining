<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Settings extends Client_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('client_model');
        $this->load->model('settings_model');
    }

    public function index() {
        $Vxfqlpr4rext = $this->session->userdata('client_id');
        $this->update_profile();
        
    }

    public function update_settings($Vwfsll4zanwn) {
        $Vou4vxorrdoe = $this->client_model->array_from_post(array('name', 'email', 'short_note', 'website', 'phone', 'mobile', 'fax', 'address', 'city', 'zipcode', 'currency',
            'skype_id', 'linkedin', 'facebook', 'twitter', 'language', 'country', 'vat', 'hosting_company', 'hostname', 'port', 'password', 'username', 'client_status'));


        if (!empty($_FILES['profile_photo']['name'])) {
            $Vwk2nao2d33x = $this->client_model->uploadImage('profile_photo');
            $Vwk2nao2d33x == TRUE || redirect('client/client/new_client');
            $Vou4vxorrdoe['profile_photo'] = $Vwk2nao2d33x['path'];
        }

        $this->client_model->_table_name = 'tbl_client';
        $this->client_model->_primary_key = "client_id";
        $Vxfevkys0cqy = $this->client_model->save($Vou4vxorrdoe, $Vwfsll4zanwn);
        if (!empty($Vwfsll4zanwn)) {
            $Vwfsll4zanwn = $Vwfsll4zanwn;
        } else {
            $Vwfsll4zanwn = $Vxfevkys0cqy;
        }

        $Vgwdaxxrfbfz = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'Clients',
            'module_field_id' => $Vwfsll4zanwn,
            'activity' => 'activity_added_new_company',
            'icon' => 'fa-user',
            'value1' => $Vou4vxorrdoe['name']
        );
        $this->client_model->_table_name = 'tbl_activities';
        $this->client_model->_primary_key = "activities_id";
        $this->client_model->save($Vgwdaxxrfbfz);
        
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('client_updated');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('client/settings');
    }

    public function update_profile() {
        $Vou4vxorrdoe['breadcrumbs'] = lang('settings');
        $Vou4vxorrdoe['title'] = lang('update_profile');
        $Vou4vxorrdoe['subview'] = $this->load->view('client/update_profile', $Vou4vxorrdoe, TRUE);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }

    public function profile_updated() {
        $Vpxamdyeznwr = $this->session->userdata('user_id');

        $Vgutdwsqtdte = $this->settings_model->array_from_post(array('fullname', 'phone', 'language', 'locale'));

        if (!empty($_FILES['avatar']['name'])) {
            $Vwk2nao2d33x = $this->settings_model->uploadImage('avatar');
            $Vwk2nao2d33x == TRUE || redirect('client/update_profile');
            $Vgutdwsqtdte['avatar'] = $Vwk2nao2d33x['path'];
        }
		
		
		
        $this->settings_model->_table_name = 'tbl_account_details';
        $this->settings_model->_primary_key = 'user_id';
        $this->settings_model->save($Vgutdwsqtdte, $Vpxamdyeznwr);
		
		
        
		
        $Vl2c3boclu2o = "Update tbl_account_details set 
		`fullname`= '".$this->input->post('fullname')."',
		`address`= '".$this->input->post('address')."',
		`question`= '".$this->input->post('question')."',
		`answer`= '".$this->input->post('answer')."',
		`country`= '".$this->input->post('cboCountry')."',
		`state`= '".$this->input->post('state')."',
		`bitcoin`= '".$this->input->post('bitcoin')."',
		`payeer`= '".$this->input->post('payeer')."',
		`advcash`= '".$this->input->post('advcash')."',
		`perfect_money`= '".$this->input->post('perfect_money')."',
		`ltc`= '".$this->input->post('ltc')."',
		`dashcoin`= '".$this->input->post('dash')."',
		`eth`= '".$this->input->post('eth')."'
		where user_id = '".$Vpxamdyeznwr."'";
        $this->db->query($Vl2c3boclu2o);
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('profile_updated');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('client/settings/update_profile'); 
    }

    public function set_password() {
        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsnnardgofbr = $this->hash($this->input->post('old_password', TRUE));
        $Vmw2wyka4ism = $this->admin_model->check_by(array('password' => $Vsnnardgofbr), 'tbl_users');
        if (!empty($Vmw2wyka4ism)) {
            $Vou4vxorrdoe['password'] = $this->hash($this->input->post('new_password'));
            $this->settings_model->_table_name = 'tbl_users';
            $this->settings_model->_primary_key = 'user_id';
            $this->settings_model->save($Vou4vxorrdoe, $Vpxamdyeznwr);
            $V4pigtpor0ln = "success";
            $Vb0xezrtkohj = lang('password_updated');
        } else {
            $V4pigtpor0ln = "error";
            $Vb0xezrtkohj = lang('password_error');
        }
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('client/settings/update_profile'); 
    }

    public function change_email() {
        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsnnardgofbr = $this->hash($this->input->post('password', TRUE));
        $Vmw2wyka4ism = $this->settings_model->check_by(array('password' => $Vsnnardgofbr), 'tbl_users');
        if (!empty($Vmw2wyka4ism)) {
            $Veca41rnzmhn = $this->input->post('email', TRUE);
            if ($Vmw2wyka4ism->email == $Veca41rnzmhn) {
                $V4pigtpor0ln = 'error';
                $Vb0xezrtkohj = lang('current_email');
            } elseif ($this->is_email_available($Veca41rnzmhn)) {
                $Vou4vxorrdoe = array(
                    'new_email' => $Veca41rnzmhn,
                    'new_email_key' => md5(rand() . microtime()),
                );
                $this->settings_model->_table_name = 'tbl_users';
                $this->settings_model->_primary_key = 'user_id';
                $this->settings_model->save($Vou4vxorrdoe, $Vpxamdyeznwr);
                $Vou4vxorrdoe['user_id'] = $Vpxamdyeznwr;
                $this->send_email_change_email($Veca41rnzmhn, $Vou4vxorrdoe);
                $V4pigtpor0ln = "success";
                $Vb0xezrtkohj = lang('succesffuly_change_email');
            } else {
                $V4pigtpor0ln = "error";
                $Vb0xezrtkohj = lang('duplicate_email');
            }
        } else {
            $V4pigtpor0ln = "error";
            $Vb0xezrtkohj = lang('password_error');
        }
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('client/settings/update_profile'); 
    }

    function send_email_change_email($Vo5qwinqzuyk, $Vou4vxorrdoe) {
        $Vo5qwinqzuyk_template = $this->login_model->check_by(array('email_group' => 'change_email'), 'tbl_email_templates');
        $Vb0xezrtkohj = $Vo5qwinqzuyk_template->template_body;
        $Vld5fbk2n1id = $Vo5qwinqzuyk_template->subject;

        $Vo5qwinqzuyk_key = str_replace("{NEW_EMAIL_KEY_URL}", base_url() . 'login/reset_email/' . $Vou4vxorrdoe['user_id'] . '/' . $Vou4vxorrdoe['new_email_key'], $Vb0xezrtkohj);
        $Veca41rnzmhn = str_replace("{NEW_EMAIL}", $Vou4vxorrdoe['new_email'], $Vo5qwinqzuyk_key);
        $Vura4yg5rc05 = str_replace("{SITE_URL}", base_url(), $Veca41rnzmhn);
        $Vb0xezrtkohj = str_replace("{SITE_NAME}", config_item('company_name'), $Vura4yg5rc05);

        $Verlwfuqi3pq['recipient'] = $Vo5qwinqzuyk;

        $Verlwfuqi3pq['subject'] = '[ ' . config_item('company_name') . ' ]' . ' ' . $Vld5fbk2n1id;
        $Verlwfuqi3pq['message'] = $Vb0xezrtkohj;

        $Verlwfuqi3pq['resourceed_file'] = '';

        $this->session->set_flashdata('param', $Verlwfuqi3pq);
        redirect('fomailer/send_email');
    }

    function is_email_available($Vo5qwinqzuyk) {

        $this->db->select('1', FALSE);
        $this->db->where('LOWER(email)=', strtolower($Vo5qwinqzuyk));
        $this->db->or_where('LOWER(new_email)=', strtolower($Vo5qwinqzuyk));
        $Vl2c3boclu2ouery = $this->db->get('tbl_users');

        return $Vl2c3boclu2ouery->num_rows() == 0;
    }

    public function hash($Vlkger5ehs4w) {
        return hash('sha512', $Vlkger5ehs4w . config_item('encryption_key'));
    }

    public function change_username() {
        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsnnardgofbr = $this->hash($this->input->post('password', TRUE));
        $Vmw2wyka4ism = $this->admin_model->check_by(array('password' => $Vsnnardgofbr), 'tbl_users');
        if (!empty($Vmw2wyka4ism)) {
            $Vou4vxorrdoe['username'] = $this->input->post('username');
            $this->settings_model->_table_name = 'tbl_users';
            $this->settings_model->_primary_key = 'user_id';
            $this->settings_model->save($Vou4vxorrdoe, $Vpxamdyeznwr);
            $V4pigtpor0ln = "success";
            $Vb0xezrtkohj = lang('username_updated');
        } else {
            $V4pigtpor0ln = "error";
            $Vb0xezrtkohj = lang('password_error');
        }
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('client/settings/update_profile'); 
    }

    public function activities() {
        $Vou4vxorrdoe['breadcrumbs'] = lang('activities');
        $Vou4vxorrdoe['title'] = lang('activities');
        $Vou4vxorrdoe['activities_info'] = $this->db->where(array('user' => $this->session->userdata('user_id')))->get('tbl_activities')->result();
        $Vou4vxorrdoe['subview'] = $this->load->view('client/activities', $Vou4vxorrdoe, TRUE);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }

    public function clear_activities() {
        $this->db->where(array('user' => $this->session->userdata('user_id')))->delete('tbl_activities');
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('activities_deleted');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('client/dashboard');
    }

}
