<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Team extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
//	public $section = 8; //get module group id from database
//	public $module_id = 15; //get module id from database
//	public $alias_category = "aboutlsaf";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Model_team','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
		
                $module_name=  $this->uri->segment(2);
                $getmodule = $this->Model_team->getModule($module_name);
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
               
                $this->data['Position'] = $this->Model_team->getPosition();
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
		
		$orderBy = "ORDER BY a.team_id Desc";
		
		$cond 			= $where." ".$orderBy;
//		$rsUserLevel	= $this->Model_team->getListTeam($this->data['modul_id'],$cond);
//		$base_url		= BASE_URL_BACKEND."/Team/view/";
//		$total_rows		= count($rsUserLevel);
//		$per_page		= $perpage;
//		
//		$this->data['paging']		= pagging($base_url , $total_rows, $per_page);
//		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
//		$start = $per_page*$page - $per_page;
//		if ($start<0) $start = 0;
//		$cond .= " LIMIT ".$start.",".$per_page;
		$ListTeam = $this->Model_team->getListTeam($cond);
		
		$this->data["ListTeam"] = $ListTeam;
		
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
		$this->load->view('backend/Team/list');
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
		$this->load->view('backend/Team/add',$this->data);
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
                $position_id = $this->security->xss_clean(secure_input($_POST['position_id']));
		$team_title = $this->security->xss_clean(secure_input($_POST['team_title']));
		$team_position = secure_input_editor($_POST['team_position']);
		$team_desc = secure_input_editor($_POST['team_desc']);
		$team_imageurl = $this->security->xss_clean(secure_input($_POST['team_imageurl']));
		
		
		$pesan = array();
		// Validasi data
		if ($team_title=="") {
			$pesan[] = 'Team Title is empty';
		} 
                else if ($team_position=="") {
			$pesan[] = 'Team Position is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				$this->data['team_title']=$team_title;
				$this->data['team_position']=$team_position;
				$this->data['team_desc']=$team_desc;
				$this->data['team_imageurl']=$team_imageurl;
				
					
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Team/add',$this->data);
			}
		} else {
			$cekTeam = $this->Model_team->checkTeam($team_title);
			$countTeam = count($cekTeam);
			
			if ($countTeam > 0 ) {
				$this->data['error']='Team Title '.$team_title.' already exist';
				
				$this->data['team_title']=$team_title;
				$this->data['team_position']=$team_position;
				$this->data['team_desc']=$team_desc;
				$this->data['team_imageurl']=$team_imageurl;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Team/add',$this->data);
			} else {
                            $team_imageurl = str_replace(BASE_URL,"",$team_imageurl);
				
                            $team_id = $this->Model_team->insertTeam($position_id,$team_title,$team_desc,$team_imageurl,$team_position);
					
					$log_module = "Add ".$this->module;
					$log_value = $team_id." | ".$team_title." | ".$team_position." | ".$team_desc;
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
		
		$rsTeam = $this->Model_team->getTeam($id); 
		$title = $rsTeam[0]['team_title'];
		$active_status = abs($rsTeam[0]['team_active_status']-1);
		
		$active = $this->Model_team->activeTeam($id);
		createRouteAlias(); //create route alias
		
		if($active_status == 1){
			$log_module = "Active ".$this->module;
		} else {
			$log_module = "Inactive ".$this->module;
		}
		$log_value = $id." | ".$title." | ".$active_status;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                $this->generateTeam();
                 
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
		
		$rsTeam = $this->Model_team->getTeam($id); 
		$title = $rsTeam[0]['team_title'];
               
                $position_id = $rsTeam[0]['position_id'];
             
		$delete = $this->Model_team->deleteTeam($id);
		
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
                $this->generateTeam();
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
		
		$rsTeam = $this->Model_team->getTeam($id);  // mengambil database dari model untuk dikirim ke view
		
                $countTeam = count($rsTeam);
		
		$this->data['rsTeam'] = $rsTeam;
		$this->data['countTeam'] = $countTeam;
		
		$this->load->view('backend/header',$this->data);
		$this->load->view('backend/Team/edit',$this->data);
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
		
		$rsTeam = $this->Model_team->getTeam($id);  // mengambil database dari model untuk dikirim ke view
		$countTeam = count($rsTeam);
		
		$this->data['rsTeam'] = $rsTeam;
		$this->data['countTeam'] = $countTeam;
                
		$menu_id = $this->security->xss_clean(secure_input($_POST['menu_id']));
                $position_id = $this->security->xss_clean(secure_input($_POST['position_id']));
		$team_title = $this->security->xss_clean(secure_input($_POST['team_title']));
		$team_position = secure_input_editor($_POST['team_position']);
		$team_titleOld = $this->security->xss_clean(secure_input($_POST['team_titleOld']));
		$team_desc = secure_input_editor($_POST['team_desc']);
		$team_imageurl = $this->security->xss_clean(secure_input($_POST['team_imageurl']));
		$team_alias = $this->security->xss_clean(secure_input(@$_POST['team_alias']));
		$team_metadescription = $this->security->xss_clean(secure_input($_POST['team_metadescription']));
		$team_metakeywords = $this->security->xss_clean(secure_input($_POST['team_metakeywords']));
		
		$pesan = array();
		// Validasi data
		if ($team_title=="") {
			$pesan[] = 'Team Title is empty';
		} else if ($team_desc=="") {
			$pesan[] = 'Team Description is empty';
		} 
		
		
		if (! count($pesan)==0 ) {
			foreach ($pesan as $indeks=>$pesan_tampil) {
				$this->data['error'] = $pesan_tampil;
				
				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Team/edit',$this->data);
			}
		} else {
			$cekTeam = $this->Model_team->checkTeam($team_title);
			$countTeam = count($cekTeam);
			
			if($team_title == $team_titleOld){
				$countTeam = 0;
			}
			
			if ($countTeam > 0 ) {
				$this->data['error']='Team Title '.$team_title.' already exist';

				$this->load->view('backend/header',$this->data);
				$this->load->view('backend/Team/edit',$this->data);
			} else {
				  $team_imageurl = str_replace(BASE_URL,"",$team_imageurl);
			
				
				if(!empty($team_alias)) {
					$alias = generateAlias($team_alias);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				} else {
					$alias = generateAlias($team_title);
					$cekAlias = $this->Model_alias->checkAliasCategory($alias,$this->alias_category);
					$countAlias = count($cekAlias);
				}
				
				if($team_title == $team_titleOld){
					$countAlias = 0;
				}
				
				if ($countAlias > 0 ) {
					$this->data['error']='Alias '.$alias.' already exist from title '.$team_title.'';
					
					$this->load->view('backend/header',$this->data);
					$this->load->view('backend/Team/edit',$this->data);
				} else {				
					$update = $this->Model_team->updateTeam($id,$position_id,$team_title,$team_desc,$team_imageurl,$team_position);
					if($update) {
						$this->Model_alias->updateAlias($id,$alias,$this->alias_category);
					}
					
					createRouteAlias(); //create route alias
					
					$log_module = "Edit ".$this->module;
					$log_value = $id." | ".$team_title." | ".$team_position." | ".$team_desc." | ".$team_imageurl." | ".$team_alias." | ".$team_metadescription." | ".$team_metakeywords;
					$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
					
                                        $this->generateTeam();
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
			$this->Model_team->updateOrderTeam($id,$ordervalue);
                        echo $ordervalue;
		}
		$this->generateTeam();
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller']);
	}

	 function generateTeam(){
                $ListTeam			= $this->Model_team->GenerateTeam();
		$countBanner		= count($ListTeam);
		//createCacheBanner($rsBanner,"bannerhome");
                createCache($ListTeam,"team");
               
               $count			= $this->Model_team->CountTeam();
               createCache($count,"countteam");
        }
}