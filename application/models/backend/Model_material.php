<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_material extends CI_Model {

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
            
	 function getListMaterial($cond = null){
		$query		= "SELECT a.material_id, a.material_title, "
                                    . "a.material_image, a.material_order,a.material_highlight,"
                                    . "DATE_FORMAT( a.material_create_date, '%d-%m-%Y %H:%i:%s' ) as material_create_date, "
                                    . "a.material_active_status "
                                    . "FROM tbl_material as a "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	
	function getMaterial($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE material_id = ".$id;
		}
		$sql	= "SELECT a.material_id, a.material_title, "
                                    . "a.material_image, a.material_order,a.material_highlight,"
                                    . "DATE_FORMAT( a.material_create_date, '%d-%m-%Y %H:%i:%s' ) as material_create_date, "
                                    . "a.material_active_status "
                                    . "FROM tbl_material as a "
                                    . " $where "
                                    . " ORDER BY material_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeMaterial($id)
	{
		$sql	= "UPDATE tbl_material SET material_active_status = abs(material_active_status-1),  
				   material_update_date = now(), 
				   material_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE material_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteMaterial($id = '')
	{
		$sql	= "DELETE FROM tbl_material WHERE material_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkMaterial($material_title){
		$sql	= "SELECT material_title FROM tbl_material WHERE material_title = '".$material_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
	function insertMaterial($material_title,$material_highlight,$material_imageurl)
	{

		$sql	= "INSERT INTO tbl_material SET 
                            material_title='".$material_title."',
                            material_image='".$material_imageurl."', 
                            material_active_status = 0, 
                            material_highlight = $material_highlight,
                            material_create_by = ".$_SESSION['admin_data']['user_id'].", material_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateMaterial($id,$material_title,$material_highlight,$material_imageurl)
	{
		$sql	= "UPDATE tbl_material SET 
                            material_title='".$material_title."',
                            material_image='".$material_imageurl."', 
                            material_highlight = $material_highlight,
                            material_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            material_update_date=now() WHERE material_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderMaterial($id,$order)
	{
		$sql	= "UPDATE tbl_material SET 
				   material_order= ".$order.",
				   material_update_by = ".$_SESSION['admin_data']['user_id'].", material_update_date=now() WHERE material_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function getMaterialCategory(){
         $data = array();
         $sql="select * from tbl_material_category order by category_id asc";         
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
       
              
       function GenerateMenu($module_id)
            {
		 $data = array();
			 $sql = "SELECT menu_id, menu_title,module_id, menu_active_status, menu_parent,menu_sub_parent, menu_url, menu_alias, menu_order FROM tbl_menu as a where a.menu_parent = 0 and a.module_id = ".$module_id." and a.menu_active_status=1 order by a.menu_order ASC";
			$query = $this->db->query($sql);
			
                            //$data = $query->result();                                      
                        foreach($query->result() as $row)
		{
                                                     
			$data[] = (object) array(
					'menu_id'	=>$row->menu_id,
                                        'module_id'	=>$row->module_id,
                                        'menu_title'	=>$row->menu_title,
                                        'menu_parent'	=>$row->menu_parent,
                                        'menu_sub_parent' =>$row->menu_sub_parent,                                        
                                        'menu_url'	=>$row->menu_url, 
                                        'menu_alias'	=>$row->menu_alias,
                                        'count'	=>$this->getCountMaterial($row->menu_id),
					// recursive
					'child_first'	=>$this->get_sub_menu_firstLeft($row->menu_id)
                                        
                                        
				);
		}
                      
                    
                        
			$query->free_result();
                        $this->db->close();
			return $data;
	}        
        
        function get_sub_menu_firstLeft($menu_id)
	{
		 $data = array();
			 $sql = "SELECT a.menu_id,a.menu_parent,a.menu_sub_parent,a.menu_title,a.menu_url,a.menu_alias from tbl_menu as a where a.menu_sub_parent= 0 and a.menu_parent= '".$menu_id."' and a.menu_active_status=1 order by a.menu_order ASC";
			$query = $this->db->query($sql);
			if($query->num_rows() > 0){
                
                foreach($query->result() as $row)
		{
                                                     
			$data[] = (object) array(
					'menu_id'	=>$row->menu_id,
                                        'menu_title'	=>$row->menu_title,
                                        'menu_parent'	=>$row->menu_parent,
                                        'menu_sub_parent' =>$row->menu_sub_parent,                                        
                                        'menu_url'	=>$row->menu_url,
                                        'menu_alias'	=>$row->menu_alias,
                                        'count_child'	=>$this->getCountMaterialChild($row->menu_id,$row->menu_parent),
					// recursive 2
					'child_second' =>$this->get_sub_menu_secondLeft($row->menu_id,$row->menu_parent)
                                        
				);
		}
            
                        
			$query->free_result();
                        $this->db->close();
			return $data; 
                            
                            
                        }

        }
           function get_sub_menu_secondLeft($menu_id,$menu_parent)
	{
		 $data = array();
			 $sql = "SELECT a.menu_id,a.menu_parent,a.menu_sub_parent,a.menu_title,a.menu_url, a.menu_alias from tbl_menu as a  where  a.menu_sub_parent ='".$menu_id."' and a.menu_parent= '".$menu_parent."' and a.menu_active_status=1 order by a.menu_order ASC";
			$query = $this->db->query($sql);
			if($query->num_rows() > 0){
                        
                            
                            foreach($query->result() as $row)
		{
                                                     
			$data[] = (object) array(
					'menu_id'	=>$row->menu_id,
                                        'menu_title'	=>$row->menu_title,
                                        'menu_parent'	=>$row->menu_parent,
                                        'menu_sub_parent' =>$row->menu_sub_parent,                                         
                                        'menu_url'	=>$row->menu_url,
                                        'menu_alias'	=>$row->menu_alias
         
					
				);
		}                       
			$query->free_result();
                        $this->db->close();
			return $data;                            
                        }

        }  
   
    
        
        
        function GenerateMaterial($cond = null){
		 $query		= "SELECT a.material_id, a.material_title,"
                                    . " a.material_image, a.material_order, a.material_active_status,a.material_highlight "
                                    . "FROM tbl_material as a "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
        function CountMaterial(){
             $sql="SELECT COUNT(a.material_id) as total FROM `tbl_material` as a ";	
                $hasil =   $this->db->query($sql);
			$data = $hasil->row_array();                       

                        return $data['total']; 
        }
}