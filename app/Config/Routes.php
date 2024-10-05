<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/register', 'Register::index');
$routes->post('/register/store', 'Register::store');
$routes->get('/login', 'Login::index');
$routes->post('/login/authenticate', 'Login::authenticate');
$routes->get('/logout', 'Login::logout');
$routes->get('/dashboard', 'Dashboard::index');

$routes->get('courses', 'CourseController::index');              // Displays available courses
$routes->get('registered-courses', 'CourseController::registeredCourses');  // Shows registered courses for the student
$routes->get('profile', 'ProfileController::index');             // Displays student's profile
$routes->post('register-course', 'CourseController::register');  // Registers a course (for form submissions)

// $routes->get('/dashboard/register-courses', 'Dashboard::registerCourses');
// $routes->post('/dashboard/processRegisterCourses', 'Dashboard::processRegisterCourses');
// $routes->get('/dashboard/registered-courses', 'Dashboard::viewRegisteredCourses');
// $routes->get('/dashboard/profile', 'Dashboard::updateProfile');
// $routes->post('/dashboard/processUpdateProfile', 'Dashboard::processUpdateProfile');

