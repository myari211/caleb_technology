<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Services extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();

	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Model_content','backend/Model_content_subpage','backend/Model_material','backend/Model_material_file','backend/Model_gallery','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
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
                $this->data['NosubPage'] = 1;
                $this->data['page_type'] = 3;
                $_SESSION['page_type']=$this->data['page_type'];
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
		
		$orderBy = "ORDER BY a.content_id Desc";
		$cond 			= $where." ".$orderBy;
                $condp = "ORDER BY a.content_page_order ASC";
              
                $ListContent = $this->Model_content->getListContent($this->data['modul_id'],$cond);
		$this->data["ListContent"] = $ListContent;            
		$ListContentPage = $this->Model_content->getListContentPage($this->data['menu_id'],$condp);	
		$this->data["ListContentPage"] = $ListContentPage;
                
                $pathHeadQuote = PATH_ASSETS."/json/services_head_quote.json";
                $arrHeadQuote = json_decode(file_get_contents($pathHeadQuote),TRUE);
                $this->data['quote_desc'] = $arrHeadQuote['quote_desc'];
                
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
		$this->load->view('backend/Content/list');
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
		$this->load->view('backend/Content/add',$this->data);
	}
	
	public function doAddContent(){
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
		$content_title = $this->security->xss_clean(secure_input($_POST['content_title']));
		$content_shortdesc = secure_input_editor($_POST['content_shortdesc']);
		$content_desc = secure_input_editor($_POST['content_desc']);
		$content_imageurl = $this->security->xss_clean(secure_input($_POST['content_imageurl']));
		$content_alias = $this->security->xss_clean(secure_input($_POST['content_alias']));
		$content_metadescription = $this->security->xss_clean(secure_input($_POST['content_metadescription']));
		$content_metakeywords = $this->security->xss_clean(secure_input($_POST['content_metakeywords']));
		
		$pesan = array();
		// Validasi data
		if ($content_imageurl=="") {
			$pesan[] = 'Header Images is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['content_title']=$content_title;
				$this->data['content_shortdesc']=$content_shortdesc;
				$this->data['content_desc']=$content_desc;
				$this->data['content_imageurl']=$content_imageurl;
				$this->data['content_alias']=$content_alias;
				$this->data['content_metadescription']=$content_metadescription;
				$this->data['content_metakeywords']=$content_metakeywords;
					
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Content/add',$this->data);
			}
		} else {
			$cekContent = $this->Model_content->checkContent($content_title);
			$countContent = count($cekContent);
			
			if ($countContent > 0 ) {
				$this->data['error']='Content Title '.$content_title.' already exist';
				
				$this->data['content_title']=$content_title;
				$this->data['content_shortdesc']=$content_shortdesc;
				$this->data['content_desc']=$content_desc;
				$this->data['content_imageurl']=$content_imageurl;
				$this->data['content_alias']=$content_alias;
				$this->data['content_metadescription']=$content_metadescription;
				$this->data['content_metakeywords']=$content_metakeywords;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Content/add',$this->data);
			} else {
				$content_imageurl = str_replace(BASE_URL,"",$content_imageurl);
				$countAlias = 0;
				
				if(!empty($content_alias)) {
					$alias = generateAlias($content_alias);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				} else {
					$alias = generateAlias($content_title);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				}
				
				if ($countAlias > 0 ) {
					$this->data['error']='Alias '.$alias.' already exist from title '.$content_title.'';
				
					$this->data['content_title']=$content_title;
					$this->data['content_shortdesc']=$content_shortdesc;
					$this->data['content_desc']=$content_desc;
					$this->data['content_imageurl']=$content_imageurl;
					$this->data['content_alias']=$content_alias;
					$this->data['content_metadescription']=$content_metadescription;
					$this->data['content_metakeywords']=$content_metakeywords;
				
					$this->load->view('backend/header',$this->data);
					$this->load->view('backend/Content/add',$this->data);
				} else {				
					$content_id = $this->Model_content->insertContent($menu_id,$content_title,$content_desc,$content_imageurl,$content_alias,$content_metadescription,$content_metakeywords,$content_shortdesc);
					if(!empty($content_id)) {
						$aliasid = $this->Model_alias->insertAlias($content_id,$this->alias_category,$alias,$this->data['controller']."/detail/".$content_id);
					}
					
					$log_module = "Add ".$this->module;
					$log_value = $content_id." | ".$content_title." | ".$content_shortdesc." | ".$content_desc." | ".$content_imageurl." | ".$content_alias." | ".$content_metadescription." | ".$content_metakeywords;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
					redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
				}
				
			}	
		}	
	}
        
         function addPages(){
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
		$this->load->view('backend/Content/addpages',$this->data);
	}
        
	public function doAddContentPages(){
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
                $page_type = $this->security->xss_clean(secure_input($_POST['page_type']));
		$content_page_title = $this->security->xss_clean(secure_input($_POST['content_page_title']));
		$content_page_shortdesc = secure_input_editor($_POST['content_page_shortdesc']);
		$content_page_desc = secure_input_editor($_POST['content_page_desc']);
                
              
		$content_page_imageurl = $this->security->xss_clean(secure_input($_POST['content_page_imageurl']));
		$content_page_alias = $this->security->xss_clean(secure_input($_POST['content_page_alias']));
		$content_page_metadescription = $this->security->xss_clean(secure_input($_POST['content_page_metadescription']));
		$content_page_metakeywords = $this->security->xss_clean(secure_input($_POST['content_page_metakeywords']));
		
		$pesan = array();
		// Validasi data
		if ($content_page_title=="") {
			$pesan[] = 'Content Page Title is empty';
		} else if ($content_page_desc=="") {
			$pesan[] = 'Content Page Description is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['content_page_title']=$content_page_title;
				$this->data['content_page_shortdesc']=$content_page_shortdesc;
				$this->data['content_page_desc']=$content_page_desc;
				$this->data['content_page_imageurl']=$content_page_imageurl;
				$this->data['content_page_metadescription']=$content_page_metadescription;
				$this->data['content_page_metakeywords']=$content_page_metakeywords;
					
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Content/addpages',$this->data);
			}
		} else {
			$cekContent = $this->Model_content->checkContent($content_page_title);
			$countContent = count($cekContent);
			
			if ($countContent > 0 ) {
				$this->data['error']='Content Title '.$content_page_title.' already exist';
				
				$this->data['content_page_title']=$content_page_title;
				$this->data['content_page_shortdesc']=$content_page_shortdesc;
				$this->data['content_page_desc']=$content_page_desc;
				$this->data['content_page_imageurl']=$content_page_imageurl;
				$this->data['content_page_alias']=$content_page_alias;
				$this->data['content_page_metadescription']=$content_page_metadescription;
				$this->data['content_page_metakeywords']=$content_page_metakeywords;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Content/add',$this->data);
			} else {
				$content_page_imageurl = str_replace(BASE_URL,"",$content_page_imageurl);
				$content_page_id = $this->Model_content->insertContentPages($menu_id,$page_type,$content_page_title,$content_page_desc,$content_page_imageurl,$content_page_metadescription,$content_page_metakeywords,$content_page_shortdesc);
				
                                $today= date("Y-m-d H:i:s");
                                $data = array();
                                  for ($i = 0; $i < count($this->input->post('subpage_title')); $i++) {
                                      $checkfile = $this->Model_content_subpage->checkSubpage($this->security->xss_clean(secure_input($_POST['content_subpage_title'][$i])), $content_page_id);
                                      if (empty($checkfile)){

                                         $data[] = array(
                                          'content_page_id'=>$content_page_id,
                                          'content_subpage_title' => $this->security->xss_clean(secure_input($_POST['subpage_title'][$i])),
                                          'content_subpage_desc' => $this->security->xss_clean(secure_input($_POST['subpage_desc'][$i])),
                                          'content_subpage_image' => $this->security->xss_clean(secure_input($_POST['subpage_image'][$i])), 
                                          'content_subpage_order'=>1,
                                          'content_subpage_active_status'=>1,
                                          'content_subpage_create_date'=>$today,
                                          'content_subpage_create_by'=>$_SESSION['admin_data']['user_id'],
                                          'content_subpage_update_date'=>'',
                                          'content_subpage_update_by'=>''

                                           );  
                                      }


                                  }
//print_r($data);
//die;
                                        $this->Model_content_subpage->insertSubpage($data);
					
					$log_module = "Add ".$this->module;
					$log_value = $content_page_id." | ".$content_page_title." | ".$content_page_shortdesc." | ".$content_page_desc." | ".$content_page_imageurl." | ".$content_page_metadescription." | ".$content_page_metakeywords;
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
		
		$rsContent = $this->Model_content->getContent($id); 
		$title = $rsContent[0]['content_title'];
		$active_status = abs($rsContent[0]['content_active_status']-1);
		
		$active = $this->Model_content->activeContent($id);
		createRouteAlias(); //create route alias
		
		if($active_status == 1){
			$log_module = "Active ".$this->module;
		} else {
			$log_module = "Inactive ".$this->module;
		}
		$log_value = $id." | ".$title." | ".$active_status;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
		
	}
	function activePage($id){
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
		
		$rsContent = $this->Model_content->getContentPage($id); 
		$title = $rsContent[0]['content_page_title'];
		$active_status = abs($rsContent[0]['content_page_active_status']-1);
		
		$active = $this->Model_content->activeContentPage($id);
		createRouteAlias(); //create route alias
		
		if($active_status == 1){
			$log_module = "Active ".$this->module;
		} else {
			$log_module = "Inactive ".$this->module;
		}
		$log_value = $id." | ".$title." | ".$active_status;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
		
	}
       function activeMaterial($id){
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
		
		$rsContent = $this->Model_material->getMaterial($id); 
		$title = $rsContent[0]['material_title'];
		$active_status = abs($rsContent[0]['material_active_status']-1);
		
		$active = $this->Model_material->activeMaterial($id);
		
		
		if($active_status == 1){
			$log_module = "Active ".$this->module;
		} else {
			$log_module = "Inactive ".$this->module;
		}
		$log_value = $id." | ".$title." | ".$active_status;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
		
	} 
        
        
	function deleteContent($id){
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
		
		$rsContent = $this->Model_content->getContent($id); 
		$title = $rsContent[0]['content_title'];
               
                $page_type = $rsContent[0]['page_type'];
                if($page_type=2){
                    
                    $this->deleteGallery($id);
                }
                
		$delete = $this->Model_content->deleteContent($id);
		$delete_alias = $this->Model_alias->deleteAlias($id, $this->alias_category);
		createRouteAlias(); //create route alias
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}
        function deletePage($id){
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
		
		$rsContent = $this->Model_content->getContentPage($id); 
		$title = $rsContent[0]['content_title'];
               
                $page_type = $rsContent[0]['page_type'];
                if($page_type=2){
                    
                    $this->deleteGallery($id);
                }
                
		$delete = $this->Model_content->deleteContentPage($id);
		
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

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
	public function editContent($id){
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
		
		$rsContent = $this->Model_content->getContent($id);  // mengambil database dari model untuk dikirim ke view
		
                $countContent = count($rsContent);
		
		$this->data['rsContent'] = $rsContent;
		$this->data['countContent'] = $countContent;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Content/edit',$this->data);
	}
	
	public function doEditContent($id){
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
		
		$rsContent = $this->Model_content->getContent($id);  // mengambil database dari model untuk dikirim ke view
		$countContent = count($rsContent);
		
		$this->data['rsContent'] = $rsContent;
		$this->data['countContent'] = $countContent;
                
		$menu_id = $this->security->xss_clean(secure_input($_POST['menu_id']));
               
		$content_title = $this->security->xss_clean(secure_input($_POST['content_title']));
		$content_shortdesc = secure_input_editor($_POST['content_shortdesc']);
		$content_titleOld = $this->security->xss_clean(secure_input($_POST['content_titleOld']));
		$content_desc = secure_input_editor($_POST['content_desc']);
		$content_imageurl = $this->security->xss_clean(secure_input($_POST['content_imageurl']));
		$content_alias = $this->security->xss_clean(secure_input(@$_POST['content_alias']));
		$content_metadescription = $this->security->xss_clean(secure_input($_POST['content_metadescription']));
		$content_metakeywords = $this->security->xss_clean(secure_input($_POST['content_metakeywords']));
		
		$pesan = array();
		// Validasi data
		if ($content_imageurl=="") {
			$pesan[] = 'Content Image is empty';
		} 
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Content/edit',$this->data);
			}
		} else {
			$cekContent = $this->Model_content->checkContent($content_title);
			$countContent = count($cekContent);
			
			if($content_title == $content_titleOld){
				$countContent = 0;
			}
			
			if ($countContent > 0 ) {
                                
				$this->data['error']='Content Title '.$content_title.' already exist';

				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Content/edit',$this->data);
			} else {
				$content_imageurl = str_replace(BASE_URL,"",$content_imageurl);
				$countAlias = 0;
				
				if(!empty($content_alias)) {
					$alias = generateAlias($content_alias);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				} else {
					$alias = generateAlias($content_title);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				}
				
				if($content_title == $content_titleOld){
					$countAlias = 0;
				}
				
				if ($countAlias > 0 ) {
					$this->data['error']='Alias '.$alias.' already exist from title '.$content_title.'';
					
					$this->load->view('backend/header',$this->data);
					$this->load->view('backend/Content/edit',$this->data);
				} else {				
					$update = $this->Model_content->updateContent($id,$menu_id,$content_title,$content_desc,$content_imageurl,$content_alias,$content_metadescription,$content_metakeywords,$content_shortdesc);
					if($update) {
						$this->Model_alias->updateAlias($id,$alias,$this->alias_category);
					}
					
					createRouteAlias(); //create route alias
					
					$log_module = "Edit ".$this->module;
					$log_value = $id." | ".$content_title." | ".$content_shortdesc." | ".$content_desc." | ".$content_imageurl." | ".$content_alias." | ".$content_metadescription." | ".$content_metakeywords;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
					//Cache JSON Content
//					$ListContent = $this->generateContent();
//					createCache($ListContent,"content_");
					//End Cache JSON Content
					
					redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
				}
			}	
		}
		
	}
        
      public function editPage($id){
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
		
		$rsContent = $this->Model_content->getContentPage($id);  // mengambil database dari model untuk dikirim ke view
		
                $countContent = count($rsContent);
		
		$this->data['rsContent'] = $rsContent;
		$this->data['countContent'] = $countContent;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Content/editpage',$this->data);
	}
	
	public function doEditPage($id){
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
		
		$rsContent = $this->Model_content->getContent($id);  // mengambil database dari model untuk dikirim ke view
		$countContent = count($rsContent);
		
		$this->data['rsContent'] = $rsContent;
		$this->data['countContent'] = $countContent;
                
		$menu_id = $this->security->xss_clean(secure_input($_POST['menu_id']));
                $page_type = $this->security->xss_clean(secure_input($_POST['page_type']));
		$content_page_title = $this->security->xss_clean(secure_input($_POST['content_page_title']));
		$content_page_shortdesc = secure_input_editor($_POST['content_page_shortdesc']);
		$content_page_titleOld = $this->security->xss_clean(secure_input($_POST['content_page_titleOld']));
		$content_page_desc = secure_input_editor($_POST['content_page_desc']);
		$content_page_imageurl = $this->security->xss_clean(secure_input($_POST['content_page_imageurl']));
	
		$content_page_metadescription = $this->security->xss_clean(secure_input($_POST['content_page_metadescription']));
		$content_page_metakeywords = $this->security->xss_clean(secure_input($_POST['content_page_metakeywords']));
		
		$pesan = array();
		// Validasi data
		if ($content_page_title=="") {
			$pesan[] = 'Content Title is empty';
		} else if ($content_page_desc=="") {
			$pesan[] = 'Content Description is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Content/edit',$this->data);
			}
		} else {
			$cekContent = $this->Model_content->checkContent($content_page_title);
			$countContent = count($cekContent);
			
			if($content_page_title == $content_page_titleOld){
				$countContent = 0;
			}
			
			if ($countContent > 0 ) {
				$this->data['error']='Content Title '.$content_page_title.' already exist';

				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Content/edit',$this->data);
			} else {
				echo $content_page_imageurl = str_replace(BASE_URL,"",$content_page_imageurl);
				
				
				$update = $this->Model_content->updateContentPages($id,$menu_id,$page_type,$content_page_title,$content_page_desc,$content_page_imageurl,$content_page_metadescription,$content_page_metakeywords,$content_page_shortdesc);				
                                $log_module = "Edit ".$this->module;
                                $log_value = $id." | ".$content_page_title." | ".$content_page_shortdesc." | ".$content_page_desc." | ".$content_page_imageurl." | ".$content_page_metadescription." | ".$content_page_metakeywords;
                                $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

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
			$this->Model_content->updateOrderContent($id,$ordervalue);
                        echo $ordervalue;
		}
		
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}
        function doOrderPage(){
		
		$order = $this->security->xss_clean($_POST['order']);
		
		if($order == ""){
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		} 
		
		foreach($order as $id => $ordervalue){
			$this->Model_content->updateOrderContentPage($id,$ordervalue);
                        echo $ordervalue;
		}
		
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}
	
        
         public function doAddHeadQuote(){
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
		
		 $quote_desc = $this->security->xss_clean(secure_input($_POST['quote_desc']));
		
		
		$pesan = array();
		// Validasi data
		if ($quote_desc=="") {
			$pesan[] = 'quote desc Title is empty';
		}
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['quote_desc']=$quote_desc;
				
					
				 redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			}
		} else {
                     $data = array(    
                                          'quote_desc' => $quote_desc,                           
                                           ); 
                  //print_r($data);
                
                    $ListHeadQuote= $data;
                    createCache($ListHeadQuote,"services_head_quote");
                    $log_module = "Add ".$this->module;
                    $log_value = "About_head_quote | ".$quote_desc;
                    $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

                    redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
                }	
	} 
        
        
}