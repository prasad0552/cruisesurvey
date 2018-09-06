<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">
            <a href="<?php echo admin_url('surveys/addSurveyDefaultTemplate'); ?>" class="btn btn-info">Add Survey Default Template</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Data Table -->  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Survey Default Templates</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="manage_countries" class="data-table table table-bordered table-striped data-table-responsive" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th data-priority = "1">Template ID</th>
                        <th>Template Name</th>
                        <th>Status</th>
                        <?php if(isAuthorizedAdmin('manage_survey_default_templates')) { ?>
                        <th data-priority = "2">Actions</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    
                     <?php foreach($survey_default_templates->result() as $survey_default_template) { ?>
                      <tr>
                        <td><?php echo $survey_default_template->template_id; ?></td>
                        <td><?php echo $survey_default_template->template_name; ?></td>
                        <td><?php echo ($survey_default_template->status == "A")?"Active":"Disabled"; ?></td>
                        <?php if(isAuthorizedAdmin('manage_survey_default_templates')) { ?>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Actions</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                          </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo admin_url('surveys/editSurveyDefaultTemplate/'.$survey_default_template->template_id); ?>">Edit</a></li>
                                <li><a class="confirm" href="<?php echo admin_url('surveys/deleteSurveyDefaultTemplate/'.$survey_default_template->template_id); ?>">Delete</a></li>
                              </ul>
                        </div>
                    	</td>
                        <?php } ?>
                      </tr>
                      
                     <?php } ?>
                    
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Template ID</th>
                        <th>Template Name</th>
                        <th>Status</th>
                        <?php if(isAuthorizedAdmin('manage_survey_default_templates')) { ?>
                        <th>Actions</th>
                        <?php } ?>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can manage Survey Default Templates here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>