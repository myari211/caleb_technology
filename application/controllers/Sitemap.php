<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sitemap extends MY_Controller {
	public $data = array();
	
	
	public function __construct()
	{
		parent::__construct();
                $this->load->model(array('web/Model_content','web/Model_menu','backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
                $this->data['controller'] = $this->uri->segment(1);
         
	}
	
	public function index()
	{             
                $this->data['title'] = $this->data['controller'];                  
                $this->load->view('vsitemap',$this->data);
	}
}