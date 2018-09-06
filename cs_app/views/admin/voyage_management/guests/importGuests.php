<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title">Voyage ID: <a href="<?php echo admin_url('voyage/editVoyage/'.$voyage_id); ?>"><?php echo $voyage_id; ?></a></h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('guests/addGuest/'.$voyage_id); ?>" class="btn btn-info">Add Guest</a>
    		<a href="<?php echo admin_url('guests/manageGuests/'.$voyage_id); ?>" class="btn btn-info">Manage Guests</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Import Guests</h3>
                  <div class="box-tools pull-right">
                    <a href="<?php echo admin_url('home/downloadSampleCSV/import-guests.csv'); ?>" class="btn btn-info">Download Sample file</a>
                </div>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="import_guest" name="import_guest" method="post" enctype="multipart/form-data">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Voyage ID</label>
                            <div class="col-sm-2">
                            	<input type="text" disabled class="form-control validate[required]" id="voyage_id" name="voyage_id" value="<?php echo $voyage_id; ?>"> 
                            </div>
                        </div>
                        
                    	<div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Select Guests file</label>
                            <div class="col-sm-4">
                            	<input type="file" class="validate[required]" id="input_guests_csv" name="input_guests_csv"> 
                            </div>
                        </div>
                        
                        </div>
                    </div>
                        
                    </div><!-- /.box-body -->
                    
                  	<div class="box-footer">
                        <input type="submit" name="import" class="btn btn-info pull-left" value="Import" />
                 	</div><!-- /.box-footer -->
                    

                    
                </form>
                
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can import Guests to the voyage here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>