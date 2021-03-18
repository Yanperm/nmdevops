<?php
defined('BASEPATH') OR exit('No direct script access allowed');

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
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/

$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['search/(:any)'] = 'search/listData';
$route['search'] = 'search/listData';

$route['physician'] = 'clinic/index';
$route['physician/register'] = 'clinic/register';
$route['physician/login'] = 'clinic/login';
$route['package'] = 'clinic/package';
$route['clinic/(:any)'] = 'clinic/detail';
$route['time/(:any)'] = 'clinic/time';
$route['booking/(:any)'] = 'clinic/booking';
$route['booking-confirm'] = 'clinic/confirm';
$route['checkin'] = 'clinic/checkin';
$route['detail_checkin'] = 'clinic/detailCheckin';
$route['confirm/checkin/(:any)'] = 'clinic/confirmCheckin';
$route['clinic_profile'] = 'clinic/profile';
$route['like'] = 'clinic/like';


$route['physician/dashboard'] = 'physician/dashboard';

$route['physician/manage/checkin'] = 'physician/checkin';
$route['physician/manage/cancel'] = 'physician/cancel';

$route['physician/ques/show'] = 'physician/showQues';
$route['physician/ques/call'] = 'physician/quesCall';
$route['physician/ques/reset'] = 'physician/quesReset';

$route['physician/time'] = 'physician/time';
$route['physician/time/update'] = 'physician/timeUpdate';
$route['physician/time/holiday'] = 'physician/timeHoliday';
$route['physician/time/holiday/delete'] = 'physician/timeHolidayDelete';

$route['physician/clinic'] = 'physician/clinic';
$route['physician/clinic/update'] = 'physician/clinicUpdate';

$route['physician/youtube'] = 'physician/youtube';
$route['physician/youtube/update'] = 'physician/youtubeUpdate';
$route['physician/youtube/delete'] = 'physician/youtubeDelete';

$route['physician/doctor'] = 'physician/doctor';
$route['physician/doctor/update'] = 'physician/doctorUpdate';

$route['physician/profile'] = 'physician/profile';
$route['physician/profile/update'] = 'physician/profileUpdate';
$route['physician/password/update'] = 'physician/passwordUpdate';

$route['register'] = 'auth/register';
$route['login'] = 'auth/login';
$route['logout'] = 'auth/logout';
$route['login_member'] = 'auth/loginMember';
$route['add_member'] = 'auth/addMember';
$route['add_clinic'] = 'auth/addClinic';
$route['check_email_already'] = 'auth/checkEmailAlready';
$route['check_email_clinic_already'] = 'auth/checkEmailClinicAlready';
$route['check_email_already_profile'] = 'auth/checkEmailAlreadyProfile';
$route['check_old_password'] = 'auth/checkOldPassword';
$route['verify'] = 'auth/verify';
$route['verify/check'] = 'auth/verifyCheck';
$route['re-send-email'] = 'auth/reSendMail';


$route['member/profile'] = 'member/profile';
$route['loadBooking/(:any)'] = 'member/loadBooking';
$route['loadCheckin/(:any)'] = 'member/loadCheckin';
$route['profile/update'] = 'member/profileUpdate';
$route['profile/change/image'] = 'member/profileChangeImage';
$route['password/update'] = 'member/passwordUpdate';
$route['profile/checkin'] = 'member/checkInMember';

$route['admin'] = 'auth/loginAdmin';

$route['admin/clinic/detail/(:any)'] = 'admin/clinicDetail';

