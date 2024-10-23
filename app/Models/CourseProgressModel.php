<?php

namespace App\Models;

use CodeIgniter\Model;

class CourseProgressModel extends Model {
    // Specify the table name
    protected $table = 'course_progress';

    // Specify the primary key
    protected $primaryKey = 'id';

    // Specify which fields can be inserted or updated
    protected $allowedFields = ['student_id', 'course_id', 'progress_percentage'];

    // Get the progress for a specific student
    public function getProgressByStudent($studentId) {
        return $this->where('student_id', $studentId)->findAll();
    }

    // Get the progress percentage for a specific course and student
    public function getProgress($studentId, $courseId) {
        $progress = $this->where(['student_id' => $studentId, 'course_id' => $courseId])->first();
        return $progress ? $progress['progress_percentage'] : 0; // Return 0 if no progress found

        // Example of adding a notification if progress is low
    if ($progress < 30) {
    $notificationModel = new NotificationModel();
    $notificationModel->insert([
        'student_id' => $studentId,
        'message' => 'Your progress in course ' . $courseId . ' is below 30%. Please update your progress.'
    ]);
}

    }

    // Update progress for a specific student and course
    public function updateProgress($studentId, $courseId, $progress) {
        // Ensure that progress is within an acceptable range (0-100)
        if ($progress < 0 || $progress > 100) {
            throw new \InvalidArgumentException('Progress must be between 0 and 100.');
        }
    
        $data = [
            'student_id' => $studentId,
            'course_id' => $courseId,
            'progress_percentage' => $progress,
            'last_updated' => date('Y-m-d H:i:s'), // Update timestamp
        ];
    
        $existing = $this->where(['student_id' => $studentId, 'course_id' => $courseId])->first();
        if ($existing) {
            $this->update($existing['id'], $data);
        } else {
            $this->insert($data);
        }
    }
    
}
