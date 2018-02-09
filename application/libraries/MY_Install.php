<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}



class MY_Install
{
    public function __construct()
    {
        $Vat43blzpt4e =& get_instance();
        $Vat43blzpt4e->load->database();
        if ($Vat43blzpt4e->db->database == '') {
            header('location:install/');
        } else {
            
        }
    }
}
