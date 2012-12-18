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
          <h1>Grades</h1>
        </div><!--page-header-content-->
      </div><!--page-header-->
      <div class="page-region">
        <div class="page-region-content">
          <div class="row">
          <div class="span11">
            <div class="page-control" data-role="page-control">
              <!--tabs-->
              <ul>
                <li class="active"><a href="#frame1">1st Quarter</a></li>
                <li><a href="#frame2">2nd Quarter</a></li>
                <li><a href="#frame3">3rd Quarter</a></li>
                <li><a href="#frame4">4th Quarter</a></li>
              </ul>
              <!--tab-content-->
              <div class="frames">
                <div class="frame active" id="frame1">
                  <table class="hovered">
                    <thead>
                      <th>Subject Name</th>
                      <th>Subject Grade</th>
                    </thead>
                  <?php foreach($student_grade as $grade): ?>
                  <?php if($grade['subject_quarter'] == '1ST QUARTER'): ?>
                    <tbody>
                      <td><?php echo $grade['subject_name'];?></td>
                      <td><?php echo $grade['subject_grade'];?></td>
                    </tbody>
                  <?php endif;?>
                  <?php  endforeach?>
                  </table>
                </div><!--frame1-->
                <div class="frame" id="frame2">
                   <table class="hovered">
                    <thead>
                      <th>Subject Name</th>
                      <th>Subject Grade</th>
                    </thead>
                  <?php foreach($student_grade as $grade): ?>
                  <?php if($grade['subject_quarter'] == '2ND QUARTER'): ?>
                    <tbody>
                      <td><?php echo $grade['subject_name'];?></td>
                      <td><?php echo $grade['subject_grade'];?></td>
                    </tbody>
                  <?php endif;?>
                  <?php  endforeach?>
                  </table>
                </div><!--frame2-->
                <div class="frame" id="frame3">
                   <table class="hovered">
                    <thead>
                      <th>Subject Name</th>
                      <th>Subject Grade</th>
                    </thead>
                  <?php foreach($student_grade as $grade): ?>
                  <?php if($grade['subject_quarter'] == '3RD QUARTER'): ?>
                    <tbody>
                      <td><?php echo $grade['subject_name'];?></td>
                      <td><?php echo $grade['subject_grade'];?></td>
                    </tbody>
                  <?php endif;?>
                  <?php  endforeach?>
                  </table>
                </div><!--frame2-->
                <div class="frame" id="frame4">
                   <table class="hovered">
                    <thead>
                      <th>Subject Name</th>
                      <th>Subject Grade</th>
                    </thead>
                  <?php foreach($student_grade as $grade): ?>
                  <?php if($grade['subject_quarter'] == '4TH QUARTER'): ?>
                    <tbody>
                      <td><?php echo $grade['subject_name'];?></td>
                      <td><?php echo $grade['subject_grade'];?></td>
                    </tbody>
                  <?php endif;?>
                  <?php  endforeach?>
                  </table>
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