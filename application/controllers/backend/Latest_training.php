<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Latest_training extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
//	public $section = 8; //get module group id from database
//	public $module_id = 15; //get module id from database
	public $alias_category = "Latest_training";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Model_latest_training','backend/Model_gallery','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
		
                $module_name=  $this->uri->segment(2);
                $getmodule = $this->Model_latest_training->getModule($module_name);
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
                $this->data['MenuLatest_training'] = $this->Model_menu_frontend->getMenuContent($_SESSION['module_id']);
               
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
		
		$searchkey = "";
		$searchby = "";
		$where = "";
		$orderBy = "";
		$perpage = "";
		
		if(isset($_POST["tbSearch"])){
			$_SESSION["searchkey".$this->module_id] = '';
			$_SESSION["searchby".$this->module_id] = '';
			$_SESSION["perpage".$this->module_id] = '';
			
			$searchkey = $this->security->xss_clean(secure_input($_POST['searchkey']));
			$searchby = $this->security->xss_clean(secure_input($_POST['searchby']));
			$perpage = $this->security->xss_clean(secure_input($_POST['perpage']));
			
									
			$pesan = array();

			if ($searchkey=="") {
				$pesan[] = 'Keyword search is empty';
			} else if ($searchby=="") {
				$pesan[] = 'Search by has not been choose';
			}
			
			if (! count($pesan)==0 ) {
				foreach ($pesan as $indeks=>$pesan_tampil) {
					$_SESSION["searchkey".$this->module_id] = '';
					$_SESSION["searchby".$this->module_id] = '';
					$_SESSION["perpage".$this->module_id] = '';
				}
			} else {
				$_SESSION["searchkey".$this->module_id] = $searchkey;
				$_SESSION["searchby".$this->module_id] = $searchby;
				$_SESSION["perpage".$this->module_id] = $perpage;
					
				if(isset($_POST['searchkey'])){
					$searchkey = $_SESSION["searchkey".$this->module_id];
				}
				if(isset($_POST['searchby'])){
					$searchby = $_SESSION["searchby".$this->module_id];
				}
				
				if($searchkey != "" && $searchby != ""){
					$where   =   " WHERE ".$searchby." LIKE '%". $searchkey ."%' ";
				}
			}	
		} else {
			$searchkey = @$_SESSION["searchkey".$this->module_id];
			$searchby = @$_SESSION["searchby".$this->module_id];
			
			if($searchkey != "" && $searchby != ""){
				$where   =   " WHERE ".$searchby." LIKE '%". $searchkey ."%' ";
			}
			
			if(isset($_POST['perpage'])){
				$perpage = $this->security->xss_clean(secure_input($_POST['perpage'])); 
				$_SESSION["perpage".$this->module_id] = $perpage;
			} else {
				$perpage = @$_SESSION["perpage".$this->module_id];
				
				if($perpage == ""){
					$perpage = PER_PAGE;
				}
			}
		}
		
		$orderBy = "ORDER BY a.latest_training_order ASC";
		
		$cond 			= $where." ".$orderBy;

		$ListLatest_training = $this->Model_latest_training->getListLatest_training($this->data['modul_id'],$cond);
		
		$this->data["ListLatest_training"] = $ListLatest_training;
		
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
               
		
		//$this->data['total'] = $total_rows;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Latest_training/list');
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
		$this->load->view('backend/Latest_training/add',$this->data);
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
		
             
		$latest_training_title = $this->security->xss_clean(secure_input($_POST['latest_training_title']));
		$latest_training_imageurl = $this->security->xss_clean(secure_input($_POST['latest_training_imageurl']));
                $latest_training_highlight=1;
                
		$latest_training_metadescription = $this->security->xss_clean(secure_input($_POST['latest_training_metadescription']));
		$latest_training_metakeywords = $this->security->xss_clean(secure_input($_POST['latest_training_metakeywords']));		
		$pesan = array();
		// Validasi data
		if ($latest_training_title=="") {
			$pesan[] = 'Latest_training Title is empty';
		} 
		  
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['latest_training_title']=$latest_training_title;
				$this->data['latest_training_imageurl']=$latest_training_imageurl;
				$this->data['latest_training_metadescription']=$latest_training_metadescription;
				$this->data['latest_training_metakeywords']=$latest_training_metakeywords;
					
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Latest_training/add',$this->data);
			}
		} else {
			$cekLatest_training = $this->Model_latest_training->checkLatest_training($latest_training_title);
			$countLatest_training = count($cekLatest_training);
			
			if ($countLatest_training > 0 ) {
				$this->data['error']='Latest_training Title '.$latest_training_title.' already exist';
				
				$this->data['latest_training_title']=$latest_training_title;
				$this->data['latest_training_imageurl']=$latest_training_imageurl;
				$this->data['latest_training_metadescription']=$latest_training_metadescription;
				$this->data['latest_training_metakeywords']=$latest_training_metakeywords;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Latest_training/add',$this->data);
			} else {
				$latest_training_imageurl = str_replace(BASE_URL,"",$latest_training_imageurl);
				$countAlias = 0;
				
				$latest_training_id = $this->Model_latest_training->insertLatest_training($latest_training_title,$latest_training_highlight,$latest_training_imageurl,$latest_training_metadescription,$latest_training_metakeywords);
					
					
                                $log_module = "Add ".$this->module;
                                $log_value = $latest_training_id." | ".$latest_training_title." | ".$latest_training_imageurl." |  ".$latest_training_metadescription." | ".$latest_training_metakeywords;
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
		
		$rsLatest_training = $this->Model_latest_training->getLatest_training($id); 
		$title = $rsLatest_training[0]['latest_training_title'];
		$active_status = abs($rsLatest_training[0]['latest_training_active_status']-1);
		
		$active = $this->Model_latest_training->activeLatest_training($id);
		createRouteAlias(); //create route alias
		
		if($active_status == 1){
			$log_module = "Active ".$this->module;
		} else {
			$log_module = "Inactive ".$this->module;
		}
		$log_value = $id." | ".$title." | ".$active_status;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                
                $this->generateLatest_training();
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
		
		$rsLatest_training = $this->Model_latest_training->getLatest_training($id); 
		$title = $rsLatest_training[0]['latest_training_title'];
               
                $category_id = $rsLatest_training[0]['category_id'];
                if($category_id=2){
                    
                    $this->deleteGallery($id);
                }
                
		$delete = $this->Model_latest_training->deleteLatest_training($id);
		$delete_alias = $this->Model_alias->deleteAlias($id, $this->alias_category);
		createRouteAlias(); //create route alias
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                
                $this->generateLatest_training();
		
                redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}
        public function deleteGallery($id){
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
                $where = "";
                $orderBy = "ORDER BY a.gallery_id DESC";		
		$cond 			= $where." ".$orderBy;
                $ListGallery = $this->Model_gallery->getListGallery($id, $cond);
                
                foreach($ListGallery as $gallery){  
                        $image_path = './assets/images/'.$gallery['gallery_image']; 
                        $image_resize = './assets/images/resized/'.$gallery['gallery_image'];         
                        $image_thumb = './assets/images/thumb/'.$gallery['gallery_image']; 

                        if($gallery['gallery_image'] != 'default_icon.png'){
                        unlink($image_path);
                        unlink($image_resize);
                        unlink($image_thumb);
                           }     
                        $this->Model_gallery->deleteGallery($gallery['gallery_id']);

                
                }           
            
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
		
		$rsLatest_training = $this->Model_latest_training->getLatest_training($id);  // mengambil database dari model untuk dikirim ke view
		
                $countLatest_training = count($rsLatest_training);
		
                echo '<!-- <pre>';
                print_r($rsLatest_training);
                echo '-->';
                
		$this->data['rsLatest_training'] = $rsLatest_training;
		$this->data['countLatest_training'] = $countLatest_training;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Latest_training/edit',$this->data);
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
		
		$rsLatest_training = $this->Model_latest_training->getLatest_training($id);  // mengambil database dari model untuk dikirim ke view
		$countLatest_training = count($rsLatest_training);
		
		$this->data['rsLatest_training'] = $rsLatest_training;
		$this->data['countLatest_training'] = $countLatest_training;
                
		
		$latest_training_title = $this->security->xss_clean(secure_input($_POST['latest_training_title']));
		$latest_training_titleOld = $this->security->xss_clean(secure_input($_POST['latest_training_titleOld']));	
		$latest_training_imageurl = $this->security->xss_clean(secure_input($_POST['latest_training_imageurl']));
		$latest_training_metadescription = $this->security->xss_clean(secure_input($_POST['latest_training_metadescription']));
		$latest_training_metakeywords = $this->security->xss_clean(secure_input($_POST['latest_training_metakeywords']));
		$latest_training_highlight=1;
		$pesan = array();
		// Validasi data
		if ($latest_training_title=="") {
			$pesan[] = 'Latest_training Title is empty';
		}
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Latest_training/edit',$this->data);
			}
		} else {
			$cekLatest_training = $this->Model_latest_training->checkLatest_training($latest_training_title);
			$countLatest_training = count($cekLatest_training);
			
			if($latest_training_title == $latest_training_titleOld){
				$countLatest_training = 0;
			}
			
			if ($countLatest_training > 0 ) {
				$this->data['error']='Latest_training Title '.$latest_training_title.' already exist';

				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Latest_training/edit',$this->data);
			} else {
				$latest_training_imageurl = str_replace(BASE_URL,"",$latest_training_imageurl);
				$countAlias = 0;
                                
				$update = $this->Model_latest_training->updateLatest_training($id,$latest_training_title,$latest_training_highlight,$latest_training_imageurl,$latest_training_metadescription,$latest_training_metakeywords);		
					$log_module = "Edit ".$this->module;
					$log_value = $id." | ".$latest_training_title." | ".$latest_training_imageurl." | ".$latest_training_metadescription." | ".$latest_training_metakeywords;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
					 $this->generateLatest_training();
				
					
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
			$this->Model_latest_training->updateOrderLatest_training($id,$ordervalue);
                        echo $ordervalue;
		}
		 $this->generateLatest_training();
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}

        function generateLatest_training(){
                $ListLatest_training			= $this->Model_latest_training->GenerateLatest_training(" WHERE latest_training_active_status = 1 and latest_training_image != '' ORDER BY latest_training_order ASC");
		$countLatest_training		= count($ListLatest_training);
               createCache($ListLatest_training,"latest_training");
               
               $count			= $this->Model_latest_training->CountLatest_training();
               createCache($count,"countlatest_training");
        }
}