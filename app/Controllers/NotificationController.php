<?php
// app/Controllers/NotificationController.php
namespace App\Controllers;

use App\Models\NotificationModel;

class NotificationController extends BaseController {
    public function index() {
        $session = session();
        $studentId = $session->get('student_id');

        $notificationModel = new NotificationModel();
        $notifications = $notificationModel->getUnreadNotifications($studentId);

        return view('notifications', ['notifications' => $notifications]);
    }

    public function markAsRead($notificationId) {
        $notificationModel = new NotificationModel();
        $notificationModel->markAsRead($notificationId);

        return redirect()->back()->with('success', 'Notification marked as read.');
    }
}
