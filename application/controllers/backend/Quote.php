<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quote extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
	public $section = 3; //get module group id from database
	public $module_id = 33; //get module id from database
	public $alias_category = "quote";
	public $module = "Quote";
	
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
		
                $pathQuote = PATH_ASSETS."/json/quote.json";
                $arrQuote = json_decode(file_get_contents($pathQuote),TRUE);
                
                $this->data['quote_desc'] =  $arrQuote['quote_desc'];
                
                
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/quote/list',$this->data);
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
			redirect(BASE_URL_BACKEND."/quote");
			exit();
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
		
		 $quote_desc = $this->security->xss_clean(secure_input($_POST['quote_desc']));
		
		$pesan = array();
		// Validasi data
		if ($quote_desc=="") {
			$pesan[] = 'Quote empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['quote_desc']=$quote_desc;
				
					
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/quote/add',$this->data);
			}
		} else {
                     $data = array(    
                                       
                                          'quote_desc' => $quote_desc                            
                                           ); 
                  print_r($data);
                
                  $ListQuote= $data;
                    createCache($ListQuote,"quote");
                    $log_module = "Add ".$this->module;
                    $log_value = "Quote | ".$quote_title." | ".$quote_desc;
                    $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

                    redirect(BASE_URL_BACKEND."/quote/");
                }	
	}
	
	
	
}