<?php

class Surveys_model extends CI_Model {
	 
	function __construct() 
	{
        parent::__construct();
    }
	
  	//Check Question Category exists or not
	function checkQuestionCategoryExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('question_categories');
			return $query->num_rows();
		}
	}
		  
	//Insert Question Category
	function insertQuestionCategory($insert_data)
	{
	  	$this->db->insert('question_categories',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Question Category
	function getQuestionCategories($params=array())
	{	
			$fields = array(
						'?:question_categories.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['category_id']))
			{
				$condition .= " AND ?:question_categories.category_id = '".$params['category_id']."'";
			}
			
			if(!empty($params['category_id_in']))
			{
				$condition .= " AND ?:question_categories.category_id IN (".$params['category_id_in'].")";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:question_categories.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:question_categories.category_id DESC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:question_categories ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get category by id
	function getQuestionCategoryByID($category_id)
	{
	  		$fields = array(
						'?:question_categories.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:question_categories.category_id = '".$category_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:question_categories ".$join." WHERE ".$condition);
			
			return $result->row();
	}
		
	//Update Question Category
	function updateQuestionCategory($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('question_categories',$update_data);
		}
	}
	
	//Delete Question Category
	function deleteQuestionCategory($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('question_categories');
				
				return $this->db->affected_rows();
			}	
	}
	
	//Check Survey exists or not
	function checkSurveyExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('survey');
			return $query->num_rows();
		}
	}
		  
	//Insert Survey
	function insertSurvey($insert_data)
	{
	  	$this->db->insert('survey',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Survey
	function getSurveys($params=array())
	{	
			$fields = array(
						'?:survey.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['survey_id']))
			{
				$condition .= " AND ?:survey.survey_id = '".$params['survey_id']."'";
			}
			
			if(!empty($params['voyage_id']))
			{
				$condition .= " AND ?:survey.voyage_id = '".$params['voyage_id']."'";
			}
			
			if(!empty($params['survey_id_in']))
			{
				$condition .= " AND ?:survey.survey_id IN (".$params['survey_id_in'].")";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:survey.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:survey.survey_numeric_id ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Survey by id
	function getSurveyByID($survey_id)
	{
	  		$fields = array(
						'?:survey.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:survey.survey_id = '".$survey_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey".$join." WHERE ".$condition);
			
			return $result->row();
	}
		
	//Update Survey
	function updateSurvey($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('survey',$update_data);
		}
	}
	
	//Delete Survey
	function deleteSurvey($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('survey');
				
				return $this->db->affected_rows();
			}	
	}
	
	//Check Default Survey Template exist or not
	function checkSurveyDefaultTemplateExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('survey_default_templates');
			return $query->num_rows();
		}
	}
		  
	//Insert Survey default template
	function insertSurveyDefaultTemplate($insert_data)
	{
	  	$this->db->insert('survey_default_templates',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Survey Default Templates
	function getSurveyDefaultTemplates($params=array())
	{	
			$fields = array(
						'?:survey_default_templates.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['template_id']))
			{
				$condition .= " AND ?:survey_default_templates.template_id = '".$params['template_id']."'";
			}

			if(!empty($params['status']))
			{
				$condition .= " AND ?:survey_default_templates.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:survey_default_templates.template_id ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_default_templates ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Survey Default Template by id
	function getSurveyDefaultTemplateByID($template_id)
	{
	  		$fields = array(
						'?:survey_default_templates.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:survey_default_templates.template_id = '".$template_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_default_templates".$join." WHERE ".$condition);
			
			return $result->row();
	}
		
	//Update Survey Default Template
	function updateSurveyDefaultTemplate($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('survey_default_templates',$update_data);
		}
	}
	
	//Delete Survey Default Template
	function deleteSurveyDefaultTemplate($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('survey_default_templates');
				
				return $this->db->affected_rows();
			}	
	}
	
	
	//Check Default Survey Sections exist or not
	function checkSurveyDefaultSectionExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('survey_default_sections');
			return $query->num_rows();
		}
	}
		  
	//Insert Survey default section
	function insertSurveyDefaultSection($insert_data)
	{
	  	$this->db->insert('survey_default_sections',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Survey Default Sections
	function getSurveyDefaultSections($params=array())
	{	
			$fields = array(
						'?:survey_default_sections.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
			
			if(!empty($params['template_id']))
			{
				$condition .= " AND ?:survey_default_sections.template_id = '".$params['template_id']."'";
			}
						
			if(!empty($params['section_id']))
			{
				$condition .= " AND ?:survey_default_sections.section_id = '".$params['section_id']."'";
			}
			
			if(!empty($params['section_id_in']))
			{
				$condition .= " AND ?:survey_default_sections.section_id IN (".$params['section_id_in'].")";
			}
			
			if(!empty($params['category_id']))
			{
				$condition .= " AND ?:survey_default_sections.category_id = '".$params['category_id']."'";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:survey_default_sections.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:survey_default_sections.section_id ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_default_sections ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Survey Default Section by id
	function getSurveyDefaultSectionByID($section_id)
	{
	  		$fields = array(
						'?:survey_default_sections.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:survey_default_sections.section_id = '".$section_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_default_sections".$join." WHERE ".$condition);
			
			return $result->row();
	}
		
	//Update Survey Default Section
	function updateSurveyDefaultSection($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('survey_default_sections',$update_data);
		}
	}
	
	//Delete Survey Default Section
	function deleteSurveyDefaultSection($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('survey_default_sections');
				
				return $this->db->affected_rows();
			}	
	}
	
	
	
	//Check Default Survey Questions exist or not
	function checkSurveyDefaultQuestionExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('survey_default_questions');
			return $query->num_rows();
		}
	}
		  
	//Insert Survey default question
	function insertSurveyDefaultQuestion($insert_data)
	{
	  	$this->db->insert('survey_default_questions',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Survey Default Question
	function getSurveyDefaultQuestions($params=array())
	{	
			$fields = array(
						'?:survey_default_questions.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
			
			if(!empty($params['template_id']))
			{
				$condition .= " AND ?:survey_default_questions.template_id = '".$params['template_id']."'";
			}
						
			if(!empty($params['section_id']))
			{
				$condition .= " AND ?:survey_default_questions.section_id = '".$params['section_id']."'";
			}
			
			if(!empty($params['question_id']))
			{
				$condition .= " AND ?:survey_default_questions.question_id = '".$params['question_id']."'";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:survey_default_questions.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:survey_default_questions.question_id ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_default_questions ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Survey Default Question by id
	function getSurveyDefaultQuestionByID($question_id)
	{
	  		$fields = array(
						'?:survey_default_questions.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:survey_default_questions.question_id = '".$question_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_default_questions".$join." WHERE ".$condition);
			
			return $result->row();
	}
		
	//Update Survey Default Question
	function updateSurveyDefaultQuestion($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('survey_default_questions',$update_data);
		}
	}
	
	//Delete Survey Default Question
	function deleteSurveyDefaultQuestion($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('survey_default_questions');
				
				return $this->db->affected_rows();
			}	
	}
	
	
	//Check Survey Default Question Option exists or not
	function checkSurveyDefaultQuestionOptionExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('survey_default_question_options');
			return $query->num_rows();
		}
	}
		  
	//Insert Survey Default Question Option
	function insertSurveyDefaultQuestionOption($insert_data)
	{
	  	$this->db->insert('survey_default_question_options',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Survey Default Question Options
	function getSurveyDefaultQuestionOptions($params=array())
	{	
			$fields = array(
						'?:survey_default_question_options.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
			
			if(!empty($params['template_id']))
			{
				$condition .= " AND ?:survey_default_question_options.template_id = '".$params['template_id']."'";
			}
						
			if(!empty($params['section_id']))
			{
				$condition .= " AND ?:survey_default_question_options.section_id = '".$params['section_id']."'";
			}
			
			if(!empty($params['question_id']))
			{
				$condition .= " AND ?:survey_default_question_options.question_id = '".$params['question_id']."'";
			}
			
			if(!empty($params['option_id']))
			{
				$condition .= " AND ?:survey_default_question_options.option_id = '".$params['option_id']."'";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:survey_default_question_options.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:survey_default_question_options.option_id ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_default_question_options ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Survey Default Question Option by id
	function getSurveyDefaultQuestionOptionByID($option_id)
	{
	  		$fields = array(
						'?:survey_default_question_options.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:survey_default_question_options.option_id = '".$option_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_default_question_options".$join." WHERE ".$condition);
			
			return $result->row();
	}
		
	//Update Survey Default Quesetion Option
	function updateSurveyDefaultQuestionOption($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('survey_default_question_options',$update_data);
		}
	}
	
	//Delete Survey Default Question Option
	function deleteSurveyDefaultQuestionOption($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('survey_default_question_options');
				
				return $this->db->affected_rows();
			}	
	}
	
	//Check Survey Section exist or not
	function checkSurveySectionExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('survey_sections');
			return $query->num_rows();
		}
	}
		  
	//Insert Survey Section
	function insertSurveySection($insert_data)
	{
	  	$this->db->insert('survey_sections',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Survey Sections
	function getSurveySections($params=array())
	{	
			$fields = array(
						'?:survey_sections.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
			
			if(!empty($params['voyage_id']))
			{
				$condition .= " AND ?:survey_sections.voyage_id = '".$params['voyage_id']."'";
			}
			
			if(!empty($params['survey_id']))
			{
				$condition .= " AND ?:survey_sections.survey_id = '".$params['survey_id']."'";
			}
						
			if(!empty($params['section_id']))
			{
				$condition .= " AND ?:survey_sections.section_id = '".$params['section_id']."'";
			}
			
			if(!empty($params['survey_id_in']))
			{
				$condition .= " AND ?:survey_sections.section_id IN (".$params['section_id_in'].")";
			}
			
			if(!empty($params['category_id']))
			{
				$condition .= " AND ?:survey_sections.category_id = '".$params['category_id']."'";
			}
			
			if(!empty($params['category']))
			{
				$condition .= " AND ?:survey_sections.category LIKE '%".$params['category_id']."%'";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:survey_sections.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:survey_sections.section_numeric_id ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_sections ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Survey Section by id
	function getSurveySectionByID($section_id)
	{
	  		$fields = array(
						'?:survey_sections.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:survey_sections.section_id = '".$section_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_sections".$join." WHERE ".$condition);
			
			return $result->row();
	}
		
	//Update Survey Section
	function updateSurveySection($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('survey_sections',$update_data);
		}
	}
	
	//Delete Survey Section
	function deleteSurveySection($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('survey_sections');
				
				return $this->db->affected_rows();
			}	
	}
	
	//Check Survey Questions exist or not
	function checkSurveyQuestionExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('survey_questions');
			return $query->num_rows();
		}
	}
		  
	//Insert Survey question
	function insertSurveyQuestion($insert_data)
	{
	  	$this->db->insert('survey_questions',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Survey Questions
	function getSurveyQuestions($params=array())
	{	
			$fields = array(
						'?:survey_questions.*'
			);
						
			$condition 	= $join = $group_by = $order = $limit =''; 
			
			$condition 	= 1;
			
			if(!empty($params['voyage_id']))
			{
				$condition .= " AND ?:survey_questions.voyage_id = '".$params['voyage_id']."'";
			}
			
			if(!empty($params['survey_id']))
			{
				$condition .= " AND ?:survey_questions.survey_id = '".$params['survey_id']."'";
			}
						
			if(!empty($params['section_id']))
			{
				$condition .= " AND ?:survey_questions.section_id = '".$params['section_id']."'";
			}
			
			if(!empty($params['question_id']))
			{
				$condition .= " AND ?:survey_questions.question_id = '".$params['question_id']."'";
			}
			
			if(!empty($params['question_type']))
			{
				$condition .= " AND ?:survey_questions.question_type = '".$params['question_type']."'";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:survey_questions.status = '".$params['status']."'";
			}
			
			if(!empty($params['get_all_options']) && $params['get_all_options'] == "Y")
			{
				$fields[] = 'GROUP_CONCAT(?:survey_question_options.language_variable ORDER BY ?:survey_question_options.option_numeric_id ASC) as all_options';
				$fields[] = 'GROUP_CONCAT(?:survey_question_options.option_name ORDER BY ?:survey_question_options.option_numeric_id ASC) as all_option_names';
				$fields[] = 'GROUP_CONCAT(?:survey_question_options.option_id ORDER BY ?:survey_question_options.option_numeric_id ASC) as all_option_ids';
				
				$fields[] = '?:survey_sections.category as section_title';
				
				$join		.= " LEFT JOIN ?:survey_question_options ON ?:survey_question_options.question_id = ?:survey_questions.question_id ";
				
				$join		.= " LEFT JOIN ?:survey_sections ON ?:survey_sections.section_id = ?:survey_questions.section_id ";
				
				$group_by	.= " GROUP BY ?:survey_questions.question_id";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'];
			}
			else
			{
				$order		= " ORDER BY ?:survey_questions.question_numeric_id ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_questions ".$join." WHERE ".$condition." ".$group_by." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Survey Question by id
	function getSurveyQuestionByID($question_id)
	{
	  		$fields = array(
						'?:survey_questions.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:survey_questions.question_id = '".$question_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_questions".$join." WHERE ".$condition);
			
			return $result->row();
	}
		
	//Update Survey Question
	function updateSurveyQuestion($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('survey_questions',$update_data);
		}
	}
	
	//Delete Survey Question
	function deleteSurveyQuestion($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('survey_questions');
				
				return $this->db->affected_rows();
			}	
	}
	
	//Check Survey Question Option exists or not
	function checkSurveyQuestionOptionExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('survey_question_options');
			return $query->num_rows();
		}
	}
		  
	//Insert Survey Question Option
	function insertSurveyQuestionOption($insert_data)
	{
	  	$this->db->insert('survey_question_options',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Survey Question Options
	function getSurveyQuestionOptions($params=array())
	{	
			$fields = array(
						'?:survey_question_options.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
						
			if(!empty($params['voyage_id']))
			{
				$condition .= " AND ?:survey_question_options.voyage_id = '".$params['voyage_id']."'";
			}
			
			if(!empty($params['survey_id']))
			{
				$condition .= " AND ?:survey_question_options.survey_id = '".$params['survey_id']."'";
			}
						
			if(!empty($params['section_id']))
			{
				$condition .= " AND ?:survey_question_options.section_id = '".$params['section_id']."'";
			}
			
			if(!empty($params['question_id']))
			{
				$condition .= " AND ?:survey_question_options.question_id = '".$params['question_id']."'";
			}
			
			if(!empty($params['option_id']))
			{
				$condition .= " AND ?:survey_question_options.option_id = '".$params['option_id']."'";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:survey_question_options.status = '".$params['status']."'";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:survey_question_options.option_numeric_id ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_question_options ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
	
	//Get Survey Question Options by id
	function getSurveyQuestionOptionByID($option_id)
	{
	  		$fields = array(
						'?:survey_question_options.*'
			);
						
			$condition 	= $join =''; 
			
			$condition 	= 1;
			
			$condition .= " AND ?:survey_question_options.option_id = '".$option_id."'";
						
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:survey_question_options".$join." WHERE ".$condition);
			
			return $result->row();
	}
		
	//Update Survey Question Option
	function updateSurveyQuestionOption($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('survey_question_options',$update_data);
		}
	}
	
	//Delete Survey Question Option
	function deleteSurveyQuestionOption($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('survey_question_options');
				
				return $this->db->affected_rows();
			}	
	}
	

	//Check Guest Survey Report exist or not
	function checkGuestSurveyReportExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('guest_survey_reports');
			return $query->num_rows();
		}
	}
		  
	//Insert Guest Survey Report
	function insertGuestSurveyReport($insert_data)
	{
	  	$this->db->insert('guest_survey_reports',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Guest Survey Reports
	function getGuestSurveyReports($params=array())
	{	
			$fields = array(
						'?:guest_survey_reports.*'
			);
						
			$condition 	= $join = $group_by = $order = $limit =''; 
			
			$condition 	= 1;
			
			if(!empty($params['voyage_id']))
			{
				$condition .= " AND ?:guest_survey_reports.voyage_id = '".$params['voyage_id']."'";
			}
			
			if(!empty($params['survey_id']))
			{
				$condition .= " AND ?:guest_survey_reports.survey_id = '".$params['survey_id']."'";
			}
						
			if(!empty($params['guest_id']))
			{
				$condition .= " AND ?:guest_survey_reports.guest_id = '".$params['guest_id']."'";
			}
			
			if(!empty($params['guest_language']) && $params['guest_language'] != "all")
			{
				$condition .= " AND ?:guest_survey_reports.guest_language = '".$params['guest_language']."'";
			}
			
			if(!empty($params['status']))
			{
				$condition .= " AND ?:guest_survey_reports.status = '".$params['status']."'";
			}
			
			if(!empty($params['is_report_options_count']) && $params['is_report_options_count'] == "Y")
			{
				$fields[] = '?:guest_survey_answers.*';
				$fields[] = 'count(?:guest_survey_answers.option_id) as option_count';
				
				$join		.= " LEFT JOIN ?:guest_survey_answers ON ?:guest_survey_answers.voyage_id = ?:guest_survey_reports.voyage_id  AND ?:guest_survey_answers.survey_id = ?:guest_survey_reports.survey_id AND ?:guest_survey_answers.guest_id = ?:guest_survey_reports.guest_id";
				
				$group_by .= "GROUP BY ?:guest_survey_answers.option_id";
			}
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'];
			}
			else
			{
				$order		= " ORDER BY ?:guest_survey_reports.updated_at ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:guest_survey_reports ".$join." WHERE ".$condition." ".$group_by." ".$order." ".$limit);
			
			return $result;
			
	}
		
	//Update Guest Survey Report
	function updateGuestSurveyReport($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('guest_survey_reports',$update_data);
		}
	}
	
	//Delete Guest Survey Report
	function deleteGuestSurveyReport($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('guest_survey_reports');
				
				return $this->db->affected_rows();
			}	
	}
	
	//Check Guest Survey Answer exist or not
	function checkGuestSurveyAnswerExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('guest_survey_answers');
			return $query->num_rows();
		}
	}
	
	//Insert Guest Survey Answer
	function insertGuestSurveyAnswer($insert_data)
	{
	  	$this->db->insert('guest_survey_answers',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Guest Survey Answers
	function getGuestSurveyAnswers($params=array())
	{	
			$fields = array(
						'?:guest_survey_answers.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
			
			if(!empty($params['voyage_id']))
			{
				$condition .= " AND ?:guest_survey_answers.voyage_id = '".$params['voyage_id']."'";
			}
			
			if(!empty($params['survey_id']))
			{
				$condition .= " AND ?:guest_survey_answers.survey_id = '".$params['survey_id']."'";
			}
			
			if(!empty($params['guest_id']))
			{
				$condition .= " AND ?:guest_survey_answers.guest_id = '".$params['guest_id']."'";
			}
						
			if(!empty($params['section_id']))
			{
				$condition .= " AND ?:guest_survey_answers.section_id = '".$params['section_id']."'";
			}
			
			if(!empty($params['question_id']))
			{
				$condition .= " AND ?:guest_survey_answers.question_id = '".$params['question_id']."'";
			}
			
			if(!empty($params['is_single_choice']) && $params['is_single_choice'] == "Y")
			{
				$condition .= " AND ( ?:guest_survey_answers.question_type = 'RATING' OR ?:guest_survey_answers.question_type = 'RADIOBUTTONS' )";
			}
			
			if(!empty($params['is_multiple_choice']) && $params['is_multiple_choice'] == "Y")
			{
				$condition .= " AND ?:guest_survey_answers.question_type = 'CHECKBOXES' ";
			}
			
						
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:guest_survey_answers.question_id ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:guest_survey_answers ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
		
	//Update Guest Survey Answer
	function updateGuestSurveyAnswer($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('guest_survey_answers',$update_data);
		}
	}
	
	//Delete Guest Survey Answer
	function deleteGuestSurveyAnswer($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('guest_survey_answers');
				
				return $this->db->affected_rows();
			}	
	}
	
	
	//Check Guest Survey comment exist or not
	function checkGuestSurveyCommentExists($condition)
	{
	  	if(is_array($condition) && count($condition) > 0 )
		{
			$this->db->where($condition);
			$query=$this->db->get('guest_survey_comments');
			return $query->num_rows();
		}
	}
	
	//Insert Guest Survey Comment
	function insertGuestSurveyComment($insert_data)
	{
	  	$this->db->insert('guest_survey_comments',$insert_data);
		return $this->db->insert_id();
	}
	
	//Get Guest Survey Comments
	function getGuestSurveyComments($params=array())
	{	
			$fields = array(
						'?:guest_survey_comments.*'
			);
						
			$condition 	= $join = $order = $limit =''; 
			
			$condition 	= 1;
			
			if(!empty($params['voyage_id']))
			{
				$condition .= " AND ?:guest_survey_comments.voyage_id = '".$params['voyage_id']."'";
			}
			
			if(!empty($params['survey_id']))
			{
				$condition .= " AND ?:guest_survey_comments.survey_id = '".$params['survey_id']."'";
			}
			
			if(!empty($params['guest_id']))
			{
				$condition .= " AND ?:guest_survey_comments.guest_id = '".$params['guest_id']."'";
			}
						
			if(!empty($params['section_id']))
			{
				$condition .= " AND ?:guest_survey_comments.section_id = '".$params['section_id']."'";
			}
							
			if(!empty($params['order_by']))
			{
				$order		= " ORDER BY ".$params['order_by'][0]." ".$params['order_by'][1];
			}
			else
			{
				$order		= " ORDER BY ?:guest_survey_comments.section_id ASC ";
			}
			
			//Limit
			if(!empty($params['per_page']))
			{
				$per_page 	= $params['per_page'];
				if(empty($params['position']))
				{
					$offset 	= 0;
				}
				else
				{
					$offset		= $params['position'];
				}	
			
				$limit		= "LIMIT ".$offset.",".$per_page;
			}
	  	  
	  		$result = $this->db->query("SELECT ".implode(',',$fields)." FROM ?:guest_survey_comments ".$join." WHERE ".$condition." ".$order." ".$limit);
			
			return $result;
			
	}
		
	//Update Guest Survey Comment
	function updateGuestSurveyComment($update_data,$update_cond)
	{
	  	if(is_array($update_cond) && count($update_cond) >0 )
		{
			$this->db->where($update_cond);
			$this->db->update('guest_survey_comments',$update_data);
		}
	}
	
	//Delete Guest Survey Comments
	function deleteGuestSurveyComment($conditions)
	{
	  		if(count($conditions)>0)		
	 		{
				$this->db->where($conditions);
			
				$this->db->delete('guest_survey_comments');
				
				return $this->db->affected_rows();
			}	
	}
}
?>