<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\StudentCourseModel;

class CourseController extends BaseController
{
    public function index()
    {
        $courseModel = new CourseModel();
        $data['courses'] = $courseModel->getCourses();
        return view('register_course', $data);
    }

    // This method handles the search functionality
    public function searchCourse()
    {
        $courseCode = $this->request->getPost('course_code');
        
        // Query the database for the course using the course code
        $courseModel = new \App\Models\CourseModel();
        $course = $courseModel->where('course_code', $courseCode)->first();
    
        // If course is not found, redirect back with an error
        if (!$course) {
            return redirect()->to('/courses')->with('error', 'Course not found.');
        }
    
        // Set the success message in session flashdata
        session()->setFlashdata('success', 'Course found successfully.');
    
        // Load the view with the found course
        $data['course'] = $course;
        return view('register_course', $data); // No chaining with ->with()
    }
    
    // View registered courses for logged-in user
    public function viewRegisteredCourses()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to view registered courses.');
        }
    
        $userId = session()->get('user_id');
        $studentCourseModel = new \App\Models\StudentCourseModel();
    
        $data['registeredCourses'] = $studentCourseModel->getRegisteredCoursesByUser($userId);
        return view('registered_courses', $data);
    }
    

    // Handle course registration
    public function register()
    {
        // Ensure the user is logged in
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'You must be logged in to register for courses.');
        }
    
        // Get the student_id from session
        $studentId = session()->get('student_id');
        $courseId = $this->request->getPost('course_id');
    
        // Ensure the student_id exists in the students table
        $studentModel = new \App\Models\StudentModel();
        $student = $studentModel->find($studentId);
    
        if (!$student) {
            return redirect()->back()->with('error', 'Student record not found.');
        }
    
        // Register the course
        $studentCourseModel = new \App\Models\StudentCourseModel();
        $studentCourseModel->insert([
            'student_id' => $studentId,  // Use the correct student_id from the session
            'course_id' => $courseId,
        ]);
    
        return redirect()->to('/registered-courses')->with('success', 'You have successfully registered for the course.');
    }
    
}
