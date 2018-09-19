<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Surveys extends CI_Controller {

	public $outputData;		//Holds the output data for each view


	public function index()
	{
		if(!isActiveVoyage())
			redirect('home/no_active_voyage');
		
		if(!isLogin())
			redirect('guests/login');
		
		$active_voyage_id = getActiveVoyageId();
		
		//Check the guest is authorized to access this voyage
		if($this->session->userdata('guest_voyage_id') != $active_voyage_id)
		{
			redirect('guests/logout');
		}
		
		$params = array('voyage_id' => $active_voyage_id, 'status' => 'A');
		$surveys = $this->surveys_model->getSurveys($params);	
		
		$this->outputData['surveys'] 			= $surveys;
		$this->outputData['title'] 				= translate('surveys');
		$this->outputData['meta_title'] 		= translate('surveys');
		$this->outputData['meta_keywords'] 		= translate('surveys');
		$this->outputData['meta_description'] 	= translate('surveys');
		$this->outputData['main_content'] 		= 'surveys/view_surveys';
		$this->load->view('template',$this->outputData);
	}
	
	
	public function view_survey($survey_id)
	{
		if(!isActiveVoyage())
			redirect('home/no_active_voyage');
		
		if(!isLogin())
			redirect('guests/login');
		
		if(empty($survey_id))	
		{
			$this->session->set_flashdata('flash_message', $this->common_model->flash_message('error',translate('invalid-survey-id')));
			redirect('surveys');
		}
		
		$active_voyage_id = getActiveVoyageId();
		
		//Check the guest is authorized to access this voyage
		if($this->session->userdata('guest_voyage_id') != $active_voyage_id)
		{
			redirect('guests/logout');
		}
		
		$survey = $this->surveys_model->getSurveyById($survey_id);	
		
		//Check the guest is authorized to access this survey
		if($this->session->userdata('guest_voyage_id') != $survey->voyage_id)
		{
			redirect('guests/logout');
		}
		
		if($survey == "" || $survey->voyage_id != $active_voyage_id || $survey->status != "A")
		{
			$this->session->set_flashdata('flash_message', $this->common_model->flash_message('error',translate('survey-not-available')));
			redirect('surveys');
		}
		
		$guest_id = $this->session->userdata('guest_id');
		$guest_language = $this->session->userdata('guest_language');
		
		//check the survey editable or not
		$general_settings = getGeneralSettings();
		if($general_settings->is_survey_editable == "N")
		{
			$params = array('voyage_id' => $active_voyage_id, 'survey_id' => $survey_id, 'guest_id' => $guest_id, 'status' => "FINISHED");
			$guest_survey_report_check = $this->surveys_model->getGuestSurveyReports($params);		
			if($guest_survey_report_check->num_rows() > 0)
			{
				$this->session->set_flashdata('flash_message', $this->common_model->flash_message('error',translate('you-finished-survey')));
				redirect('surveys');
			}
		}
		
		if($this->input->post())
		{
			$condition = array(
									'voyage_id' => $active_voyage_id,
									'survey_id'	=> $survey_id,
									'guest_id'	=> $guest_id
								);
			$this->surveys_model->deleteGuestSurveyReport($condition);
			$this->surveys_model->deleteGuestSurveyAnswer($condition);
			$this->surveys_model->deleteGuestSurveyComment($condition);
			
			//Insert Guest Survey Report
			$insert_data = array(
								'voyage_id' => $active_voyage_id,
								'survey_id'	=> $survey_id,
								'guest_id'	=> $guest_id,
								'guest_language' => $guest_language,
								'updated_at' => strtotime(date('Y-m-d H:i:s'))
							);
			
			if($this->input->post('finish'))
			{
				$insert_data['status'] = "FINISHED";
			}				
			
			$this->surveys_model->insertGuestSurveyReport($insert_data);
			
			$sections = $this->input->post('sections');
			$comments = $this->input->post('comments');
			if(count($sections) > 0)
			{
				//Insert Guest Survey Answer
				foreach($sections as $section_id => $section)
				{
					foreach($section as $question_id => $question)
					{
						
						$option_value = $language_variable = "";
						if($question['question_type'] == "RATING" || $question['question_type'] == "RADIOBUTTONS")
						{
							if(isset($question['option_id']))
							{
								$option = getOptionById($question['option_id']);
								if($option != "")
								{
									$option_value = $option->option_name;
									$language_variable = $option->language_variable;
								}
								
								$option_id = $question['option_id'];
								
								//Insert Guest Survey Answer
								$insert_data = array(
												'voyage_id' => $active_voyage_id,
												'survey_id'	=> $survey_id,
												'guest_id'	=> $guest_id,
												'section_id'=> $section_id,
												'question_id'=> $question_id,
												'question_type' => $question['question_type'],
												'option_id' => $option_id,
												'value' => $option_value,
												'language_variable' => $language_variable
											);
														
								if($language_variable == "other")
								{
									$insert_data['other_value'] = $question['other_value'];
								}
								
								$this->surveys_model->insertGuestSurveyAnswer($insert_data);	
							}
						}
						else if($question['question_type'] == "CHECKBOXES")
						{
							if(isset($question['option_ids']) && count($question['option_ids']) > 0)
							{
								$option_ids = $question['option_ids'];
								$option_values = $language_variables = array();
								foreach($option_ids as $option_id)
								{
									$option_value = $language_variable = "";
									$option = getOptionById($option_id);
									if($option != "")
									{
										$option_value = $option->option_name;
										$language_variable = $option->language_variable;
									}
									
									//Insert Guest Survey Answer
									$insert_data = array(
													'voyage_id' => $active_voyage_id,
													'survey_id'	=> $survey_id,
													'guest_id'	=> $guest_id,
													'section_id'=> $section_id,
													'question_id'=> $question_id,
													'question_type' => $question['question_type'],
													'option_id' => $option_id,
													'value' => $option_value,
													'language_variable' => $language_variable
												);
															
									if($language_variable == "other")
									{
										$insert_data['other_value'] = $question['other_value'];
									}
									
									$this->surveys_model->insertGuestSurveyAnswer($insert_data);
								}	
							}
						}					
					}
				}
			}	
			
			if(count($comments) > 0) 
			{
				//Insert Guest Survey Comment
				foreach($comments as $section_id => $comment)
				{
					if($comment != "")
					{
						//Insert Guest Survey Answer
						$insert_data = array(
										'voyage_id' => $active_voyage_id,
										'survey_id'	=> $survey_id,
										'guest_id'	=> $guest_id,
										'section_id'=> $section_id,
										'comment'=> $comment
									);
						$this->surveys_model->insertGuestSurveyComment($insert_data);			
					}	
				}
			}
			
			if($this->input->post('finish'))
			{
				$this->session->set_flashdata('flash_message', $this->common_model->flash_message('success',translate('thank-you-for-finishing-survey')));
				redirect('surveys');
			}
			else
			{
				$this->session->set_flashdata('flash_message', $this->common_model->flash_message('success',translate('your-changes-been-saved')));
				redirect('surveys/'.$survey_id);
			}
 		}
		
		//Get Sections
		$all_questions = array();
		$params = array('voyage_id' => $active_voyage_id, 'survey_id' => $survey_id, 'status' => 'A');
		$survey_sections = $this->surveys_model->getSurveySections($params);
		$section_count=1;
		
		foreach($survey_sections->result() as $survey_section)
		{
			$all_questions['sections'][$survey_section->section_id]['category_id'] = $survey_section->category_id;
			$all_questions['sections'][$survey_section->section_id]['category'] = $survey_section->category;
			$all_questions['sections'][$survey_section->section_id]['language_variable'] = $survey_section->language_variable;
			$all_questions['sections'][$survey_section->section_id]['status'] = $survey_section->status;
			
			//Get Questions
			$params = array('voyage_id' => $active_voyage_id, 'survey_id' => $survey_id, 'section_id' => $survey_section->section_id, 'status' => 'A');
			$survey_questions = $this->surveys_model->getSurveyQuestions($params);
			$question_count = 1;
			
			foreach($survey_questions->result() as $survey_question)
			{
				$all_questions['sections'][$survey_section->section_id]['questions'][$survey_question->question_id]['question'] = $survey_question->question;
				$all_questions['sections'][$survey_section->section_id]['questions'][$survey_question->question_id]['language_variable'] = $survey_question->language_variable;
				$all_questions['sections'][$survey_section->section_id]['questions'][$survey_question->question_id]['question_type'] = $survey_question->question_type;
				$all_questions['sections'][$survey_section->section_id]['questions'][$survey_question->question_id]['status'] = $survey_question->status;
				
				//Get Question Options
				$params = array('question_id' => $survey_question->question_id);
				$survey_question_options = $this->surveys_model->getSurveyQuestionOptions($params);
				$option_count = 1;
				
				foreach($survey_question_options->result() as $survey_question_option)
				{
					$all_questions['sections'][$survey_section->section_id]['questions'][$survey_question->question_id]['options'][$survey_question_option->option_id] = $survey_question_option->language_variable;
					$option_count++;	
				}
				$question_count++;
			}
			$section_count++;
		}
		
		//Get Single Choice results
		$params = array('voyage_id' => $active_voyage_id, 'survey_id' => $survey_id, 'guest_id' => $guest_id, 'is_single_choice' => "Y");
		$results = $this->surveys_model->getGuestSurveyAnswers($params);
		
		$survey_single_choice_results = array();
		foreach($results->result() as $result)
		{
			$survey_single_choice_results[$result->section_id][$result->question_id]['option_id'] = $result->option_id;	
			
			if($result->language_variable == "other")
			$survey_single_choice_results[$result->section_id][$result->question_id]['other_value'] = $result->other_value;	
		}
		
		//Get Multiple Choice results
		$params = array('voyage_id' => $active_voyage_id, 'survey_id' => $survey_id, 'guest_id' => $guest_id, 'is_multiple_choice' => "Y");
		$results = $this->surveys_model->getGuestSurveyAnswers($params);
		
		$survey_multiple_choice_results = array();
		foreach($results->result() as $result)
		{
			$survey_multiple_choice_results[$result->section_id][$result->question_id]['option_ids'][] = $result->option_id;
			
			if($result->language_variable == "other")
			$survey_multiple_choice_results[$result->section_id][$result->question_id]['other_value'] = $result->other_value;	
		}
		
		//Get Comments
		$params = array('voyage_id' => $active_voyage_id, 'survey_id' => $survey_id, 'guest_id' => $guest_id);
		$results = $this->surveys_model->getGuestSurveyComments($params);
		
		$survey_comments = array();
		foreach($results->result() as $result)
		{
			$survey_comments[$result->section_id]['comment'] = $result->comment;
		}
		
		$this->outputData['survey'] 			= $survey;
		$this->outputData['all_questions'] 		= $all_questions;
		$this->outputData['survey_single_choice_results'] 	= $survey_single_choice_results;
		$this->outputData['survey_multiple_choice_results'] = $survey_multiple_choice_results;
		$this->outputData['survey_comments'] = $survey_comments;
		$this->outputData['title'] 				= translate($survey->language_variable);
		$this->outputData['meta_title'] 		= translate($survey->language_variable);
		$this->outputData['meta_keywords'] 		= translate($survey->language_variable);
		$this->outputData['meta_description'] 	= translate($survey->language_variable);
		$this->outputData['main_content'] 		= 'surveys/view_survey';
		$this->load->view('template',$this->outputData);
	}
	
	public function quit_survey($survey_id)
	{
		if(!isActiveVoyage())
			redirect('home/no_active_voyage');
		
		if(!isLogin())
			redirect('guests/login');
		
		if(empty($survey_id))	
		{
			$this->session->set_flashdata('flash_message', $this->common_model->flash_message('error',translate('invalid-survey-id')));
			redirect('surveys');
		}
		
		$active_voyage_id = getActiveVoyageId();
		
		//Check the guest is authorized to access this voyage
		if($this->session->userdata('guest_voyage_id') != $active_voyage_id)
		{
			redirect('guests/logout');
		}
		
		$survey = $this->surveys_model->getSurveyById($survey_id);	
		
		//Check the guest is authorized to access this survey
		if($this->session->userdata('guest_voyage_id') != $survey->voyage_id)
		{
			redirect('guests/logout');
		}
		
		if($survey == "" || $survey->voyage_id != $active_voyage_id || $survey->status == "D")
		{
			$this->session->set_flashdata('flash_message', $this->common_model->flash_message('error',translate('survey-not-available')));
			redirect('surveys');
		}
		
		$guest_id = $this->session->userdata('guest_id');
		$guest_language = $this->session->userdata('guest_language');
		
		$condition = array(
						'voyage_id' => $active_voyage_id,
						'survey_id'	=> $survey_id,
						'guest_id'	=> $guest_id
					);
		$this->surveys_model->deleteGuestSurveyReport($condition);
		$this->surveys_model->deleteGuestSurveyAnswer($condition);
		$this->surveys_model->deleteGuestSurveyComment($condition);
		
		redirect('surveys');
	}	
}
