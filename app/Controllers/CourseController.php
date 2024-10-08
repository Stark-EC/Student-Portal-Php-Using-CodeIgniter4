<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\StudentCourseModel; // Import StudentCourseModel

class CourseController extends BaseController
{
    public function index()
    {
        $courseModel = new CourseModel();
        $data['courses'] = $courseModel->findAll(); // Fetch all courses to display
        return view('register_course', $data); // Load view
    }

    public function viewRegisteredCourses()
    {
        // Assume user is logged in and we can get their user ID
        $userId = session()->get('user_id'); 

        // Create an instance of StudentCourseModel
        $studentCourseModel = new StudentCourseModel();
        
        // Fetch registered courses for the logged-in user
        $data['registeredCourses'] = $studentCourseModel->getRegisteredCoursesByUser($userId);

        // Load the view with registered courses
        return view('registered_courses', $data);
    }

    public function register()
    {
        // Validate input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'course_id' => 'required|is_not_unique[courses.id]',
        ]);

        if (!$this->validate($validation->getRules())) {
            // If validation fails, reload the form with errors
            return redirect()->to('/courses')->withInput()->with('errors', $this->validator->getErrors());
        }

        $studentCourseModel = new StudentCourseModel();

        // Prepare data for insertion
        $data = [
            'student_id' => session()->get('user_id'), // Get the logged-in student's ID
            'course_id' => $this->request->getPost('course_id'), // Course ID from the form
        ];

        // Register course for the student
        $studentCourseModel->insert($data);

        return redirect()->to('/registered-courses')->with('success', 'Course registered successfully!'); // Redirect with success message
    }
}
