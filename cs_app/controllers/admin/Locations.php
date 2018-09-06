<?php 

class Locations extends CI_Controller {
	
	public $outputData;		
	 
	function __construct() 
	{
        parent::__construct();
    }
	
	function index()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		redirect_admin('locations/manageCountries');	
	}
	
	/* Countries */
	function manageCountries()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('view_locations'))
			redirect('admin_access_denied');	

		$this->outputData['countries']		= $this->locations_model->getCountries();
		$this->outputData['main_content'] 	= 'admin/locations/countries/manageCountries';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function addCountry()
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_locations'))
			redirect('admin_access_denied');	

		if($this->input->post())
		{
				//Check the Country name already exists or not
				$condition=array(
					'country_name'	=> $this->input->post('country_name')
				);
			
				$check_country_name = $this->locations_model->checkCountryExists($condition);
						
				if($check_country_name > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Country name already exists.'));
					redirect_admin('locations/addCountry');
				}
				
				$condition=array(
					'country_code'	=> $this->input->post('country_code')
				);
			
				$check_country_code = $this->locations_model->checkCountryExists($condition);
						
				if($check_country_code > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Country Code already exists.'));
					redirect_admin('locations/addCountry');
				}
				
							
				$insert_data=array(
					'country_code' 			=> $this->input->post('country_code'),
					'country_name' 			=> $this->input->post('country_name')
				);

				$country_id = $this->locations_model->insertCountry($insert_data);
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Country was added.'));
				redirect_admin('locations/editCountry/'.$country_id);
		}	

		$this->outputData['main_content'] 	= 'admin/locations/countries/addCountry';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function editCountry($country_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_locations'))
			redirect('admin_access_denied');	
			
		if(empty($country_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Country.'));
			redirect_admin('locations/manageCountries');	
		}	

		if($this->input->post())
		{
				//Check the Country name already exists or not
				$condition=array(
					'country_id != '=> $country_id,
					'country_name'	=> $this->input->post('country_name')
				);
			
				$check_country_name = $this->locations_model->checkCountryExists($condition);
						
				if($check_country_name > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Country name already exists.'));
					redirect_admin('locations/addCountry');
				}
				
				$condition=array(
					'country_id != '=> $country_id,
					'country_code'	=> $this->input->post('country_code')
				);
			
				$check_country_code = $this->locations_model->checkCountryExists($condition);
						
				if($check_country_code > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Country Code already exists.'));
					redirect_admin('locations/addCountry');
				}
			
				$update_data=array(
					'country_code' 			=> $this->input->post('country_code'),
					'country_name' 			=> $this->input->post('country_name')
				);
				
							
				$update_cond=array(
					'country_id'	=>	$country_id
				);
					
				$this->locations_model->updateCountry($update_data,$update_cond);
				
				$this->session->set_userdata('active_tab','general-content');
				
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
				redirect_admin('locations/editCountry/'.$country_id);
		}
		
		$this->outputData['country']		= $this->locations_model->getCountryById($country_id);
		$this->outputData['main_content'] 	= 'admin/locations/countries/editCountry';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function deleteCountry($country_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_locations'))
			redirect('admin_access_denied');	
			
		$condition = array(
			'country_id'	=>	$country_id
		);
		
		//$this->locations_model->deleteCountry($condition);
		//$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Country was deleted successfully.'));
		redirect_admin('locations/manageCountries');
	}
	
	function updateCountryStatus()
	{
		if(!isAuthorizedAdmin('manage_locations'))
		{
			$data['status'] = "error";
			echo json_encode($data); exit;
		}	
			
		$country_id	= $this->input->post('country_id');
		$status		= $this->input->post('status');
		if($country_id !="" && $status!="")
		{	
			$update_data	= array(
								'status' 			=> $status
								);
			
			$update_cond	= array('country_id' => $country_id);
			
			$this->locations_model->updateCountry($update_data,$update_cond);
			
			if($status == "A")
			{
				$data['status_info'] = "Active";			
			}
			else
			{
				$data['status_info'] = "Disabled";
			}	
			$data['status']	= "success";
		}
		else
		{
			$data['status']	= "error";
		}	
		
		echo json_encode($data);
		exit;
	}
	
}


/* End of file locations.php */
/* Location: ./system/application/controllers/admin/locations.php */
?>