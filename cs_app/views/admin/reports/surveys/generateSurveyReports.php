<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">

    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Survey Reports Generation</h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="survey_reports_generation_form" name="survey_reports_generation_form" method="post">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                        <div class="form-group">
                        <div class="col-md-6">
                            <label for="question" class="col-sm-4 control-label">Voyage ID</label>
                            <div class="col-sm-8">
                            	<select class="form-control validate[required]" id="voyage_id" name="voyage_id">
                                <option value="">-- Select Voyage ID --</option>
                                <?php if($voyages->num_rows() > 0) { foreach($voyages->result() as $voyage) { ?>
                                	<?php if(isset($survey_reports['voyage_id'])) { ?>
                                	<option <?php echo ($survey_reports['voyage_id'] == $voyage->voyage_id)?"SELECTED":""; ?> value="<?php echo $voyage->voyage_id; ?>"><?php echo $voyage->voyage_id; ?></option>
                                    <?php } else { ?>
                                    <option <?php echo ($voyage_id == $voyage->voyage_id)?"SELECTED":""; ?> value="<?php echo $voyage->voyage_id; ?>"><?php echo $voyage->voyage_id; ?></option>
                                    <?php } ?>
                                <?php } } ?>
                                </select>
                            	
                            </div>
                        </div> 
                        <div class="col-md-6"> 
                        	<label for="question" class="col-sm-4 control-label">Survey</label>
                            <div class="col-sm-8">
                            	<select class="form-control validate[required]" id="survey_id" name="survey_id">
                                <option value="">-- Select Survey ID --</option>
                                </select>
                            </div> 
                        </div>     
                        </div>
                        
                        <div class="form-group">
                        <div class="col-md-6">
                            <label for="question" class="col-sm-4 control-label">Section</label>
                            <div class="col-sm-8">
                            	<select class="form-control validate[required]" id="section_id" name="section_id">
                                <option value="">-- Select Section --</option>
                                </select>
                            </div>
                        </div>      
                        <div class="col-md-6">
                            <label for="question" class="col-sm-4 control-label">Question Type</label>
                            <div class="col-sm-8">
                            	<select class="form-control validate[required]" id="question_type" name="question_type">
                                <option value="">-- Select Type --</option>
                                <option <?php echo (isset($survey_reports['question_type']) && $survey_reports['question_type'] == "RATING")?"SELECTED":""; ?> value="RATING">RATING</option>
                                <option <?php echo (isset($survey_reports['question_type']) && $survey_reports['question_type'] == "RADIOBUTTONS")?"SELECTED":""; ?> value="RADIOBUTTONS">Single Choice (Radiobuttons)</option>
                                <option <?php echo (isset($survey_reports['question_type']) && $survey_reports['question_type'] == "CHECKBOXES")?"SELECTED":""; ?> value="CHECKBOXES">Multiple Choices (Checkboxes)</option>
                                </select>
                            </div>
                        </div>
                        </div>
                        
                        <div class="form-group">
                        <div class="col-md-6">
                            <label for="question" class="col-sm-4 control-label">Language</label>
                            <div class="col-sm-8">
                            	<select class="form-control validate[required]" id="language" name="language">
                                <option value="">-- Select Language --</option>
                                <option <?php echo (isset($survey_reports['language']) && $survey_reports['language'] == 'all')?"SELECTED":""; ?> value="all">All</option>
                                <?php foreach($languages->result() as $language) { ?>
                                        <option <?php echo (isset($survey_reports['language']) && $survey_reports['language'] == $language->language_code)?"SELECTED":""; ?> value="<?php echo $language->language_code; ?>"><?php echo $language->language_name; ?></option>
                                <?php } ?>  
                                </select>
                            </div>
                        </div>      
                        </div>
                        
                        </div>
                    </div>
                        
                    </div><!-- /.box-body -->
                    
                  	<div class="box-footer">
                      <input type="submit" id="export_report" name="export_report" class="btn btn-info pull-right margin" value="Export" />
                      <input type="submit" id="view_report" name="view_report" class="btn btn-info pull-right margin" value="View" />
                 	</div><!-- /.box-footer -->
                    

                    
                </form>
                
              </div>  	
              
              <?php if(isset($survey_reports['sections']) && count($survey_reports['sections']) > 0 ) { ?>
           	  <!-- Sections start -->
			  <?php foreach($survey_reports['sections'] as $section_id => $section) { ?>
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title"><?php echo $section['section_title']; ?></h3>
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                  </div>
                </div>
                <?php if(isset($section['groups']) && count($section['groups']) > 0) { ?>
                <!-- Groups start -->
                <?php foreach($section['groups'] as $group) { ?>
                <div class="box-body">
                  <table id="survey_reports" class="table table-bordered table-striped" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th data-priority = "1">Question</th>
                        <?php if(isset($group['options']) && count($group['options']) > 0 ) { ?>
                        <!-- Options name start -->
                        <?php foreach($group['options'] as $option) { ?>
                        <th data-priority = "1"><?php echo $option; ?></th>
                        <?php } ?>
                        <!-- Options name end -->
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    
					
                     <?php if(isset($group['questions']) && count($group['questions']) > 0) { ?>
                     <!-- Questions start -->
                     <?php foreach($group['questions'] as $question) { ?>	
                     <tr>
                     <td><?php echo $question['question']; ?></td>
                     <?php if(isset($question['question_option_ids']) && count($question['question_option_ids']) > 0) { ?>
                     <!-- Option counts start -->
                     <?php foreach($question['question_option_ids'] as $option_id) { ?>
                     <td><?php echo(isset($options_count[$survey_reports['voyage_id']][$survey_reports['survey_id']][$section_id][$question['question_id']][$option_id]['count']))?$options_count[$survey_reports['voyage_id']][$survey_reports['survey_id']][$section_id][$question['question_id']][$option_id]['count']:0; ?></td>
                     <?php } ?>
                     <!-- Option counts end -->
                     <?php } ?>
                     </tr> 
                     <?php } ?>
                     <!-- Questions end -->
                     <?php } ?>
                    
                    </tbody>
                  </table>
                </div>
                <?php } ?>
                <!-- Groups end -->
                <?php } ?>
              </div>
              <?php } ?>
              <!-- Sections end -->
              <?php } else { ?>
              <div class="no_results">
                <h2> No report found </h2>
              </div>
              <?php } ?>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can generate reports here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>


<script type="text/javascript">

$(document).ready(function(){
	ajaxGetSurveysList();	
});

$("#voyage_id").on('change',function(){
	ajaxGetSurveysList();
});

//Ajax Get Surveys List
function ajaxGetSurveysList()
{
	voyage_id = $("#voyage_id").val();
	var dataString 	= "voyage_id="+voyage_id;
	b_url = "<?php echo admin_url('reports/ajaxGetSurveysList'); ?>";
	$.ajax({
	type: "POST",
	url: b_url,
	data: dataString,
	success: function(data){
			
			$('#survey_id').find('option:not(:first)').remove();
			 
			var result = JSON.parse(data);
			if(result.status == "success")
			{
				$.each(result.surveys, function(key, value) {
					
					 $('#survey_id')
						 .append($("<option></option>")
						 .attr("value",key)
						 .text(value));	 
				});
				
				<?php if(isset($survey_reports['survey_id'])) { ?> $('#survey_id').val('<?php echo $survey_reports['survey_id']; ?>'); <?php } ?>
			}
			else
			{
				if(result.error == "no-survey-found")
				{
					Lobibox.notify('error', {
									title:false,
									icon: true,
									width:500,
									msg: "No survey is found for this voyage id."
								});
				}		
			}
			
			ajaxGetSectionsList();
		}
	});	
}


$("#survey_id").on('change',function(){
	ajaxGetSectionsList();
});

//Ajax Get Sections List
function ajaxGetSectionsList()
{
	voyage_id = $("#voyage_id").val();
	survey_id = $("#survey_id").val();
	var dataString 	= "voyage_id="+voyage_id+"&survey_id="+survey_id;
	b_url = "<?php echo admin_url('reports/ajaxGetSectionsList'); ?>";
	$.ajax({
	type: "POST",
	url: b_url,
	data: dataString,
	success: function(data){
			
			$('#section_id').find('option:not(:first)').remove();
				
			var result = JSON.parse(data);
			if(result.status == "success")
			{
				$.each(result.survey_sections, function(key, value) {
					
					 $('#section_id')
						 .append($("<option></option>")
						 .attr("value",key)
						 .text(value));	 
				});
				
				<?php if(isset($survey_reports['section_id'])) { ?> $('#section_id').val('<?php echo $survey_reports['section_id']; ?>'); <?php } ?>
			}
			else
			{
				if(result.error == "no-section-found")
				{
					Lobibox.notify('error', {
									title:false,
									icon: true,
									width:500,
									msg: "No section is found for this survey."
								});
				}		
			}
		}
	});	
}
</script>