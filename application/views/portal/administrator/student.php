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
					<h1>Student Module</h1>
				</div><!--page-header-content-->
			</div><!--page-header-->
			<div class="page-region">
				<div class="page-region-content">
					<div class="row">
					<div class="span12">
						<div class="page-control" data-role="page-control">
							<!--tabs-->
							<ul>
								<li class="active"><a href="#frame1">List of Students</a></li>
								<li><a href="#frame2">Add a Student</a></li>
							</ul>
							<!--tab-content-->
							<div class="frames">
								<div class="frame active" id="frame1">
									<div class="row">
										<div class="span4">
											<?php if(! is_null($msg)):?>
												<div class="notices">
													<div class="bg-color-red">
														<div class="notice-icon"><i class="icon-user"></i></div>
														 <div class="notice-header"> Information </div>
													        <div class="notice-text"><?php echo $msg;?> </div>
													</div><!--bg-color-red-->
												</div><!--notices-->
											<?php endif?>
											<form  method="POST" action="<?php echo base_url('portal/administrator/student/search');?>">
												<h2>Find Student</h2>
						                                 		<div class="input-control text  ">
													<input type="text" name="student_id" placeholder="Student Number">
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
							      						<th>Student Number</th>
							      						<th>Student Name</th>
							      						<th>Quick Actions</th>
							      					</thead>
							      					<?php foreach ($student_profile as $student): ?>
							      					<tbody>
							      						<td> <?php echo $student['student_id'];?> </td>
							      						<td> <?php echo $student['student_fname'].' '.$student['student_mname'].' '.$student['student_lname'];?> </td>
							      						<td> 
							      							<?php echo '<a class="button bg-color-green"href='.base_url().'portal/administrator/student/'.$student['student_id'].'>Update</a>'?>
							      						</td>
							    					</tbody>
							      					<?php endforeach ?>
											</table>
										</div><!--span11-->
									</div><!--row-->
								</div><!--frame1-->
								<div class="frame" id="frame2">
									<form method="POST" action="<?php echo base_url();?>portal/administrator/student/add_student">
										<div class="offset4">
											<img src="<?php echo base_url('assets/avatar/default_avatar.png');?>"><br>
											<input type="file" name="student_profile_pic">
										</div>
										<h2>Student Number</h2>
										<div class="input-control text">
											<input type="text" name="student_number" placeholder="name" value="<?php echo $student_id;?>" >
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Username</h2>
										<div class="input-control text">
											<input type="text" name="student_username" placeholder="name">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Password</h2>
										<div class="input-control text">
											<input type="text" name="student_password" placeholder="name">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>First Name</h2>
										<div class="input-control text">
											<input type="text" name="student_first_name" placeholder="First Name">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Middle Name</h2>
										<div class="input-control text">
											<input type="text" name="student_middle_name" placeholder="Middle Name">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Last Name</h2>
										<div class="input-control text">
											<input type="text" name="student_last_name" placeholder="Last Name">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Address</h2>
										<div class="input-control textarea">
											<textarea rows="5" cols="5" name="student_address" style="resize:none;"></textarea>
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Contact Number</h2>
										<div class="input-control text">
											<input type="text" name="student_contact_number" placeholder="Contact Number">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Birth Date</h2>
										<div class="input-control text">
											<input type="text" name="student_birth_date" placeholder="Birth Date">
											<span class="helper"></span>
										</div><!--input control-text-->
										<h2>Age</h2>
										<div class="input-control text">
											<input type="text" name="student_age" placeholder="Age">
										</div><!--input control-text-->
										<h2>Nationality</h2>
										<div class="input-control text">
											<input type="text" name="student_nationality" placeholder="Nationality">
										</div><!--input control-text-->
										<h2>Religion</h2>
										<div class="input-control text">
											<input type="text" name="student_religion" placeholder="Religion">
										</div><!--input control-text-->
										<h2>Guardian Name</h2>
										<div class="input-control text">
											<input type="text" name="student_guardian_name" placeholder="Guardian Name">
										</div><!--input control-text-->
										<h2>Guardian Contact Number</h2>
										<div class="input-control text">
											<input type="text" name="student_guardian_contact_number" placeholder="Guardian Contact Number">
										</div><!--input control-text-->
										<h2>Guardian Relationship</h2>
										<div class="input-control text">
											<input type="text" name="student_guardian_relationship" placeholder="Guardian Relationship">
										</div><!--input control-text-->
										<br><br>
										<input type="submit" value ="Add Student">
									</form>
								</div><!--frame2-->
							</div><!--frames-->
						</div><!--page-control-->
					</div><!--span12-->
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