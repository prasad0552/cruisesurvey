<?php

class Co_voyage_model extends CI_Model {
	 
	function __construct() 
	{
        parent::__construct();
		
		$this->corporate_db = $this->load->database('corporate', TRUE);
    }
	
  	//Check Voyage exists or not
	function checkVoyageExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->corporate_db->where($condition);
			$query=$this->corporate_db->get('voyage');
			return $query->num_rows();
		}
	}
		  
	//Insert Voyage
	function insertVoyage($insert_data)
	{
	  	$this->corporate_db->insert('voyage',$insert_data);
		
		//$voyage_id = $this->corporate_db->query("SELECT voyage_id FROM ?:voyage ORDER BY created_at Desc Limit 1")->row()->voyage_id;
		
		//return $voyage_id;
	}
	
	//Get Voyage
	function getVoyage($params=array())
	{	
			$fields = array(
						'?:voyage.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['voyage_id']))
			{
				$condition .= " AND ?:voyage.voyage_id = '".$params['voyage_id']."'";
			}
			
			if(!empty($params['voyage_id_in']))
			{
				$condition .= " AND ?:voyage.voyage_id IN (".$params['voyage_id_in'].")";
			}
			
			if(!empty($params['period']))
			{
				$condition .= " AND ( ( ?:voyage.start_date >= '".$params['start_date']."' AND ?:voyage.start_date <= '".$params['end_date']."') )";
			}
			
			if(!empty($params['check_exist']) && $params['check_exist'] == "Y")
			{
			
				if(!empty($params['not_voyage_id']))
				{
					$condition .= " AND ?:voyage.voyage_id != '".$params['not_voyage_id']."'";
				}
				
				if($params['start_date'] == $params['end_date'])
				{
					$condition .= " AND ( (?:voyage.start_date <= '".$params['start_date']."' AND ?:voyage.end_date > '".$params['start_date']."') OR (?:voyage.start_date = '".$params['start_date']."' AND ?:voyage.end_date = '".$params['start_date']."')  ) ";
				}
				else
				{
					$condition .= " AND ( ( ?:voyage.start_date BETWEEN '".$params['start_date']."' AND '".strtotime("-1 days",$params['end_date'])."') OR ( ?:voyage.end_date BETWEEN '".strtotime("+1 days",$params['start_date'])."' AND '".$params['end_date']."' ) )";
				}	
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:voyage.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$order_by[0]." ".$order_by[1];
			}
			else
			{
				$order		= " ORDER BY ?:voyage.start_date DESC ";
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
	  	  
	  		$result = $this->corporate_db->query("SELECT ".implode(',',$fields)." FROM ?:voyage ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Voyage by id
	function getVoyageByID($voyage_id)
	{
	  		$fields = array(
						'?:voyage.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:voyage.voyage_id = '".$voyage_id."'";
						
	  		$result = $this->corporate_db->query("SELECT ".implode(',',$fields)." FROM ?:voyage ".$join." WHERE ".$condition);
			
			return $result->row();
	}
		
	//Update Voyage
	function updateVoyage($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->corporate_db->where($update_cond);
			$this->corporate_db->update('voyage',$update_data);
		}
	}
	
	//Delete Voyage
	function deleteVoyage($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->corporate_db->where($conditions);
			
				$this->corporate_db->delete('voyage');
				
				return $this->corporate_db->affected_rows();
			}	
	}
}
?>