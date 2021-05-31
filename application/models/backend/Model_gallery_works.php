<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_gallery_works extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function getListGallery($works_id,$cond = null){
		 $query		= "SELECT a.gallery_id, a.gallery_title,"
                                    . " a.gallery_image, a.gallery_desc, a.gallery_active_status,"
                                    . "a.gallery_order,"
                                    . "DATE_FORMAT( a.gallery_create_date, '%d-%m-%Y %H:%i:%s' ) as gallery_create_date, a.gallery_create_by, "
                                    . " b.works_id "
                                    . "FROM tbl_gallery_works as a "
                                    . " inner join tbl_works as b on a.works_id = b.works_id "
                                    . " where a.works_id=".$works_id." "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	

	
	function getGallery($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE gallery_id = ".$id;
		}
		$sql	= "SELECT a.gallery_id, a.gallery_title,"
                                    . " a.gallery_image, a.gallery_desc, a.gallery_active_status,"
                                    . "a.gallery_order,"
                                    . "DATE_FORMAT( a.gallery_create_date, '%d-%m-%Y %H:%i:%s' ) as gallery_create_date, a.gallery_create_by, "
                                    . " b.works_id "
                                    . "FROM tbl_gallery_works as a "
                                    . " inner join tbl_works as b on a.works_id = b.works_id "
                                    . " $where "
                                    . " ORDER BY gallery_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeGallery($id)
	{
		$sql	= "UPDATE tbl_gallery_works SET gallery_active_status = abs(gallery_active_status-1),  
				   gallery_update_date = now(), 
				   gallery_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE gallery_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteGallery($id = '')
	{
		$sql	= "DELETE FROM tbl_gallery_works WHERE gallery_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkGallery($gallery_title){
		$sql	= "SELECT gallery_title FROM tbl_gallery_works WHERE gallery_title = '".$gallery_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
            function insertGallery($data){
                $this->db->insert('tbl_gallery_works', $data);               
		$last_id  = $this->db->insert_id();		
		return $last_id;
                $this->db->close();
	}
        
	function saveTitle($title, $gallery_id){ 
         $today= date("Y-m-d H:i:s");
          $data = array(
                        'gallery_title'=>$title,
                        'gallery_update_by'=> $_SESSION['admin_data']['user_id'], 
                        'gallery_update_date'=> $today
                        );

            $this->db->where('gallery_id', $gallery_id);
            $this->db->update('tbl_gallery_works', $data);
            $this->db->close();
        }         


    function saveDescription($remarks,$gallery_id){ 
        $today= date("Y-m-d H:i:s");
           $data = array(
                        'gallery_desc'=>$remarks,
                        'gallery_update_by'=> $_SESSION['admin_data']['user_id'], 
                        'gallery_update_date'=> $today
                        );
            $this->db->where('gallery_id', $gallery_id);
            $this->db->update('tbl_gallery_works', $data);
            $this->db->close();
        }
	
         
     
     function updateOrderGallery($id,$order)
	{
		$sql	= "UPDATE tbl_gallery_works SET 
				   gallery_order= ".$order.",
				   gallery_update_by = ".$_SESSION['admin_data']['user_id'].", gallery_update_date=now() WHERE gallery_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
     
        
}