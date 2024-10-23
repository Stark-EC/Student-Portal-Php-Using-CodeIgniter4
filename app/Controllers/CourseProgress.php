<?php

namespace App\Controllers;

use App\Models\CourseProgressModel;

class CourseProgress extends BaseController
{
    public function updateProgress()
    {
        $courseProgressModel = new CourseProgressModel();
        $studentId = session()->get('student_id');
        
        $data = [
            'student_id' => $studentId,
            'course_id' => $this->request->getPost('course_id'), // Assuming course_id is sent from the form
            'progress_percentage' => $this->request->getPost('progress_percentage'),
        ];

        $courseProgressModel->save($data);

        return redirect()->to('/dashboard')->with('success', 'Progress updated successfully.');
    }

    public function viewProgress($courseId)
    {
        $courseProgressModel = new CourseProgressModel();
        $studentId = session()->get('student_id');

        $progress = $courseProgressModel->where(['student_id' => $studentId, 'course_id' => $courseId])->first();

        return view('progress_view', ['progress' => $progress]);
    }
}
