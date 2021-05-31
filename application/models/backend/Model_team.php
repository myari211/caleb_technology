<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_team extends CI_Model {

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
            function getListTeam($cond = null){
		$query		= "SELECT a.team_id, a.position_id, a.team_title, a.team_position,"
                                    . " a.team_image, a.team_desc, a.team_order, a.team_active_status,"
                                    . "DATE_FORMAT( a.team_create_date, '%d-%m-%Y %H:%i:%s' ) as team_create_date, a.team_create_by, "
                                    . " c.position_title "
                                    . "FROM tbl_team as a "
                                    . " inner join tbl_position as c on a.position_id = c.position_id "
                                    . " ".$cond;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
	
	
	function getTeam($id = '')
	{
		$where = '';
		if($id != ''){
			$where = "WHERE team_id = ".$id;
		}
		$sql	= "SELECT a.team_id, a.position_id, a.team_title, a.team_position,"
                                    . " a.team_image, a.team_desc, a.team_active_status,"
                                    . "DATE_FORMAT( a.team_create_date, '%d-%m-%Y %H:%i:%s' ) as team_create_date, a.team_create_by "
                                    . " FROM tbl_team as a "
                                    . " $where "
                                    . " ORDER BY team_id ASC";	
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 
		
		return $rs;	
	}
	
	function activeTeam($id)
	{
		$sql	= "UPDATE tbl_team SET team_active_status = abs(team_active_status-1),  
				   team_update_date = now(), 
				   team_update_by = ".$_SESSION['admin_data']['user_id']."
				   WHERE team_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
	
	function deleteTeam($id = '')
	{
		$sql	= "DELETE FROM tbl_team WHERE team_id = ".$id;	
		$query	= $this->db->query($sql);
		
		$str = $this->db->last_query();
		
		return $str;
	}
	
	function checkTeam($team_title){
		$sql	= "SELECT team_title FROM tbl_team WHERE team_title = '".$team_title."'";
		$query	= $this->db->query($sql);
		$rs		= $query->result_array(); 

		return $rs;
	}
	
	function insertTeam($position_id,$team_title,$team_desc,$team_imageurl,$team_position)
	{

		$sql	= "INSERT INTO tbl_team SET  
                            position_id='".$position_id."', 
                            team_title='".$team_title."', 
                            team_position='".$team_position."', 
                            team_desc='".$team_desc."',
                            team_image='".$team_imageurl."', 
                            team_active_status = 0, 
                            team_create_by = ".$_SESSION['admin_data']['user_id'].", team_create_date = now()";	
		
		$query  = $this->db->query($sql);
		$last_id  = $this->db->insert_id();
		
		return $last_id;
	}
	
	function updateTeam($id,$position_id,$team_title,$team_desc,$team_imageurl,$team_position)
	{
		 $sql	= "UPDATE tbl_team SET 
                            position_id='".$position_id."', 
                            team_title='".$team_title."', 
                            team_position='".$team_position."', 
                            team_image='".$team_imageurl."', 
                            team_desc='".$team_desc."',
                            team_update_by = ".$_SESSION['admin_data']['user_id'].", 
                            team_update_date=now() WHERE team_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function updateOrderTeam($id,$order)
	{
		$sql	= "UPDATE tbl_team SET 
				   team_order= ".$order.",
				   team_update_by = ".$_SESSION['admin_data']['user_id'].", team_update_date=now() WHERE team_id = ".$id;	
		$query	= $this->db->query($sql);
		
		return $query;
	}
         function getPosition(){
         $data = array();
         $sql="select * from tbl_position order by position_id asc";         
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
    
      function GenerateTeam(){
		 $query		= "SELECT a.team_id, a.position_id, a.team_title, a.team_position,"
                                    . " a.team_image, a.team_desc, a.team_order, a.team_active_status, "
                                    . "DATE_FORMAT( a.team_create_date, '%d-%m-%Y %H:%i:%s' ) as team_create_date, a.team_create_by, "
                                    . " c.position_title "
                                    . "FROM tbl_team as a "
                                    . " inner join tbl_position as c on a.position_id = c.position_id "
                                    . " where a.position_id = 1 limit 0,3";
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	} 
      function CountTeam(){
             $sql="SELECT COUNT(a.team_id) as total FROM `tbl_team` as a ";	
                $hasil =   $this->db->query($sql);
                $data = $hasil->row_array(); 
                return $data['total']; 
        } 
     
}