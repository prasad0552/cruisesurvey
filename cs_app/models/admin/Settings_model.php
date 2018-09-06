<?php

class Settings_model extends CI_Model {
	 
	function __construct() 
	{
        parent::__construct();
    }
	
  	//Check General Settings exists or not
	function checkGeneralExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('settings_general');
			return $query->num_rows();
		}
	}
		  
	//Insert General
	function insertGeneral($insert_data)
	{
	  	$this->db->insert('settings_general',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get General
	function getGeneral($params=array())
	{	
			$fields = array(
						'?:settings_general.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['setting_id']))
			{
				$condition .= " AND ?:settings_general.setting_id = '".$params['setting_id']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:settings_general.setting_id ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:settings_general ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Update General
	function updateGeneral($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('settings_general',$update_data);
		}
	}
}
?>