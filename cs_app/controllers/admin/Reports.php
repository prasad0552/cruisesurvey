<?php 

class Reports extends CI_Controller {
	
	public $outputData;		
	 
	function __construct() 
	{
        parent::__construct();
    }
	
	function index()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		redirect_admin('reports/generateSurveyReports');	
	}
	
	/* Survey Reports */
	function generateSurveyReports()
	{
		if(!isAdmin())
			redirect_admin('login');
			
		if(!isAuthorizedAdmin('generate_survey_reports'))
			redirect('admin_access_denied');	
		
		$options_count 	= array();
		$survey_reports	= array();
		
		if($this->input->post('view_report'))	
		{
			$voyage_id = $this->input->post('voyage_id');
			$survey_id = $this->input->post('survey_id');
			$section_id = $this->input->post('section_id');
			$question_type = $this->input->post('question_type');
			$language = $this->input->post('language');
			if(empty($voyage_id) || empty($survey_id) || empty($section_id) || empty($question_type) || empty($language))
			{
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Please select all the necessary inputs to generate the report'));
				//redirect_admin('reports/generateSurveyReports');	
			}
			
			$inputs = array('voyage_id' => $voyage_id,
							'survey_id' => $survey_id,
							'section_id'=> $section_id,
							'question_type' => $question_type,
							'language' => $language
							);
			
			$reports = $this->getSurveyReportsWithCounts($inputs);
			
			$options_count = $reports['options_count'];
			$survey_reports = $reports['survey_reports'];				
		}
		
		if($this->input->post('export_report'))	
		{
			$voyage_id = $this->input->post('voyage_id');
			$survey_id = $this->input->post('survey_id');
			$section_id = $this->input->post('section_id');
			$question_type = $this->input->post('question_type');
			$language = $this->input->post('language');
			if(empty($voyage_id) || empty($survey_id)  || empty($language))
			{
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Please select all the necessary inputs to generate the report'));
				redirect_admin('reports/generateSurveyReports');	
			}
			
			$inputs = array('voyage_id' => $voyage_id,
							'survey_id' => $survey_id,
							'section_id'=> $section_id,
							'question_type' => $question_type,
							'language' => $language
							);
			
			$reports = $this->getSurveyReportsWithCounts($inputs);
			
			$options_count = $reports['options_count'];
			$survey_reports = $reports['survey_reports'];
			
			if(!isset($survey_reports['sections']) && count($survey_reports['sections']) == 0)
			{
				$this->session->set_flashdata('flash_message', $this->admin_model->flash_message('error','Sorry no report found'));
				redirect_admin('reports/generateSurveyReports');
			}
			
			$general_settings = getGeneralSettings();
			
			//load our new PHPExcel library
			$this->load->library('excel');
			
			//White background excel
			$this->excel->getDefaultStyle()->applyFromArray(
				array( 
					'fill' => array(
					'type'  => PHPExcel_Style_Fill::FILL_SOLID,
					'color' => array('argb' => 'FFFFFFFF')
				),
    		));
			
			//Sheet1
			$this->excel->createSheet();
			$this->excel->setActiveSheetIndex(0);
			$this->excel->getActiveSheet()->setTitle($survey_reports['survey_title']);
			
			$sheet1_row_counter = 2;
			
			/* Sections Start */
			foreach($survey_reports['sections'] as $section_id => $section) 
			{ 
				
				$sheet1_title_row1 	= $sheet1_row_counter;
				
				/*foreach(range('B','Z') as $columnID) {
					$this->excel->getActiveSheet()->getColumnDimension($columnID)->setWidth(35);
				}*/
				
				//Style for title
				$styleArrayTitle = array(
					'font'  => array(
					'bold'  => true,
					'color' => array('rgb' => '000088'),
					'size'  => 15,
					'name'  => 'Cambria'
				));
				
				$column_name ="B";
				
				$this->excel->getActiveSheet()->getColumnDimension($column_name)->setWidth(70);
				
				//Title Row 1 Section Name
				$this->excel->getActiveSheet()->setCellValue($column_name.$sheet1_title_row1, ucfirst($section['section_title'])." ".strtoupper($survey_reports['language']));
				$this->excel->getActiveSheet()->getStyle($column_name.$sheet1_title_row1)->applyFromArray($styleArrayTitle);
				$this->excel->getActiveSheet()->getStyle($column_name.$sheet1_title_row1.':'.$column_name.$sheet1_title_row1)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$this->excel->getActiveSheet()->mergeCells($column_name.$sheet1_title_row1.':'.$column_name.$sheet1_title_row1);
				
				//Title Row 2 Cruise Name
				$styleArrayTitle['font']['size'] = 10;
				$sheet1_title_row2 = $sheet1_title_row1+1;
				$this->excel->getActiveSheet()->setCellValue($column_name.$sheet1_title_row2,$general_settings->cruise_name);
				$this->excel->getActiveSheet()->getStyle($column_name.$sheet1_title_row2)->applyFromArray($styleArrayTitle);
				$this->excel->getActiveSheet()->getStyle($column_name.$sheet1_title_row2.':'.$column_name.$sheet1_title_row2)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$this->excel->getActiveSheet()->mergeCells($column_name.$sheet1_title_row2.':'.$column_name.$sheet1_title_row2);
				
				//Title Row 2 Voyage ID
				$styleArrayTitle['font']['size'] = 10;
				$sheet1_title_row3 = $sheet1_title_row2+1;
				$this->excel->getActiveSheet()->setCellValue($column_name.$sheet1_title_row3,'Voyage : '.$survey_reports['voyage_id']);
				$this->excel->getActiveSheet()->getStyle($column_name.$sheet1_title_row3)->applyFromArray($styleArrayTitle);
				$this->excel->getActiveSheet()->getStyle($column_name.$sheet1_title_row3.':'.$column_name.$sheet1_title_row3)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
				$this->excel->getActiveSheet()->mergeCells($column_name.$sheet1_title_row3.':'.$column_name.$sheet1_title_row3);
				
				$sheet1_row_counter = $sheet1_title_row3+2;
				$sheet1_first_column_name = $column_name;
				$column_name++;
				$sheet1_second_column_name = $column_name;
				
				/* Groups start */
				if(isset($section['groups']) && count($section['groups']) > 0) 
				{
					foreach($section['groups'] as $group) {
					
					$column_name = $sheet1_first_column_name;
						
					$this->excel->getActiveSheet()->setCellValue($column_name.$sheet1_row_counter, 'Question');
					$column_name++;
					
					/* Options name start */
					if(isset($group['options']) && count($group['options']) > 0 ) {
						
						foreach($group['options'] as $option) {
							$this->excel->getActiveSheet()->setCellValue($column_name.$sheet1_row_counter, $option);
							$this->excel->getActiveSheet()->getColumnDimension($column_name)->setWidth(15);
							$column_name++;
						}
						$sheet1_last_column_name = $column_name--;
						
						//Style for table headers
						$styleArrayTitle = array(
							'font'  => array(
							'bold'  => true,
							'color' => array('rgb' => '000088'),
							'size'  => 12,
							'name'  => 'Cambria'
						));
						
						$this->excel->getActiveSheet()->getStyle($sheet1_first_column_name.$sheet1_row_counter.':'.$sheet1_last_column_name.$sheet1_row_counter)->applyFromArray($styleArrayTitle);
						$this->excel->getActiveSheet()->getStyle($sheet1_second_column_name.$sheet1_row_counter.':'.$sheet1_last_column_name.$sheet1_row_counter)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
						$this->excel->getActiveSheet()->getStyle($sheet1_first_column_name.$sheet1_row_counter.':'.$sheet1_last_column_name.$sheet1_row_counter)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
						$this->excel->getActiveSheet()->getStyle($sheet1_first_column_name.$sheet1_row_counter.':'.$sheet1_last_column_name.$sheet1_row_counter)->getAlignment()->setIndent(1);
			$this->excel->getActiveSheet()->getStyle($sheet1_first_column_name.$sheet1_row_counter.':'.$sheet1_last_column_name.$sheet1_row_counter)->getAlignment()->setWrapText(true);
			
					}
					/* Options name start */
					
					$sheet1_answers_start = $sheet1_row_counter+1;
					$sheet1_row_counter =  $sheet1_answers_start;
					
					/* Questions Start */
					if(isset($group['questions']) && count($group['questions']) > 0) {

						foreach($group['questions'] as $question) {
						
							$column_name = $sheet1_first_column_name;
								
							$this->excel->getActiveSheet()->setCellValue($column_name.$sheet1_row_counter, $question['question']);
							$column_name++;
							
							/* Options Start */
							if(isset($question['question_option_ids']) && count($question['question_option_ids']) > 0) {
							
							foreach($question['question_option_ids'] as $option_id) {	
								$option_count = (isset($options_count[$survey_reports['voyage_id']][$survey_reports['survey_id']][$section_id][$question['question_id']][$option_id]['count']))?$options_count[$survey_reports['voyage_id']][$survey_reports['survey_id']][$section_id][$question['question_id']][$option_id]['count']:0;
								
								$this->excel->getActiveSheet()->setCellValue($column_name.$sheet1_row_counter,$option_count);
								$column_name++;
							}
							
							}
							/* OPtions End */
							
							$sheet1_row_counter++;
						}
					}
					/* Questions End */
					
					$sheet1_answers_end = $sheet1_row_counter - 1;
				
					//Center the content in cells
					$this->excel->getActiveSheet()->getStyle($sheet1_second_column_name.$sheet1_answers_start.':'.$sheet1_last_column_name.$sheet1_answers_end)->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
					$this->excel->getActiveSheet()->getStyle($sheet1_first_column_name.$sheet1_answers_start.':'.$sheet1_last_column_name.$sheet1_answers_end)->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER);
					
					//Format the content
					$styleArrayContent = array(
						'font'  => array(
						'bold'  => false,
						'color' => array('rgb' => '000000'),
						'size'  => 12,
						'name'  => 'Cambria'
					));
		
					$this->excel->getActiveSheet()->getStyle($sheet1_first_column_name.$sheet1_answers_start.':'.$sheet1_last_column_name.$sheet1_answers_end)->applyFromArray($styleArrayContent);
					$this->excel->getActiveSheet()->getStyle($sheet1_first_column_name.$sheet1_answers_start.':'.$sheet1_last_column_name.$sheet1_answers_end)->getAlignment()->setIndent(1);
					$this->excel->getActiveSheet()->getStyle($sheet1_first_column_name.$sheet1_answers_start.':'.$sheet1_last_column_name.$sheet1_answers_end)->getAlignment()->setWrapText(true); 
					
					$sheet1_row_counter = $sheet1_row_counter + 2;
					
					}
				}
				/* Groups end */
				
				foreach(range($sheet1_first_column_name,$sheet1_last_column_name) as $columnID) {
					$this->excel->getActiveSheet()->getRowDimension()->setRowHeight(50);
				}
				
				$sheet1_row_counter = $sheet1_row_counter + 3;
			}
			/* Sections end */
			
			$cur_date = date('d-m-Y');
			$filename= $survey_reports['survey_title'].'-'.getLanguageName($survey_reports['language']).'.xls'; //save our workbook as this file name
			header('Content-Type: application/vnd.ms-excel'); //mime type
			header('Content-Disposition: attachment;filename="'.$filename.'"'); //tell browser what's the file name
			header('Cache-Control: max-age=0'); //no cache
						 
			//save it to Excel5 format (excel 2003 .XLS file), change this to 'Excel2007' (and adjust the filename extension, also the header mime type)
			//if you want to save it as .XLSX Excel 2007 format
			$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');  
			//force user to download the Excel file without writing it to server's HD
			$objWriter->save('php://output');					
		}
		

		$this->outputData['options_count']	= $options_count;
		$this->outputData['survey_reports']	= $survey_reports;
		
		//Get All voyages
		$this->outputData['voyages']		= $this->voyage_model->getVoyage();
		
		//Get Active Voyage ID
		$general_settings = getGeneralSettings();
		$active_voyage_id = $general_settings->active_voyage_id;
		$this->outputData['voyage_id'] = $active_voyage_id;
		
		//Get Active Lanaguages
		$params = array('status' => 'A');
		$this->outputData['languages']		= $this->languages_model->getLanguages($params);
		
		$this->outputData['main_content'] 	= 'admin/reports/surveys/generateSurveyReports';
		$this->load->view('admin/admin_template',$this->outputData);	
	}
	
	
	function getSurveyReportsWithCounts($inputs)
	{
		$voyage_id = $inputs['voyage_id'];
		$survey_id = $inputs['survey_id'];
		$section_id = $inputs['section_id'];
		$language = $inputs['language'];
		$question_type = $inputs['question_type'];
		
		//Get no of occurances of each option from survey report and answers
		$params = array(
					'voyage_id' => $voyage_id,
					'survey_id' => $survey_id,
					'section_id'=> $section_id,
					'status' => "FINISHED",
					'guest_language' => $language,
					'is_report_options_count' => "Y",
					'order_by' => '?:guest_survey_answers.question_id ASC, ?:guest_survey_answers.option_id ASC'
				);
		$report_results = $this->surveys_model->getGuestSurveyReports($params);

		$options_count = array();
		foreach($report_results->result() as $report_result)
		{
			$options_count[$report_result->voyage_id][$report_result->survey_id][$report_result->section_id][$report_result->question_id][$report_result->option_id]['count'] = $report_result->option_count;
		}
		
		$survey = $this->surveys_model->getSurveyById($survey_id);

		//Split questions and options based on its type
		$params = array(
					'voyage_id' => $voyage_id,
					'survey_id' => $survey_id,
					'section_id'=> $section_id,
					'question_type' => $question_type,
					'get_all_options' => "Y",
					'order_by' => '?:survey_questions.question_numeric_id ASC, ?:survey_question_options.option_numeric_id ASC'
				);
		$all_questions = $this->surveys_model->getSurveyQuestions($params); 
		
		$survey_reports = array('voyage_id' => $voyage_id,'survey_id' => $survey_id,'section_id' => $section_id,'question_type' => $question_type, 'language' => $language,'survey_title' => (isset($survey->survey_title))?$survey->survey_title:"");
		
		if($all_questions->num_rows() > 0)
		{
		foreach($all_questions->result() as $all_question)
		{
			$survey_reports['sections'][$all_question->section_id]['section_title'] = $all_question->section_title;
			
			if(isset($survey_reports['sections'][$all_question->section_id]['groups']))
			{
				$is_group_exist = "N";
				foreach($survey_reports['sections'][$all_question->section_id]['groups'] as $key => $survey_report)
				{
					if($survey_report['all_options'] == $all_question->all_options)
					{
						end($survey_reports['sections'][$all_question->section_id]['groups'][$key]['questions']);
						$question_key = key($survey_reports['sections'][$all_question->section_id]['groups'][$key]['questions']) + 1;
						
						$survey_reports['sections'][$all_question->section_id]['groups'][$key]['questions'][$question_key ] = array(
																'question_id' => $all_question->question_id,
																'question' => $all_question->question,
																'language_variable' => $all_question->language_variable,
																'question_option_ids' => explode(",",$all_question->all_option_ids)
															);
						$is_group_exist = "Y";									
					}	
				}
				
				if($is_group_exist == "N")
				{
						end($survey_reports['sections'][$all_question->section_id]['groups']);
						$key = key($survey_reports['sections'][$all_question->section_id]['groups']); 
						
						end($survey_reports['sections'][$all_question->section_id]['groups'][$key]['questions']);
						$question_key = key($survey_reports['sections'][$all_question->section_id]['groups'][$key]['questions']) + 1;
						
						$survey_reports['sections'][$all_question->section_id]['groups'][$key+1]['questions'][$question_key] = array(
																'question_id' => $all_question->question_id,
																'question' => $all_question->question,
																'language_variable' => $all_question->language_variable,
																'question_option_ids' => explode(",",$all_question->all_option_ids)
															);
						$survey_reports['sections'][$all_question->section_id]['groups'][$key+1]['all_options'] = $all_question->all_options;
						$survey_reports['sections'][$all_question->section_id]['groups'][$key+1]['options'] = explode(",",$all_question->all_option_names);						
				}
			}
			else
			{
						$survey_reports['sections'][$all_question->section_id]['groups'][0]['questions'][0] = array(
																'question_id' => $all_question->question_id,
																'question' => $all_question->question,
																'language_variable' => $all_question->language_variable,
																'question_option_ids' => explode(",",$all_question->all_option_ids)
															);
						$survey_reports['sections'][$all_question->section_id]['groups'][0]['all_options'] = $all_question->all_options;
						$survey_reports['sections'][$all_question->section_id]['groups'][0]['options'] = explode(",",$all_question->all_option_names);
						
			}
		}
		}
		
		return array('options_count' => $options_count,'survey_reports' => $survey_reports);
	}
	
	function ajaxGetSurveysList()
	{
		$voyage_id	= $this->input->post('voyage_id');
				
		if($voyage_id != "")
		{
			
			$params = array('voyage_id' => $voyage_id, 'status' => "A");
			$survey_results = $this->surveys_model->getSurveys($params);
			
			if($survey_results->num_rows() == 0)
			{
				$data['status'] = "error";
				$data['error'] = "no-survey-found";
				
				echo json_encode($data);
				exit;
			}
			
			$surveys = array();
			foreach($survey_results->result() as $survey_result)
			{
				$surveys[$survey_result->survey_id] = $survey_result->survey_title;
			}
			
			$data['surveys'] = $surveys;
			$data['status']	= "success";
		}
		else
		{
			$data['status']	= "error";
		}	
		
		echo json_encode($data);
		exit;
	}
	
	function ajaxGetSectionsList()
	{
		$voyage_id	= $this->input->post('voyage_id');
		$survey_id	= $this->input->post('survey_id');
				
		if($voyage_id != "" && $survey_id != "")
		{
			
			$params = array('voyage_id' => $voyage_id, 'survey_id' => $survey_id, 'status' => "A");
			$survey_section_results = $this->surveys_model->getSurveySections($params);
			
			if($survey_section_results->num_rows() == 0)
			{
				$data['status'] = "error";
				$data['error'] = "no-section-found";
				
				echo json_encode($data);
				exit;
			}
			
			$survey_sections = array();
			foreach($survey_section_results->result() as $survey_section_result)
			{
				$survey_sections[$survey_section_result->section_id] = $survey_section_result->category;
			}
			
			$data['survey_sections'] = $survey_sections;
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


/* End of file reports.php */
/* Location: ./system/application/controllers/admin/reports.php */
?>