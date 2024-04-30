<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'UserController';
$route['admin'] = 'adminController/render';

#admin Routes
$route['admin-employees'] = 'adminController/employee_index';
$route['admin-brances'] = 'adminController/branches_index';
$route['admin-customers'] = 'adminController/customer_index';
$route['admin-transactions'] = 'adminController/transaction_index';
$route['admin-job-title'] = 'adminController/jobs_index';
$route['admin-countries'] = 'adminController/countries_index';
$route['admin-regions'] = 'adminController/regions_index';
$route['admin-locations'] = 'adminController/locations_index';
$route['admin-users'] = 'adminController/users_index';
$route['admin-profile'] = 'adminController/profile_index';
$route['admin-service-fee'] = 'adminController/serviceCharge_index';
#end of Admin Routes


#branch admin Routes
$route['branch-admin'] = 'branchAdminController/render';
$route['branch-employees'] = 'branchAdminController/branchEmployees_index';
$route['branch-customers'] = 'branchAdminController/branchCustomers_index';
$route['branch-transactions'] = 'branchAdminController/branchTransactions_index';
$route['branch-My-profile'] = 'branchAdminController/branchMyProfile_index';


#end of Branch admin Routes




$route['checkCode'] = 'checkCodeController/render';
$route['sendTransaction'] = 'sendTransactionController/render';
$route['branchTransaction'] = 'branchTransactionController/render';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 