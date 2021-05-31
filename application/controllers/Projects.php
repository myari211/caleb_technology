<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends MY_Controller {
	public $data = array();
	public $section = 10; //get module group id from database
	
	public function __construct()
	{
		parent::__construct();
                session_start();
                $this->load->model(array('web/Model_projects','web/Model_menu','backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
                $this->data['controller'] = $this->uri->segment(1);
                $getmodule = $this->Model_projects->getModuleId($this->data['controller']); 
                foreach ($getmodule as $gm) {
                   $this->data['controller'] = $gm->module_path; 
                   $this->data['module_id'] = $gm->module_id;  
                 $_SESSION['module_id']=$this->data['module_id'];
                }	
                $this->data['menu_id'] = $this->Model_projects->getMenuContent($_SESSION['module_id']);
               
	}
	
	public function index()
	{             
               $this->data['title'] = $this->data['controller'];  
               
                //      JSon Slide Client
                $pathprojectsHome = PATH_ASSETS."/json/projects.json";
                 $arrProjectsHome = json_decode(file_get_contents($pathprojectsHome),TRUE);
                 $this->data['dataProjectsHome'] = $arrProjectsHome;
                 $this->data['countProjectsHome'] = count($arrProjectsHome);
                 
                //      JSon Client
                 $pathclientHome = PATH_ASSETS."/json/client.json";
                 $arrClientHome = json_decode(file_get_contents($pathclientHome),TRUE);
                 $this->data['dataClientHome'] = $arrClientHome;
                 $this->data['countClientHome'] = count($arrClientHome);
                 
                 
                  //      JSon Count
                     
                $pathCountTeam = PATH_ASSETS."/json/countteam.json";
                $arrCountTeam = json_decode(file_get_contents($pathCountTeam),TRUE);
                $this->data['CountTeam'] = $arrCountTeam;
                
                $pathCountClient = PATH_ASSETS."/json/countclient.json";
                $arrCountClient = json_decode(file_get_contents($pathCountClient),TRUE);
                $this->data['CountClient'] = $arrCountClient;
                
                $pathCountProject = PATH_ASSETS."/json/countprojects.json";
                $arrCountProject = json_decode(file_get_contents($pathCountProject),TRUE);
                $this->data['CountProject'] = $arrCountProject;
                
                $pathCountMaterial = PATH_ASSETS."/json/countmaterial.json";
                $arrCountMaterial = json_decode(file_get_contents($pathCountMaterial),TRUE);
                $this->data['CountMaterial'] = $arrCountMaterial;
               
                $ListProjects = $this->Model_projects->getListProjects();	
                $this->data["ListProjects"] = $ListProjects;
                
               
               
//        echo' <!--<pre>';
//        print_r($this->data['ListProjects']);
//        echo' <pre>-->';
       // die;
                
         
/*program to find max value*/
               
		$this->load->view('vprojects',$this->data);
	}
}