<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="author" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="<?php echo assets_url(); ?>css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo assets_url(); ?>css/style.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo assets_url(); ?>css/dark.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo assets_url(); ?>css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo assets_url(); ?>css/animate.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo assets_url(); ?>css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="<?php echo assets_url(); ?>css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
    
    <!-- TimePicker -->
    <link rel="stylesheet" href="<?php echo admin_assets_url(); ?>/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="<?php echo common_assets_url(); ?>/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css"> 


	<!-- Document Title
	============================================= -->
	<title><?php echo $title; ?></title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">
		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: url('<?php echo assets_url(); ?>images/main_bg.jpg') center center no-repeat; background-size: cover;"></div>

				<div class="section nobg full-screen nopadding nomargin">
					<div class="container vertical-middle divcenter clearfix">

						

						<div class="panel panel-default divcenter noradius noborder" style="max-width: 400px; background-color: rgba(23,111,173,0.5);">
							<div class="panel-body" style="padding: 40px;">
                            	<!-- Notifications -->
								<?php if($msg = $this->session->flashdata('flash_message')) echo $msg; ?>
                            
								<form id="login-form" name="login-form" class="nobottommargin" method="post">
									<h3><?php echo translate('customer-login'); ?></h3>

									<div class="col_full">
										<label for="login-form-username"><?php echo translate('lastname'); ?>:</label>
										<input type="text" id="lastname" name="lastname" value="" class="form-control not-dark" />
									</div>
                                    
                                    <div class="col_full">
										<label for="login-form-username"><?php echo translate('dob'); ?>:</label>
										<input type="text" id="date_of_birth" name="date_of_birth" value="" class="form-control not-dark" />
									</div>

									<div class="col_full">
										<label for="login-form-password"><?php echo translate('password'); ?>:</label>
										<input type="password" id="password" name="password" value="" class="form-control not-dark" />
									</div>

									<div class="col_full nobottommargin">
										<button type="submit" class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login"><?php echo translate('login'); ?></button>
									</div>
								</form>

								
							</div>
						</div>

						

					</div>
				</div>

			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="<?php echo assets_url(); ?>js/jquery.js"></script>
	<script type="text/javascript" src="<?php echo assets_url(); ?>js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="<?php echo assets_url(); ?>js/functions.js"></script>
    
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

</body>
</html>