<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
//	public $section = 8; //get module group id from database
//	public $module_id = 15; //get module id from database
	public $alias_category = "News";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Model_content','backend/Model_news','backend/Model_tagging','backend/Model_gallery','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias','text'));
		
                $module_name=  $this->uri->segment(2);
                $getmodule = $this->Model_news->getModule($module_name);
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
                $this->data['MenuNews'] = $this->Model_menu_frontend->getMenuContent($_SESSION['module_id']);
                $this->data['Newscategory'] = $this->Model_news->getNewsCategory();
                $this->data['menu_id'] = $this->Model_content->getMenuContent($_SESSION['module_id']);
                $this->data['Pageview'] = $this->Model_content->getPageView();
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
		
                
                $ListContent = $this->Model_content->getListContent($this->data['modul_id'],$cond);
		$this->data["ListContent"] = $ListContent;
                
                
		$orderBynews = "ORDER BY a.news_order Asc";
		
		$condnews 			= $where." ".$orderBynews;    
		$ListNews = $this->Model_news->getListNews($this->data['modul_id'],$condnews);
		$this->data["ListNews"] = $ListNews;
                
		
                $pathHeadQuote = PATH_ASSETS."/json/news_head_quote.json";
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
               
		
		
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/News/list');
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
		$this->load->view('backend/News/add',$this->data);
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
				$this->load->view('backend/Career/add',$this->data);
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
				$this->load->view('backend/Career/add',$this->data);
			} else {
                                        $content_id = $this->Model_content->insertContent($menu_id,$content_title,$content_desc,$content_imageurl,$content_alias,$content_metadescription,$content_metakeywords,$content_shortdesc);				
					$log_module = "Add ".$this->module;
					$log_value = $content_id." | ".$content_title." | ".$content_shortdesc." | ".$content_desc." | ".$content_imageurl." | ".$content_alias." | ".$content_metadescription." | ".$content_metakeywords;
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
		$this->load->view('backend/News/edit',$this->data);
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
				$this->load->view('backend/Career/edit',$this->data);
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
				$this->load->view('backend/Career/edit',$this->data);
			} else {
				$content_imageurl = str_replace(BASE_URL,"",$content_imageurl);
				$countAlias = 0;
				$update = $this->Model_content->updateContent($id,$menu_id,$content_title,$content_desc,$content_imageurl,$content_alias,$content_metadescription,$content_metakeywords,$content_shortdesc);
					
					
					$log_module = "Edit ".$this->module;
					$log_value = $id." | ".$content_title." | ".$content_shortdesc." | ".$content_desc." | ".$content_imageurl." | ".$content_alias." | ".$content_metadescription." | ".$content_metakeywords;
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
        
	 function addNews(){
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
		$this->data['tagging']=  $this->Model_tagging->getListTagging('');
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/News/addnews',$this->data);
	}
	
	public function doAddNews(){
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
		
                $newstag = $_POST['newstag'];
		
		$newstag_new = "";
		if(!empty($newstag)){
			foreach($newstag as $tag){
				$cekTagging = $this->Model_tagging->checkTagging($tag);
				$countTagging = count($cekTagging);
				if($countTagging < 1) $taggingid = $this->Model_tagging->insertTagging($tag);
				$newstag_new .= $tag.",";
			}
			$newstag_new = substr($newstag_new, 0, -1);
		}
                
		$news_title = $this->security->xss_clean(secure_input($_POST['news_title']));
		$news_shortdesc = secure_input_editor($_POST['news_shortdesc']);
		$news_desc = secure_input_editor($_POST['news_desc']);
                
                $news_publish_date = secure_input_editor($_POST['news_publish_date']);
               
		$news_imageurl = $this->security->xss_clean(secure_input($_POST['news_imageurl']));
		$news_alias = $this->security->xss_clean(secure_input($_POST['news_alias']));
		$news_metadescription = $this->security->xss_clean(secure_input($_POST['news_metadescription']));
		$news_metakeywords = $this->security->xss_clean(secure_input($_POST['news_metakeywords']));
               
                $category_title = $this->security->xss_clean(secure_input($_POST['category_title']));
                if ($category_title == ''){
                    $cat = $this->security->xss_clean(secure_input($_POST['category_id']));
                }
                else {
                    $cat = $this->Model_news->insertCategory($category_title);  
                }
               $category_id =$cat;
                
                
		
		$pesan = array();
		// Validasi data
		if ($news_title=="") {
			$pesan[] = 'News Title is empty';
		} 
		 else if ($news_desc=="") {
			$pesan[] = 'News Description is empty';
		} 
		else if ($news_publish_date=="") {
			$pesan[] = 'news publish date is empty';
		} 
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->data['news_title']=$news_title;
                                $this->data['category_title']=$category_title;
				$this->data['news_shortdesc']=$news_shortdesc;
				$this->data['news_desc']=$news_desc;
				$this->data['news_imageurl']=$news_imageurl;
				$this->data['news_alias']=$news_alias;
				$this->data['news_metadescription']=$news_metadescription;
				$this->data['news_metakeywords']=$news_metakeywords;
					
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/News/addnews',$this->data);
			}
		} else {
			$cekNews = $this->Model_news->checkNews($news_title);
			$countNews = count($cekNews);
			
			if ($countNews > 0 ) {
				$this->data['error']='News Title '.$news_title.' already exist';
				
				$this->data['news_title']=$news_title;
                              
				$this->data['news_shortdesc']=$news_shortdesc;
				$this->data['news_desc']=$news_desc;
                               
				$this->data['news_imageurl']=$news_imageurl;
				$this->data['news_alias']=$news_alias;
				$this->data['news_metadescription']=$news_metadescription;
				$this->data['news_metakeywords']=$news_metakeywords;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/News/addnews',$this->data);
			} else {
				$news_imageurl = str_replace(BASE_URL,"",$news_imageurl);
				$countAlias = 0;
				
				if(!empty($news_alias)) {
					$alias = generateAlias($news_alias);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				} else {
					$alias = generateAlias($news_title);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				}
				
				if ($countAlias > 0 ) {
					$this->data['error']='Alias '.$alias.' already exist from title '.$news_title.'';
				
					$this->data['news_title']=$news_title;
					$this->data['news_shortdesc']=$news_shortdesc;
					$this->data['news_desc']=$news_desc;
					$this->data['news_imageurl']=$news_imageurl;
					$this->data['news_alias']=$news_alias;
					$this->data['news_metadescription']=$news_metadescription;
					$this->data['news_metakeywords']=$news_metakeywords;
				
					$this->load->view('backend/header',$this->data);
					$this->load->view('backend/News/addnews',$this->data);
				} else {
                                  
					$news_id = $this->Model_news->insertNews($category_id,$news_title,$news_desc,$news_imageurl,$news_publish_date,$alias,$newstag_new,$news_metadescription,$news_metakeywords,$news_shortdesc);
					if(!empty($news_id)) {
						$aliasid = $this->Model_alias->insertAlias($news_id,$this->alias_category,$alias,$this->data['controller']."/detail/".$news_id);
					}
					
					$log_module = "Add ".$this->module;
					$log_value = $news_id." | ".$news_title." | ".$news_shortdesc." | ".$news_desc." | ".$news_imageurl." | ".$news_alias." | ".$news_metadescription." | ".$news_metakeywords;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
					redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
				}
				
			}	
		}	
	}
	
	function activeNews($id){
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
		
		$rsNews = $this->Model_news->getNews($id); 
		$title = $rsNews[0]['news_title'];
		$active_status = abs($rsNews[0]['news_active_status']-1);
		
		$active = $this->Model_news->activeNews($id);
		createRouteAlias(); //create route alias
		
		if($active_status == 1){
			$log_module = "Active ".$this->module;
		} else {
			$log_module = "Inactive ".$this->module;
		}
		$log_value = $id." | ".$title." | ".$active_status;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                
                $this->generateNews();
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
		
	}
	
	function deleteNews($id){
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
		
		$rsNews = $this->Model_news->getNews($id); 
		$title = $rsNews[0]['news_title'];
               
                $category_id = $rsNews[0]['category_id'];
                if($category_id=2){
                    
                    $this->deleteGallery($id);
                }
                
		$delete = $this->Model_news->deleteNews($id);
		$delete_alias = $this->Model_alias->deleteAlias($id, $this->alias_category);
		createRouteAlias(); //create route alias
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                
                $this->generateNews();
		
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
	public function editNews($id){
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
		$this->data['tagging']=  $this->Model_tagging->getListTagging('');
		$rsNews = $this->Model_news->getNews($id);  // mengambil database dari model untuk dikirim ke view
		
                $countNews = count($rsNews);
		
		$this->data['rsNews'] = $rsNews;
		$this->data['countNews'] = $countNews;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/News/editnews',$this->data);
	}
	
	public function doEditNews($id){
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
		
		$rsNews = $this->Model_news->getNews($id);  // mengambil database dari model untuk dikirim ke view
		$countNews = count($rsNews);
		
		$this->data['rsNews'] = $rsNews;
		$this->data['countNews'] = $countNews;
                
		$category_id = $this->security->xss_clean(secure_input($_POST['category_id']));
		$news_title = $this->security->xss_clean(secure_input($_POST['news_title']));
		$news_shortdesc = secure_input_editor($_POST['news_shortdesc']);
		$news_titleOld = $this->security->xss_clean(secure_input($_POST['news_titleOld']));
		$news_desc = secure_input_editor($_POST['news_desc']);
		$news_imageurl = $this->security->xss_clean(secure_input($_POST['news_imageurl']));
                $news_publish_date = secure_input_editor($_POST['news_publish_date']);
		$news_alias = $this->security->xss_clean(secure_input(@$_POST['news_alias']));
		$news_metadescription = $this->security->xss_clean(secure_input($_POST['news_metadescription']));
		$news_metakeywords = $this->security->xss_clean(secure_input($_POST['news_metakeywords']));
		$newstag = $_POST['newstag'];
		
		$newstag_new = "";
		if(!empty($newstag)){
			foreach($newstag as $tag){
				$cekTagging = $this->Model_tagging->checkTagging($tag);
				$countTagging = count($cekTagging);
				if($countTagging < 1) $taggingid = $this->Model_tagging->insertTagging($tag);
				$newstag_new .= $tag.",";
			}
			$newstag_new = substr($newstag_new, 0, -1);
		}
		$pesan = array();
		// Validasi data
		if ($news_title=="") {
			$pesan[] = 'News Title is empty';
		} else if ($news_desc=="") {
			$pesan[] = 'News Description is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/News/editnews',$this->data);
			}
		} else {
			$cekNews = $this->Model_news->checkNews($news_title);
			$countNews = count($cekNews);
			
			if($news_title == $news_titleOld){
				$countNews = 0;
			}
			
			if ($countNews > 0 ) {
				$this->data['error']='News Title '.$news_title.' already exist';

				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/News/editnews',$this->data);
			} else {
				$news_imageurl = str_replace(BASE_URL,"",$news_imageurl);
				$countAlias = 0;
				
				if(!empty($news_alias)) {
					$alias = generateAlias($news_alias);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				} else {
					$alias = generateAlias($news_title);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				}
				
				if($news_title == $news_titleOld){
					$countAlias = 0;
				}
				
				if ($countAlias > 0 ) {
					$this->data['error']='Alias '.$alias.' already exist from title '.$news_title.'';
					
					$this->load->view('backend/header',$this->data);
					$this->load->view('backend/News/editnews',$this->data);
				} else {
                                  
					$update = $this->Model_news->updateNews($id,$category_id,$news_title,$news_desc,$news_imageurl,$news_publish_date,$alias,$newstag_new,$news_metadescription,$news_metakeywords,$news_shortdesc);
					if($update) {
						$this->Model_alias->updateAlias($id,$alias,$this->alias_category);
					}
					
					createRouteAlias(); //create route alias
					
					$log_module = "Edit ".$this->module;
					$log_value = $id." | ".$news_title." | ".$news_shortdesc." | ".$news_desc." | ".$news_imageurl." | ".$news_alias." | ".$news_metadescription." | ".$news_metakeywords;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
					//Cache JSON News
					 $this->generateNews();
					
					//End Cache JSON News
					
					redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
				}
			}	
		}
		
	}
	public function doOrderNews(){
		
		$order = $this->security->xss_clean($_POST['order']);
		
		if($order == ""){
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
			exit();
		} 
		
		foreach($order as $id => $ordervalue){
			$this->Model_news->updateOrderNews($id,$ordervalue);
                        echo $ordervalue;
		}
		 $this->generateNews();
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}

        function generateNews(){
                $ListNews			= $this->Model_news->GenerateNews(" WHERE news_active_status = 1 ORDER BY news_id DESC ");
		$countBanner		= count($ListNews);
		//createCacheBanner($rsBanner,"bannerhome");
               createCache($ListNews,"news");
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
                    createCache($ListHeadQuote,"news_head_quote");
                    $log_module = "Add ".$this->module;
                    $log_value = "About_head_quote | ".$quote_desc;
                    $insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);

                    redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
                }	
	}
}