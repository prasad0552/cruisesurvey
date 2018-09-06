<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">General Settings</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="general_settings" name="general_settings" method="post" enctype="multipart/form-data" >
                              
                    <div class="box-body">
                    
                    <div class="row">
        				<div class="col-md-10">
                        
                        <div class="form-group">
                            <label for="cruise_name" class="col-sm-2 control-label">Cruise Name</label>
                            <div class="col-xs-10">
                            	<input type="text" class="form-control validate[required]" id="cruise_name" name="cruise_name" value="<?php echo (isset($general->cruise_name))?$general->cruise_name:""; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="cruise_code" class="col-sm-2 control-label">Cruise Code</label>
                            <div class="col-xs-2">
                            	<input type="text" class="form-control" id="cruise_code" name="cruise_code" value="<?php echo (isset($general->cruise_code))?$general->cruise_code:""; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="cruise_logo" class="col-sm-2 control-label">Cruise Logo</label>
                            <div class="col-xs-10">
                            	<input type="file" class="form-control cruise_logo_dropify" id="cruise_logo" name="cruise_logo" data-allowed-file-extensions="png" data-default-file="<?php echo ($general->cruise_logo != "")?image_url("logo/".$general->cruise_logo):""; ?>" > 
                                <input type="hidden"  id="uploaded_cruise_logo" name="uploaded_cruise_logo" value="<?php echo (isset($general->cruise_logo))?$general->cruise_logo:""; ?>" > 
                                
                                <div class="input-group tool-tip" data-toggle="tooltip" data-placement="right" data-original-title="Alternative text / title">
                                <span class="input-group-addon"><i class="fa fa-comment"></i></span>
                                <input type="text" class="form-control" id="cruise_logo_alternate_text" name="cruise_logo_alternate_text" value="<?php echo (isset($general->cruise_logo_alternate_text))?$general->cruise_logo_alternate_text:""; ?>"> 
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="fav_icon" class="col-sm-2 control-label">Fav icon</label>
                            <div class="col-xs-10">
                            	<input type="file" class="form-control fav_icon_dropify" id="fav_icon" name="fav_icon" data-allowed-file-extensions="ico" data-default-file="<?php echo ($general->fav_icon != "")?image_url("fav_icon/".$general->fav_icon):""; ?>" > 
                                <input type="hidden"  id="uploaded_fav_icon" name="uploaded_fav_icon" value="<?php echo (isset($general->fav_icon))?$general->fav_icon:""; ?>" > 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_offline" class="col-sm-2 control-label">Guest Password Scheme</label>
                            <div class="col-xs-4">
                            	<select id="guest_password_scheme" name="guest_password_scheme" class="form-control validate[required]">
                                    <option value="FCI" <?php echo ($general->guest_password_scheme == "FCI")?"SELECTED":""; ?> >Frequent Cruiser ID</option>
                                    <option value="RANDOM" <?php echo ($general->guest_password_scheme == "RANDOM")?"SELECTED":""; ?> >Random</option>
                                </select>
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label for="cruise_code" class="col-sm-2 control-label">Active Voyage Id</label>
                            <div class="col-xs-4">
                            	<input type="text" class="form-control" id="active_voyage_id" name="active_voyage_id" value="<?php echo (isset($general->active_voyage_id))?$general->active_voyage_id:""; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="site_offline" class="col-sm-2 control-label">Is survey editable ?</label>
                            <div class="col-sm-10">
                            	<div class="radio">
                        
                                    <label class="col-sm-1">
                                      <input type="radio" class="validate[required]" <?php echo ($general->is_survey_editable=='Y')?"checked":""; ?> value="Y" id="is_survey_editable_yes" name="is_survey_editable">
                                      Yes
                                    </label>
                                    
                                    <label class="col-sm-1">
                                      <input type="radio" class="validate[required]" <?php echo ($general->is_survey_editable=='N')?"checked":""; ?> value="N" id="is_survey_editable_no" name="is_survey_editable">
                                      No
                                    </label>
                                    
                                </div>
                            </div>
                        </div>
                        
                       	<div class="form-group">
                            <label for="site_offline" class="col-sm-2 control-label">Site Offline</label>
                            <div class="col-sm-2">
                            	<div class="checkbox">
                                <label>
                            	<input type="checkbox" id="site_offline" name="site_offline" <?php echo (isset($general->site_offline) && $general->site_offline == "Y")?"checked":""; ?> value="Y"> 
                                </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="cruise_admin_email" class="col-sm-2 control-label">Cruise Admin Email</label>
                            <div class="col-xs-10">
                            	<input type="text" class="form-control validate[required,custom[email]]" id="cruise_admin_email" name="cruise_admin_email" value="<?php echo (isset($general->cruise_admin_email))?$general->cruise_admin_email:""; ?>"> 
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
             
             You can update Cruise General settings here.
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>

<script type="text/javascript">
    $(document).ready(function() {
        var drEvent =  $('.cruise_logo_dropify').dropify();
		drEvent.on('dropify.beforeClear', function(event, element){
			return confirm("Do you really want to delete?");
		});	
		drEvent.on('dropify.afterClear', function(event, element){ 
			var file_to_remove = "<?php echo (isset($general->cruise_logo))?$general->cruise_logo:""; ?>";
			
			var dataString 		= "file_to_remove="+file_to_remove;
			b_url = "<?php echo admin_url('settings/ajaxDeleteLogo'); ?>";
			$.ajax({
				type: "POST",
				url: b_url,
				data: dataString,
				success: function(data){
							var result = JSON.parse(data);
							if(result.status == "SUCCESS")
							{
								$('#uploaded_cruise_logo').val("");
								$('#cruise_logo_alternate_text').val("");
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
</script>

<script type="text/javascript">
    $(document).ready(function() {
        var drEvent =  $('.fav_icon_dropify').dropify();
		drEvent.on('dropify.beforeClear', function(event, element){
			return confirm("Do you really want to delete?");
		});	
		drEvent.on('dropify.afterClear', function(event, element){ 
			var file_to_remove = "<?php echo (isset($general->fav_icon))?$general->fav_icon:""; ?>";
			
			var dataString 		= "file_to_remove="+file_to_remove;
			b_url = "<?php echo admin_url('settings/ajaxDeleteFavicon'); ?>";
			$.ajax({
				type: "POST",
				url: b_url,
				data: dataString,
				success: function(data){
							var result = JSON.parse(data);
							if(result.status == "SUCCESS")
							{
								$('#uploaded_fav_icon').val("");
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
</script>