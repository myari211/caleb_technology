<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_training extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
        function getListTraining(){
		$query		 =  "SELECT a.training_id, a.training_brand,a.training_brand_image,a.training_type, a.training_title, a.training_short_desc,"
                                    . " a.training_image, a.training_desc, "
                                    . " a.training_order, a.training_active_status,a.training_alias, "
                                    . " a.training_location,a.training_start_time,a.training_end_time,"
                                    . " a.training_meta_description, a.training_meta_keywords, "
                                    . " DATE_FORMAT( a.training_create_date, '%d-%m-%Y %H:%i:%s' ) as training_create_date,"
                                    . " DATE_FORMAT( a.training_date, '%d-%m-%Y %H:%i:%s' ) as training_date, a.training_create_by "  
                                    . "FROM tbl_training as a  where a.training_active_status = 1" ;
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
    
  
	
	
        
}