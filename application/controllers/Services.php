<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends MY_Controller {
	public $data = array();
	public $section = 8; //get module group id from database
	
	public function __construct()
	{
		parent::__construct();
                session_start();
                $this->load->model(array('web/Model_content','web/Model_menu','backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
                $this->data['controller'] = $this->uri->segment(1);
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
                $this->data['getContent'] = $this->Model_content->getContent($this->data['menu_id'], $this->data['module_id']);
                $this->data['getContentPage'] = $this->Model_content->getContentPage($this->data['menu_id'], $this->data['module_id']);
                $pathHeadQuote = PATH_ASSETS."/json/services_head_quote.json";
                $arrHeadQuote = json_decode(file_get_contents($pathHeadQuote),TRUE);
                $this->data['quote_head'] = $arrHeadQuote['quote_desc'];

//        echo' <!--><pre>';
 //       print_r($this->data['getContentPage']);
//        echo' <--><pre>';
//        die;
                
         
/*program to find max value*/
               
		$this->load->view('vservices',$this->data);
	}
}