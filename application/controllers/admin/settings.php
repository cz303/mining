<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Settings extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        ini_set('max_input_vars', '3000');
        $this->load->model('settings_model');
        $this->auth_key = config_item('api_key'); 

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
    }

    public function index() {
        $Vufqk5ie2bcj = $this->input->get('settings', TRUE) ? $this->input->get('settings', TRUE) : 'general';

        $Vou4vxorrdoe['title'] = lang('company_details'); 

        $Vou4vxorrdoe['load_setting'] = $Vufqk5ie2bcj;

        $Vou4vxorrdoe['page'] = lang('settings');

        $this->settings_model->_table_name = "tbl_countries"; 
        $this->settings_model->_order_by = "id";
        $Vou4vxorrdoe['countries'] = $this->settings_model->get();

        $Vou4vxorrdoe['translations'] = $this->settings_model->translations();

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/settings/settings', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

    public function save_settings() {
        $Vqzoklqdzo35 = $this->settings_model->array_from_post(array('company_name', 'company_legal_name',
            'contact_person', 'company_address', 'company_city', 'company_zip_code',
            'company_country', 'company_phone', 'company_email', 'company_domain', 'company_vat', 'company_start', 'facebook_link', 'twitter_link', 'instagram_link', 'youtube_link', 'seo_title', 'meta_data', 'google_analytic_code', 'google_webmaster_tool_code'));


        foreach ($Vqzoklqdzo35 as $Vseq1edikdvg => $Vp4xjtpabm0l) {
            $Vou4vxorrdoe = array('value' => $Vp4xjtpabm0l);
            $this->db->where('config_key', $Vseq1edikdvg)->update('tbl_config', $Vou4vxorrdoe);
            $Vdlhcakgj0dn = $this->db->where('config_key', $Vseq1edikdvg)->get('tbl_config');
            if ($Vdlhcakgj0dn->num_rows() == 0) {
                $this->db->insert('tbl_config', array("config_key" => $Vseq1edikdvg, "value" => $Vp4xjtpabm0l));
            }
        }
        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'settings',
            'module_field_id' => $this->session->userdata('user_id'),
            'activity' => lang('activity_save_general_settings'),
            'value1' => $Vqzoklqdzo35['company_name']
        );
        $this->settings_model->_table_name = 'tbl_activities';
        $this->settings_model->_primary_key = 'activities_id';
        $this->settings_model->save($Vvi3juzyk4ik);
        
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('save_general_settings');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/settings');
    }

    public function system() {
        $Vou4vxorrdoe['page'] = lang('settings');
        $Vou4vxorrdoe['load_setting'] = 'system';
        $Vou4vxorrdoe['title'] = lang('system_settings'); 
        $Vou4vxorrdoe['languages'] = $this->settings_model->get_active_languages();
        
        $this->settings_model->_table_name = 'tbl_locales';
        $this->settings_model->_order_by = 'name';
        $Vou4vxorrdoe['locales'] = $this->settings_model->get();

        
        $Vou4vxorrdoe['timezones'] = $this->settings_model->timezones();
        
        $this->settings_model->_table_name = 'tbl_currencies';
        $this->settings_model->_order_by = 'name';
        $Vou4vxorrdoe['currencies'] = $this->settings_model->get();

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/settings/settings', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

    public function save_system() {

        $Vqzoklqdzo35 = $this->settings_model->array_from_post(array('default_language', 'locale',
            'timezone', 'default_currency', 'default_tax', 'date_format', 'decimal_separator', 'enable_languages'));
        foreach ($Vqzoklqdzo35 as $Vseq1edikdvg => $Vp4xjtpabm0l) {
            if (strtolower($Vp4xjtpabm0l) == 'on') {
                $Vp4xjtpabm0l = 'TRUE';
            } elseif (strtolower($Vp4xjtpabm0l) == 'off') {
                $Vp4xjtpabm0l = 'FALSE';
            }
            $Vou4vxorrdoe = array('value' => $Vp4xjtpabm0l);
            $this->db->where('config_key', $Vseq1edikdvg)->update('tbl_config', $Vou4vxorrdoe);
            $Vdlhcakgj0dn = $this->db->where('config_key', $Vseq1edikdvg)->get('tbl_config');
            if ($Vdlhcakgj0dn->num_rows() == 0) {
                $this->db->insert('tbl_config', array("config_key" => $Vseq1edikdvg, "value" => $Vp4xjtpabm0l));
            }
        }
        $Vh4rmfmetzra = $this->input->post('date_format', true);
        
        switch ($Vh4rmfmetzra) {
            case "%d-%m-%Y": $Vkaoko1j4rny = "dd-mm-yyyy";
                $Vplea2ncf50j = "d-m-Y";
                break;
            case "%m-%d-%Y": $Vkaoko1j4rny = "mm-dd-yyyy";
                $Vplea2ncf50j = "m-d-Y";
                break;
            case "%Y-%m-%d": $Vkaoko1j4rny = "yyyy-mm-dd";
                $Vplea2ncf50j = "Y-m-d";
                break;
        }
        $this->db->where('config_key', 'date_picker_format')->update('tbl_config', array("value" => $Vkaoko1j4rny));
        $this->db->where('config_key', 'date_php_format')->update('tbl_config', array("value" => $Vplea2ncf50j));

        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'settings',
            'module_field_id' => $this->session->userdata('user_id'),
            'activity' => lang('activity_save_system_settings'),
            'value1' => $Vqzoklqdzo35['default_language']
        );
        $this->settings_model->_table_name = 'tbl_activities';
        $this->settings_model->_primary_key = 'activities_id';
        $this->settings_model->save($Vvi3juzyk4ik);

        
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('save_system_settings');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/settings/system');
    }

    public function theme() {
        $Vou4vxorrdoe['page'] = lang('settings');
        $Vou4vxorrdoe['load_setting'] = 'theme';
        $Vou4vxorrdoe['title'] = lang('theme_settings'); 
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/settings/settings', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

    public function email() {
        $Vou4vxorrdoe['page'] = lang('settings');
        $Vou4vxorrdoe['load_setting'] = 'email_settings';
        $Vou4vxorrdoe['title'] = lang('email_settings'); 
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/settings/settings', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

    public function update_email() {
        $Vqzoklqdzo35 = $this->settings_model->array_from_post(array('company_email', 'use_postmark',
            'postmark_api_key', 'postmark_from_address', 'protocol', 'smtp_host', 'smtp_user', 'smtp_port'));
        foreach ($Vqzoklqdzo35 as $Vseq1edikdvg => $Vp4xjtpabm0l) {
            if (strtolower($Vp4xjtpabm0l) == 'on') {
                $Vp4xjtpabm0l = 'TRUE';
            } elseif (strtolower($Vp4xjtpabm0l) == 'off') {
                $Vp4xjtpabm0l = 'FALSE';
            }
            $Vou4vxorrdoe = array('value' => $Vp4xjtpabm0l);
            $this->db->where('config_key', $Vseq1edikdvg)->update('tbl_config', $Vou4vxorrdoe);
            $Vdlhcakgj0dn = $this->db->where('config_key', $Vseq1edikdvg)->get('tbl_config');
            if ($Vdlhcakgj0dn->num_rows() == 0) {
                $this->db->insert('tbl_config', array("config_key" => $Vseq1edikdvg, "value" => $Vp4xjtpabm0l));
            }
        }
        $Vsbl4pfcklmd = $this->input->post('smtp_pass', true);

        if (!empty($Vsbl4pfcklmd)) {
            $this->load->library('encrypt');
            $V5rkcqmcpb51 = $this->input->post('smtp_pass');
            $Vsbl4pfcklmd = $V5rkcqmcpb51;

            $Vou4vxorrdoe = array('value' => $Vsbl4pfcklmd);
            $this->db->where('config_key', 'smtp_pass')->update('tbl_config', $Vou4vxorrdoe);
            $Vdlhcakgj0dn = $this->db->where('config_key', 'smtp_pass')->get('tbl_config');
            if ($Vdlhcakgj0dn->num_rows() == 0) {
                $this->db->insert('tbl_config', array("config_key" => $Vseq1edikdvg, "value" => $Vp4xjtpabm0l));
            }
        }
        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'settings',
            'module_field_id' => $this->session->userdata('user_id'),
            'activity' => lang('activity_save_email_settings'),
            'value1' => $Vqzoklqdzo35['company_email']
        );
        $this->settings_model->_table_name = 'tbl_activities';
        $this->settings_model->_primary_key = 'activities_id';
        $this->settings_model->save($Vvi3juzyk4ik);
        
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('save_email_settings');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/settings/email');
    }

    public function save_theme() {
        $Vqzoklqdzo35 = $this->settings_model->array_from_post(array('website_name', 'logo_or_icon', 'sidebar_theme','country_in_reg', 'captcha_in_reg', 'captcha_in_login', 'captcha_in_contact'));
        

        if (!empty($_FILES['company_logo']['name'])) {
            $Vwk2nao2d33x = $this->settings_model->uploadImage('company_logo');
            $Vwk2nao2d33x == TRUE || redirect('admin/settings/theme');
            $Vqzoklqdzo35['company_logo'] = $Vwk2nao2d33x['path'];
        }
         $Vsb5hnyfpk4x=array('country_in_reg', 'captcha_in_reg', 'captcha_in_login', 'captcha_in_contact');
        foreach($Vsb5hnyfpk4x as $Vg2ci2o2iuqp){
            if(isset($Vqzoklqdzo35[$Vg2ci2o2iuqp]) && $Vqzoklqdzo35[$Vg2ci2o2iuqp]!='')
            {
                $Vqzoklqdzo35[$Vg2ci2o2iuqp]=1;
            }
            else{
                $Vqzoklqdzo35[$Vg2ci2o2iuqp]=0;
            }

        }
        foreach ($Vqzoklqdzo35 as $Vseq1edikdvg => $Vp4xjtpabm0l) {
            $Vou4vxorrdoe = array('value' => $Vp4xjtpabm0l);
            $this->db->where('config_key', $Vseq1edikdvg)->update('tbl_config', $Vou4vxorrdoe);
            $Vdlhcakgj0dn = $this->db->where('config_key', $Vseq1edikdvg)->get('tbl_config');
            if ($Vdlhcakgj0dn->num_rows() == 0) {
                $this->db->insert('tbl_config', array("config_key" => $Vseq1edikdvg, "value" => $Vp4xjtpabm0l));
            }
        }
        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'settings',
            'module_field_id' => $this->session->userdata('user_id'),
            'activity' => lang('activity_save_theme_settings'),
            'value1' => $Vqzoklqdzo35['website_name']
        );
        $this->settings_model->_table_name = 'tbl_activities';
        $this->settings_model->_primary_key = 'activities_id';
        $this->settings_model->save($Vvi3juzyk4ik);
        
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('save_theme_settings');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/settings/theme');
    }

    public function templates() {
        if ($_POST) {
            $Vou4vxorrdoe = array(
                'subject' => $this->input->post('subject'),
                'template_body' => $this->input->post('email_template'),
            );

            $this->db->where(array('email_group' => $_POST['email_group']))->update('tbl_email_templates', $Vou4vxorrdoe);
            $V5ov0q2q04xz = $_POST['return_url'];
            redirect($V5ov0q2q04xz);
        } else {
            $Vou4vxorrdoe['page'] = lang('settings');
            $Vou4vxorrdoe['load_setting'] = 'templates';
            $Vou4vxorrdoe['title'] = lang('email_templates'); 
            $Vou4vxorrdoe['subview'] = $this->load->view('admin/settings/settings', $Vou4vxorrdoe, TRUE);
            $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
        }
    }

    public function department($Vrrb21ym0qp1 = NULL, $Vwfsll4zanwn = NULL) {
        $Vou4vxorrdoe['page'] = lang('settings');
        if ($Vrrb21ym0qp1 == 'edit_dept') {
            $Vou4vxorrdoe['active'] = 2;
            if (!empty($Vwfsll4zanwn)) {
                $Vou4vxorrdoe['dept_info'] = $this->settings_model->check_by(array('departments_id' => $Vwfsll4zanwn), 'tbl_departments');
            }
        } else {
            $Vou4vxorrdoe['active'] = 1;
        }
        $Vou4vxorrdoe['page'] = lang('settings');
        $Vou4vxorrdoe['sub_active'] = lang('department');
        if ($Vrrb21ym0qp1 == 'update_dept') {
            $Vpftifkgx3zf['deptname'] = $this->input->post('deptname', TRUE);
            $this->settings_model->_table_name = 'tbl_departments';
            $this->settings_model->_primary_key = 'departments_id';
            $Vwfsll4zanwn = $this->settings_model->save($Vpftifkgx3zf, $Vwfsll4zanwn);

            $Vvi3juzyk4ik = array(
                'user' => $this->session->userdata('user_id'),
                'module' => 'settings',
                'module_field_id' => $Vwfsll4zanwn,
                'activity' => lang('activity_added_a_department'),
                'value1' => $Vpftifkgx3zf['deptname']
            );
            $this->settings_model->_table_name = 'tbl_activities';
            $this->settings_model->_primary_key = 'activities_id';
            $this->settings_model->save($Vvi3juzyk4ik);

            
            $V4pigtpor0ln = "success";
            $Vb0xezrtkohj = lang('department_added');
            set_message($V4pigtpor0ln, $Vb0xezrtkohj);
            redirect('admin/settings/department');
        } else {
            $Vou4vxorrdoe['title'] = lang('department'); 
            $Vou4vxorrdoe['load_setting'] = 'department';
        }

        $this->settings_model->_table_name = 'tbl_departments';
        $this->settings_model->_order_by = 'departments_id';
        $Vou4vxorrdoe['all_dept_info'] = $this->settings_model->get();

        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsqvwshxevqn = $this->settings_model->check_by(array('user_id' => $Vpxamdyeznwr), 'tbl_users');
        $Vou4vxorrdoe['role'] = $Vsqvwshxevqn->role_id;

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/settings/settings', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

    public function delete_dept($Vwfsll4zanwn) {
        $Vpqv2r5ql1do = $this->settings_model->check_by(array('departments_id' => $Vwfsll4zanwn), 'tbl_departments');
        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'settings',
            'module_field_id' => $Vwfsll4zanwn,
            'activity' => lang('activity_delete_a_department'),
            'value1' => $Vpqv2r5ql1do->deptname,
        );
        $this->settings_model->_table_name = 'tbl_activities';
        $this->settings_model->_primary_key = 'activities_id';
        $this->settings_model->save($Vvi3juzyk4ik);

        $this->settings_model->_table_name = 'tbl_departments';
        $this->settings_model->_primary_key = 'departments_id';
        $this->settings_model->delete($Vwfsll4zanwn);
        
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('department_deleted');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/settings/department');
    }

    public function notification() {
        $Vou4vxorrdoe['page'] = lang('settings');
        $Vou4vxorrdoe['title'] = lang('notification_settings');
        
        $Vdf3a5upds0t = array('notify_me' => '1');
        
       
        $Vou4vxorrdoe['load_setting'] = 'notification';
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/settings/settings', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    public function set_noticifation() {


        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('notification_settings_changes');
        $Vfey5ni4sg2k['error_type'][] = $V4pigtpor0ln;
        $Vfey5ni4sg2k['error_message'][] = $Vb0xezrtkohj;
        $this->session->set_userdata($Vfey5ni4sg2k);
        redirect('admin/settings/notification'); 
    }

    public function update_profile() {
        $Vou4vxorrdoe['title'] = lang('update_profile');
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/settings/update_profile', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    public function profile_updated() {
        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vgutdwsqtdte = $this->settings_model->array_from_post(array('fullname', 'phone', 'language', 'locale'));

        if (!empty($_FILES['avatar']['name'])) {
            $Vwk2nao2d33x = $this->settings_model->uploadImage('avatar');
            $Vwk2nao2d33x == TRUE || redirect('admin/settings/update_profile');
            $Vgutdwsqtdte['avatar'] = $Vwk2nao2d33x['path'];
        }

        $this->settings_model->_table_name = 'tbl_account_details';
        $this->settings_model->_primary_key = 'user_id';
        $this->settings_model->save($Vgutdwsqtdte, $Vpxamdyeznwr);

        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'settings',
            'module_field_id' => $Vpxamdyeznwr,
            'activity' => lang('activity_update_profile'),
            'value1' => $Vgutdwsqtdte['fullname'],
        );
        $this->settings_model->_table_name = 'tbl_activities';
        $this->settings_model->_primary_key = 'activities_id';
        $this->settings_model->save($Vvi3juzyk4ik);

        $Vxfqlpr4rext = $this->input->post('client_id', TRUE);
        if (!empty($Vxfqlpr4rext)) {
            $V4efsyl1ua3a = $this->settings_model->array_from_post(array('name', 'email', 'address'));
            $this->settings_model->_table_name = 'tbl_client';
            $this->settings_model->_primary_key = 'client_id';
            $this->settings_model->save($V4efsyl1ua3a, $Vxfqlpr4rext);
        }
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('profile_updated');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/settings/update_profile'); 
    }

    public function set_password() {
        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsnnardgofbr = $this->hash($this->input->post('old_password', TRUE));
        $Vmw2wyka4ism = $this->admin_model->check_by(array('password' => $Vsnnardgofbr), 'tbl_users');
        $Vsqvwshxevqn = $this->admin_model->check_by(array('user_id' => $Vpxamdyeznwr), 'tbl_users');
        if (!empty($Vmw2wyka4ism)) {
            $Vou4vxorrdoe['password'] = $this->hash($this->input->post('new_password'));
            $this->settings_model->_table_name = 'tbl_users';
            $this->settings_model->_primary_key = 'user_id';
            $this->settings_model->save($Vou4vxorrdoe, $Vpxamdyeznwr);
            $V4pigtpor0ln = "success";
            $Vb0xezrtkohj = lang('password_updated');
            $Vrrb21ym0qp1 = lang('activity_password_update');
        } else {
            $V4pigtpor0ln = "error";
            $Vb0xezrtkohj = lang('password_error');
            $Vrrb21ym0qp1 = lang('activity_password_error');
        }
        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'settings',
            'module_field_id' => $Vpxamdyeznwr,
            'activity' => $Vrrb21ym0qp1,
            'value1' => $Vsqvwshxevqn->username,
        );
        $this->settings_model->_table_name = 'tbl_activities';
        $this->settings_model->_primary_key = 'activities_id';
        $this->settings_model->save($Vvi3juzyk4ik);
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/settings/update_profile'); 
    }

    public function change_email() {
        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsnnardgofbr = $this->hash($this->input->post('password', TRUE));
        $Vmw2wyka4ism = $this->settings_model->check_by(array('password' => $Vsnnardgofbr), 'tbl_users');
        $Vsqvwshxevqn = $this->admin_model->check_by(array('user_id' => $Vpxamdyeznwr), 'tbl_users');
        if (!empty($Vmw2wyka4ism)) {
            $Veca41rnzmhn = $this->input->post('email', TRUE);
            if ($Vmw2wyka4ism->email == $Veca41rnzmhn) {
                $V4pigtpor0ln = 'error';
                $Vb0xezrtkohj = lang('current_email');
                $Vrrb21ym0qp1 = lang('trying_update_email');
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
                $Vrrb21ym0qp1 = lang('activity_updated_email');
            } else {
                $V4pigtpor0ln = "error";
                $Vb0xezrtkohj = lang('duplicate_email');
                $Vrrb21ym0qp1 = lang('trying_update_email');
            }
        } else {
            $V4pigtpor0ln = "error";
            $Vb0xezrtkohj = lang('password_error');
            $Vrrb21ym0qp1 = lang('trying_update_email');
        }
        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'settings',
            'module_field_id' => $Vpxamdyeznwr,
            'activity' => $Vrrb21ym0qp1,
            'value1' => $Vsqvwshxevqn->email,
            'value2' => $Veca41rnzmhn,
        );
        $this->settings_model->_table_name = 'tbl_activities';
        $this->settings_model->_primary_key = 'activities_id';
        $this->settings_model->save($Vvi3juzyk4ik);
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/settings/update_profile'); 
    }

    function send_email_change_email($Vo5qwinqzuyk, $Vou4vxorrdoe) {
        $Vo5qwinqzuyk_template = $this->settings_model->check_by(array('email_group' => 'change_email'), 'tbl_email_templates');
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
        $this->settings_model->send_email($Verlwfuqi3pq);
    }

    function is_email_available($Vo5qwinqzuyk) {

        $this->db->select('1', FALSE);
        $this->db->where('LOWER(email)=', strtolower($Vo5qwinqzuyk));
        $this->db->or_where('LOWER(new_email)=', strtolower($Vo5qwinqzuyk));
        $Vuq34jlhekzm = $this->db->get('tbl_users');
        return $Vuq34jlhekzm->num_rows() == 0;
    }

    public function hash($Vlkger5ehs4w) {
        return hash('sha512', $Vlkger5ehs4w . config_item('encryption_key'));
    }

    public function change_username() {
        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsnnardgofbr = $this->hash($this->input->post('password', TRUE));
        $Vmw2wyka4ism = $this->admin_model->check_by(array('password' => $Vsnnardgofbr), 'tbl_users');
        $Vsqvwshxevqn = $this->admin_model->check_by(array('user_id' => $Vpxamdyeznwr), 'tbl_users');
        if (!empty($Vmw2wyka4ism)) {
            $Vou4vxorrdoe['username'] = $this->input->post('username');
            $this->settings_model->_table_name = 'tbl_users';
            $this->settings_model->_primary_key = 'user_id';
            $this->settings_model->save($Vou4vxorrdoe, $Vpxamdyeznwr);
            $V4pigtpor0ln = "success";
            $Vb0xezrtkohj = lang('username_updated');
            $Vrrb21ym0qp1 = lang('activity_username_updated');
        } else {
            $V4pigtpor0ln = "error";
            $Vb0xezrtkohj = lang('password_error');
            $Vrrb21ym0qp1 = lang('username_changed_error');
        }
        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'settings',
            'module_field_id' => $Vpxamdyeznwr,
            'activity' => $Vrrb21ym0qp1,
            'value1' => $Vsqvwshxevqn->username,
            'value2' => $this->input->post('username'),
        );
        $this->settings_model->_table_name = 'tbl_activities';
        $this->settings_model->_primary_key = 'activities_id';
        $this->settings_model->save($Vvi3juzyk4ik);
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/settings/update_profile'); 
    }

    public function database_backup() {
        $this->load->dbutil();
        $Vvqnreeahwji = array(
            'format' => 'zip', 
            'filename' => 'BACS_DB_Backup' . date('Y-m-d') . '.zip',
            'add_drop' => TRUE, 
            'add_insert' => TRUE, 
            'newline' => "\n"               
        );
        $Voi33kqn25ty = & $this->dbutil->backup($Vvqnreeahwji);
        $this->load->helper('download');
        force_download('BACS_DB_Backup' . date('Y-m-d') . '.zip', $Voi33kqn25ty);

        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'settings',
            'module_field_id' => $this->session->userdata('user_id'),
            'activity' => 'activity_database_backup',
            'value1' => $Vvqnreeahwji['filename']
        );
        $this->settings_model->_table_name = 'tbl_activities';
        $this->settings_model->_primary_key = 'activities_id';
        $this->settings_model->save($Vvi3juzyk4ik);
    }

    public function activities() {
        $Vou4vxorrdoe['title'] = lang('activities');
        $Vou4vxorrdoe['activities_info'] = $this->db->where(array('user' => $this->session->userdata('user_id')))->order_by('activity_date', 'DESC')->get('tbl_activities')->result();

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/settings/activities', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    public function clear_activities() {
        $this->db->where(array('user' => $this->session->userdata('user_id')))->delete('tbl_activities');
        $Vvi3juzyk4ik = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'settings',
            'module_field_id' => $this->session->userdata('user_id'),
            'activity' => 'activity_deleted',
            'value1' => lang('all_activity') . date('Y-m-d')
        );
        $this->settings_model->_table_name = 'tbl_activities';
        $this->settings_model->_primary_key = 'activities_id';
        $this->settings_model->save($Vvi3juzyk4ik);

        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('activities_deleted');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/dashboard');
    }

}
