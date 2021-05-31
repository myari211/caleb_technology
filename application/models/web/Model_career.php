<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_career extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
        function getListCareer(){
		$query		 = "SELECT a.career_id, a.career_title, a.career_short_desc,"
                                    . " a.career_desc, a.career_order, a.career_active_status,a.career_alias,"
                                    . " a.career_meta_description, a.career_meta_keywords, "
                                    . " DATE_FORMAT( a.career_create_date, '%d-%m-%Y %H:%i:%s' ) as career_create_date,"
                                    . " DATE_FORMAT( a.career_publish_date, '%d-%m-%Y %H:%i:%s' ) as career_publish_date, a.career_create_by "  
                                    . " FROM tbl_career as a " 
                                    . " where a.career_active_status = 1 and a.career_publish_date >= NOW() " ;
		$query		 =  $this->db->query($query)->result_array();
		
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
    
       
}