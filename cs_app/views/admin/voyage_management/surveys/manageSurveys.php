<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title">Voyage ID: <a href="<?php echo admin_url('voyage/editVoyage/'.$voyage_id); ?>"><?php echo $voyage_id; ?></a></h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('surveys/addSurvey/'.$voyage_id); ?>" class="btn btn-info">Create New Survey</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Data Table -->  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Surveys</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="manage_surveys" class="data-table table table-bordered table-striped data-table-responsive" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th data-priority = "1">Survey ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <?php if(isAuthorizedAdmin('manage_surveys')) { ?>
                        <th data-priority = "2">Actions</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    
                     <?php foreach($surveys->result() as $survey) { ?>
                      <tr>
                        <td><?php echo $survey->survey_id; ?></td>
                        <td><?php echo $survey->survey_title; ?></td>
                        <td><?php if($survey->status == "A") echo "Active"; elseif($survey->status == "D") echo "Disabled"; else echo "Closed"; ?></td>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Actions</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                          </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo admin_url('surveys/editSurvey/'.$survey->voyage_id.'/'.$survey->survey_id); ?>">Edit</a></li>
                                <li><a class="confirm" href="<?php echo admin_url('surveys/deleteSurvey/'.$survey->voyage_id.'/'.$survey->survey_id); ?>">Delete</a></li>
                              </ul>
                        </div>
                    	</td>
                      </tr>
                      
                     <?php } ?>
                    
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Survey ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <?php if(isAuthorizedAdmin('manage_surveys')) { ?>
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
             
             You can manage Surveys here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>

<script type="text/javascript">
function changeCountryStatus(country_id,status,that)
{
		$(that).parents('.dropdown-menu').after("<img style='margin:0 5px;' id='ajax_spinner' src='<?php echo image_url('ajax_loader_wave.gif'); ?>' />");
		var dataString 	= "country_id="+country_id+"&status="+status;
		b_url = "<?php echo admin_url('locations/UpdateCountryStatus'); ?>";
		$.ajax({
			type: "POST",
			url: b_url,
			data: dataString,
			success: function(data){
						var result = JSON.parse(data);
						if(result.status == "success")
						{
							$(that).parents('.btn-group').find('.status-info').html(result.status_info);
						}
					}
			});	
}
</script>