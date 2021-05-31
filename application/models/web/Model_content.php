<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_content extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
        function getMenuContent($module_id){
                $data = array();
                        $hasil =   $this->db->query("SELECT a.menu_id as menu_id "
                                 . "FROM tbl_menu as a "
                                 . "INNER JOIN tbl_module as b on a.module_id = b.module_id where a.menu_parent = 0 and a.menu_sub_parent= 0  and a.module_id = '".$module_id."' ");	
			$data = $hasil->row_array();                       
                        return $data['menu_id']; 
            }
	   function getContent ($menu_id ,$module_id){
            $data = array();
            
            $sql= "SELECT a.content_id, a.content_title,"
                                    . " a.content_image,a.content_desc, "
                                    . " b.menu_id, b.menu_title "
                                    . "FROM tbl_content as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . "  where a.menu_id=".$menu_id." and b.Module_id=".$module_id." "
                                    . " and a.content_active_status=1 order by content_order ASC ";         
                $query	= $this->db->query($sql);
		$data		= $query->result_array(); 
		
		return $data;	     
    }
            function getContentPage ($menu_id ,$module_id){
            $data = array();
            
            $sql= "SELECT a.content_page_id, a.content_page_title, a.content_page_short_desc,"
                                    . " a.content_page_image, a.content_page_file, a.content_page_desc , a.content_page_order, "
                                    . " b.menu_id, b.menu_title "
                                    . "FROM tbl_content_page as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . "  where a.menu_id=".$menu_id." and b.Module_id=".$module_id." "
                                    . " and a.content_page_active_status=1 order by content_page_order Asc";         
            $query = $this->db->query($sql);
			
                            //$data = $query->result();                                      
                        foreach($query->result() as $row)
		{
                                                     
			$data[] = (object) array(
					'content_page_id'	=>$row->content_page_id,
                                        'content_page_title'	=>$row->content_page_title,
                                        'content_page_short_desc'	=>$row->content_page_short_desc,
                                        'content_page_image' =>$row->content_page_image,                                        
                                        'content_page_desc'	=>$row->content_page_desc,
                                        'content_page_order'	=>$row->content_page_order,
                                        'content_page_image' =>$row->content_page_image, 
                                        'content_page_file' =>$row->content_page_file, 
                                        'menu_id'	=>$row->menu_id,
					// recursive
					'sub_page'	=>$this->getSubPage($row->content_page_id)
				);
		}
                      
                    
                        
			$query->free_result();
                        $this->db->close();
			return $data;     
    }
     function getSubPage($content_page_id)
	{
		 $data = array();
			  $sql = "SELECT a.content_subpage_id, a.content_subpage_title,a.content_subpage_desc,a.content_subpage_image,"
                                    . " a.content_subpage_active_status,"
                                    . "a.content_subpage_order "
                                    . "FROM tbl_content_subpage as a "
                                    . " inner join tbl_content_page as b on a.content_page_id = b.content_page_id "
                                    . " where a.content_page_id=".$content_page_id." and a.content_subpage_active_status=1 "
                                  . " order by content_subpage_order ASC ";
                         $query = $this->db->query($sql);
			if($query->num_rows() > 0){
                
                foreach($query->result() as $row)
		{
                                                     
			$data[] = (object) array(
                            'content_subpage_id'=>$row->content_subpage_id,
                            'content_subpage_title'=>$row->content_subpage_title,
                            'content_subpage_image' => $row->content_subpage_image,
                            'content_subpage_order' => $row->content_subpage_order,
                            'content_subpage_desc' => $row->content_subpage_desc
				);
		}
            
                        
			$query->free_result();
                        $this->db->close();
			return $data; 
                            
                            
                        }

        }
    
  
	
	function getContentDetail($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE content_id = ".$id;
		}
		$sql	= "SELECT a.content_id, a.menu_id, a.page_type, a.content_title, a.content_short_desc,"
                                    . " a.content_image, a.content_desc, a.content_active_status, a.content_alias,"
                                    . " a.content_meta_description, a.content_meta_keywords, "
                                    . "DATE_FORMAT( a.content_create_date, '%d-%m-%Y %H:%i:%s' ) as content_create_date, a.content_create_by, "
                                    . " b.menu_id, b.menu_title "
                                    . "FROM tbl_content as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " $where "
                                    . " ORDER BY content_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
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
             $sql="select module_id, module_path from tbl_module where module_path Like '".$module_path."%' ";         
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