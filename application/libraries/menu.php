<?php

class Menu {

    public function dynamicMenu() {

        $Vat43blzpt4e = & get_instance();

        $Vpxamdyeznwr = $Vat43blzpt4e->session->userdata('user_id');
        
        
        $Vwolyvscyzas = $Vat43blzpt4e->session->userdata('user_type');
        
        if ($Vwolyvscyzas != 1) {
            $V1hhmjb1hnsl = mysql_query("SELECT tbl_user_role.*,tbl_menu.*
                                        FROM tbl_user_role
                                        INNER JOIN tbl_menu
                                        ON tbl_user_role.menu_id=tbl_menu.menu_id
                                        WHERE tbl_user_role.user_id=$Vpxamdyeznwr
                                        ORDER BY sort;");
        } else { 
            $V1hhmjb1hnsl = mysql_query("SELECT menu_id, label, link, icon, parent FROM tbl_menu ORDER BY sort");
        }
        
        $Va0wqjr5n5w4 = array(
            'items' => array(),
            'parents' => array()
        );

        
        while ($Vaukiiv3p4cm = mysql_fetch_assoc($V1hhmjb1hnsl)) {

            
            $Va0wqjr5n5w4['items'][$Vaukiiv3p4cm['menu_id']] = $Vaukiiv3p4cm;

            
            $Va0wqjr5n5w4['parents'][$Vaukiiv3p4cm['parent']][] = $Vaukiiv3p4cm['menu_id'];
        }
        return $Vwwmyjdeanij = $this->buildMenu(0, $Va0wqjr5n5w4);
    }

    public function buildMenu($V3jkqexf4nr0, $Va0wqjr5n5w4, $Vbisy5oskm1h = NULL) {

        $Vxcvxsbzpwbz = "";
        
        if (isset($Va0wqjr5n5w4['parents'][$V3jkqexf4nr0])) {
            if (!empty($Vbisy5oskm1h)) {
                $Vxcvxsbzpwbz .= "<ul class='treeview-menu'>\n";
            } else {
                $Vxcvxsbzpwbz .= "<ul class='sidebar-menu'>\n";
            }
            foreach ($Va0wqjr5n5w4['parents'][$V3jkqexf4nr0] as $Vygrdajnruva) {
                
                $Vwbpa3giaw5f = $this->active_menu_id($Va0wqjr5n5w4['items'][$Vygrdajnruva]['menu_id']);
                if ($Vwbpa3giaw5f) {
                    $Ve1prh33jync = 'active';
                } else {
                    $Ve1prh33jync = '';
                }

                if (!isset($Va0wqjr5n5w4['parents'][$Vygrdajnruva])) { 
                    $Vxcvxsbzpwbz .= "<li class='" . $Ve1prh33jync . "' >\n  <a href='" . base_url() . $Va0wqjr5n5w4['items'][$Vygrdajnruva]['link'] . "'> <i class='" . $Va0wqjr5n5w4['items'][$Vygrdajnruva]['icon'] . "'></i><span>" . lang($Va0wqjr5n5w4['items'][$Vygrdajnruva]['label']) . "</span></a>\n</li> \n";
                }

                if (isset($Va0wqjr5n5w4['parents'][$Vygrdajnruva])) { 
                    $Vxcvxsbzpwbz .= "<li class='treeview " . $Ve1prh33jync . "'>\n  <a href='" . base_url() . $Va0wqjr5n5w4['items'][$Vygrdajnruva]['link'] . "'> <i class='" . $Va0wqjr5n5w4['items'][$Vygrdajnruva]['icon'] . "'></i><span>" . lang($Va0wqjr5n5w4['items'][$Vygrdajnruva]['label']) . "</span><i class='fa fa-angle-right pull-right'></i></a>\n";
                    $Vxcvxsbzpwbz .= self::buildMenu($Vygrdajnruva, $Va0wqjr5n5w4, true);
                    $Vxcvxsbzpwbz .= "</li> \n";
                }
            }
            $Vxcvxsbzpwbz .= "</ul> \n";
        }
        return $Vxcvxsbzpwbz;
    }

    public function active_menu_id($Vwfsll4zanwn) {
        $Vat43blzpt4e = & get_instance();
        $Ve1prh33jyncId = $Vat43blzpt4e->session->userdata('menu_active_id');

        if (!empty($Ve1prh33jyncId)) {
            foreach ($Ve1prh33jyncId as $Vbwxjmxmw0ua) {
                if ($Vwfsll4zanwn == $Vbwxjmxmw0ua) {
                    return TRUE;
                }
            }
        }
        return FALSE;
    }

}
