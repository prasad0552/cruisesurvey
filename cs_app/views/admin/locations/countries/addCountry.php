<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">
    		<a href="<?php echo admin_url('admins/manageCountries'); ?>" class="btn btn-info">Manage Countries</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Add Country</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="add_country" name="add_country" method="post">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Country Code</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required]" id="country_code" name="country_code"> 
                            </div>
                        </div>
                        
                    	<div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required]" id="country_name" name="country_name"> 
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
             
             You can add country here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>