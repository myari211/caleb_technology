<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_blog extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	

	  function getBlog ($where_blog){
            $data = array();
            
             $sql= "SELECT a.blog_id, a.blog_title,a.category_id, a.blog_short_desc,"
                                    . " a.blog_image, a.blog_desc,a.blog_active_status, a.blog_alias, a.blog_order,"
                                    . " a.blog_meta_description, a.blog_meta_keywords, "
                                    . " DATE_FORMAT( a.blog_publish_date, '%d-%m-%Y %H:%i:%s' ) as blog_publish_date, a.blog_create_by ,c.category_title"   
                                    . " FROM tbl_blog as a "
                                    . " inner join tbl_blog_category as c on a.category_id = c.category_id "
                                    . " $where_blog "
                                    . " order by blog_order Asc";         
            $query		= $this->db->query($sql)->result_array();
		
		return $query;
	  
        } 
     
    
  
	function getListBlogAlias(){
		$query		= "SELECT blog_id, blog_title, blog_short_desc, blog_image, blog_desc, blog_meta_description, blog_meta_keywords,
						DATE_FORMAT( blog_publish_date, '%d %M %Y' ) as blog_publish_date,
						c.web_alias, c.web_ori
						FROM tbl_blog a
						INNER JOIN tbl_alias c ON a.blog_id = c.key_id 
						WHERE a.blog_active_status = 1 AND c.alias_category = 'blog' AND c.alias_active_status = 1
						ORDER BY blog_id DESC";
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
     
     
     
     
     
     function getBlogDetail($id = ''){
            $where = '';
		if($id != ''){
			$where = "WHERE blog_id = ".$id;
		}
		$sql	= "SELECT a.blog_id,a.category_id, a.blog_title, a.blog_short_desc,"
                                    . " a.blog_image, a.blog_desc, a.blog_active_status, a.blog_alias,"
                                    . " a.blog_meta_description, a.blog_meta_keywords, "
                                    . "DATE_FORMAT( a.blog_publish_date, '%d-%m-%Y %H:%i:%s' ) as blog_publish_date, a.blog_create_by ,c.category_title"
                                    
                                    . " FROM tbl_blog as a "
                                   . " inner join tbl_blog_category as c on a.category_id = c.category_id "
                                    . " $where "
                                    . " ORDER BY blog_id ASC";	      
           $query = $this->db->query($sql);
			
                            //$data = $query->result();                                      
                        foreach($query->result() as $row)
		{
                                                     
			$data[] = (object) array(
					'blog_id'	=>$row->blog_id,
                                        'blog_title'	=>$row->blog_title,
                                        'blog_short_desc'	=>$row->blog_short_desc,
                                        'blog_image' =>$row->blog_image,                                        
                                        'blog_desc'	=>$row->blog_desc,
                                        'blog_publish_date' =>$row->blog_publish_date                                       
                                    
					// recursive gallery dan related blog
					
				);
		}
                      
                    
                        
			$query->free_result();
                        $this->db->close();
			return $data;          
    } 
     
     
        function getRecentBlog(){
		$sql		= "SELECT a.blog_id,a.category_id, a.blog_title,a.blog_alias"
                                    . " FROM tbl_blog as a "
                                    . " inner join tbl_blog_category as c on a.category_id = c.category_id "
                                    . " where blog_publish_date <= NOW() "
                                    . " order by a.blog_publish_date DESC limit 0,5 ";
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
     
     
     
     
     
     function getNextBlog($blog_id) {
            $data = array();
             $hasil =  $this->db->query("select MIN(blog_id) as next from tbl_blog where blog_active_status=1 and blog_id > '$blog_id'");	
			$data = $hasil->row_array();                       
                        return $data['next'];
             
        }
     function getPrevBlog($blog_id) {
            $data = array();
             $hasil =   $this->db->query("select MAX(blog_id) as prev from tbl_blog where blog_active_status=1 and blog_id < '$blog_id'");	
			$data = $hasil->row_array();                       
                        return $data['prev'];
             
        }
     
        function getTitle($blog_id){
            $data = array();
             $hasil =   $this->db->query("select blog_title as title from tbl_blog where blog_id = $blog_id ");	
			$data = $hasil->row_array();                       
                        return $data['title']; 
        }
     
     function getKeywords($blog_id){
            $data = array();
           
            $hasil =   $this->db->query("select blog_meta_keywords as keywords from tbl_blog where blog_id = $blog_id ");	
			$data = $hasil->row_array();                       
                        return $data['keywords']; 
        }
        
        function getDescription($blog_id){
            $data = array();
             $hasil =   $this->db->query("select blog_meta_description as description from tbl_blog where blog_id = $blog_id ");	
			$data = $hasil->row_array();                       
                        return $data['description']; 
        }
        function getBlogCategory(){
         $data = array();
         $sql="select * from tbl_blog_category order by category_id asc";         
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