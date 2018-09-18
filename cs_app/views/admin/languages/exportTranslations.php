<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title">Export Translations</h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('languages/importTranslations'); ?>" class="btn btn-info">Import Translations</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Export</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="export_translations" name="export_translations" method="post" enctype="multipart/form-data">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Language</label>
                            <div class="col-sm-4">
                            	<select id="language_code" name="language_code" class="form-control validate[required]">
									<?php foreach($languages->result() as $language) { ?>
                                            <option value="<?php echo $language->language_code; ?>"><?php echo $language->language_name; ?></option>
                                    <?php } ?>        
                                </select>	
                            </div>
                        </div>
                        
                        </div>
                    </div>
                        
                    </div><!-- /.box-body -->
                    
                  	<div class="box-footer">
                        <input type="submit" name="import" class="btn btn-info pull-left" value="Export" />
                 	</div><!-- /.box-footer -->
                    

                    
                </form>
                
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can export translations here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>