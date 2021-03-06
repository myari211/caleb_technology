<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Content_subpage extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
	public $section = 8; //get module group id from database
	public $module_id = 28; //get module id from database
	public $alias_category = "Content_subpage";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Model_content','backend/Model_content_subpage','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
                $this->load->library('upload');
                
                $module_name=  $this->uri->segment(2);
          
//                 $this->module_id = $gm->module_id;
//                 $this->section = $gm->module_group_id;
               
		//get menu from helper menu
		$this->arrMenu = menu();
		$this->data = array();
                $this->data['ListMenu'] = $this->arrMenu;
                $this->data['CountMenu'] = count($this->arrMenu);
		$this->data['controller'] = $module_name;
                $this->data['page_type'] = $_SESSION['page_type'];
		//check privilege module
		$this->privilege = accessprivilegeuserlevel($_SESSION['admin_data']['user_level_id'],$this->module_id);
		$this->breadcrump = $this->data['controller'];
	}
  
    public function index($content_page_id=NULL)
	{
		$this->view($content_page_id);
	}
       function view($content_page_id=NULL){
                $_SESSION['content_page_id'] = $content_page_id;
                $admin_data = $_SESSION['admin_data'];
		$this->data['admin_data'] = $admin_data;
		$this->data['section'] = $this->section; 
		$this->data['modul_id'] = $this->module_id;
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
		
		
		$orderBy = "ORDER BY a.content_subpage_id ASC";
		
		$cond 			= $where." ".$orderBy;
		$rsUserLevel	= $this->Model_content_subpage->getListSubpage($content_page_id,$cond);
		$base_url		= BASE_URL_BACKEND."/Content_subpage/View/";
		$total_rows		= count($rsUserLevel);
		$per_page		= $perpage;
		
		$this->data['paging']		= pagging($base_url , $total_rows, $per_page);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$start = $per_page*$page - $per_page;
		if ($start<0) $start = 0;
		$cond .= " LIMIT ".$start.",".$per_page;
		$ListSubpage = $this->Model_content_subpage->getListSubpage($content_page_id, $cond);
		
		$this->data["ListSubpage"] = $ListSubpage;
		
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
		$this->load->view('backend/Subpage/list');
	}
	
	
	function insert() {  
        $content_page_id = $_SESSION['content_page_id'];
        $today= date("Y-m-d H:i:s");
            $data = array();
              for ($i = 0; $i < count($this->input->post('subpage_title')); $i++) {
                  $data[] = array(
                      'content_page_id'=>$content_page_id,
                      'content_subpage_title' => $this->security->xss_clean(secure_input($_POST['subpage_title'][$i])),
                      'content_subpage_desc' => $this->security->xss_clean(secure_input($_POST['subpage_desc'][$i])),
                      'content_subpage_image' => $this->security->xss_clean(secure_input($_POST['subpage_image'][$i])), 
                      'content_subpage_active_status'=>0,
                      'content_subpage_order'=>($i+1),
                      'content_subpage_create_date'=>$today,
                      'content_subpage_create_by'=>$_SESSION['admin_data']['user_id'],
                      'content_subpage_update_date'=>'',
                      'content_subpage_update_by'=>''

                  );

              }
//echo'<pre>';
//              print_r($data);
//              die;
              $this->Model_content_subpage->insertSubpage($data);
       
 
         $this->data['errors'] = $this->error;
         $this->data['success'] = $this->success;
        redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$content_page_id);
    }
    public function doOrder(){
		
		$order = $this->security->xss_clean($_POST['order']);
		
		if($order == ""){
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['content_page_id']);
			exit();
		} 
		
		foreach($order as $id => $ordervalue){
			$this->Model_content_subpage->updateOrderAccordion($id,$ordervalue);
                        echo $ordervalue;
		}
		
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['content_page_id']);
	}
        
         function saveSubpage(){
         
            $content_page_id = $_SESSION['primary_key'];
            $content_subpage_id = $this->input->post('primary_key');
            $content_subpage_title = $this->input->post('title');  
            $content_subpage_desc = $this->input->post('desc'); 
            $content_subpage_image = $this->input->post('imgurl');  
            $content_subpage_order = $this->input->post('order'); 
            $this->Model_content_subpage->saveSubpage($content_subpage_title,$content_subpage_desc,$content_subpage_image,$content_subpage_order,$content_subpage_id);
           redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['content_page_id']);
    }

   
        
	
	
	function active($id){
		if (empty($id)) {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['content_page_id']);
			exit();
		}
		
		//extract privilege
		$this->data["approve"] = $this->privilege[5];
		
		if($this->data["approve"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$rsContent = $this->Model_content_subpage->getSubpage($id); 
		$title = $rsContent[0]['content_subpage_title'];
		$active_status = abs($rsContent[0]['content_subpage_active_status']-1);
		
		$active = $this->Model_content_subpage->activeSubpage($id);
		//createRouteAlias(); //create route alias
		
		if($active_status == 1){
			$log_module = "Active ".$this->module;
		} else {
			$log_module = "Inactive ".$this->module;
		}
		$log_value = $id." | ".$title." | ".$active_status;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
		
		//Cache JSON Content
		

		redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['content_page_id']);
		
	}
	
	function delete($id){
		if (empty($id)) {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['content_page_id']);
			exit();
		}
		
		//extract privilege
		$this->data["delete"] = $this->privilege[6];
		
		if($this->data["delete"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
	 
         
               
		$delete = $this->Model_content_subpage->deleteSubpage($id);
		
		//createRouteAlias(); //create route alias
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
		
		//Cache JSON Content
		
		//End Cache JSON Content
		
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['content_page_id']);
	}
	
	
	
	
	
	
    private function handle_error($err) {
    $this->error .= $err . "\r\n";
    }
 
    private function handle_success($succ) {
    $this->success .= $succ . "\r\n";
    }
        
        
}