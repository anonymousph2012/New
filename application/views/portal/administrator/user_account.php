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
						<?php if(! is_null($msg)):?>
							<script>alert("User Account Updated");</script>
						<?php endif?>
						<h1>User Accounts</h1>
					</div>
				</div><!--page-header-->
				<div class="page-region">
					<div class="page-region-content">
						<div class="row">
							<div class="span4">
								<form  method="POST" action="<?php echo base_url('portal/administrator/user_account/search');?>">
									<h2>Find User Account</h2>
			                                 		<div class="input-control text  ">
										<input type="text" name="user_id" placeholder="User ID">
										<span class="helper"></span>
									</div><!--input-control-text-->
								<input type="submit" value="Search">
								</form>
							</div><!--span4-->
						</div><!--row-->
						<div class="row">
							<div class="span11">
								<table class="hovered">
									<thead>
										<th>User ID</th>
	      									<th>User Name</th>
				      						<th>Account Type</th>
				      						<th>Account Status</th>
										<th>Quick Actions</th>
									</thead>
									<?php foreach ($account_user as $user): ?>
				      					<tbody>
				      						<td><?php echo $user['user_id'];?></td>
				      						<td><?php echo $user['username'];?></td>
				      						<td><?php echo $user['account_type'];?></td>
				      						<td>
			      							<?php 
			      							if($user['account_status'] == 'enable')
			      								{
			      									echo '<span class="label label-info">'.$user["account_status"].'</span>';
			      								}else{
			      									echo '<span class="label label-warning">'.$user["account_status"].'</span>';
			      								}
			      							
			      							?>
										</td>
	      									<td>
	      							<?php echo '<a class="button bg-color-green"href='.base_url().'portal/administrator/user_account/'.$user['user_id'].'>Update</a>'?>
	      							<?php
	      							if($user['account_status'] == 'enable')
	      								{
	      									 echo '<a class="button bg-color-red"href='.base_url().'portal/administrator/user_account/modify_account_status_disable/'.$user['user_id'].'>Disable</a>';
	      								}elseif($user['account_status'] == 'disable'){
	      									 echo '<a class="button bg-color-blue"href='.base_url().'portal/administrator/user_account/modify_account_status_enable/'.$user['user_id'].'>Enable</a>';
	      								}
	      							?>
	      									</td>
	      							</tbody>
	      					<?php endforeach ?>
								</table>
							</div>
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