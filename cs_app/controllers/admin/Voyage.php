<?php 

class Voyage extends CI_Controller {
	
	public $outputData;		
	 
	function __construct() 
	{
        parent::__construct();
    }
	
	function index()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		redirect_admin('voyage/manageVoyages');	
	}
	
	/* Voyage */
	function manageVoyages()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('view_voyage'))
			redirect('admin_access_denied');	

		$this->outputData['voyages']		= $this->voyage_model->getVoyage();
		$this->outputData['main_content'] 	= 'admin/voyage_management/voyage/manageVoyages';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function addVoyage()
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_voyages'))
			redirect('admin_access_denied');	
			
		$general_setting = getGeneralSettings();
		$cruise_code = $general_setting->cruise_code;
		if(empty($general_setting->cruise_code))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Cruise Code is empty please add it in settings page'));
			redirect_admin('voyage/manageVoyages');
		}	

		if($this->input->post())
		{
				//Check the voyage already exists or not
				$params=array(
					'check_exist' => "Y",
					'start_date'=> getTimeStamp($this->input->post('start_date')),
					'end_date'	=> getTimeStamp($this->input->post('end_date'))
				);
			
				$check_voyage_exist = $this->voyage_model->getVoyage($params);
						
				if($check_voyage_exist->num_rows() > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Voyage date already exists.'));
					redirect_admin('voyage/addVoyage');
				}
				
				$voyage_id = $cruise_code."".date('Ymd',getTimeStamp($this->input->post('start_date')));
							
				$insert_data=array(
					'cruise_code' => $cruise_code,
					'voyage_id' => $voyage_id,
					'start_date' => getTimeStamp($this->input->post('start_date')),
					'end_date' 	=> getTimeStamp($this->input->post('end_date')),
					'status'	=> $this->input->post('status'),
					'created_at' => strtotime(date('Y-m-d H:i:s'))
				);

				$this->voyage_model->insertVoyage($insert_data);
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Voyage was created.'));
				redirect_admin('voyage/editVoyage/'.$voyage_id);
		}	

		$this->outputData['main_content'] 	= 'admin/voyage_management/voyage/addVoyage';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function editVoyage($voyage_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_voyages'))
			redirect('admin_access_denied');
			
		$general_setting = getGeneralSettings();
		$cruise_code = $general_setting->cruise_code;
		if(empty($general_setting->cruise_code))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Cruise Code is empty please add it in settings page'));
			redirect_admin('voyage/manageVoyages');
		}		
			
		if(empty($voyage_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage.'));
			redirect_admin('voyage/manageVoyages');	
		}
		
		//Check Voyage exists or not
		$condition = array('voyage_id' => $voyage_id);
		$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
		if($check_voyage_exists == 0)
		{
			redirect('admin_access_denied');
		}	
		
		//Check the voyage has survyes or guests. If yes then disable date
		$params['voyage_id'] = $voyage_id;
		$surveys = $this->surveys_model->getSurveys($params);
		
		$params['voyage_id'] = $voyage_id;
		$guests = $this->guests_model->getGuests($params);	
		
		$has_survey = "N";
		if($guests->num_rows() > 0 || $surveys->num_rows() > 0)
		{
			$has_survey = "Y";
		}	

		if($this->input->post())
		{
				//Check the Country name already exists or not
				$params=array(
					'check_exist' => "Y",
					'not_voyage_id'=> $voyage_id,
					'start_date'=> getTimeStamp($this->input->post('start_date')),
					'end_date'	=> getTimeStamp($this->input->post('end_date'))
				);
			
				$check_voyage_exist = $this->voyage_model->getVoyage($params); 
						
				if($check_voyage_exist->num_rows() > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Voyage date already exists.'));
					redirect_admin('voyage/editVoyage/'.$voyage_id);
				}
				
				$update_data=array(
					'cruise_code' => $cruise_code,
					'status' => $this->input->post('status'),
					'updated_at' => strtotime(date('Y-m-d H:i:s'))
				);
				
				$new_voyage_id = $voyage_id;
				if($has_survey == "N")
				{
					$new_voyage_id = $cruise_code."".date('Ymd',getTimeStamp($this->input->post('start_date')));
					
					$update_data['voyage_id'] = $new_voyage_id;
					$update_data['start_date'] = getTimeStamp($this->input->post('start_date'));
					$update_data['end_date'] = getTimeStamp($this->input->post('end_date'));
				}
				
							
				$update_cond=array(
					'voyage_id'	=>	$voyage_id
				);
					
				$this->voyage_model->updateVoyage($update_data,$update_cond);
				
				$this->session->set_userdata('active_tab','general-content');
				
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
				redirect_admin('voyage/editVoyage/'.$new_voyage_id);
		}
		
		$this->outputData['has_survey']	= $has_survey;
		$this->outputData['voyage']		= $this->voyage_model->getVoyageById($voyage_id);
		$this->outputData['main_content'] 	= 'admin/voyage_management/voyage/editVoyage';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function deleteVoyage($voyage_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_voyages'))
			redirect('admin_access_denied');
		
		//Check Voyage exists or not
		$condition = array('voyage_id' => $voyage_id);
		$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
		if($check_voyage_exists == 0)
		{
			redirect('admin_access_denied');
		}
		
		//Check voyage exists and not closed
		$condition = array('voyage_id' => $voyage_id, 'status !=' => 'C');
		$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
		if($check_voyage_exists == 0)
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Sorry you can not delete. Voyage closed.'));
			redirect_admin('voyage/manageVoyages');
		}		
			
		$params['voyage_id'] = $voyage_id;
		$guests = $this->guests_model->getGuests($params);	
		
		if($guests->num_rows() > 0)
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Please delete the guests of this voyage before deleting this.'));
			redirect_admin('voyage/manageVoyages');
		}
		
		$params['voyage_id'] = $voyage_id;
		$surveys = $this->surveys_model->getSurveys($params);	
		
		if($surveys->num_rows() > 0)
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Please delete the surveys of this voyage before deleting this.'));
			redirect_admin('voyage/manageVoyages');
		}
		
		$clean_folder = FCPATH. 'images/surveys/'.$voyage_id.'/';
		$this->remove_directory($clean_folder);
			
		$condition = array(
			'voyage_id'	=>	$voyage_id
		);

		$this->voyage_model->deleteVoyage($condition);
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Voyage was deleted successfully.'));
		redirect_admin('voyage/manageVoyages');
	}
	
	function closeVoyage($voyage_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_voyages'))
			redirect('admin_access_denied');
			
		$general_setting = getGeneralSettings();
		$cruise_code = $general_setting->cruise_code;
		if(empty($general_setting->cruise_code))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Cruise Code is empty please add it in settings page'));
			redirect_admin('voyage/manageVoyages');
		}		
			
		if(empty($voyage_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage.'));
			redirect_admin('voyage/manageVoyages');	
		}
		
		//Check Voyage exists or not
		$condition = array('voyage_id' => $voyage_id);
		$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
		if($check_voyage_exists == 0)
		{
			redirect('admin_access_denied');
		}
		
		$update_data=array(
			'status' => "C",
			'updated_at' => strtotime(date('Y-m-d H:i:s'))
		);
		
		$update_cond=array(
			'voyage_id'	=>	$voyage_id
		);
			
		$this->voyage_model->updateVoyage($update_data,$update_cond);
		
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Voyage '.$voyage_id.' closed.'));
		redirect_admin('voyage/editVoyage/'.$voyage_id);
		
	}
	
	function updateVoyageStatus()
	{
		if(!isAuthorizedAdmin('manage_voyages'))
		{
			$data['status'] = "error";
			echo json_encode($data); exit;
		}	
			
		$voyage_id	= $this->input->post('voyage_id');
		$status		= $this->input->post('status');
		if($voyage_id !="" && $status!="")
		{	
			$update_data	= array(
								'status' 			=> $status
								);
			
			$update_cond	= array('voyage_id' => $voyage_id);
			
			$this->voyage_model->updateVoyage($update_data,$update_cond);
			
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


/* End of file voyage.php */
/* Location: ./system/application/controllers/admin/voyage.php */
?>