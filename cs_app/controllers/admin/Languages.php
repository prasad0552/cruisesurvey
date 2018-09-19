<?php 

class Languages extends CI_Controller {
	
	public $outputData;		
	 
	function __construct() 
	{
        parent::__construct();
    }
	
	function index()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		redirect_admin('languages/manageLanguages');	
	}
	
	/* Languages */
	function manageLanguages()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('view_languages'))
			redirect('admin_access_denied');	

		$this->outputData['languages']		= $this->languages_model->getLanguages();
		$this->outputData['main_content'] 	= 'admin/languages/manageLanguages';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function addLanguage()
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_languages'))
			redirect('admin_access_denied');	

		if($this->input->post())
		{
				//Check the language name already exists or not
				$condition=array(
					'language_name'	=> $this->input->post('language_name')
				);
			
				$check_language_name = $this->languages_model->checkLanguageExists($condition);
						
				if($check_language_name > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Language name already exists.'));
					redirect_admin('languages/addLanguage');
				}
				
				$condition=array(
					'language_code'	=> strtolower($this->input->post('language_code'))
				);
			
				$check_language_code = $this->languages_model->checkLanguageExists($condition);
						
				if($check_language_code > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Language Code already exists.'));
					redirect_admin('languages/addLanguage');
				}
				
							
				$insert_data=array(
					'language_code' => strtolower($this->input->post('language_code')),
					'language_name' => $this->input->post('language_name'),
					'status'		=> $this->input->post('status')
				);

				$language_id = $this->languages_model->insertLanguage($insert_data);
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Language was added.'));
				redirect_admin('languages/editLanguage/'.$language_id);
		}	

		$this->outputData['main_content'] 	= 'admin/languages/addLanguage';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function editLanguage($language_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_languages'))
			redirect('admin_access_denied');	
			
		if(empty($language_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Language id.'));
			redirect_admin('languages/manageLanguages');	
		}	
		
		//Check the Language name already exists or not
		$condition=array(
			'language_id'=> $language_id
		);
		$check_language_name = $this->languages_model->checkLanguageExists($condition);
		if($check_language_name == 0)
		{
			redirect('admin_access_denied');
		}
		
		if($this->input->post())
		{
				//Check the Language name already exists or not
				$condition=array(
					'language_id != '=> $language_id,
					'language_name'	=> $this->input->post('language_name')
				);
			
				$check_language_name = $this->languages_model->checkLanguageExists($condition);
						
				if($check_language_name > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Language name already exists.'));
					redirect_admin('languages/addLanguage');
				}
				
				$condition=array(
					'language_id != '=> $language_id,
					'language_code'	=> strtolower($this->input->post('language_code'))
				);
			
				$check_language_code = $this->languages_model->checkLanguageExists($condition);
						
				if($check_language_code > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Language Code already exists.'));
					redirect_admin('languages/addLanguage');
				}
			
				$update_data=array(
					'language_code' => strtolower($this->input->post('language_code')),
					'language_name' => $this->input->post('language_name'),
					'status'		=> $this->input->post('status')
				);
				
							
				$update_cond=array(
					'language_id'	=>	$language_id
				);
					
				$this->languages_model->updateLanguage($update_data,$update_cond);
				
				$this->session->set_userdata('active_tab','general-content');
				
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
				redirect_admin('languages/editLanguage/'.$language_id);
		}
		
		$this->outputData['language']		= $this->languages_model->getLanguageById($language_id);
		$this->outputData['main_content'] 	= 'admin/languages/editLanguage';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function deleteLanguage($language_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_languages'))
			redirect('admin_access_denied');
		
		//Check the Language name already exists or not
		$condition=array(
			'language_id'=> $language_id
		);
		$check_language_name = $this->languages_model->checkLanguageExists($condition);
		if($check_language_name == 0)
		{
			redirect('admin_access_denied');
		}		
			
		$condition = array(
			'language_id'	=>	$language_id
		);
		
		$this->languages_model->deleteLanguage($condition);
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Language was deleted successfully.'));
		redirect_admin('languages/manageLanguages');
	}
	
	function updateLanguageStatus()
	{
		if(!isAuthorizedAdmin('manage_languages'))
		{
			$data['status'] = "error";
			echo json_encode($data); exit;
		}	
			
		$language_id= $this->input->post('language_id');
		$status		= $this->input->post('status');
		if($language_id !="" && $status!="")
		{	
			$update_data	= array(
								'status' 			=> $status
								);
			
			$update_cond	= array('language_id' => $language_id);
			
			$this->languages_model->updateLanguage($update_data,$update_cond);
			
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
	
	
	/* Languages */
	function manageLanguageValues()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('view_language_values'))
			redirect('admin_access_denied');	
		
		if($this->session->userdata('selected_language'))
		{
			$selected_language = $this->session->userdata('selected_language');
		}	
		else
		{
			$selected_language = "en";
		}
			
		if($this->input->post('language'))
		{
			$selected_language = $this->input->post('language');
			$this->session->set_userdata('selected_language',$selected_language);
			
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Language has changed.'));
			redirect_admin('languages/manageLanguageValues');
		}
		
		if($this->input->post('save'))
		{
			$selected_language = $this->input->post('language_code');
			$this->session->set_userdata('selected_language',$selected_language);
			
			$language_code	 = $this->input->post('language_code');
			$language_values = $this->input->post('language_values');

			if(!empty($language_code) && count($language_values) > 0)
			{
				foreach($language_values as $language_value)
				{
					$update_data=array(
						'value' => $language_value['value']
					);
					
								
					$update_cond=array(
						'language_code'	=>	$language_code,
						'variable_name'	=> 	$language_value['variable_name']
					);
						
					$this->languages_model->updateLanguageValue($update_data,$update_cond);
				}	
			}
			
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
			redirect_admin('languages/manageLanguageValues');
		}
		
		if($this->input->post('delete_selected'))
		{
			$selected_language = $this->input->post('language_code');
			$this->session->set_userdata('selected_language',$selected_language);
			
			$language_code	 = $this->input->post('language_code');
			$language_delete = $this->input->post('language_delete');
			
				foreach($language_delete as $language)
				{
					$condition = array(
						'variable_name'	=>	$language['variable_name']
					);
			
					$this->languages_model->deleteLanguageValue($condition);
				}
			
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
			redirect_admin('languages/manageLanguageValues');
		}	

		$this->outputData['selected_language']		= $selected_language;
		
		$params = array('status' => 'A');
		$this->outputData['languages']		= $this->languages_model->getLanguages($params);
		
		$params = array('language_code' => $selected_language);
		$this->outputData['language_values']= $this->languages_model->getLanguageValues($params);
		$this->outputData['main_content'] 	= 'admin/languages/manageLanguageValues';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function addLanguageValue()
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_language_values'))
			redirect('admin_access_denied');	

		if($this->input->post())
		{
				$language_code = $this->input->post('language_code');
				$variable_name = getSlug($this->input->post('variable_name'));
				
				if(!isSlug($variable_name))
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Language variable.'));
					redirect_admin('languages/manageLanguages');
				}
				
				//Check the language variable already exists or not
				$condition=array(
					'language_code' => $language_code,
					'variable_name'	=> $variable_name,
				);
			
				$check_variable_name = $this->languages_model->checkLanguageValueExists($condition);
						
				if($check_variable_name > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Language variable already exists.'));
					redirect_admin('languages/manageLanguageValues');
				}
				
				$type = $this->input->post('type');
				addLanguageValues($variable_name,$this->input->post('value'),$type);			

				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Language value was added.'));
				redirect_admin('languages/manageLanguageValues');
		}	
	}
	
	function deleteLanguageValue($variable_name)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_languages'))
			redirect('admin_access_denied');	
			
		$condition = array(
			'variable_name'	=>	$variable_name
		);
		
		$this->languages_model->deleteLanguageValue($condition);
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Language value was deleted successfully.'));
		redirect_admin('languages/manageLanguageValues');
	}
	
	function importTranslations()
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_language_values'))
			redirect('admin_access_denied');
				
		if($this->input->post())
		{
		
			$language_code = $this->input->post('language_code');
			
			if(empty($language_code))
			{
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Language Code'));
				redirect_admin('languages/importTranslations');
			}
			
			ini_set('memory_limit', '1000000000M');
			ini_set('upload_max_filesize', '1000000000M');
			ini_set('post_max_size', '10000000000M');
			ini_set('max_input_time', 300000000000);
			ini_set('max_execution_time', 3000000000);
			
			$this->load->library('csvreader');

			$input_translations_csv = $_FILES['input_translations_csv']['tmp_name'];
			$results =   $this->csvreader->parse_file($input_translations_csv);
			
			foreach($results as $result)
			{
				if(!empty($result['variable_name']) && !empty($result['translation']))
				{	
					$update_data=array(
						'value' => $result['translation']
					);
					
								
					$update_cond=array(
						'language_code'	=>	$language_code,
						'variable_name'	=> 	$result['variable_name']
					);
						
					$this->languages_model->updateLanguageValue($update_data,$update_cond);
				}
			}	
			
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Translation imported successfully.'));
			redirect_admin('languages/importTranslations');
		}
		
		$params = array('status' => 'A');
		$this->outputData['languages']		= $this->languages_model->getLanguages($params);
		
		$this->outputData['main_content'] 	= 'admin/languages/importTranslations';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	
	function exportTranslations()
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_language_values'))
			redirect('admin_access_denied');
		
		
		if($this->input->post()) 
		{			
			$language_code = $this->input->post('language_code');
			
			if(empty($language_code))
			{
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Language Code'));
				redirect_admin('languages/exportTranslations');
			}
			
			$params = array('language_code' => $language_code);
			$language_values = $this->languages_model->getLanguageValues($params); 
			
			if($language_values->num_rows() == 0)
			{
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','No Translations found!'));
				redirect_admin('languages/exportTranslations');
			}
			
			$language_values_csv[] = array ('variable_name','current_value','translation');
			foreach($language_values->result() as $language_value)
			{
			
				$language_values_csv[] = array(
									$language_value->variable_name,
									$language_value->value,
									'',
					);
			}
	
			$cur_date = date('d-m-Y');
			echo array_to_csv($language_values_csv,'Translations-'.$language_code.'.csv');
			exit;
		}
		
		$params = array('status' => 'A');
		$this->outputData['languages']		= $this->languages_model->getLanguages($params);
		
		$this->outputData['main_content'] 	= 'admin/languages/exportTranslations';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
}


/* End of file languages.php */
/* Location: ./system/application/controllers/admin/langauages.php */
?>