<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');



class Message extends Client_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('message_model');
    }

    public function index() {
        $Vou4vxorrdoe['breadcrumbs'] = lang('private_chat');
        $Vou4vxorrdoe['title'] = lang('private_chat');
        $Vou4vxorrdoe['page'] = lang('private_chat');
        
        $Vou4vxorrdoe['subview'] = $this->load->view('client/chat', $Vou4vxorrdoe, TRUE);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }

    public function get_chat() {
        $Vou4vxorrdoe['breadcrumbs'] = lang('private_chat');
        $Vou4vxorrdoe['title'] = lang('private_chat');
        $Vou4vxorrdoe['subview'] = $this->load->view('client/chat', $Vou4vxorrdoe, TRUE);
        $this->load->view('client/_layout_main', $Vou4vxorrdoe);
    }

    public function send_message() {
        $Vou4vxorrdoe = $this->message_model->array_from_post(array('message', 'receive_user_id'));
        $Vou4vxorrdoe['send_user_id'] = $this->session->userdata('user_id');
        $this->message_model->_table_name = 'tbl_private_message_send';
        $this->message_model->_primary_key = 'private_message_send_id';
        $this->message_model->save($Vou4vxorrdoe);
        redirect('client/message/get_chat/' . $Vou4vxorrdoe['receive_user_id']);
    }

}
