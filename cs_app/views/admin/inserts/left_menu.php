	  <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo admin_assets_url(); ?>/dist/img/admin_pic.png" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php $admin_info = $this->session->userdata('admin_info'); echo $admin_info->firstname;  ?> </p>
              <!--<a href="#"><i class="fa fa-circle text-success"></i> Online</a> -->
            </div>
          </div>
          <!-- search form 
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>
          /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          
          <?php $uri1= $this->uri->segment(1); $uri2 = $this->uri->segment(2); $uri3 = $this->uri->segment(3); ?>
          
          <ul class="sidebar-menu">
            <li class="<?php if($uri2 == 'home') echo 'active'; ?>">
              <a href="<?php echo admin_url('home'); ?>">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            
            <?php if($this->session->userdata('admin_type') == "S") { ?>
            <li class="treeview <?php if($uri2 == 'admins') echo 'active'; ?>">
              <a href="#">
                <i class="fa fa-users"></i>
                <span>Admins</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<li class="<?php if($uri3 == 'addAdmin') echo 'active'; ?>" ><a href="<?php echo admin_url('admins/addAdmin'); ?>"><i class="fa fa-square-o"></i>Add Admin</a></li>
                <li class="<?php if($uri3 == 'manageAdmins') echo 'active'; ?>" ><a href="<?php echo admin_url('admins/manageAdmins'); ?>"><i class="fa fa-square-o"></i>Manage Admins</a></li>
              </ul>
            </li>

            <?php } ?>
            
            
            <li class="treeview <?php if($uri2 == 'languages') echo 'active'; ?>">
              <a href="#">
                <i class="fa fa-language"></i>
                <span>Translations</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<li class="treeview <?php if($uri2 == 'languages' && ($uri3 == "addLanguage" || $uri3 == "manageLanguages")) echo 'active'; ?>">
                  <a href="#">
                    <i class="fa fa-square"></i>
                    <span>Languages</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php if($uri3 == 'addLanguage') echo 'active'; ?>" ><a href="<?php echo admin_url('languages/addLanguage'); ?>"><i class="fa fa-square-o"></i>Add Language</a></li>
                    <li class="<?php if($uri3 == 'manageLanguages') echo 'active'; ?>" ><a href="<?php echo admin_url('languages/manageLanguages'); ?>"><i class="fa fa-square-o"></i>Manage Languages</a></li>
                  </ul>
            	</li>
                <li class="<?php if($uri3 == 'manageLanguageValues') echo 'active'; ?>" ><a href="<?php echo admin_url('languages/manageLanguageValues'); ?>"><i class="fa fa-square"></i>Language Values</a></li>
                
                <li class="<?php if($uri3 == 'importTranslations') echo 'active'; ?>" ><a href="<?php echo admin_url('languages/importTranslations'); ?>"><i class="fa fa-square"></i>Translations Bulk Upload</a></li>
              </ul>  
              
                
              
            </li>
      		
            <li class="treeview <?php if(($uri2 == 'voyage' && ($uri3 == "addVoyage" || $uri3 == "editVoyage" || $uri3 == "manageVoyages")) || ($uri2 == "guests" && ($uri3 == "addGuest" || $uri3 == "editGuest" || $uri3 == "importGuests" || $uri3 == "manageGuests")) || ($uri2 =="surveys" && ($uri3 == "addSurvey" || $uri3 == "editSurvey" || $uri3 == "manageSurveys") )) echo 'active'; ?>">
                  <a href="#">
                    <i class="fa fa-ship"></i>
                    <span>Voyage</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php if($uri3 == 'addVoyage') echo 'active'; ?>" ><a href="<?php echo admin_url('voyage/addVoyage'); ?>"><i class="fa fa-square-o"></i>Create Voyage</a></li>
                    <li class="<?php if($uri3 == 'manageVoyages') echo 'active'; ?>" ><a href="<?php echo admin_url('voyage/manageVoyages'); ?>"><i class="fa fa-square-o"></i>Manage Voyage</a></li>
                  </ul>
            </li>			
            
            <li class="treeview <?php if($uri2 == 'surveys' && ($uri3 == "addQuestionCategory" || $uri3 == "manageQuestionCategories")) echo 'active'; ?>">
                  <a href="#">
                    <i class="fa fa-list-alt"></i>
                    <span>Question Categories</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                  	 <li class="<?php if($uri3 == 'importQuestionCategories') echo 'active'; ?>" ><a href="<?php echo admin_url('surveys/importQuestionCategories'); ?>"><i class="fa fa-square-o"></i>Import Question Categories</a></li>
                    <li class="<?php if($uri3 == 'addQuestionCategory') echo 'active'; ?>" ><a href="<?php echo admin_url('surveys/addQuestionCategory'); ?>"><i class="fa fa-square-o"></i>Add Question Category</a></li>
                    <li class="<?php if($uri3 == 'manageQuestionCategories') echo 'active'; ?>" ><a href="<?php echo admin_url('surveys/manageQuestionCategories'); ?>"><i class="fa fa-square-o"></i>Manage Question Categories</a></li>
                  </ul>
           </li>
           
           <li class="treeview <?php if($uri2 == 'surveys' && ($uri3 == "addSurveyDefaultTemplate" || $uri3 == "manageSurveyDefaultTemplates")) echo 'active'; ?>">
                  <a href="#">
                    <i class="fa fa-columns"></i>
                    <span>Survey Default Templates</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php if($uri3 == 'addSurveyDefaultTemplate') echo 'active'; ?>" ><a href="<?php echo admin_url('surveys/addSurveyDefaultTemplate'); ?>"><i class="fa fa-square-o"></i>Add Default Template</a></li>
                    <li class="<?php if($uri3 == 'manageSurveyDefaultTemplates') echo 'active'; ?>" ><a href="<?php echo admin_url('surveys/manageSurveyDefaultTemplates'); ?>"><i class="fa fa-square-o"></i>Manage Default Templates</a></li>
                  </ul>
           </li>
            
            <li class="treeview <?php if($uri2 == 'locations') echo 'active'; ?>">
              <a href="#">
                <i class="fa fa-building-o"></i>
                <span>Locations</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<!-- <li class="<?php if($uri3 == 'addCountry') echo 'active'; ?>" ><a href="<?php echo admin_url('locations/addCountry'); ?>"><i class="fa fa-square-o"></i>Add Country</a></li> -->
                <li class="<?php if($uri3 == 'manageCountries') echo 'active'; ?>" ><a href="<?php echo admin_url('locations/manageCountries'); ?>"><i class="fa fa-square-o"></i>Manage Countries</a></li>
              </ul>
            </li>
            
            <li class="treeview <?php if($uri2 == 'reports' && ($uri3 == "generateSurveyReports")) echo 'active'; ?>">
                  <a href="#">
                    <i class="fa fa-file"></i>
                    <span>Reports</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php if($uri3 == 'generateSurveyReports') echo 'active'; ?>" ><a href="<?php echo admin_url('reports/generateSurveyReports'); ?>"><i class="fa fa-square-o"></i>Survey Reports</a></li>
                  </ul>
           </li>
           
            <li class="treeview <?php if($uri2 == 'archive' && ($uri3 == "deleteVoyage")) echo 'active'; ?>">
                  <a href="#">
                    <i class="fa fa-archive"></i>
                    <span>Archive</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php if($uri2 == 'archive') echo 'active'; ?>" ><a href="<?php echo admin_url('archive'); ?>"><i class="fa fa-square-o"></i>View & Delete Voyage</a></li>
                  </ul>
           </li>
            
            <li class="treeview <?php if($uri2 == 'settings' ||($uri2 == 'corporate' && $uri3 == 'dbSettings')) echo 'active'; ?>">
              <a href="#">
                <i class="fa fa-gear"></i>
                <span>Settings</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
              	<li class="<?php if($uri3 == 'general') echo 'active'; ?>" ><a href="<?php echo admin_url('settings/general'); ?>"><i class="fa fa-square-o"></i>General Settings</a></li>
                <li class="<?php if($uri3 == 'dbSettings') echo 'active'; ?>" ><a href="<?php echo admin_url('corporate/dbSettings'); ?>"><i class="fa fa-square-o"></i>Corporate Office DB Settings</a></li>
              </ul>
            </li>
            
            <li class="treeview <?php if($uri2 == 'corporate' && ($uri3 == "transferVoyageData")) echo 'active'; ?>">
                  <a href="#">
                    <i class="fa fa-copy"></i>
                    <span>Corporate Office</span>
                    <i class="fa fa-angle-left pull-right"></i>
                  </a>
                  <ul class="treeview-menu">
                    <li class="<?php if($uri2 == 'corporate') echo 'active'; ?>" ><a href="<?php echo admin_url('corporate/transferVoyageData'); ?>"><i class="fa fa-square-o"></i>Transfer Voyage Data</a></li>
                  </ul>
           </li>
            

          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>