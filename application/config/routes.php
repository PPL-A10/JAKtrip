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

$route['default_controller'] = "welcome";
$route['404_override'] = '';

$route['home'] = 'homeCtr';
$route['home/(:any)'] = 'homeCtr/index/$1';
$route['trip'] = 'SearchCtr';
$route['trip/owntrip'] = 'SearchCtr/SearchWithoutBudget';
$route['trip/recommendation'] = 'SearchCtr/SearchWithinBudgetRec';
$route['trip/view'] = 'viewTripCtr'; 
$route['allplaces'] = 'allPlacesCtr';
$route['allplaces/send'] = 'allPlacesCtr/sendSuggestion'; 
$route['place/(:any)'] = 'PlaceCtr/index/$1';
$route['place/review/(:any)'] = 'PlaceCtr/rating/$1';
$route['flag/(:any)'] = 'FlagCtr/index/$1';
$route['flag/review/(:any)'] = 'FlagCtr/rating/$1';
$route['flag/spam/(:any)'] = 'FlagCtr/spamreport/$1/$2';
$route['allpromo'] = 'allPromosCtr';
$route['promo/(:any)'] = 'PromoCtr/index/$1';

$route['faq'] = 'faqCtr';
$route['contactus'] = 'feedbackCtr'; 
$route['contactus/send'] = 'feedbackCtr/sendSuggestion'; 

$route['admin/members'] = 'manageMemberCtr';
$route['admin/places'] = 'manageTourAttrCtr';

$route['admin/places/edit/(:any)'] = 'manageTourAttrCtr/edit/$1';
$route['admin/places/delete/(:any)'] = 'manageTourAttrCtr/del/$1';
$route['admin/addnewplace'] = 'tourAttrCtr';
$route['admin/spam'] = 'spamCtr';
$route['admin/statistics'] = 'statisticCtr';
$route['admin/suggestions'] = 'suggestionCtr';
$route['admin/feedback'] = 'FeedbackAdmCtr';
$route['admin/promo'] = 'ManagePromoCtr';
$route['admin/addnewpromo'] = 'addPromoCtr';
$route['admin/promos/delete/(:any)'] = 'ManagePromoCtr/del/$1';
$route['admin/promos/edit/(:any)'] = 'ManagePromoCtr/edit/$1';

$route['user'] = 'UsersCtr';
$route['user/edit'] = 'UsersCtr/edit';

$route['register'] = 'registerCtr'; 
$route['login'] = 'loginCtr/checkLogin'; 
$route['login/forgotpassword'] = 'forgotPassCtr';

$route['successLoginFB'] = 'homeCtr/successLoginFB';


// $route['PlaceCtr/(:any)'] = 'PlaceCtr/index/$1';
// $route['ReviewCtr/del/(:any)/(:num)'] = 'ReviewCtr/del/$1/$2';
// $route['PlaceCtr/rating/(:any)'] = 'PlaceCtr/rating/$1';
// $route['AllPlacesCtr/searchwisataCatLocKey/(:any)/(:any)/(:any)'] = 'AllPlacesCtr/searchwisataCatLocKey/$1/$2/$3';
//$route['ReviewCtr/(:any)'] = 'ReviewCtr/index/$1';
//$route['DetailCtr/getdetail/(:any)'] = 'DetailCtr/index/$1';
//$route['controllername/(:any)/(:any)'] = 'ddd/index/$1/$2';
//$route['controllername/(:any)//(:any)'] = 'ddd/index/$1/$3';
//$route['controllername//(:any)/(:any)'] = 'ddd/index/$2/$3';
//$route['controllername/(:any)'] = 'ddd/index/$1';

//$route['search/(:any)'] = 'search/index/$1';

$route['admin/manageMemberCtr/del/(:any)'] = 'manageMemberCtr/del/$1'; 
$route['index.php/ManageTourAttrCtr/searchtour/(:any)'] = 'ManageTourAttrCtr/searchtour/$1'; 
$route['flag/FlagCtr/spamreport/(:num)'] = 'FlagCtr/spamreport/$1'; 
$route['flag/(:any)/addwishlist'] = 'FlagCtr/addWishlist/$1'; 
$route['flag/(:any)/removewishlist'] = 'FlagCtr/removeWishlist/$1'; 
$route['flag/(:any)/addvisited'] = 'FlagCtr/addVisited/$1'; 
$route['flag/(:any)/removevisited'] = 'FlagCtr/removeVisited/$1'; 
$route['user/addwishlist'] = 'UsersCtr/addWishlist/$1'; 
$route['user/removewishlist'] = 'UsersCtr/removeWishlist/$1'; 

/* End of file routes.php */
/* Location: ./application/config/routes.php */