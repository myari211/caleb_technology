<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Projects extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
//	public $section = 8; //get module group id from database
//	public $module_id = 15; //get module id from database
	public $alias_client = "Projects";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Model_projects','backend/Model_gallery','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
		
                $module_name=  $this->uri->segment(2);
                $getmodule = $this->Model_projects->getModule($module_name);
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
                $this->data['MenuProjects'] = $this->Model_menu_frontend->getMenuContent($_SESSION['module_id']);
                $this->data['Projectsclient'] = $this->Model_projects->getProjectsCient();
                $this->data['Services'] = $this->Model_projects->getServices();
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
		
		$orderBy = "ORDER BY a.projects_id Desc";
		
		$cond 			= $where." ".$orderBy;

		$ListProjects = $this->Model_projects->getListProjects($this->data['modul_id'],$cond);
		
		$this->data["ListProjects"] = $ListProjects;
		
                $slideshow =array();
                $noslideshow =array();
                
                foreach($this->data["ListProjects"] as $data) {
                    if ($data['projects_highlight'] == 1) {
                        $slideshow[]=$data;
                    }
                    
                    }
             $this->data['getSlide']=$slideshow;
             $this->data['countSlide']=  count($this->data['getSlide']);
           
           
//                echo '<pre>';
//                print_r($slideshow);
//                
//                 echo '<pre>';
//                print_r($noslideshow);
//                die;
                
                
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
		$this->load->view('backend/Projects/list');
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
		$this->load->view('backend/Projects/add',$this->data);
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
		$menu_id = $this->security->xss_clean(secure_input($_POST['menu_id']));
                $client_title = $this->security->xss_clean(secure_input($_POST['client_title']));
                if ($client_title == ''){
                    $cat = $this->security->xss_clean(secure_input($_POST['client_id']));
                }
                else {
                    $cat = $this->Model_projects->insertCient($client_title);  
                }
               $client_id =$cat;
               
                $user_title = $this->security->xss_clean(secure_input($_POST['user_title']));
                
                if ($user_title == ''){
                    $usr = $this->security->xss_clean(secure_input($_POST['user_id']));
                    if ($usr == ''){
                        
                        $usr = $client_id;
                    }
                }
                else {
                    $usr = $this->Model_projects->insertCient($user_title);  
                }
                 $user_id = $usr;
               
		$projects_title = $this->security->xss_clean(secure_input($_POST['projects_title']));
		$projects_services = secure_input_editor($_POST['projects_services']);
		$projects_desc = secure_input_editor($_POST['projects_desc']);
                $projects_location = secure_input_editor($_POST['projects_location']);
                $projects_start_date = secure_input_editor($_POST['projects_start_date']);
                $projects_end_date = secure_input_editor($_POST['projects_end_date']);
                $highlight =  secure_input_editor($_POST['projects_highlight']);
                if ($highlight == 1){
                    $projects_highlight = 1;                    
                    }
                 else {
                $projects_highlight = 0;
                    }
		$projects_imageurl = $this->security->xss_clean(secure_input($_POST['projects_imageurl']));		
		$projects_metadescription = $this->security->xss_clean(secure_input($_POST['projects_metadescription']));
		$projects_metakeywords = $this->security->xss_clean(secure_input($_POST['projects_metakeywords']));
		$projects_imageurl = str_replace(BASE_URL,"",$projects_imageurl);
		$pesan = array();
		// Validasi data
		if ($projects_title=="") {
			$pesan[] = 'Projects Title is empty';
		} else if ($projects_services=="") {
			$pesan[] = 'Projects services  is empty';
		} 
		 else if ($projects_desc=="") {
			$pesan[] = 'Projects Description is empty';
		} 
		else if ($projects_location=="") {
			$pesan[] = 'Projects Location is empty';
		} 
                else if ($projects_start_date=="") {
			$pesan[] = 'Projects Start Date is empty';
		} 
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['projects_title']=$projects_title;
                                $this->data['client_title']=$client_title;
				$this->data['projects_services']=$projects_services;
				$this->data['projects_desc']=$projects_desc;
				$this->data['projects_imageurl']=$projects_imageurl;
				$this->data['projects_location']=$projects_location;
				$this->data['projects_metadescription']=$projects_metadescription;
				$this->data['projects_metakeywords']=$projects_metakeywords;
					
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Projects/add',$this->data);
			}
		} else {
                    
                    $projects_id = $this->Model_projects->insertProjects($client_id,$user_id, $projects_title,$projects_services,$projects_desc,$projects_imageurl,$projects_start_date,$projects_end_date,$projects_location,$projects_highlight,$projects_metadescription,$projects_metakeywords);					
                    $log_module = "Add ".$this->module;
                    $log_value = $projects_id." | ".$projects_title." | ".$projects_services." | ".$projects_desc." | ".$projects_imageurl." | ".$projects_location." | ".$projects_metadescription." | ".$projects_metakeywords;
                    $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

                    redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
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
		
		$rsProjects = $this->Model_projects->getProjects($id); 
		$title = $rsProjects[0]['projects_title'];
		$active_status = abs($rsProjects[0]['projects_active_status']-1);
		
		$active = $this->Model_projects->activeProjects($id);
		createRouteAlias(); //create route alias
		
		if($active_status == 1){
			$log_module = "Active ".$this->module;
		} else {
			$log_module = "Inactive ".$this->module;
		}
		$log_value = $id." | ".$title." | ".$active_status;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                
                $this->generateProjects();
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
		
		$rsProjects = $this->Model_projects->getProjects($id); 
		$title = $rsProjects[0]['projects_title'];
               
                $client_id = $rsProjects[0]['client_id'];
                if($client_id=2){
                    
                    $this->deleteGallery($id);
                }
                
		$delete = $this->Model_projects->deleteProjects($id);
		$delete_alias = $this->Model_alias->deleteAlias($id, $this->alias_client);
		createRouteAlias(); //create route alias
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                
                $this->generateProjects();
		
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
		
		$rsProjects = $this->Model_projects->getProjects($id);  // mengambil database dari model untuk dikirim ke view
//		echo '<pre>';
//                print_r($rsProjects);
//                die;
                $countProjects = count($rsProjects);
		
		$this->data['rsProjects'] = $rsProjects;
		$this->data['countProjects'] = $countProjects;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Projects/edit',$this->data);
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
		
		$rsProjects = $this->Model_projects->getProjects($id);  // mengambil database dari model untuk dikirim ke view
		$countProjects = count($rsProjects);
		
		$this->data['rsProjects'] = $rsProjects;
		$this->data['countProjects'] = $countProjects;
                
		$user_id = $this->security->xss_clean(secure_input($_POST['user_id']));
                $client_id = $this->security->xss_clean(secure_input($_POST['client_id']));
                $projects_title = $this->security->xss_clean(secure_input($_POST['projects_title']));
                $projects_titleOld = $this->security->xss_clean(secure_input($_POST['projects_titleOld']));
		$projects_services = secure_input_editor($_POST['projects_services']);
		$projects_desc = secure_input_editor($_POST['projects_desc']);
                $projects_location = secure_input_editor($_POST['projects_location']);
                $projects_start_date = secure_input_editor($_POST['projects_start_date']);
                $projects_end_date = secure_input_editor($_POST['projects_end_date']);
                $highlight =  secure_input_editor($_POST['projects_highlight']);
                if ($highlight == 1){
                    $projects_highlight = 1;                    
                    }
                 else {
                $projects_highlight = 0;
                    }
		$projects_imageurl = $this->security->xss_clean(secure_input($_POST['projects_imageurl']));		
		$projects_metadescription = $this->security->xss_clean(secure_input($_POST['projects_metadescription']));
		$projects_metakeywords = $this->security->xss_clean(secure_input($_POST['projects_metakeywords']));
		$projects_imageurl = str_replace(BASE_URL,"",$projects_imageurl);
		$pesan = array();
		// Validasi data
		if ($projects_title=="") {
			$pesan[] = 'Projects Title is empty';
		} else if ($projects_desc=="") {
			$pesan[] = 'Projects Description is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Projects/edit',$this->data);
			}
		} else {
                    
                                  $projects_imageurl = str_replace(BASE_URL,"",$projects_imageurl);
				
					$update = $this->Model_projects->updateProjects($id,$client_id, $user_id, $projects_title,$projects_services,$projects_desc,$projects_imageurl,$projects_start_date,$projects_end_date,$projects_location,$projects_highlight,$projects_metadescription,$projects_metakeywords);
					
					
					
					
					$log_module = "Edit ".$this->module;
					$log_value = $id." | ".$projects_title." | ".$projects_services." | ".$projects_desc." | ".$projects_imageurl." | ".$projects_location." | ".$projects_metadescription." | ".$projects_metakeywords;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
					//Cache JSON Projects
					 $this->generateProjects();
					
					//End Cache JSON Projects
					
					redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
				
                }
		
	}
	public function doOrder(){
		
		$order = $this->security->xss_clean($_POST['order']);
		
		if($order == ""){
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		} 
		
		foreach($order as $id => $ordervalue){
			$this->Model_projects->updateOrderProjects($id,$ordervalue);
                        echo $ordervalue;
		}
		 $this->generateProjects();
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}

        function generateProjects(){
                $ListProjects			= $this->Model_projects->GenerateProjects(" WHERE projects_active_status = 1 and projects_highlight = 1 ORDER BY projects_order ASC  limit 0,15");
		$countProjects		= count($ListProjects);
		//createCacheBanner($rsBanner,"bannerhome");
                createCache($ListProjects,"projects");
               
               $count			= $this->Model_projects->CountProjects();
               createCache($count,"countprojects");
        }
        
}