<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');


class Checkout extends Client_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('invoice_model');
    }

    function pay($Vy4cvwhsoy02 = NULL) {
        $Vbd5hi5m0q40 = $this->invoice_model->check_by(array('invoices_id' => $Vy4cvwhsoy02), 'tbl_invoices');

        $Vsrsbnqkozx1 = $this->invoice_model->calculate_to('invoice_due', $Vy4cvwhsoy02);
        if ($Vsrsbnqkozx1 <= 0) {
            $Vsrsbnqkozx1 = 0.00;
        }
        $Vou4vxorrdoe['invoice_info'] = array(
            'item_name' => $Vbd5hi5m0q40->reference_no,
            'item_number' => $Vy4cvwhsoy02,
            'currency' => $Vbd5hi5m0q40->currency,
            'amount' => $Vsrsbnqkozx1);

        $Vou4vxorrdoe['subview'] = $this->load->view('client/checkout/confimation_form', $Vou4vxorrdoe, FALSE);
        $this->load->view('client/_layout_modal', $Vou4vxorrdoe);
    }

    function process() {

        if ($this->input->post()) {
            $Vjubg4lnj1nn = array();
            $Vy4cvwhsoy02 = $this->input->post('invoice_id');
            if (!isset($_POST['token'])) {
                $Vjubg4lnj1nn['token'] = 'The order cannot be processed. Please make sure you have JavaScript enabled and try again.';
            }
            
            if (empty($Vjubg4lnj1nn)) {

                require_once('./' . APPPATH . 'libraries/2checkout/Twocheckout.php');

                Twocheckout::privateKey(config_item('2checkout_private_key'));
                Twocheckout::sellerId(config_item('2checkout_seller_id'));
                Twocheckout::sandbox(false);
                $Vsqvwshxevqn = $this->invoice_model->check_by(array('user_id' => $this->session->userdata('user_id')), 'tbl_users');
                $Vbd5hi5m0q40 = $this->invoice_model->check_by(array('invoices_id' => $Vy4cvwhsoy02), 'tbl_invoices');
                $Vhy0thfmrzac = $this->invoice_model->check_by(array('client_id' => $Vbd5hi5m0q40->client_id), 'tbl_client');

                try {

                    $V4gcilavv2ph = Twocheckout_Charge::auth(array(
                                "merchantOrderId" => $Vbd5hi5m0q40->invoices_id,
                                "token" => $this->input->post('token'),
                                "currency" => $Vbd5hi5m0q40->currency,
                                "total" => $this->input->post('amount'),
                                "billingAddr" => array(
                                    "name" => $Vhy0thfmrzac->name,
                                    "addrLine1" => $Vhy0thfmrzac->address,
                                    "city" => $Vhy0thfmrzac->city,
                                    "country" => $Vhy0thfmrzac->country,
                                    "email" => $Vhy0thfmrzac->email,
                                    "phoneNumber" => $Vhy0thfmrzac->phone
                                )
                    ));


                    if ($V4gcilavv2ph['response']['responseCode'] == 'APPROVED') {
                        $Vk0sdsugtrb0 = array(
                            'invoices_id' => $V4gcilavv2ph['response']['merchantOrderId'],
                            'paid_by' => $Vhy0thfmrzac->client_id,
                            'payer_email' => $V4gcilavv2ph['response']['billingAddr']['email'],
                            'payment_method' => '1',
                            'notes' => 'Paid by ' . $Vsqvwshxevqn->username,
                            'amount' => $V4gcilavv2ph['response']['total'],
                            'trans_id' => $V4gcilavv2ph['response']['transactionId'],
                            'month_paid' => date('m'),
                            'year_paid' => date('Y'),
                            'payment_date' => date('d-m-Y H:i:s')
                        );

                        $this->invoice_model->_table_name = 'tbl_payments';
                        $this->invoice_model->_primary_key = 'payments_id';
                        $this->invoice_model->save($Vk0sdsugtrb0);

                        $V4qlhigiqjlm = $this->invoice_model->client_currency_sambol($Vhy0thfmrzac->client_id);
                        $Vvi3juzyk4ik = array(
                            'user' => $this->session->userdata('user_id'),
                            'module' => 'invoice',
                            'module_field_id' => $Vbd5hi5m0q40->invoices_id,
                            'activity' => 'activity_new_payment',
                            'icon' => 'fa-usd',
                            'value1' => $V4qlhigiqjlm->symbol . ' ' . $V4gcilavv2ph['response']['total'],
                            'value2' => $Vbd5hi5m0q40->reference_no,
                        );
                        $this->invoice_model->_table_name = 'tbl_activities';
                        $this->invoice_model->_primary_key = 'activities_id';
                        $this->invoice_model->save($Vvi3juzyk4ik);
                    }
                } catch (Twocheckout_Error $Vnhm0uuykimv) {
                    $V4pigtpor0ln = 'error';
                    $Vb0xezrtkohj = 'Payment declined with error: ' . $Vnhm0uuykimv->getMessage();
                    set_message($V4pigtpor0ln, $Vb0xezrtkohj);
                    redirect('client/invoice/manage_invoice/invoice_details/' . $Vbd5hi5m0q40->invoices_id);
                }
            }
        }
    }

    function _send_payment_email($Vy4cvwhsoy02, $Vfbhfqqg4tdm) {
        $Vb0xezrtkohj = Applib::get_table_field(Applib::$Vnhm0uuykimvmail_templates_table, array('email_group' => 'payment_email'
                        ), 'template_body');
        $Vld5fbk2n1id = Applib::get_table_field(Applib::$Vnhm0uuykimvmail_templates_table, array('email_group' => 'payment_email'
                        ), 'subject');
        $V4qlhigiqjlm = Applib::get_table_field(Applib::$Vfdt434nggjv, array('inv_id' => $Vy4cvwhsoy02), 'currency');

        $V0u50fgxxvtw = str_replace("{INVOICE_CURRENCY}", $V4qlhigiqjlm, $Vb0xezrtkohj);
        $Vzqszcbo4neu = str_replace("{PAID_AMOUNT}", $Vfbhfqqg4tdm, $V0u50fgxxvtw);
        $Vb0xezrtkohj = str_replace("{SITE_NAME}", config_item('company_name'), $Vzqszcbo4neu);

        $Vpafgvo0k4r1 = Applib::get_table_field(Applib::$Vfdt434nggjv, array('inv_id' => $Vy4cvwhsoy02), 'client');

        $Vldi4no4khge = Applib::get_table_field(Applib::$Vlabcm3kfcn1, array('co_id' => $Vpafgvo0k4r1), 'company_email');
        $Verlwfuqi3pq = array(
            'recipient' => $Vldi4no4khge,
            'subject' => '[ ' . config_item('company_name') . ' ]' . $Vld5fbk2n1id,
            'message' => $Vb0xezrtkohj,
            'resourceed_file' => ''
        );

        modules::run('fomailer/send_email', $Verlwfuqi3pq);
    }

    function _log_activity($Vy4cvwhsoy02, $Vvi3juzyk4ik, $Vsmsnr35xnu2, $Vbt51zuiztyf, $V5wl2xz4upqk = '', $Vmzndbpp20rk = '') {
        $this->db->set('module', 'invoices');
        $this->db->set('module_field_id', $Vy4cvwhsoy02);
        $this->db->set('user', $Vbt51zuiztyf);
        $this->db->set('activity', $Vvi3juzyk4ik);
        $this->db->set('icon', $Vsmsnr35xnu2);
        $this->db->set('value1', $V5wl2xz4upqk);
        $this->db->set('value2', $Vmzndbpp20rk);
        $this->db->insert('activities');
    }

}

