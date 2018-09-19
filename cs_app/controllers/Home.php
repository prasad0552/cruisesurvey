<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public $outputData;		//Holds the output data for each view


	public function index()
	{	
		if(!isActiveVoyage())
			redirect('home/no_active_voyage');
		
		redirect('surveys');
	}
	
	public function service_unavailable()
	{
		
		$this->outputData['title'] 				= translate('service-unavailable');
		$this->outputData['meta_title'] 		= translate('service-unavailable');
		$this->outputData['meta_keywords'] 		= translate('service-unavailable');
		$this->outputData['meta_description'] 	= translate('service-unavailable');
		$this->outputData['main_content'] 		= 'home/service_unavailable';
		$this->load->view(TEMPLATE_FOLDER.'/home/service_unavailable',$this->outputData);
	}
	
	public function page_not_found()
	{
		
		$this->outputData['title'] 				= translate('page-not-found');
		$this->outputData['meta_title'] 		= translate('page-not-found');
		$this->outputData['meta_keywords'] 		= translate('page-not-found');
		$this->outputData['meta_description'] 	= translate('page-not-found');
		$this->outputData['main_content'] 		= 'home/my_404';
		$this->load->view(TEMPLATE_FOLDER.'/home/my_404',$this->outputData);
	}
	
	public function no_active_voyage()
	{
		if(isActiveVoyage())
			redirect('home');
		
		$this->outputData['title'] 				= translate('no-voyage-is-active');
		$this->outputData['meta_title'] 		= translate('no-voyage-is-active');
		$this->outputData['meta_keywords'] 		= translate('no-voyage-is-active');
		$this->outputData['meta_description'] 	= translate('no-voyage-is-active');
		$this->outputData['main_content'] 		= 'home/no_active_voyage';
		$this->load->view(TEMPLATE_FOLDER.'/home/no_active_voyage',$this->outputData);
	}
}
