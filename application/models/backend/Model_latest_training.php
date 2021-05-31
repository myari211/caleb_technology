<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_latest_training extends CI_Model {

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
            function getListLatest_training($module_id, $cond = null){
		$query		= "SELECT a.latest_training_id,  a.latest_training_title,"
                                    . " a.latest_training_image,  a.latest_training_order, a.latest_training_active_status,a.latest_training_highlight, "
                                    . " a.latest_training_meta_description, a.latest_training_meta_keywords, "
                                    . "DATE_FORMAT( a.latest_training_create_date, '%d-%m-%Y %H:%i:%s' ) as latest_training_create_date, a.latest_training_create_by "
                                    . "FROM tbl_latest_training as a "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	
	
	function getLatest_training($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE latest_training_id = ".$id;
		}
		$sql	= "SELECT a.latest_training_id,a.latest_training_title,"
                                    . " a.latest_training_image, a.latest_training_active_status,a.latest_training_highlight, "
                                    . " a.latest_training_meta_keywords, "
                                    . "DATE_FORMAT( a.latest_training_create_date, '%d-%m-%Y %H:%i:%s' ) as latest_training_create_date, a.latest_training_create_by "
                                    . "FROM tbl_latest_training as a "
                                    . " $where "
                                    . " ORDER BY latest_training_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeLatest_training($id)
	{
		$sql	= "UPDATE tbl_latest_training SET latest_training_active_status = abs(latest_training_active_status-1),  
				   latest_training_update_date = now(), 
				   latest_training_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE latest_training_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteLatest_training($id = '')
	{
		$sql	= "DELETE FROM tbl_latest_training WHERE latest_training_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkLatest_training($latest_training_title){
		$sql	= "SELECT latest_training_title FROM tbl_latest_training WHERE latest_training_title = '".$latest_training_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
	function insertLatest_training($latest_training_title,$latest_training_highlight,$latest_training_imageurl,$latest_training_metadescription,$latest_training_metakeywords)
	{

		$sql	= "INSERT INTO tbl_latest_training SET 
                            latest_training_title='".$latest_training_title."', 
                            latest_training_image='".$latest_training_imageurl."',  
                            latest_training_meta_description='".$latest_training_metadescription."', 
                            latest_training_meta_keywords='".$latest_training_metakeywords."', 
                            latest_training_active_status = 0, 
                            latest_training_highlight = $latest_training_highlight,
                            latest_training_create_by = ".$_SESSION['admin_data']['user_id'].", latest_training_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateLatest_training($id,$latest_training_title,$latest_training_highlight,$latest_training_imageurl,$latest_training_metadescription,$latest_training_metakeywords)
	{
		$sql	= "UPDATE tbl_latest_training SET 
                            latest_training_title='".$latest_training_title."', 
                            latest_training_image='".$latest_training_imageurl."',
                            latest_training_meta_description='".$latest_training_metadescription."', 
                            latest_training_meta_keywords='".$latest_training_metakeywords."', 
                            latest_training_highlight = $latest_training_highlight,
                            latest_training_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            latest_training_update_date=now() WHERE latest_training_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderLatest_training($id,$order)
	{
		$sql	= "UPDATE tbl_latest_training SET 
				   latest_training_order= ".$order.",
				   latest_training_update_by = ".$_SESSION['admin_data']['user_id'].", latest_training_update_date=now() WHERE latest_training_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
        
        function insertCategory($category_title)
	{

		$sql	= "INSERT INTO tbl_latest_training_category SET  category_title='".$category_title."' ";		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
        
         function getLatest_trainingCategory(){
         $data = array();
         $sql="select * from tbl_latest_training_category order by category_id asc";         
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
     
         function GenerateLatest_training($cond = null){
		$query		= "SELECT a.latest_training_id, a.latest_training_title,"
                                    . " a.latest_training_image, a.latest_training_order, a.latest_training_active_status,a.latest_training_highlight, "
                                    . " a.latest_training_meta_description, a.latest_training_meta_keywords "
                                    . "FROM tbl_latest_training as a "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
     
        function CountLatest_training(){
             $sql="SELECT COUNT(a.latest_training_id) as total FROM `tbl_latest_training` as a ";	
                $hasil =   $this->db->query($sql);
                $data = $hasil->row_array(); 
                return $data['total']; 
        } 
}