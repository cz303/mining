<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Tickets extends Admin_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('tickets_model');
    }

    public function index($Vrrb21ym0qp1 = NULL, $Vwfsll4zanwn = NULL) {
        $Vou4vxorrdoe['title'] = "Tickets Details"; 
        if (!empty($Vwfsll4zanwn)) {
            $Vou4vxorrdoe['tickets_info'] = $this->tickets_model->check_by(array('tickets_id' => $Vwfsll4zanwn), 'tbl_tickets');
        }
        if ($Vrrb21ym0qp1 == 'edit_tickets') {
            $Vou4vxorrdoe['active'] = 2;
        } else {
            $Vou4vxorrdoe['active'] = 1;
        }
        $Vou4vxorrdoe['page'] = lang('tickets');
        $Vou4vxorrdoe['sub_active'] = lang('all_tickets');
        if ($Vrrb21ym0qp1 == 'tickets_details') {
            $Vgvgl531vsfk = 'tickets_details';
        } elseif ($Vrrb21ym0qp1 == 'download_file') {

            $this->load->helper('download');

            if ($Vou4vxorrdoe['tickets_info']->upload_path) {
                $V522n35vv014 = file_get_contents($Vou4vxorrdoe['tickets_info']->upload_path); 
                force_download($Vou4vxorrdoe['tickets_info']->filename, $V522n35vv014);
            } else {
                $V4pigtpor0ln = "error";
                $Vb0xezrtkohj = 'Operation Fieled !';
                set_message($V4pigtpor0ln, $Vb0xezrtkohj);
                redirect('admin/tickets/index/tickets_details/' . $Vwfsll4zanwn);
            }
        } elseif ($Vrrb21ym0qp1 == 'save_reply') {
            $Vfztee0sc2jm['body'] = $this->input->post('body', TRUE);
            $Vfztee0sc2jm['tickets_id'] = $Vwfsll4zanwn;
            $Vfztee0sc2jm['replierid'] = $this->session->userdata('user_id');

            $this->tickets_model->_table_name = 'tbl_tickets_replies';
            $this->tickets_model->_primary_key = 'tickets_replies_id';
            $this->tickets_model->save($Vfztee0sc2jm);

            $this->tickets_model->set_action(array('tickets_id' => $Vwfsll4zanwn), array('status' => 'answered'), 'tbl_tickets');

            $Vsqvwshxevqn = $this->db->where(array('user_id' => $Vfztee0sc2jm['replierid']))->get('tbl_users')->row();

            if ($Vsqvwshxevqn->role_id == '2') {
                $this->get_notify_ticket_reply('admin', $Vfztee0sc2jm); 
            } else {
                $this->get_notify_ticket_reply('client', $Vfztee0sc2jm); 
            }
            
            $Vgwdaxxrfbfz = array(
                'user' => $this->session->userdata('user_id'),
                'module' => 'tickets',
                'module_field_id' => $Vwfsll4zanwn,
                'activity' => 'activity_reply_tickets',
                'icon' => 'fa-ticket',
                'value1' => $Vfztee0sc2jm['body'],
            );
            
            $this->tickets_model->_table_name = "tbl_activities"; 
            $this->tickets_model->_primary_key = "activities_id";
            $this->tickets_model->save($Vgwdaxxrfbfz);
			
			$V4pigtpor0ln = "success";
			$Vb0xezrtkohj = ('Reply saved successfully!');
			set_message($V4pigtpor0ln, $Vb0xezrtkohj);			
            redirect('admin/tickets/index/tickets_details/' . $Vwfsll4zanwn);
        } else {
            $Vgvgl531vsfk = 'tickets';
        }
        $this->tickets_model->_table_name = 'tbl_tickets';
        $this->tickets_model->_order_by = 'tickets_id';
        $Vou4vxorrdoe['all_tickets_info'] = $this->tickets_model->get();

        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsqvwshxevqn = $this->tickets_model->check_by(array('user_id' => $Vpxamdyeznwr), 'tbl_users');
        $Vou4vxorrdoe['role'] = $Vsqvwshxevqn->role_id;

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/tickets/' . $Vgvgl531vsfk, $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

    public function create_tickets($Vwfsll4zanwn = NULL) {
        $Vou4vxorrdoe = $this->tickets_model->array_from_post(array('ticket_code', 'subject', 'reporter', 'priority', 'departments_id', 'body', 'bill_no'));
        if (!empty($Vwfsll4zanwn)) {
            $Vou4vxorrdoe['status'] = 'open';
        }
        if (!empty($_FILES['upload_file']['name'])) {
            $Vgzteyhxyj4m = $this->input->post('upload_path');
            if ($Vgzteyhxyj4m) {
                unlink($Vgzteyhxyj4m);
            }
            $Vwk2nao2d33x = $this->tickets_model->uploadAllType('upload_file');
            $Vwk2nao2d33x == TRUE || redirect('admin/tickets');

            $Vou4vxorrdoe['upload_file'] = $Vwk2nao2d33x['path'];
            $Vou4vxorrdoe['filename'] = $Vwk2nao2d33x['fileName'];
            $Vou4vxorrdoe['upload_path'] = $Vwk2nao2d33x['fullPath'];
        }
		
		
		
        $this->tickets_model->_table_name = 'tbl_tickets';
        $this->tickets_model->_primary_key = 'tickets_id';
        $Vwfsll4zanwn = $this->tickets_model->save($Vou4vxorrdoe, $Vwfsll4zanwn);

        $this->send_tickets_info_by_email($Vou4vxorrdoe);
        
        $this->send_tickets_info_by_email($Vou4vxorrdoe, TRUE);

        
        $Vgwdaxxrfbfz = array(
            'user' => $this->session->userdata('user_id'),
            'module' => 'tickets',
            'module_field_id' => $Vwfsll4zanwn,
            'activity' => 'activity_create_tickets',
            'icon' => 'fa-ticket',
            'value1' => $Vou4vxorrdoe['ticket_code'],
        );
        
        $this->tickets_model->_table_name = "tbl_activities"; 
        $this->tickets_model->_primary_key = "activities_id";
        $this->tickets_model->save($Vgwdaxxrfbfz);

        
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('ticket_created');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/tickets');
    }

    function send_tickets_info_by_email($V3xlsz5upkfx, $Vpafgvo0k4r1 = NULL) {

        if (!empty($V3xlsz5upkfx['reporter'])) {
            $V3xlsz5upkfx['reporter'] = $V3xlsz5upkfx['reporter'];
        } else {
            $V3xlsz5upkfx['reporter'] = $this->session->userdata('user_id');
        }

        $Vvjytdkj1drk = $this->tickets_model->check_by(array('user_id' => $V3xlsz5upkfx['reporter']), 'tbl_users');
        $Veni1d3uvbtr = $this->tickets_model->check_by(array('ticket_code' => $V3xlsz5upkfx['ticket_code']), 'tbl_tickets');

        if (!empty($Vpafgvo0k4r1)) {
            $Vmh4nbblpmvn = $this->tickets_model->check_by(array('email_group' => 'ticket_client_email'), 'tbl_email_templates');
            $Vb0xezrtkohj = $Vmh4nbblpmvn->template_body;
            $Vld5fbk2n1id = $Vmh4nbblpmvn->subject;

            $Vpafgvo0k4r1_email = str_replace("{CLIENT_EMAIL}", $Vvjytdkj1drk->email, $Vb0xezrtkohj);
            $Vduaz42ofrna = str_replace("{TICKET_CODE}", $V3xlsz5upkfx['ticket_code'], $Vpafgvo0k4r1_email);
            $Vr4byvrgvjh0 = str_replace("{TICKET_LINK}", base_url() . 'client/tickets/index/tickets_details/' . $Veni1d3uvbtr->tickets_id, $Vduaz42ofrna);
            $Vb0xezrtkohj = str_replace("{SITE_NAME}", config_item('company_name'), $Vr4byvrgvjh0);
            $Vou4vxorrdoe['message'] = $Vb0xezrtkohj;

            $Vb0xezrtkohj = $this->load->view('email_template', $Vou4vxorrdoe, TRUE);

            $Vld5fbk2n1id = str_replace("[TICKET_CODE]", '[' . $V3xlsz5upkfx['ticket_code'] . ']', $Vld5fbk2n1id);

            $Verlwfuqi3pq['recipient'] = $Vvjytdkj1drk->email;
            $Verlwfuqi3pq['subject'] = $Vld5fbk2n1id;
            $Verlwfuqi3pq['message'] = $Vb0xezrtkohj;
            $Verlwfuqi3pq['resourceed_file'] = '';
            $this->tickets_model->send_email($Verlwfuqi3pq);
        } else {
            $Vmh4nbblpmvn = $this->tickets_model->check_by(array('email_group' => 'ticket_staff_email'), 'tbl_email_templates');

            $this->tickets_model->_table_name = 'tbl_account_details';
            $this->tickets_model->_order_by = 'departments_id';
            $Vsqvwshxevqn = $this->tickets_model->get_by(array('departments_id' => $V3xlsz5upkfx['departments_id']), FALSE);

            $Vb0xezrtkohj = $Vmh4nbblpmvn->template_body;
            $Vld5fbk2n1id = $Vmh4nbblpmvn->subject;

            $V2fyqk1cwwfu = str_replace("{TICKET_CODE}", $V3xlsz5upkfx['ticket_code'], $Vb0xezrtkohj);
            $Vv3fys3oye0w = str_replace("{REPORTER_EMAIL}", $Vvjytdkj1drk->email, $V2fyqk1cwwfu);
            $Vr4byvrgvjh0 = str_replace("{TICKET_LINK}", base_url() . 'admin/tickets/index/tickets_details/' . $Veni1d3uvbtr->tickets_id, $Vv3fys3oye0w);
            $Vb0xezrtkohj = str_replace("{SITE_NAME}", config_item('company_name'), $Vr4byvrgvjh0);
            $Vou4vxorrdoe['message'] = $Vb0xezrtkohj;
            $Vb0xezrtkohj = $this->load->view('email_template', $Vou4vxorrdoe, TRUE);

            $Vld5fbk2n1id = str_replace("[TICKET_CODE]", '[' . $V3xlsz5upkfx['ticket_code'] . ']', $Vld5fbk2n1id);

            $Verlwfuqi3pq['subject'] = $Vld5fbk2n1id;
            $Verlwfuqi3pq['message'] = $Vb0xezrtkohj;
            $Verlwfuqi3pq['resourceed_file'] = '';

            foreach ($Vsqvwshxevqn as $Vgqtgkyvapz0) {
                $V0ww5hgtxhgg = $this->tickets_model->check_by(array('user_id' => $Vgqtgkyvapz0->user_id), 'tbl_users');
                $Verlwfuqi3pq['recipient'] = $V0ww5hgtxhgg->email;
                $this->tickets_model->send_email($Verlwfuqi3pq);
            }
        }
    }

    function get_notify_ticket_reply($Vgzifgn0kkd1, $V3xlsz5upkfx) {
        $Vmh4nbblpmvn = $this->tickets_model->check_by(array('email_group' => 'ticket_reply_email'), 'tbl_email_templates');
        $Vvwdbwkl4nwv = $this->tickets_model->check_by(array('tickets_id' => $V3xlsz5upkfx['tickets_id']), 'tbl_tickets');

        $Vb0xezrtkohj = $Vmh4nbblpmvn->template_body;

        $Vld5fbk2n1id = $Vmh4nbblpmvn->subject;

        $Va5zq3yanff3 = $Vvwdbwkl4nwv->status;

        $V2fyqk1cwwfu = str_replace("{TICKET_CODE}", $Vvwdbwkl4nwv->ticket_code, $Vb0xezrtkohj);
        $Vfxloti5avie = str_replace("{TICKET_STATUS}", ucfirst($Va5zq3yanff3), $V2fyqk1cwwfu);
        $Vr4byvrgvjh0 = str_replace("{TICKET_LINK}", base_url() . 'client/tickets/index/tickets_details/' . $Vvwdbwkl4nwv->tickets_id, $Vfxloti5avie);
        $Vb0xezrtkohj = str_replace("{SITE_NAME}", config_item('company_name'), $Vr4byvrgvjh0);

        $Vld5fbk2n1id = str_replace("[TICKET_CODE]", '[' . $Vvwdbwkl4nwv->ticket_code . ']', $Vld5fbk2n1id);

        $Vou4vxorrdoe['message'] = $Vb0xezrtkohj;
        $Vb0xezrtkohj = $this->load->view('email_template', $Vou4vxorrdoe, TRUE);

        $Verlwfuqi3pq['subject'] = $Vld5fbk2n1id;
        $Verlwfuqi3pq['message'] = $Vb0xezrtkohj;
        $Verlwfuqi3pq['resourceed_file'] = '';

        switch ($Vgzifgn0kkd1) {
            case 'admin':
                $this->tickets_model->_table_name = 'tbl_account_details';
                $this->tickets_model->_order_by = 'departments_id';
                $Vsqvwshxevqn = $this->tickets_model->get_by(array('departments_id' => $Vvwdbwkl4nwv->departments_id), FALSE);

                foreach ($Vsqvwshxevqn as $Vgqtgkyvapz0) {
                    $V0ww5hgtxhgg = $this->tickets_model->check_by(array('user_id' => $Vgqtgkyvapz0->user_id), 'tbl_users');
                    $Verlwfuqi3pq['recipient'] = $V0ww5hgtxhgg->email;
                    $this->tickets_model->send_email($Verlwfuqi3pq);
                }
            default:
                $V0ww5hgtxhgg = $this->tickets_model->check_by(array('user_id' => $Vvwdbwkl4nwv->reporter), 'tbl_users');
                $Verlwfuqi3pq['recipient'] = $V0ww5hgtxhgg->email;
                $this->tickets_model->send_email($Verlwfuqi3pq);
        }
    }

    public function change_status($Vwfsll4zanwn, $Va5zq3yanff3) {
        $Vou4vxorrdoe['id'] = $Vwfsll4zanwn;
        $Vou4vxorrdoe['status'] = $Va5zq3yanff3;
        $Vou4vxorrdoe['modal_subview'] = $this->load->view('admin/tickets/_modal_change_status', $Vou4vxorrdoe, FALSE);
        $this->load->view('admin/_layout_modal', $Vou4vxorrdoe);
    }

    public function update_status($Vwfsll4zanwn, $Va5zq3yanff3) {

        $this->tickets_model->set_action(array('tickets_id' => $Vwfsll4zanwn), array('status' => $Va5zq3yanff3, 'comment' => $this->input->post('comment', TRUE)), 'tbl_tickets');
        
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = lang('ticket_status');
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/tickets');
    }

    public function answered() {
        $Vou4vxorrdoe['title'] = 'Answerd Ticket';
        $Vou4vxorrdoe['active'] = 1;
        $this->tickets_model->_table_name = 'tbl_tickets';
        $this->tickets_model->_order_by = 'tickets_id';
        $Vou4vxorrdoe['all_tickets_info'] = $this->tickets_model->get_by(array('status' => 'answered'), FALSE);

        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsqvwshxevqn = $this->tickets_model->check_by(array('user_id' => $Vpxamdyeznwr), 'tbl_users');
        $Vou4vxorrdoe['role'] = $Vsqvwshxevqn->role_id;

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/tickets/tickets', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

    public function closed() {
        $Vou4vxorrdoe['title'] = 'Answerd Ticket';
        $Vou4vxorrdoe['active'] = 1;
        $this->tickets_model->_table_name = 'tbl_tickets';
        $this->tickets_model->_order_by = 'tickets_id';
        $Vou4vxorrdoe['all_tickets_info'] = $this->tickets_model->get_by(array('status' => 'closed'), FALSE);

        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsqvwshxevqn = $this->tickets_model->check_by(array('user_id' => $Vpxamdyeznwr), 'tbl_users');
        $Vou4vxorrdoe['role'] = $Vsqvwshxevqn->role_id;

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/tickets/tickets', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

    public function open() {
        $Vou4vxorrdoe['title'] = 'Answerd Ticket';
        $Vou4vxorrdoe['active'] = 1;
        $this->tickets_model->_table_name = 'tbl_tickets';
        $this->tickets_model->_order_by = 'tickets_id';
        $Vou4vxorrdoe['all_tickets_info'] = $this->tickets_model->get_by(array('status' => 'open'), FALSE);

        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsqvwshxevqn = $this->tickets_model->check_by(array('user_id' => $Vpxamdyeznwr), 'tbl_users');
        $Vou4vxorrdoe['role'] = $Vsqvwshxevqn->role_id;

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/tickets/tickets', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

    public function in_progress() {
        $Vou4vxorrdoe['title'] = 'Answerd Ticket';
        $Vou4vxorrdoe['active'] = 1;
        $this->tickets_model->_table_name = 'tbl_tickets';
        $this->tickets_model->_order_by = 'tickets_id';
        $Vou4vxorrdoe['all_tickets_info'] = $this->tickets_model->get_by(array('status' => 'in_progress'), FALSE);

        $Vpxamdyeznwr = $this->session->userdata('user_id');
        $Vsqvwshxevqn = $this->tickets_model->check_by(array('user_id' => $Vpxamdyeznwr), 'tbl_users');
        $Vou4vxorrdoe['role'] = $Vsqvwshxevqn->role_id;

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/tickets/tickets', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe); 
    }

    public function delete($Vrrb21ym0qp1, $Vwfsll4zanwn, $Vgqbfn4lrrtl = NULL) {
        if ($Vrrb21ym0qp1 == 'delete_ticket_replay') {
            $this->tickets_model->_table_name = 'tbl_tickets_replies';
            $this->tickets_model->_primary_key = 'tickets_replies_id';
            $this->tickets_model->delete($Vgqbfn4lrrtl);
            
            redirect('admin/tickets/index/tickets_details/' . $Vwfsll4zanwn);
        }if ($Vrrb21ym0qp1 == 'delete_tickets') {
            $this->tickets_model->_table_name = 'tbl_tickets_replies';
            $this->tickets_model->delete_multiple(array('tickets_id' => $Vwfsll4zanwn));
			
            $this->tickets_model->_table_name = 'tbl_tickets';
            $this->tickets_model->_primary_key = 'tickets_id';
            $this->tickets_model->delete($Vwfsll4zanwn);
            redirect('admin/tickets/index');
        }
    }

}
