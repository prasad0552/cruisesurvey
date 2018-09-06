<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('languages/addLanguage'); ?>" class="btn btn-info">Add Language</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Data Table -->  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Languages</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="manage_countries" class="data-table table table-bordered table-striped data-table-responsive" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th data-priority = "1">Language ID</th>
                        <th data-priority = "1">Language Code</th>
                        <th>Language Name</th>
                        <!-- <th data-priority = "2">Status</th> -->
                        <?php if(isAuthorizedAdmin('manage_languages')) { ?>
                        <th data-priority = "2">Actions</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    
                     <?php foreach($languages->result() as $language) { ?>
                      <tr>
                        <td><?php echo $language->language_id; ?></td>
                        <td><?php echo $language->language_code; ?></td>
                        <td><?php echo $language->language_name; ?></td>
                        <!-- <td>
                        <?php /* if(isAuthorizedAdmin('manage_languages')) { ?>	
                        	<div class="btn-group">
                              <button type="button" class="btn btn-info status-info"><?php echo ($language->status == "A")?"Active":"Disabled"; ?></button>
                              
                              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                              </button>
                              <ul class="dropdown-menu" role="menu">
                                    <li><a id="active" href="javascript:void(0);" onclick="changeLanguageStatus(<?php echo $language->language_id; ?>,'A',this);" >Active</a></li>
                                    <li><a id="disabled" href="javascript:void(0);" onclick="changeLanguageStatus(<?php echo $language->language_id; ?>,'D',this);">Disabled</a></li>
                                  </ul>

                            </div>
                        <?php } else { ?>  
                        	<?php echo ($language->status == "A")?"Active":"Disabled"; ?>      
                        <?php } */ ?>
                    	</td> -->
                        <?php if(isAuthorizedAdmin('manage_languages')) { ?>
                        <td>
                        	<div class="btn-group">
                              <button type="button" class="btn btn-info">Actions</button>
                              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                              </button>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo admin_url('languages/editLanguage/'.$language->language_id); ?>">Edit</a></li>
                                    <li><a class="confirm" href="<?php echo admin_url('languages/deleteLanguage/'.$language->language_id); ?>">Delete</a></li>
                                  </ul>
                            </div>
                    	</td>
                        <?php } ?>
                      </tr>
                      
                     <?php } ?>
                    
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Language ID</th>
                        <th>Language Code</th>
                        <th>Language Name</th>
                       <!-- <th>Status</th> -->
                        <?php if(isAuthorizedAdmin('manage_languages')) { ?>
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
             
             You can manage Countries here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>

<script type="text/javascript">
function changeLanguageStatus(language_id,status,that)
{
		$(that).parents('.dropdown-menu').after("<img style='margin:0 5px;' id='ajax_spinner' src='<?php echo image_url('ajax_loader_wave.gif'); ?>' />");
		var dataString 	= "language_id="+language_id+"&status="+status;
		b_url = "<?php echo admin_url('languages/UpdateLanguageStatus'); ?>";
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