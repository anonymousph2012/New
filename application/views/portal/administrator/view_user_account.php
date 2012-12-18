<!doctype html>
<html>
	<head>
		<title>Bagumbong Highschool Student Portal</title>
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/metro/css/modern.css');?>" />
		<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/metro/css/auth-buttons.css');?>" />
	</head>
	<body>
		<div class="nav-bar bg-color-green">
			<div class="nav-bar-inner">
				<span class="element">Administrator Panel</span>
				<span class="divider"></span>
				<ul class="menu">
					<li><a href="<?php echo base_url('portal/administrator/profile_settings');?>">Account Settings</a></li>
					<li><a href="<?php echo base_url('portal/administrator');?>">News </a></li>
					<li><a href="<?php echo base_url('portal/administrator/user_account');?>">User Account</a></li>
					<li><a href="<?php echo base_url('portal/administrator/student');?>">Student</a></li>
					<li><a href="<?php echo base_url('portal/administrator/teacher');?>">Teacher</a></li>
					<li><a href="<?php echo base_url('portal/administrator/subject');?>">Subject</a></li>
					<li><a href="<?php echo base_url('portal/administrator/section');?>">Section</a></li>
					<li><a href="<?php echo base_url('portal/administrator/announcements');?>">Announcement</a></li>
					<li><a href="<?php echo base_url('portal/administrator/class_management');?>">Class Management</a></li>
					<li class="place-right"><a href="<?php echo base_url('portal/administrator/logout');?>">Logout</a></li>
				</ul><!--menu-->
			</div><!--nav-bar-inner-->
		</div><!--nav-bar-->

		<!--CONTENT-->
		<div class="grid">
			<div class="page secondary">
				<div class="page-header">
					<div class="page-header-content">
						<h1>Modify User Account</h1>
					</div>
				</div><!--page-header-->
				<div class="page-region">
					<div class="page-region-content">
						<div class="row">
							<div class="span4">
								<h2>Username</h2>
								<form method="POST" action ="<?php echo base_url();?>portal/administrator/user_account/modify/<?php echo $account_user['user_id'];?>">
									<div class="input-control text">
										<input type="text" name="account_username" placeholder="username" value ="<?php echo $account_user['username']?>">
										<span class="helper"></span>
									</div><!--input control-text-->
									<h2>Password</h2>
									<div class="input-control text">
										<input type="password" name="account_password" placeholder="username" value ="<?php echo $account_user['password']?>">
										<span class="helper"></span>
									</div><!--input control-text-->
									<br><br>
									<input type="submit" value="submit" class="button">
								</form>
							</div><!--span4-->
						</div><!--row-->
					</div><!--page-region--content-->
				</div><!--page-region-->
			</div><!--page secondary-->
		</div><!--grid-->
		<!--JAVASCRIPT-->
		<script src="<?php echo base_url('assets/metro/js/jquery-1.8.2.min.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/dropdown.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/rating.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/accordion.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/buttonset.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/carousel.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/pagecontrol.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/slider.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/tile-slider.js');?>"></script>
		<script src="<?php echo base_url('assets/metro/js/twitter.js');?>"></script>
	</body>
</html>