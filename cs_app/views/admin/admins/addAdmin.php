<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">
    		<a href="<?php echo admin_url('admins/manageAdmins'); ?>" class="btn btn-info">Manage Admins</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Add Admin</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="add_admin" name="add_admin" method="post">
                
                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                        <?php /*
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Role</label>
                            <div class="col-sm-10">
                            	<select class="form-control validate[required]" id="role_id" name="role_id">
                                     <option value="">select role</option>
                                     <?php foreach($roles->result() as $role) { ?>
                                     <option value ="<?php echo $role->role_id; ?>"><?php echo $role->role_name; ?></option>
                                     <?php } ?>
                                </select>
                            </div>
                        </div>
						*/ ?>
                    
                    	<div class="form-group">
                            <label for="question" class="col-sm-2 control-label">First name</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required]" id="firstname" name="firstname"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Last name</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required]" id="lastname" name="lastname"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required,custom[email],ajax[checkAdminEmailExists]]" id="email" name="email"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-10">
                            	<input type="password" class="form-control validate[required]" id="password" name="password"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Confirm Password</label>
                            <div class="col-sm-10">
                            	<input type="password" class="form-control validate[required,equals[password]]" id="confirm_password" name="confirm_password"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Phone</label>
                            <div class="col-sm-10">
                            	<input type="text" class="form-control validate[required]" id="phone" name="phone"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10">
                            	<textarea placeholder="Enter address..." rows="3" class="form-control validate[required]" id="address" name="address"></textarea>
                            </div>
                        </div>
                        
                     <div class="form-group">
                     <label for="question" class="col-sm-2 control-label">Status</label>
                     <div class="col-sm-10">
                      	<div class="radio">
                        
                        <label class="col-sm-2">
                          <input type="radio" class="validate[required]" checked="" value="A" id="status" name="status">
                          Active
                        </label>
                        
                        <label class="col-sm-2">
                          <input type="radio" class="validate[required]" value="D" id="status" name="status">
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
             
             You can add admin here.
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>