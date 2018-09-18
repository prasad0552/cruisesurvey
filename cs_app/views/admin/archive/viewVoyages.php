<!-- TimePicker -->
<link rel="stylesheet" href="<?php echo common_assets_url(); ?>/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css">  

<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">
       
    	</div>
    </div><!-- /.box-header -->
    
    <div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">View & Delete Voyage</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="view_voyages" name="view_voyages" method="post" >
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                    	<div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Start date</label>
                            <div class="col-sm-2">
                            	<input type="text" class="form-control validate[required]" id="start_date" name="start_date" value="<?php echo getDateFormat($params['start_date']); ?>" > 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">End date</label>
                            <div class="col-sm-2">
                            	<input type="text" class="form-control validate[required]" id="end_date" name="end_date" value="<?php echo getDateFormat($params['end_date']); ?>" > 
                            </div>
                        </div>
                        
                        </div>
                    </div>
                        
                    </div><!-- /.box-body -->
                    
                  	<div class="box-footer">
                    <div class="bottom_btns">
                    <ul>
                    <li><input type="submit" id="view" name="view" class="btn btn-info pull-right" value="View" /></li>
                    <li><input type="submit" id="delete" name="delete" class="btn btn-info pull-right" value="Delete" /></li>
                    </ul>
                    </div>
                 	</div><!-- /.box-footer -->
                    

                    
                </form>
                
              </div>

            </div>
		</div><!-- /.row -->
        
	</div>
    
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
                        <td><?php if($voyage->status == "A") echo "Active"; elseif($voyage->status == "D") echo "Disabled"; else echo "Closed"; ?></td>
                        <?php if(isAuthorizedAdmin('manage_voyages')) { ?>
                        <td>
                        	<div class="btn-group">
                              <button type="button" class="btn btn-info">Actions</button>
                              <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                              </button>
                                  <ul class="dropdown-menu" role="menu">

                                    <li><a class="confirm" href="<?php echo admin_url('archive/deleteSingleVoyage/'.$voyage->voyage_id); ?>">Delete</a></li>
                                  </ul>
                            </div>
                    	</td>
                        <?php } ?>
                        
                      </tr>
                    <?php } ?>  
 

                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Voyage ID</th>
                        <th>Start Date</th>
                        <th>End Date</th>
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


<script src="<?php echo common_assets_url(); ?>/bootstrap-datetime-picker/js/moment.js"></script>
<script src="<?php echo common_assets_url(); ?>/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$(function () {
$('#start_date').datetimepicker({
	format: 'DD-MM-YYYY'
});
$('#end_date').datetimepicker({
	format: 'DD-MM-YYYY'	
});
$('#start_date').datetimepicker().on('dp.change', function (e) {
	var incrementDay = moment(new Date(e.date));
	incrementDay.add(0, 'days');
	$('#end_date').data('DateTimePicker').minDate(incrementDay);
	$(this).data("DateTimePicker").hide();
});

});
</script>