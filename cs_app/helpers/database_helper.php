<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getGeneralSettings'))
{
	function getGeneralSettings()
	{
		$CI 	=& get_instance();
		$CI->load->model('admin/settings_model',TRUE);
		
		$params = array('setting_id' => 1);
		$general_settings = $CI->settings_model->getGeneral($params)->row();
		
		return $general_settings;
	}
}

if ( ! function_exists('isActiveVoyage'))
{
	function isActiveVoyage()
	{
		$general_settings = getGeneralSettings();
		$active_voyage_id = $general_settings->active_voyage_id; 
		if(empty($active_voyage_id) || $general_settings->site_offline == "Y")
		{
			return FALSE;
		}
		
		$CI 	=& get_instance();
		$CI->load->model('admin/voyage_model',TRUE);
		
		$current_date = strtotime(date('Y-m-d'));	
		
		$active_voyage = $CI->voyage_model->getVoyageById($active_voyage_id);
		return (isset($active_voyage->status) && $active_voyage->status == "A" && $active_voyage->end_date >= $current_date)? TRUE: FALSE;
	}
}

if ( ! function_exists('getActiveVoyageId'))
{
	function getActiveVoyageId()
	{
		$general_settings = getGeneralSettings();
		$active_voyage_id = $general_settings->active_voyage_id;
		
		return $active_voyage_id;
	}
}

if ( ! function_exists('addLanguageValues'))
{
	function addLanguageValues($variable_name,$value,$type="DYNAMIC")
	{
		if(empty($value))
		{
			return false;
		}
		
		$CI 	=& get_instance();
		$CI->load->model('admin/languages_model',TRUE);
		
		//Insert Language Variable
		$languages = $CI->languages_model->getLanguages();
		
		foreach($languages->result() as $language)
		{
			$condition=array(
				'language_code' => $language->language_code,
				'variable_name'	=> $variable_name
			);
		
			$check_variable_name = $CI->languages_model->checkLanguageValueExists($condition);
			
			//Check the language variable already exists or not			
			if($check_variable_name == 0)
			{
				$insert_data=array(
					'language_code' => $language->language_code,
					'variable_name' => $variable_name,
					'value'	=> $value,
					'type' => $type 
				);

				$CI->languages_model->insertLanguagevalue($insert_data);
			}
		}
	}
}


if ( ! function_exists('getOptionById'))
{
	function getOptionById($option_id)
	{		
		
		if(empty($option_id))
			return "";
			
		$CI 	=& get_instance();
		$CI->load->model('admin/surveys_model',TRUE);	
		
		$option = $CI->surveys_model->getSurveyQuestionOptionById($option_id);
		
		if($option != "")
			return $option;
		else
			return "";	
	}
}

if ( ! function_exists('getLanguageName'))
{
	function getLanguageName($language_code)
	{		
		
		if(empty($language_code))
			return "";
		
		if($language_code == "all")
			return "All";
				
		$CI 	=& get_instance();
		$CI->load->model('admin/languages_model',TRUE);	
		
		$language = $CI->languages_model->getLanguageByCode($language_code);

		if($language->language_name != "")
			return $language->language_name;
		else
			return "";	
	}
}

if ( ! function_exists('getQuestionCategoryName'))
{
	function getQuestionCategoryName($category_id)
	{		
		
		if(empty($category_id))
			return "";
				
		$CI 	=& get_instance();
		$CI->load->model('admin/surveys_model',TRUE);	
		
		$question_category = $CI->surveys_model->getQuestionCategoryByID($category_id);

		if($question_category->category != "")
			return $question_category->category;
		else
			return "";	
	}
}

?>