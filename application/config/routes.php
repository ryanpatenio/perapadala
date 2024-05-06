<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'UserController';
$route['admin'] = 'adminController/render';

#admin Routes
$route['admin-employees'] = 'adminController/employee_index';
$route['admin-branches'] = 'adminController/branches_index';
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

##Jobs Route
$route['admin-addJob'] = 'jobController/addJob';
$route['admin-getJob'] = 'jobController/getJob';
$route['admin-updateJob'] = 'jobController/updateJob';

##countries Route
$route['admin-addCountry'] = 'countriesController/addCountry';
$route['admin-editCountry'] = 'countriesController/editCountry';
$route['admin-updateCountry'] = 'countriesController/updateCountry';

##Region Route
$route['admin-addRegion'] = 'regionController/addRegion';
$route['admin-editRegion'] = 'regionController/editRegion';
$route['admin-updateRegion'] = 'regionController/updateRegion';

##location Route
$route['admin-add-location'] = 'locationController/addLocation';
$route['admin-editLocation'] = 'locationController/editLocation';
$route['admin-update-location'] = 'locationController/updateLocation';

##Branch Route
$route['admin-add-branch'] = 'adminBranchController/addBranch';
$route['admin-edit-location'] = 'adminBranchController/editBranch';
$route['admin-updateBranch'] = 'adminBranchController/updateBranch';

##employees Route
$route['admin-addEmployee'] = 'employeesController/addEmployee';
$route['admin-edit-employee'] = 'employeesController/editEmployee';
$route['admin-update-employee'] = 'employeesController/updateEmployee';
$route['admin-get-employee-name'] = 'employeesController/getEmployee';
$route['admin-assignEmployee'] = 'employeesController/assignEmployee';
$route['admin-get-assignBranch'] = 'employeesController/getEmployeeAssignBranch';
$route['admin-removeAssignBranch'] = 'employeesController/removeAssignBranch';
$route['admin-get-employee-details'] = 'employeesController/getEmployeeDetails';
#end of Branch admin Routes




$route['checkCode'] = 'checkCodeController/render';
$route['sendTransaction'] = 'sendTransactionController/render';
$route['branchTransaction'] = 'branchTransactionController/render';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 