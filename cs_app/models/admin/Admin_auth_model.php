<?php

class Admin_auth_model extends CI_Model {
	 
	/**
	 * Constructor 
	 *
	 */
	  function __construct() 
	  {
        parent::__construct();
      }
	 
	// --------------------------------------------------------------------
		
	/**
	 * Get Users
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function loginAsAdmin($conditions=array())
	 {
	 	if(count($conditions)>0)		
	 		$this->db->where($conditions);
			 
	 	$this->db->select('admin_id');
		$result = $this->db->get('admin');
		if($result->num_rows()>0)
			return true;
		else 
			return false;	
	 }//End of loginAsAdmin Function
	 
 	// --------------------------------------------------------------------
		
	/**
	 * Get Users
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function setAdminSession($conditions=array())
	 {
	 	if(count($conditions)>0)		
	 		$this->db->where($conditions);
			 
	 	$this->db->select('*');
		$result = $this->db->get('admin');
		if($result->num_rows()>0)
		{
			$row = $result->row();
			$values = array ('admin_id'=>$row->admin_id,'email'=>$row->email,'admin_logged_in'=>TRUE,'admin_type' => $row->admin_type,'admin_role_id'=>0, 'admin_info'=>$row); 
			$this->session->set_userdata($values);
		}
		
	 }//End of setAdminSession Function
	 
	// --------------------------------------------------------------------
		

	// --------------------------------------------------------------------
		
	/**
	 * clearSession
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function clearAdminSession()
	 {
	 
	 	$array_items = array ('admin_id','email','admin_logged_in','admin_type','admin_role_id','admin_info');
	    $this->session->unset_userdata($array_items);
		
	 }//End of clearSession Function
	 
	// --------------------------------------------------------------------
		
}
	
   
/* End of file Auth_model.php */ 
/* Location: ./app/models/Auth_model.php */
?>