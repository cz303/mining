<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');


if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Navigation extends MY_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('navigation_model');
       
    }

    public function index() {
        $Vou4vxorrdoe['page'] = 'user';
        $Vou4vxorrdoe['menu'] = array("navigation_manager" => 1, "manage_navigation" => 1);
        $Vou4vxorrdoe['title'] = "Manage Navigation";

        $this->navigation_model->_table_name = "tbl_menu"; 
        $this->navigation_model->_order_by = "menu_id";
        $Vou4vxorrdoe['nav'] = $this->navigation_model->get();

        $Vou4vxorrdoe['subview'] = $this->load->view('admin/menu/manage_navigation', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    
    public function add_navigation($Vwfsll4zanwn = NULL) {
        $Vou4vxorrdoe['title'] = "Add New Navigation";
        $Vou4vxorrdoe['page'] = 'user';
        $this->navigation_model->_table_name = "tbl_menu"; 
        $this->navigation_model->_order_by = "menu_id";
        if ($Vwfsll4zanwn) {
            $Vou4vxorrdoe['menu_info'] = $this->navigation_model->get_by(array('menu_id' => $Vwfsll4zanwn,), TRUE);
            if (empty($Vou4vxorrdoe['menu_info'])) {
                
                $V4pigtpor0ln = "error";
                $Vb0xezrtkohj = "Sorry no record found!";
                set_message($V4pigtpor0ln, $Vb0xezrtkohj);
                redirect('admin/navigation'); 
            }
        } else {
            $Vou4vxorrdoe['menu_info'] = $this->navigation_model->get_new_menuInfo();
        }

        $Vou4vxorrdoe['nav'] = $this->navigation_model->get();
        $Vou4vxorrdoe['subview'] = $this->load->view('admin/menu/add_navigation', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);
    }

    
    public function save_navigation($Vwfsll4zanwn = NULL) {
        $Vou4vxorrdoe = $this->navigation_model->array_from_post(array('label', 'link', 'icon', 'sort'));
        $Vou4vxorrdoe['parent'] = $this->input->post('parent');
        if (empty($Vou4vxorrdoe['parent'])) {
            $Vou4vxorrdoe['parent'] = 0;
        }

        $this->navigation_model->_table_name = "tbl_menu"; 
        $this->navigation_model->_primary_key = "menu_id"; 
        $this->navigation_model->_order_by = "menu_id";
        $this->navigation_model->save($Vou4vxorrdoe, $Vwfsll4zanwn);

        
        $V4pigtpor0ln = "success";
        $Vb0xezrtkohj = "Save Navigation Successfully!";
        set_message($V4pigtpor0ln, $Vb0xezrtkohj);
        redirect('admin/navigation/add_navigation'); 
    }

    
    public function delete_navigation($Vwfsll4zanwn = NULL) {
        $this->navigation_model->_table_name = "tbl_menu"; 
        $this->navigation_model->_primary_key = "menu_id"; 
        $this->navigation_model->_order_by = "menu_id";
        if ($Vwfsll4zanwn) {
            $Vwbpa3giaw5f = $this->navigation_model->get_by(array('menu_id' => $Vwfsll4zanwn,), TRUE);

            if (empty($Vwbpa3giaw5f)) {
                
                $V4pigtpor0ln = "error";
                $Vb0xezrtkohj = "Sorry no record for Delete!";
                set_message($V4pigtpor0ln, $Vb0xezrtkohj);
                redirect('admin/navigation'); 
            } else {
                $V3jkqexf4nr0 = $this->navigation_model->get_by(array('parent' => $Vwfsll4zanwn,), TRUE);

                if (empty($V3jkqexf4nr0)) {
                    $this->navigation_model->delete($Vwfsll4zanwn);
                    
                    $V4pigtpor0ln = "success";
                    $Vb0xezrtkohj = "Delete Successfully!";
                    set_message($V4pigtpor0ln, $Vb0xezrtkohj);
                    redirect('admin/navigation'); 
                } else {
                    
                    $V4pigtpor0ln = "error";
                    $Vb0xezrtkohj = "You can not delete, this recored already used!";
                    set_message($V4pigtpor0ln, $Vb0xezrtkohj);
                    redirect('admin/navigation'); 
                }
            }
        }
    }

}
