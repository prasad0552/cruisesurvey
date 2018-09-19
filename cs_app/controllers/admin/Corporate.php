<?php 

class Corporate extends CI_Controller {
	
	public $outputData;		
	 
	function __construct() 
	{
		parent::__construct();
		
		$this->load->model('corporate/co_voyage_model');
		$this->load->model('corporate/co_surveys_model');
		$this->load->model('corporate/co_guests_model');
    }
	
	function index()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		redirect_admin('voyage/manageVoyages');	
	}
	
	//General
	function dbSettings()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if($this->input->post())
		{
					
				$update_data=array(
					'hostname' 		=> $this->input->post('hostname'),
					'username' 		=> $this->input->post('username'),
					'password' 		=> $this->input->post('password'),
					'database_name' => $this->input->post('database_name')
				);
			
				$update_cond=array(
					'setting_id'	=>	1
				);
					
				$this->co_settings_model->updateDbSetting($update_data,$update_cond);
				
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Your changes have been saved.'));
			redirect_admin('corporate/dbSettings');
		}			
		
		$params = array('setting_id' => 1);	
		$this->outputData['db_setting']			= $this->co_settings_model->getDbSettings($params)->row();
		$this->outputData['main_content'] 		= 'admin/corporate/dbsettings';
		$this->load->view('admin/admin_template',$this->outputData);
	}
	
	function transferVoyageData()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('corporate-office'))
			redirect('admin_access_denied');
		
		$db_setting	= $this->co_settings_model->getDbSettings($params)->row();
		
		if(empty($db_setting->database_name))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Database settings'));
			redirect_admin('corporate/dbSettings');
		}
			
		$this->corporate_db = $this->load->database('corporate', TRUE);
		$db_error = $this->corporate_db->error();
		print_r($this->corporate_db); exit;
		if(!empty($db_error['message']))
		{
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error',$db_error['message']));
			redirect_admin('corporate/dbSettings');
		}
		
		if($this->input->post())
		{
		
			$voyage_id = $this->input->post('voyage_id');
			
			if(empty($voyage_id))
			{
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage ID.'));
				redirect_admin('corporate/transferVoyageData');	
			}
			
			//Check Voyage exists or not in Cruise database
			$condition = array('voyage_id' => $voyage_id);
			$check_voyage_exists = $this->voyage_model->checkVoyageExists($condition);	
			if($check_voyage_exists == 0)
			{
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Invalid Voyage ID.'));
				redirect_admin('corporate/transferVoyageData');
			}	
			
			//Check Voyage exists or not in office database	if exist then remove the exiting data	
			$condition = array('voyage_id' => $voyage_id);
			$check_voyage_exists = $this->co_voyage_model->checkVoyageExists($condition);	
			if($check_voyage_exists > 0)
			{
				$this->deleteVoyage($voyage_id);
			}	
		
			$voyage = $this->voyage_model->getVoyageById($voyage_id);	
			
			//Insert Voyage
			if(!empty($voyage->voyage_id))
			{
				$insert_data=array(
					'cruise_code' 	=> $voyage->cruise_code,
					'voyage_id' 	=> $voyage->voyage_id,
					'start_date' 	=> $voyage->start_date,
					'end_date' 		=> $voyage->end_date,
					'status'		=> $voyage->status,
					'created_at' 	=> $voyage->created_at,
					'updated_at' 	=> $voyage->updated_at
				);
				
				//Insert voyage
				$this->co_voyage_model->insertVoyage($insert_data);
			}
			
			//Insert Surveys
			$params = array('voyage_id' => $voyage_id);	
			$surveys = $this->surveys_model->getSurveys($params);
			
			if($surveys->num_rows() > 0)
			{	
				foreach($surveys->result() as $survey)
				{
					$insert_data=array(
						'voyage_id'	=> $survey->voyage_id,
						'survey_id'	=> $survey->survey_id,
						'survey_numeric_id' => $survey->survey_numeric_id,
						'survey_title' => $survey->survey_title,
						'survey_image' => $survey->mage,
						'language_variable' => $survey->language_variable,
						'survey_template_id' =>  $survey->survey_template_id,
						'status' => $survey->status,
						'created_at' => $survey->created_at,
						'updated_at' => $survey->updated_at
					);
					
					//Insert Survey
					$this->co_surveys_model->insertSurvey($insert_data);
				}
			}
			
			//Insert Survey Sections
			$params = array('voyage_id' => $voyage_id);	
			$survey_sections = $this->surveys_model->getSurveySections($params);
			
			if($survey_sections->num_rows() > 0)
			{	
				foreach($survey_sections->result() as $survey_section)
				{
					$insert_data = array(
										'voyage_id' => $survey_section->voyage_id,
										'survey_id' => $survey_section->survey_id,
										'section_id' => $survey_section->section_id,
										'section_numeric_id' => $survey_section->section_numeric_id,
										'category_id' => $survey_section->category_id,
										'category' => $survey_section->category,
										'language_variable' => $survey_section->language_variable,
										'position' => $survey_section->position,
										'status' => $survey_section->status
									);
					//Insert Section			
					$this->co_surveys_model->insertSurveySection($insert_data);
				}
			}
			
			//Insert Survey Questions
			$params = array('voyage_id' => $voyage_id);	
			$survey_questions = $this->surveys_model->getSurveyQuestions($params);
			
			if($survey_questions->num_rows() > 0)
			{	
				foreach($survey_questions->result() as $survey_question)
				{
					$insert_data = array(
												'voyage_id' => $survey_question->voyage_id,
												'survey_id' => $survey_question->survey_id,
												'section_id' => $survey_question->section_id,
												'question_id' => $survey_question->question_id,
												'question_numeric_id' => $survey_question->question_numeric_id,
												'question' => $survey_question->question,
												'language_variable' => $survey_question->language_variable,
												'question_type' => $survey_question->question_type,
												'position' => $survey_question->position,
												'status' => $survey_question->status		
											);
								
					//Insert Question			
					$this->co_surveys_model->insertSurveyQuestion($insert_data);
				}
			}
			
			//Insert Survey Question Options
			$params = array('voyage_id' => $voyage_id);	
			$survey_question_options = $this->surveys_model->getSurveyQuestionOptions($params);
			
			if($survey_question_options->num_rows() > 0)
			{	
				foreach($survey_question_options->result() as $survey_question_option)
				{
					$insert_data = array(
										'voyage_id' => $survey_question_option->voyage_id,
										'survey_id' => $survey_question_option->survey_id,
										'section_id' => $survey_question_option->section_id,
										'question_id' => $survey_question_option->question_id,
										'option_id' => $survey_question_option->option_id,
										'option_numeric_id' => $survey_question_option->option_numeric_id,
										'option_name' => $survey_question_option->option_name,
										'language_variable' => $survey_question_option->language_variable	
									);
										
					//Insert Question Option			
					$this->co_surveys_model->insertSurveyQuestionOption($insert_data);
				}
			}
			
			//Insert Guests
			$params = array('voyage_id' => $voyage_id);	
			$guests = $this->guests_model->getGuests($params);
			
			if($guests->num_rows() > 0)
			{	
				foreach($guests->result() as $guest)
				{
					$insert_data=array(
							'guest_id'	=> $guest->guest_id,
							'guest_numeric_id' => $guest->guest_numeric_id,
							'voyage_id'	=> $guest->voyage_id,
							'firstname' => $guest->firstname,
							'lastname'	=> $guest->lastname,
							'email'	=> $guest->email,
							'password' => $guest->password,
							'date_of_birth' => $guest->date_of_birth,
							'sex'	=> $guest->sex,
							'nationality' => $guest->nationality,
							'language' => $guest->language,
							'billing_no' => $guest->billing_no,
							'passenger_no' => $guest->passenger_no,
							'booking_no' => $guest->booking_no,
							'cabin_no' => $guest->cabin_no,
							'ship_card_no' => $guest->ship_card_no,
							'embark_date' => $guest->embark_date,
							'debark_date' => $guest->debark_date,
							'title' => $guest->title,
							'passport_no' => $guest->passport_no,
							'passport_expire' => $guest->passport_expire,
							'passport_issued' => $guest->passport_issued,
							'opt_out_electronic' => $guest->opt_out_electronic,
							'status' => $guest->status,
							'created_at' => $guest->created_at,
							'updated_at' => $guest->updated_at
						);
						
					//Insert Guest
					$this->co_guests_model->insertGuest($insert_data);
				}
			}
			
			
			//Insert Guest Survey Reports
			$params = array('voyage_id' => $voyage_id);	
			$guest_survey_reports = $this->surveys_model->getGuestSurveyReports($params);
			
			if($guest_survey_reports->num_rows() > 0)
			{	
				foreach($guest_survey_reports->result() as $guest_survey_report)
				{
					$insert_data = array(
								'voyage_id' => $guest_survey_report->voyage_id,
								'survey_id'	=> $guest_survey_report->survey_id,
								'guest_id'	=> $guest_survey_report->guest_id,
								'guest_language' => $guest_survey_report->guest_language,
								'status' => $guest_survey_report->status,
								'updated_at' => $guest_survey_report->updated_at
							);
										
					//Insert Guest Survey Report			
					$this->co_surveys_model->insertGuestSurveyReport($insert_data);
				}
			}
			
			//Insert Guest Survey Answers
			$params = array('voyage_id' => $voyage_id);	
			$guest_survey_answers = $this->surveys_model->getGuestSurveyAnswers($params);
			
			if($guest_survey_answers->num_rows() > 0)
			{	
				foreach($guest_survey_answers->result() as $guest_survey_answer)
				{
					$insert_data = array(
										'voyage_id' => $guest_survey_answer->voyage_id,
										'survey_id'	=> $guest_survey_answer->survey_id,
										'guest_id'	=> $guest_survey_answer->guest_id,
										'section_id'=> $guest_survey_answer->section_id,
										'question_id'=> $guest_survey_answer->question_id,
										'question_type' => $guest_survey_answer->question_type,
										'option_id' => $guest_survey_answer->option_id,
										'value' => $guest_survey_answer->value,
										'other_value' => $guest_survey_answer->other_value,
										'language_variable' => $guest_survey_answer->language_variable
									);
										
					//Insert Guest Survey Answer			
					$this->co_surveys_model->insertGuestSurveyAnswer($insert_data);
				}
			}
			
			//Insert Guest Survey Comments
			$params = array('voyage_id' => $voyage_id);	
			$guest_survey_comments = $this->surveys_model->getGuestSurveyComments($params);
			
			if($guest_survey_comments->num_rows() > 0)
			{	
				foreach($guest_survey_comments->result() as $guest_survey_comment)
				{
					$insert_data = array(
										'voyage_id' => $guest_survey_comment->voyage_id,
										'survey_id'	=> $guest_survey_comment->survey_id,
										'guest_id'	=> $guest_survey_comment->guest_id,
										'section_id'=> $guest_survey_comment->section_id,
										'comment'=> $guest_survey_comment->comment
									);
										
					//Insert Guest Survey Comment			
					$this->co_surveys_model->insertGuestSurveyComment($insert_data);
				}
			}
			
			
			$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('success','Data transfered successfully'));
			redirect_admin('corporate/transferVoyageData');
		}	
		
		$this->outputData['voyages']		= $this->voyage_model->getVoyage();
		$this->outputData['main_content'] 	= 'admin/corporate/transferVoyageData';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	function deleteVoyage($voyage_id)
	{
		if(!empty($voyage_id)) 
		{
			$condition = array('voyage_id' => $voyage_id);
			
			//Delete reports
			$this->co_surveys_model->deleteGuestSurveyReport($condition);
			
			//Delete guest
			$this->co_guests_model->deleteGuest($condition);
			
			//Delete Survey
			$this->co_surveys_model->deleteSurvey($condition);
			
			//Delete Voyage
			$this->co_voyage_model->deleteVoyage($condition);
		}
	}
	
	function ajaxCheckVoyageExists()
	{
		$voyage_id	= $this->input->post('voyage_id');
		
		if($voyage_id != "")
		{
			$condition = array('voyage_id' => $voyage_id);
			$check_voyage_exists = $this->co_voyage_model->checkVoyageExists($condition);	
			if($check_voyage_exists == 0)
			{
				$data['is_exist'] ="N";
			}
			else
			{
				$data['is_exist'] ="Y";
			}
			
			$data['status']	= "success";
		}
		else
		{
			$data['error']  = 'voyage-id-empty';
			$data['status']	= "error";
		}	
		
		echo json_encode($data);
		exit;
	}
	
}


/* End of file Corporate.php */
/* Location: ./system/application/controllers/admin/corporate.php */
?>