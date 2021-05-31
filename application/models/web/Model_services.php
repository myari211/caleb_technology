<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_services extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	

	  function getServices ($where_services ,$module_id){
            $data = array();
            
             $sql= "SELECT a.services_id, a.category_id, a.services_title, a.services_short_desc,"
                                    . " a.services_image, a.services_desc,a.services_about,a.services_client, a.services_active_status, a.services_alias, a.services_order,"
                                    . " a.services_meta_description, a.services_meta_keywords, "
                                    . "DATE_FORMAT( a.services_create_date, '%d-%m-%Y %H:%i:%s' ) as services_create_date, a.services_create_by, "
                                    . " b.menu_id, b.menu_title "
                                    . "FROM tbl_services as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " $where_services and b.Module_id=".$module_id." "
                                    . " and a.services_active_status=1 order by services_order Asc";         
            $query		= $this->db->query($sql)->result_array();
		
		return $query;
	  
        } 
     
    
  
	function getListServicesAlias(){
		$query		= "SELECT services_id, services_title, services_short_desc, services_image, services_desc, services_meta_description, services_meta_keywords,
						DATE_FORMAT( services_create_date, '%d %M %Y' ) as services_create_date,
						c.web_alias, c.web_ori
						FROM tbl_services a
						INNER JOIN tbl_alias c ON a.services_id = c.key_id 
						WHERE a.services_active_status = 1 AND c.alias_category = 'services' AND c.alias_active_status = 1
						ORDER BY services_id DESC";
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	
         function getMenuModule($id_satu){
            $data = array();
            $sql="select a.module_id, a.module_path, b.menu_id from tbl_module as a inner join tbl_menu as b"
                    . " on a.module_id = b. Module_id where b. menu_id =".$id_satu." ";         
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
          function getModuleId($module_path){
            $data = array();
             $sql="select module_id, module_path from tbl_module where module_path  ='".$module_path."' ";         
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
         function getServicesCategory(){
         
         $sql="select DISTINCT a.category_id, b.category_title  from tbl_services as a"
                 . " inner join tbl_services_category as b "
                 . "on a.category_id = b.category_id "
                 . "order by a.category_id asc";         
         $query		= $this->db->query($sql)->result_array();
		
		return $query;
         
     }
     
     
     
     
     function getServicesDetail($id = ''){
            $where = '';
		if($id != ''){
			$where = "WHERE services_id = ".$id;
		}
		$sql	= "SELECT a.services_id, a.menu_id,a.services_title, a.services_short_desc,"
                                    . " a.services_image, a.services_background1, a.services_background2, a.services_desc, a.services_active_status, a.services_alias,"
                                    . " a.services_meta_description, a.services_meta_keywords, "
                                    . "DATE_FORMAT( a.services_create_date, '%d-%m-%Y %H:%i:%s' ) as services_create_date, a.services_create_by, "
                                    . " b.menu_id, b.menu_title "
                                    . "FROM tbl_services as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " $where "
                                    . " ORDER BY services_id ASC";	      
           $query = $this->db->query($sql);
			
                            //$data = $query->result();                                      
                        foreach($query->result() as $row)
		{
                                                     
			$data[] = (object) array(
					'services_id'	=>$row->services_id,
                                        'services_title'	=>$row->services_title,
                                        'services_short_desc'	=>$row->services_short_desc,
                                        'services_image' =>$row->services_image,    
                                        'services_background1' =>$row->services_background1, 
                                        'services_background2' =>$row->services_background2, 
                                        'services_desc'	=>$row->services_desc,
                                        'services_about'	=>$row->services_about,
                                        'services_client'	=>$row->services_client,
                                        'services_order' =>$row->services_order,                                        
                                        'menu_id'	=>$row->menu_id,
                                        'related'	=>$this->getRelatedWorks($row->services_id)
				);
		}
                      
                    
                        
			$query->free_result();
                        $this->db->close();
			return $data;          
    } 
     
     
     
     
     
    function getRelatedWorks ($services_id){
            
                $where = "WHERE a.services_id = ".$services_id;
		
		 $sql	= "SELECT a.works_id, a.menu_id,a.category_id, a.works_title, a.works_short_desc,"
                                    . " a.works_image, a.works_desc, a.works_active_status, a.works_alias,"
                                    . " a.works_meta_description, a.works_meta_keywords, "
                                    . "DATE_FORMAT( a.works_create_date, '%d-%m-%Y %H:%i:%s' ) as works_create_date, a.works_create_by, "
                                    . " b.menu_id, b.menu_title "
                                    . "FROM tbl_works as a "
                                    . " inner join tbl_menu as b on a.menu_id = b.menu_id "
                                    . " $where "
                                    . " ORDER BY works_id ASC";	      
           $query = $this->db->query($sql);
			
                            //$data = $query->result();                                      
                        foreach($query->result() as $row)
		{
                                                     
			$data[] = (object) array(
					'works_id'	=>$row->works_id,
                                        'works_title'	=>$row->works_title,
                                        'works_alias'	=>$row->works_alias,
                                        'works_short_desc'	=>$row->works_short_desc,
                                        'works_image' =>$row->works_image,                                        
                                        'works_desc'	=>$row->works_desc,
                                        'works_order' =>$row->works_order,                                        
                                        'menu_id'	=>$row->menu_id
				);
		}
                      
                    
                        
			$query->free_result();
                        $this->db->close();
			return $data;   
        } 
     
     function getServicesMin() {
            $data = array();
             $hasil =  $this->db->query("select MIN(services_id) as min from tbl_services");	
			$data = $hasil->row_array();                       
                        return $data['min'];
             
        }
     function getNextServices($services_id) {
            $data = array();
             $hasil =  $this->db->query("select MIN(services_id) as next from tbl_services where services_active_status=1 and services_id > '$services_id'");	
			$data = $hasil->row_array();                       
                        return $data['next'];
             
        }
     function getPrevServices($services_id) {
            $data = array();
             $hasil =   $this->db->query("select MAX(services_id) as prev from tbl_services where services_active_status=1 and services_id < '$services_id'");	
			$data = $hasil->row_array();                       
                        return $data['prev'];
             
        }
     
        function getTitle($services_id){
            $data = array();
             $hasil =   $this->db->query("select services_title as title from tbl_services where services_id = $services_id ");	
			$data = $hasil->row_array();                       
                        return $data['title']; 
        }
     
     function getKeywords($services_id){
            $data = array();
           
            $hasil =   $this->db->query("select services_meta_keywords as keywords from tbl_services where services_id = $services_id ");	
			$data = $hasil->row_array();                       
                        return $data['keywords']; 
        }
        
        function getDescription($services_id){
            $data = array();
             $hasil =   $this->db->query("select services_meta_description as description from tbl_services where services_id = $services_id ");	
			$data = $hasil->row_array();                       
                        return $data['description']; 
        }
     
}