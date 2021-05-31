<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_training extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
            function getModule($module_name){
            $data  =  array();
            
            $sql = "select module_id , module_group_id from tbl_module where module_name = '".$module_name."' ";         
		 $hasil  =  $this->db->query($sql);
                        if($hasil->num_rows() > 0){
				$data  =  $hasil->result();
			}
                        else{
                            $data  =  '';
                        }
			$hasil->free_result();
                        $this->db->close();
			return $data;
     
            }
            function getMaterial(){
                $data  =  array();
                $sql = "select training_brand, material_title from tbl_material order by training_brand asc";         
                $hasil  =  $this->db->query($sql);
                               if($hasil->num_rows() > 0){
                                       $data  =  $hasil->result();
                               }
                               else{
                                   $data  =  '';
                               }
                               $hasil->free_result();
                               $this->db->close();
                               return $data;
         
                 } 
            
            
            function getListTraining(){
		$query		 =  "SELECT a.training_id, a.training_brand,a.training_brand_image,a.training_type, a.training_title, a.training_short_desc,"
                                    . " a.training_image, a.training_desc, "
                                    . " a.training_order, a.training_active_status,a.training_alias, "
                                    . " a.training_location,a.training_start_time,a.training_end_time,"
                                    . " a.training_meta_description, a.training_meta_keywords, "
                                    . " DATE_FORMAT( a.training_create_date, '%d-%m-%Y %H:%i:%s' ) as training_create_date,"
                                    . " DATE_FORMAT( a.training_date, '%d-%m-%Y %H:%i:%s' ) as training_date, a.training_create_by "  
                                    . "FROM tbl_training as a " ;
		$query		 =  $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function getListTrainingAlias(){
		$query		 =  "SELECT training_id, training_title, training_short_desc, training_image, training_desc, training_meta_description, training_meta_keywords,
						DATE_FORMAT( training_create_date, '%d %M %Y' ) as training_create_date,
						c.web_alias, c.web_ori
						FROM tbl_training a
						INNER JOIN tbl_alias c ON a.training_id  =  c.key_id 
						WHERE a.training_active_status  =  1 AND c.alias_category  =  'training' AND c.alias_active_status  =  1
						ORDER BY training_id DESC";
		$query		 =  $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function getTraining($id  =  '')
	{
		$where  =  '';
		if($id !=   ''){
			$where  =  "WHERE training_id  =  ".$id;
		}
		  $sql	 =  "SELECT a.training_id,a.training_type,a.training_brand,a.training_brand_image, a.training_title, a.training_short_desc,"
                                    . " a.training_image, a.training_desc, "
                                    . " a.training_order, a.training_active_status,a.training_alias, "
                                    . " a.training_location,a.training_start_time,a.training_end_time,"
                                    . " a.training_meta_description, a.training_meta_keywords, "
                                    . " DATE_FORMAT( a.training_create_date, '%d-%m-%Y %H:%i:%s' ) as training_create_date,"
                                    . " DATE_FORMAT( a.training_date, '%d-%m-%Y %H:%i:%s' ) as training_date, a.training_create_by "  
                                    . "FROM tbl_training as a "
                                    . " $where "
                                    . " ORDER BY training_id ASC";	
		$query	 =  $this->db->query($sql);
		$rs		 =  $query->result_array(); 
		
		return $rs;	
	}
	
	function activeTraining($id)
	{
		$sql	 =  "UPDATE tbl_training SET training_active_status  =  abs(training_active_status-1),  
				   training_update_date  =  now(), 
				   training_update_by  =  ".$_SESSION['admin_data']['user_id']."
				   WHERE training_id  =  ".$id;	
		$query	 =  $this->db->query($sql);
		
		return $query;
	}
	
	function deleteTraining($id  =  '')
	{
		$sql	 =  "DELETE FROM tbl_training WHERE training_id  =  ".$id;	
		$query	 =  $this->db->query($sql);
		
		$str  =  $this->db->last_query();
		
		return $str;
	}
	
	function checkTraining($training_title){
		$sql	 =  "SELECT training_title FROM tbl_training WHERE training_title  =  '".$training_title."'";
		$query	 =  $this->db->query($sql);
		$rs		 =  $query->result_array(); 

		return $rs;
	}
	
	function insertTraining($training_title, $training_brand,$training_brand_image, $training_type ,$training_location ,$training_shortdesc,$training_desc,$training_date,$training_start_time,$training_end_time,$training_imageurl,$alias,$training_metadescription,$training_metakeywords)
	{

		$sql	 =  "INSERT INTO tbl_training SET
                            training_brand = '".$training_brand."',
                            training_brand_image = '".$training_brand_image."',
                            training_type = '".$training_type."',
                            training_title = '".$training_title."',
                            training_location = '".$training_location."',
                            training_short_desc = '".$training_shortdesc."',
                            training_desc = '".$training_desc."',
                            training_image = '".$training_imageurl."',
                            training_date = '".$training_date."',
                            training_start_time = '".$training_start_time."',
                            training_end_time = '".$training_end_time."',
                            training_active_status =  0,
                            training_alias = '".$alias."',
                            training_meta_description = '".$training_metadescription."',
                            training_meta_keywords = '".$training_metakeywords."',
                            training_create_by  =  ".$_SESSION['admin_data']['user_id'].", training_create_date  =  now()";	
		
		$query   =  $this->db->query($sql);
		$last_id   =  $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateTraining($id,$training_title, $training_brand, $training_brand_image, $training_type ,$training_location ,$training_shortdesc,$training_desc,$training_date,$training_start_time,$training_end_time,$training_imageurl,$alias,$training_metadescription,$training_metakeywords)
	{
		$sql	 =  "UPDATE tbl_training SET 
                            training_brand = '".$training_brand."',
                            training_brand_image = '".$training_brand_image."',
                            training_type = '".$training_type."',
                            training_title = '".$training_title."',
                            training_location = '".$training_location."',
                            training_short_desc = '".$training_shortdesc."',
                            training_desc = '".$training_desc."',
                            training_image = '".$training_imageurl."',
                            training_date = '".$training_date."',
                            training_start_time = '".$training_start_time."',
                            training_end_time = '".$training_end_time."',
                            training_alias = '".$alias."',
                            training_meta_description = '".$training_metadescription."',
                            training_meta_keywords = '".$training_metakeywords."',
                            training_update_by  =  ".$_SESSION['admin_data']['user_id'].", 
                            training_update_date = now() WHERE training_id  =  ".$id;	
		$query	 =  $this->db->query($sql);
		
		return $query;
	}
         function updateOrderTraining($id,$order)
	{
		$sql	 =  "UPDATE tbl_training SET 
				   training_order =  ".$order.",
				   training_update_by  =  ".$_SESSION['admin_data']['user_id'].", training_update_date = now() WHERE training_id  =  ".$id;	
		$query	 =  $this->db->query($sql);
		
		return $query;
	}
        
         function GenerateBrand($cond = null){
		 $query		= "SELECT distinct a.training_brand, a.training_brand_image "
                                    . "FROM tbl_training as a  "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
      
        
    function insertCategory($category_title)
	{

		$sql	 =  "INSERT INTO tbl_training_category SET  category_title = '".$category_title."' ";		
		$query   =  $this->db->query($sql);
		$last_id   =  $this->db->insert_id();
		
		return $last_id;
	}
        
         function getTrainingCategory(){
         $data  =  array();
         $sql = "select * from tbl_training_category order by training_type asc";         
         $hasil  =  $this->db->query($sql);
                        if($hasil->num_rows() > 0){
				$data  =  $hasil->result();
			}
                        else{
                            $data  =  '';
                        }
			$hasil->free_result();
                        $this->db->close();
			return $data;
         
     }    
        
       
}