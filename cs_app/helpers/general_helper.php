<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('getTimeStamp'))
{
	function getTimeStamp($date='')
	{
	
		if(empty($date) || $date == "")
			return 0;
			
		return strtotime($date);
	}
}

if ( ! function_exists('getDateFormat'))
{
	function getDateFormat($timestamp='')
	{
		if(empty($timestamp) || $timestamp == "")
			return '';
					
		$date = date('d-m-Y',$timestamp);
		return $date;	
	}
}

if ( ! function_exists('getDateTimeFormat'))
{
	function getDateTimeFormat($timestamp='')
	{
		if(empty($timestamp) || $timestamp == "")
			return '';
					
		$date = date('d-m-Y H:i',$timestamp);
		return $date;	
	}
}

if ( ! function_exists('isSlug'))
{
	function isSlug($url_slug='')
	{
		if(preg_match('/^[a-z][-a-z0-9]*$/', $url_slug))
		{
        	return TRUE;
    	}
		else
		{
			return FALSE;
		}
	}
}


if ( ! function_exists('getSlug'))
{
	function getSlug($title='')
	{
		if(strlen($title) > 75)
		{
			$title = substr($title,0,75);
		}

		$url_slug = url_title(convert_accented_characters(strip_tags(trim($title))), 'dash', true);
		
		return $url_slug;
	}
}

if ( ! function_exists('getRandomString'))
{
	function getRandomString($limit)
	{
		$random_string = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, $limit);
		
		return $random_string;
	}
}


if ( ! function_exists('is_valid_email'))
{
	function is_valid_email($email)
	{
		if(is_array($email) || is_numeric($email) || is_bool($email) || is_float($email) || is_file($email) || is_dir($email) || is_int($email))
        return false;
		else
		{
			$email=trim(strtolower($email));
			if(filter_var($email, FILTER_VALIDATE_EMAIL)!==false) return true;
			else
			{
				$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';
				return (preg_match($pattern, $email) === 1) ? true : false;
			}
		}
	}
}


if ( ! function_exists('get_formatted_phone_no'))
{
	function get_formatted_phone_no($phone)
	{
		  // note: making sure we have something
		  if(!isset($phone{3})) { return ''; }
		  // note: strip out everything but numbers 
		  $phone = preg_replace("/[^0-9]/", "", $phone);
		  $length = strlen($phone);
		  switch($length) {
		  case 7:
			return preg_replace("/([0-9]{3})([0-9]{4})/", "$1-$2", $phone);
		  break;
		  case 10:
		   return preg_replace("/([0-9]{3})([0-9]{3})([0-9]{4})/", "($1) $2-$3", $phone);
		  break;
		  case 11:
		  return preg_replace("/([0-9]{1})([0-9]{3})([0-9]{3})([0-9]{4})/", "$1($2) $3-$4", $phone);
		  break;
		  default:
			return $phone;
		  break;
		  }
	}
}

?>