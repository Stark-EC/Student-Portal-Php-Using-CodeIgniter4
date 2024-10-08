<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseModel extends Model
{
    protected $table = 'courses';  // The table to use
    protected $allowedFields = ['course_name', 'course_description', 'course_code'];

    // Fetch all courses
    public function getCourses()
    {
        return $this->findAll(); // Retrieves all courses
    }

    // Register course for a user
    public function registerCourse($data)
    {
        return $this->db->table('student_courses')->insert($data); // Insert into student_courses
    }
}
