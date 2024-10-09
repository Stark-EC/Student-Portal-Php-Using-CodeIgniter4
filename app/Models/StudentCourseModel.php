<?php

namespace App\Models;

use CodeIgniter\Model;

class StudentCourseModel extends Model
{
    protected $table = 'student_courses';
    protected $allowedFields = ['student_id', 'course_id'];

    public function getRegisteredCoursesByUser($userId)
    {
        return $this->select('courses.course_name, courses.course_description')
                    ->join('courses', 'courses.id = student_courses.course_id')
                    ->where('student_courses.student_id', $userId)
                    ->findAll();
    }
}
