<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title">Import Translations</h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('languages/exportTranslations'); ?>" class="btn btn-info">Export Translations</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Import</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="import_translations" name="import_translations" method="post" enctype="multipart/form-data">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Language</label>
                            <div class="col-sm-4">
                            	<select id="language_code" name="language_code" class="form-control">
                                	<option value="">--Select Language--</option>
									<?php foreach($languages->result() as $language) { ?>
                                            <option value="<?php echo $language->language_code; ?>"><?php echo $language->language_name; ?></option>
                                    <?php } ?>        
                                </select>	
                            </div>
                        </div>
                        
                    	<div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Translation file</label>
                            <div class="col-sm-4">
                            	<input type="file" class="validate[required]" id="input_translations_csv" name="input_translations_csv"> 
                            </div>
                        </div>
                        
                        </div>
                    </div>
                        
                    </div><!-- /.box-body -->
                    
                  	<div class="box-footer">
                        <input type="submit" id="import" name="import" class="btn btn-info pull-left" value="Import" />
                 	</div><!-- /.box-footer -->
                    

                    
                </form>
                
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can import translations here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>


<script type="text/javascript">
	$("#import").on('click',function(e){
		e.preventDefault();
		
		language = $("#language_code").find('option:selected').text();
		language_code = $("#language_code").val();
		input_translations_csv = $("#input_translations_csv").val();
		
		if(language_code == "")
		{
			Lobibox.notify('error', {
									title:false,
									icon: true,
									width:500,
									msg: "Select Language"
								});
		}
		else if(input_translations_csv == "")
		{
			Lobibox.notify('error', {
									title:false,
									icon: true,
									width:500,
									msg: "Select Translation file"
								});
		}
		else
		{
			msg = 'Are you sure want to update the translation for the language "'+language+'"?';
			Lobibox.confirm({
				title: "Confirm",									
				msg: msg,
				buttons: {
					ok: {
						'class': 'lobibox-btn lobibox-btn-default',
						text: 'Yes',
						closeOnClick: true
					},
					cancel: {
						'class': 'lobibox-btn lobibox-btn-cancel',
						text: 'No',
						closeOnClick: true
					}
				},
				callback: function ($this, type, ev) {
				if(type == "ok")
				{
					$('#import_translations').submit();
					setTimeout(function () {
						$(".loader").fadeIn();
					});
				}
				}
			});	
		}		
	});
</script>		