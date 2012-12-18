<!doctype html>
<html>
	<head>
		<title>Bagumbong Highschool Web Portal</title>
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
					<h1 style="margin-bottom:20px;">Teacher Information</h1>
				</div><!--page-header-content-->
			</div><!--page-header-->
			<div class="page-region">
				<div class="page-region-content">
					<div class="row">
						<form method="POST" action ="<?php echo base_url('portal/administrator/teacher/modify/');?>/<?php echo $faculty_profile['faculty_id'];?>">
						<div class="span6">
								<img src="<?php echo base_url('assets/avatar/default_avatar.png');?>" style="margin-left:120px;">
								<input type="file" name="student_profile_pic" style="margin-left:110px;">
								<table class="hovered">
									<thead>
										<th>School Year</th>
										<th>Section Name</th>
										<th></th>
										
									</thead>
									  <?php foreach($class_information as $class):?>
								          <tbody>
								            <td><?php echo $class['section_school_year'];?></td>
								            <td><?php echo $class['section_name'];?> - <?php echo $class['section_year_level'];?></td>
								            <td><a class="btn"href="<?php echo base_url('portal/administrator/class/'.$class['section_details_id']); ?>">View Class</a></td>

								          </tbody>
								       <?php endforeach?>
								</table>
						</div><!--span6-->
						<div class="span5">
							<h2>Student Number</h2>
										<div class="input-control text">
											<input type="text" name="teacher_number" placeholder="name" value="<?php echo $faculty_profile['faculty_id'];?>" readmeonly>
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>First Name</h2>
										<div class="input-control text">
											<input type="text" name="teacher_first_name" placeholder="First Name" value="<?php echo $faculty_profile['faculty_fname'];?>">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Middle Name</h2>
										<div class="input-control text">
											<input type="text" name="teacher_middle_name" placeholder="Middle Name" value="<?php echo $faculty_profile['faculty_mname'];?>">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Last Name</h2>
										<div class="input-control text">
											<input type="text" name="teacher_last_name" placeholder="Last Name" value="<?php echo $faculty_profile['faculty_lname'];?>">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Address</h2>
										<div class="input-control textarea">
											<textarea rows="5" cols="5" name="teacher_address" style="resize:none;"><?php echo $faculty_profile['faculty_address'];?></textarea>
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Contact Number</h2>
										<div class="input-control text">
											<input type="text" name="teacher_contact_number" placeholder="Contact Number" value="<?php echo $faculty_profile['faculty_contactno'];?>">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Birth Date</h2>
										<div class="input-control text">
											<input type="text" name="teacher_birth_date" placeholder="Birth Date"  value="<?php echo $faculty_profile['faculty_bday'];?>">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Age</h2>
										<div class="input-control text">
											<input type="text" name="teacher_age" placeholder="Age" value="<?php echo $faculty_profile['faculty_age'];?>">
										</div><!--input control-text-->
										<h2>Nationality</h2>
										<div class="input-control text">
											<input type="text" name="teacher_nationality" placeholder="Nationality"  value="<?php echo $faculty_profile['faculty_nationality'];?>">
										</div><!--input control-text-->
										<h2>Religion</h2>
										<div class="input-control text">
											<input type="text" name="teacher_religion" placeholder="Religion" value="<?php echo $faculty_profile['faculty_religion'];?>"> 
										</div><!--input control-text-->
										<br><br>
										<input type="submit" value ="Modify Details">
						</div><!--span5-->
						</form>
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