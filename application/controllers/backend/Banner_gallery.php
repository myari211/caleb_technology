<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Banner_gallery extends CI_Controller {
	public $arrMenu = array();
	public $data;
	public $privilege = array();
	public $section = 3; //get module group id from database
	public $module_id = 22; //get module id from database
	public $alias_category = "banner_gallery";
	
	public function __construct()
	{
		parent::__construct();
                session_start();
		if(empty($_SESSION['admin_data'])){
			session_destroy();
			redirect(BASE_URL_BACKEND."/signin");
			exit();
		}
		
		$this->load->model(array('backend/Model_menu_frontend','backend/Mupload','backend/Model_banner','backend/Model_banner_gallery','backend/Model_alias', 'backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
                $this->load->library('upload');
                $this->load->library('Image_CRUD');
                $module_name=  $this->uri->segment(2);
          
//                 $this->module_id = $gm->module_id;
//                 $this->section = $gm->module_group_id;
               
		//get menu from helper menu
		$this->arrMenu = menu();
		$this->data = array();
                $this->data['ListMenu'] = $this->arrMenu;
                $this->data['CountMenu'] = count($this->arrMenu);
		$this->data['controller'] = $module_name;
                
		//check privilege module
		$this->privilege = accessprivilegeuserlevel($_SESSION['admin_data']['user_level_id'],$this->module_id);
		$this->breadcrump = breadCrump($this->module_id);
	}
  
    public function index($banner_id=NULL)
	{
                $_SESSION['banner_id'] = $banner_id;
		$this->view();
	}
       function view(){
                $banner_id= $_SESSION['banner_id'];
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
		
		
		$orderBy = "ORDER BY a.banner_gallery_order ASC";
		
		$cond 			= $where." ".$orderBy;
		$rsUserLevel	= $this->Model_banner_gallery->getListBannerGallery($banner_id,$cond);
		$base_url		= BASE_URL_BACKEND."/Banner_gallery/view/";
		 $total_rows		= count($rsUserLevel);
		
		$per_page		= $perpage;
		
		$this->data['paging']		= pagging($base_url , $total_rows, $per_page);
		$page = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$start = $per_page*$page - $per_page;
		if ($start<0) $start = 0;
		 $cond .= " LIMIT ".$start.",".$per_page;
		
		$ListBannerGallery = $this->Model_banner_gallery->getListBannerGallery($banner_id, $cond);
		//print_r($ListBannerGallery);
		
		$this->data["ListBannerGallery"] = $ListBannerGallery;
		
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
		$this->load->view('backend/banner_gallery/list');
	}
	
	
	function doupload() {  
        $banner_id = $_SESSION['banner_id'];
        if ($this->input->post('file_upload')) {
           
        
            $dir_path = './assets/images/';
            $config['upload_path'] = "./assets/images/"; //lokasi folder yang akan digunakan untuk menyimpan file
            $config['allowed_types'] = 'png|jpg|gif'; //extension yang diperbolehkan untuk diupload
            $config['overwrite'] = true;
            $config['allowed_types'] = '*';
          
 
            //upload file
            $i = 0;
            $files = array();
            $is_file_error = FALSE;
 
            if ($_FILES['upload_file1']['size'] <= 0) {
                $this->handle_error('Select at least one file.');
            } else {
              
                foreach ($_FILES as $key => $value) {
                   
                    if (!empty($value['name'])) {  
                    
                          $this->upload->initialize($config);
                        
                       // $this->load->library('upload', $config);
                        if (!$this->upload->do_upload($key)) {
                          
                            $this->handle_error($this->upload->display_errors());
                            $is_file_error = TRUE;
                        } else {
                           
                            $files[$i] = $this->Mupload->do_upload();
                            
                        $data = array(
                   
                            'banner_id'=>$banner_id,
                            'banner_gallery_title'=>'no title',
                            'banner_gallery_desc'=>'no remarks',
                           'banner_gallery_image'=>$this->upload->file_name,                            
                       

                     );
                      
                     $last_id =  $this->Model_banner_gallery->insertBannerGallery($data);
                            ++$i;
                        }
                    }
                }
            }
        }
       
 
         $this->data['errors'] = $this->error;
         $this->data['success'] = $this->success;
        redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$banner_id);
    }
    public function doOrder(){
		
		$order = $this->security->xss_clean($_POST['order']);
		
		if($order == ""){
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['banner_id']);
			exit();
		} 
		
		foreach($order as $id => $ordervalue){
			$this->Model_banner_gallery->updateOrderBannerGallery($id, $ordervalue);
                        echo $ordervalue;
		}
		//Cache JSON Banner
		$rsBanner			= $this->Model_banner->GenerateBanner(" WHERE banner_active_status = 1 ORDER BY banner_id DESC ");
		$countBanner		= count($rsBanner);
		//createCacheBanner($rsBanner,"bannerhome");
                createCache($rsBanner,"bannerhome");
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['banner_id']);
	}
        
         function saveTitle(){
            $banner_id = $_SESSION['banner_id'];
            $banner_gallery_id = $this->input->post('primary_key');
            $title = $this->input->post('value');              
            $this->Model_banner_gallery->saveTitle($title,$banner_gallery_id);
            
            $rsBanner			= $this->Model_banner->GenerateBanner(" WHERE banner_active_status = 1 ORDER BY banner_id DESC ");
		$countBanner		= count($rsBanner);
		//createCacheBanner($rsBanner,"bannerhome");
                createCache($rsBanner,"bannerhome");
            
           redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['banner_id']);
    }

     function saveDescription(){
            $banner_id = $_SESSION['banner_id'];
            $banner_gallery_id = $this->input->post('primary_key');
            $remarks = $this->input->post('value');  
           $this->Model_banner_gallery->saveDescription($remarks,$banner_gallery_id);
           
           
            $rsBanner			= $this->Model_banner->GenerateBanner(" WHERE banner_active_status = 1 ORDER BY banner_id DESC ");
            $countBanner		= count($rsBanner);
           // createCacheBanner($rsBanner,"bannerhome");
            createCache($rsBanner,"bannerhome");
                
           redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['banner_id']);
    }
        
        
	
	
	function active($id){
		if (empty($id)) {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['banner_id']);
			exit();
		}
		
		//extract privilege
		$this->data["approve"] = $this->privilege[5];
		
		if($this->data["approve"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$rsBanner = $this->Model_banner_gallery->getBannerGallery($id); 
		$title = $rsBanner[0]['banner_gallery_title'];
		$active_status = abs($rsBanner[0]['banner_gallery_active_status']-1);
		
		$active = $this->Model_banner_gallery->activeBannerGallery($id);
		//createRouteAlias(); //create route alias
		
		if($active_status == 1){
			$log_module = "Active ".$this->module;
		} else {
			$log_module = "Inactive ".$this->module;
		}
		$log_value = $id." | ".$title." | ".$active_status;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
		
		//Cache JSON Banner
		$rsBanner			= $this->Model_banner->GenerateBanner(" WHERE banner_active_status = 1 ORDER BY banner_id DESC ");
		$countBanner		= count($rsBanner);
		//createCacheBanner($rsBanner,"bannerhome");
                createCache($rsBanner,"bannerhome");

		redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['banner_id']);
		
	}
	
	function delete($id){
		if (empty($id)) {
			redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['banner_id']);
			exit();
		}
		
		//extract privilege
		$this->data["delete"] = $this->privilege[6];
		
		if($this->data["delete"] == 0){
			echo "<script>alert('Can\'t Access Module');window.location.href='".BASE_URL_BACKEND."/home';</script>";
			die;
		}
		
		$rsGallery = $this->Model_banner_gallery->getBannerGallery($id);               
		$title = $rsGallery[0]['banner_gallery_title'];		                                      
                $image_path = './assets/images/'.$rsGallery[0]['banner_gallery_image']; 
                $image_resize = './assets/images/resized/'.$rsGallery[0]['banner_gallery_image'];         
                $image_thumb = './assets/images/thumb/'.$rsGallery[0]['banner_gallery_image']; 

                if($rsGallery[0]['banner_gallery_image'] != 'default_icon.png'){
                unlink($image_path);
                unlink($image_resize);
                unlink($image_thumb);
                   } 
         
               
		$delete = $this->Model_banner_gallery->deleteBannerGallery($id);
		
		//createRouteAlias(); //create route alias
		
		$log_module = "Delete ".$this->module;
		$log_value = $id." | ".$title;
		$insertlog = $this->Model_logcms->insertLogCMS($log_module,$log_value);
		
		//Cache JSON Banner
		$rsBanner			= $this->Model_banner->GenerateBanner(" WHERE banner_active_status = 1 ORDER BY banner_id DESC ");
		$countBanner		= count($rsBanner);
		//createCacheBanner($rsBanner,"bannerhome");
                createCache($rsBanner,"bannerhome");
		//End Cache JSON Banner
		
		redirect(BASE_URL_BACKEND.'/'.$this->data['controller'].'/'.$_SESSION['banner_id']);
	}
	
	
	
	
	
	
    private function handle_error($err) {
    $this->error .= $err . "\r\n";
    }
 
    private function handle_success($succ) {
    $this->success .= $succ . "\r\n";
    }
        
        
}