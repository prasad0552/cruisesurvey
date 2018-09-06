<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">
            <a href="<?php echo admin_url('surveys/addSurveyDefaultTemplate'); ?>" class="btn btn-info">Add Survey Default Template</a>
    		<a href="<?php echo admin_url('surveys/manageSurveyDefaultTemplates'); ?>" class="btn btn-info">Manage Survey Default Templates</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Survey Default Template</h3>
                  <div class="box-tools pull-right">
                    <a href="<?php echo admin_url('home/downloadSampleCSV/import-default-template-questions.csv'); ?>" class="btn btn-info">Download Sample file</a>
                </div>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="edit_survey_default_template" name="edit_survey_default_template" method="post" enctype="multipart/form-data">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                    	<div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Template Name</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required]" id="template_name" name="template_name" value="<?php echo $survey_default_template->template_name; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Select Template Questions file</label>
                            <div class="col-sm-4">
                            	<input type="file" class="" id="input_default_template_questions_csv" name="input_default_template_questions_csv">
                                <?php if(!empty($survey_default_template->template_file)) { ?> 								
                                <a href="<?php echo admin_url('surveys/downloadTemplateFile/'.$survey_default_template->template_file); ?>" class="btn btn-info">Download <?php echo $survey_default_template->template_file; ?></a>
                                <?php } ?>
                                 <input type="hidden"  id="uploaded_template_file" name="uploaded_template_file" value="<?php echo (isset($survey_default_template->template_file))?$survey_default_template->template_file:""; ?>" >
                            </div>
                        </div>
                        
                        <div class="form-group">
                     		<label for="question" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                
                                <label class="col-sm-2">
                                  <input type="radio" class="validate[required]" <?php echo ($survey_default_template->status == "A")?"checked":""; ?> value="A" id="status" name="status">
                                  Active
                                </label>
                                
                                <label class="col-sm-2">
                                  <input type="radio" class="validate[required]" <?php echo ($survey_default_template->status == "D")?"checked":""; ?> value="D" id="status" name="status">
                                  Disabled
                                </label>
                                
                                </div>
                             </div>
                        </div>

                        </div>
                    </div>
                        
                    </div><!-- /.box-body -->
                    
                  	<div class="box-footer">
                        <input type="submit" class="btn btn-info pull-left" value="Update" />
                 	</div><!-- /.box-footer -->
                    

                    
                </form>
                
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can edit Survey Default Template here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>