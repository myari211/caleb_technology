<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_client extends CI_Model {

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
            function getListClient($module_id, $cond = null){
		$query		= "SELECT a.client_id,  a.client_title,"
                                    . " a.client_image,  a.client_order, a.client_active_status,a.client_highlight, "
                                    . " a.client_meta_description, a.client_meta_keywords, "
                                    . "DATE_FORMAT( a.client_create_date, '%d-%m-%Y %H:%i:%s' ) as client_create_date, a.client_create_by "
                                    . "FROM tbl_client as a "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	
	
	function getClient($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE client_id = ".$id;
		}
		$sql	= "SELECT a.client_id,a.client_title,"
                                    . " a.client_image, a.client_active_status,a.client_highlight, "
                                    . " a.client_meta_keywords, "
                                    . "DATE_FORMAT( a.client_create_date, '%d-%m-%Y %H:%i:%s' ) as client_create_date, a.client_create_by "
                                    . "FROM tbl_client as a "
                                    . " $where "
                                    . " ORDER BY client_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeClient($id)
	{
		$sql	= "UPDATE tbl_client SET client_active_status = abs(client_active_status-1),  
				   client_update_date = now(), 
				   client_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE client_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteClient($id = '')
	{
		$sql	= "DELETE FROM tbl_client WHERE client_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkClient($client_title){
		$sql	= "SELECT client_title FROM tbl_client WHERE client_title = '".$client_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
	function insertClient($client_title,$client_highlight,$client_imageurl,$client_metadescription,$client_metakeywords)
	{

		$sql	= "INSERT INTO tbl_client SET 
                            client_title='".$client_title."', 
                            client_image='".$client_imageurl."',  
                            client_meta_description='".$client_metadescription."', 
                            client_meta_keywords='".$client_metakeywords."', 
                            client_active_status = 0, 
                            client_highlight = $client_highlight,
                            client_create_by = ".$_SESSION['admin_data']['user_id'].", client_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateClient($id,$client_title,$client_highlight,$client_imageurl,$client_metadescription,$client_metakeywords)
	{
		$sql	= "UPDATE tbl_client SET 
                            client_title='".$client_title."', 
                            client_image='".$client_imageurl."',
                            client_meta_description='".$client_metadescription."', 
                            client_meta_keywords='".$client_metakeywords."', 
                            client_highlight = $client_highlight,
                            client_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            client_update_date=now() WHERE client_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderClient($id,$order)
	{
		$sql	= "UPDATE tbl_client SET 
				   client_order= ".$order.",
				   client_update_by = ".$_SESSION['admin_data']['user_id'].", client_update_date=now() WHERE client_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
        
        function insertCategory($category_title)
	{

		$sql	= "INSERT INTO tbl_client_category SET  category_title='".$category_title."' ";		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
        
         function getClientCategory(){
         $data = array();
         $sql="select * from tbl_client_category order by category_id asc";         
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
     
         function GenerateClient($cond = null){
		$query		= "SELECT a.client_id, a.client_title,"
                                    . " a.client_image, a.client_order, a.client_active_status,a.client_highlight, "
                                    . " a.client_meta_description, a.client_meta_keywords "
                                    . "FROM tbl_client as a "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
     
        function CountClient(){
             $sql="SELECT COUNT(a.client_id) as total FROM `tbl_client` as a ";	
                $hasil =   $this->db->query($sql);
                $data = $hasil->row_array(); 
                return $data['total']; 
        } 
}