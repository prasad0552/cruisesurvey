<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('voyage/addVoyage'); ?>" class="btn btn-info">Create Voyage</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Data Table -->  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Voyage</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="manage_voyages" class="data-table table table-bordered table-striped data-table-responsive" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th data-priority = "1">Voyage ID</th>
                        <th >Start Date</th>
                        <th >End Date</th>
                        <?php if(isAuthorizedAdmin('view_guests')) { ?>
                        <th data-priority = "1">Guests</th>
                        <?php } ?>
                        <?php if(isAuthorizedAdmin('view_surveys')) { ?>
                        <th>Surveys</th>
                        <?php } ?>
                        <th data-priority = "1">Status</th>
                        <?php if(isAuthorizedAdmin('manage_voyages')) { ?>
                        <th data-priority = "2">Actions</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach($voyages->result() as $voyage) { ?>
                      <tr>
                        <td><?php echo $voyage->voyage_id; ?></td>
                        <td><?php echo getDateFormat($voyage->start_date); ?></td>
                        <td><?php echo getDateFormat($voyage->end_date); ?></td>
                        <td><a href="<?php echo admin_url('guests/manageGuests/'.$voyage->voyage_id); ?>" class="btn btn-success"><i class="fa fa-user"></i> View Guests</a></td>
                        <td><a href="<?php echo admin_url('surveys/manageSurveys/'.$voyage->voyage_id); ?>" class="btn btn-primary"><i class="fa fa-check"></i> View Surveys</a></td>
                        <td><?php if($voyage->status == "A") echo "Active"; elseif($voyage->status == "D") echo "Disabled"; else echo "Closed"; ?></td>
                        <td>
                        	<div class="btn-group">
                              <button type="button" class="btn btn-info">Actions</button>
                              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                              </button>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo admin_url('voyage/editVoyage/'.$voyage->voyage_id); ?>">Edit</a></li>
                                    <li><a class="confirm" href="<?php echo admin_url('voyage/deleteVoyage/'.$voyage->voyage_id); ?>">Delete</a></li>
                                  </ul>
                            </div>
                    	</td>
                        
                      </tr>
                    <?php } ?>  
 

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Voyage ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Guests</th>
                        <th>Surveys</th>
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
             
             You can manage Voyage here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>