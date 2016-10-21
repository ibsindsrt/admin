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
$route['default_controller'] = 'login';
$route['System-Configuration'] = 'System-Configuration/Sysconfig';
$route['Sales'] = 'Sales/Sales';
$route['Account'] = 'Account/Account';
$route['Account/Masters'] = 'Account/Masters/Masters';
$route['Account/Masters/Packages'] = 'Account/Masters/Packages/Package';
$route['Account/Masters/Packages/Add'] = 'Account/Masters/Packages/Package/Add';
$route['Account/Masters/Packages/Update'] = 'Account/Masters/Packages/Package/Update';
$route['Account/Masters/Packages/Update/(:any)'] = 'Account/Masters/Packages/Package/Update/$1';

$route['Account/Masters'] = 'Account/Masters/Masters';
$route['Account/Masters/ServiceTax'] = 'Account/Masters/Masters';
$route['Account/Masters/ServiceTax/'] = 'Account/Masters/ServiceTax/ServiceTax';
$route['System-Configuration/Masters'] = 'System-Configuration/Masters/Masters';
$route['System-Configuration/Masters/Location'] = 'System-Configuration/Masters/Masters';
$route['System-Configuration/Masters/Services'] = 'System-Configuration/Masters/Masters';
$route['System-Configuration/Masters/Telecom'] = 'System-Configuration/Masters/Masters';
$route['System-Configuration/Masters/Location/Country'] = 'System-Configuration/Masters/Location/Country/Country';
$route['System-Configuration/Masters/Location/State'] = 'System-Configuration/Masters/Location/State/State';
$route['System-Configuration/Masters/Location/District'] = 'System-Configuration/Masters/Location/District/District';
$route['System-Configuration/Masters/Location/SubDistrict'] = 'System-Configuration/Masters/Location/SubDistrict/SubDistrict';
$route['System-Configuration/Masters/Location/City'] = 'System-Configuration/Masters/Location/City/City';
$route['System-Configuration/Masters/Location/Area'] = 'System-Configuration/Masters/Location/Area/Area';
$route['System-Configuration/Masters/Location/Country/(:any)'] = 'System-Configuration/Masters/Location/Country/Country/$1';
$route['System-Configuration/Masters/Location/State/(:any)'] = 'System-Configuration/Masters/Location/State/State/$1';
$route['System-Configuration/Masters/Location/District/(:any)'] = 'System-Configuration/Masters/Location/District/District/$1';
$route['System-Configuration/Masters/Location/SubDistrict/(:any)'] = 'System-Configuration/Masters/Location/SubDistrict/SubDistrict/$1';
$route['System-Configuration/Masters/Location/City/(:any)'] = 'System-Configuration/Masters/Location/City/City/$1';
$route['System-Configuration/Masters/Location/Area/(:any)'] = 'System-Configuration/Masters/Location/Area/Area/$1';
$route['System-Configuration/Masters/Location/Country/(:any)/(:any)'] = 'System-Configuration/Masters/Location/Country/Country/$1/$2';
$route['System-Configuration/Masters/Location/State/(:any)/(:any)'] = 'System-Configuration/Masters/Location/State/State/$1/$2';
$route['System-Configuration/Masters/Location/District/(:any)/(:any)'] = 'System-Configuration/Masters/Location/District/District/$1/$2';
$route['System-Configuration/Masters/Location/SubDistrict/(:any)/(:any)'] = 'System-Configuration/Masters/Location/SubDistrict/SubDistrict/$1/$2';
$route['System-Configuration/Masters/Location/City/(:any)/(:any)'] = 'System-Configuration/Masters/Location/City/City/$1/$2';
$route['System-Configuration/Masters/Location/Area/(:any)/(:any)'] = 'System-Configuration/Masters/Location/Area/Area/$1/$2';
$route['System-Configuration/Masters/Services/Main-Service'] = 'System-Configuration/Masters/Services/MService';
$route['System-Configuration/Masters/Services/Main-Service/(:any)'] = 'System-Configuration/Masters/Services/MService/$1';
$route['System-Configuration/Masters/Services/Main-Service/(:any)/(:any)'] = 'System-Configuration/Masters/Services/MService/$1/$2';
$route['System-Configuration/Masters/Services/Sub-Service'] = 'System-Configuration/Masters/Services/SService';
$route['System-Configuration/Masters/Services/Sub-Service/(:any)'] = 'System-Configuration/Masters/Services/SService/$1';
$route['System-Configuration/Masters/Services/Sub-Service/(:any)/(:any)'] = 'System-Configuration/Masters/Services/SService/$1/$2';
$route['System-Configuration/SMPP-Configuration'] = 'System-Configuration/SMPP-Configuration/SMPP';
$route['System-Configuration/SMPP-Configuration/Routers'] = 'System-Configuration/SMPP-Configuration/SMPP';
$route['System-Configuration/SMPP-Configuration/Connectivities/HTTP'] = 'System-Configuration/SMPP-Configuration/Connectivities/HTTP/Http';
$route['System-Configuration/SMPP-Configuration/Connectivities/HTTP/(:any)'] = 'System-Configuration/SMPP-Configuration/Connectivities/HTTP/Http/$1';
$route['System-Configuration/SMPP-Configuration/Connectivities/HTTP/(:any)/(:any)'] = 'System-Configuration/SMPP-Configuration/Connectivities/HTTP/Http/$1/$2';
$route['System-Configuration/SMPP-Configuration/Routers/SmppBox'] = 'System-Configuration/SMPP-Configuration/Routers/SmppBox/Smppbox';
$route['System-Configuration/SMPP-Configuration/Routers/SmppBox/(:any)'] = 'System-Configuration/SMPP-Configuration/Routers/SmppBox/Smppbox/$1';
$route['System-Configuration/SMPP-Configuration/Routers/SmppBox/(:any)/(:any)'] = 'System-Configuration/SMPP-Configuration/Routers/SmppBox/Smppbox/$1/$2';
$route['System-Configuration/SMPP-Configuration/Routers/Lcr'] = 'System-Configuration/SMPP-Configuration/Routers/Lcr/Lcr';
$route['System-Configuration/SMPP-Configuration/Routers/Lcr/(:any)'] = 'System-Configuration/SMPP-Configuration/Routers/Lcr/Lcr/$1';
$route['System-Configuration/SMPP-Configuration/Routers/Lcr/(:any)/(:any)'] = 'System-Configuration/SMPP-Configuration/Routers/Lcr/Lcr/$1/$2';
$route['404_override'] = '';
$route['translate_uri_dashes'] = TRUE;
