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
                  <h3 class="box-title">Update Profile</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="update_profile" name="update_profile" method="post" >
                              
                    <div class="box-body">
                    
                    <div class="row">
        				<div class="col-md-10">
                    
                    	<div class="form-group">
                            <label for="company_name" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required,custom[email]]" id="email" name="email" value="<?php echo $admin_details->email; ?>" > 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="firstname" class="col-sm-2 control-label">Firstname</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required]" id="firstname" name="firstname" value="<?php echo $admin_details->firstname; ?>" > 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="lastname" class="col-sm-2 control-label">Lastname</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required]" id="lastname" name="lastname" value="<?php echo $admin_details->lastname; ?>" > 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="password" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                            	<input type="password" class="form-control " id="password" name="password" > 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="confirm_password" class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-10">
                            	<input type="password" class="form-control validate[equals[password]]" id="confirm_password" name="confirm_password" > 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required]" id="phone" name="phone" value="<?php echo $admin_details->phone; ?>" > 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                            	<textarea placeholder="Enter address..." rows="3" class="form-control validate[required]" id="address" name="address"><?php echo $admin_details->address; ?></textarea>
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
             
             You can update your profile here.
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>