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
						<h1>Class Module</h1>
					</div>
				</div><!--page-header-->
				<div class="page-region">
					<div class="page-region-content">
						<div class="row">
							<div class="span11">
							<div class="nav-bar bg-color-greenDark">
								<div class="nav-bar-inner">
										<span class="element">Class Information</span>
								</div><!--nav-bar-inner-->
							</div><!--nav-bar bg-color-darkgreen-->
							<table class="hovered">
								<thead>
					    				<th>Class Number</th>
					    				<th>Section Name </th>
					    				<th>Year Level</th>
					    				<th>School Year</th>
					    				<th>Faculty Name</th>
					    			</thead>
					    			<tbody>
				    				<td><?php echo $class_information['section_details_id'];?></td>
				    				<td><?php echo $class_information['section_name'];?></td>
				    				<td><?php echo $class_information['section_year_level'];?></td>
				    				<td><?php echo $class_information['section_school_year'];?></td>
				    				<td><?php echo $class_information['faculty_fname'].' '.$class_information['faculty_mname'].' '.$class_information['faculty_lname'];?></td>
				    				</tbody>
							</table><!--table ito tapos hovered-->
							<div class="nav-bar bg-color-greenDark">
								<div class="nav-bar-inner">
										<span class="element">Subject List</span>
								</div><!--nav-bar-inner-->
							</div><!--nav-bar bg-color-darkgreen-->
							<table class="hovered">
								<thead>
						    			<th>Subject Name</th>
						    			<th>Subject Teacher</th>
						    			<th>Class Starts</th>
						    			<th>Class Ends</th>
						    			<th>Room No.</th>
						    		</thead>
						    		<?php foreach($subject_information as $subject):?>
						    		<tbody>
							    		<td><?php echo $subject['subject_name'];?></td>
							   		<td><?php echo $subject['faculty_fname'].' '.$subject['faculty_mname'].' '.$subject['faculty_lname'];?></td>
									<td><?php echo $subject['subject_start'];?></td>
									<td><?php echo $subject['subject_end'];?></td>
									<td><?php echo $subject['room_number'];?></td>
								</tbody>
						    		<?php endforeach?>
							</table><!--table ito okay-->

							<div class="nav-bar bg-color-greenDark">
								<div class="nav-bar-inner">
										<span class="element">Add a Student</span>
								</div><!--nav-bar-inner-->
							</div><!--nav-bar bg-color-darkgreen-->
								<form method="POST" action="<?php echo base_url('portal/administrator/class/add_student');?>">
					    				<div class="input-control text" style="margin-top:20px;">
						    				<input type="text"  name="student_number" placeholder="Student Number" required>
						    				<input type="hidden" name = "section_details_id" value="<?php echo $class_information['section_details_id'];?>">
						    				<input type="hidden" name="redirect_url" value="<?php echo $this->uri->uri_string() ?>">
						    				<input type="submit" value="Add" style="margin-top:10px;">
						    			</div><!--input-control text-->
					    			</form>
					    			
					    		<?php if($number_of_student > 0 ):?>
					    		<div class="nav-bar bg-color-greenDark">
									<div class="nav-bar-inner">
											<span class="element">List of Students</span>
									</div><!--nav-bar-inner-->
								</div><!--nav-bar bg-color-darkgreen-->
							<table class="hovered">
								<thead>
									<th>Student ID</th>
									<th>Student Name</th>
									<th></th>
								</thead>
								<?php foreach($student_information as $student):?>
					    			<tbody style="color:black;">
					    				<td><?php echo $student['student_id'];?></td>
					    				<td><?php echo $student['student_fname'].' '.$student['student_mname'].' '.$student['student_lname'];?></td>
					    				<td>
					    					<a class="btn"href="<?php echo base_url('portal/administrator/class/').'/'.$class_information['section_details_id'].'/'.$student['student_id'];?>">View Grades</a>
					    				</td>
					    			</tbody>
				    			<?php endforeach?>
							</table>
							<?php else:?>
							<h2>There are no student at this time.</h2>
							<?php endif ?>	
							</div><!--span11-->
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