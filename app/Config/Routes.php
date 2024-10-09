<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Register::index');
$routes->post('/registration/store', 'Register::store');
$routes->get('login', 'Login::index');
$routes->post('login/authenticate', 'Login::authenticate');
$routes->get('logout', 'Login::logout');
         // Logout route
$routes->get('/dashboard', 'Dashboard::index');
$routes->post('courses/search', 'CourseController::searchCourse');
$routes->get('/courses', 'CourseController::index');
$routes->post('/courses/register', 'CourseController::register');
$routes->get('/registered-courses', 'CourseController::viewRegisteredCourses');

 