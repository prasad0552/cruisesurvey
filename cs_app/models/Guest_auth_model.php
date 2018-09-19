<?php

class Guest_auth_model extends CI_Model {
	 
	/**
	 * Constructor 
	 *
	 */
	  function __construct()  
	  {
		parent::__construct(); 
      }//Controller End
	 
	// --------------------------------------------------------------------
		
	/**
	 * Get Guests
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function loginAsGuest($conditions=array())
	 {
	 	if(count($conditions)>0)		
	 		$this->db->where($conditions);
			 
	 	$this->db->select('guest_id');
		$result = $this->db->get('guests');
		if($result->num_rows()>0)
			return true;
		else 
			return false;	
	 }//End of loginAsGuest Function
	 
 	// --------------------------------------------------------------------
		
	/**
	 * Get Users
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function setGuestSession($conditions=array())
	 {
	 	if(count($conditions)>0)		
	 		$this->db->where($conditions);
			 
	 	$this->db->select('*');
		$result = $this->db->get('guests');
		if($result->num_rows()>0)
		{
			$row = $result->row();
			$values = array ('guest_id'=>$row->guest_id,'guest_voyage_id'=>$row->voyage_id,'guest_email'=>$row->email,'guest_lastname'=>$row->lastname,'guest_date_of_birth'=>$row->date_of_birth,'guest_language'=>$row->language,'guest_logged_in'=>TRUE,'guest_info'=>$row); 
			$this->session->set_userdata($values);
		}
		
	 }//End of setGuestSession Function
	 
	// --------------------------------------------------------------------
		

	// --------------------------------------------------------------------
		
	/**
	 * clearSession
	 *
	 * @access	private
	 * @param	array	conditions to fetch data
	 * @return	object	object with result set
	 */
	 function clearGuestSession()
	 {
	 
	 	$array_items = array ('guest_id','guest_voyage_id','guest_email','guest_lastname','guest_date_of_birth','guest_language','guest_logged_in','guest_info');
	    $this->session->unset_userdata($array_items);
		
	 }//End of clearSession Function
	 
	// --------------------------------------------------------------------
		
}
	
   
/* End of file Guest_auth_model.php */ 
/* Location: ./app/models/Guest_auth_model.php */
?>