<?php

class Guests_model extends CI_Model {
	 
	function __construct() 
	{
        parent::__construct();
    }
	
  	//Check Guest exists or not
	function checkGuestExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('guests');
			return $query->num_rows();
		}
	}
	
	//Check Guest exists or not while import
	function checkImportGuestExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('guests');
			return $query;
		}
	}
		  
	//Insert Guest
	function insertGuest($insert_data)
	{
	  	$this->db->insert('guests',$insert_data);
		
		//$guest_id = $this->db->query("SELECT guest_id FROM ?:guests ORDER BY created_at Desc Limit 1")->row()->guest_id;
		
		//return $guest_id;
	}
	
	//Get Guests
	function getGuests($params=array())
	{	
			$fields = array(
						'?:guests.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['voyage_id']))
			{
				$condition .= " AND ?:guests.voyage_id = '".$params['voyage_id']."'";
			}
			
			if(!empty($params['guest_id']))
			{
				$condition .= " AND ?:guests.guest_id = '".$params['guest_id']."'";
			}
			
			if(!empty($params['guest_id_in']))
			{
				$condition .= " AND ?:guests.guest_id IN (".$params['guest_id_in'].")";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:guests.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$order_by[0]." ".$order_by[1];
			}
			else
			{
				$order		= " ORDER BY ?:guests.created_at ASC ";
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
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:guests ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Guest by id
	function getGuestByID($guest_id)
	{
	  		$fields = array(
						'?:guests.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:guests.guest_id = '".$guest_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:guests ".$join." WHERE ".$condition);
			
			return $result->row();
	}
		
	//Update Guest
	function updateGuest($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('guests',$update_data);
		}
	}
	
	//Delete Guest
	function deleteGuest($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('guests');
				
				return $this->db->affected_rows();
			}	
	}
}
?>