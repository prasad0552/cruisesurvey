<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
   <head>
      <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
      <meta name="title" content="<?php if(isset($meta_title)) echo $meta_title; else echo ""; ?>" />
      <meta name="keywords" content="<?php if(isset($meta_keywords)) echo $meta_keywords; else echo ""; ?>" />
      <meta name="description" content="<?php if(isset($meta_description)) echo $meta_description; else echo ""; ?>" />
      <link rel="icon" href="" type="image/ico">
      <title><?php echo $meta_title; ?></title>
        <link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" href="<?php echo assets_url(); ?>css/bootstrap.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo assets_url(); ?>css/style.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo assets_url(); ?>css/dark.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo assets_url(); ?>css/font-icons.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo assets_url(); ?>css/animate.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo assets_url(); ?>css/magnific-popup.css" type="text/css" />
        <!-- Bootstrap Switch CSS -->
        <link rel="stylesheet" href="<?php echo assets_url(); ?>css/components/bs-switches.css" type="text/css" />
        <!-- Radio Checkbox Plugin -->
        <link rel="stylesheet" href="<?php echo assets_url(); ?>css/components/radio-checkbox.css" type="text/css" />
        <link rel="stylesheet" href="<?php echo assets_url(); ?>css/responsive.css" type="text/css" />
        
        <!-- lobibox -->
    	<link rel="stylesheet" href="<?php echo common_assets_url(); ?>/lobibox/css/lobibox.min.css">
        
        <link rel="stylesheet" href="<?php echo assets_url(); ?>css/styles_changes.css" type="text/css" />
      <script src="<?php echo assets_url(); ?>js/jquery.js"></script>      
   </head>
   <body>
      <?php $uri1= $this->uri->segment(1); $uri2 = $this->uri->segment(2); $uri3 = $this->uri->segment(3); ?>
      	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Header
		============================================= -->
		<header id="header" class="transparent-header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
                    <?php if(!empty($general_settings->cruise_logo)) { ?>
						<a href="survey.html" class="standard-logo" data-dark-logo=""><img src="<?php echo image_url('logo/'.$general_settings->cruise_logo); ?>" alt=""></a>	
                     <?php } else { ?>   	
                     	<a href="survey.html" class="standard-logo" data-dark-logo=""><img src="<?php echo assets_url(); ?>/images/oceaniacruises_logo.png" alt=""></a>
                     <?php } ?>   		
                   </div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul>
							<li class="top_link1"><a href="#"><?php echo $this->session->userdata('guest_lastname'); ?></a></li>
                            <li class="top_link2"><a href="<?php echo site_url('guests/logout'); ?>"><?php echo translate('logout'); ?></a></li>
						</ul>

						
						<!-- Top Search
						============================================= 
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
							</form>
						</div><!-- #top-search end -->
					</nav><!-- #primary-menu end -->
				</div>

		  </div>

		</header><!-- #header end -->