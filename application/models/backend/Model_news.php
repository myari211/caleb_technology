<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_news extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
            function getModule($module_name){
            $data = array();
            
            $sql="select module_id , module_group_id from tbl_module where module_name='".$module_name."' ";         
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
            function getListNews($module_id, $cond = null){
		$query		= "SELECT a.news_id,a.category_id, a.news_title, a.news_short_desc,"
                                    . " a.news_image, a.news_desc, a.news_order, a.news_active_status,a.news_alias,a.news_tagging,"
                                    . " a.news_meta_description, a.news_meta_keywords, "
                                    . " DATE_FORMAT( a.news_create_date, '%d-%m-%Y %H:%i:%s' ) as news_create_date,"
                                    . " DATE_FORMAT( a.news_publish_date, '%d-%m-%Y %H:%i:%s' ) as news_publish_date, a.news_create_by, c.category_title "  
                                    . "FROM tbl_news as a "
                                    . " inner join tbl_news_category as c on a.category_id = c.category_id "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function getListNewsAlias(){
		$query		= "SELECT news_id, news_title, news_short_desc, news_image, news_desc, news_meta_description, news_meta_keywords,
						DATE_FORMAT( news_create_date, '%d %M %Y' ) as news_create_date,
						c.web_alias, c.web_ori
						FROM tbl_news a
						INNER JOIN tbl_alias c ON a.news_id = c.key_id 
						WHERE a.news_active_status = 1 AND c.alias_category = 'news' AND c.alias_active_status = 1
						ORDER BY news_id DESC";
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function getNews($id = '')
	{
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
                                    . " $where "
                                    . " ORDER BY news_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeNews($id)
	{
		$sql	= "UPDATE tbl_news SET news_active_status = abs(news_active_status-1),  
				   news_update_date = now(), 
				   news_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE news_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteNews($id = '')
	{
		$sql	= "DELETE FROM tbl_news WHERE news_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkNews($news_title){
		$sql	= "SELECT news_title FROM tbl_news WHERE news_title = '".$news_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
	function insertNews($category_id,$news_title,$news_desc,$news_imageurl,$news_publish_date,$news_alias,$newstag_new,$news_metadescription,$news_metakeywords,$news_shortdesc)
	{

		$sql	= "INSERT INTO tbl_news SET
                            category_id='".$category_id."',
                            news_title='".$news_title."', 
                            news_short_desc='".$news_shortdesc."', 
                            news_image='".$news_imageurl."', 
                            news_alias ='".$news_alias."', 
                            news_tagging ='".$newstag_new."', 
                            news_publish_date='".$news_publish_date."', 
                            news_meta_description='".$news_metadescription."', 
                            news_meta_keywords='".$news_metakeywords."', 
                            news_active_status = 0,  
                            news_desc='".$news_desc."',
                            news_create_by = ".$_SESSION['admin_data']['user_id'].", news_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateNews($id,$category_id,$news_title,$news_desc,$news_imageurl,$news_publish_date,$news_alias,$newstag_new,$news_metadescription,$news_metakeywords,$news_shortdesc)
	{
		$sql	= "UPDATE tbl_news SET 
                            category_id='".$category_id."',
                            news_title='".$news_title."', 
                            news_short_desc='".$news_shortdesc."', 
                            news_image='".$news_imageurl."',
                            news_alias ='".$news_alias."',
                            news_tagging ='".$newstag_new."', 
                            news_desc='".$news_desc."', 
                            news_publish_date='".$news_publish_date."', 
                            news_meta_description='".$news_metadescription."', 
                            news_meta_keywords='".$news_metakeywords."', 
                            news_active_status = 1, 
                            news_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            news_update_date=now() WHERE news_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderNews($id,$order)
	{
		$sql	= "UPDATE tbl_news SET 
				   news_order= ".$order.",
				   news_update_by = ".$_SESSION['admin_data']['user_id'].", news_update_date=now() WHERE news_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function getPageView(){
         $data = array();
         $sql="select * from tbl_page_view order by page_type asc";         
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
        function GenerateNews($cond = null){
		echo $query		= "SELECT a.news_id,a.news_title, a.news_short_desc,"
                                    . " a.news_image, a.news_desc, a.news_order, a.news_active_status, a.news_alias,"
                                    . " a.news_meta_description, a.news_meta_keywords, "
                                    . "DATE_FORMAT( a.news_create_date, '%d-%m-%Y %H:%i:%s' ) as news_create_date, a.news_create_by "
                                   
                                    . "FROM tbl_news as a "
                                   
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	} 
      
        
    function insertCategory($category_title)
	{

		$sql	= "INSERT INTO tbl_news_category SET  category_title='".$category_title."' ";		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
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