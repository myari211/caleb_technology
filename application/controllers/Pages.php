<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends MY_Controller {
	public $data = array();
	
	
	public function __construct()
	{
		parent::__construct();
                session_start();
                $this->load->model(array('web/Model_page','web/Model_menu','backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
                $page_name=  $this->uri->segment(1);
                $this->page_name = $page_name;
                
                $pathPageAlias = PATH_ASSETS."/json/pages.json";
                $arr_page_alias = json_decode(file_get_contents($pathPageAlias),TRUE);
                $this->data['pages'] = $arr_page_alias;
                
	}
	function index(){
		$id=17;
		$this->detail($id);
	}
	
	
	 function detail($id)
	{
           
		$meta_title = "";
		$meta_description = "";
		$meta_keywords = "";
		
		$pathPages = PATH_ASSETS."/json/pages.json";
		$arrPages = json_decode(file_get_contents($pathPages),TRUE);
		$countarrPages = count($arrPages);
		
		
		if($countarrPages > 0){
			$id = $this->security->xss_clean(secure_input($id));
			$key = searcharray($id, 'pages_id', $arrPages);
			
			if(!empty($arrPages[$key]['pages_title'])){
				$meta_title = "";
				$meta_description = "";
				$meta_keywords = "";
                                $this->data['pages_id'] = $arrPages[$key]['pages_id'];
				$this->data['title'] = $arrPages[$key]['pages_title'];
				$this->data['meta_title'] = $arrPages[$key]['pages_title'];
				$this->data['pages_image'] = $arrPages[$key]['pages_image'];
				$this->data['pages_short_desc'] = $arrPages[$key]['pages_short_desc'];
				$this->data['pages_desc'] = $arrPages[$key]['pages_desc'];
				$this->data['meta_description'] = $arrPages[$key]['pages_meta_description'];
				$this->data['meta_keywords'] = $arrPages[$key]['pages_meta_keywords'];
				
				
                              
				$this->load->view('vpages',$this->data);
			} else {
				redirect(BASE_URL);
			}
		} else {
			redirect(BASE_URL);
		}
	}
}