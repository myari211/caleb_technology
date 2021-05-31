<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_content_subpage extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	
	function getListSubpage($content_page_id,$cond = null){
		 $query		= "SELECT a.content_subpage_id, a.content_subpage_title,a.content_subpage_desc,a.content_subpage_image,"
                                    . " a.content_subpage_active_status,"
                                    . "a.content_subpage_order,"
                                    . "DATE_FORMAT( a.content_subpage_create_date, '%d-%m-%Y %H:%i:%s' ) as content_subpage_create_date, a.content_subpage_create_by, "
                                    . " b.content_page_id, b.page_type "
                                    . "FROM tbl_content_subpage as a "
                                    . " inner join tbl_content_page as b on a.content_page_id = b.content_page_id "
                                    . " where a.content_page_id=".$content_page_id." "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
    function getTitle($content_page_id){

            $data = array();

             $hasil =   $this->db->query("select material_title as title from tbl_content_page where content_page_id = $content_page_id ");	

			$data = $hasil->row_array();                       

                        return $data['title']; 

        }
	
	function getSubpage($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE content_subpage_id = ".$id;
		}
		$sql	= "SELECT a.content_subpage_id, a.content_subpage_title,a.content_subpage_image,"
                                    . "   a.content_subpage_active_status,"
                                    . "a.content_subpage_order,"
                                    . "DATE_FORMAT( a.content_subpage_create_date, '%d-%m-%Y %H:%i:%s' ) as content_subpage_create_date, a.content_subpage_create_by, "
                                    . " b.content_page_id "
                                    . "FROM tbl_content_subpage as a "
                                    . " inner join tbl_content_page as b on a.content_page_id = b.content_page_id "
                                    . " $where "
                                    . " ORDER BY content_subpage_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeSubpage($id)
	{
		 $sql	= "UPDATE tbl_content_subpage SET content_subpage_active_status = abs(content_subpage_active_status-1),  
				   content_subpage_update_date = now(), 
				   content_subpage_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE content_subpage_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteSubpage($id = '')
	{
		$sql	= "DELETE FROM tbl_content_subpage WHERE content_subpage_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	function deleteSubpageby($id = '')
	{
		$sql	= "DELETE FROM tbl_content_subpage WHERE content_subpage_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	function checkSubpage($content_subpage_title, $content_page_id){
		$sql	= "SELECT content_subpage_title FROM tbl_content_subpage WHERE content_subpage_title = '".$content_subpage_title."' and content_page_id = '".$content_page_id."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
            function insertSubpage($data){
               
                
                foreach ($data as $value) {
                  $this->db->insert('tbl_content_subpage', $value);   
                }
                
//                echo'<pre>';
//                print_r($data);
//                die;
                              
		
                $this->db->close();
	}
        
	function saveSubpage($content_subpage_title,$content_subpage_desc,$content_subpage_image,$content_subpage_order,$content_subpage_id){ 
         $today= date("Y-m-d H:i:s");
          $data = array(
                        'content_subpage_title'=>$content_subpage_title,
                        'content_subpage_desc'=>$content_subpage_desc,
                        'content_subpage_image'=>$content_subpage_image,
                        'content_subpage_order'=>$content_subpage_order,
                        'content_subpage_update_by'=> $_SESSION['admin_data']['user_id'], 
                        'content_subpage_update_date'=> $today
                        );

            $this->db->where('content_subpage_id', $content_subpage_id);
            $this->db->update('tbl_content_subpage', $data);
            $this->db->close();	
         
        }
     function updateOrderSubpage($id,$order)
	{
		$sql	= "UPDATE tbl_content_page SET 
				   content_subpage_order= ".$order.",
				   content_subpage_update_by = ".$_SESSION['admin_data']['user_id'].", content_subpage_update_date=now() WHERE content_subpage_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
     
        
}