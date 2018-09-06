<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 	
    <div class="box-header with-border">
    <form class="form-horizontal" id="change_language" name="change_language" method="post">
    <label>Languages: </label>
    <select id="language" name="language">
    <?php foreach($languages->result() as $language) { ?>
         	<option <?php echo ($selected_language == $language->language_code)?"SELECTED":""; ?> value="<?php echo $language->language_code; ?>"><?php echo $language->language_name; ?></option>
    <?php } ?>        
    </select>	
    </form>
    </div>
    
    <form class="form-horizontal" id="update_language_values" name="update_language_values" method="post">
    <input type="hidden" id="language_code" name="language_code" value="<?php echo $selected_language; ?>" />
    <div class="box-header with-border">
        <h3 class="box-title">Translations</h3>
         
         <div class="box-tools pull-right">  
         <div class="btn-group">
            <button type="button" class="btn btn-info status-info"><i class="fa fa-cog"></i></button>
         	<button type="button" class="btn btn-info dropdown-toggle" data-toggle="dropdown">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
          	</button>
            <ul class="dropdown-menu" role="menu">
            	<li><input type="submit" name="delete_selected" class="btn btn-link" value="Delete Selected" /></li>
          	</ul>
		</div>                                  
        	<input type="submit" name="save" class="btn btn-info" value="save" />
        	<a data-toggle="modal" data-target=".demo-popup" class="btn btn-info"><i class="fa fa-plus"></i></a>
    	</div>                     

    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Data Table -->  
              <div class="box">
                
                <div class="box-body">
                  <table id="manage_countries" class="data-table table table-bordered table-striped data-table-responsive" width="100%" cellspacing="0" data-column-defs='[{"sortable": false, "targets": [0]}]' >
                    <thead>
                      <tr>
                      	<th data-priority = "1"><input id="checkAll-top" class="checkAll" type="checkbox" /></th>
                        <th data-priority = "1">Value</th>
                        <th data-priority = "1">Language Variable</th>
                      </tr>
                    </thead>
                    <tbody>
                    
                     <?php foreach($language_values->result() as $key=>$language_value) { ?>
                      <tr>
                      	<td><input name="language_delete[<?php echo $key; ?>][variable_name]" type="checkbox" value="<?php echo $language_value->variable_name; ?>" /></td>
                        <td><textarea name="language_values[<?php echo $key; ?>][value]" cols="75" rows="3"><?php echo $language_value->value; ?></textarea></td>
                        <td><?php echo $language_value->variable_name; ?></td>
                        <input type="hidden" name="language_values[<?php echo $key; ?>][variable_name]" value="<?php echo $language_value->variable_name; ?>" />
                      </tr>
                      
                     <?php } ?>
                    
                    </tbody>
                    <tfoot>
                      <tr>
                      	<th width="2%"><input id="checkAll-bottom" class="checkAll" type="checkbox" /></th>
                        <th width="60%">Value</th>
                        <th>Language Variable</th>
                      </tr>
                    </tfoot>
                  </table>
                </div><!-- /.box-body -->
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can manage Language Translations here
	</div>
    </form>
    
<div class="modal fade demo-popup" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel-1" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button> <h3 class="modal-title">Add Language Value</h3>
    </div>
    <div class="modal-body">
        <form action="<?php echo admin_url('languages/addLanguageValue'); ?>" class="form-horizontal" id="add_language_value" name="add_language_value" method="post">
        <input type="hidden" id="language_code" name="language_code" value="<?php echo $selected_language; ?>" />
        
        <div class="box-body">
        
            <div class="row">
            <div class="col-md-10">
            
            <div class="form-group">
                <label for="question" class="col-sm-4 control-label">Language Variable</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control validate[required]" id="variable_name" name="variable_name"> 
                </div>
            </div>
            
            <div class="form-group">
                <label for="question" class="col-sm-4 control-label">Value</label>
                <div class="col-sm-8">
                    <textarea class="form-control validate[required]" rows="5" id="value" name="value"></textarea>
                </div>
            </div>
            
            <div class="form-group">
                <label for="question" class="col-sm-4 control-label">Type</label>
                <div class="col-sm-8">
                    <select id="type" name="type" class="form-control">
                    <option value="">--Select Type--</option>
                    <option value="STATIC">Static</option>
                    <option value="DYNAMIC">Dynamic</option>
                    </select>
                </div>
            </div>
            
            </div>
        </div>
            
        </div><!-- /.box-body -->
        
        <div class="box-footer">
            <input type="submit" class="btn btn-info pull-right" value="Add" />
        </div><!-- /.box-footer -->
        
        </form>
    </div>
    </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal-->
<!-- popup box modal ends -->
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>

<script type="text/javascript">
$("#language").on("change",function(){
	$( "#change_language" ).submit();
});

$(".checkAll").change(function () {
    $("input:checkbox").prop('checked', $(this).prop("checked"));
});
</script>

