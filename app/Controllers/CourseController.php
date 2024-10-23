<?php

namespace App\Controllers;

use App\Models\CourseModel;
use App\Models\StudentCourseModel;
use CodeIgniter\Controller;
use App\Models\CourseProgressModel;

class CourseController extends BaseController
{
    public function index()
    {
        // Load the course registration view
        return view('register_course');
    }

    public function searchCourse()
    {
        // Get the course code from the form input
        $courseCode = $this->request->getPost('course_code');
    
        // If no course code is provided, redirect with an error
        if (empty($courseCode)) {
            return redirect()->to('/courses')->with('error', 'Please provide a search term.');
        }
    
        // Instantiate CourseModel and search for courses matching the course code
        $courseModel = new CourseModel();
        $course = $courseModel->where('course_code', $courseCode)->first(); // Change 'code' to 'course_code'
    
        // Check if the course was found
        if (!$course) {
            return redirect()->to('/courses')->with('error', 'No courses found.');
        }
    
        // Load the search results with the course data
        $data['course'] = $course;
        return view('register_course', $data);
    }
    

    public function register()
    {
        // Get the logged-in student's ID from the session
        $studentId = session()->get('student_id');
        if (!$studentId) {
            return redirect()->to('/login')->with('error', 'You need to log in first.');
        }

        // Get the course ID from the form
        $courseId = $this->request->getPost('course_id');

        // If no course ID is provided, return with an error
        if (empty($courseId)) {
            return redirect()->to('/courses')->with('error', 'No course selected.');
        }

        // Initialize StudentCourseModel
        $studentCourseModel = new StudentCourseModel();

        // Check if the student is already registered for the course
        $alreadyRegistered = $studentCourseModel->where([
            'student_id' => $studentId,
            'course_id'  => $courseId,
        ])->first();

        if (!$alreadyRegistered) {
            // Insert the course for the student
            $studentCourseModel->insert([
                'student_id' => $studentId,
                'course_id'  => $courseId,
            ]);
            return redirect()->to('/registered-courses')->with('success', 'Course registered successfully!');
        } else {
            return redirect()->to('/courses')->with('error', 'You are already registered for this course.');
        }
    }

    public function viewRegisteredCourses()
    {
        // Get the logged-in student ID
        $studentId = session()->get('student_id');
        
        // Check if the student is logged in
        if (!$studentId) {
            return redirect()->to('/login')->with('error', 'You need to log in first.');
        }
    
        // Load the models
        $StudentCourseModel = new \App\Models\StudentCourseModel();
        $CourseModel = new \App\Models\CourseModel();  // Assuming this is your model for courses
    
        // Fetch registered courses for the logged-in student
        $data['registeredCourses'] = $StudentCourseModel->where('student_id', $studentId)
                                                        ->join('courses', 'courses.id = student_courses.course_id')
                                                        ->select('courses.course_code, courses.course_name, courses.course_description')
                                                        ->findAll();
    
        // Load the registered courses view
        return view('registered_courses', $data);
    }

    public function viewProgress() {
        $session = session();
        $studentId = $session->get('student_id');
    
        $courseProgressModel = new CourseProgressModel();
        $progressData = $courseProgressModel->getProgressByStudent($studentId);
    
        return view('course_progress', ['progressData' => $progressData]);
    }
    

    public function updateProgress($courseId) {
        $session = session();
        $studentId = $session->get('student_id');
    
        if ($this->request->getMethod() === 'post') {
            $progressPercentage = $this->request->getPost('progress_percentage');
    
            $courseProgressModel = new \App\Models\CourseProgressModel();
            $courseProgressModel->updateProgress($studentId, $courseId, $progressPercentage);
    
            return redirect()->to('/viewProgress')->with('success', 'Progress updated successfully.');
        }
    
        return view('update_course_progress', ['courseId' => $courseId]);
    }

    // app/Controllers/CourseController.php

// app/Controllers/CourseController.php

public function enrolledCourses() {
    $session = session();
    $studentId = $session->get('student_id');

    // Fetch registered courses and progress
    $courseModel = new CourseModel();
    $courseProgressModel = new CourseProgressModel();

    // Get all course IDs the student is enrolled in
    $courseIds = $courseProgressModel->where('student_id', $studentId)->findColumn('course_id');

    // Fetch courses that match the retrieved IDs
    if ($courseIds) {
        $enrolledCourses = $courseModel->whereIn('id', $courseIds)->findAll();

        // Fetch progress for each course
        foreach ($enrolledCourses as &$course) {
            $course['progress'] = $courseProgressModel->getProgress($studentId, $course['id']);
        }
    } else {
        $enrolledCourses = []; // No enrolled courses
    }

    return view('enrolled_courses', ['courses' => $enrolledCourses]);
}

    
}