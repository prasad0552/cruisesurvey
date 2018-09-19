<?php 

class Surveys extends CI_Controller {
	
	public $outputData;		
	 
	function __construct() 
	{
        parent::__construct();
    }
	
	function index()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		redirect_admin('surveys/manageSurveys');	
	}
	
	/* Question Categories */
	function manageQuestionCategories()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('view_question_categories'))
			redirect('admin_access_denied');	

		$this->outputData['question_categories'] = $this->surveys_model->getQuestionCategories();
		$this->outputData['main_content'] 	= 'admin/voyage_management/surveys/question_categories/manageQuestionCategories';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function addQuestionCategory()
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_question_categories'))
			redirect('admin_access_denied');	

		if($this->input->post())
		{
				//Check the Question Catgory already exists or not
				$condition=array(
					'category'=> $this->input->post('category')
				);
			
				$check_category_exist = $this->surveys_model->checkQuestionCategoryExists($condition);
						
				if($check_category_exist > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Category already exists.'));
					redirect_admin('surveys/addQuestionCategory');
				}
				
				$variable_name = getSlug($this->input->post('category'));
							
				$insert_data=array(
					'category' => $this->input->post('category'),
					'language_variable' => $variable_name,
					'status' => $this->input->post('status')
				);

				$category_id = $this->surveys_model->insertQuestionCategory($insert_data);
				
				//Add Language Values
				addLanguageValues($variable_name,$this->input->post('category'));
				
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Question Category was created.'));
				redirect_admin('surveys/editQuestionCategory/'.$category_id);
		}	

		$this->outputData['main_content'] 	= 'admin/voyage_management/surveys/question_categories/addQuestionCategory';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function editQuestionCategory($category_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_question_categories'))
			redirect('admin_access_denied');	
			
		if(empty($category_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Question Category.'));
			redirect_admin('surveys/manageQuestionCategories');	
		}
		
		//Check the Category id exists or not
		$condition=array(
			'category_id'=> $category_id
		);
	
		$check_category_exist = $this->surveys_model->checkQuestionCategoryExists($condition);
				
		if($check_category_exist == 0)
		{
			redirect('admin_access_denied');	
		}	

		if($this->input->post())
		{
				//Check the Country name already exists or not
				$condition=array(
					'category_id != '=> $category_id,
					'category'=> $this->input->post('category')
				);
			
				$check_category_exist = $this->surveys_model->checkQuestionCategoryExists($condition);
						
				if($check_category_exist > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Question Category already exists.'));
					redirect_admin('surveys/editQuestionCategory/'.$category_id);
				}
				
				$variable_name = getSlug($this->input->post('category'));
				
				$update_data=array(
					'category' => $this->input->post('category'),
					'language_variable' => $variable_name,
					'status' => $this->input->post('status'),
				);
				
							
				$update_cond=array(
					'category_id'	=>	$category_id
				);
					
				$this->surveys_model->updateQuestionCategory($update_data,$update_cond);
				
				//Add Language Values
				addLanguageValues($variable_name,$this->input->post('category'));
				
				$this->session->set_userdata('active_tab','general-content');
				
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
				redirect_admin('surveys/editQuestionCategory/'.$category_id);
		}
		
		$this->outputData['question_category']	= $this->surveys_model->getQuestionCategoryById($category_id);
		$this->outputData['main_content'] 	= 'admin/voyage_management/surveys/question_categories/editQuestionCategory';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function importQuestionCategories()
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_question_categories'))
			redirect('admin_access_denied');
			
		if($this->input->post('import'))
		{
			ini_set('memory_limit', '1000000000M');
			ini_set('upload_max_filesize', '1000000000M');
			ini_set('post_max_size', '10000000000M');
			ini_set('max_input_time', 300000000000);
			ini_set('max_execution_time', 3000000000);
			
			$this->load->library('csvreader');

			$input_question_categories_csv = $_FILES['input_question_categories_csv']['tmp_name'];
			$results =   $this->csvreader->parse_file($input_question_categories_csv);
			
			foreach($results as $result)
			{
				if(!empty($result['category']))
				{
					//Check the Question Catgory already exists or not
					$condition=array(
						'category'=> $result['category']
					);
				
					$check_category_exist = $this->surveys_model->checkQuestionCategoryExists($condition);
							
					if($check_category_exist == 0)
					{
						$variable_name = getSlug($result['category']);
	
						$insert_data=array(
							'category' => $result['category'],
							'language_variable' => $variable_name
						);
		
						$category_id = $this->surveys_model->insertQuestionCategory($insert_data);
						
						//Add Language Values
						addLanguageValues($variable_name,$result['category']);
					}				
				}
			}	
			
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Question Categories imported successfully.'));
			redirect_admin('surveys/manageQuestionCategories/');
		}
		
		$this->outputData['main_content'] 	= 'admin/voyage_management/surveys/question_categories/importQuestionCategories';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function deleteQuestionCategory($category_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_question_categories'))
			redirect('admin_access_denied');
			
		//Check the Category id exists or not
		$condition=array(
			'category_id'=> $category_id
		);
	
		$check_category_exist = $this->surveys_model->checkQuestionCategoryExists($condition);
				
		if($check_category_exist == 0)
		{
			redirect('admin_access_denied');	
		}		
		
		/*
		//Delete Language Values	
		$question_category	= $this->surveys_model->getQuestionCategoryById($category_id);		
		

		$condition = array(
			'variable_name'	=>	$question_category->language_variable
		);
		
		$this->languages_model->deleteLanguageValue($condition);
		*/
			
		$condition = array(
			'category_id'	=>	$category_id
		);
		
		$this->surveys_model->deleteQuestionCategory($condition);
		
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Category was deleted successfully.'));
		redirect_admin('surveys/manageQuestionCategories');
	}
	
	/* Default Templates */
	function manageSurveyDefaultTemplates()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('view_survey_default_templates'))
			redirect('admin_access_denied');	

		$this->outputData['survey_default_templates'] = $this->surveys_model->getSurveyDefaultTemplates();
		$this->outputData['main_content'] 	= 'admin/voyage_management/surveys/default_templates/manageSurveyDefaultTemplates';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function addSurveyDefaultTemplate()
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_survey_default_templates'))
			redirect('admin_access_denied');	

		if($this->input->post())
		{
				//Check the Template Name already exists or not
				$condition=array(
					'template_name'=> $this->input->post('template_name')
				);
			
				$check_template_exist = $this->surveys_model->checkSurveyDefaultTemplateExists($condition);
						
				if($check_template_exist > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Template Name already exists.'));
					redirect_admin('surveys/addSurveyDefaultTemplate');
				}
							
				ini_set('memory_limit', '1000000000M');
				ini_set('upload_max_filesize', '1000000000M');
				ini_set('post_max_size', '10000000000M');
				ini_set('max_input_time', 300000000000);
				ini_set('max_execution_time', 3000000000);
				
				$this->load->library('csvreader');
	
				$input_default_template_questions_csv = $_FILES['input_default_template_questions_csv']['tmp_name'];
				$results =   $this->csvreader->parse_file($input_default_template_questions_csv);
				
				if(count($results) == 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Please upload valid input file'));
					redirect_admin('surveys/addSurveyDefaultTemplate');
				}
				
				//Check category id exists or not
				foreach($results as $result)
				{
					if(!empty($result['category_id']))
					{
					
						$condition = array('category_id' => $result['category_id']);
						$check_question_category = $this->surveys_model->checkQuestionCategoryExists($condition);
						if($check_question_category == 0)
						{
							$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Question category id.'.$result['category_id'].' not exists.'));
							redirect_admin('surveys/addSurveyDefaultTemplate');
						}
					}
				}
				
				
				//Upload csv file
				if($this->input->post('template_name') != "")
				{
					$uploading_file_name = url_title(convert_accented_characters(strip_tags(trim($this->input->post('template_name')))), 'dash', true);
				}
				else
				{
					$uploading_file_name = url_title(convert_accented_characters(strip_tags(trim($this->input->post('template_name')))), 'dash', true);
				}
									
				$config['allowed_types'] = 'csv';
				$config['upload_path'] 	= 'files/survey_default_templates/';
				$config['file_name']	= $uploading_file_name;
				
				if (!is_dir($config['upload_path'])) {
						mkdir($config['upload_path'], 0777, TRUE);
				}
				
				$this->upload->initialize($config);
				if(!empty($_FILES['input_default_template_questions_csv']['name']))
				{
					if($this->upload->do_upload('input_default_template_questions_csv'))
					{
						$template_file = $this->upload->data('file_name');
					}
				}
				
				
				$insert_data=array(
					'template_name' => $this->input->post('template_name'),
					'template_file' => $template_file,
					'status' => $this->input->post('status')
				);

				$template_id = $this->surveys_model->insertSurveyDefaultTemplate($insert_data);
				
				//Import Default template Questions
				$section_id =0;
				foreach($results as $result)
				{
					//Insert Section
					if(!empty($template_id) && !empty($result['category_id']))
					{
						$section_id = $section_id + 1;
						
						$category_id = $result['category_id'];
												
						//Get Section ID
						$question_category = $this->surveys_model->getQuestionCategoryByID($category_id);
						$insert_data = array(
										'template_id' => $template_id,
										'section_id'  => $section_id,
										'category_id' => $category_id,
										'category' => $question_category->category,
										'language_variable' => $question_category->language_variable
										);
						$this->surveys_model->insertSurveyDefaultSection($insert_data);
						
						
						$question_id = 0;
						
					}
					
					//Insert Questions
					if(!empty($template_id) && !empty($section_id) && !empty($result['question']) && !empty($result['question_type']))
					{
						$question_id = $question_id + 1;
						
						$variable_name = getSlug($result['question']);
						$insert_data = array(
											'template_id' => $template_id,
											'section_id' => $section_id,
											'question_id' => $question_id,
											'question' => $result['question'],
											'language_variable' => $variable_name,
											'question_type' => $result['question_type']
										);
						$this->surveys_model->insertSurveyDefaultQuestion($insert_data);
						
						//Add Language Values
						addLanguageValues($variable_name,$result['question']);
						
						if($result['question_type'] == "RATING")
						{
									$options = array('Excellent','Very Good','Good','Fair','Poor','N/A');
									$option_id = 1;
									foreach($options as $option)
									{
										$variable_name = getSlug($option);
										$insert_data = array(
											'template_id' => $template_id,
											'section_id' => $section_id,
											'question_id' => $question_id,
											'option_id' => $option_id,
											'option_name' => $option,
											'language_variable' => $variable_name,

										);
										$this->surveys_model->insertSurveyDefaultQuestionOption($insert_data);
										
										//Add Language Values
										addLanguageValues($variable_name,$option);
										$option_id++;
									}
						}
						
						
						$option_id = 0;				
					}
					
					//Insert Options
					if(!empty($template_id) && !empty($section_id) && !empty($question_id) && !empty($result['option']))
					{
						$option_id = $option_id + 1;
						
						$variable_name = getSlug($result['option']);
						$insert_data = array(
							'template_id' => $template_id,
							'section_id' => $section_id,
							'question_id' => $question_id,
							'option_id' => $option_id,
							'option_name' => $result['option'],
							'language_variable' => $variable_name

						);
						$this->surveys_model->insertSurveyDefaultQuestionOption($insert_data);
						
						//Add Language Values
						addLanguageValues($variable_name,$result['option']);
						
					}
			
				}
				
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Default Template was created.'));
				redirect_admin('surveys/editSurveyDefaultTemplate/'.$template_id);
		}	

		$this->outputData['main_content'] 	= 'admin/voyage_management/surveys/default_templates/addSurveyDefaultTemplate';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function editSurveyDefaultTemplate($template_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_survey_default_templates'))
			redirect('admin_access_denied');	
			
		if(empty($template_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Template.'));
			redirect_admin('surveys/manageSurveyDefaultTemplates');	
		}
		
		//Check the Template id exists or not
		$condition=array(
			'template_id'=> $template_id
		);

		$check_template_exist = $this->surveys_model->checkSurveyDefaultTemplateExists($condition);
				
		if($check_template_exist == 0)
		{
			redirect('admin_access_denied');	
		}	

		if($this->input->post())
		{
				//Check the Template Name already exists or not
				$condition=array(
					'template_id != '=> $template_id,
					'template_name'=> $this->input->post('template_name')
				);

				$check_template_exist = $this->surveys_model->checkSurveyDefaultTemplateExists($condition);
						
				if($check_template_exist > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Template Name already exists.'));
					redirect_admin('surveys/editSurveyDefaultTemplate/'.$category_id);
				}
				
				//Upload csv file
				if($this->input->post('template_name') != "")
				{
					$uploading_file_name = url_title(convert_accented_characters(strip_tags(trim($this->input->post('template_name')))), 'dash', true);
				}
				else
				{
					$uploading_file_name = url_title(convert_accented_characters(strip_tags(trim($this->input->post('template_name')))), 'dash', true);
				}
									
				$config['allowed_types'] = 'csv';
				$config['upload_path'] 	= 'files/survey_default_templates/';
				$config['file_name']	= $uploading_file_name;
				
				if (!is_dir($config['upload_path'])) {
						mkdir($config['upload_path'], 0777, TRUE);
				}
				
				$this->upload->initialize($config);
				if(!empty($_FILES['input_default_template_questions_csv']['name']))
				{
					if($this->input->post('uploaded_template_file'))
					{
						unlink(FCPATH. 'files/survey_default_templates/'.$this->input->post('uploaded_template_file'));
					}
					if($this->upload->do_upload('input_default_template_questions_csv'))
					{
						$template_file = $this->upload->data('file_name');
					}
				}
				else
				{
					$template_file = $this->input->post('uploaded_template_file');
				}
				
				$update_data=array(
					'template_name' => $this->input->post('template_name'),
					'template_file' => $template_file,
					'status' => $this->input->post('status')
				);
				
							
				$update_cond=array(
					'template_id'	=>	$template_id
				);
					
				$this->surveys_model->updateSurveyDefaultTemplate($update_data,$update_cond);
				
				ini_set('memory_limit', '1000000000M');
				ini_set('upload_max_filesize', '1000000000M');
				ini_set('post_max_size', '10000000000M');
				ini_set('max_input_time', 300000000000);
				ini_set('max_execution_time', 3000000000);
				
				$this->load->library('csvreader');
	
				$input_default_template_questions_csv = $_FILES['input_default_template_questions_csv']['tmp_name'];
				$results =   $this->csvreader->parse_file($input_default_template_questions_csv);
				
				if(count($results) > 0)
				{
					
				//Check category id exists are not
				foreach($results as $result)
				{
					if(!empty($result['category_id']))
					{
					
						$condition = array('category_id' => $result['category_id']);
						$check_question_category = $this->surveys_model->checkQuestionCategoryExists($condition);
						if($check_question_category == 0)
						{
							$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Question category id.'.$result['category_id'].' not exists.'));
							redirect_admin('surveys/addSurveyDefaultTemplate');
						}
					}
				}
				
				
				$condition = array(
					'template_id'	=>	$template_id
				);
				
				$this->surveys_model->deleteSurveyDefaultSection($condition);
				$this->surveys_model->deleteSurveyDefaultQuestion($condition);
				$this->surveys_model->deleteSurveyDefaultQuestionOption($condition);
				
				//Import Default template Questions
				$section_id =0;
				foreach($results as $result)
				{
					//Insert Section
					if(!empty($template_id) && !empty($result['category_id']))
					{
						$section_id = $section_id + 1;
						
						$category_id = $result['category_id'];
												
						//Get Section ID
						$question_category = $this->surveys_model->getQuestionCategoryByID($category_id);
						$insert_data = array(
										'template_id' => $template_id,
										'section_id'  => $section_id,
										'category_id' => $category_id,
										'category' => $question_category->category,
										'language_variable' => $question_category->language_variable
										);
						$this->surveys_model->insertSurveyDefaultSection($insert_data);
						
						
						$question_id = 0;
						
					}
					
					//Insert Questions
					if(!empty($template_id) && !empty($section_id) && !empty($result['question']) && !empty($result['question_type']))
					{
						$question_id = $question_id + 1;
						
						$variable_name = getSlug($result['question']);
						$insert_data = array(
											'template_id' => $template_id,
											'section_id' => $section_id,
											'question_id' => $question_id,
											'question' => $result['question'],
											'language_variable' => $variable_name,
											'question_type' => $result['question_type']
										);
						$this->surveys_model->insertSurveyDefaultQuestion($insert_data);
						
						//Add Language Values
						addLanguageValues($variable_name,$result['question']);
						
						if($result['question_type'] == "RATING")
						{
									$options = array('Excellent','Very Good','Good','Fair','Poor','N/A');
									$option_id = 1;
									foreach($options as $option)
									{
										$variable_name = getSlug($option);
										$insert_data = array(
											'template_id' => $template_id,
											'section_id' => $section_id,
											'question_id' => $question_id,
											'option_id' => $option_id,
											'option_name' => $option,
											'language_variable' => $variable_name,

										);
										$this->surveys_model->insertSurveyDefaultQuestionOption($insert_data);
										
										//Add Language Values
										addLanguageValues($variable_name,$option);
										$option_id++;
									}
						}
						
						
						$option_id = 0;				
					}
					
					//Insert Options
					if(!empty($template_id) && !empty($section_id) && !empty($question_id) && !empty($result['option']))
					{
						$option_id = $option_id + 1;
						
						$variable_name = getSlug($result['option']);
						$insert_data = array(
							'template_id' => $template_id,
							'section_id' => $section_id,
							'question_id' => $question_id,
							'option_id' => $option_id,
							'option_name' => $result['option'],
							'language_variable' => $variable_name

						);
						$this->surveys_model->insertSurveyDefaultQuestionOption($insert_data);
						
						//Add Language Values
						addLanguageValues($variable_name,$result['option']);
						
					}
			
				}
				
				}
				
				$this->session->set_userdata('active_tab','general-content');
				
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
				redirect_admin('surveys/editSurveyDefaultTemplate/'.$template_id);
		}
		
		$this->outputData['survey_default_template']	= $this->surveys_model->getSurveyDefaultTemplateById($template_id);
		$this->outputData['main_content'] 	= 'admin/voyage_management/surveys/default_templates/editSurveyDefaultTemplate';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function deleteSurveyDefaultTemplate($template_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_survey_default_templates'))
			redirect('admin_access_denied');
		
		//Check the Template id exists or not
		$condition=array(
			'template_id'=> $template_id
		);

		$check_template_exist = $this->surveys_model->checkSurveyDefaultTemplateExists($condition);
				
		if($check_template_exist == 0)
		{
			redirect('admin_access_denied');	
		}		
		
		$survey_default_template = $this->surveys_model->getSurveyDefaultTemplateById($template_id);
		
		unlink(FCPATH. 'files/survey_default_templates/'.$survey_default_template->template_file);		
		
		$condition = array(
			'template_id'	=>	$template_id
		);
		
		$this->surveys_model->deleteSurveyDefaultTemplate($condition);
		
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Template was deleted successfully.'));
		redirect_admin('surveys/manageSurveyDefaultTemplates');
	}
	
	function downloadTemplateFile($csv_file)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_survey_default_templates'))
			redirect('admin_access_denied');
		
		if(!empty($csv_file))
		{	
				$this->load->helper('download');
				$file_path	= site_url('files/survey_default_templates/'.$csv_file);
				$data 		= file_get_contents($file_path); // Read the file's contents
				force_download($csv_file, $data);	
		}
	}
	
	
	/* Surveys */
	function manageSurveys($voyage_id)
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('view_surveys'))
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
		
		$this->outputData['voyage_id'] 		= $voyage_id;
		
		$params['voyage_id'] = $voyage_id;
		$this->outputData['surveys'] = $this->surveys_model->getSurveys($params);
		$this->outputData['main_content'] 	= 'admin/voyage_management/surveys/manageSurveys';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function addSurvey($voyage_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_surveys'))
			redirect('admin_access_denied');
		
		if(empty($voyage_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage id.'));
			redirect_admin('voyage/manageVoayges');	
		}	
		
		//Check voyage exists and not closed
		$condition = array('voyage_id' => $voyage_id, 'status !=' => 'C');
		$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
		if($check_voyage_exists == 0)
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Sorry you can not add survey. Voyage closed.'));
			redirect_admin('surveys/manageSurveys/'.$voyage_id);
		}			

		if($this->input->post())
		{
				//Check the Survey already exists or not
				$condition=array(
					'voyage_id'	=> $voyage_id,
					'survey_title'=> $this->input->post('survey_title')
				);
			
				$check_survey_exist = $this->surveys_model->checkSurveyExists($condition);
						
				if($check_survey_exist > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Survey already exists.'));
					redirect_admin('surveys/addSurvey/'.$voyage_id);
				}
				
				//Find survey_numeric_id and survey id
				$surveys = $this->db->query("SELECT max(survey_numeric_id) as max_survey_numeric_id FROM ?:survey where voyage_id='".$voyage_id."'");
				
				if($surveys->num_rows() > 0)
				{
					$survey_numeric_id = $surveys->row()->max_survey_numeric_id;
					$survey_numeric_id++;
					$survey_id = $voyage_id."-SU".$survey_numeric_id;
				}
				else
				{
					$survey_numeric_id = 1;
					$survey_id = $voyage_id."-SU".$survey_numeric_id;
				}
				
				$variable_name = $uploading_file_name = getSlug($this->input->post('survey_title'));
				
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['upload_path'] 	= 'images/surveys/'.$voyage_id."/";
				$config['file_name']	= $uploading_file_name;
				
				if (!is_dir($config['upload_path'])) {
						mkdir($config['upload_path'], 0777, TRUE);
				}
				
				$this->upload->initialize($config);
				if(!empty($_FILES['survey_image']['name']))
				{
					if($this->upload->do_upload('survey_image'))
					{
						$image = $this->upload->data('file_name');
					}
				}
				else
				{
					$image="";
				}
							
				$insert_data=array(
					'voyage_id'	=> $voyage_id,
					'survey_id'	=> $survey_id,
					'survey_numeric_id' => $survey_numeric_id,
					'survey_title' => $this->input->post('survey_title'),
					'survey_image' => $image,
					'language_variable' => $variable_name,
					'survey_template_id' => $this->input->post('survey_template_id'),
					'status' => $this->input->post('status'),
					'created_at' => strtotime(date('Y-m-d H:i:s'))
				);

				$this->surveys_model->insertSurvey($insert_data);
				
				//Add Language Values
				addLanguageValues($variable_name,$this->input->post('survey_title'));
				
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Survey was created.'));
				redirect_admin('surveys/editSurvey/'.$voyage_id.'/'.$survey_id);
		}	
		
		$params = array('status' => "A");
		$this->outputData['templates'] 		= $this->surveys_model->getSurveyDefaultTemplates($params);
		$this->outputData['voyage_id'] 		= $voyage_id;
		$this->outputData['main_content'] 	= 'admin/voyage_management/surveys/addSurvey';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function editSurvey($voyage_id,$survey_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_surveys'))
			redirect('admin_access_denied');
		
		if(empty($voyage_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage Id.'));
			redirect_admin('voyage/manageVoyages');	
		}		
			
		if(empty($survey_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Survey Id'));
			redirect_admin('surveys/manageSurveys/'.$voyage_id);	
		}
		
		//Check survey exists or not
		$condition = array('voyage_id' => $voyage_id,'survey_id' => $survey_id);
		$check_survey_exists = $this->surveys_model->checkSurveyExists($condition);	
		if($check_survey_exists == 0)
		{
			redirect('admin_access_denied');
		}	
		
		if($this->input->post('update_general'))
		{
				
				//Check voyage exists and not closed
				$condition = array('voyage_id' => $voyage_id, 'status !=' => 'C');
				$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
				if($check_voyage_exists == 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Sorry you can not edit. Voyage closed.'));
					redirect_admin('surveys/editSurvey/'.$voyage_id.'/'.$survey_id);
				}
			
				//Check the survey published or not
				$params = array('voyage_id' => $voyage_id, 'survey_id' => $survey_id, 'per_page' => 1);
				$survey_report_check = $this->surveys_model->getGuestSurveyReports($params);		
				if($survey_report_check->num_rows() > 0)
				{
					$this->session->set_userdata('active_tab','general-content');
					
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Sorry, the survey was already submitted to guests. You can not edit the survey now'));
					redirect_admin('surveys/editSurvey/'.$voyage_id.'/'.$survey_id);
				}
				
				//Check the Country name already exists or not
				$condition=array(
					'voyage_id'=> $voyage_id,
					'survey_id !=' => $survey_id,
					'survey_title'=> $this->input->post('survey_title')
				);
			
				$check_survey_exist = $this->surveys_model->checkSurveyExists($condition);
						
				if($check_survey_exist > 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The Survey already exists.'));
					redirect_admin('surveys/editSurvey/'.$survey_id);
				}
				
				$variable_name = $uploading_file_name = getSlug($this->input->post('survey_title'));
				
				$config['allowed_types'] = 'jpg|jpeg|png|gif';
				$config['upload_path'] 	= 'images/surveys/'.$voyage_id."/";
				$config['file_name']	= $uploading_file_name;
				
				if (!is_dir($config['upload_path'])) {
						mkdir($config['upload_path'], 0777, TRUE);
				}
				
				$this->upload->initialize($config);
				if(!empty($_FILES['survey_image']['name']))
				{
					if($this->input->post('uploaded_survey_image'))
					{
						unlink(FCPATH. 'images/surveys/'.$voyage_id.'/'.$this->input->post('uploaded_survey_image'));
					}
					
					if($this->upload->do_upload('survey_image'))
					{
						$image = $this->upload->data('file_name');
					}
				}
				else
				{
					$image = $this->input->post('uploaded_survey_image');
				}
				
				$update_data=array(
					'survey_title' => $this->input->post('survey_title'),
					'survey_image' => $image,
					'language_variable' => $variable_name,
					'survey_template_id' => $this->input->post('survey_template_id'),
					'status' => $this->input->post('status'),
					'updated_at' => strtotime(date('Y-m-d H:i:s'))
				);
				
							
				$update_cond=array(
					'survey_id'	=>	$survey_id
				);
					
				$this->surveys_model->updateSurvey($update_data,$update_cond);

				
				//Add Language Values
				addLanguageValues($variable_name,$this->input->post('survey_title'));
				
				$this->session->set_userdata('active_tab','general-content');
				
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
				redirect_admin('surveys/editSurvey/'.$voyage_id.'/'.$survey_id);
		}
		
		if($this->input->post('save_questions'))
		{	
				$voyage_id = $this->input->post('voyage_id');
				$survey_id = $this->input->post('survey_id');
				
				//Check voyage exists and not closed
				$condition = array('voyage_id' => $voyage_id, 'status !=' => 'C');
				$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
				if($check_voyage_exists == 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Sorry you can not edit. Voyage closed.'));
					redirect_admin('surveys/editSurvey/'.$voyage_id.'/'.$survey_id);
				}
				
				//Check voyage exists and not closed
				$condition = array('voyage_id' => $voyage_id, 'survey_id' => $survey_id, 'status !=' => 'C');
				$check_voyage_exists = $this->surveys_model->checkSurveyExists($condition);	
				if($check_voyage_exists == 0)
				{
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Sorry you can not edit. Survey closed.'));
					redirect_admin('surveys/editSurvey/'.$voyage_id.'/'.$survey_id);
				}
				
				//Check the survey published or not
				$params = array('voyage_id' => $voyage_id, 'survey_id' => $survey_id, 'per_page' => 1);
				$survey_report_check = $this->surveys_model->getGuestSurveyReports($params);		
				if($survey_report_check->num_rows() > 0)
				{
					$this->session->set_userdata('active_tab','questions-content');
					
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Sorry, the survey was already submitted to guests. You can not edit the survey now'));
					redirect_admin('surveys/editSurvey/'.$voyage_id.'/'.$survey_id);
				}

				if(empty($voyage_id) || empty($survey_id))
				{
					$this->session->set_userdata('active_tab','questions-content');
					$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','The voayge/survey id is empty. Please check'));
					redirect_admin('surveys/editSurvey/'.$survey_id);
				}
				
				
				//Delete existing sections,questions and its options
				$condition = array('voyage_id' => $voyage_id, 'survey_id' => $survey_id);
				$this->surveys_model->deleteSurveySection($condition);
				$this->surveys_model->deleteSurveyQuestion($condition);
				$this->surveys_model->deleteSurveyQuestionOption($condition);
		
				$sections = $this->input->post('sections');
				
				//Sections
				$section_count = 1;
				foreach($sections as $section)
				{
					if(!empty($section['category_id'])) 
					{
						$section_id = $survey_id."-SE".$section_count;
						$question_category = $this->surveys_model->getQuestionCategoryByID($section['category_id']);
						
						$insert_data = array(
										'voyage_id' => $voyage_id,
										'survey_id' => $survey_id,
										'section_id' => $section_id,
										'section_numeric_id' => $section_count,
										'category_id' => $section['category_id'],
										'category' => $question_category->category,
										'language_variable' => $question_category->language_variable,
										'position' => $section_count,
										'status' => $section['status']
									);
						//Insert Section			
						$this->surveys_model->insertSurveySection($insert_data);
						
						//Questions
						$questions = $section['questions'];
						$question_count = 1;
						foreach($questions as $question)				
						{
							if(!empty($question['question'])) 
							{
								$question_id = $section_id."-QU".$question_count;
								$variable_name = getSlug($question['question']);
								
								$insert_data = array(
												'voyage_id' => $voyage_id,
												'survey_id' => $survey_id,
												'section_id' => $section_id,
												'question_id' => $question_id,
												'question_numeric_id' => $question_count,
												'question' => $question['question'],
												'language_variable' => $variable_name,
												'question_type' => $question['question_type'],
												'position' => $question_count,
												'status' => $question['status']		
											);
								
								//Insert Question			
								$this->surveys_model->insertSurveyQuestion($insert_data);
								
								//Add Language Values
								addLanguageValues($variable_name,$question['question']);
								
								$options = $question['options'];
								$option_count = 1;
								foreach($options as $option)			
								{
									if(!empty($option)) 
									{
										$option_id = $question_id."-OP".$option_count;
										$variable_name = getSlug($option);
										
										$insert_data = array(
														'voyage_id' => $voyage_id,
														'survey_id' => $survey_id,
														'section_id' => $section_id,
														'question_id' => $question_id,
														'option_id' => $option_id,
														'option_numeric_id' => $option_count,
														'option_name' => $option,
														'language_variable' => $variable_name	
													);
										
										//Insert Question			
										$this->surveys_model->insertSurveyQuestionOption($insert_data);
										
										//Add Language Values
										addLanguageValues($variable_name,$option);
										
										$option_count++;
									}
								}
											
								$question_count++;
							}			
						}
						
						$section_count++;				
				}
				}
				$this->session->set_userdata('active_tab','questions-content');
					
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
				redirect_admin('surveys/editSurvey/'.$voyage_id.'/'.$survey_id);
				
		}
		
		if($this->input->post('cancel_questions'))
		{
			$this->session->set_userdata('active_tab','questions-content');
			redirect_admin('surveys/editSurvey/'.$voyage_id.'/'.$survey_id);
		}
		
		if($this->session->userdata('active_tab'))
		{
			$this->outputData['active_tab']	= $this->session->userdata('active_tab');	
			$this->session->unset_userdata('active_tab');
		}
		else
		{
			$this->outputData['active_tab']	= 'general-content';
		}
		
		$survey = $this->surveys_model->getSurveyById($survey_id);	
		
		//Check the survey has questions
		$params = array('survey_id' => $survey_id);
		$survey_sections = $this->surveys_model->getSurveySections($params);
		if($survey_sections->num_rows() == 0 && $survey->status != "C")
		{
			$this->outputData['get_default_questions'] = $get_default_questions = "Y";
		}
		else
		{
			$this->outputData['get_default_questions'] = $get_default_questions = "N";
		}
		
		$all_questions = array();
		if($get_default_questions == "Y" && $survey->survey_template_id != "" && $survey->survey_template_id != 0)
		{
			//Get Default questions if no questions added still
			
			//Get Sections
			$params = array('template_id' => $survey->survey_template_id);
			$survey_default_sections = $this->surveys_model->getSurveyDefaultSections($params);
			$section_count=1;
			
			foreach($survey_default_sections->result() as $survey_default_section)
			{
				$all_questions['sections'][$section_count]['category_id'] = $survey_default_section->category_id;
				$all_questions['sections'][$section_count]['category'] = $survey_default_section->category;
				$all_questions['sections'][$section_count]['status'] = $survey_default_section->status;
				
				//Get Questions
				$params = array('template_id' => $survey->survey_template_id, 'section_id' => $survey_default_section->section_id);
				$survey_default_questions = $this->surveys_model->getSurveyDefaultQuestions($params);
				$question_count = 1;
				
				foreach($survey_default_questions->result() as $survey_default_question)
				{
					$all_questions['sections'][$section_count]['questions'][$question_count]['question'] = $survey_default_question->question;
					$all_questions['sections'][$section_count]['questions'][$question_count]['question_type'] = $survey_default_question->question_type;
					$all_questions['sections'][$section_count]['questions'][$question_count]['status'] = $survey_default_question->status;
					
					//Get Question Options
					$params = array('template_id' => $survey->survey_template_id, 'section_id' => $survey_default_section->section_id, 'question_id' => $survey_default_question->question_id);
					$survey_default_question_options = $this->surveys_model->getSurveyDefaultQuestionOptions($params);
					$option_count = 1;
					
					//For empty option
					$all_questions['sections'][$section_count]['questions'][$question_count]['options'][$option_count] = '';
					
					foreach($survey_default_question_options->result() as $survey_default_question_option)
					{	
						$all_questions['sections'][$section_count]['questions'][$question_count]['options'][$option_count] = $survey_default_question_option->option_name;
						$option_count++;	
					}
					
					$question_count++;
				}
				$section_count++;
			}
		}
		else
		{
			//Get survey questions if already added
			
			//Get Sections
			$params = array('survey_id' => $survey_id);
			$survey_sections = $this->surveys_model->getSurveySections($params);
			$section_count=1;
			
			foreach($survey_sections->result() as $survey_section)
			{
				$all_questions['sections'][$section_count]['category_id'] = $survey_section->category_id;
				$all_questions['sections'][$section_count]['category'] = $survey_section->category;
				$all_questions['sections'][$section_count]['status'] = $survey_section->status;
				
				//Get Questions
				$params = array('section_id' => $survey_section->section_id);
				$survey_questions = $this->surveys_model->getSurveyQuestions($params);
				$question_count = 1;
				
				foreach($survey_questions->result() as $survey_question)
				{
					$all_questions['sections'][$section_count]['questions'][$question_count]['question'] = $survey_question->question;
					$all_questions['sections'][$section_count]['questions'][$question_count]['question_type'] = $survey_question->question_type;
					$all_questions['sections'][$section_count]['questions'][$question_count]['status'] = $survey_question->status;
					
					//Get Question Options
					$params = array('question_id' => $survey_question->question_id);
					$survey_question_options = $this->surveys_model->getSurveyQuestionOptions($params);
					$option_count = 1;
					
					//For empty option
					$all_questions['sections'][$section_count]['questions'][$question_count]['options'][$option_count] = '';
					
					foreach($survey_question_options->result() as $survey_question_option)
					{
						$all_questions['sections'][$section_count]['questions'][$question_count]['options'][$option_count] = $survey_question_option->option_name;
						$option_count++;	
					}
					$question_count++;
				}
				$section_count++;
			}
		}
		
		//echo "<pre>"; print_r($all_questions); exit;
		$this->outputData['all_questions'] = $all_questions;
		
		$params = array('status' => "A");
		$this->outputData['templates'] 		= $this->surveys_model->getSurveyDefaultTemplates($params);
		
		$this->outputData['question_categories'] = $this->surveys_model->getQuestionCategories();
		$this->outputData['survey']	= $survey;
		$this->outputData['main_content'] 	= 'admin/voyage_management/surveys/editSurvey';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function deleteSurvey($voyage_id,$survey_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_surveys'))
			redirect('admin_access_denied');
		
		//Check voyage exists and not closed
		$condition = array('voyage_id' => $voyage_id, 'status !=' => 'C');
		$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
		if($check_voyage_exists == 0)
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Sorry you can not delete. Voyage closed.'));
			redirect_admin('surveys/manageSurveys/'.$voyage_id);
		}
		
		//Check voyage exists and not closed
		$condition = array('voyage_id' => $voyage_id, 'survey_id' => $survey_id, 'status !=' => 'C');
		$check_voyage_exists = $this->surveys_model->checkSurveyExists($condition);	
		if($check_voyage_exists == 0)
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Sorry you can not delete. Survey closed.'));
			redirect_admin('surveys/manageSurveys/'.$voyage_id);
		}
		
		//Check survey exists or not
		$condition = array('voyage_id' => $voyage_id,'survey_id' => $survey_id);
		$check_survey_exists = $this->surveys_model->checkSurveyExists($condition);	
		if($check_survey_exists == 0)
		{
			redirect('admin_access_denied');
		}	
		
		//Delete Language Values	
		$survey	= $this->surveys_model->getSurveyById($survey_id);		
		
		$condition = array(
			'variable_name'	=>	$survey->language_variable
		);
		
		$this->languages_model->deleteLanguageValue($condition);
			
		$condition = array(
			'survey_id'	=>	$survey_id
		);
		
		unlink(FCPATH. 'images/surveys/'.$survey->voyage_id.'/'.$survey->survey_image);	
		
		$this->surveys_model->deleteSurvey($condition);
		
		$this->surveys_model->deleteGuestSurveyComment($condition);
		$this->surveys_model->deleteGuestSurveyAnswer($condition);
		$this->surveys_model->deleteGuestSurveyReport($condition);
		
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Survey was deleted successfully.'));
		redirect_admin('surveys/manageSurveys/'.$voyage_id);
	}
	
	function closeSurvey($voyage_id,$survey_id)
	{
		if(!isAdmin())
			redirect_admin('login');
		
		if(!isAuthorizedAdmin('manage_surveys'))
			redirect('admin_access_denied');
		
		if(empty($voyage_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage Id.'));
			redirect_admin('voyage/manageVoyages');	
		}		
			
		if(empty($survey_id))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Survey Id'));
			redirect_admin('surveys/manageSurveys/'.$voyage_id);	
		}
		
		//Check survey exists or not
		$condition = array('voyage_id' => $voyage_id,'survey_id' => $survey_id);
		$check_survey_exists = $this->surveys_model->checkSurveyExists($condition);	
		if($check_survey_exists == 0)
		{
			redirect('admin_access_denied');
		}	
		
		$update_data=array(
			'status' => "C",
			'updated_at' => strtotime(date('Y-m-d H:i:s'))
		);
		
		$update_cond=array(
			'survey_id'	=>	$survey_id
		);
			
		$this->surveys_model->updateSurvey($update_data,$update_cond);
		
		$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Survey '.$survey_id.' closed.'));
		redirect_admin('surveys/editSurvey/'.$voyage_id.'/'.$survey_id);
	}
	
	function ajaxDeleteSurveyFile()
	{
		$voyage_id	= $this->input->post('voyage_id');
		$survey_id 	= $this->input->post('survey_id');
		$file_to_remove	= $this->input->post('file_to_remove');
		
		$data['status'] = "ERROR";
		if(!empty($voyage_id) && !empty($survey_id) && !empty($file_to_remove))
		{
			unlink(FCPATH. 'images/surveys/'.$voyage_id.'/'.$file_to_remove);
			
			$update_data=array(
					'survey_image' => ""
			);
								
			$update_cond=array(
					'survey_id'	=>	$survey_id
			);
					
			$this->surveys_model->updateSurvey($update_data,$update_cond);
			$data['status'] = "SUCCESS";
		}
		
		echo json_encode($data);
		exit;
	}
	
	function ajaxAddSurveySection()
	{
		$section_count	= $this->input->post('section_count');
		
		if($section_count !="")
		{

			$inputData 	= array();
			
			$section = array(
						'category_id' => "",
						'category' => "",
						'status' => "A"
					);	
									
			$inputData['section_count'] = $section_count;
			$inputData['section'] = $section;
			$inputData['question_categories'] = $this->surveys_model->getQuestionCategories();
			
			//Load Html Contets of survey question
			$data['survey_section_html']= $this->load->view('admin/voyage_management/surveys/ajax-components/surveySection',$inputData,true);	

			$data['status']	= "success";
		}
		else
		{
			$data['status']	= "error";
		}	
		
		echo json_encode($data);
		exit;
	}
	
	function ajaxAddSurveyQuestion()
	{
		$question_type	= $this->input->post('question_type');
		$section_count	= $this->input->post('section_count');
		$question_count	= $this->input->post('question_count');
		
		if($question_type != "" && $section_count !="" && $question_count != "")
		{

			$inputData 	= array();
			
			$question = array(
							'question_type' => $question_type,
							'question' => "",
							'status' => "A",
							'options' => array('Excellent','Very Good','Good','Fair','Poor','N/A')
						);	
			
			$inputData['section_count'] = $section_count;
			$inputData['question_count'] = $question_count;
			$inputData['question'] = $question;
			
			//Load Html Contets of survey question
			$data['survey_question_html']= $this->load->view('admin/voyage_management/surveys/ajax-components/surveyQuestion',$inputData,true);	

			$data['status']	= "success";
		}
		else
		{
			$data['status']	= "error";
		}	
		
		echo json_encode($data);
		exit;
	}
	
	function ajaxAddSurveyQuestionOption()
	{
		$question_type	= $this->input->post('question_type');
		$section_count	= $this->input->post('section_count');
		$question_count	= $this->input->post('question_count');
		$option_count	= $this->input->post('option_count');
		
		if($question_type != "" && $section_count !="" && $question_count != "" && $option_count != "")
		{
			//Check the question type is rating. If yes then return error
			if($question_type == "RATING")
			{
				$data['error']	= "rating-question-type-not-allowed";
				$data['status']	= "error";
				echo json_encode($data);
				exit;
			}
		
			$inputData 	= array();
			
			$inputData['question_type'] = $question_type;
			$inputData['section_count'] = $section_count;
			$inputData['question_count'] = $question_count;
			$inputData['option_count'] = $option_count;
			
			//Load Html Contets of survey question option
			$data['survey_question_option_html']= $this->load->view('admin/voyage_management/surveys/ajax-components/surveyQuestionOption',$inputData,true);	

			$data['status']	= "success";
		}
		else
		{
			$data['status']	= "error";
		}	
		
		echo json_encode($data);
		exit;
	}
	
	function ajaxChangeSurveyQuestionType()
	{
		$question_type	= $this->input->post('question_type');
		$section_count	= $this->input->post('section_count');
		$question_count	= $this->input->post('question_count');
		$options_list	= $this->input->post('options_list');
		
		if($question_type != "" && $section_count !="" && $question_count != "")
		{
		
			$inputData 	= array();
			
			$inputData['question_type'] = $question_type;
			$inputData['section_count'] = $section_count;
			$inputData['question_count'] = $question_count;
			
			//Check the question type is rating. If yes then return error
			if($question_type == "RATING")
			{
				$inputData['options'] = array('Excellent','Very Good','Good','Fair','Poor','N/A');
			}
			else
			{
				$inputData['options'] = explode(",",$options_list);
			}	
			
			
			$data['question_type'] = $question_type;
			//Load Html Contets of survey question options
			$data['survey_question_option_html']= $this->load->view('admin/voyage_management/surveys/ajax-components/surveyQuestionOptions',$inputData,true);	

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


/* End of file surveys.php */
/* Location: ./system/application/controllers/admin/surveys.php */
?>