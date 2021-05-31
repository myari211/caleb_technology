<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class News extends MY_Controller {
	public $data = array();
	public $module = 'News';
	public $section = 12;
	public function __construct()
	{
		parent::__construct();
                session_start();
                $this->load->model(array('web/Model_content','web/Model_news','web/Model_menu','backend/Model_language','backend/Model_logcms'));
		$this->load->helper(array('funcglobal','menu','accessprivilege','alias'));
                $this->data['controller'] = $this->module;
                $getmodule = $this->Model_content->getModuleId($this->data['controller']); 
                foreach ($getmodule as $gm) {
                   $this->data['controller'] = $gm->module_path; 
                   $this->data['module_id'] = $gm->module_id;  
                 $_SESSION['module_id']=$this->data['module_id'];
                }	
                $this->data['menu_id'] = $this->Model_content->getMenuContent($_SESSION['module_id']);
               
	}
	
	public function index()
	{             
                $this->data['title'] = $this->data['controller']; 
                $this->data['getContent'] = $this->Model_content->getContent($this->data['menu_id'], $this->data['module_id']);
                $this->data['Newscategory'] = $this->Model_news->getNewsCategory();
                $this->data['getRecentNews'] = $this->Model_news->getRecentNews();
                $this->data['getTag'] = $this->Model_news->getTagging();              
                $where_news = " where a.news_active_status = 1 and a.news_publish_date <= NOW() ";              
                $this->data['getNews'] = $this->Model_news->getListNews($where_news);
//                echo' <!--<pre>';
//                print_r($this->data['getTag']);
//                echo' <pre> -->';
//                die;
               $pathHeadQuote = PATH_ASSETS."/json/news_head_quote.json";
                $arrHeadQuote = json_decode(file_get_contents($pathHeadQuote),TRUE);
                $this->data['quote_head'] = $arrHeadQuote['quote_desc'];
                
                
                
		$this->load->view('vnews',$this->data);
	}
        
        
     public function Category($category ='')
	{       
                //include 'checkSession.php';    
                
                $this->data['controller'] = $this->uri->segment(1);
                $this->data['getContent'] = $this->Model_content->getContent($this->data['menu_id'], $this->data['module_id']);
                $this->data['Newscategory'] = $this->Model_news->getNewsCategory();
                $this->data['getRecentNews'] = $this->Model_news->getRecentNews();
                $this->data['getTag'] = $this->Model_news->getTagging(); 
                
                $getModule = $this->Model_news->getModuleId($this->data['controller']); 
                   foreach ($getModule as $mdl) {
                        $this->data['controller'] = $mdl->module_path; 
                        $this->data['module_id'] = $mdl->module_id;  
                  }
                
                $where_news = " where a.news_active_status = 1 and c.category_title='".$category."' "; 
                  
                $this->data['menu_id'] = "";
                  
                $this->data['title'] = $this->data['controller']; 
                $this->data['category'] = $category;  
             
                $this->data['getNews'] = $this->Model_news->getListNews($where_news);
                $this->data['countNews'] = count($this->data['getNews']);
                
         
//        echo'<pre>';
//        print_r($this->data['getRecentNews']);
//        die;
		$this->load->view('vnews',$this->data);
	}   
        
        
        public function Tag($tag ='')
	{       
                //include 'checkSession.php';    
                
                $this->data['controller'] = $this->uri->segment(1);
                $this->data['getContent'] = $this->Model_content->getContent($this->data['menu_id'], $this->data['module_id']);
                $this->data['Newscategory'] = $this->Model_news->getNewsCategory();
                $this->data['getRecentNews'] = $this->Model_news->getRecentNews();
                $this->data['getTag'] = $this->Model_news->getTagging(); 
                
                $getModule = $this->Model_news->getModuleId($this->data['controller']); 
                   foreach ($getModule as $mdl) {
                        $this->data['controller'] = $mdl->module_path; 
                        $this->data['module_id'] = $mdl->module_id;  
                  }
                
                $where_news = " where a.news_active_status = 1 and a.news_tagging like '%".$tag."%' "; 
                  
                $this->data['menu_id'] = "";
                  
                $this->data['title'] = $this->data['controller']; 
                $this->data['category'] = $category;  
             
                $this->data['getNews'] = $this->Model_news->getListNews($where_news);
                $this->data['countNews'] = count($this->data['getNews']);
                
         
//        echo'<pre>';
//        print_r($this->data['getRecentNews']);
//        die;
		$this->load->view('vnews',$this->data);
	} 
        
        
        
        
        
        
        
        
      function detail($news_id=null){

//                 echo $news_id;
//                 die;
                $this->data['module_id'] = $this->module_id;                
                $this->data['module_name'] = $this->module_name;
               
            
               $getNews = $this->Model_news->getNews($news_id);
               $this->data['countNews'] = count($getNews);
              
                $this->data['news_id'] = $getNews[0]['news_id'];
                $this->data['title'] = $getNews[0]['news_title'];
                 $this->data['news_image'] = $getNews[0]['news_image'];
                $this->data['category_title'] = $getNews[0]['category_title'];
                $this->data['news_desc'] = $getNews[0]['news_desc'];
                $this->data['news_publish_date'] = $getNews[0]['news_publish_date'];
                $this->data['news_tagging'] = $getNews[0]['news_tagging'];
                $this->data['description'] = $getNews[0]['news_meta_description'];
                $this->data['keywords'] = $getNews[0]['news_meta_keywords'];       
             
                 
		$this->load->view('vnewsdetail',$this->data);
                
                
        }   
        
}