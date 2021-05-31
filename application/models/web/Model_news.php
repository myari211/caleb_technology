<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_news extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	

	  function getListNews ($where_news){
            
                        $sql = "SELECT a.news_id,a.category_id, a.news_title, a.news_short_desc,"
                                    . " a.news_image, a.news_desc, a.news_order, a.news_active_status,a.news_alias,a.news_tagging,"
                                    . " a.news_meta_description, a.news_meta_keywords, "
                                    . " DATE_FORMAT( a.news_create_date, '%d-%m-%Y %H:%i:%s' ) as news_create_date,"
                                    . " DATE_FORMAT( a.news_publish_date, '%d-%m-%Y %H:%i:%s' ) as news_publish_date, a.news_create_by, c.category_title "  
                                    . "FROM tbl_news as a "
                                    . " inner join tbl_news_category as c on a.category_id = c.category_id "
                                    . " $where_news "
                                    . " order by news_order Asc";         
            $query		= $this->db->query($sql)->result_array();
		
		return $query;
	  
        } 
     
    
  
	function getListNewsAlias(){
		$query		= "SELECT news_id, news_title, news_short_desc, news_image, news_desc, news_meta_description, news_meta_keywords,
						DATE_FORMAT( news_publish_date, '%d %M %Y' ) as news_publish_date,
						c.web_alias, c.web_ori
						FROM tbl_news a
						INNER JOIN tbl_alias c ON a.news_id = c.key_id 
						WHERE a.news_active_status = 1 AND c.alias_category = 'news' AND c.alias_active_status = 1
						ORDER BY news_id DESC";
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	
         function getMenuModule($id_satu){
            $data = array();
            $sql="select a.module_id, a.module_path, b.menu_id from tbl_module as a inner join tbl_menu as b"
                    . " on a.module_id = b. Module_id where b. menu_id =".$id_satu." ";         
            $hasil = $this->db->query($sql);
                        if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
                        else{
                            $data = '';
                        }
			$hasil->free_result();
                        $this->db->close();
			return $data;
         
     } 
          function getModuleId($module_path){
            $data = array();
             $sql="select module_id, module_path from tbl_module where module_path  ='".$module_path."' ";         
            $hasil = $this->db->query($sql);
                        if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
                        else{
                            $data = '';
                        }
			$hasil->free_result();
                        $this->db->close();
			return $data;
         
     } 
     
     
  
     
     
     function getNews($id = ''){
            $where = '';
		if($id != ''){
			$where = "WHERE news_id = ".$id;
		}
		  $sql	= "SELECT a.news_id, a.category_id, a.news_title, a.news_short_desc,"
                                    . " a.news_image, a.news_desc, a.news_active_status, a.news_alias,a.news_tagging,"
                                    . " a.news_meta_description, a.news_meta_keywords, "
                                    . " DATE_FORMAT( a.news_create_date, '%d-%m-%Y %H:%i:%s' ) as news_create_date,"
                                    . "DATE_FORMAT( a.news_publish_date, '%d-%m-%Y %H:%i:%s' ) as news_publish_date, a.news_create_by, c.category_title"
                                    . " FROM tbl_news as a "
                                    . " inner join tbl_news_category as c on a.category_id = c.category_id "
                                    . " $where ";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	       
    } 
     
     
        function getRecentNews(){
		$sql		= "SELECT a.news_id,a.category_id, a.news_title,a.news_alias"
                                    . " FROM tbl_news as a "
                                    . " inner join tbl_news_category as c on a.category_id = c.category_id "
                                    . " where news_publish_date <= NOW() "
                                    . " order by a.news_publish_date DESC limit 0,5 ";
		$hasil = $this->db->query($sql);
                        if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
                        else{
                            $data = '';
                        }
			$hasil->free_result();
                        $this->db->close();
			return $data;
	}
     
     
     
     
     
     function getNextNews($news_id) {
            $data = array();
             $hasil =  $this->db->query("select MIN(news_id) as next from tbl_news where news_active_status=1 and news_id > '$news_id'");	
			$data = $hasil->row_array();                       
                        return $data['next'];
             
        }
     function getPrevNews($news_id) {
            $data = array();
             $hasil =   $this->db->query("select MAX(news_id) as prev from tbl_news where news_active_status=1 and news_id < '$news_id'");	
			$data = $hasil->row_array();                       
                        return $data['prev'];
             
        }
     
       
       function getTagging(){
         $data = array();
         $sql="select * from tbl_tagging order by tagging_id asc";         
         $hasil = $this->db->query($sql);
                        if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
                        else{
                            $data = '';
                        }
			$hasil->free_result();
                        $this->db->close();
			return $data;
         
     } 
    
        function getNewsCategory(){
         $data = array();
         $sql="select * from tbl_news_category order by category_id asc";         
         $hasil = $this->db->query($sql);
                        if($hasil->num_rows() > 0){
				$data = $hasil->result();
			}
                        else{
                            $data = '';
                        }
			$hasil->free_result();
                        $this->db->close();
			return $data;
         
     }  
}