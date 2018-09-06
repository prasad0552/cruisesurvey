<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('admins/addAdmin'); ?>" class="btn btn-info">Add Admin</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Data Table -->  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Admins</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="manage_admins" class="data-table table table-bordered table-striped data-table-responsive" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th data-priority = "1">Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th data-priority = "2">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                     <?php foreach($admins->result() as $admin) { ?>
                      <tr>
                        <td><?php echo $admin->admin_id; ?></td>
                        <td><?php echo $admin->firstname." ".$admin->lastname; ?></td>
                        <td><?php echo $admin->email; ?></td>
                        <td><?php echo ($admin->status=="A")?"Active":"Disabled"; ?></td>
                        <td>
                        	<div class="btn-group">
                              <button type="button" class="btn btn-info">Actions</button>
                              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                              </button>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo admin_url('admins/editAdmin/'.$admin->admin_id); ?>">Edit</a></li>
                                    <li><a class="confirm" href="<?php echo admin_url('admins/deleteAdmin/'.$admin->admin_id); ?>">Delete</a></li>
                                  </ul>
                            </div>
                    	</td>
                      </tr>
                      
                     <?php } ?>
                    
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Actions</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can manage Admins here.
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>