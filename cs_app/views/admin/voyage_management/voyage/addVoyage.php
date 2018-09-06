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
    		<a href="<?php echo admin_url('voyage/manageVoyages'); ?>" class="btn btn-info">Manage Voyage</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Create Voyage</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="add_voyage" name="add_voyage" method="post">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Start date</label>
                            <div class="col-sm-2">
                            	<input type="text" class="form-control validate[required]" id="start_date" name="start_date"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">End date</label>
                            <div class="col-sm-2">
                            	<input type="text" class="form-control validate[required]" id="end_date" name="end_date"> 
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
             
             You can create voyage here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>
<script src="<?php echo common_assets_url(); ?>/bootstrap-datetime-picker/js/moment.js"></script>
<script src="<?php echo common_assets_url(); ?>/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$(function () {
$('#start_date,#end_date').datetimepicker({
	format: 'DD-MM-YYYY'
});
$('#start_date').datetimepicker().on('dp.change', function (e) {
	var incrementDay = moment(new Date(e.date));
	incrementDay.add(1, 'days');
	$('#end_date').data('DateTimePicker').minDate(incrementDay);
	$(this).data("DateTimePicker").hide();
});

});
</script>