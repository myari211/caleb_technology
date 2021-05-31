<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_banner_gallery extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function getListBannerGallery($banner_id,$cond = null){
		 $query		= "SELECT a.banner_gallery_id, a.banner_gallery_title,"
                                    . " a.banner_gallery_image, a.banner_gallery_desc, a.banner_gallery_active_status,"
                                    . "a.banner_gallery_order,"
                                    . "DATE_FORMAT( a.banner_gallery_create_date, '%d-%m-%Y %H:%i:%s' ) as banner_gallery_create_date, a.banner_gallery_create_by, "
                                    . " b.banner_id "
                                    . "FROM tbl_banner_gallery as a "
                                    . " inner join tbl_banner as b on a.banner_id = b.banner_id "
                                    . " where a.banner_id=".$banner_id." "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	

	
	function getBannerGallery($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE banner_gallery_id = ".$id;
		}
		$sql	= "SELECT a.banner_gallery_id, a.banner_gallery_title,"
                                    . " a.banner_gallery_image, a.banner_gallery_desc, a.banner_gallery_active_status,"
                                    . "a.banner_gallery_order,"
                                    . "DATE_FORMAT( a.banner_gallery_create_date, '%d-%m-%Y %H:%i:%s' ) as banner_gallery_create_date, a.banner_gallery_create_by, "
                                    . " b.banner_id "
                                    . "FROM tbl_banner_gallery as a "
                                    . " inner join tbl_banner as b on a.banner_id = b.banner_id "
                                    . " $where "
                                    . " ORDER BY banner_gallery_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeBannerGallery($id)
	{
		$sql	= "UPDATE tbl_banner_gallery SET banner_gallery_active_status = abs(banner_gallery_active_status-1),  
				   banner_gallery_update_date = now(), 
				   banner_gallery_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE banner_gallery_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteBannerGallery($id = '')
	{
		$sql	= "DELETE FROM tbl_banner_gallery WHERE banner_gallery_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkBannerGallery($banner_gallery_title){
		$sql	= "SELECT banner_gallery_title FROM tbl_banner_gallery WHERE banner_gallery_title = '".$banner_gallery_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
            function insertBannerGallery($data){
                $this->db->insert('tbl_banner_gallery', $data);               
		$last_id  = $this->db->insert_id();		
		return $last_id;
                $this->db->close();
	}
        
	function saveTitle($title, $banner_gallery_id){ 
         $today= date("Y-m-d H:i:s");
          $data = array(
                        'banner_gallery_title'=>$title,
                        'banner_gallery_update_by'=> $_SESSION['admin_data']['user_id'], 
                        'banner_gallery_update_date'=> $today
                        );

            $this->db->where('banner_gallery_id', $banner_gallery_id);
            $this->db->update('tbl_banner_gallery', $data);
            $this->db->close();
        }         


    function saveDescription($remarks,$banner_gallery_id){ 
        $today= date("Y-m-d H:i:s");
           $data = array(
                        'banner_gallery_desc'=>$remarks,
                        'banner_gallery_update_by'=> $_SESSION['admin_data']['user_id'], 
                        'banner_gallery_update_date'=> $today
                        );
            $this->db->where('banner_gallery_id', $banner_gallery_id);
            $this->db->update('tbl_banner_gallery', $data);
            $this->db->close();
        }
	
         
     
     function updateOrderBannerGallery($id,$order)
	{
		$sql	= "UPDATE tbl_banner_gallery SET 
				   banner_gallery_order= ".$order.",
				   banner_gallery_update_by = ".$_SESSION['admin_data']['user_id'].", banner_gallery_update_date=now() WHERE banner_gallery_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
     
        
}