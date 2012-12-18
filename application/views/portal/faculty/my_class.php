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
				<span class="element">Student Panel</span>
				<span class="divider"></span>
				<ul class="menu">
					<li><a href="<?php echo base_url('portal/student/profile_settings');?>">Account Settings</a></li>
					<li><a href="<?php echo base_url('portal/student');?>">News </a></li>
					<li><a href="<?php echo base_url('portal/student/grades');?>">Grades</a></li>
					<li class="place-right"><a href="<?php echo base_url('portal/student/logout');?>">Logout</a></li>
				</ul><!--menu-->
			</div><!--nav-bar-inner-->
		</div><!--nav-bar-->

		<!--CONTENT-->
		<div class="grid">
			<div class="page secondary">
				<div class="page-header">
					<div class="page-header-content">
						<h1>Class</h1>
					</div>
				</div><!--page-header-->
				<div class="page-region">
					<div class="page-region-content">
						<div class="row">
							<div class="span11">
								<div class="nav-bar bg-color-greenDark">
									<div class="nav-bar-inner">
											<span class="element">Class  Information</span>
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
								</table>
								<div class="nav-bar bg-color-greenDark">
									<div class="nav-bar-inner">
											<span class="element">Subject List</span>
									</div><!--nav-bar-inner-->
								</div><!--nav-bar bg-color-darkgreen-->
								<table class="table">
							    		<thead>
							    			<th>Subject Name</th>
							    			<th>Class Starts</th>
							    			<th>Class Ends</th>
							    			<th>Room No.</th>
							    		</thead>
						    		<?php foreach($subject_list as $subject):?>
						    			<tbody style="color:black;">
							    			<td><?php echo $subject['subject_name'];?></td>
							    			<td><?php echo $subject['subject_start'];?></td>
										<td><?php echo $subject['subject_end'];?></td>
										<td><?php echo $subject['room_number'];?></td>
										</tbody>
						    		<?php endforeach?>
						    		</table>
						    		<?php if($number_of_student > 0):?>
						    		<div class="nav-bar bg-color-greenDark">
									<div class="nav-bar-inner">
											<span class="element">List of Students</span>
									</div><!--nav-bar-inner-->
								</div><!--nav-bar bg-color-darkgreen-->
								<table class="table">
						    			<thead>
						    				<th>Student ID</th>
						    				<th>Student Name <th>
						    				<th></th>
						    			</thead>
						    			<?php foreach($student_list as $student):?>
						    			<tbody style="color:black;">
						    				<td><?php echo $student['student_id'];?></td>
						    				<td><?php echo $student['student_fname'].' '.$student['student_mname'].' '.$student['student_lname'];?></td>
						    				<td>
						    					<a class="btn"href="<?php echo base_url('portal/faculty/class/').'/'.$student['section_details_id'].'/'.$student['student_id'];?>">View Grades</a>
						    				</td>
						    			</tbody>
						    			<?php endforeach?>
					    			</table>
					    			<?php else : ?>
								<h2>There are no student at this time. Add a student ? <a class="btn" href="<?php echo base_url('portal/administrator/class/add_student');?>">Add !</a></h2>
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