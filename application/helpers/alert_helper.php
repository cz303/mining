<?php


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('message_box')) {

    function message_box($Ve5oakwbk001, $Vdlzdog4tlmc = TRUE) {
        $Vat43blzpt4e = & get_instance();
        $Vb0xezrtkohj = $Vat43blzpt4e->session->flashdata($Ve5oakwbk001);
        $Vooobfyx25do = '';

        if ($Vb0xezrtkohj) {
            switch ($Ve5oakwbk001) {
                case 'success':
                    $Vooobfyx25do = '<script type="text/JavaScript">$(document).ready(function () {'
                            . 'toastr.success("' . $Vb0xezrtkohj . '");});</script>';
                    break;
                case 'error':
                    $Vooobfyx25do = '<script type="text/JavaScript">$(document).ready(function () {'
                            . 'toastr.error("' . $Vb0xezrtkohj . '");});</script>';
                    break;
                case 'info':
                    $Vooobfyx25do = '<script type="text/JavaScript">$(document).ready(function () {'
                            . 'toastr.info("' . $Vb0xezrtkohj . '");});</script>';
                    break;
                case 'warning':
                    $Vooobfyx25do = '<script type="text/JavaScript">$(document).ready(function () {'
                            . 'toastr.warning("' . $Vb0xezrtkohj . '");});</script>';
                    break;
            }
            return $Vooobfyx25do;
        }
    }

}

if (!function_exists('set_message')) {

    function set_message($V4pigtpor0ln, $Vb0xezrtkohj) {
        $Vat43blzpt4e = & get_instance();
        $Vat43blzpt4e->session->set_flashdata($V4pigtpor0ln, $Vb0xezrtkohj);
    }

}