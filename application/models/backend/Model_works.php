<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_works extends CI_Model {

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
            function getListWorks($module_id, $cond = null){
		$query		= "SELECT a.works_id, a.services_id, a.category_id, a.works_title, a.works_short_desc,"
                                    . " a.works_image, a.works_desc,a.works_about,a.works_client, a.works_order, a.works_active_status,a.works_highlight, a.works_alias,"
                                    . " a.works_meta_description, a.works_meta_keywords, "
                                    . "DATE_FORMAT( a.works_create_date, '%d-%m-%Y %H:%i:%s' ) as works_create_date, a.works_create_by, "
                                    . " b.menu_id, b.menu_title, c.category_title "
                                    . "FROM tbl_works as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " inner join tbl_works_category as c on a.category_id = c.category_id "
                                    . " where b.Module_id=".$module_id." "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function getListWorksAlias(){
		$query		= "SELECT works_id, works_title, works_short_desc, works_image, works_desc, works_meta_description, works_meta_keywords,
						DATE_FORMAT( works_create_date, '%d %M %Y' ) as works_create_date,
						c.web_alias, c.web_ori
						FROM tbl_works a
						INNER JOIN tbl_alias c ON a.works_id = c.key_id 
						WHERE a.works_active_status = 1 AND c.alias_category = 'works' AND c.alias_active_status = 1
						ORDER BY works_id DESC";
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function getWorks($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE works_id = ".$id;
		}
		$sql	= "SELECT a.works_id, a.menu_id, a.services_id, a.category_id, a.works_title, a.works_short_desc,"
                                    . " a.works_image, a.works_desc, a.works_active_status,a.works_highlight, a.works_alias,"
                                    . " a.works_meta_description,a.works_about,a.works_client, a.works_meta_keywords, "
                                    . "DATE_FORMAT( a.works_create_date, '%d-%m-%Y %H:%i:%s' ) as works_create_date, a.works_create_by, "
                                    . " b.menu_id, b.menu_title "
                                    . "FROM tbl_works as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " $where "
                                    . " ORDER BY works_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeWorks($id)
	{
		$sql	= "UPDATE tbl_works SET works_active_status = abs(works_active_status-1),  
				   works_update_date = now(), 
				   works_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE works_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteWorks($id = '')
	{
		$sql	= "DELETE FROM tbl_works WHERE works_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkWorks($works_title){
		$sql	= "SELECT works_title FROM tbl_works WHERE works_title = '".$works_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
	function insertWorks($menu_id,$services_id,$category_id,$works_title,$works_desc,$works_about,$works_client,$works_highlight,$works_imageurl,$works_alias,$works_metadescription,$works_metakeywords,$works_shortdesc)
	{

		$sql	= "INSERT INTO tbl_works SET 
                            menu_id='".$menu_id."',
                            services_id='".$services_id."', 
                            category_id='".$category_id."', 
                            works_title='".$works_title."', 
                            works_short_desc='".$works_shortdesc."', 
                            works_image='".$works_imageurl."', 
                            works_alias ='".$works_alias."', 
                            works_meta_description='".$works_metadescription."', 
                            works_meta_keywords='".$works_metakeywords."', 
                            works_active_status = 0, 
                            works_highlight = $works_highlight,
                            works_desc='".$works_desc."',
                            works_about='".$works_about."', 
                            works_client='".$works_client."', 
                            works_create_by = ".$_SESSION['admin_data']['user_id'].", works_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateWorks($id,$menu_id,$services_id,$category_id,$works_title,$works_desc,$works_about,$works_client,$works_highlight,$works_imageurl,$works_alias,$works_metadescription,$works_metakeywords,$works_shortdesc)
	{
		$sql	= "UPDATE tbl_works SET 
                            menu_id='".$menu_id."', 
                            services_id='".$services_id."',
                            category_id='".$category_id."', 
                            works_title='".$works_title."', 
                            works_short_desc='".$works_shortdesc."', 
                            works_image='".$works_imageurl."',
                            works_alias ='".$works_alias."', 
                            works_desc='".$works_desc."', 
                            works_about='".$works_about."', 
                            works_client='".$works_client."',
                            works_meta_description='".$works_metadescription."', 
                            works_meta_keywords='".$works_metakeywords."', 
                            works_active_status = 1, 
                            works_highlight = $works_highlight,
                            works_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            works_update_date=now() WHERE works_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderWorks($id,$order)
	{
		$sql	= "UPDATE tbl_works SET 
				   works_order= ".$order.",
				   works_update_by = ".$_SESSION['admin_data']['user_id'].", works_update_date=now() WHERE works_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
        
        function insertCategory($category_title)
	{

		$sql	= "INSERT INTO tbl_works_category SET  category_title='".$category_title."' ";		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
        
         function getWorksCategory(){
         $data = array();
         $sql="select * from tbl_works_category order by category_id asc";         
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
       function getServices(){
         $data = array();
         $sql="select services_id, services_title from tbl_services order by services_id asc";         
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
     
         function GenerateWorks($cond = null){
		$query		= "SELECT a.works_id, a.category_id, a.works_title, a.works_short_desc,"
                                    . " a.works_image, a.works_desc, a.works_order, a.works_active_status,a.works_highlight, a.works_alias,"
                                    . " a.works_meta_description,a.works_alias, a.works_meta_keywords, "
                                    . "DATE_FORMAT( a.works_create_date, '%d-%m-%Y %H:%i:%s' ) as works_create_date, a.works_create_by, "
                                    . " b.menu_id, b.menu_title, c.category_title "
                                    . "FROM tbl_works as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " inner join tbl_works_category as c on a.category_id = c.category_id "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
     
        
}