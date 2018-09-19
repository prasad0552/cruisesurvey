<?php

class Co_settings_model extends CI_Model {
	 
	function __construct() 
	{
        parent::__construct();
    }
	
  	//Check DB Settings exists or not
	function checkDbSettingExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('corporate_db_settings');
			return $query->num_rows();
		}
	}
		  
	//Insert DB Settings
	function insertDbSetting($insert_data)
	{
	  	$this->db->insert('corporate_db_settings',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get DB Settings
	function getDbSettings($params=array())
	{	
			$fields = array(
						'?:corporate_db_settings.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['setting_id']))
			{
				$condition .= " AND ?:corporate_db_settings.setting_id = '".$params['setting_id']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:corporate_db_settings.setting_id ASC ";
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
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:corporate_db_settings ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Update DB Setting
	function updateDbSetting($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('corporate_db_settings',$update_data);
		}
	}
}
?>