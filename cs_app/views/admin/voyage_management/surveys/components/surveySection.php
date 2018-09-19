<div class="box box-default survey-section-container <?php echo ($section_count != 1)?"collapsed-box":""; ?>" data-section-count="<?php echo $section_count; ?>">
    <div class="box-header with-border">
        <h3 class="box-title survey-section"><?php echo getQuestionCategoryName($section['category_id']); ?></h3>
        <input class="survey-section-status" type="hidden" id="section_status_<?php echo $section_count; ?>" name="sections[<?php echo $section_count; ?>][status]" value="<?php echo $section['status']; ?>" />
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool change-section-status" title="Change section status"><i class="fa <?php echo ($section['status']=="A")?"fa-toggle-on":"fa-toggle-off"; ?>"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="collapse" title="Minimize section" ><i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool remove-section" title="Remove section"><i class="fa fa-trash-o"></i></button>
        </div>
    </div>
    <!-- /.box-header -->

    <div id="ocean_form_block" class="box-body">
        <div class="custom_forms_details">
            <div class="box-body custom_form">
                <div class="row">
                    <div class="col-md-12">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="element_left">
                                    <select class="form-control select2 question-category" id="section_<?php echo $section_count; ?>" name="sections[<?php echo $section_count; ?>][category_id]">
                                    <?php foreach($question_categories->result() as $question_category) { ?>
                                        <option <?php echo ($section['category_id'] == $question_category->category_id)?"SELECTED":""; ?> value="<?php echo $question_category->category_id; ?>" ><?php echo $question_category->category; ?></option>
                                    <?php } ?>    
                                    </select>
                                </div>
                                <!--element_left-->
                                <div class="element_right">
                                    <button type="button"class="btn btn-block btn-primary add-question">Add a Question</button>
                                </div>
                                <!--element_right-->
                            </div>
                            <!-- /.form-group -->
                        </div>
                        
						<div class="survey-questions">
                        <?php if(isset($section['questions']) && count($section['questions']) > 0) { 
								foreach($section['questions'] as $key => $question) {  
									$outputData = array( 'question' => $question,
														 'section_count' => $section_count,
														 'question_count' => $key
														 ); 
						?>
                        
                        <?php $this->load->view('admin/voyage_management/surveys/components/surveyQuestion',$outputData); ?>
                        
                        <?php } } ?>
                        </div>

                    </div>
                    <!-- /.col -->

                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.box-body -->
        </div>
        <!--custom_forms_details-->
    </div>
</div>

<script type="text/javascript">
//Add Question
$(".add-question").unbind('click').click(function() {
	
	var section_container = $(this).parents(".survey-section-container");
	section_count = section_container.data("section-count");
	var questions = section_container.find(".survey-question-container");
	total_questions = questions.length
	question_count = parseInt(total_questions) + 1;	
	
	var question_type = "RATING";
			
	var dataString 	= "question_type="+question_type+"&section_count="+section_count+"&question_count="+question_count;
	b_url = "<?php echo admin_url('surveys/ajaxAddSurveyQuestion'); ?>";
	$.ajax({
		type: "POST",
		url: b_url,
		data: dataString,
		success: function(data){
					var result = JSON.parse(data);
					if(result.status == "success")
					{
						//Load survey quesiton html
						var questions_container = section_container.find(".survey-questions");
						questions_container.append(result.survey_question_html);
					}
					else
					{
						Lobibox.notify('error', {
										title:false,
										icon: true,
										width:500,
										msg: "Something went wrong! Please try again"
									});
					}
				}
		});	
});

//Change Question Status
$(".change-section-status").unbind('click').click(function() {
	
	var section_container = $(this).parents(".survey-section-container");
	var section_status = section_container.find(".survey-section-status");
	
	if(section_status.val() == "D")
	{
		//Set Active
		section_status.val("A");
		$(this).find('i').removeClass('fa-toggle-off');
		$(this).find('i').addClass('fa-toggle-on');
	}
	else
	{
		//Set Disable
		section_status.val("D");
		$(this).find('i').removeClass('fa-toggle-on');
		$(this).find('i').addClass('fa-toggle-off');
	}
});

//Remove Section
$(".remove-section").unbind('click').click(function() {
	var section_container = $(this).parents(".survey-section-container");
	section = section_container.find(".question-category").find('option:selected').text();
	msg = 'Are you sure want to remove the section "'+section+'" ?';
	Lobibox.confirm({
		title: "Confirm",									
		msg: msg,
		buttons: {
			ok: {
				'class': 'lobibox-btn lobibox-btn-default',
				text: 'Yes',
				closeOnClick: true
			},
			cancel: {
				'class': 'lobibox-btn lobibox-btn-cancel',
				text: 'No',
				closeOnClick: true
			}
		},
		callback: function ($this, type, ev) {
		if(type == "ok")
		{
			section_container.remove();
		}
		}
	});		
});

</script>