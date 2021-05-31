<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_projects extends CI_Model {

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
            function getListProjects($module_id, $cond = null){
		$query		= "SELECT a.projects_id,  a.client_id, a.user_id, a.projects_title, a.projects_services,"
                                    . " a.projects_image, a.projects_desc, "
                                    . "DATE_FORMAT( a.projects_start_date, '%d-%m-%Y %H:%i:%s' ) as projects_start_date, "
                                    . "DATE_FORMAT( a.projects_end_date, '%d-%m-%Y %H:%i:%s' ) as projects_end_date, "
                                    . " a.projects_location,"
                                    . "a.projects_order, a.projects_active_status,a.projects_highlight,"
                                    . " a.projects_meta_description, a.projects_meta_keywords, "
                                    . "DATE_FORMAT( a.projects_create_date, '%d-%m-%Y %H:%i:%s' ) as projects_create_date, "
                                    . "a.projects_create_by, "
                                    . " b.client_title "
                                    . "FROM tbl_projects as a "
                                    . " inner join tbl_client as b on a.client_id = b.client_id "
                                    . " ".$cond;
	$query		= $this->db->query($query)->result_array();
			
                            //$data = $query->result();                                      
                        foreach($query as $row)
		{
                           
                            
			$data[] =  array(
					'projects_id'	=>$row['projects_id'],
                                        'client_id'	=>$row['client_id'],
                                        'user_id'	=>$row['user_id'],
                                        'projects_title'	=>$row['projects_title'],
                                        'projects_services'	=>$row['projects_services'],
                                        'projects_location'	=>$row['projects_location'],
                                        'projects_image' =>$row['projects_image'],    
                                        'projects_desc' =>$row['projects_desc'], 
                                        'client_title'	=>$row['client_title'],
                                        'projects_start_date' =>$row['projects_start_date'], 
                                        'projects_end_date'	=>$row['projects_end_date'],
                                        'projects_order' =>$row['projects_order'], 
                                        'projects_highlight' =>$row['projects_highlight'], 
                                        'projects_active_status' =>$row['projects_active_status'], 
                                        'projects_create_date'	=>$row['projects_create_date'],
                                        'projects_meta_description'	=>$row['projects_meta_description'],
                                        'projects_meta_keywords'	=>$row['projects_meta_keywords'],
                                        'projects_create_date'	=>$row['projects_create_date'],
                                        'projects_create_by'	=>$this->getUser($row['projects_create_by']),
                                        'user_title'	=>$this->getUser($row['user_id'])
				);
		}
                 
			//$query->free_result();
                        $this->db->close();
			return $data; 
	}
	
	
	function getProjects($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE projects_id = ".$id;
		}
		$sql	= "SELECT a.projects_id,  a.client_id, a.user_id, a.projects_title, a.projects_services,"
                                    . " a.projects_image, a.projects_desc, "
                                    . "DATE_FORMAT( a.projects_start_date, '%d-%m-%Y %H:%i:%s' ) as projects_start_date, "
                                    . "DATE_FORMAT( a.projects_end_date, '%d-%m-%Y %H:%i:%s' ) as projects_end_date, "
                                    . " a.projects_location,"
                                    . "a.projects_order, a.projects_active_status,a.projects_highlight,"
                                    . " a.projects_meta_description, a.projects_meta_keywords, "
                                    . "DATE_FORMAT( a.projects_create_date, '%d-%m-%Y %H:%i:%s' ) as projects_create_date, "
                                    . "a.projects_create_by, "
                                    . " b.client_title "
                                    . "FROM tbl_projects as a "
                                    . " inner join tbl_client as b on a.client_id = b.client_id "
                                    . " $where "
                                    . " ORDER BY projects_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeProjects($id)
	{
		$sql	= "UPDATE tbl_projects SET projects_active_status = abs(projects_active_status-1),  
				   projects_update_date = now(), 
				   projects_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE projects_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteProjects($id = '')
	{
		$sql	= "DELETE FROM tbl_projects WHERE projects_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkProjects($projects_title){
		$sql	= "SELECT projects_title FROM tbl_projects WHERE projects_title = '".$projects_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
	function insertProjects($client_id, $user_id, $projects_title,$projects_services,$projects_desc,$projects_imageurl,$projects_start_date,$projects_end_date,$projects_location,$projects_highlight,$projects_metadescription,$projects_metakeywords)
	{

		$sql	= "INSERT INTO tbl_projects SET 
                            client_id= ".$client_id.", 
                            user_id= ".$user_id.", 
                            projects_title='".$projects_title."', 
                            projects_services='".$projects_services."', 
                            projects_desc='".$projects_desc."',
                            projects_image='".$projects_imageurl."', 
                            projects_start_date ='".$projects_start_date."', 
                            projects_end_date ='".$projects_end_date."',
                            projects_location ='".$projects_location."',
                            projects_meta_description='".$projects_metadescription."', 
                            projects_meta_keywords='".$projects_metakeywords."', 
                            projects_active_status = 0, 
                            projects_highlight = $projects_highlight, 
                            projects_create_by = ".$_SESSION['admin_data']['user_id'].", projects_create_date = now() ";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateProjects($id,$client_id,$user_id, $projects_title,$projects_services,$projects_desc,$projects_imageurl,$projects_start_date,$projects_end_date,$projects_location,$projects_highlight,$projects_metadescription,$projects_metakeywords)
	{
		$sql	= "UPDATE tbl_projects SET 
                            client_id= ".$client_id.", 
                            user_id= ".$user_id.", 
                            projects_title='".$projects_title."', 
                            projects_services='".$projects_services."', 
                            projects_desc='".$projects_desc."',
                            projects_image='".$projects_imageurl."', 
                            projects_start_date ='".$projects_start_date."', 
                            projects_end_date ='".$projects_end_date."',
                            projects_location ='".$projects_location."',
                            projects_meta_description='".$projects_metadescription."', 
                            projects_meta_keywords='".$projects_metakeywords."', 
                            projects_highlight = $projects_highlight, 
                            projects_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            projects_update_date=now() WHERE projects_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderProjects($id,$order)
	{
		$sql	= "UPDATE tbl_projects SET 
				   projects_order= ".$order.",
				   projects_update_by = ".$_SESSION['admin_data']['user_id'].", projects_update_date=now() WHERE projects_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
        
        function insertCient($client_title)
	{

		$sql	= "INSERT INTO tbl_client SET  client_title='".$client_title."', "
                        . " client_create_date = now(), "
                        . " client_create_by =".$_SESSION['admin_data']['user_id']."  ";		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
        
         function getProjectsCient(){
         $data = array();
         $sql="select * from tbl_client order by client_id asc";         
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
     
         function GenerateProjects($cond = null){
		 $query		= "SELECT a.projects_id,  a.client_id, a.user_id, a.projects_title, a.projects_services,"
                                    . " a.projects_image, a.projects_desc, "
                                    . "DATE_FORMAT( a.projects_start_date, '%d-%m-%Y %H:%i:%s' ) as projects_start_date, "
                                    . "DATE_FORMAT( a.projects_end_date, '%d-%m-%Y %H:%i:%s' ) as projects_end_date, "
                                    . " a.projects_location,"
                                    . "a.projects_order, a.projects_active_status,a.projects_highlight,"
                                    . " a.projects_meta_description, a.projects_meta_keywords, "
                                    . "DATE_FORMAT( a.projects_create_date, '%d-%m-%Y %H:%i:%s' ) as projects_create_date, "
                                    . "a.projects_create_by, "
                                    . " b.client_title "
                                    . "FROM tbl_projects as a "
                                    . " inner join tbl_client as b on a.client_id = b.client_id "
                                    . " ".$cond;
                $query		= $this->db->query($query)->result_array();
			
                            //$data = $query->result();                                      
                        foreach($query as $row)
		{
                           
                            
			$data[] =  array(
					'projects_id'	=>$row['projects_id'],
                                        'client_id'	=>$row['client_id'],
                                        'user_id'	=>$row['user_id'],
                                        'client_title'	=>$row['client_title'],
                                        'projects_title'	=>$row['projects_title'],
                                        'projects_services'	=>$row['projects_services'],
                                        'projects_location'	=>$row['projects_location'],
                                        'projects_image' =>$row['projects_image'],    
                                        'projects_desc' =>$row['projects_desc'], 
                                        'projects_start_date' =>$row['projects_start_date'], 
                                        'projects_end_date'	=>$row['projects_end_date'],
                                        'projects_order' =>$row['projects_order'], 
                                        'projects_highlight' =>$row['projects_highlight'], 
                                        'user_title'	=>$this->getUser($row['user_id'])
				);
		}
                    //  print_r($data); 
                    
                        
			//$query->free_result();
                        $this->db->close();
			return $data; 
	}
        
          function getUser($user_id){
             $data = array();
             $hasil =   $this->db->query("select client_title as user_title from tbl_client where client_id = $user_id ");	
			$data = $hasil->row_array();                       
                        return $data['user_title']; 
        }
     
        function CountProjects(){
             $sql="SELECT COUNT(a.projects_id) as total FROM `tbl_projects` as a ";	
                $hasil =   $this->db->query($sql);
                $data = $hasil->row_array(); 
                return $data['total']; 
        }
}