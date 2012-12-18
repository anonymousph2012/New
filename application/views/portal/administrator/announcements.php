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
					<h1>Announcement Module</h1>
				</div><!--page-header-content-->
			</div><!--page-header-->
			<div class="page-region">
				<div class="page-region-content">
					<div class="row">
					<div class="span11">
						<div class="page-control" data-role="page-control">
							<!--tabs-->
							<ul>
								<li class="active"><a href="#frame1">List of Subject</a></li>
								<li><a href="#frame2">Add a Announcement</a></li>
							</ul>
							<!--tab-content-->
							<div class="frames">
								<div class="frame active" id="frame1">
									<?php if(! is_null($msg)):?>
									<div class="notices">
										<div class="bg-color-red">
											<div class="notice-icon"><i class="icon-user"></i></div>
											 <div class="notice-header"> Alert! </div>
										        <div class="notice-text"><?php echo $msg;?> </div>
										</div><!--bg-color-red-->
									</div><!--notices-->
									<?php endif?>
									<table class="hovered">
					      					<thead>
					      						<th width="10%">Id</th>
					      						<th width="40%">Title</th>
					      						<th width="25%">Posted by</th>
					      						<th width="25%">Quick Actions</th>
					      					</thead>
					      					<?php foreach($announcements_info as $announcement):?>
					      					<tbody>
					      						<td><?php echo $announcement['announcement_id'];?></td>
					      						<td><?php echo $announcement['announcement_title'];?></td>
					      						<td><?php echo $announcement['administrator_name'];?></td>
					      						<td> 
					      							<?php echo '<a class="btn"href='.base_url('portal/administrator/announcements/').'/'.$announcement['announcement_id'].'>Update</a>'?>
					      						</td>
					      					</tbody>
					      					<?php endforeach?>
					      				</table>
								</div><!--frame1-->
								<div class="frame" id="frame2">
										<form method="POST" action ="<?php echo base_url('portal/administrator/announcements/add_announcements');?>">
										<h2>Title</h2>
										<div class="input-control text">
											<input type="text" name="announcement_title" placeholder="Title" required>
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Content</h2>
										<div class="input-control textarea">
										        <textarea name="announcement_content" rows="10" cols="100" required>
										        </textarea>
										</div>
										<input type="submit" value="Add Announcement">
										</form>
								</div><!--frame2-->
							</div><!--frames-->
						</div><!--page-control-->
					</div><!--span11-->
					</div><!--row-->
				</div><!--page-region-content-->
				</div><!--page-region-->
		</div><!--page-secondary-->
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