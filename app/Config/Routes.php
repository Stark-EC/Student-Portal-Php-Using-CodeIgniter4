<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 // app/Config/Routes.php

$routes->get('/', 'Home::index');
$routes->get('/register', 'Register::index');
$routes->post('/register/store', 'Register::store');
$routes->get('/login', 'Login::index');
$routes->post('/login/authenticate', 'Login::authenticate');
$routes->get('/logout', 'Login::logout');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('courses', 'CourseController::index');
$routes->post('courses/register', 'CourseController::register');
$routes->get('registered-courses', 'CourseController::viewRegisteredCourses');


 