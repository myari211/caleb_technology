<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Partner extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
	public $section = 3; //get module group id from database
	public $module_id = 32; //get module id from database
	public $alias_category = "partner";
	public $module = "Partner";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
		
		//get menu from helper menu
		$this->arrMenu = menu();
		$this->data = array();
                $this->data['ListMenu'] = $this->arrMenu;
                 $this->data['CountMenu'] = count($this->arrMenu);
		
		//check privilege module
		$this->privilege = accessprivilegeuserlevel($_SESSION['admin_data']['user_level_id'], $this->module_id);
		$this->breadcrump = breadCrump($this->module_id);
	}
	
	public function index()
	{
		$this->add();
	}
	
	
	
	public function add(){
		//extract privilege
		$this->data["add"] = $this->privilege[2];
		
		if($this->data["add"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
                $pathPartner = PATH_ASSETS."/json/partner.json";
                $arrPartner = json_decode(file_get_contents($pathPartner),TRUE);
                $this->data['partner_title'] = $arrPartner['partner_title'];
                $this->data['partner_desc'] =  $arrPartner['partner_desc'];
                
                
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/partner/list',$this->data);
	}
	
	public function doAdd(){
		//extract privilege
		$this->data["add"] = $this->privilege[2];
		
		if($this->data["add"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$tb = $_POST['tbSave'];
		if (!$tb) {
			redirect(BASE_URL_BACKEND."/partner");
			exit();
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
		 $partner_title = $this->security->xss_clean(secure_input($_POST['partner_title']));
		 $partner_desc = $this->security->xss_clean(secure_input($_POST['partner_desc']));
		
		$pesan = array();
		// Validasi data
		if ($partner_title=="") {
			$pesan[] = 'Partner Title is empty';
		} else if ($partner_desc=="") {
			$pesan[] = 'Partner Desc is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['partner_title']=$partner_title;
				$this->data['partner_desc']=$partner_desc;
				
					
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/partner/add',$this->data);
			}
		} else {
                     $data = array(    
                                          'partner_title' => $partner_title,
                                          'partner_desc' => $partner_desc                            
                                           ); 
                  print_r($data);
                
                  $ListPartner= $data;
                    createCache($ListPartner,"partner");
                    $log_module = "Add ".$this->module;
                    $log_value = "Partner | ".$partner_title." | ".$partner_desc;
                    $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

                    redirect(BASE_URL_BACKEND."/partner/");
                }	
	}
	
	
	
}