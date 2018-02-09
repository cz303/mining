<?php
class Pages extends Admin_Controller
{
	
	function __construct()
	{
		parent::__construct();

		$this->load->model('Page_model');
		$this->lang->load('page');
	}
		
	function index()
	{
		$Vou4vxorrdoe['pages']		= $this->Page_model->get_pages();
		
		$Vou4vxorrdoe['title'] = config_item('company_name');
        $Vou4vxorrdoe['page'] = 'Page list';

		$Vou4vxorrdoe['subview'] = $this->load->view('admin/pages', $Vou4vxorrdoe, TRUE);
        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);

		
	}
	
	
	function form($Vwfsll4zanwn = false)
	{
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		
		$Vou4vxorrdoe['id']			= '';
		$Vou4vxorrdoe['title']		= '';
		$Vou4vxorrdoe['menu_title']	= '';
		$Vou4vxorrdoe['slug']		= '';
		$Vou4vxorrdoe['sequence']	= 0;
		$Vou4vxorrdoe['parent_id']	= 0;
		$Vou4vxorrdoe['content']	= '';
		$Vou4vxorrdoe['seo_title']	= '';
		$Vou4vxorrdoe['meta']		= '';
		
		$Vou4vxorrdoe['page_title']	= lang('page_form');
		$Vou4vxorrdoe['pages']		= $this->Page_model->get_pages();
		
		if($Vwfsll4zanwn)
		{
			
			$Vmt0302hgn5x	= $this->Page_model->get_page($Vwfsll4zanwn);

			if(!$Vmt0302hgn5x)
			{
				
				$this->session->set_flashdata('error', lang('error_page_not_found'));
				redirect('admin/pages');
			}
			
			
			
			$Vou4vxorrdoe['id']				= $Vmt0302hgn5x->id;
			$Vou4vxorrdoe['parent_id']		= $Vmt0302hgn5x->parent_id;
			$Vou4vxorrdoe['title']			= $Vmt0302hgn5x->title;
			$Vou4vxorrdoe['menu_title']		= $Vmt0302hgn5x->menu_title;
			$Vou4vxorrdoe['sequence']		= $Vmt0302hgn5x->sequence;
			$Vou4vxorrdoe['content']		= $Vmt0302hgn5x->content;
			$Vou4vxorrdoe['seo_title']		= $Vmt0302hgn5x->seo_title;
			$Vou4vxorrdoe['meta']			= $Vmt0302hgn5x->meta;
			$Vou4vxorrdoe['slug']			= $Vmt0302hgn5x->slug;
		}
		
		$this->form_validation->set_rules('title', 'lang:title', 'trim|required');
		$this->form_validation->set_rules('menu_title', 'lang:menu_title', 'trim');
		$this->form_validation->set_rules('slug', 'lang:slug', 'trim');
		$this->form_validation->set_rules('seo_title', 'lang:seo_title', 'trim');
		$this->form_validation->set_rules('meta', 'lang:meta', 'trim');
		$this->form_validation->set_rules('sequence', 'lang:sequence', 'trim|integer');
		$this->form_validation->set_rules('parent_id', 'lang:parent_id', 'trim|integer');
		$this->form_validation->set_rules('content', 'lang:content', 'trim');
		
		
		if($this->form_validation->run() == false)
		{
		       $Vou4vxorrdoe['page'] = 'Page Form';

			$Vou4vxorrdoe['subview'] = $this->load->view('admin/page_form', $Vou4vxorrdoe, TRUE);
	        $this->load->view('admin/_layout_main', $Vou4vxorrdoe);

			}
		else
		{
			$this->load->helper('text');
			
			
			$Vokxennv42cy = $this->input->post('slug');
			
			
			if(empty($Vokxennv42cy) || $Vokxennv42cy=='')
			{
				$Vokxennv42cy = $this->input->post('title');
			}
			
			$Vokxennv42cy	= url_title(convert_accented_characters($Vokxennv42cy), 'dash', TRUE);
			
			
			$this->load->model('Routes_model');
			if($Vwfsll4zanwn)
			{
				$Vokxennv42cy		= $this->Routes_model->validate_slug($Vokxennv42cy, $Vmt0302hgn5x->route_id);
				$Ve3y2ojdfxim	= $Vmt0302hgn5x->route_id;
			}
			else
			{
				$Vokxennv42cy			= $this->Routes_model->validate_slug($Vokxennv42cy);
				$V2gesnavbtsb['slug']	= $Vokxennv42cy;	
				$Ve3y2ojdfxim		= $this->Routes_model->save($V2gesnavbtsb);
			}
			
			
			$Vc3hjeoaqlb2 = array();
			$Vc3hjeoaqlb2['id']			= $Vwfsll4zanwn;
			$Vc3hjeoaqlb2['parent_id']	= $this->input->post('parent_id');
			$Vc3hjeoaqlb2['title']		= $this->input->post('title');
			$Vc3hjeoaqlb2['menu_title']	= $this->input->post('menu_title'); 
			$Vc3hjeoaqlb2['sequence']	= $this->input->post('sequence');
			$Vc3hjeoaqlb2['content']	= $this->input->post('content');
			$Vc3hjeoaqlb2['seo_title']	= $this->input->post('seo_title');
			$Vc3hjeoaqlb2['meta']		= $this->input->post('meta');
			$Vc3hjeoaqlb2['route_id']	= $Ve3y2ojdfxim;
			$Vc3hjeoaqlb2['slug']		= $Vokxennv42cy;
			
			
			if ($Vc3hjeoaqlb2['menu_title'] == '')
			{
				$Vc3hjeoaqlb2['menu_title']	= $this->input->post('title');
			}
			
			
			$Vmt0302hgn5x_id	= $this->Page_model->save($Vc3hjeoaqlb2);
			
			
			$V2gesnavbtsb['id']	= $Ve3y2ojdfxim;
			$V2gesnavbtsb['slug']	= $Vokxennv42cy;
			$V2gesnavbtsb['route']	= 'cart/page/'.$Vmt0302hgn5x_id;
			
			$this->Routes_model->save($V2gesnavbtsb);
			
			$this->session->set_flashdata('message', lang('message_saved_page'));
			
			
			redirect('admin/pages');
		}
	}
	
	function link_form($Vwfsll4zanwn = false)
	{
	
		$this->load->helper('url');
		$this->load->helper('form');
		$this->load->library('form_validation');
		
		
		$Vou4vxorrdoe['id']			= '';
		$Vou4vxorrdoe['title']		= '';
		$Vou4vxorrdoe['url']		= '';
		$Vou4vxorrdoe['new_window']	= false;
		$Vou4vxorrdoe['sequence']	= 0;
		$Vou4vxorrdoe['parent_id']	= 0;

		
		$Vou4vxorrdoe['page_title']	= lang('link_form');
		$Vou4vxorrdoe['pages']		= $this->Page_model->get_pages();
		if($Vwfsll4zanwn)
		{
			$Vmt0302hgn5x			= $this->Page_model->get_page($Vwfsll4zanwn);

			if(!$Vmt0302hgn5x)
			{
				
				$this->session->set_flashdata('error', lang('error_link_not_found'));
				redirect($this->config->item('admin_folder').'/pages');
			}
			
			
			
			$Vou4vxorrdoe['id']			= $Vmt0302hgn5x->id;
			$Vou4vxorrdoe['parent_id']	= $Vmt0302hgn5x->parent_id;
			$Vou4vxorrdoe['title']		= $Vmt0302hgn5x->title;
			$Vou4vxorrdoe['url']		= $Vmt0302hgn5x->url;
			$Vou4vxorrdoe['new_window']	= (bool)$Vmt0302hgn5x->new_window;
			$Vou4vxorrdoe['sequence']	= $Vmt0302hgn5x->sequence;
		}
		
		$this->form_validation->set_rules('title', 'lang:title', 'trim|required');
		$this->form_validation->set_rules('url', 'lang:url', 'trim|required');
		$this->form_validation->set_rules('sequence', 'lang:sequence', 'trim|integer');
		$this->form_validation->set_rules('new_window', 'lang:new_window', 'trim|integer');
		$this->form_validation->set_rules('parent_id', 'lang:parent_id', 'trim|integer');
		
		
		if($this->form_validation->run() == false)
		{
			$this->view($this->config->item('admin_folder').'/link_form', $Vou4vxorrdoe);
		}
		else
		{	
			$Vc3hjeoaqlb2 = array();
			$Vc3hjeoaqlb2['id']			= $Vwfsll4zanwn;
			$Vc3hjeoaqlb2['parent_id']	= $this->input->post('parent_id');
			$Vc3hjeoaqlb2['title']		= $this->input->post('title');
			$Vc3hjeoaqlb2['menu_title']	= $this->input->post('title'); 
			$Vc3hjeoaqlb2['url']		= $this->input->post('url');
			$Vc3hjeoaqlb2['sequence']	= $this->input->post('sequence');
			$Vc3hjeoaqlb2['new_window']	= $this->input->post('new_window');
			
			
			$this->Page_model->save($Vc3hjeoaqlb2);
			
			$this->session->set_flashdata('message', lang('message_saved_link'));
			
			
			redirect($this->config->item('admin_folder').'/pages');
		}
	}
	
	
	function delete($Vwfsll4zanwn)
	{
		
		$Vmt0302hgn5x	= $this->Page_model->get_page($Vwfsll4zanwn);
		
		if($Vmt0302hgn5x)
		{
			$this->load->model('Routes_model');
			
			$this->Routes_model->delete($Vmt0302hgn5x->route_id);
			$this->Page_model->delete_page($Vwfsll4zanwn);
			$this->session->set_flashdata('message', lang('message_deleted_page'));
		}
		else
		{
			$this->session->set_flashdata('error', lang('error_page_not_found'));
		}
		
		redirect($this->config->item('admin_folder').'/pages');
	}
}	