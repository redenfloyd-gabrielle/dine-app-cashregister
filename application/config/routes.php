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
$route['default_controller'] = 'CInitialize';

$route['login'] = 'CInitialize';
$route['logout'] = 'CLogin';
$route['signin'] = 'CLogin/userLogin';
$route['signout'] = 'CLogin/userLogout';

$route['admin/dashboard'] = 'CLogin/viewAdminDashboard';
$route['admin/categories'] = 'CProduct/viewCategoryList';
$route['admin/orders'] = 'COrdered/viewOrderList';
$route['admin/reports'] = 'CReports/getData';
$route['admin/addproduct'] = 'CProduct/addNewProduct';
$route['admin/order/(.*)'] = 'COrderItem/viewOrderInfo/$1';
$route['admin/category/(.*)'] = 'CProduct/viewProductsInCategory/$1';
$route['admin/editproduct/(.*)'] = 'CProduct/editProductInfo/$1';
$route['admin/product/(.*)'] = 'CProduct/viewProductInfo/$1';
$route['admin/reports/receipt/(.*)'] = 'CReports/viewInfo/$1';



$route['superadmin/dashboard'] = 'CLogin/viewSuperadminDashboard';
$route['superadmin/users'] = 'CUser/viewUsersList';
$route['superadmin/products'] = 'CProduct/viewAllProducts';
$route['superadmin/adduser'] = 'CUser/vAddUser';
$route['superadmin/edituser/(.*)'] = 'CUser/editUserInfo/$1';


$route['getscannedorders'] = 'COrdered/getScannedOrders';
$route['getpendingorders'] = 'COrdered/getPendingOrders';
$route['getexpiredorders'] = 'COrdered/getExpiredOrders';
$route['getorders'] = 'COrdered/getOrders';

$route['getallproducts'] = 'CProduct/getAllProducts';
$route['getdrinks'] = 'CProduct/getDrinks';
$route['getpancit'] = 'CProduct/getPancit';
$route['getmaincourse'] = 'CProduct/getMainCourse';
$route['getextras'] = 'CProduct/getExtras';
$route['getsoup'] = 'CProduct/getSoup';

$route['addproduct'] = 'CProduct/addProduct';
$route['deleteproduct'] = 'CProduct/deleteProduct';
$route['restockproduct'] = 'CProduct/restockProduct';
$route['updateproduct/(.*)'] = 'CProduct/updateProduct/$1';

$route['adduser'] = 'CUser/addUser';
$route['updateuser/(.*)'] = 'CUser/updateUser/$1';
$route['deleteuser'] = 'CUser/deleteUser';
$route['changepassword'] = 'CUser/changePassword';

$route['cashregister'] = 'CLogin/viewPos';
$route['cashregister/qrcode'] = 'COrdered/viewQDashboard';
$route['cashregister/manual'] = 'CProduct/viewMDashboard';
$route['cashregister/editorder/(.*)/(.*)/(.*)'] = 'COrderItem/viewEdit/$1/$2/$3';
$route['cashregister/manual/dashboard/(.*)'] = 'CProduct/backToMDashboard/$1';
$route['cashregister/edit/(.*)'] = 'COrdered/displayOrderFromEditPage/$1';



$route['viewproductsedit/(.*)/(.*)/(.*)/(.*)'] = 'CProduct/viewProductEdit/$1/$2/$3/$4';
$route['displayfromqr'] = 'COrdered/displayOrderFromQR';
$route['addtoreceipt'] = 'CReceipt/addOrderToReceipt';
$route['printreceipt'] = 'CReceipt/printReceipt';
$route['updatelist/(.*)/(.*)/(.*)/(.*)'] = 'COrderItem/updateList/$1/$2/$3/$4';
$route['edititems/(.*)/(.*)/(.*)/(.*)'] = 'CReceiptItem/editItems/$1/$2/$3/$4';
$route['removelist/(.*)/(.*)/(.*)/(.*)'] = 'COrderItem/removeToList/$1/$2/$3/$4';
$route['addreceiptitem/(.*)/(.*)'] = 'CReceiptItem/addReceiptItem/$1/$2';
$route['displayorderlistmanual'] = 'CReceiptItem/displayOrderListManual';
$route['viewproduct/(.*)'] = 'CProduct/viewProduct/$1';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
