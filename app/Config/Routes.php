<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Register::index');
$routes->post('/register/store', 'Register::store');
$routes->get('login', 'Login::index');            // Display login page
$routes->post('login/authenticate', 'Login::authenticate');  // Handle login form submission
$routes->get('logout', 'Login::logout');          // Logout route
$routes->get('/dashboard', 'Dashboard::index');
// $routes->get('/courses/search', 'CourseController::searchCourse');
$routes->post('/courses/search', 'CourseController::searchCourse');
$routes->get('/courses', 'CourseController::index');
$routes->post('/courses/register', 'CourseController::register');
$routes->get('/registered-courses', 'CourseController::viewRegisteredCourses');

 