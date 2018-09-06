<!DOCTYPE html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<style>
		body{
				font-family: 'Ropa Sans', sans-serif;
				margin: 0px;
				background-color: #3c8dbc;
			}
			.error-main{
				margin: 150px auto;
				text-align: center;
			}
			.error-heading{
				margin: 0 auto;
				width: 250px;
				border-radius: 15px 0px;
				box-shadow: 0px 7px 15px -10px #000;
				background-color: #fff;
				color: #C81F3E;
			}
			.error-heading h1{
				margin: 0;
				font-size: 120px;
			}
			.error-main h2{
				font-size: 36px;
				color: #fff;
			}
			.error-main p{
				color: #fff;
			}
			.btn-back{
				margin-top: 30px;
				border: 0px;
				padding: 10px 30px;
				background-color: #fff;
				color: #C81F3E;
				font-weight: bold;
				box-shadow: 0px 7px 15px -10px #000;
				cursor: pointer;
			}
	</style>
</head>
<body>
	<div class="error-main">
		<div class="error-heading">
			<h1></h1>
		</div>
        <img src="<?php echo assets_url(); ?>/images/icons/cruise1.gif" width="200px" height="auto" />
		<h2><?php echo translate('no-voyage-is-active'); ?></h2>
		<p><?php echo translate('no-voyage-is-active-description'); ?></p>

		<!-- <button onClick="location.href='<?php echo site_url(); ?>';" class="btn-back">Back to Home</button> -->
	</div>
</body>
</html>