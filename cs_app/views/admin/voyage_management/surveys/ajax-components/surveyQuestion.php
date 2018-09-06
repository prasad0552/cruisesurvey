<div class="col-md-12 survey-question-container" data-section-count ="<?php echo $section_count; ?>" data-question-count ="<?php echo $question_count; ?>" >
<div class="form-group">
    <div class="form_top">
        <div class="form_common">
            <div class="col-md-8 form_common_left">
                <div class="form_heading">
                    <div class="form_blk input_main">
                        <input class="form-control survey-question" type="text" id="section_<?php echo $section_count; ?>_question_<?php echo $question_count; ?>" name="sections[<?php echo $section_count; ?>][questions][<?php echo $question_count; ?>][question]" value="<?php echo $question['question']; ?>" placeholder="Enter Question" />
                        <input class="survey-question-status" type="hidden" id="section_<?php echo $section_count; ?>_question_status_<?php echo $question_count; ?>" name="sections[<?php echo $section_count; ?>][questions][<?php echo $question_count; ?>][status]" value="<?php echo $question['status']; ?>" />
                    </div>
                    <div class="btn_blk">
                        <button type="button" class="btn btn-default btn-flat add-question-option <?php echo ($question['question_type'] == "RATING")?"hidden":""; ?>" title="Add option"><i class="fa fa-plus"></i></button>
                        <button type="button" class="btn btn-default btn-flat change-question-status" title="Change question status"><i class="fa <?php echo ($question['status']=="A")?"fa-toggle-on":"fa-toggle-off"; ?>"></i></button>
                        <button type="button" class="btn btn-default btn-flat remove-question" title="Remove question"><i class="fa fa-close"></i></button>
                    </div>

					<div class="survey-question-options">
					<?php 
							if(isset($question['options']) && count($question['options']) > 0) {
							$outputData = array(
											'question_type' => $question['question_type'],
											'options' => $question['options'],
											'section_count' => $section_count,
											'question_count' => $question_count
										);
					?>					
                    
                    <?php $this->load->view('admin/voyage_management/surveys/components/surveyQuestionOptions',$outputData); ?>
                    
                    <?php } ?>
                    </div>
                    
                    <!--form_labels-->
                </div>
            </div>
            <div class="col-md-4 form_common_right">
                <div class="form_drop">
                <select class="form-control select2 survey-question-type" id="section_<?php echo $section_count; ?>_question_type_<?php echo $question_count; ?>" name="sections[<?php echo $section_count; ?>][questions][<?php echo $question_count; ?>][question_type]" >
                <option value="RATING" <?php echo ($question['question_type'] == "RATING")?"SELECTED":""; ?>>Rating Template</option>
                <option value="RADIOBUTTONS" <?php echo ($question['question_type'] == "RADIOBUTTONS")?"SELECTED":""; ?>>Radion Buttons</option>
                <option value="CHECKBOXES" <?php echo ($question['question_type'] == "CHECKBOXES")?"SELECTED":""; ?>>Check Boxes</option>
                </select>
                </div>
            </div>
        </div>
        <!--form_common-->

    </div>
    <!--form_top-->
</div>
</div>


<script type="text/javascript">
//Add Question Option
$(".add-question-option").unbind('click').click(function() {
	
	var question_container = $(this).parents(".survey-question-container");
	section_count = question_container.data("section-count");
	question_count = question_container.data("question-count");
	var question_options = question_container.find(".survey-question-option");
	total_options = question_options.length
	option_count = parseInt(total_options) + 1;	
	var question_type = question_container.find(".survey-question-type").val();
			
	var dataString 	= "question_type="+question_type+"&section_count="+section_count+"&question_count="+question_count+"&option_count="+option_count;
	b_url = "<?php echo admin_url('surveys/ajaxAddSurveyQuestionOption'); ?>";
	$.ajax({
		type: "POST",
		url: b_url,
		data: dataString,
		success: function(data){
					var result = JSON.parse(data);
					if(result.status == "success")
					{

						//Append new option
						var question_option_container = question_container.find(".survey-question-option-container");
						question_option_container.find(".form-group").append(result.survey_question_option_html);
					}
					else
					{
						if(result.error == "rating-question-type-not-allowed")
						{
							Lobibox.notify('error', {
								title:false,
								icon: true,
								width:500,
								msg: "For the questions with rating type you can not add new option"
							});
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
				}
		});	
});

//Change Question Type
$(".survey-question-type").unbind('change').change(function(){
	
	var question_container = $(this).parents(".survey-question-container");
	section_count = question_container.data("section-count");
	question_count = question_container.data("question-count");
	var question_options = question_container.find(".survey-question-option");
	total_options = question_options.length

	question_type = $(this).val();
	
	var options_list = new Array();	
	
	$(question_options).each(function(){
		//options_list.push($(this).val());
	});
			
	var dataString 	= "question_type="+question_type+"&section_count="+section_count+"&question_count="+question_count+"&options_list="+options_list;
	b_url = "<?php echo admin_url('surveys/ajaxChangeSurveyQuestionType'); ?>";
	$.ajax({
		type: "POST",
		url: b_url,
		data: dataString,
		success: function(data){
					var result = JSON.parse(data);
					if(result.status == "success")
					{
						//Change Options
						var question_options_container = question_container.find(".survey-question-options");
						question_options_container.html(result.survey_question_option_html);
						
						if(result.question_type != "RATING")
						{
							question_container.find('.add-question-option').removeClass("hidden");
						}
						else
						{
							question_container.find('.add-question-option').addClass("hidden");
						}
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
$(".change-question-status").unbind('click').click(function() {
	
	var question_container = $(this).parents(".survey-question-container");
	var question_status = question_container.find(".survey-question-status");
	
	if(question_status.val() == "D")
	{
		//Set Active
		question_status.val("A");
		$(this).find('i').removeClass('fa-toggle-off');
		$(this).find('i').addClass('fa-toggle-on');
	}
	else
	{
		//Set Disable
		question_status.val("D");
		$(this).find('i').removeClass('fa-toggle-on');
		$(this).find('i').addClass('fa-toggle-off');
	}
});

//Remove Question
$(".remove-question").unbind('click').click(function() {
	var question_container = $(this).parents(".survey-question-container");
	question = question_container.find(".survey-question").val();
	msg = 'Are you sure want to remove the question "'+question+'" ?';
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
			question_container.remove();
		}
		}
	});		
});
</script>