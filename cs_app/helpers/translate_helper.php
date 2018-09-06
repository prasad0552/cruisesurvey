<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('translate'))
{
	function translate($language_variable='')
	{		
		
		if(empty($language_variable))
			return "";
			
		$CI 	=& get_instance();
		
		if($CI->session->userdata('guest_language') != "")
		{
			$language_code = $CI->session->userdata('guest_language');
		}
		else
		{
			$language_code = "en";
		}
		
		$CI->load->model('admin/languages_model',TRUE);	
		
		$params = array('language_code' => $language_code, 'language_variable' => $language_variable);
		$language_values = $CI->languages_model->getLanguageValues($params);
		
		if($language_values->num_rows() > 0)
			return $language_values->row()->value;
		else
			return $language_variable;	
	}
}

?>