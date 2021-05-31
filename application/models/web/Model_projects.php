<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_projects extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
          
    function getMenuContent($module_id){
                $data = array();
                        $hasil =   $this->db->query("SELECT a.menu_id as menu_id "
                                 . "FROM tbl_menu as a "
                                 . "INNER JOIN tbl_module as b on a.module_id = b.module_id where a.menu_parent = 0 and a.menu_sub_parent= 0  and a.module_id = '".$module_id."' ");	
			$data = $hasil->row_array();                       
                        return $data['menu_id']; 
            }
        function getModuleId($module_path){
            $data = array();
             $sql="select module_id, module_path from tbl_module where module_path Like '%".$module_path."%' ";         
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
            
             function getListProjects(){
		$query		= "SELECT a.projects_id,  a.client_id,  a.user_id, a.projects_title, a.projects_services,"
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
                                    . " WHERE a.projects_active_status = 1 ORDER BY a.projects_id DESC ";
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
}