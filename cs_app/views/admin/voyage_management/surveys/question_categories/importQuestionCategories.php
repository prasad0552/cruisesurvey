<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('surveys/addQuestionCategory'); ?>" class="btn btn-info">Add Question Category</a>
    		<a href="<?php echo admin_url('surveys/manageQuestionCategories'); ?>" class="btn btn-info">Manage Question Categories</a>
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
                    <a href="<?php echo admin_url('home/downloadSampleCSV/import-question-categories.csv'); ?>" class="btn btn-info">Download Sample file</a>
                </div>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="import_guest" name="import_guest" method="post" enctype="multipart/form-data">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                    	<div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Select Categories file</label>
                            <div class="col-sm-4">
                            	<input type="file" class="validate[required]" id="input_question_categories_csv" name="input_question_categories_csv"> 
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
             
             You can import Question Categoires here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>