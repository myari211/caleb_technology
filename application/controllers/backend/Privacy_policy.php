<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Privacy_policy extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
//	public $section = 8; //get module group id from database
//	public $module_id = 15; //get module id from database
	public $alias_category = "Privacy_policy";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Model_content','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
		
                $module_name=  $this->uri->segment(2);
                $getmodule = $this->Model_content->getModule($module_name);
                foreach ($getmodule as $gm) {
                 $this->module_id = $gm->module_id;
                 $this->section = $gm->module_group_id;
                 $_SESSION['module_id']=$this->module_id;
                }
		//get menu from helper menu
		$this->arrMenu = menu();
		$this->data = array();
                $this->data['ListMenu'] = $this->arrMenu;
                $this->data['CountMenu'] = count($this->arrMenu);
		$this->data['controller'] = $module_name;
                $this->data['menu_id'] = $this->Model_content->getMenuContent($_SESSION['module_id']);
                $this->data['Pageview'] = $this->Model_content->getPageView();
                $this->data['NosubPage'] = 0;
		//check privilege module
		$this->privilege = accessprivilegeuserlevel($_SESSION['admin_data']['user_level_id'], $_SESSION['module_id']);
		$this->breadcrump = breadCrump($_SESSION['module_id']);
	}
	
	public function index()
	{
		$this->view();
	}
	
	function view(){
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $_SESSION['module_id'];
		$this->data['breadcrump'] = $this->breadcrump;
		
		
                $pathPrivacy_policy = PATH_ASSETS."/json/privacy_policy.json";
                $arrPrivacy_policy = json_decode(file_get_contents($pathPrivacy_policy),TRUE);
                $this->data['title'] = $arrPrivacy_policy['title'];
                $this->data['desc'] =  $arrPrivacy_policy['desc'];
		//extract privilege
		$this->data["list"] = $this->privilege[0];
		$this->data["view"] = $this->privilege[1];
		$this->data["add"] = $this->privilege[2];
		$this->data["edit"] = $this->privilege[3];
		$this->data["publish"] = $this->privilege[4];
		$this->data["approve"] = $this->privilege[5];
		$this->data["delete"] = $this->privilege[6];
		$this->data["order"] = $this->privilege[7];
		
		if($this->data["list"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Priv_faq/list');
	}
	
	
        public function doAddQuote(){
		//extract privilege
		$this->data["add"] = $this->privilege[2];
		
		if($this->data["add"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$tb = $_POST['tbSave'];
		if (!$tb) {
			redirect(BASE_URL_BACKEND."/Privacy_policy");
			exit();
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
		 $title = $this->security->xss_clean(secure_input($_POST['title']));
		 $desc = $this->security->xss_clean(secure_input($_POST['desc']));
		
		$pesan = array();
		// Validasi data
		if ($title=="") {
			$pesan[] = 'Privacy policy Title is empty';
		} else if ($desc=="") {
			$pesan[] = 'Privacy policy Desc is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['title']=$title;
				$this->data['desc']=$desc;
				
					
				 redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			}
		} else {
                     $data = array(    
                                          'title' => $title,
                                          'desc' => $desc                            
                                           ); 
                  //print_r($data);
                
                    $ListPrivacy_policyQuote= $data;
                    createCache($ListPrivacy_policyQuote,"privacy_policy");
                    $log_module = "Add ".$this->module;
                    $log_value = "Privacy_policyQuote | ".$title." | ".$desc;
                    $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

                    redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
                }	
	}
        
    
}