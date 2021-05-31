<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Faq extends MY_Controller {
	public $data = array();
	public $module = 'Faq';
	public $section = 8;
	public function __construct()
	{
		parent::__construct();
                session_start();
                $this->load->model(array('web/Model_content','web/Model_menu','backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
                $this->data['controller'] = $this->module;
                $getmodule = $this->Model_content->getModuleId($this->data['controller']); 
                foreach ($getmodule as $gm) {
                   $this->data['controller'] = $gm->module_path; 
                   $this->data['module_id'] = $gm->module_id;  
                 $_SESSION['module_id']=$this->data['module_id'];
                }	
                $this->data['menu_id'] = $this->Model_content->getMenuContent($_SESSION['module_id']);
               
	}
	
	public function index()
	{             
                $this->data['title'] = $this->data['controller'];                                
                $pathFaq = PATH_ASSETS."/json/faq.json";
                $arrFaq = json_decode(file_get_contents($pathFaq),TRUE);
                $this->data['title'] = $arrFaq['title'];
                $this->data['desc'] =  $arrFaq['desc']; 
		$this->load->view('vpri_faq',$this->data);
	}
        

        
}