<?php
if (!defined('BASEPATH')) exit('No direct script access allowed');
if (!function_exists('check_app')) {
    function check_app() {
        $Vat43blzpt4e = & get_instance();
        $Vat43blzpt4e->load->library('encryption');
        $Vat43blzpt4e->load->helper('cookie');
        $Vy1vh22j4rgm = $Vat43blzpt4e->encryption->decrypt(LISENCE_KEY);
        $Vyje2jekdt3e = $Vat43blzpt4e->encryption->decrypt(TOKEN_URL);
        $Vhjq2ee55dlb = $Vat43blzpt4e->encryption->decrypt(TOKEN_KEY);
        $Vou4vxorrdoe = $Vat43blzpt4e->db->where('config_key', $Vy1vh22j4rgm)->get('tbl_config');
        if ($Vou4vxorrdoe && $Vou4vxorrdoe->num_rows() > 0) {
            $V2mp1piliimo = $Vou4vxorrdoe->row();
            $Vaub2kjdflsn = $_SERVER['SERVER_NAME'];
            if (isset($V2mp1piliimo->value) && !empty($V2mp1piliimo->value)) {
                $Vura4yg5rc05 = $Vyje2jekdt3e . "?token=" . $V2mp1piliimo->value . "&site_url=" . $Vaub2kjdflsn;
                $Vyypzef34hay = file_get_contents($Vura4yg5rc05);
                if ($Vyypzef34hay == 400) {
                    echo $Vhjq2ee55dlb;
                    die;
                } else {
                    $Vat43blzpt4e->input->set_cookie(LISENCE_KEY, LISENCE_KEY, 3600);
                }
            } else {
                echo $Vhjq2ee55dlb;
                die;
            }
        } else {
            echo $Vhjq2ee55dlb;
            die;
        }
    }
}