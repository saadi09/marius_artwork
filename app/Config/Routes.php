<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'FrontController::index');
$routes->get('/dashboard', 'Home::index');
$routes->get('/login', 'Users::index');
$routes->post('/login', 'Users::login');
$routes->get('/register', 'Users::register');
$routes->get('/logout', 'Users::logout');
$routes->post('/register_user', 'Users::registerUser');
$routes->get('/menu_manager', 'Home::menuManger');
$routes->get('/menu_create', 'Home::menuCreate');
$routes->post('/menu_add', 'Home::menuStore');
$routes->post('/menu_delete', 'Home::menuDelete');
$routes->get('/menu_edit/(:any)', 'Home::menuEdit/$1');
$routes->post('/menu_update', 'Home::menuUpdate');
$routes->get('/forgot_password', 'Users::forgotPassword');

//Menu Routes 
$routes->get('/menu_route_listing', 'Home::listMenuRoutes');
$routes->get('/menu_routes', 'Home::menuRoutes');
$routes->get('/menu_route_edit/(:any)', 'Home::menuRoutesEdit/$1');
$routes->post('/menu_route_update', 'Home::menuRouteUpdate');
$routes->post('/menu_route_store', 'Home::menuRouteStore');
$routes->post('/menu_route_delete', 'Home::deleteMenuRoutes');


//Groups & Permission
$routes->get('/add_groups', 'Home::add_groups');
$routes->post('/store_groups', 'Home::storeGroups');
$routes->get('/add_permission', 'Home::groupsPermission');
$routes->get('/user_group_permission/(:any)', 'Home::userGroupsPermission/$1');
$routes->post('/get_child_menu', 'Home::getChildMenu');
$routes->post('/storePermission', 'Home::storePermission');

//Activity Logs
$routes->get('/activity_logs', 'Home::activityLogs');
$routes->post('/get_ajax_activity_logs', 'Home::ajaxLoadData');



//Artworks 
$routes->get('/list_artwork', 'ArtWorks::index');
$routes->post('/get_all_artworks', 'ArtWorks::ajaxLoadData');
$routes->get('/create_artwork', 'ArtWorks::create');
$routes->post('/store_artwork', 'ArtWorks::store');
$routes->get('/view_art_work/(:any)', 'ArtWorks::show/$1');
$routes->post('/update_artwork', 'ArtWorks::update');



/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
