<?php 

class Home extends CI_Controller {
	
	public $outputData;		
	 
	function __construct() 
	{
        parent::__construct();
    }
	
	function index()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		$general_settings = getGeneralSettings();	
		$active_voyage_id = $general_settings->active_voyage_id;
		
		$voyage = $this->voyage_model->getVoyageById($active_voyage_id);
		$this->outputData['voyage'] = $voyage;
		
		if(!empty($active_voyage_id))
		{
		$params = array('voyage_id' =>$active_voyage_id);
		$surveys = $this->surveys_model->getSurveys($params);
		$this->outputData['no_of_surveys'] = $surveys->num_rows();
		
		$params = array('voyage_id' =>$active_voyage_id);
		$guests = $this->guests_model->getGuests($params);
		$this->outputData['no_of_guests'] = $guests->num_rows();
		
		$params = array('voyage_id' =>$active_voyage_id,'status' => 'A');
		$guests = $this->guests_model->getGuests($params);
		$this->outputData['no_of_active_guests'] = $guests->num_rows();
		}

		$this->outputData['main_content'] = "admin/auth/dashboard";
		$this->load->view('admin/admin_template',$this->outputData);
	} 
	
	function logout()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		$this->admin_auth_model->clearAdminSession();
		redirect_admin('login');
	}
	
	//Change Password
	function profile()
	{
		if(!isAdmin())
			redirect_admin('login');
		
		$admin_id = $this->session->userdata('admin_id');
		
		if($this->input->post())
		{
		
			//Check the Admin email already exists or not
			$condition=array(
				'admin_id != '	=> $admin_id,
				'email'	=> $this->input->post('email')
			);
		
			$check_email = $this->admin_model->checkAdminExists($condition);
					
			if($check_email > 0)
			{
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Email Id already exists.'));
				redirect_admin('home/profile');
			}
		
			$update_values = array(
				'email'			=> $this->input->post('email'),
				'firstname'		=> $this->input->post('firstname'),
				'lastname'		=> $this->input->post('lastname'),
				'phone'			=> $this->input->post('phone'),
				'address' 		=> $this->input->post('address')
			);
			
			if($this->input->post('password') != "")
			{
				$update_values['password']	= md5($this->input->post('password'));
			}
			
			$this->admin_model->updateAdmin($update_values,array('admin_id'=>$admin_id));
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Profile updated successfully.'));
			redirect_admin('home/profile');
		}

		$this->outputData['admin_details'] 	= $this->admin_model->getAdminByID($admin_id);
		$this->outputData['main_content']			= "admin/auth/update_profile";
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function downloadSampleCSV($csv_file)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		
		if(!empty($csv_file))
		{	
				$this->load->helper('download');
				$file_path	= site_url('files/import_csv_sample_formats/'.$csv_file);
				$data 		= file_get_contents($file_path); // Read the file's contents
				force_download($csv_file, $data);	
		}
	}
	
	function access_denied()
	{
		$this->outputData['main_content']	= "admin/auth/access_denied";
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	public function page_not_found()
	{
		
		$this->outputData['title'] 				= "Service Unavailable";
		$this->outputData['meta_title'] 		= "Service Unavailable";
		$this->outputData['meta_keywords'] 		= "Service Unavailable";
		$this->outputData['meta_description'] 	= "Service Unavailable";
		$this->load->view('/admin/home/my_404',$this->outputData);
	}
}
//Class Login End 

/* End of file login.php */
/* Location: ./system/application/controllers/admin/login.php */