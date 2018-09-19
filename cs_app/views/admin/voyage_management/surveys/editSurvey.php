<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title">Voyage ID: <a href="<?php echo admin_url('voyage/editVoyage/'.$survey->voyage_id); ?>"><?php echo $survey->voyage_id; ?></a></h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('surveys/addSurvey/'.$survey->voyage_id); ?>" class="btn btn-info">Create New Survey</a>
    		<a href="<?php echo admin_url('surveys/manageSurveys/'.$survey->voyage_id); ?>" class="btn btn-info">Manage Surveys</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Survey</h3>
                  <div class="box-tools pull-right">
                  <?php if($survey->status!='C') { ?>
                    <a href="<?php echo admin_url('surveys/closeSurvey/'.$survey->voyage_id.'/'.$survey->survey_id); ?>" class="confirm btn btn-danger">Close Survey</a>
                  <?php } else { ?>  
                  <div class="color-palette-set">
                  	<div class="col-sm-10 bg-red-active color-palette"><span>Closed</span></div>
                  </div>  
                  <?php } ?>
                  </div>
                </div><!-- /.box-header -->
                
                 <div class="nav-tabs-custom">
                        
                    <ul class="nav nav-tabs">
                      <li class="<?php echo ($active_tab == "general-content")?'active':''; ?>"><a href="#general-content" data-toggle="tab">General</a></li>
                      <li class="<?php echo ($active_tab == "questions-content")?'active':''; ?>"><a href="#questions-content" data-toggle="tab">Questions</a></li>
                    </ul>
                
                    <div class="tab-content">
                    
                   <!-- form start -->
                
                    
                   <div class="tab-pane <?php echo ($active_tab == "general-content")?'active':''; ?>" id="general-content">
                
                    <!-- form start -->
                    <form class="form-horizontal" id="edit_survey" name="edit_survey" method="post" enctype="multipart/form-data">
                    
    
                        <div class="box-body">
                        
                            <div class="row">
                            <div class="col-md-10">
                            
                            <div class="form-group">
                                <label for="survey_id" class="col-sm-2 control-label">Survey ID</label>
                                <div class="col-sm-4">
                                    <input type="text" class="form-control" readonly="readonly" id="survey_id" name="survey_id" value="<?php echo $survey->survey_id; ?>"> 
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="survey_title" class="col-sm-2 control-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control validate[required]" id="survey_title" name="survey_title" value="<?php echo $survey->survey_title; ?>"> 
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="survey_image" class="col-sm-2 control-label">Image</label>
                                <div class="col-xs-10">
                                    <input type="file" class="form-control survey_image_dropify" id="survey_image" name="survey_image" data-default-file="<?php echo ($survey->survey_image != "")?image_url("surveys/".$survey->voyage_id."/".$survey->survey_image):""; ?>">  
                                    
                                     <input type="hidden"  id="uploaded_survey_image" name="uploaded_survey_image" value="<?php echo (isset($survey->survey_image))?$survey->survey_image:""; ?>" >
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="question" class="col-sm-2 control-label">Template</label>
                                <div class="col-sm-10">
                                    <select id="survey_template_id" name="survey_template_id" <?php echo ($get_default_questions == "N")?"Disabled":""; ?>>
                                    <option value="">--Select Default Template--</option>
                                    <?php foreach($templates->result() as $template) { ?>
                                        <option value="<?php echo $template->template_id; ?>" <?php echo ($template->template_id == $survey->survey_template_id)?"selected":""; ?> ><?php echo $template->template_name; ?></option>
                                    <?php } ?>
                                    </select>
                                    
                                    <?php if($get_default_questions == "N") { ?> <input type="hidden" id="survey_template_id" name="survey_template_id" value="<?php echo $survey->survey_template_id; ?>" />  <?php } ?>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="status" class="col-sm-2 control-label">Status</label>
                                <div class="col-sm-10">
                                    <div class="radio">
                                    
                                    <label class="col-sm-2">
                                      <input type="radio" class="validate[required]" <?php echo ($survey->status=='A')?"checked":""; ?> value="A" id="status" name="status">
                                      Active
                                    </label>
                                    
                                    <label class="col-sm-2">
                                      <input type="radio" class="validate[required]" <?php echo ($survey->status=='D')?"checked":""; ?> value="D" id="status" name="status">
                                      Disabled
                                    </label>
                                    
                                    <label class="col-sm-2">
                                      <input type="radio" class="validate[required]" <?php echo ($survey->status=='C')?"checked":""; ?> value="C" id="status" name="status">
                                      Closed
                                    </label>
                                    
                                    </div>
                                 </div>
                            </div>
    
                            </div>
                        </div>
                            
                        </div><!-- /.box-body -->
                        
                        <div class="box-footer">
                            <input type="submit" class="btn btn-info pull-left" name="update_general" value="Update" />
                        </div><!-- /.box-footer -->

                    </form>
                    
                   </div>
                   
                   <div class="tab-pane <?php echo ($active_tab == "questions-content")?'active':''; ?>" id="questions-content">
                   		
                        <form id="survey_questions_form" name="survey_questions_form" method="post" >
                        
                        <input type="hidden" id="voyage_id" name="voyage_id" value="<?php echo $survey->voyage_id; ?>" />
                        <input type="hidden" id="survey_id" name="survey_id" value="<?php echo $survey->survey_id; ?>" />
                    
                    	<div class="survey-sections">
                        <?php if(isset($all_questions['sections']) && count($all_questions['sections']) > 0) { foreach($all_questions['sections'] as $key => $section) {  
								$outputData = array(
											'question_categoires' => $question_categories,
											'section' => $section,
											'section_count' => $key
										);
						?>
                   		
                        <?php $this->load->view('admin/voyage_management/surveys/components/surveySection',$outputData); ?>
                        
                        <?php } } ?>
                        </div>
                        
                        <div class="new_category">
                            <button type="button" class="btn btn-block btn-primary add-section">Add new section</button>
                        </div>
                        
                        <div class="bottom_btns">
                            <ul>
                            	<li>
                                	<input type="submit" name="cancel_questions" class="btn btn-block btn-primary" value="Cancel">
                                <li>
                                    <input type="submit" name="save_questions" class="btn btn-block btn-primary" value="Save">
                                </li>
                            </ul>
                        </div>
                        
                        </form>
                   
                   </div>
                   
                   </div>
                    
                </div>
                
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can edit Survey and it's questions here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>

<script type="text/javascript">
//Remove Survey Image
$(document).ready(function() {
	var drEvent =  $('.survey_image_dropify').dropify();
	drEvent.on('dropify.beforeClear', function(event, element){
		return confirm("Do you really want to delete?");
	});	
	drEvent.on('dropify.afterClear', function(event, element){ 
		var voyage_id   = "<?php echo $survey->voyage_id; ?>";
		var survey_id   = "<?php echo $survey->survey_id; ?>";
		var file_to_remove = "<?php echo $survey->survey_image; ?>";
		
		var dataString 		= "voyage_id="+voyage_id+"&survey_id="+survey_id+"&file_to_remove="+file_to_remove;
		b_url = "<?php echo admin_url('surveys/ajaxDeleteSurveyFile'); ?>";
		$.ajax({
			type: "POST",
			url: b_url,
			data: dataString,
			success: function(data){
						var result = JSON.parse(data);
						if(result.status == "SUCCESS")
						{
							$('#uploaded_survey_image').val("");
							alert('File Removed');
						}
						else
						{
							alert('Sorry! try again');
						}
					}
			});	
	});
});

//Loader while submit a form
$("#survey_questions_form").on('submit',function(){
setTimeout(function () {
	$(".loader").fadeIn();
});
});
	
//Add Section
$(".add-section").unbind('click').click(function() {
	
	var sections_container = $(".survey-sections");
	var sections = sections_container.find(".survey-section-container");
	total_sections = sections.length
	section_count = parseInt(total_sections) + 1;	
			
	var dataString 	= "section_count="+section_count;
	b_url = "<?php echo admin_url('surveys/ajaxAddSurveySection'); ?>";
	$.ajax({
		type: "POST",
		url: b_url,
		data: dataString,
		success: function(data){
					var result = JSON.parse(data);
					if(result.status == "success")
					{
						//Load survey seciton html
						sections_container.append(result.survey_section_html);
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
</script>