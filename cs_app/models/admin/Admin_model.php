<?php

class Admin_model extends CI_Model {

	function __construct() 
	{
        parent::__construct();
    }
	
	//Construct Flash message
	function flash_message($type,$message)
	{
	 	switch($type)
		{
			case 'success':
					$message ='<div class="callout callout-info"><h4>Success!</h4><p>'.$message.'</p></div>';
					break;
			case 'error':
					$message ='<div class="callout callout-danger"><h4>Error!</h4><p>'.$message.'</p></div>';
					break;		
		}
		return $message;
	}
	
	//Check admin exists or not
	function checkAdminExists($condition)
	{
	  	if(is_array($condition) && count($condition) >0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('admin');
			return $query->num_rows();
		}
	}
	
	//Insert Admin
	function insertAdmin($insert_data)
	{
	  	$this->db->insert('admin',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get admin
	function getAdmins($params=array())
	{
	  		
			$fields = array(
						'?:admin.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['admin_id']))
			{
				$condition .= " AND ?:admin.admin_id = '".$params['admin_id']."'";
			}
			
			if(!empty($params['not_admin_id']))
			{
				$condition .= " AND ?:admin.admin_id != '".$params['not_admin_id']."'";
			}
			
			if(!empty($params['not_admin_type']))
			{
				$condition .= " AND ?:admin.admin_type != '".$params['not_admin_type']."'";
			}
			
			if(!empty($params['email']))
			{
				$condition .= " AND ?:admin.email = '".$params['email']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$order_by[0]." ".$order_by[1];
			}
			else
			{
				$order		= " ORDER BY created_at desc ";
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
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:admin ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	  }
	  
	  //Get admin by id
	  function getAdminByID($admin_id)
	  {
	  		$fields = array(
						'?:admin.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:admin.admin_id = '".$admin_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:admin ".$join." WHERE ".$condition);
			
			return $result->row();
		
	  }
	  
	  //Update admin
	  function updateAdmin($update_data,$update_cond)
	  {
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('admin',$update_data);
		}
	  }
	  
	  //Delete suepr admin	
	  function deleteAdmin($conditions)
	  {
	  		if(count($conditions)>0)		
			{
				$this->db->where($conditions);
				
				$this->db->delete('admin');	
				
				return $this->db->affected_rows();
			}
	  }	  
	
}
	
   
/* End of file admin_model.php */ 
/* Location: ./app/models/admin/admin_model.php */
?>