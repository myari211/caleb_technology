<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Training extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
//	public $section = 8; //get module group id from database
//	public $module_id = 15; //get module id from database
	public $alias_category = "Training";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Model_content','backend/Model_training','backend/Model_content_subpage','backend/Model_material','backend/Model_material_file','backend/Model_gallery','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
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
                $condp = "ORDER BY a.content_page_id Desc";
		
                
                $ListContent = $this->Model_content->getListContent($this->data['modul_id'],$cond);
		$this->data["ListContent"] = $ListContent;      
                
		$ListTraining = $this->Model_training->getListTraining();	
		$this->data["ListTraining"] = $ListTraining;
    
                $pathHeadQuote = PATH_ASSETS."/json/training_head_quote.json";
                $arrHeadQuote = json_decode(file_get_contents($pathHeadQuote),TRUE);
                $this->data['quote_desc'] = $arrHeadQuote['quote_desc'];
                
                
                $pathTrainingQuote = PATH_ASSETS."/json/training_quote.json";
                $arrTrainingQuote = json_decode(file_get_contents($pathTrainingQuote),TRUE);
                $this->data['brand_quote'] = $arrTrainingQuote['brand_quote'];
                $this->data['event_quote'] =  $arrTrainingQuote['event_quote'];
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
               
		
		
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Training/list');
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
		$this->load->view('backend/Training/add',$this->data);
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
				$this->load->view('backend/Training/add',$this->data);
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
				$this->load->view('backend/Training/add',$this->data);
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
					$this->load->view('backend/Training/add',$this->data);
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
		$this->load->view('backend/Training/edit',$this->data);
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
			$pesan[] = 'Header Images is empty';
		}
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Training/edit',$this->data);
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
				$this->load->view('backend/Training/edit',$this->data);
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
					$this->load->view('backend/Training/edit',$this->data);
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
  
     function addTraining(){
		//extract privilege
		$this->data["add"] = $this->privilege[2];
		
		if($this->data["add"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		//$this->data['Material'] = $this->Model_training->getMaterial();
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Training/addtraining',$this->data);
	}   
        public function doAddTraining(){
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
		
             
		$training_title = $this->security->xss_clean(secure_input($_POST['training_title']));
                $training_brand = $this->security->xss_clean(secure_input($_POST['training_brand']));
                $training_brand_image = $this->security->xss_clean(secure_input($_POST['training_brand_image']));
                $training_type = $this->security->xss_clean(secure_input($_POST['training_type']));
                $training_location = $this->security->xss_clean(secure_input($_POST['training_location']));
		$training_shortdesc = secure_input_editor($_POST['training_shortdesc']);
		$training_desc = secure_input_editor($_POST['training_desc']);
                $training_date = secure_input_editor($_POST['training_date']);                
                $training_start_time = secure_input_editor($_POST['training_start_time']);
                $training_end_time = secure_input_editor($_POST['training_end_time']);
		$training_imageurl = $this->security->xss_clean(secure_input($_POST['training_imageurl']));
		$training_alias = $this->security->xss_clean(secure_input($_POST['training_alias']));
		$training_metadescription = $this->security->xss_clean(secure_input($_POST['training_metadescription']));
		$training_metakeywords = $this->security->xss_clean(secure_input($_POST['training_metakeywords']));
               
                
                
		
		$pesan = array();
		// Validasi data
		if ($training_title=="") {
			$pesan[] = 'Training Title is empty';
		} 
		 else if ($training_desc=="") {
			$pesan[] = 'Training Description is empty';
		} 
		else if ($training_date=="") {
			$pesan[] = 'training publish date is empty';
		} 
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['training_title']=$training_title;
                                $this->data['training_brand']=$training_brand;
                                $this->data['training_brand_image']=$training_brand_image;
                                $this->data['training_location']=$training_location;
				$this->data['training_shortdesc']=$training_shortdesc;
				$this->data['training_desc']=$training_desc;
				$this->data['training_imageurl']=$training_imageurl;
                                $this->data['training_date']=$training_date;                
                                $this->data['training_start_time']=$training_start_time;
                                $this->data['training_end_time']=$training_end_time;
				$this->data['training_alias']=$training_alias;
				$this->data['training_metadescription']=$training_metadescription;
				$this->data['training_metakeywords']=$training_metakeywords;
                                
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Training/add',$this->data);
			}
		} else {
			$cekTraining = $this->Model_training->checkTraining($training_title);
			$countTraining = count($cekTraining);
			
			if ($countTraining > 0 ) {
				$this->data['error']='Training Title '.$training_title.' already exist';
				
				$this->data['training_title']=$training_title;
                                $this->data['training_brand']=$training_brand;
                                $this->data['training_brand_image']=$training_brand_image;
                                $this->data['training_location']=$training_location;
				$this->data['training_shortdesc']=$training_shortdesc;
				$this->data['training_desc']=$training_desc;
				$this->data['training_imageurl']=$training_imageurl;
                                $this->data['training_date']=$training_date;                
                                $this->data['training_start_time']=$training_start_time;
                                $this->data['training_end_time']=$training_end_time;
				$this->data['training_alias']=$training_alias;
				$this->data['training_metadescription']=$training_metadescription;
				$this->data['training_metakeywords']=$training_metakeywords;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Training/addtraining',$this->data);
			} else {
				$training_imageurl = str_replace(BASE_URL,"",$training_imageurl);
                                $training_brand_image =  str_replace(BASE_URL,"",$training_brand_image);
				$countAlias = 0;
				
				if(!empty($training_alias)) {
					$alias = generateAlias($training_alias);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				} else {
					$alias = generateAlias($training_title);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				}
				
				if ($countAlias > 0 ) {
					$this->data['error']='Alias '.$alias.' already exist from title '.$training_title.'';
				
					$this->data['training_title']=$training_title;
                                        $this->data['training_brand']=$training_brand;
                                        $this->data['training_brand_image']=$training_brand_image;
                                        $this->data['training_location']=$training_location;
                                        $this->data['training_shortdesc']=$training_shortdesc;
                                        $this->data['training_desc']=$training_desc;
                                        $this->data['training_imageurl']=$training_imageurl;
                                        $this->data['training_date']=$training_date;                
                                        $this->data['training_start_time']=$training_start_time;
                                        $this->data['training_end_time']=$training_end_time;
                                        $this->data['training_alias']=$training_alias;
                                        $this->data['training_metadescription']=$training_metadescription;
                                        $this->data['training_metakeywords']=$training_metakeywords;
				
					$this->load->view('backend/header',$this->data);
					$this->load->view('backend/Training/addtraining',$this->data);
				} else {
                                  
					$training_id = $this->Model_training->insertTraining($training_title, $training_brand,$training_brand_image, $training_type ,$training_location ,$training_shortdesc,$training_desc, $training_date,$training_start_time,$training_end_time,$training_imageurl,$alias,$training_metadescription,$training_metakeywords);
					if(!empty($training_id)) {
						$aliasid = $this->Model_alias->insertAlias($training_id,$this->alias_category,$alias,$this->data['controller']."/detail/".$training_id);
					}
					
					$log_module = "Add ".$this->module;
					$log_value = $training_id." | ".$training_title." | ".$training_shortdesc." | ".$training_desc." | ".$training_imageurl." | ".$alias." | ".$training_metadescription." | ".$training_metakeywords;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
					redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
				}
				
			}	
		}	
	}
        
      function activeTraining($id){
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
		
		$rsTraining = $this->Model_training->getTraining($id); 
		$title = $rsTraining[0]['training_title'];
		$active_status = abs($rsTraining[0]['training_active_status']-1);
		
		$active = $this->Model_training->activeTraining($id);
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
        function deleteTraining($id){
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
		
		$rsTraining = $this->Model_training->getTraining($id); 
		$title = $rsTraining[0]['training_title'];
               
              
                
		$delete = $this->Model_training->deleteTraining($id);
		$delete_alias = $this->Model_alias->deleteAlias($id, $this->alias_category);
		createRouteAlias(); //create route alias
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);   
                
                
                
                redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}
        
        public function editTraining($id){
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
		//$this->data['Material'] = $this->Model_training->getMaterial();
		$rsTraining = $this->Model_training->getTraining($id);  // mengambil database dari model untuk dikirim ke view
		
                $countTraining = count($rsTraining);
		
		$this->data['rsTraining'] = $rsTraining;
		$this->data['countTraining'] = $countTraining;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Training/edittraining',$this->data);
	}
        
        public function doEditTraining($id){
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
		
		$rsTraining = $this->Model_training->getTraining($id);  // mengambil database dari model untuk dikirim ke view
		$countTraining = count($rsTraining);
		
		$this->data['rsTraining'] = $rsTraining;
		$this->data['countTraining'] = $countTraining;
		$training_title = $this->security->xss_clean(secure_input($_POST['training_title']));
                $training_titleOld = $this->security->xss_clean(secure_input($_POST['training_titleOld']));
                $training_brand = $this->security->xss_clean(secure_input($_POST['training_brand']));
                $training_brand_image = $this->security->xss_clean(secure_input($_POST['training_brand_image']));
                $training_type = $this->security->xss_clean(secure_input($_POST['training_type']));
                $training_location = $this->security->xss_clean(secure_input($_POST['training_location']));
		$training_shortdesc = secure_input_editor($_POST['training_shortdesc']);
		$training_desc = secure_input_editor($_POST['training_desc']);
                $training_date = secure_input_editor($_POST['training_date']);                
                $training_start_time = secure_input_editor($_POST['training_start_time']);
                $training_end_time = secure_input_editor($_POST['training_end_time']);
		$training_imageurl = $this->security->xss_clean(secure_input($_POST['training_imageurl']));
		$training_alias = $this->security->xss_clean(secure_input($_POST['training_alias']));
		$training_metadescription = $this->security->xss_clean(secure_input($_POST['training_metadescription']));
		$training_metakeywords = $this->security->xss_clean(secure_input($_POST['training_metakeywords']));
		
		$pesan = array();
		// Validasi data
		if ($training_title=="") {
			$pesan[] = 'Training Title is empty';
		} else if ($training_desc=="") {
			$pesan[] = 'Training Description is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Training/edittraining',$this->data);
			}
		} else {
			$cekTraining = $this->Model_training->checkTraining($training_title);
			$countTraining = count($cekTraining);
			
			if($training_title == $training_titleOld){
				$countTraining = 0;
			}
			
			if ($countTraining > 0 ) {
				$this->data['error']='Training Title '.$training_title.' already exist';

				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Training/edittraining',$this->data);
			} else {
				$training_imageurl = str_replace(BASE_URL,"",$training_imageurl);
                                $training_brand_image =  str_replace(BASE_URL,"",$training_brand_image);
				$countAlias = 0;
				
				if(!empty($training_alias)) {
					$alias = generateAlias($training_alias);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				} else {
					$alias = generateAlias($training_title);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				}
				
				if($training_title == $training_titleOld){
					$countAlias = 0;
				}
				
				if ($countAlias > 0 ) {
					$this->data['error']='Alias '.$alias.' already exist from title '.$training_title.'';
					
					$this->load->view('backend/header',$this->data);
					$this->load->view('backend/Training/edittraining',$this->data);
				} else {
                                  
					$update = $this->Model_training->updateTraining($id,$training_title, $training_brand,$training_brand_image, $training_type ,$training_location ,$training_shortdesc,$training_desc, $training_date,$training_start_time,$training_end_time,$training_imageurl,$alias,$training_metadescription,$training_metakeywords);
					if($update) {
						$this->Model_alias->updateAlias($id,$alias,$this->alias_category);
					}
					
					createRouteAlias(); //create route alias
					
					$log_module = "Edit ".$this->module;
					$log_value = $id." | ".$training_title." | ".$training_shortdesc." | ".$training_desc." | ".$training_imageurl." | ".$training_alias." | ".$training_metadescription." | ".$training_metakeywords;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
					//Cache JSON Training
					 
					
					//End Cache JSON Training
					
					redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
				}
			}	
		}
		
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
			redirect(BASE_URL_BACKEND."/training_quote");
			exit();
		}
		
		$admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
		$this->data['breadcrump'] = $this->breadcrump;
		
		 $brand_quote = $this->security->xss_clean(secure_input($_POST['brand_quote']));
		 $event_quote = $this->security->xss_clean(secure_input($_POST['event_quote']));
		
		$pesan = array();
		// Validasi data
		if ($brand_quote=="") {
			$pesan[] = 'TrainingQuote Title is empty';
		} else if ($event_quote=="") {
			$pesan[] = 'TrainingQuote Desc is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['brand_quote']=$brand_quote;
				$this->data['event_quote']=$event_quote;
				
					
				 redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			}
		} else {
                     $data = array(    
                                          'brand_quote' => $brand_quote,
                                          'event_quote' => $event_quote                            
                                           ); 
                  //print_r($data);
                
                    $ListTrainingQuote= $data;
                    createCache($ListTrainingQuote,"training_quote");
                    $log_module = "Add ".$this->module;
                    $log_value = "TrainingQuote | ".$brand_quote." | ".$event_quote;
                    $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

                    redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
                }	
	}
        
        function generateBrand(){
              $ListBrand                = $this->Model_training->GenerateBrand("where a.training_active_status = 1 ORDER BY a.training_brand Desc");
              $countBrand		= count($ListBrand);
              createCache($ListBrand,"brand");
              
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
                    createCache($ListHeadQuote,"training_head_quote");
                    $log_module = "Add ".$this->module;
                    $log_value = "About_head_quote | ".$quote_desc;
                    $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

                    redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
                }	
	}   
}