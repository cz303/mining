<?php
class Cart extends MY_Controller {

	function __construct()
	{
		parent::__construct();
        $this->load->model('client_model');
        $this->load->model('settings_model');
		$this->load->model('Page_model');
		$this->lang->load('page');
	}
	function index()
	{
		
	}

	function page($Vwfsll4zanwn = false)
	{
		
		$Vou4vxorrdoe['page']	= $this->Page_model->get_page($Vwfsll4zanwn);
		if(!$Vou4vxorrdoe['page'])
		{
			show_404();
		}
		$this->load->model('Page_model');
		$Vou4vxorrdoe['base_url']			= $this->uri->segment_array();
		
			
		$Vou4vxorrdoe['meta']				= $Vou4vxorrdoe['page']->meta;
		$Vou4vxorrdoe['seo_title']			= (!empty($Vou4vxorrdoe['page']->seo_title))?$Vou4vxorrdoe['page']->seo_title:$Vou4vxorrdoe['page']->title;
		$Vou4vxorrdoe['breadcrumbs'] = "Buy";
        $Vou4vxorrdoe['title'] = $Vou4vxorrdoe['page']->title;
        $this->load->view('client/page', $Vou4vxorrdoe);
       
	}
}