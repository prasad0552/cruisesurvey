<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">
    		<a href="<?php echo admin_url('languages/addLanguage'); ?>" class="btn btn-info">Add Language</a>
            <a href="<?php echo admin_url('languages/manageLanguages'); ?>" class="btn btn-info">Manage Languages</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Language</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="edit_language" name="edit_language" method="post">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Language Code</label>
                            <div class="col-sm-2">
                            	<input type="text" class="form-control validate[required]" id="language_code" name="language_code" value="<?php echo (isset($language->language_code))?$language->language_code:""; ?>"> 
                            </div>
                        </div>
                        
                    	<div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Language Name</label>
                            <div class="col-sm-4">
                            	<input type="text" class="form-control validate[required]" id="language_name" name="language_name" value="<?php echo (isset($language->language_name))?$language->language_name:""; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                             <label for="question" class="col-sm-2 control-label">Status</label>
                             <div class="col-sm-10">
                                <div class="radio">
                                
                                <label class="col-sm-2">
                                  <input type="radio" class="validate[required]" <?php echo ($language->status=='A')?"checked":""; ?> value="A" id="status" name="status">
                                  Active
                                </label>
                                
                                <label class="col-sm-2">
                                  <input type="radio" class="validate[required]" <?php echo ($language->status=='D')?"checked":""; ?> value="D" id="status" name="status">
                                  Disabled
                                </label>
                                
                                </div>
                                
                             </div>
                    	</div>

                        </div>
                    </div>
                        
                    </div><!-- /.box-body -->
                    
                  	<div class="box-footer">
                        <input type="submit" class="btn btn-info pull-left" value="Save" />
                 	</div><!-- /.box-footer -->
            
                    
                </form>
                
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can edit Language information here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>