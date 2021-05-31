<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Model_about extends CI_Model {

    function __construct()
    {
        parent::__construct();
    }
	

	  function getListVisionMision(){
		$query		= "SELECT a.vimis_id, a.vimis_title, a.vimis_short_desc,"
                                    . " a.vimis_desc, a.vimis_order, a.vimis_active_status,"
                                    . " a.vimis_meta_description, a.vimis_meta_keywords, "
                                    . "DATE_FORMAT( a.vimis_create_date, '%d-%m-%Y %H:%i:%s' ) as vimis_create_date, a.vimis_create_by "
                                   . "FROM tbl_vimis as a "
                                    . " where a.vimis_active_status = 1 order by a.vimis_order ASC " ;
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
        
        function getListTeam(){
		$query		= "SELECT a.team_id, a.position_id, a.team_title, a.team_position,"
                                    . " a.team_image, a.team_desc, a.team_order, a.team_active_status,"
                                    . "DATE_FORMAT( a.team_create_date, '%d-%m-%Y %H:%i:%s' ) as team_create_date, a.team_create_by, "
                                    . " c.position_title "
                                    . "FROM ( SELECT * FROM tbl_team ORDER BY team_order ASC ) as a "
                                    . " inner join tbl_position as c on a.position_id = c.position_id "
                                    . " where a.team_active_status =1 ORDER BY c.position_id ASC";
                                   
		$query		= $this->db->query($query)->result_array();
		
		return $query;
	}
        
}