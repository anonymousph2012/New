<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	http://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There area two reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router what URI segments to use if those provided
| in the URL cannot be matched to a valid route.
|
*/

$route['default_controller'] = 'welcome';
$route['404_override'] = '';

/* FOR LOGIN & LOGOUT */
$route['login'] = 'login';



/*FOR ADMINISTRATOR*/
$route['portal/administrator'] = 'administrator';
$route['portal/administrator/profile_settings'] = 'administrator/profile_settings';
$route['portal/administrator/student'] = 'administrator/student';
$route['portal/administrator/teacher'] = 'administrator/teacher';
$route['portal/administrator/subject'] = 'administrator/subject';
$route['portal/administrator/section'] = 'administrator/section';
$route['portal/administrator/announcements'] = 'administrator/announcements';
$route['portal/administrator/class_management'] = 'administrator/class_management';
$route['portal/administrator/user_account'] = 'administrator/user_account';
$route['portal/administrator/logout'] = 'administrator/logout';


//updates user account
$route['portal/administrator/modify_profile'] = 'administrator/modify_profile';
//getting specific account
$route['portal/administrator/user_account/(:num)'] = 'administrator/user_account/$1';
//updating specific account
$route['portal/administrator/user_account/modify/(:num)'] = 'administrator/modify_user_account/$1';
//search user account!
$route['portal/administrator/user_account/search'] = 'administrator/search_user_account';
//enable account!
$route['portal/administrator/user_account/modify_account_status_enable/(:num)'] = 'administrator/enable_account/$1';
//disable account!
$route['portal/administrator/user_account/modify_account_status_disable/(:num)'] = 'administrator/disable_account/$1';


//getting specific account
$route['portal/administrator/student/(:num)'] = 'administrator/student/$1';
//updating specific account
$route['portal/administrator/student/modify/(:num)'] = 'administrator/modify_student_details/$1';
//search user account!
$route['portal/administrator/student/search'] = 'administrator/search_student_details';


//getting specific teacher
$route['portal/administrator/teacher/(:num)'] = 'administrator/teacher/$1';
//updating specific teacher
$route['portal/administrator/teacher/modify/(:num)'] = 'administrator/modify_teacher_details/$1';
//search user teacher!
$route['portal/administrator/teacher/search'] = 'administrator/search_teacher_details';

//getting specific subjects
$route['portal/administrator/subject/(:num)'] = 'administrator/subject/$1';
//updating specific subjects
$route['portal/administrator/subject/modify/(:num)'] = 'administrator/modify_subject_details/$1';
//search user subjects!
$route['portal/administrator/subject/search'] = 'administrator/search_subject_details';

//getting specific section
$route['portal/administrator/section/(:num)'] = 'administrator/section/$1';
//updating specific section
$route['portal/administrator/section/modify/(:num)'] = 'administrator/modify_section_details/$1';
//search user section!
$route['portal/administrator/section/search'] = 'administrator/search_section_details';

//getting specific announcements
$route['portal/administrator/announcements/(:num)'] = 'administrator/announcements/$1';
//updating specific announcements
$route['portal/administrator/announcements/modify/(:num)'] = 'administrator/modify_announcements_details/$1';
//search user announcements!
$route['portal/administrator/announcements/search'] = 'administrator/search_announcements_details';

//getting specific class
$route['portal/administrator/class/(:num)'] = 'administrator/class_management/$1';
//getting specific student for a specific class
$route['portal/administrator/class/(:num)/(:num)'] = 'administrator/student_in_class/$1/$2';

//updating specific section
$route['portal/administrator/class/modify_grade/(:num)'] = 'administrator/modify_student_grade/$1';





/*
add records student,faculty,subject
*/
$route['portal/administrator/student/add_student'] = 'administrator/add_student';
$route['portal/administrator/faculty/add_teacher'] = 'administrator/add_teacher';
$route['portal/administrator/subject/add_subject'] = 'administrator/add_subject';
$route['portal/administrator/section/add_section'] = 'administrator/add_section';
$route['portal/administrator/announcements/add_announcements'] = 'administrator/add_announcements';
$route['portal/administrator/class_management/add_class'] = 'administrator/add_class';
$route['portal/administrator/class/add_student'] = 'administrator/add_student_in_class';

/*
END FOR ADMINISTRATOR
*/
//------------------------------------------------

//------------------------------------------------
/*FOR FACULTY*/


$route['portal/faculty'] = 'faculty';
$route['portal/faculty/announcement/(:num)'] = 'faculty/announcement/$1';
$route['portal/faculty/profile_settings'] = 'faculty/profile_settings';
$route['portal/faculty/class'] = 'faculty/my_class';
$route['portal/faculty/class/(:num)/add_grade'] = 'faculty/add_grade/$1';
$route['portal/faculty/class/(:num)'] = 'faculty/my_class/$1';
$route['portal/faculty/class/(:num)/(:num)'] = 'faculty/student_in_class/$1/$2';
$route['portal/faculty/logout'] = 'faculty/logout';
$route['portal/faculty/modify_profile'] = 'faculty/modify_profile';

/*END FOR FACULTY*/
//------------------------------------------------


//------------------------------------------------
/*FOR STUDENTS*/
$route['portal/student'] = 'student/main';
$route['portal/student/announcement/(:num)'] = 'student/announcement/$1';
$route['portal/student/profile_settings'] = 'student/profile_settings';
$route['portal/student/grades'] = 'student/grades';
$route['portal/student/class/(:num)'] = 'student/class_details/$1';
$route['portal/student/logout'] = 'student/logout';
$route['portal/student/modify_profile'] = 'student/modify_profile';
/*END FOR STUDENTS*/
//------------------------------------------------
/* End of file routes.php */
/* Location: ./application/config/routes.php */