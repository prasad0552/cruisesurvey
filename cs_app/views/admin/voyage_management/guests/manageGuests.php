<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title">Voyage ID: <a href="<?php echo admin_url('voyage/editVoyage/'.$voyage_id); ?>"><?php echo $voyage_id; ?></a></h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('guests/deleteAllGuests/'.$voyage_id); ?>" class="confirm btn btn-info">Delete All Guests</a>
        	<a href="<?php echo admin_url('guests/importGuests/'.$voyage_id); ?>" class="btn btn-info">Import Guests</a>
        	<a href="<?php echo admin_url('guests/addGuest/'.$voyage_id); ?>" class="btn btn-info">Add Guest</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Data Table -->  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Guests</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="manage_guests" class="data-table table table-bordered table-striped data-table-responsive" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                      	<th data-priority = "1">ID</th>
                        <th data-priority = "1">GUest ID</th>
                        <th data-priority = "1">Name</th>
                        <th>Sex</th>
                        <th>Language</th>
                        <th>Status</th>
                        <?php if(isAuthorizedAdmin('manage_guests')) { ?>
                        <th data-priority = "2">Actions</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach($guests->result() as $guest) { ?>		
                      <tr>
                      	<td><?php echo $guest->guest_numeric_id; ?></td>
                        <td><?php echo $guest->guest_id; ?></td>
                        <td><?php echo $guest->firstname." ".$guest->lastname; ?></td>
                        <td><?php echo ($guest->sex == "M")?"Male":"Female"; ?></td>
                        <td><?php echo $guest->language; ?></td>
                        <td><?php echo ($guest->status == "A")?"Active":"Disabled"; ?></td>
                        <td>
                        	<div class="btn-group">
                              <button type="button" class="btn btn-info">Actions</button>
                              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                              </button>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="<?php echo admin_url('guests/editGuest/'.$guest->voyage_id.'/'.$guest->guest_id); ?>">Edit</a></li>
                                    <li><a class="confirm" href="<?php echo admin_url('guests/deleteGuest/'.$guest->voyage_id.'/'.$guest->guest_id); ?>">Delete</a></li>
                                  </ul>
                            </div>
                    	</td>
                      </tr>
                      <?php } ?>
                    
                    </tbody>
                    <tfoot>
                      <tr>
                      	<th>ID</th>
                        <th>Guest ID</th>
                        <th>Name</th>
                         <th>Sex</th>
                        <th>Language</th>
                        <th>Status</th>
                        <?php if(isAuthorizedAdmin('manage_guests')) { ?>
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
             
             You can manage Voyage here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>