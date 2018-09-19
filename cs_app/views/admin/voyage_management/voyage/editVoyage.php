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
        	<a href="<?php echo admin_url('guests/manageGuests/'.$voyage->voyage_id); ?>" class="btn btn-success"><i class="fa fa-user"></i> View Guests</a>
            <a href="<?php echo admin_url('surveys/manageSurveys/'.$voyage->voyage_id); ?>" class="btn btn-primary"><i class="fa fa-check"></i> View Surveys</a>
    		<a href="<?php echo admin_url('voyage/manageVoyages'); ?>" class="btn btn-info">Manage Voyage</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Voyage</h3>
                  <div class="box-tools pull-right">
                  <?php if($voyage->status!='C') { ?>
                    <a href="<?php echo admin_url('voyage/closeVoyage/'.$voyage->voyage_id); ?>" class="confirm btn btn-danger">Close Voyage</a>
                  <?php } else { ?>  
                  <div class="color-palette-set">
                  	<div class="col-sm-10 bg-red-active color-palette"><span>Closed</span></div>
                  </div>  
                  <?php } ?>
                  </div>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="edit_voyage" name="edit_voyage" method="post">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                         <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Voyage id</label>
                            <div class="col-sm-2">
                            	<input type="text" readonly class="form-control validate[required]" id="voyage_id" name="voyage_id" value="<?php echo $voyage->voyage_id; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Start date</label>
                            <div class="col-sm-2">
                            	<input type="text" class="form-control validate[required]" id="start_date" name="start_date" value="<?php echo getDateFormat($voyage->start_date); ?>"  <?php echo ($has_survey == "Y")?"Disabled":""; ?> > 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">End date</label>
                            <div class="col-sm-2">
                            	<input type="text" class="form-control validate[required]" id="end_date" name="end_date" value="<?php echo getDateFormat($voyage->end_date); ?>" <?php echo ($has_survey == "Y")?"Disabled":""; ?>> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                     		<label for="question" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                
                                <label class="col-sm-2">
                                  <input type="radio" class="validate[required]" <?php echo ($voyage->status=='A')?"checked":""; ?> value="A" id="status" name="status">
                                  Active
                                </label>
                                
                                <label class="col-sm-2">
                                  <input type="radio" class="validate[required]" <?php echo ($voyage->status=='D')?"checked":""; ?> value="D" id="status" name="status">
                                  Disabled
                                </label>
                                
                                 <label class="col-sm-2">
                                  <input type="radio" class="validate[required]" <?php echo ($voyage->status=='C')?"checked":""; ?> value="C" id="status" name="status">
                                  Closed
                                </label>
                                
                                </div>
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
             
             You can update voyage here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>
<!-- TimePicker -->
<script src="<?php echo common_assets_url(); ?>/bootstrap-datetime-picker/js/moment.js"></script>
<script src="<?php echo common_assets_url(); ?>/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$(function () {
$('#start_date,#end_date').datetimepicker({
	useCurrent: false,
	format: 'DD-MM-YYYY'
});
$('#start_date').datetimepicker().on('dp.change', function (e) {
	var min_date = moment(new Date(e.date)).format('DD-MM-YYYY');
	$('#end_date').data('DateTimePicker').minDate(min_date);
	$('#end_date').val(min_date);
	$(this).data("DateTimePicker").hide();
});

$('#end_date').datetimepicker().on('dp.change', function (e) {
	var start_date = $("#start_date").val();
	var max_date = moment(new Date(e.date)).format('DD-MM-YYYY');
	
	if(max_date != moment().format('DD-MM-YYYY'))
	{
		$('#start_date').data('DateTimePicker').maxDate(max_date);	
	}
	$(this).data("DateTimePicker").hide();
});

});
</script>