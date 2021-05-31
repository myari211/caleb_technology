<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
	public $section = 8; //get module group id from database
//	public $module_id = 15; //get module id from database
	public $alias_category = "Contact";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Model_contact','backend/Model_gallery','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
		
                $module_name=  $this->uri->segment(2);
                $getmodule = $this->Model_contact->getModule($module_name);
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
                $this->data['MenuClient'] = $this->Model_menu_frontend->getMenuContent($_SESSION['module_id']);
               
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
		
		$where = "";
		$orderBy = "ORDER BY a.contact_order ASC";
		
		 $cond 			= $where." ".$orderBy;

		$ListContact = $this->Model_contact->getListContact($cond);
		
		$this->data["ListContact"] = $ListContact;
		
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
		
		$this->data['searchkey'] = $searchkey;
		$this->data['searchby'] = $searchby;
		$this->data['perpage'] = $perpage;
               
		
		$this->data['total'] = $total_rows;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Contact/list');
	}
	
	 function add(){
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
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Contact/add',$this->data);
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
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
             
		$contact_title = $this->security->xss_clean(secure_input($_POST['contact_title']));
		$contact_name = $this->security->xss_clean(secure_input($_POST['contact_name']));
                $contact_email =  secure_input_editor($_POST['contact_email']);
		$contact_phone = $this->security->xss_clean(secure_input($_POST['contact_phone']));
		$contact_fax = $this->security->xss_clean(secure_input($_POST['contact_fax']));		
		$pesan = array();
		// Validasi data
		if ($contact_title=="") {
			$pesan[] = 'Contact Title is empty';
		} 
		 else if ($contact_name=="") {
			$pesan[] = 'Contact Name is empty';
		}  
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['contact_title']=$contact_title;
				$this->data['contact_name']=$contact_name;
				$this->data['contact_phone']=$contact_phone;
				$this->data['contact_fax']=$contact_fax;
					
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Contact/add',$this->data);
			}
		} else {
			$cekContact = $this->Model_contact->checkContact($contact_title);
			$countContact = count($cekContact);
			
			if ($countContact > 0 ) {
				$this->data['error']='Contact Title '.$contact_title.' already exist';
				
				$this->data['contact_title']=$contact_title;
				$this->data['contact_name']=$contact_name;
				$this->data['contact_phone']=$contact_phone;
				$this->data['contact_fax']=$contact_fax;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Contact/add',$this->data);
			} else {
				
				
				$contact_id = $this->Model_contact->insertContact($contact_title,$contact_name,$contact_email,$contact_phone,$contact_fax);
					
					
                                $log_module = "Add ".$this->module;
                                $log_value = $contact_id." | ".$contact_title." | ".$contact_name." |  ".$contact_phone." | ".$contact_fax;
                                $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
                                redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
                                
                        }	
		}	
	}
	
	function active($id){
		if (empty($id)) {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		}
		
		//extract privilege
		$this->data["approve"] = $this->privilege[5];
		
		if($this->data["approve"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$rsContact = $this->Model_contact->getContact($id); 
		$title = $rsContact[0]['contact_title'];
		$active_status = abs($rsContact[0]['contact_active_status']-1);
		
		$active = $this->Model_contact->activeContact($id);
		
		
		if($active_status == 1){
			$log_module = "Active ".$this->module;
		} else {
			$log_module = "Inactive ".$this->module;
		}
		$log_value = $id." | ".$title." | ".$active_status;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                
                $this->generateContact();
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
		
	}
	
	function delete($id){
		if (empty($id)) {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		}
		
		//extract privilege
		$this->data["delete"] = $this->privilege[6];
		
		if($this->data["delete"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$rsContact = $this->Model_contact->getContact($id); 
		$title = $rsContact[0]['contact_title'];
               
                $category_id = $rsContact[0]['category_id'];
 
		$delete = $this->Model_contact->deleteContact($id);
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                
                $this->generateContact();
		
                redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}
	public function edit($id){
		if (empty($id)) {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		}

		//extract privilege
		$this->data["edit"] = $this->privilege[3];
		
		if($this->data["edit"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
		$rsContact = $this->Model_contact->getContact($id);  // mengambil database dari model untuk dikirim ke view
		
                $countContact = count($rsContact);
		
//                echo '<!-- <pre>';
//                print_r($rsContact);
//                echo '-->';
                
		$this->data['rsContact'] = $rsContact;
		$this->data['countContact'] = $countContact;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Contact/edit',$this->data);
	}
	
	public function doEdit($id){
		$tb = $_POST['tbEdit'];
		if (!$tb OR $id == '') {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		}
		
		//extract privilege
		$this->data["edit"] = $this->privilege[3];
		
		if($this->data["edit"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
		$rsContact = $this->Model_contact->getContact($id);  // mengambil database dari model untuk dikirim ke view
		$countContact = count($rsContact);
		
		$this->data['rsContact'] = $rsContact;
		$this->data['countContact'] = $countContact;
                
		
		$contact_title = $this->security->xss_clean(secure_input($_POST['contact_title']));
		$contact_titleOld = $this->security->xss_clean(secure_input($_POST['contact_titleOld']));	
		$contact_title = $this->security->xss_clean(secure_input($_POST['contact_title']));
		$contact_name = $this->security->xss_clean(secure_input($_POST['contact_name']));
                $contact_email =  secure_input_editor($_POST['contact_email']);
		$contact_phone = $this->security->xss_clean(secure_input($_POST['contact_phone']));
		$contact_fax = $this->security->xss_clean(secure_input($_POST['contact_fax']));	
		$pesan = array();
		// Validasi data
		if ($contact_title=="") {
			$pesan[] = 'Contact Title is empty';
		}
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Contact/edit',$this->data);
			}
		} else {
			$cekContact = $this->Model_contact->checkContact($contact_title);
			$countContact = count($cekContact);
			
			if($contact_title == $contact_titleOld){
				$countContact = 0;
			}
			
			if ($countContact > 0 ) {
				$this->data['error']='Contact Title '.$contact_title.' already exist';

				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Contact/edit',$this->data);
			} else {
				$contact_name = str_replace(BASE_URL,"",$contact_name);
				$countAlias = 0;
                                
				$update = $this->Model_contact->updateContact($id,$contact_title,$contact_name,$contact_email,$contact_phone,$contact_fax);		
					$log_module = "Edit ".$this->module;
					$log_value = $id." | ".$contact_title." | ".$contact_name." | ".$contact_email." | ".$contact_phone;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
					 $this->generateContact();
				
					
					redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
				}	
		}
		
	}
	public function doOrder(){
		
		$order = $this->security->xss_clean($_POST['order']);
		
		if($order == ""){
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		} 
		
		foreach($order as $id => $ordervalue){
			$this->Model_contact->updateOrderContact($id,$ordervalue);
                        echo $ordervalue;
		}
		 $this->generateContact();
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}

        function generateContact(){
                $ListContact			= $this->Model_contact->GenerateContact(" WHERE contact_active_status = 1 ORDER BY contact_order ASC");
		$countContact		= count($ListContact);
                createCache($ListContact,"contact");
        }
}