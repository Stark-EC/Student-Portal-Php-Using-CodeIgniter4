<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentCourseModel extends Model
{
    protected $table = 'student_courses';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'course_id'];

    // Fetch registered courses for a specific student
    public function getRegisteredCoursesByUser($userId)
    {
        return $this->select('courses.course_name, courses.course_description')
                    ->join('courses', 'student_courses.course_id = courses.id')
                    ->where('student_courses.student_id', $userId)
                    ->findAll();
    }
}
