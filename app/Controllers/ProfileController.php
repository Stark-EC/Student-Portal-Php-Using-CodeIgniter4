<?php
namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Controller;

class ProfileController extends BaseController
{
    public function updatePassword()
    {
        // Check if the user is logged in
        $session = session();
        $studentId = $session->get('student_id');
        if (!$studentId) {
            return redirect()->to('/login')->with('error', 'You must log in first.');
        }

        // Get the new password from the form
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        // Check if both passwords match
        if ($newPassword !== $confirmPassword) {
            return redirect()->back()->with('error', 'Passwords do not match.');
        }

        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $StudentModel = new StudentModel();
        $StudentModel->update($studentId, ['password' => $hashedPassword]);

        // Set a success message in the session and redirect back to the profile page
        return redirect()->to('/profile')->with('success', 'Password changed successfully.');
    }

    public function index()
    {
        // Load profile view (you can pass in data here as needed)
        return view('profile');
    }
}
