<?php 

class Guests extends CI_Controller {
	
	public $outputData;		
	 
	function __construct() 
	{
        parent::__construct();
    }
	
	function index()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		redirect_admin('guests/manageGuests');	
	}
	
	/* Guests */
	function manageGuests($voyage_id)
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('view_guests'))
			redirect('admin_access_denied');	
			
		if(empty($voyage_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage Id.'));
			redirect_admin('voyage/manageVoayges');	
		}
		
		//Check Voyage exist or not
		$condition = array('voyage_id' => $voyage_id);
		$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
		if($check_voyage_exists == 0)
		{
			redirect('admin_access_denied');
		}		
		
		$this->outputData['voyage_id'] 		= $voyage_id;
		
		$params['voyage_id'] = $voyage_id;
		$this->outputData['guests'] = $this->guests_model->getGuests($params);
		$this->outputData['main_content'] 	= 'admin/voyage_management/guests/manageGuests';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function addGuest($voyage_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_Guests'))
			redirect('admin_access_denied');	
			
		if(empty($voyage_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage id.'));
			redirect_admin('voyage/manageVoayges');	
		}
		
		//Check Voyage exist or not
		$condition = array('voyage_id' => $voyage_id);
		$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
		if($check_voyage_exists == 0)
		{
			redirect('admin_access_denied');
		}	

		if($this->input->post())
		{
				//Find login name
				$lastname 		= $this->input->post('lastname');
				$date_of_birth	= $this->input->post('date_of_birth');
				
				$dob = explode("-",$date_of_birth);
				$dob1= $dob[2].$dob[1].$dob[0];
				
				$login_name = $lastname.$dob1;
				
				//Check the guest already exists or not
				$condition=array(
					'voyage_id'	=> $voyage_id,
					'login_name'=> $login_name
				);
			
				$check_guest_exist = $this->guests_model->checkGuestExists($condition);
						
				if($check_guest_exist > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Guest already exists.'));
					redirect_admin('guests/addGuest/'.$voyage_id);
				}
				
				//Find guest_numeric_id and guest id
				$guests = $this->db->query("SELECT max(guest_numeric_id) as max_guest_numeric_id FROM ?:guests where voyage_id='".$voyage_id."'");
				
				if($guests->num_rows() > 0)
				{
					$guest_numeric_id = $guests->row()->max_guest_numeric_id;
					$guest_numeric_id++;
					$guest_id = $voyage_id."-GU".$guest_numeric_id;
				}
				else
				{
					$guest_numeric_id = 1;
					$guest_id = $voyage_id."-GU".$guest_numeric_id;
				}
				
				//Generate Password
				$general_setting = getGeneralSettings();
				$guest_password_scheme = $general_setting->guest_password_scheme;
				if($guest_password_scheme == "FCI")
				{
					$password = $login_name.$this->input->post('passenger_no');	
				}
				else
				{
					$password = $login_name.getRandomString(8);
				}
							
				$insert_data=array(
					'guest_id'	=> $guest_id,
					'guest_numeric_id' => $guest_numeric_id,
					'voyage_id'	=> $voyage_id,
					'firstname' => $this->input->post('firstname'),
					'lastname'	=> $lastname,
					'email'	=> $this->input->post('email'),
					'login_name'=> strtolower($login_name),	
					'password' => $password,
					'date_of_birth' => $date_of_birth,
					'sex'	=> $this->input->post('sex'),
					'nationality' => $this->input->post('nationality'),
					'language' => $this->input->post('language'),
					'passenger_no' => $this->input->post('passenger_no'),
					'status' => $this->input->post('status'),
					'created_at' => strtotime(date('Y-m-d H:i:s'))
				);

				$this->guests_model->insertGuest($insert_data);
				
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Guest added to the voyage '.$voyage_id));
				redirect_admin('guests/editGuest/'.$voyage_id.'/'.$guest_id);
		}	

		$this->outputData['voyage_id'] 		= $voyage_id;
		$this->outputData['countries']		= $this->locations_model->getCountries(array('status' => 'A'));
		$this->outputData['languages']		= $this->languages_model->getLanguages(array('status' => 'A'));
		$this->outputData['main_content'] 	= 'admin/voyage_management/guests/addGuest';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function editGuest($voyage_id,$guest_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_guests'))
			redirect('admin_access_denied');
		
		
		if(empty($voyage_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage Id.'));
			redirect_admin('voyage/manageVoyages');	
		}		
			
		if(empty($guest_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Guest Id'));
			redirect_admin('guests/manageGuests/'.$voyage_id);	
		}
		
		//Check Guest exist or not
		$condition = array('voyage_id' => $voyage_id, 'guest_id' => $guest_id);
		$check_guest_exists = $this->guests_model->checkGuestExists($condition);	
		if($check_guest_exists == 0)
		{
			redirect('admin_access_denied');
		}	

		if($this->input->post())
		{
				//Find login name
				$lastname 		= $this->input->post('lastname');
				$date_of_birth	= $this->input->post('date_of_birth');
				
				$dob = explode("-",$date_of_birth);
				$dob1= $dob[2].$dob[1].$dob[0];
				
				$login_name = $lastname.$dob1;
				
				//Check the guest already exists or not
				$condition=array(
					'voyage_id'	=> $voyage_id,
					'guest_id !=' => $guest_id,
					'login_name'=> $login_name
				);
			
				$check_guest_exist = $this->guests_model->checkGuestExists($condition);
						
				if($check_guest_exist > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Guest already exists.'));
					redirect_admin('guests/editGuest/'.$voyage_id.'/'.$guest_id);
				}				
				
				$update_data=array(
					'firstname' => $this->input->post('firstname'),
					'lastname'	=> $lastname,
					'email'	=> $this->input->post('email'),
					'login_name'=> strtolower($login_name),	
					'date_of_birth' => $date_of_birth,
					'sex'	=> $this->input->post('sex'),
					'nationality' => $this->input->post('nationality'),
					'language' => $this->input->post('language'),
					'passenger_no' => $this->input->post('passenger_no'),
					'status' => $this->input->post('status'),
					'updated_at' => strtotime(date('Y-m-d H:i:s'))
				);
				
				//Generate Password
				$general_setting = getGeneralSettings();
				$guest_password_scheme = $general_setting->guest_password_scheme;
				if($guest_password_scheme == "FCI")
				{
					$update_data['password'] = $login_name.$this->input->post('passenger_no');	
				}
							
				$update_cond=array(
					'guest_id'	=>	$guest_id
				);
					
				$this->guests_model->updateGuest($update_data,$update_cond);
				
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
				redirect_admin('guests/editGuest/'.$voyage_id.'/'.$guest_id);
		}
		
		$this->outputData['guest']	= $this->guests_model->getGuestById($guest_id);
		$this->outputData['countries']		= $this->locations_model->getCountries(array('status' => 'A'));
		$this->outputData['languages']		= $this->languages_model->getLanguages(array('status' => 'A'));
		$this->outputData['main_content'] 	= 'admin/voyage_management/guests/editGuest';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function importGuests($voyage_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_guests'))
			redirect('admin_access_denied');
			
		if(empty($voyage_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage id.'));
			redirect_admin('voyage/manageVoayges');	
		}	
		
		//Check Voyage exist or not
		$condition = array('voyage_id' => $voyage_id);
		$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
		if($check_voyage_exists == 0)
		{
			redirect('admin_access_denied');
		}	
		
		if($this->input->post('import'))
		{
			ini_set('memory_limit', '1000000000M');
			ini_set('upload_max_filesize', '1000000000M');
			ini_set('post_max_size', '10000000000M');
			ini_set('max_input_time', 300000000000);
			ini_set('max_execution_time', 3000000000);
			
			$this->load->library('csvreader');

			$input_guests_csv = $_FILES['input_guests_csv']['tmp_name'];
			$results =   $this->csvreader->parse_file($input_guests_csv);
			
			
			//Find guest_numeric_id and guest id
			$guests = $this->db->query("SELECT max(guest_numeric_id) as max_guest_numeric_id FROM ?:guests where voyage_id='".$voyage_id."'");
			
			if($guests->num_rows() > 0)
			{
				$guest_numeric_id = $guests->row()->max_guest_numeric_id;
				$guest_numeric_id++;
			}
			else
			{
				$guest_numeric_id = 1;
				
			}
			
			foreach($results as $result)
			{
			
				if(!empty($result['lastname']) && !empty($result['date_of_birth']) && !empty($result['passenger_no']))
				{
					//Find login name
					$lastname 		= $result['lastname'];
					$date_of_birth	= $result['date_of_birth'];
					
					$dob = explode("-",$date_of_birth);
					$dob1= $dob[2].$dob[1].$dob[0];
					
					$login_name = $lastname.$dob1;
					
					//Check the guest already exists or not
					$condition=array(
						'voyage_id'	=> $voyage_id,
						'login_name'=> $login_name
					);
				
					$check_guest_exist = $this->guests_model->checkImportGuestExists($condition);
						
					if($check_guest_exist->num_rows() == 0)
					{
						//Find guest_numeric_id and guest id
						$guest_id = $voyage_id."-GU".$guest_numeric_id;
						
						//Generate Password
						$general_setting = getGeneralSettings();
						$guest_password_scheme = $general_setting->guest_password_scheme;
						if($guest_password_scheme == "FCI")
						{
							$password = $login_name.$result['passenger_no'];	
						}
						else
						{
							$password = $login_name.getRandomString(8);
						}
						
						$insert_data=array(
							'guest_id'	=> $guest_id,
							'guest_numeric_id' => $guest_numeric_id,
							'voyage_id'	=> $voyage_id,
							'firstname' => $result['firstname'],
							'lastname'	=> $result['lastname'],
							'email'	=> (is_valid_email($result['email']))?$result['email']:"",
							'login_name'=> strtolower($login_name),	
							'password' => $password,
							'date_of_birth' => $date_of_birth,
							'sex'	=> $result['sex'],
							'nationality' => $result['nationality'],
							'language' => strtolower($result['language']),
							'billing_no' => $result['billing_no'],
							'passenger_no' => $result['passenger_no'],
							'booking_no' => $result['booking_no'],
							'cabin_no' => $result['cabin_no'],
							'ship_card_no' => $result['ship_card_no'],
							'embark_date' => getTimeStamp($result['embark_date']),
							'debark_date' => getTimeStamp($result['debark_date']),
							'title' => $result['title'],
							'passport_no' => $result['passport_no'],
							'passport_expire' => getTimeStamp($result['passport_expire']),
							'passport_issued' => getTimeStamp($result['passport_issued']),
							'status' => 'A',
							'created_at' => strtotime(date('Y-m-d H:i:s'))
						);
		
						$this->guests_model->insertGuest($insert_data);
						
						$guest_numeric_id++;
					}
					else
					{ 	
						/*
						$guest = $check_guest_exist->row();
						$guest_id = $guest->guest_id;
						
						$update_data=array(
							'voyage_id'	=> $voyage_id,
							'firstname' => $result['firstname'],
							'lastname'	=> $result['lastname'],
							'email'	=> $result['email'],
							'date_of_birth' => $date_of_birth,
							'sex'	=> $result['sex'],
							'nationality' => $result['nationality'],
							'language' => $result['language'],
							'billing_no' => $result['billing_no'],
							'passenger_no' => $result['passenger_no'],
							'booking_no' => $result['booking_no'],
							'cabin_no' => $result['cabin_no'],
							'ship_card_no' => $result['ship_card_no'],
							'embark_date' => getTimeStamp($result['embark_date']),
							'debark_date' => getTimeStamp($result['debark_date']),
							'title' => $result['title'],
							'passport_no' => $result['passport_no'],
							'passport_expire' => getTimeStamp($result['passport_expire']),
							'passport_issued' => getTimeStamp($result['passport_issued']),
							'status' => 'A',
							'updated_at' => strtotime(date('Y-m-d H:i:s'))
						);
						
						$update_cond=array(
							'guest_id'	=>	$guest_id
						);
							
						$this->guests_model->updateGuest($update_data,$update_cond);
						*/	
					}				
				}
			}	
			
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Guests imported successfully.'));
			redirect_admin('guests/manageGuests/'.$voyage_id);
		}
		
		$this->outputData['voyage_id'] 		= $voyage_id;
		$this->outputData['main_content'] 	= 'admin/voyage_management/guests/importGuests';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function deleteGuest($voyage_id,$guest_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_guests'))
			redirect('admin_access_denied');
		
		//Check Guest exist or not
		$condition = array('voyage_id' => $voyage_id, 'guest_id' => $guest_id);
		$check_guest_exists = $this->guests_model->checkGuestExists($condition);	
		if($check_guest_exists == 0)
		{
			redirect('admin_access_denied');
		}	

		$condition = array(
			'guest_id'	=>	$guest_id
		);
		
		$this->guests_model->deleteGuest($condition);
		
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Guest removed successfully.'));
		redirect_admin('guests/manageGuests/'.$voyage_id);
	}
	
	function deleteAllGuests($voyage_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_guests'))
			redirect('admin_access_denied');
		
		//Check Guest exist or not
		$condition = array('voyage_id' => $voyage_id);
		$check_guest_exists = $this->guests_model->checkGuestExists($condition);	
		if($check_guest_exists == 0)
		{
			redirect('admin_access_denied');
		}	

		$condition = array(
			'voyage_id'	=>	$voyage_id
		);
		
		$this->guests_model->deleteGuest($condition);
		
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','All Guests removed successfully.'));
		redirect_admin('guests/manageGuests/'.$voyage_id);
	}
}


/* End of file Guests.php */
/* Location: ./system/application/controllers/admin/Guests.php */
?>