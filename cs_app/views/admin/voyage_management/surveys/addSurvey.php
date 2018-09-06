<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title">Voyage ID: <a href="<?php echo admin_url('voyage/editVoyage/'.$voyage_id); ?>"><?php echo $voyage_id; ?></a></h3>
    	<div class="box-tools pull-right">
    		<a href="<?php echo admin_url('surveys/manageSurveys/'.$voyage_id); ?>" class="btn btn-info">Manage Surveys</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Create Survey</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="add_survey" name="add_survey" method="post" enctype="multipart/form-data">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                    	<div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Title</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required]" id="survey_title" name="survey_title"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="service_image" class="col-sm-2 control-label">Image</label>
                            <div class="col-xs-10">
                            	<input type="file" class="form-control dropify" id="survey_image" name="survey_image" > 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Template</label>
                            <div class="col-sm-10">
                            	<select id="survey_template_id" name="survey_template_id">
                                <option value="">--Select Default Template--</option>
                                <?php foreach($templates->result() as $template) { ?>
                                	<option value="<?php echo $template->template_id; ?>"><?php echo $template->template_name; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                     		<label for="question" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                
                                <label class="col-sm-2">
                                  <input type="radio" class="validate[required]" value="A" id="status" name="status">
                                  Active
                                </label>
                                
                                <label class="col-sm-2">
                                  <input type="radio" class="validate[required]" checked="" value="D" id="status" name="status">
                                  Disabled
                                </label>
                                
                                </div>
                             </div>
                        </div>

                        </div>
                    </div>
                        
                    </div><!-- /.box-body -->
                    
                  	<div class="box-footer">
                        <input type="submit" class="btn btn-info pull-left" value="Add" />
                 	</div><!-- /.box-footer -->
                    

                    
                </form>
                
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can create survey here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>