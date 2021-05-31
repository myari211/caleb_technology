<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Works extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
//	public $section = 8; //get module group id from database
//	public $module_id = 15; //get module id from database
	public $alias_category = "Works";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Model_works','backend/Model_gallery','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
		
                $module_name=  $this->uri->segment(2);
                $getmodule = $this->Model_works->getModule($module_name);
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
                $this->data['MenuWorks'] = $this->Model_menu_frontend->getMenuContent($_SESSION['module_id']);
                $this->data['Workscategory'] = $this->Model_works->getWorksCategory();
                $this->data['Services'] = $this->Model_works->getServices();
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
		
		$orderBy = "ORDER BY a.works_order Asc";
		
		$cond 			= $where." ".$orderBy;
//		$rsUserLevel	= $this->Model_works->getListWorks($this->data['modul_id'],$cond);
//		$base_url		= BASE_URL_BACKEND."/Works/view/";
//		$total_rows		= count($rsUserLevel);
//		$per_page		= $perpage;
//		
//		$this->data['paging']		= pagging($base_url , $total_rows, $per_page);
//		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
//		$start = $per_page*$page - $per_page;
//		if ($start<0) $start = 0;
//		$cond .= " LIMIT ".$start.",".$per_page;
		$ListWorks = $this->Model_works->getListWorks($this->data['modul_id'],$cond);
		
		$this->data["ListWorks"] = $ListWorks;
		
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
		$this->load->view('backend/Works/list');
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
		$this->load->view('backend/Works/add',$this->data);
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
                $services_id = $this->security->xss_clean(secure_input($_POST['services_id']));
                $category_title = $this->security->xss_clean(secure_input($_POST['category_title']));
                if ($category_title == ''){
                    $cat = $this->security->xss_clean(secure_input($_POST['category_id']));
                }
                else {
                    $cat = $this->Model_works->insertCategory($category_title);  
                }
               $category_id =$cat;
             
		$works_title = $this->security->xss_clean(secure_input($_POST['works_title']));
		$works_shortdesc = secure_input_editor($_POST['works_shortdesc']);
		$works_desc = secure_input_editor($_POST['works_desc']);
                $works_about = secure_input_editor($_POST['works_about']);
                $works_client = secure_input_editor($_POST['works_client']);
                $highlight =  secure_input_editor($_POST['works_highlight']);
                if ($highlight == 1){
                    $works_highlight = 1;                    
                    }
                 else {
                $works_highlight = 0;
                    }
		$works_imageurl = $this->security->xss_clean(secure_input($_POST['works_imageurl']));
		$works_alias = $this->security->xss_clean(secure_input($_POST['works_alias']));
		$works_metadescription = $this->security->xss_clean(secure_input($_POST['works_metadescription']));
		$works_metakeywords = $this->security->xss_clean(secure_input($_POST['works_metakeywords']));
		
		$pesan = array();
		// Validasi data
		if ($works_title=="") {
			$pesan[] = 'Works Title is empty';
		} else if ($menu_id=="") {
			$pesan[] = 'Works menu is empty';
		} 
		 else if ($works_desc=="") {
			$pesan[] = 'Works Description is empty';
		} 
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['works_title']=$works_title;
                                $this->data['category_title']=$category_title;
				$this->data['works_shortdesc']=$works_shortdesc;
				$this->data['works_desc']=$works_desc;
				$this->data['works_imageurl']=$works_imageurl;
				$this->data['works_alias']=$works_alias;
				$this->data['works_metadescription']=$works_metadescription;
				$this->data['works_metakeywords']=$works_metakeywords;
					
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Works/add',$this->data);
			}
		} else {
			$cekWorks = $this->Model_works->checkWorks($works_title);
			$countWorks = count($cekWorks);
			
			if ($countWorks > 0 ) {
				$this->data['error']='Works Title '.$works_title.' already exist';
				
				$this->data['works_title']=$works_title;
                                $this->data['category_title']=$category_title;
				$this->data['works_shortdesc']=$works_shortdesc;
				$this->data['works_desc']=$works_desc;
                                $this->data['works_about']=$works_about;
                                $this->data['works_client']=$works_client;
				$this->data['works_imageurl']=$works_imageurl;
				$this->data['works_alias']=$works_alias;
				$this->data['works_metadescription']=$works_metadescription;
				$this->data['works_metakeywords']=$works_metakeywords;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Works/add',$this->data);
			} else {
				$works_imageurl = str_replace(BASE_URL,"",$works_imageurl);
				$countAlias = 0;
				
				if(!empty($works_alias)) {
					$alias = generateAlias($works_alias);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				} else {
					$alias = generateAlias($works_title);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				}
				
				if ($countAlias > 0 ) {
					$this->data['error']='Alias '.$alias.' already exist from title '.$works_title.'';
				
					$this->data['works_title']=$works_title;
					$this->data['works_shortdesc']=$works_shortdesc;
					$this->data['works_desc']=$works_desc;
                                        $this->data['works_about']=$works_about;
                                        $this->data['works_client']=$works_client;
					$this->data['works_imageurl']=$works_imageurl;
					$this->data['works_alias']=$works_alias;
					$this->data['works_metadescription']=$works_metadescription;
					$this->data['works_metakeywords']=$works_metakeywords;
				
					$this->load->view('backend/header',$this->data);
					$this->load->view('backend/Works/add',$this->data);
				} else {
                                  
					$works_id = $this->Model_works->insertWorks($menu_id,$services_id,$category_id,$works_title,$works_desc,$works_about,$works_client,$works_highlight,$works_imageurl,$works_alias,$works_metadescription,$works_metakeywords,$works_shortdesc);
					if(!empty($works_id)) {
						$aliasid = $this->Model_alias->insertAlias($works_id,$this->alias_category,$alias,$this->data['controller']."/detail/".$works_id);
					}
					
					$log_module = "Add ".$this->module;
					$log_value = $works_id." | ".$works_title." | ".$works_shortdesc." | ".$works_desc." | ".$works_imageurl." | ".$works_alias." | ".$works_metadescription." | ".$works_metakeywords;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
					redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
				}
				
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
		
		$rsWorks = $this->Model_works->getWorks($id); 
		$title = $rsWorks[0]['works_title'];
		$active_status = abs($rsWorks[0]['works_active_status']-1);
		
		$active = $this->Model_works->activeWorks($id);
		createRouteAlias(); //create route alias
		
		if($active_status == 1){
			$log_module = "Active ".$this->module;
		} else {
			$log_module = "Inactive ".$this->module;
		}
		$log_value = $id." | ".$title." | ".$active_status;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                
                $this->generateWorks();
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
		
		$rsWorks = $this->Model_works->getWorks($id); 
		$title = $rsWorks[0]['works_title'];
               
                $category_id = $rsWorks[0]['category_id'];
                if($category_id=2){
                    
                    $this->deleteGallery($id);
                }
                
		$delete = $this->Model_works->deleteWorks($id);
		$delete_alias = $this->Model_alias->deleteAlias($id, $this->alias_category);
		createRouteAlias(); //create route alias
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                
                $this->generateWorks();
		
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
		
		$rsWorks = $this->Model_works->getWorks($id);  // mengambil database dari model untuk dikirim ke view
		
                $countWorks = count($rsWorks);
		
		$this->data['rsWorks'] = $rsWorks;
		$this->data['countWorks'] = $countWorks;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Works/edit',$this->data);
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
		
		$rsWorks = $this->Model_works->getWorks($id);  // mengambil database dari model untuk dikirim ke view
		$countWorks = count($rsWorks);
		
		$this->data['rsWorks'] = $rsWorks;
		$this->data['countWorks'] = $countWorks;
                
		$menu_id = $this->security->xss_clean(secure_input($_POST['menu_id']));
                $services_id = $this->security->xss_clean(secure_input($_POST['services_id']));
                $category_id = $this->security->xss_clean(secure_input($_POST['category_id']));
		$works_title = $this->security->xss_clean(secure_input($_POST['works_title']));
		$works_shortdesc = secure_input_editor($_POST['works_shortdesc']);
		$works_titleOld = $this->security->xss_clean(secure_input($_POST['works_titleOld']));
		$works_desc = secure_input_editor($_POST['works_desc']);
                $works_about = secure_input_editor($_POST['works_about']);
                $works_client = secure_input_editor($_POST['works_client']);
		$works_imageurl = $this->security->xss_clean(secure_input($_POST['works_imageurl']));
		$works_alias = $this->security->xss_clean(secure_input(@$_POST['works_alias']));
		$works_metadescription = $this->security->xss_clean(secure_input($_POST['works_metadescription']));
		$works_metakeywords = $this->security->xss_clean(secure_input($_POST['works_metakeywords']));
		 $highlight =  secure_input_editor($_POST['works_highlight']);
                 
                if ($highlight == 1){
                    $works_highlight = 1;                    
                    }
                 else {
                    $works_highlight = 0;
                    }
		$pesan = array();
		// Validasi data
		if ($works_title=="") {
			$pesan[] = 'Works Title is empty';
		} else if ($works_desc=="") {
			$pesan[] = 'Works Description is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Works/edit',$this->data);
			}
		} else {
			$cekWorks = $this->Model_works->checkWorks($works_title);
			$countWorks = count($cekWorks);
			
			if($works_title == $works_titleOld){
				$countWorks = 0;
			}
			
			if ($countWorks > 0 ) {
				$this->data['error']='Works Title '.$works_title.' already exist';

				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Works/edit',$this->data);
			} else {
				$works_imageurl = str_replace(BASE_URL,"",$works_imageurl);
				$countAlias = 0;
				
				if(!empty($works_alias)) {
					$alias = generateAlias($works_alias);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				} else {
					$alias = generateAlias($works_title);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				}
				
				if($works_title == $works_titleOld){
					$countAlias = 0;
				}
				
				if ($countAlias > 0 ) {
					$this->data['error']='Alias '.$alias.' already exist from title '.$works_title.'';
					
					$this->load->view('backend/header',$this->data);
					$this->load->view('backend/Works/edit',$this->data);
				} else {
                                  
					$update = $this->Model_works->updateWorks($id,$menu_id,$services_id,$category_id,$works_title,$works_desc,$works_about,$works_client,$works_highlight,$works_imageurl,$works_alias,$works_metadescription,$works_metakeywords,$works_shortdesc);
					if($update) {
						$this->Model_alias->updateAlias($id,$alias,$this->alias_category);
					}
					
					createRouteAlias(); //create route alias
					
					$log_module = "Edit ".$this->module;
					$log_value = $id." | ".$works_title." | ".$works_shortdesc." | ".$works_desc." | ".$works_imageurl." | ".$works_alias." | ".$works_metadescription." | ".$works_metakeywords;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
					//Cache JSON Works
					 $this->generateWorks();
					
					//End Cache JSON Works
					
					redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
				}
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
			$this->Model_works->updateOrderWorks($id,$ordervalue);
                        echo $ordervalue;
		}
		 $this->generateWorks();
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}

        function generateWorks(){
                $ListWorks			= $this->Model_works->GenerateWorks(" WHERE works_active_status = 1 and works_highlight = 1 ORDER BY works_order ASC  limit 0,8");
		$countBanner		= count($ListWorks);
		//createCacheBanner($rsBanner,"bannerhome");
               createCache($ListWorks,"works");
        }
}