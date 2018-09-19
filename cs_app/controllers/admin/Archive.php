<?php 

class Archive extends CI_Controller {
	
	public $outputData;		
	 
	function __construct() 
	{
        parent::__construct();
    }
	
	function index()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		redirect_admin('archive/viewVoyages');	
	}
	
	/* Voyage */
	function viewVoyages()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('archive'))
			redirect('admin_access_denied');
		
		$voyages = array();
		$inputs = array();
		if($this->input->post('view'))
		{ 
			$inputs = $this->input->post();
				
			$start_date = strtotime($this->input->post('start_date'));
			$end_date = strtotime($this->input->post('end_date'));
			
			$params = array('period' => 'Y', 'start_date' => $start_date, 'end_date' => $end_date);
			$voyages = $this->voyage_model->getVoyage($params);		
		}
		else if($this->input->post('delete'))
		{
			$inputs = $this->input->post();
				
			$start_date = strtotime($this->input->post('start_date'));
			$end_date = strtotime($this->input->post('end_date'));
			
			if(date('Y') == date('Y', $start_date))
			{
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Sorry, You can not delete the voyages of current year'));
				redirect_admin('archive/viewVoyages');
			}
			
			$params = array('period' => 'Y', 'start_date' => $start_date, 'end_date' => $end_date);
			$voyages = $this->voyage_model->getVoyage($params);		
			
			if($voyages->num_rows() > 0)
			{
				foreach($voyages->result() as $voyage)
				{
					if(date('Y') != date('Y',$voyage->start_date))
					{
						$this->deleteVoyage($voyage->voyage_id);
					}
				}
			}
			
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','voyage were deleted.'));
			redirect_admin('archive/viewVoyages');
		}	
		else
		{
			$year = date('Y') - 1; // Get current year and subtract 1
			$start_date = strtotime("January 1st, {$year}");
			$end_date = strtotime("December 31st, {$year}");
			
			$params = array('period' => 'Y', 'start_date' => $start_date, 'end_date' => $end_date);
			$voyages = $this->voyage_model->getVoyage($params);	
		}
		
		$this->outputData['params']		= $params;
		$this->outputData['voyages']		= $voyages;
		$this->outputData['main_content'] 	= 'admin/archive/viewVoyages';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function deleteSingleVoyage($voyage_id)
	{
	
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('archive'))
			redirect('admin_access_denied');
			
		if(empty($voyage_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage ID.'));
			redirect_admin('archive/viewVoyages');	
		}
		
		//Check Voyage exists or not in Cruise database
		$condition = array('voyage_id' => $voyage_id);
		$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
		if($check_voyage_exists == 0)
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage ID.'));
			redirect_admin('archive/viewVoyages');
		}	
			
		$this->deleteVoyage($voyage_id);
		
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Voyage deleted successfully'));
		redirect_admin('archive/viewVoyages');
	}
	
	function deleteVoyage($voyage_id)
	{
		if(!empty($voyage_id)) 
		{
			$condition = array('voyage_id' => $voyage_id);
			
			//Delete reports
			$this->surveys_model->deleteGuestSurveyReport($condition);
			
			//Delete guest
			$this->guests_model->deleteGuest($condition);
			
			//Delete Survey
			$this->surveys_model->deleteSurvey($condition);
			
			$clean_folder = FCPATH. 'images/surveys/'.$voyage_id.'/';
			$this->remove_directory($clean_folder);
			
			//Delete Voyage
			$this->voyage_model->deleteVoyage($condition);
		}
	}
	
	//Function removing directory & files
	function remove_directory($dir) { 

	  if(!empty($dir) && glob($dir . '/*') != "" )
	  { 	
		  foreach(glob($dir . '/*') as $file) { 
			if(is_dir($file)) $this->remove_directory($file); else unlink($file); 
		  } 
		  $Files = get_dir_file_info($dir); 
		  if((empty($Files) || $Files == "") && file_exists($dir))
		  {
		  	rmdir($dir); 
		  }	 
	  }
	}
	
	function remove_files($dir) { 

	  if(!empty($dir) && glob($dir . '/*') != "" )
	  { 	
		  foreach(glob($dir . '/*') as $file) { 
			if(is_dir($file)) $this->remove_directory($file); else unlink($file); 
		  }  
	  }
	}
}


/* End of file Archive.php */
/* Location: ./system/application/controllers/admin/archive.php */
?>