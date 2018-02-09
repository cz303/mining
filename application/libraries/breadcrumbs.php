<?php

class Breadcrumbs {

    public function build_breadcrumbs() {

        $Vat43blzpt4e = & get_instance();
        $Vwfsll4zanwn = $Vat43blzpt4e->session->userdata('menu_active_id');
		if(!$Vwfsll4zanwn) {			$Vwfsll4zanwn = array();		}
        $V1uxk50y403l = array_reverse($Vwfsll4zanwn);
        $Vn3xrjgmg04q = "";
        foreach ($V1uxk50y403l as $Vaopcylybqoj) {

            $Va0wqjr5n5w4 = mysql_query("SELECT tbl_menu.*
                                        FROM tbl_menu
                                        WHERE tbl_menu.menu_id=$Vaopcylybqoj ;");

            while ($Vaukiiv3p4cm = mysql_fetch_assoc($Va0wqjr5n5w4)) {

                $Vn3xrjgmg04q .= "<li>\n  <a href='" . base_url() . $Vaukiiv3p4cm['link'] . "'>" . lang($Vaukiiv3p4cm['label']) . "</a>\n</li> \n";
            }
        }

        return $Vn3xrjgmg04q;
    }

}
