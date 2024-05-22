<?php
defined('BASEPATH') OR exit('No direct script access allowed');



$route['default_controller'] = 'UserController';
$route['admin'] = 'dashboard/index';

#admin Routes

#login Routes
$route['admin-login'] = 'dashboard/login_index';
$route['admin-login-process'] = 'adminController/loginProcess';


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

##service Charge Fee Route
$route['admin-add-service-fee'] = 'serviceFeeController/addFee';
$route['admin-get-service-fee'] = 'serviceFeeController/getFee';
$route['admin-update-fee'] = 'serviceFeeController/updateFee';

#user Routes
$route['admin-add-user'] = 'adminController/addUser';
$route['admin-get-user'] = 'adminController/getUser';
$route['admin-update-user'] = 'adminController/updateUser';
$route['admin-delete-user'] = 'adminController/deleteUser';


#transaction Routes
$route['admin-get-branch-transaction'] = 'adminController/getTransaction';

#customer Routes
$route['admin-edit-customer'] = 'adminController/getCustomer';
$route['admin-update-customer'] = 'adminController/updateCustomer';

#PROFILE ROUTES
$route['admin-change-password'] = 'adminController/updatePassword';
$route['admin-update-profile'] = 'adminController/updateProfile';


#REPORTS
$route['admin-get-income-this-day'] = 'adminController/incomeThisDay';
$route['admin-get-income-this-month'] = 'adminController/incomeThisMonth';
$route['admin-get-customer-count-this-year'] = 'adminController/customerCountThisYear';
$route['admin-get-employees-count'] = 'adminController/employeesCount';
$route['admin-get-branches-count'] = 'adminController/branchesCount';

#CHARTS
$route['admin-get-chart'] = 'adminController/getCharts';


##################################end of Admin Routes############################


####################branch admin Routes for Branch Manager ######################
$route['branch-admin'] = 'branchAdminController/render';
$route['branch-employees'] = 'branchAdminController/branchEmployees_index';
$route['branch-customers'] = 'branchAdminController/branchCustomers_index';
$route['branch-transactions'] = 'branchAdminController/branchTransactions_index';
$route['branch-My-profile'] = 'branchAdminController/branchMyProfile_index';

#Employees
$route['get-branch-employee'] = 'branchAdminController/getEmployee';

#customers
$route['edit-branch-customer'] = 'branchAdminController/getCustomer';
$route['update-branch-customer'] = 'branchAdminController/updateCustomer';


#branch Transaction
$route['bm-get-fee'] = 'branchAdminController/getFee';
$route['add-bm-transaction'] = 'branchAdminController/addBMTransaction';
$route['get-branch-transaction'] = 'branchAdminController/getTransaction';
$route['get-transaction-data'] = 'branchAdminController/getTransaction';
$route['update-bm-side-transaction'] = 'branchAdminController/updateBMTransaction';

#print
$route['print-me/(:any)'] = 'branchAdminController/printMe/$1';

#branch Manager Profile
$route['bm-change-pass'] = 'branchAdminController/changePass';
$route['bm-avatar-upload'] = 'branchAdminController/uploadAvatar';

##REPORTS
$route['branch-get-income-this-day'] = 'branchAdminController/incomeThisDay';
$route['branch-get-income-this-month'] = 'branchAdminController/incomeThisMonth';
$route['branch-get-customer-count-today'] = 'branchAdminController/customerCountToday';
$route['branch-get-employees-count'] = 'branchAdminController/branchEmployeesCount';


##CHARTS
$route['branch-get-chart'] = 'branchAdminController/getChartsReport';
#############################end of Branch admin Routes ########################






###USER ROUTE#########################################

#create Transaction #route
$route['get-fee'] = 'branchTransactionController/getFee';
$route['user-create-transaction'] = 'branchTransactionController/createTransaction';
$route['print-transaction/(:any)'] = 'branchTransactionController/printTransaction/$1';

##check Transaction Code
$route['checkMyCode'] = 'branchTransactionController/checkMyCode';
$route['claim-transaction'] = 'branchTransactionController/claimTransaction';


#check Code and Transaction Code || Branch transaction
$route['checkCode/(:any)'] = 'checkCodeController/render/$1';
$route['sendTransaction'] = 'sendTransactionController/render';

$route['branchTransaction'] = 'branchTransactionController/render_transaction_index';
$route['get-transaction'] = 'branchTransactionController/getTransaction';
$route['update-branch-transaction'] = 'branchTransactionController/updateTransaction';
$route['view-transaction'] = 'branchTransactionController/viewTransaction';

#user Profile
$route['get-bp-profile'] = 'branchTransactionController/getProfile';
$route['update-bp-profile'] = 'branchTransactionController/updateProfile';



###End of USER ROUTE ###########################



#Employees login Process
$route['emp-login'] = 'loginController/user_login_process';

#end of Login

#logout
$route['log-out'] = 'loginController/logout';
$route['admin-log-out'] = 'loginController/logoutAdmin';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
 