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
$routes->get('/profile', 'Student::profile'); // Display the profile page
$routes->post('student/updateProfile', 'Student::updateProfile'); // Handle profile update
$routes->post('/courses/search', 'CourseController::searchCourse');
$routes->get('/courses', 'CourseController::index');
$routes->post('/courses/register', 'CourseController::register');
$routes->get('/registered-courses', 'CourseController::viewRegisteredCourses');

$routes->get('/course-progress', 'CourseController::viewProgress');
$routes->get('/course-progress/update/(:num)', 'CourseController::updateProgress/$1');
$routes->get('/enrolled-courses', 'CourseController::enrolledCourses');

$routes->get('/course-progress', 'CourseController::viewProgress');
$routes->get('/course-progress/update/(:num)', 'CourseController::updateProgress/$1'); // Updates progress for a course
$routes->post('/course-progress/update', 'CourseProgress::updateProgress');
$routes->get('/course-progress/view/(:num)', 'CourseProgress::viewProgress/$1'); // Views progress for a specific course

// app/Config/Routes.php
$routes->get('notifications', 'NotificationController::index');
$routes->get('notifications/mark-as-read/(:num)', 'NotificationController::markAsRead/$1');

$routes->get('/announcements/(:num)', 'AnnouncementController::index/$1');
$routes->post('/announcements/add', 'AnnouncementController::add');

// message routes
$routes->get('messages/inbox', 'MessageController::index'); // Inbox
$routes->post('messages/send', 'MessageController::send');  // Send Message
$routes->get('messages/view/(:num)', 'MessageController::view/$1'); // View Message

$routes->get('messages', 'MessageController::index'); // View inbox
$routes->get('messages/compose', 'MessageController::compose'); // Form for sending a message
$routes->post('messages/send', 'MessageController::send'); // Process sending a message
$routes->get('messages/view/(:num)', 'MessageController::view/$1'); // View a specific message
$routes->get('messages/mark-as-read/(:num)', 'MessageController::markAsRead/$1'); // Mark a message as read
$routes->get('messages/delete/(:num)', 'MessageController::delete/$1'); // Delete a message
$routes->get('/messages/send', 'MessageController::send'); // Display the send message form
$routes->post('/messages/send', 'MessageController::sendMessage'); // Handle sending the message

 