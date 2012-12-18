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
						<h1>Class Management</h1>
					</div>
				</div><!--page-header-->
				<div class="page-region">
					<div class="page-region-content">
						<div class="row">
							<div class="span11">
							<div class="nav-bar bg-color-greenDark">
								<div class="nav-bar-inner">
										<span class="element">List of Class</span>
								</div><!--nav-bar-inner-->
							</div><!--nav-bar bg-color-darkgreen-->

								<!--<div class="input -control select" style="margin-top:10px;">
									<select name="school_year_level">
										<?php foreach($section_school_year as $school_year):?>
								  			<option value="<?php echo $school_year['section_school_year'];?>"><?php echo $school_year['section_school_year'];?></option>
								  		<?php endforeach?>
									</select>
								</div><!--input-control-select-->

								<table class="hovered">
									<thead>
										<th>Section ID </th>
										<th>Section</th>
										<th>Adviser</th>
										<th>School Year</th>
										<th></th>
									</thead>
									<?php foreach($class_information as $class):?>
									<tbody>
										<td><?php echo $class['section_details_id'];?></td>
										<td><?php echo $class['section_name'];?></td>
										<td><?php echo $class['faculty_fname'].' '.$class['faculty_lname'];?></td>
										<td><?php echo $class['section_school_year'];?></td>
										<td>
											<a  class="btn" href="<?php echo base_url('portal/administrator/class/').'/'.$class['section_details_id'];?>"> View Class</a>
										</td>
									</tbody>
									<?php endforeach?>
								</table>

								<div class="nav-bar bg-color-greenDark">
									<div class="nav-bar-inner">
											<span class="element">Create a Class</span>
									</div><!--nav-bar-inner-->
								</div><!--nav-bar bg-color-darkgreen-->
								<form method="POST" action= "<?php echo base_url('portal/administrator/class_management/add_class');?>">
									<table class="bordered">
										<thead>
											<th colspan="3">Class Information</th>
										</thead>
										<thead>
											<th>Section Name</th>
											<th>Year Level</th>
											<th>Adviser</th>
										</thead>
										<tbody>
											<td>
												<div class="input-control select ">
													<select name="section_name">
														<?php foreach($section_info as $section):?>
												  			<option value="<?php echo $section['section_id'];?>"><?php echo $section['section_name'];?></option>
												  		<?php endforeach?>
												  	</select>
												</div>
									  		</td>
									  		<td>
									  			<div class="input-control select">
										    			<select name="school_year_level">
													  	<option value="2010-2011">School Year : 2010-2011</option>
													  	<option value="2011-2012">School Year : 2011-2012</option>
													  	<option value="2012-2013">School Year : 2012-2013</option>
													  	<option value="2013-2014">School Year : 2013-2014</option>
													  	<option value="2014-2015">School Year : 2014-2015</option>
													  	<option value="2016-2017">School Year : 2016-2017</option>
													  	<option value="2018-2019">School Year : 2018-2019</option>
													  	<option value="2020-2021">School Year : 2020-2021</option>
													  	<option value="2020-2012">School Year : 2020-2012</option>
													  	<option value="2012-2013">School Year : 2012-2013</option>
													  	<option value="2014-2015">School Year : 2014-2015</option>
													  	<option value="2015-2016">School Year : 2015-2016</option>
													  	<option value="2017-2018">School Year : 2017-2018</option>
													  	<option value="2019-2030">School Year : 2019-2030</option>
													</select>
												</div><!--input control select-->
											</td>
											<td>
												<div class="input-control select">
													<select name="section_adviser">
															<?php foreach($get_all_faculty as $faculty):?>
																<option value="<?php echo $faculty['faculty_id'];?>"><?php echo $faculty['faculty_fname'].' '.$faculty['faculty_mname'].' '.$faculty['faculty_lname'];?></option>
															<?php endforeach?>
													</select>
												</div><!--input control select-->
											</td>
										</tbody>
									</table>
									
									<table class="hovered bordered">
										<thead>
											<th>Subject Name</th>
											<th>Subject Teacher</th>
										</thead>
										<tbody>
										<td>
											<div class="input-control select">
											<select name="subject[]">
												<?php foreach($get_all_subject as $subject):?>
													<option value="<?php echo $subject['subject_id'];?>"><?php echo $subject['subject_name'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
										<td>
											<div class="input-control select">
											<select name="faculty[]">
												<?php foreach($get_all_faculty as $faculty):?>
													<option value="<?php echo $faculty['faculty_id'];?>"><?php echo $faculty['faculty_fname'].' '.$faculty['faculty_mname'].' '.$faculty['faculty_lname'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
									</tbody>
									<tbody>
										<td>
											<div class="input-control select">
											<select name="subject[]">
												<?php foreach($get_all_subject as $subject):?>
													<option value="<?php echo $subject['subject_id'];?>"><?php echo $subject['subject_name'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
										<td>
											<div class="input-control select">
											<select name="faculty[]">
												<?php foreach($get_all_faculty as $faculty):?>
													<option value="<?php echo $faculty['faculty_id'];?>"><?php echo $faculty['faculty_fname'].' '.$faculty['faculty_mname'].' '.$faculty['faculty_lname'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
									</tbody>
									<tbody>
										<td>
											<div class="input-control select">
											<select name="subject[]">
												<?php foreach($get_all_subject as $subject):?>
													<option value="<?php echo $subject['subject_id'];?>"><?php echo $subject['subject_name'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
										<td>
											<div class="input-control select">
											<select name="faculty[]">
												<?php foreach($get_all_faculty as $faculty):?>
													<option value="<?php echo $faculty['faculty_id'];?>"><?php echo $faculty['faculty_fname'].' '.$faculty['faculty_mname'].' '.$faculty['faculty_lname'];?></option>
												<?php endforeach?>
											</select>
											</div>	
										</td>
									</tbody>
									<tbody>
										<td>
											<div class="input-control select">
											<select name="subject[]">
												<?php foreach($get_all_subject as $subject):?>
													<option value="<?php echo $subject['subject_id'];?>"><?php echo $subject['subject_name'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
										<td>
											<div class="input-control select">
											<select name="faculty[]">
												<?php foreach($get_all_faculty as $faculty):?>
													<option value="<?php echo $faculty['faculty_id'];?>"><?php echo $faculty['faculty_fname'].' '.$faculty['faculty_mname'].' '.$faculty['faculty_lname'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
									</tbody>
									<tbody>
										<td>
											<div class="input-control select">
											<select name="subject[]">
												<?php foreach($get_all_subject as $subject):?>
													<option value="<?php echo $subject['subject_id'];?>"><?php echo $subject['subject_name'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
										<td>
											<div class="input-control select">
											<select name="faculty[]">
												<?php foreach($get_all_faculty as $faculty):?>
													<option value="<?php echo $faculty['faculty_id'];?>"><?php echo $faculty['faculty_fname'].' '.$faculty['faculty_mname'].' '.$faculty['faculty_lname'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
									</tbody>
									<tbody>
										<td>
											<div class="input-control select">
											<select name="subject[]">
												<?php foreach($get_all_subject as $subject):?>
													<option value="<?php echo $subject['subject_id'];?>"><?php echo $subject['subject_name'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
										<td>
											<div class="input-control select">
											<select name="faculty[]">
												<?php foreach($get_all_faculty as $faculty):?>
													<option value="<?php echo $faculty['faculty_id'];?>"><?php echo $faculty['faculty_fname'].' '.$faculty['faculty_mname'].' '.$faculty['faculty_lname'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
									</tbody>
									<tbody>
										<td>
											<div class="input-control select">
											<select name="subject[]">
												<?php foreach($get_all_subject as $subject):?>
													<option value="<?php echo $subject['subject_id'];?>"><?php echo $subject['subject_name'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
										<td>
											<div class="input-control select">
											<select name="faculty[]">
												<?php foreach($get_all_faculty as $faculty):?>
													<option value="<?php echo $faculty['faculty_id'];?>"><?php echo $faculty['faculty_fname'].' '.$faculty['faculty_mname'].' '.$faculty['faculty_lname'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
									</tbody>
									<tbody>
										<td>
											<div class="input-control select">
											<select name="subject[]">
												<?php foreach($get_all_subject as $subject):?>
													<option value="<?php echo $subject['subject_id'];?>"><?php echo $subject['subject_name'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
										<td>
											<div class="input-control select">
											<select name="faculty[]">
												<?php foreach($get_all_faculty as $faculty):?>
													<option value="<?php echo $faculty['faculty_id'];?>"><?php echo $faculty['faculty_fname'].' '.$faculty['faculty_mname'].' '.$faculty['faculty_lname'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
									</tbody>
									<tbody>
										<td>
											<div class="input-control select">
											<select name="subject[]">
												<?php foreach($get_all_subject as $subject):?>
													<option value="<?php echo $subject['subject_id'];?>"><?php echo $subject['subject_name'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
										<td>
											<div class="input-control select">
											<select name="faculty[]">
												<?php foreach($get_all_faculty as $faculty):?>
													<option value="<?php echo $faculty['faculty_id'];?>"><?php echo $faculty['faculty_fname'].' '.$faculty['faculty_mname'].' '.$faculty['faculty_lname'];?></option>
												<?php endforeach?>
											</select>
											</div>
										</td>
									</tbody>
									</table>
									<input type="submit" value="Create a Class">
								</form>

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