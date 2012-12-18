<!doctype html>
<html>
	<head>
		<title>Bagumbong Highschool Student Portal</title>
		<script src="<?php echo base_url('assets/metro/js/rating.js');?>"></script>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/metro/css/modern.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/metro/css/auth-buttons.css');?>" />
		<script src="<?php echo base_url('assets/metro/js/accordion.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/buttonset.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/carousel.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/dropdown.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/pagecontrol.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/slider.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/jquery-1.7.1.min.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/tile-slider.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/twitter.js');?>"></script>
	</head>
	<body>
		<div class="grid">
		<div class="page secondary" style="margin-top:60px;">
			<div class="page-header">
				<div class="page-header-content">
					
				</div><!--page-header-content-->
			</div><!--page-header-->
			<div class="page-region">
				<div class="page-region-content">
					<div class="row">
						<div class="span6">
							<h2>Bagumbong Highschool Web Portal</h2>
							<ul>
								<li>View your personal information</li>
								<li>View your current schedule, academic grades</li>
								<li>Socialize with your fellow BHS Students</li>
							</ul>
						</div><!--span6-->
						<div class="span5">
							<img src="<?php echo base_url('assets/img/bhs_login.png');?>"/>
							<form method="POST" name = "process" action ="<?php echo base_url('login/process');?>">
								<?php if(! is_null($error_message)):?>
									<div class="notices">
										<div class="bg-color-red">
											<div class="notice-icon"><i class="icon-user"></i></div>
											 <div class="notice-header"> Invalid information </div>
										        <div class="notice-text"> Please check your username or password </div>
										</div><!--bg-color-red-->
									</div><!--notices-->
								<?php endif?>
								<div class="input-control text ">
									<input type="text" name="username" placeholder="username">
									<span class="helper"></span>
								</div><!--input-control-text-->
								<div class="input-control text ">
									<input type="password" name="password" placeholder="password">
									<span class="helper"></span>
								</div><!--input-control-text-->
								<br>
								<input type="submit" value="Submit"/>
							</form>
						</div><!--span5-->
					</div><!--row-->
					<div class="row">
						<div class="span11" style="margin-top:20px;">
							<footer class="footer">
								<p align="center">
									<small>
								<a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-nc-nd/3.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-nc-nd/3.0/">Creative Commons Attribution-NonCommercial-NoDerivs 3.0 Unported License</a>.
									</small>
								</p>
							</footer><!--footer-->
						</div><!--span11-->
					</div><!--row-->
				</div><!--page-header-content-->
			</div><!--page-header-->
		</div><!--page-secondary-->
		</div><!--grid-->
		</body>
</html>