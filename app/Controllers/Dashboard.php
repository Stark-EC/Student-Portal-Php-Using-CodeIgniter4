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

}
