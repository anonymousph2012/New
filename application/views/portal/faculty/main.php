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
        <span class="element">Faculty Panel</span>
        <span class="divider"></span>
        <ul class="menu">
          <li><a href="<?php echo base_url('portal/faculty/profile_settings');?>">Account Settings</a></li>
          <li><a href="<?php echo base_url('portal/faculty');?>">News </a></li>
          <li><a href="<?php echo base_url('portal/faculty/class');?>">Class</a></li>
          <li class="place-right"><a href="<?php echo base_url('portal/faculty/logout');?>">Logout</a></li>
        </ul><!--menu-->
      </div><!--nav-bar-inner-->
    </div><!--nav-bar-->

    <!--CONTENT-->
    <div class="grid">
    <div class="page secondary">
      <div class="page-header">
        <div class="page-header-content">
          <h1>News Around The Campus</h1>
        </div><!--page-header-content-->
      </div><!--page-header-->
      <div class="page-region">
        <div class="page-region-content">
          <div class="row">
          <div class="span11">
            <div class="page-control" data-role="page-control">
              <!--tabs-->
              <ul>
                <li class="active"><a href="#frame1">Announcement</a></li>
                <li><a href="#frame2">News Feed</a></li>
              </ul>
              <!--tab-content-->
              <div class="frames">
                <div class="frame active" id="frame1">
                  
                  <?php foreach($announcement as $announcements):?>
                    <legend><a href="<?php echo base_url('portal/faculty/announcement').'/'.$announcements['announcement_id'];?>"><?php echo $announcements['announcement_title'];?></a></h2> by <?php echo $announcements['administrator_name'];?> </legend>
                    <blockquote>
                    <p class="muted"><?php echo $announcements['announcement_content'];?></p>
                    </blockquote>
                    <br><br>
                  <?php endforeach?>
                </div><!--frame1-->
                <div class="frame" id="frame2">
                  asdasdasd
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