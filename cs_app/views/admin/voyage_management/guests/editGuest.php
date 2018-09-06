<!-- TimePicker -->
<link rel="stylesheet" href="<?php echo common_assets_url(); ?>/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css">  

<div class="content-wrapper">

<section class="content">

<!-- Notifications -->
<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>

<div class="box box-default">
 
    <div class="box-header with-border">
        <h3 class="box-title">Voyage ID: <a href="<?php echo admin_url('voyage/editVoyage/'.$guest->voyage_id); ?>"><?php echo $guest->voyage_id; ?></a></h3>
    	<div class="box-tools pull-right">
        	<a href="<?php echo admin_url('guests/importGuests/'.$guest->voyage_id); ?>" class="btn btn-info">Import Guests</a>
    		<a href="<?php echo admin_url('guests/manageGuests/'.$guest->voyage_id); ?>" class="btn btn-info">Manage Guests</a>
    	</div>
    </div><!-- /.box-header -->
    
	<div class="box-body">
    	<div class="row">
        	<div class="col-md-12">
            
              <!-- Horizontal Form -->  
              <div class="box box-info">
              
                <div class="box-header with-border">
                  <h3 class="box-title">Edit Guest</h3>
                </div><!-- /.box-header -->
                
                <!-- form start -->
                <form class="form-horizontal" id="edit_guest" name="edit_guest" method="post">
                

                    <div class="box-body">
                    
                    	<div class="row">
        				<div class="col-md-10">
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Voyage id</label>
                            <div class="col-sm-2">
                            	<input type="text" readonly class="form-control validate[required]" id="voyage_id" name="voyage_id" value="<?php echo $guest->voyage_id; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Guest id</label>
                            <div class="col-sm-4">
                            	<input type="text" readonly class="form-control validate[required]" id="guest_id" name="guest_id" value="<?php echo $guest->guest_id; ?>"> 
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Login Name</label>
                            <div class="col-sm-4">
                            	<input type="text" readonly class="form-control validate[required]" id="login_name" name="login_name" value="<?php echo $guest->login_name; ?>"> 
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Password</label>
                            <div class="col-sm-4">
                            	<input type="text" readonly class="form-control validate[required]" id="password" name="password" value="<?php echo $guest->password; ?>"> 
                            </div>
                        </div>
                        
                    	<div class="form-group">
                            <label for="question" class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-4">
                            	<input type="text" class="form-control validate[required]" id="firstname" name="firstname" value="<?php echo $guest->firstname; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-4">
                            	<input type="text" class="form-control validate[required]" id="lastname" name="lastname" value="<?php echo $guest->lastname; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-4">
                            	<input type="text" class="form-control validate[required,custom[email]]" id="email" name="email" value="<?php echo $guest->email; ?>"> 
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">DOB</label>
                            <div class="col-sm-4">
                            	<input type="text" class="form-control validate[required]" id="date_of_birth" name="date_of_birth" value="<?php echo $guest->date_of_birth; ?>"> 
                            </div>
                        </div>
                        
                         <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Passenger No</label>
                            <div class="col-sm-4">
                            	<input type="text" class="form-control validate[required]" id="passenger_no" name="passenger_no" value="<?php echo $guest->passenger_no; ?>">  
                            </div>
                        </div>
                        
                        <div class="form-group">
                     		<label for="question" class="col-sm-2 control-label">Sex</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                
                                <label class="col-sm-1">
                                  <input type="radio" class="validate[required]" <?php echo ($guest->sex == "M")?"checked":""; ?>  value="M" id="sex" name="sex">
                                  Male
                                </label>
                                
                                <label class="col-sm-1">
                                  <input type="radio" class="validate[required]" <?php echo ($guest->sex == "F")?"checked":""; ?> value="F" id="sex" name="sex">
                                  Female
                                </label>
                                
                                </div>
                             </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Language</label>
                            <div class="col-sm-4">
                            	<select class="form-control" id="language" name="language">
                                <option value="">--Select Language--</option>
                                <?php foreach($languages->result() as $language) { ?>
                                	<option value="<?php echo $language->language_code; ?>" <?php echo ($language->language_code == $guest->language)?"selected":""; ?> ><?php echo $language->language_name; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label for="question" class="col-sm-2 control-label">Natioanlity</label>
                            <div class="col-sm-4">
                            	<select class="form-control" id="nationality" name="nationality">
                                <option value="">--Select Nationality--</option>
                                <?php foreach($countries->result() as $country) { ?>
                                	<option value="<?php echo $country->country_code; ?>" <?php echo ($country->country_code == $guest->nationality)?"selected":""; ?> ><?php echo $country->country_name; ?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group">
                     		<label for="question" class="col-sm-2 control-label">Status</label>
                            <div class="col-sm-10">
                                <div class="radio">
                                
                                <label class="col-sm-2">
                                  <input type="radio" class="validate[required]" <?php echo ($guest->status == "A")?"checked":""; ?> value="A" id="status" name="status">
                                  Active
                                </label>
                                
                                <label class="col-sm-2">
                                  <input type="radio" class="validate[required]" <?php echo ($guest->status == "D")?"checked":""; ?> value="D" id="status" name="status">
                                  Disabled
                                </label>
                                
                                </div>
                             </div>
                        </div>

                        </div>
                    </div>
                        
                    </div><!-- /.box-body -->
                    
                  	<div class="box-footer">
                        <input type="submit" class="btn btn-info pull-left" value="Save" />
                 	</div><!-- /.box-footer -->
                    
                </form>
                
              </div>

            </div>
		</div><!-- /.row -->
        
	</div><!-- /.box-body -->
            
	<div class="box-footer">
             
             You can edit Guest information of the voyage here
	</div>
            
</div><!-- /.box -->

</section><!-- /.content -->

</div>

<!-- TimePicker -->
<script src="<?php echo common_assets_url(); ?>/bootstrap-datetime-picker/js/moment.js"></script>
<script src="<?php echo common_assets_url(); ?>/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js"></script>
<script type="text/javascript">
$(function () {
$('#date_of_birth').datetimepicker({
	format: 'DD-MM-YYYY'
});
});
</script>