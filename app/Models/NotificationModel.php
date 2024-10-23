<?php
// app/Models/NotificationModel.php
namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model {
    protected $table = 'notifications';
    protected $primaryKey = 'id';
    protected $allowedFields = ['student_id', 'message', 'is_read'];

    public function getUnreadNotifications($studentId) {
        return $this->where(['student_id' => $studentId, 'is_read' => 0])->findAll();
    }

    public function markAsRead($notificationId) {
        return $this->update($notificationId, ['is_read' => 1]);
    }
}
