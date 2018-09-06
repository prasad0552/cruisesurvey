<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// ------------------------------------------------------------------------


if ( ! function_exists('admin_url'))
{
	function admin_url($uri = '')
	{
		$CI =& get_instance();

		$uri = 'admin/'.$uri ;

		return $CI->config->site_url($uri);

	}

}

if ( ! function_exists('admin_assets_url'))
{
	function admin_assets_url()
	{
		$CI =& get_instance();

		$uri = APPLICATION_FOLDER.'/views/admin/assets/' ;

		return $CI->config->site_url($uri);

	}

}


if ( ! function_exists('redirect_admin'))

{

	function redirect_admin($uri = '', $method = 'location', $http_response_code = 302)

	{

		switch($method)

		{

			case 'refresh'	: header("Refresh:0;url=".admin_url($uri));

				break;

			default			: header("Location: ".admin_url($uri), TRUE, $http_response_code);

				break;

		}

		exit;

	}

}

if ( ! function_exists('common_assets_url'))
{
	function common_assets_url()
	{
		$CI =& get_instance();

		$uri = APPLICATION_FOLDER.'/views/common/assets/' ;

		return $CI->config->site_url($uri);

	}

}

if ( ! function_exists('assets_url'))
{
	function assets_url()
	{
		$CI =& get_instance();

		$uri = APPLICATION_FOLDER.'/views/'.TEMPLATE_FOLDER.'/assets/' ;

		return $CI->config->site_url($uri);

	}

}

if ( ! function_exists('image_url'))

{

	function image_url($image_name = '')

	{
		$CI =& get_instance();
		$uri = str_replace($CI->config->item('index_page'),"",$CI->config->site_url()).'images/'.$image_name;
		//echo $uri;exit;
		return $uri;

	}

}

if ( ! function_exists('file_url'))

{

	function file_url($file_name = '')

	{
		$CI =& get_instance();
		$uri = str_replace($CI->config->item('index_page'),"",$CI->config->site_url()).'assets/files/'.$file_name;
		//echo $uri;exit;
		return $uri;

	}

}

// ------------------------------------------------------------------------

?>