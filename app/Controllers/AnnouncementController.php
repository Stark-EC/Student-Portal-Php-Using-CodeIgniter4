<?php

namespace App\Controllers;

use App\Models\AnnouncementModel;

class AnnouncementController extends BaseController {

    public function index($courseId) {
        $announcementModel = new AnnouncementModel();
        $announcements = $announcementModel->getAnnouncementsByCourse($courseId);

        return view('announcements', ['announcements' => $announcements, 'courseId' => $courseId]);
    }

    public function add() {
        $courseId = $this->request->getPost('course_id');
        $message = $this->request->getPost('message');

        // Debugging output
        log_message('debug', 'Course ID: ' . $courseId); // Check the course ID being received

        $announcementModel = new AnnouncementModel();
        
        // Create data array for insertion
        $data = [
            'course_id' => $courseId,
            'message' => $message,
        ];

        // Try to insert the announcement
        if ($announcementModel->insert($data)) {
            // If insert is successful, redirect to view announcements
            return redirect()->to('/announcements/' . $courseId)
                             ->with('success', 'Announcement added successfully');
        } else {
            // If insert fails, redirect back to the form with errors
            return redirect()->back()
                             ->with('errors', $announcementModel->errors())
                             ->withInput();
        }
    }
}
