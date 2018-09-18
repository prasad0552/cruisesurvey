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
                  <h3 class="box-title">Corporate Office Database Settings</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="db_settings" name="db_settings" method="post" enctype="multipart/form-data" >
                              
                    <div class="box-body">
                    
                    <div class="row">
        				<div class="col-md-10">
                        
                        <div class="form-group">
                            <label for="hostname" class="col-sm-2 control-label">Host Name</label>
                            <div class="col-xs-10">
                            	<input type="text" class="form-control validate[required]" id="hostname" name="hostname" value="<?php echo (isset($db_setting->hostname))?$db_setting->hostname:""; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="username" class="col-sm-2 control-label">User Name</label>
                            <div class="col-xs-10">
                            	<input type="text" class="form-control validate[required]" id="username" name="username" value="<?php echo (isset($db_setting->username))?$db_setting->username:""; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-xs-10">
                            	<input type="text" class="form-control validate[required]" id="password" name="password" value="<?php echo (isset($db_setting->password))?$db_setting->password:""; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="database_name" class="col-sm-2 control-label">Database Name</label>
                            <div class="col-xs-10">
                            	<input type="text" class="form-control validate[required]" id="database_name" name="database_name" value="<?php echo (isset($db_setting->database_name))?$db_setting->database_name:""; ?>"> 
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
             
             You can update Corporate Office Database Settings here.
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>