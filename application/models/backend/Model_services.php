<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_services extends CI_Model {

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
            function getListServices($module_id, $cond = null){
		$query		= "SELECT a.services_id, a.page_type, a.services_title, a.services_short_desc,"
                                    . " a.services_image, a.services_background1, a.services_background2, a.services_desc, a.services_order, a.services_active_status,a.services_alias,"
                                    . " a.services_meta_description, a.services_meta_keywords, "
                                    . "DATE_FORMAT( a.services_create_date, '%d-%m-%Y %H:%i:%s' ) as services_create_date, a.services_create_by, "
                                    . " b.menu_id, b.menu_title, c.page_title "
                                    . "FROM tbl_services as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " inner join tbl_page_view as c on a.page_type = c.page_type "
                                    . " where b.Module_id=".$module_id." "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function getListServicesAlias(){
		$query		= "SELECT services_id, services_title, services_short_desc, services_image, services_desc, services_meta_description, services_meta_keywords,
						DATE_FORMAT( services_create_date, '%d %M %Y' ) as services_create_date,
						c.web_alias, c.web_ori
						FROM tbl_services a
						INNER JOIN tbl_alias c ON a.services_id = c.key_id 
						WHERE a.services_active_status = 1 AND c.alias_category = 'services' AND c.alias_active_status = 1
						ORDER BY services_id DESC";
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function getServices($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE services_id = ".$id;
		}
		$sql	= "SELECT a.services_id, a.menu_id, a.page_type, a.services_title, a.services_short_desc,"
                                    . " a.services_image, a.services_background1, a.services_background2, a.services_desc, a.services_active_status, a.services_alias,"
                                    . " a.services_meta_description, a.services_meta_keywords, "
                                    . "DATE_FORMAT( a.services_create_date, '%d-%m-%Y %H:%i:%s' ) as services_create_date, a.services_create_by, "
                                    . " b.menu_id, b.menu_title "
                                    . "FROM tbl_services as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " $where "
                                    . " ORDER BY services_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeServices($id)
	{
		$sql	= "UPDATE tbl_services SET services_active_status = abs(services_active_status-1),  
				   services_update_date = now(), 
				   services_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE services_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteServices($id = '')
	{
		$sql	= "DELETE FROM tbl_services WHERE services_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkServices($services_title){
		$sql	= "SELECT services_title FROM tbl_services WHERE services_title = '".$services_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
	function insertServices($menu_id,$page_type,$services_title,$services_desc,$services_imageurl,$services_background1,$services_background2,$services_alias,$services_metadescription,$services_metakeywords,$services_shortdesc)
	{

		$sql	= "INSERT INTO tbl_services SET 
                            menu_id='".$menu_id."', 
                            page_type='".$page_type."', 
                            services_title='".$services_title."', 
                            services_short_desc='".$services_shortdesc."', 
                            services_image='".$services_imageurl."',
                            services_background1='".$services_background1."',
                            services_background2='".$services_background2."',   
                            services_alias ='".$services_alias."', 
                            services_meta_description='".$services_metadescription."', 
                            services_meta_keywords='".$services_metakeywords."', 
                            services_active_status = 0,  
                            services_desc='".$services_desc."',
                            services_create_by = ".$_SESSION['admin_data']['user_id'].", services_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateServices($id,$menu_id,$page_type,$services_title,$services_desc,$services_imageurl,$services_background1,$services_background2,$services_alias,$services_metadescription,$services_metakeywords,$services_shortdesc)
	{
		$sql	= "UPDATE tbl_services SET 
                            menu_id='".$menu_id."', 
                            page_type='".$page_type."', 
                            services_title='".$services_title."', 
                            services_short_desc='".$services_shortdesc."', 
                            services_image='".$services_imageurl."',
                            services_background1='".$services_background1."',
                            services_background2='".$services_background2."',
                            services_alias ='".$services_alias."', 
                            services_desc='".$services_desc."', 
                            services_meta_description='".$services_metadescription."', 
                            services_meta_keywords='".$services_metakeywords."', 
                            services_active_status = 1, 
                            services_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            services_update_date=now() WHERE services_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderServices($id,$order)
	{
		$sql	= "UPDATE tbl_services SET 
				   services_order= ".$order.",
				   services_update_by = ".$_SESSION['admin_data']['user_id'].", services_update_date=now() WHERE services_id = ".$id;	
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
        function GenerateServices($cond = null){
		 $query		= "SELECT a.services_id, a.page_type, a.services_title, a.services_short_desc,"
                                    . " a.services_image,a.services_alias, a.services_desc, a.services_order, a.services_active_status, a.services_alias,"
                                    . " a.services_meta_description, a.services_meta_keywords, "
                                    . "DATE_FORMAT( a.services_create_date, '%d-%m-%Y %H:%i:%s' ) as services_create_date, a.services_create_by, "
                                    . " b.menu_id, b.menu_title, c.page_title "
                                    . "FROM tbl_services as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " inner join tbl_page_view as c on a.page_type = c.page_type "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	} 
      
}