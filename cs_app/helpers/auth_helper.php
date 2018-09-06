<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


// ------------------------------------------------------------------------

/**
 * Check Whether the user is an administrator
 *
 * Create a admin URL based on the admin folder path mentioned in config file. Segments can be passed via the
 * first parameter either as a string or an array.
 *
 * @access	public
 * @param	string
 * @return	string
 */
	function isAdmin()
	{
		$CI 	=& get_instance();
		return $CI->session->userdata ('admin_logged_in') == TRUE? TRUE: FALSE;
	}
	
	function isAuthorizedAdmin($page)
	{
		$CI 	=& get_instance();
		
		//$CI->load->model('roles_model');
		
		if($CI->session->userdata ('admin_type') == "S")
		{
			return TRUE;
		}
		else
		{
			/*$access = "N";
			
			if($CI->session->userdata ('admin_role_id'))
			{
				$role_info = $CI->roles_model->getRoleByID($CI->session->userdata ('admin_role_id'));
				
				if($role_info->$page)
				{
					$access = $role_info->$page; 
				}
			}
			return $access == "Y"? TRUE: FALSE;
			*/
			
			return TRUE;
		}
	}
	
	function isLogin()
	{
		$CI 	=& get_instance();
		return $CI->session->userdata ('guest_logged_in') == TRUE? TRUE: FALSE;
	}
	
/* End of file auth_helper.php */
/* Location: ./app/helpers/auth_helper.php */