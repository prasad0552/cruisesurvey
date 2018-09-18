<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title">Corporate Office</h3>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Transfer Voyage Data</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="transfer_voyage_data" name="transfer_voyage_data" method="post">
                              
                    <div class="box-body">
                    
                    <div class="row">
        				<div class="col-md-10">
                        
                        <div class="col-md-6">
                            <label for="question" class="col-sm-4 control-label">Voyage ID</label>
                            <div class="col-sm-8">
                            	<select class="form-control validate[required]" id="voyage_id" name="voyage_id">
                                <option value="">-- Select Voyage ID --</option>
                                <?php if($voyages->num_rows() > 0) { foreach($voyages->result() as $voyage) { ?>

                                    <option value="<?php echo $voyage->voyage_id; ?>"><?php echo $voyage->voyage_id; ?></option>

                                <?php } } ?>
                                </select>
                            	
                            </div>
                        </div>

                        </div>
                        
                    </div>    
                        
                    </div><!-- /.box-body -->
                    
                  	<div class="box-footer">
                        <input id="transfer" name="transfer" type="submit" class="btn btn-info pull-left" value="Transfer" />
                 	</div><!-- /.box-footer -->
                    
                </form>
                
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can Transfer voyage data to Corporate Office Database here.
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>


<script type="text/javascript">
	$("#transfer").on('click',function(e){
		e.preventDefault();
		
		$(".loader").fadeIn();
		
		voyage_id = $("#voyage_id").val();
		
		var dataString 	= "voyage_id="+voyage_id;
		b_url = "<?php echo admin_url('corporate/ajaxCheckVoyageExists'); ?>";
		$.ajax({
			type: "POST",
			url: b_url,
			data: dataString,
			success: function(data){
						var result = JSON.parse(data);
						$(".loader").fadeOut();
						
						if(result.status == "success")
						{
							if(result.is_exist == "Y")
							{
								msg = 'Voyage id "'+voyage_id+'" already exists in corporate office database. Are you sure want to replace the data?';
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
										$('#transfer_voyage_data').submit();
										setTimeout(function () {
											$(".loader").fadeIn();
										});
									}
									}
								});	
							}
							else
							{
								$('#transfer_voyage_data').submit();
								setTimeout(function () {
									$(".loader").fadeIn();
								});
							}	
						}
						else
						{
							Lobibox.notify('error', {
									title:false,
									icon: true,
									width:500,
									msg: "Voyage id is empty"
								});
						}
					}
			});	
	});
</script>