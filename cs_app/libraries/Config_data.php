<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


Class Config_data extends CI_Config
{

	function __construct() 
	{
		parent::__construct();
		
		$CI =& get_instance();
		
		define("TEMPLATE_FOLDER","templates/default");
				
		define("?:",$CI->db->dbprefix);
		
	} //Controller End	

} //Class 
?>
