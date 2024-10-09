<?php

namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        // Check if the user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        // Get student information from session
        $data = [
            'username' => session()->get('username'),
        ];

        // Load the dashboard view
        return view('dashboard', $data);
    }

    public function dashboard()
{
    echo '<pre>';
    print_r(session()->get());
    echo '</pre>';
}


    // In app/Controllers/Dashboard.php

public function registerCourses()
{
    // Ensure the student is logged in
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    // Load the available courses from the database
    $model = new \App\Models\CourseModel();
    $data['courses'] = $model->findAll();

    // Load the course registration view
    return view('register_courses', $data);
}


// process the registered courses
// In app/Controllers/Dashboard.php

public function processRegisterCourses()
{
    // Ensure the student is logged in
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    // Get student ID from session
    $studentId = session()->get('id');
    
    // Get course ID from form submission
    $courseId = $this->request->getPost('course_id');
    
    // Insert the record into the `student_courses` table
    $model = new \App\Models\StudentCourseModel();
    $model->insert([
        'student_id' => $studentId,
        'course_id' => $courseId
    ]);

    // Redirect back to dashboard or show success message
    return redirect()->to('/dashboard')->with('success', 'Course registered successfully');
}

// view registered courses
// In app/Controllers/Dashboard.php

public function viewRegisteredCourses()
{
    // Ensure the student is logged in
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    // Get the student ID from the session
    $studentId = session()->get('id');

    // Get registered courses from the `student_courses` table
    $model = new \App\Models\StudentCourseModel();
    $data['registered_courses'] = $model->where('student_id', $studentId)
                                        ->join('courses', 'student_courses.course_id = courses.id')
                                        ->findAll();

    // Load the view for registered courses
    return view('view_registered_courses', $data);
}


// update the profile
// In app/Controllers/Dashboard.php

public function updateProfile()
{
    // Ensure the student is logged in
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    // Load the student's profile data
    $model = new \App\Models\UserModel();
    $data['student'] = $model->find(session()->get('id'));

    // Load the profile update form view
    return view('update_profile', $data);
}



// In app/Controllers/Dashboard.php
// Process the Profile Update

public function processUpdateProfile()
{
    // Ensure the student is logged in
    if (!session()->get('isLoggedIn')) {
        return redirect()->to('/login');
    }

    // Get the posted data
    $username = $this->request->getPost('username');
    $email = $this->request->getPost('email');

    // Update the student's profile in the `users` table
    $model = new \App\Models\UserModel();
    $model->update(session()->get('id'), [
        'username' => $username,
        'email' => $email,
    ]);

    // Redirect back to the dashboard with a success message
    return redirect()->to('/dashboard')->with('success', 'Profile updated successfully');
}


}
