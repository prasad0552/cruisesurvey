<?php

class Languages_model extends CI_Model {
	 
	function __construct() 
	{
        parent::__construct();
    }
	
  	//Check Language exists or not
	function checkLanguageExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('languages');
			return $query->num_rows();
		}
	}
		  
	//Insert Language
	function insertLanguage($insert_data)
	{
	  	$this->db->insert('languages',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get languages
	function getLanguages($params=array())
	{	
			$fields = array(
						'?:languages.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['language_id']))
			{
				$condition .= " AND ?:languages.language_id = '".$params['language_id']."'";
			}
			
			if(!empty($params['language_code']))
			{
				$condition .= " AND ?:languages.language_code = '".$params['language_code']."'";
			}
			
			if(!empty($params['language_code_in']))
			{
				$condition .= " AND ?:languages.language_code IN (".$params['language_code_in'].")";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:languages.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$order_by[0]." ".$order_by[1];
			}
			else
			{
				$order		= " ORDER BY ?:languages.language_id ASC ";
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
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:languages ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Language by id
	function getLanguageByID($language_id)
	{
	  		$fields = array(
						'?:languages.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:languages.language_id = '".$language_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:languages ".$join." WHERE ".$condition);
			
			return $result->row();
	}
	
	//Get Language by code
	function getLanguageByCode($language_code)
	{
	  		$fields = array(
						'?:languages.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:languages.language_code = '".$language_code."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:languages ".$join." WHERE ".$condition);
			
			return $result->row();
	}
	
	//Update Language
	function updateLanguage($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('languages',$update_data);
		}
	}
	
	//Delete Language
	function deleteLanguage($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('languages');
				
				return $this->db->affected_rows();
			}	
	}
	
	
	//Check Language Value exists or not
	function checkLanguageValueExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('language_values');
			return $query->num_rows();
		}
	}
		  
	//Insert Language Value
	function insertLanguageValue($insert_data)
	{
	  	$this->db->insert('language_values',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get language Values
	function getLanguageValues($params=array())
	{	
			$fields = array(
						'?:language_values.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['language_code']))
			{
				$condition .= " AND ?:language_values.language_code = '".$params['language_code']."'";
			}
			
			if(!empty($params['language_variable']))
			{
				$condition .= " AND ?:language_values.variable_name = '".$params['language_variable']."'";
			}
			
			if(!empty($params['language_code_in']))
			{
				$condition .= " AND ?:language_values.language_code IN (".$params['language_code_in'].")";
			}

			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$order_by[0]." ".$order_by[1];
			}
			else
			{
				$order		= " ORDER BY ?:language_values.variable_name ASC ";
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
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:language_values ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Update Language Value
	function updateLanguageValue($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('language_values',$update_data);
		}
	}
	
	//Delete Language Value
	function deleteLanguageValue($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('language_values');
				
				return $this->db->affected_rows();
			}	
	}
}
?>