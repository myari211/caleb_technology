<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_tagging extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function getListTagging($cond = null){
		$query		= "SELECT tagging_id, tagging_title, 
					  DATE_FORMAT( tagging_create_date, '%d-%m-%Y %H:%i:%s' ) as tagging_create_date
					  FROM tbl_tagging ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	function checkTagging($taggingtitle){
		$sql	= "SELECT tagging_title FROM tbl_tagging WHERE tagging_title = '".$taggingtitle."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;
	}
	
	
	function insertTagging($taggingtitle)
	{
		$sql	= "INSERT INTO tbl_tagging SET tagging_title='".$taggingtitle."',
					tagging_create_date = now()";	
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;

	}
}