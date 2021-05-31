<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_material extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
       
        function getMaterialPage (){
            $data = array();
            
            $sql = "SELECT a.material_id, a.material_title, "
                                    . "a.material_image, a.material_order,a.material_highlight,"
                                    . "a.material_active_status "
                                    . "FROM tbl_material as a "
                                    . " where a.material_active_status=1 order by a.material_order Asc";         
            $query = $this->db->query($sql);
			
                            //$data = $query->result();                                      
                        foreach($query->result() as $row)
		{
                                                     
			$data[] = (object) array(
					'material_id'	=>$row->material_id,
                                        'material_title'	=>$row->material_title,
                                        'material_image' =>$row->material_image,  
                                        'material_order'	=>$row->material_order,
                                        'material_image' =>$row->material_image,
					// recursive
					'file'	=>$this->getFile($row->material_id)
				);
		}
                      
                    
                        
			$query->free_result();
                        $this->db->close();
			return $data;     
    }
    
    function getFile($material_id)
	{
		 $data = array();
			  $sql = "SELECT a.material_file_id, a.material_file_title,a.material_file,"
                                    . " a.material_file_active_status,"
                                    . "a.material_file_order,"
                                    . " b.material_id "
                                    . "FROM tbl_material_file as a "
                                    . " inner join tbl_material as b on a.material_id = b.material_id "
                                    . " where a.material_id=".$material_id." and material_file <> '' "
                                  . " order by material_file_order ASC ";
                         $query = $this->db->query($sql);
			if($query->num_rows() > 0){
                
                foreach($query->result() as $row)
		{
                                                     
			$data[] = (object) array(
                            'material_file_id'=>$row->material_file_id,
                            'material_file_title'=>$row->material_file_title,
                            'material_file' => $row->material_file,
                            'material_file_order' => $row->material_file_order
				);
		}
            
                        
			$query->free_result();
                        $this->db->close();
			return $data; 
                            
                            
                        }

        }
    
  
	
	
        
}