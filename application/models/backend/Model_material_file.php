<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_material_file extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function getListFile($material_id,$cond = null){
		 $query		= "SELECT a.material_file_id, a.material_file_title,a.material_file,"
                                    . " a.material_file_active_status,"
                                    . "a.material_file_order,"
                                    . "DATE_FORMAT( a.material_file_create_date, '%d-%m-%Y %H:%i:%s' ) as material_file_create_date, a.material_file_create_by, "
                                    . " b.material_id "
                                    . "FROM tbl_material_file as a "
                                    . " inner join tbl_material as b on a.material_id = b.material_id "
                                    . " where a.material_id=".$material_id." "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
    function getTitle($material_id){

            $data = array();

             $hasil =   $this->db->query("select material_title as title from tbl_material where material_id = $material_id ");	

			$data = $hasil->row_array();                       

                        return $data['title']; 

        }
	
	function getFile($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE material_file_id = ".$id;
		}
		$sql	= "SELECT a.material_file_id, a.material_file_title,a.material_file,"
                                    . "   a.material_file_active_status,"
                                    . "a.material_file_order,"
                                    . "DATE_FORMAT( a.material_file_create_date, '%d-%m-%Y %H:%i:%s' ) as material_file_create_date, a.material_file_create_by, "
                                    . " b.material_id "
                                    . "FROM tbl_material_file as a "
                                    . " inner join tbl_material as b on a.material_id = b.material_id "
                                    . " $where "
                                    . " ORDER BY material_file_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeFile($id)
	{
		$sql	= "UPDATE tbl_material_file SET material_file_active_status = abs(material_file_active_status-1),  
				   material_file_update_date = now(), 
				   material_file_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE material_file_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteFile($id = '')
	{
		$sql	= "DELETE FROM tbl_material_file WHERE material_file_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	function deleteFileby($id = '')
	{
		$sql	= "DELETE FROM tbl_material_file WHERE material_file_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	function checkFile($material_file_title, $material_id){
		$sql	= "SELECT material_file_title FROM tbl_material_file WHERE material_file_title = '".$material_file_title."' and material_id = '".$material_id."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
            function insertFile($data){
               
                
                foreach ($data as $value) {
                  $this->db->insert('tbl_material_file', $value);   
                }
                
//                echo'<pre>';
//                print_r($data);
//                die;
                              
		
                $this->db->close();
	}
        
	function saveFile($material_file_title,$material_file,$file_order,$material_file_id){ 
         $today= date("Y-m-d H:i:s");
          $data = array(
                        'material_file_title'=>$material_file_title,
                        'material_file'=>$material_file,
                        'material_file_order'=>$file_order,
                        'material_file_update_by'=> $_SESSION['admin_data']['user_id'], 
                        'material_file_update_date'=> $today
                        );

            $this->db->where('material_file_id', $material_file_id);
            $this->db->update('tbl_material_file', $data);
            $this->db->close();	
         
        }
     function updateOrderFile($id,$order)
	{
		$sql	= "UPDATE tbl_material SET 
				   material_file_order= ".$order.",
				   material_file_update_by = ".$_SESSION['admin_data']['user_id'].", material_file_update_date=now() WHERE material_file_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
     
        
}