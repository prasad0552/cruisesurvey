<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
          </h1>
          
        </section>


        <!-- Main content -->
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
          	<div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-red color-palette">
                <div class="inner">
                  <h3><?php echo (isset($voyage->voyage_id))?$voyage->voyage_id:"-"; ?></h3>
    
                  <p>Active Voyage</p>
                </div>
                
              </div>
            </div>
            
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-green color-palette">
                <div class="inner">
                  <h3><?php echo (isset($voyage->start_date))?getDateFormat($voyage->start_date):"-"; ?></h3>
    
                  <p>Start Date</p>
                </div>
                
              </div>
            </div>
            
            <div class="col-lg-4 col-xs-4">
              <!-- small box -->
              <div class="small-box bg-blue color-palette">
                <div class="inner">
                  <h3><?php echo (isset($voyage->end_date))?getDateFormat($voyage->end_date):"-"; ?></h3>
    
                  <p>End Date</p>
                </div>
                
              </div>
            </div>
            
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-blue color-palette">
                <div class="inner">
                  <h3><?php echo (isset($no_of_surveys))?$no_of_surveys:"-"; ?></h3>
    
                  <p>No.of Surveys created for the voyage</p>
                </div>
                
              </div>
            </div>
            
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-navy color-palette">
                <div class="inner">
                  <h3><?php echo (isset($no_of_guests))?$no_of_guests:"-"; ?></h3>
    
                  <p>Total Guests in the voyage</p>
                </div>
                
              </div>
            </div>
            
            <div class="col-lg-4 col-xs-6">
              <!-- small box -->
              <div class="small-box bg-red color-palette">
                <div class="inner">
                  <h3><?php echo (isset($no_of_active_guests))?$no_of_active_guests:"-"; ?></h3>
    
                  <p>Active Guests in the voyage</p>
                </div>
                
              </div>
            </div>
            
            
            
          </div><!-- /.row -->
            
        </section><!-- /.content -->
			
      </div>
      <!-- /.content-wrapper -->	  