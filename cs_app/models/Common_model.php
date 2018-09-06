<?php

class Common_model extends CI_Model {

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
					$message ='<div class="alert alert-fixed alert-success alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Success! </strong>'.$message.'</div>';
					break;
			case 'error':
					$message ='<div class="alert alert-fixed alert-danger alert-dismissable"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a><strong>Error! </strong>'.$message.'</div>';
					break;		
		}
		return $message;
	}
}
	
   
/* End of file Common_model.php */ 
/* Location: ./app/models/Common_model.php */
?>