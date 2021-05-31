<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_career extends CI_Model {

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
            function getListCareer($module_id, $cond = null){
		$query		= "SELECT a.career_id, a.career_title, a.career_short_desc,"
                                    . " a.career_desc, a.career_order, a.career_active_status,a.career_alias,"
                                    . " a.career_meta_description, a.career_meta_keywords, "
                                    . " DATE_FORMAT( a.career_create_date, '%d-%m-%Y %H:%i:%s' ) as career_create_date,"
                                    . " DATE_FORMAT( a.career_publish_date, '%d-%m-%Y %H:%i:%s' ) as career_publish_date, a.career_create_by "  
                                    . "FROM tbl_career as a "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function getListCareerAlias(){
		$query		= "SELECT career_id, career_title, career_short_desc, career_desc, career_meta_description, career_meta_keywords,
						DATE_FORMAT( career_create_date, '%d %M %Y' ) as career_create_date,
						c.web_alias, c.web_ori
						FROM tbl_career a
						INNER JOIN tbl_alias c ON a.career_id = c.key_id 
						WHERE a.career_active_status = 1 AND c.alias_category = 'career' AND c.alias_active_status = 1
						ORDER BY career_id DESC";
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function getCareer($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE career_id = ".$id;
		}
		  $sql	= "SELECT a.career_id, a.career_title, a.career_short_desc,"
                                    . " a.career_desc, a.career_active_status, a.career_alias,"
                                    . " a.career_meta_description, a.career_meta_keywords, "
                                    . " DATE_FORMAT( a.career_create_date, '%d-%m-%Y %H:%i:%s' ) as career_create_date,"
                                    . "DATE_FORMAT( a.career_publish_date, '%d-%m-%Y %H:%i:%s' ) as career_publish_date, a.career_create_by"
                                    . " FROM tbl_career as a "
                                    . " $where "
                                    . " ORDER BY career_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeCareer($id)
	{
		$sql	= "UPDATE tbl_career SET career_active_status = abs(career_active_status-1),  
				   career_update_date = now(), 
				   career_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE career_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteCareer($id = '')
	{
		$sql	= "DELETE FROM tbl_career WHERE career_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkCareer($career_title){
		$sql	= "SELECT career_title FROM tbl_career WHERE career_title = '".$career_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
	function insertCareer($career_title,$career_desc,$career_publish_date,$career_alias,$career_metadescription,$career_metakeywords,$career_shortdesc)
	{

		$sql	= "INSERT INTO tbl_career SET
                            career_title='".$career_title."', 
                            career_short_desc='".$career_shortdesc."', 
                            career_alias ='".$career_alias."', 
                            career_publish_date='".$career_publish_date."', 
                            career_meta_description='".$career_metadescription."', 
                            career_meta_keywords='".$career_metakeywords."', 
                            career_active_status = 0,  
                            career_desc='".$career_desc."',
                            career_create_by = ".$_SESSION['admin_data']['user_id'].", career_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateCareer($id,$career_title,$career_desc,$career_publish_date,$career_alias,$career_metadescription,$career_metakeywords,$career_shortdesc)
	{
		$sql	= "UPDATE tbl_career SET 
                            career_title='".$career_title."', 
                            career_short_desc='".$career_shortdesc."',
                            career_alias ='".$career_alias."', 
                            career_desc='".$career_desc."', 
                            career_publish_date='".$career_publish_date."', 
                            career_meta_description='".$career_metadescription."', 
                            career_meta_keywords='".$career_metakeywords."', 
                            career_active_status = 1, 
                            career_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            career_update_date=now() WHERE career_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderCareer($id,$order)
	{
		$sql	= "UPDATE tbl_career SET 
				   career_order= ".$order.",
				   career_update_by = ".$_SESSION['admin_data']['user_id'].", career_update_date=now() WHERE career_id = ".$id;	
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
        function GenerateCareer($cond = null){
		echo $query		= "SELECT a.career_id,a.career_title, a.career_short_desc,"
                                    . " a.career_desc, a.career_order, a.career_active_status, a.career_alias,"
                                    . " a.career_meta_description, a.career_meta_keywords, "
                                    . "DATE_FORMAT( a.career_create_date, '%d-%m-%Y %H:%i:%s' ) as career_create_date, a.career_create_by "
                                   
                                    . "FROM tbl_career as a "
                                   
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	} 
      
        
       
        
       
}