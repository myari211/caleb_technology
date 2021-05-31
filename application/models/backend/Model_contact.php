<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_contact extends CI_Model {

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
            function getListContact($cond = null){
		 $query         = "SELECT a.contact_id,  a.contact_title,"
                                    . " a.contact_name, a.contact_email,  a.contact_phone, a.contact_fax, a.contact_order, a.contact_active_status, "
                                    . "DATE_FORMAT( a.contact_create_date, '%d-%m-%Y %H:%i:%s' ) as contact_create_date, a.contact_create_by "
                                    . "FROM tbl_contact as a "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	
	
	function getContact($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE contact_id = ".$id;
		}
		$sql	= "SELECT a.contact_id,  a.contact_title,"
                                    . " a.contact_name, a.contact_email,  a.contact_phone, a.contact_fax, a.contact_order, a.contact_active_status, "
                                    . "DATE_FORMAT( a.contact_create_date, '%d-%m-%Y %H:%i:%s' ) as contact_create_date, a.contact_create_by "
                                    . "FROM tbl_contact as a "
                                    . " $where "
                                    . " ORDER BY contact_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeContact($id)
	{
		$sql	= "UPDATE tbl_contact SET contact_active_status = abs(contact_active_status-1),  
				   contact_update_date = now(), 
				   contact_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE contact_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteContact($id = '')
	{
		$sql	= "DELETE FROM tbl_contact WHERE contact_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkContact($contact_title){
		$sql	= "SELECT contact_title FROM tbl_contact WHERE contact_title = '".$contact_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
	function insertContact($contact_title,$contact_name,$contact_email,$contact_phone,$contact_fax)
	{

		$sql	= "INSERT INTO tbl_contact SET 
                            contact_title='".$contact_title."', 
                            contact_name='".$contact_name."',  
                            contact_email='".$contact_email."', 
                            contact_phone ='".$contact_phone."', 
                            contact_fax='".$contact_fax."', 
                            contact_active_status = 0, 
                            contact_create_by = ".$_SESSION['admin_data']['user_id'].", contact_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateContact($id,$contact_title,$contact_name,$contact_email,$contact_phone,$contact_fax)
	{
		$sql	= "UPDATE tbl_contact SET 
                             contact_title='".$contact_title."', 
                            contact_name='".$contact_name."',  
                            contact_email='".$contact_email."', 
                            contact_phone ='".$contact_phone."', 
                            contact_fax='".$contact_fax."',
                            contact_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            contact_update_date=now() WHERE contact_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderContact($id,$order)
	{
		$sql	= "UPDATE tbl_contact SET 
				   contact_order= ".$order.",
				   contact_update_by = ".$_SESSION['admin_data']['user_id'].", contact_update_date=now() WHERE contact_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
        
    
     
         function GenerateContact($cond = null){
		$query		= "SELECT a.contact_id,  a.contact_title,"
                                    . " a.contact_name, a.contact_email,  a.contact_phone, a.contact_fax, a.contact_order, a.contact_active_status, "
                                    . "DATE_FORMAT( a.contact_create_date, '%d-%m-%Y %H:%i:%s' ) as contact_create_date, a.contact_create_by "
                                    . "FROM tbl_contact as a "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
     
}