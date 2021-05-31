<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_about extends CI_Model {

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
         function getListContentPage($menu_id,$cond = null){
		 $query		= "SELECT a.content_page_id, a.page_type, a.content_page_title, a.content_page_short_desc,"
                                    . " a.content_page_image, a.content_page_file, a.content_page_desc, a.content_page_order, a.content_page_active_status,"
                                    . " a.content_page_meta_description, a.content_page_meta_keywords, "
                                    . "DATE_FORMAT( a.content_page_create_date, '%d-%m-%Y %H:%i:%s' ) as content_page_create_date, a.content_page_create_by, "
                                    . " b.menu_id, b.menu_title, c.page_title "
                                    . "FROM tbl_content_page as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " inner join tbl_page_view as c on a.page_type = c.page_type "
                                    . " where a.menu_id=".$menu_id." "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	   function getListContent($module_id, $cond = null){
		$query		= "SELECT a.content_id, a.content_title, a.content_short_desc,"
                                    . " a.content_image, a.content_desc, a.content_order,  a.content_active_status, a.content_alias,"
                                    . " a.content_meta_description, a.content_meta_keywords, "
                                    . "DATE_FORMAT( a.content_create_date, '%d-%m-%Y %H:%i:%s' ) as content_create_date, a.content_create_by, "
                                    . " b.menu_id, b.menu_title "
                                    . "FROM tbl_content as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " where b.Module_id=".$module_id." "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
         function getListMaterial($cond = null){
		$query		= "SELECT a.material_id, a.material_title, "
                                    . "a.material_image, a.material_order,"
                                    . "DATE_FORMAT( a.material_create_date, '%d-%m-%Y %H:%i:%s' ) as material_create_date, "
                                    . "a.material_active_status "
                                    . "FROM tbl_material as a "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
        
	function getListContentAlias(){
		$query		= "SELECT content_id, content_title, content_short_desc, content_image, content_desc, content_meta_description, content_meta_keywords,
						DATE_FORMAT( content_create_date, '%d %M %Y' ) as content_create_date,
						c.web_alias, c.web_ori
						FROM tbl_content a
						INNER JOIN tbl_alias c ON a.content_id = c.key_id 
						WHERE a.content_active_status = 1 AND c.alias_category = 'content' AND c.alias_active_status = 1
						ORDER BY content_id DESC";
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function getContent($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE content_id = ".$id;
		}
		$sql	= "SELECT a.content_id, a.menu_id, a.content_title, a.content_short_desc,"
                                    . " a.content_image, a.content_desc, a.content_active_status,a.content_order, a.content_alias,"
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
	function getContentPage($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE content_page_id = ".$id;
		}
		$sql	= "SELECT a.content_page_id, a.menu_id, a.page_type,a.content_page_title, a.content_page_short_desc,"
                                    . " a.content_page_image,a.content_page_file, a.content_page_desc, a.content_page_active_status, "
                                    . " a.content_page_meta_description, a.content_page_meta_keywords, "
                                    . "DATE_FORMAT( a.content_page_create_date, '%d-%m-%Y %H:%i:%s' ) as content_page_create_date, a.content_page_create_by, "
                                    . " b.menu_id, b.menu_title "
                                    . "FROM tbl_content_page as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " $where "
                                    . " ORDER BY content_page_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	function activeContent($id)
	{
		$sql	= "UPDATE tbl_content SET content_active_status = abs(content_active_status-1),  
				   content_update_date = now(), 
				   content_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE content_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	function activeContentPage($id)
	{
		$sql	= "UPDATE tbl_content_page SET content_page_active_status = abs(content_page_active_status-1),  
				   content_page_update_date = now(), 
				   content_page_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE content_page_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	function deleteContent($id = '')
	{
		$sql	= "DELETE FROM tbl_content WHERE content_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	function deleteContentPage($id = '')
	{
		$sql	= "DELETE FROM tbl_content_page WHERE content_page_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	function checkContent($content_title){
		$sql	= "SELECT content_title FROM tbl_content WHERE content_title = '".$content_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	function checkContentPage($content_page_title){
		$sql	= "SELECT content_page_title FROM tbl_content_page WHERE content_page_title = '".$content_page_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	function insertContent($menu_id,$content_title,$content_desc,$content_imageurl,$content_alias,$content_metadescription,$content_metakeywords,$content_shortdesc)
	{

		$sql	= "INSERT INTO tbl_content SET 
                            menu_id='".$menu_id."',  
                            content_title='".$content_title."', 
                            content_short_desc='".$content_shortdesc."', 
                            content_image='".$content_imageurl."', 
                            content_alias ='".$content_alias."', 
                            content_meta_description='".$content_metadescription."', 
                            content_meta_keywords='".$content_metakeywords."', 
                            content_active_status = 0, 
                            content_desc='".$content_desc."',
                            content_create_by = ".$_SESSION['admin_data']['user_id'].", content_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateContent($id,$menu_id,$content_title,$content_desc,$content_imageurl,$content_alias,$content_metadescription,$content_metakeywords,$content_shortdesc)
	{
		 $sql	= "UPDATE tbl_content SET 
                             menu_id='".$menu_id."', 
                            content_title='".$content_title."', 
                            content_short_desc='".$content_shortdesc."', 
                            content_image='".$content_imageurl."', 
                            content_alias ='".$content_alias."', 
                            content_meta_description='".$content_metadescription."', 
                            content_meta_keywords='".$content_metakeywords."',
                            content_desc='".$content_desc."',
                            content_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            content_update_date=now() WHERE content_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
        function insertContentPages($menu_id,$page_type,$content_page_title,$content_page_desc,$content_page_imageurl,$content_page_file,$content_page_metadescription,$content_page_metakeywords,$content_page_shortdesc)
	{

		$sql	= "INSERT INTO tbl_content_page SET 
                            menu_id='".$menu_id."', 
                            page_type='".$page_type."', 
                            content_page_title='".$content_page_title."', 
                            content_page_short_desc='".$content_page_shortdesc."', 
                            content_page_image='".$content_page_imageurl."', 
                                content_page_file='".$content_page_file."', 
                            content_page_meta_description='".$content_page_metadescription."', 
                            content_page_meta_keywords='".$content_page_metakeywords."', 
                            content_page_active_status = 0, 
                            content_page_desc='".$content_page_desc."',
                            content_page_create_by = ".$_SESSION['admin_data']['user_id'].", content_page_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateContentPages($id,$menu_id,$page_type,$content_page_title,$content_page_desc,$content_page_imageurl,$content_page_file,$content_page_metadescription,$content_page_metakeywords,$content_page_shortdesc)
	{
		 $sql	= "UPDATE tbl_content_page SET 
                             menu_id='".$menu_id."', 
                            page_type='".$page_type."', 
                            content_page_title='".$content_page_title."', 
                            content_page_short_desc='".$content_page_shortdesc."', 
                            content_page_image='".$content_page_imageurl."',
                            content_page_file='".$content_page_file."',
                            content_page_meta_description='".$content_page_metadescription."', 
                            content_page_meta_keywords='".$content_page_metakeywords."', 
                            content_page_desc='".$content_page_desc."',
                            content_page_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            content_page_update_date=now() WHERE content_page_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderContent($id,$order)
	{
		$sql	= "UPDATE tbl_content SET 
				   content_order= ".$order.",
				   content_update_by = ".$_SESSION['admin_data']['user_id'].", content_update_date=now() WHERE content_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderContentPage($id,$order)
	{
		$sql	= "UPDATE tbl_content_page SET 
				   content_page_order= ".$order.",
				   content_page_update_by = ".$_SESSION['admin_data']['user_id'].", content_page_update_date=now() WHERE content_page_id = ".$id;	
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
    
      function GenerateContent($cond = null){
		echo $query		= "SELECT a.content_id, a.page_type, a.content_title, a.content_short_desc,"
                                    . " a.content_image, a.content_desc, a.content_order, a.content_active_status,a.content_highlight, a.content_alias,"
                                    . " a.content_meta_description, a.content_meta_keywords, "
                                    . "DATE_FORMAT( a.content_create_date, '%d-%m-%Y %H:%i:%s' ) as content_create_date, a.content_create_by, "
                                    . " b.menu_id, b.menu_title, c.page_title "
                                    . "FROM tbl_content as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " inner join tbl_page_view as c on a.page_type = c.page_type "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	} 
     
          function getListVisionMision(){
		 $query		= "SELECT a.vimis_id, a.vimis_title, a.vimis_short_desc,"
                                    . " a.vimis_desc, a.vimis_order, a.vimis_active_status,"
                                    . " a.vimis_meta_description, a.vimis_meta_keywords, "
                                    . "DATE_FORMAT( a.vimis_create_date, '%d-%m-%Y %H:%i:%s' ) as vimis_create_date, a.vimis_create_by "
                                   . "FROM tbl_vimis as a "
                                    . " order by a.vimis_title Desc " ;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}	
	
	function getVisionMision($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE vimis_id = ".$id;
		}
		$sql	= "SELECT a.vimis_id,a.vimis_title, a.vimis_short_desc,"
                                    . "  a.vimis_desc, a.vimis_active_status, "
                                    . " a.vimis_meta_description, a.vimis_meta_keywords, "
                                    . "DATE_FORMAT( a.vimis_create_date, '%d-%m-%Y %H:%i:%s' ) as vimis_create_date, a.vimis_create_by "                                
                                    . "FROM tbl_vimis as a "
                                    . " $where "
                                    . " ORDER BY vimis_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	function activeVisionMision($id)
	{
		$sql	= "UPDATE tbl_vimis SET vimis_active_status = abs(vimis_active_status-1),  
				   vimis_update_date = now(), 
				   vimis_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE vimis_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	function deleteVisionMision($id = '')
	{
		$sql	= "DELETE FROM tbl_vimis WHERE vimis_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkVisionMision($vimis_title){
		$sql	= "SELECT vimis_title FROM tbl_vimis WHERE vimis_title = '".$vimis_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
        function insertVisionMisions($vimis_title,$vimis_desc,$vimis_shortdesc)
	{

		$sql	= "INSERT INTO tbl_vimis SET  
                            vimis_title='".$vimis_title."', 
                            vimis_short_desc='".$vimis_shortdesc."',
                            vimis_desc='".$vimis_desc."',
                            vimis_create_by = ".$_SESSION['admin_data']['user_id'].", vimis_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateVisionMisions($id,$vimis_title,$vimis_desc,$vimis_shortdesc)
	{
		 $sql	= "UPDATE tbl_vimis SET 
                            vimis_title='".$vimis_title."', 
                            vimis_short_desc='".$vimis_shortdesc."', 
                            vimis_desc='".$vimis_desc."',
                            vimis_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            vimis_update_date=now() WHERE vimis_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}      
        
         function updateOrderVisionMision($id,$order)
	{
		$sql	= "UPDATE tbl_vimis SET 
				   vimis_order= ".$order.",
				   vimis_update_by = ".$_SESSION['admin_data']['user_id'].", vimis_update_date=now() WHERE vimis_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
}