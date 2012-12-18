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
						<h1>Class List</h1>
					</div>
				</div><!--page-header-->
				<div class="page-region">
					<div class="page-region-content">
						<div class="row">
							<div class="span11">
								<table class="hovered">
									<thead>
										<th>School Year</th>
										<th>Section</th>
										<th>Adviser</th>
										<th></th>
									</thead>
									<?php foreach($section_details as $section):?>
									<tbody>
										<td><?php echo $section['section_school_year'];?></td>
										<td><?php echo $section['section_name'];?></td>
										<td><?php echo $section['faculty_fname'].' '.$section['faculty_mname'].' '.$section['faculty_lname'];?></td>
										<td><a class="btn"href=<?php echo base_url('portal/student/class/').'/'.$section['section_details_id'];?>>View Grades</a></td>
									</tbody>
									<?php endforeach;?>
								</table>
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