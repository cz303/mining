<?php
class Notification_message {
    function message() {
        $Vat43blzpt4e = & get_instance();
        $Vat43blzpt4e->load->helper('cookie');
        $Vat43blzpt4e->load->helper('check');
        $Vtkqa5v52z3r = $Vat43blzpt4e->input->cookie(LISENCE_KEY);
        if (empty($Vtkqa5v52z3r)) {
            check_app();
        }
    }
}
?>