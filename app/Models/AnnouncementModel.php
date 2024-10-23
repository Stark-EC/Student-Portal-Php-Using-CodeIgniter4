<?php

namespace App\Models;

use CodeIgniter\Model;

class AnnouncementModel extends Model {
    protected $table = 'announcements';
    protected $primaryKey = 'id';
    protected $allowedFields = ['course_id', 'message', 'created_at'];

    // Fetch announcements for a specific course
    public function getAnnouncementsByCourse($courseId) {
        return $this->where('course_id', $courseId)
                    ->orderBy('created_at', 'DESC')
                    ->findAll();
    }

    // Add a new announcement
    public function addAnnouncement($data) {
        return $this->insert($data);
    }
}
