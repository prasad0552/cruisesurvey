<?php

class Locations_model extends CI_Model {
	 
	function __construct() 
	{
        parent::__construct();
    }
	
  	//Check Country exists or not
	function checkCountryxists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('countries');
			return $query->num_rows();
		}
	}
		  
	//Insert Country
	function insertCountry($insert_data)
	{
	  	$this->db->insert('countries',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Countries
	function getCountries($params=array())
	{	
			$fields = array(
						'?:countries.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['country_id']))
			{
				$condition .= " AND ?:countries.country_id = '".$params['country_id']."'";
			}
			
			if(!empty($params['country_code']))
			{
				$condition .= " AND ?:countries.country_code = '".$params['country_code']."'";
			}
			
			if(!empty($params['country_code_in']))
			{
				$condition .= " AND ?:countries.country_code IN (".$params['country_code_in'].")";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:countries.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$order_by[0]." ".$order_by[1];
			}
			else
			{
				$order		= " ORDER BY ?:countries.country_id ASC ";
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
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:countries ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Country by id
	function getCountryByID($country_id)
	{
	  		$fields = array(
						'?:countries.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:countries.country_id = '".$country_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:countries ".$join." WHERE ".$condition);
			
			return $result->row();
	}
	
	//Get Country by id
	function getCountryByCode($country_code)
	{
	  		$fields = array(
						'?:countries.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:countries.country_code = '".$country_code."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:countries ".$join." WHERE ".$condition);
			
			return $result->row();
	}
	
	//Update Country
	function updateCountry($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('countries',$update_data);
		}
	}
	
	//Delete Country
	function deleteCountry($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('countries');
				
				return $this->db->affected_rows();
			}	
	}
}
?>