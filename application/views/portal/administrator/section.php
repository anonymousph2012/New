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
					<h1>Section Module</h1>
				</div><!--page-header-content-->
			</div><!--page-header-->
			<div class="page-region">
				<div class="page-region-content">
					<div class="row">
					<div class="span11">
						<div class="page-control" data-role="page-control">
							<!--tabs-->
							<ul>
								<li class="active"><a href="#frame1">List of Section</a></li>
								<li><a href="#frame2">Add a Section</a></li>
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
					      						<th>Section Number</th>
					      						<th>Section Name</th>
					      						<th>Year Level</th>
					      						<th>Quick Actions</th>
					      					</thead>
					      					<?php foreach($section_info as $section): ?>
					      					<tbody>
					      						<td><?php echo $section['section_id'];?></td>
					      						<td><?php echo $section['section_name'];?></td>
					      						<td><?php echo $section['section_year_level'];?></td>
					      						<td><?php echo '<a class="btn"href='.base_url('portal/administrator/section').'/'.$section['section_id'].'>Update</a>'?></td>
					      					</tbody>
					      					<?php endforeach?>
					      				</table>
								</div><!--frame1-->
								<div class="frame" id="frame2">
									<h2>Section Name</h2>
										<form method="POST" action ="<?php echo base_url('portal/administrator/section/add_section');?>">
										<div class="input-control text">
											<input type="text" name="section_name" placeholder="Section Name" required>
											<span class="helper"></span>
										</div><!--input control-text-->
										<div class="input-control select">
									       	<select name="section_year_level">
										            	<option values="1st Year">1st Year</option>
	                      								<option values="2nd Year">2nd Year</option>
	                      								<option values="3rd Year">3rd Year</option>
	                      								<option values="4th Year">4th Year</option>
									        	</select>
									    	</div><!--input-control-select-->
										<input type="submit" value="Add Section">
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