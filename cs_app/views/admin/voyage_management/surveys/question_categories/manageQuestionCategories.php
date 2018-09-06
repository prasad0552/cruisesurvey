<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title"></h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('surveys/importQuestionCategories'); ?>" class="btn btn-info">Import Question Categories</a>
        	<a href="<?php echo admin_url('surveys/addQuestionCategory'); ?>" class="btn btn-info">Add Question Category</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Data Table -->  
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Question Categories</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="manage_countries" class="data-table table table-bordered table-striped data-table-responsive" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th data-priority = "1">Category ID</th>
                        <th>Category</th>
                        <th>Status</th>
                        <?php if(isAuthorizedAdmin('manage_queston_categories')) { ?>
                        <th data-priority = "2">Actions</th>
                        <?php } ?>
                      </tr>
                    </thead>
                    <tbody>
                    
                     <?php foreach($question_categories->result() as $question_category) { ?>
                      <tr>
                        <td><?php echo $question_category->category_id; ?></td>
                        <td><?php echo $question_category->category; ?></td>
                        <td><?php echo ($question_category->status == "A")?"Active":"Disabled"; ?></td>
                        <?php if(isAuthorizedAdmin('manage_queston_categories')) { ?>
                        <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-info">Actions</button>
                          <button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                          </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="<?php echo admin_url('surveys/editQuestionCategory/'.$question_category->category_id); ?>">Edit</a></li>
                                <li><a class="confirm" href="<?php echo admin_url('surveys/deleteQuestionCategory/'.$question_category->category_id); ?>">Delete</a></li>
                              </ul>
                        </div>
                    	</td>
                        <?php } ?>
                      </tr>
                      
                     <?php } ?>
                    
                    </tbody>
                    <tfoot>
                      <tr>
                        <th>Category ID</th>
                        <th>Category</th>
                        <th>Status</th>
                        <?php if(isAuthorizedAdmin('manage_queston_categories')) { ?>
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
             
             You can manage Countries here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>