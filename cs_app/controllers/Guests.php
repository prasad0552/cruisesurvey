<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Guests extends CI_Controller {

	public $outputData;		//Holds the output data for each view


	public function index()
	{
		
		
	}
	
	public function login()
	{
		if(!isActiveVoyage())
			redirect('home/no_active_voyage');
			
		if(isLogin())
			redirect('home');

		if($this->input->post())
		{
			
			$login_name = $this->input->post('login_name');
			$password = $this->input->post('password');
			
			
			$active_voyage_id = getActiveVoyageId();
				
			$conditions = array('voyage_id' => $active_voyage_id, 'login_name'=>$login_name,'password'=>$password,'status'=>'A');
				
			if($this->guest_auth_model->loginAsGuest($conditions))
			{
				//Set Session For Guest
				$this->guest_auth_model->setGuestSession($conditions);
				redirect('home');
			} 
			else
			{
				//Log in attempt failed
				$this->session->set_flashdata('flash_message', $this->common_model->flash_message('error','Incorrect Login Details.'));
			 	redirect('guests/login');
			}
		}
		
		$this->outputData['title'] 				= translate('login');
		$this->outputData['meta_title'] 		= translate('login');
		$this->outputData['meta_keywords'] 		= translate('login');
		$this->outputData['meta_description'] 	= translate('login');
		$this->outputData['main_content'] 		= 'guests/login_view';
		$this->load->view(TEMPLATE_FOLDER.'/guests/login_view',$this->outputData);
	}
	
	public function logout()
	{
		if(isLogin())
		{
			$this->guest_auth_model->clearGuestSession();	
			redirect('guests/login');
		}
		else
		{
			redirect('home');
		}	
	}
}
