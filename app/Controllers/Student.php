<?php
// app/Controllers/Student.php

namespace App\Controllers;

use App\Models\StudentModel;

class Student extends BaseController {

    public function profile() {
        // Check if the user is logged in
        $session = session();
        $studentId = $session->get('student_id');
        if (!$studentId) {
            return redirect()->to('/login')->with('error', 'You must log in first.');
        }
    
        $studentModel = new StudentModel();
        $student = $studentModel->find($studentId);
    
        // Retrieve student details from the session if available
        if (session()->getFlashdata('student')) {
            $student = session()->getFlashdata('student');
        }
    
        return view('update_profile', ['student' => $student]); // Pass student data to the view
    }
    

    public function updateProfile() {
        $studentModel = new StudentModel();
        $studentId = session()->get('student_id');
    
        $data = [
            'phone' => $this->request->getPost('phone'),
            'date_of_birth' => $this->request->getPost('date_of_birth'),
            'address' => $this->request->getPost('address'),
            'gender' => $this->request->getPost('gender'),
            'bio' => $this->request->getPost('bio'),
            'social_links' => json_decode($this->request->getPost('social_links'), true),
        ];
    
        // Validate and update password if provided
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');
        if ($newPassword && $newPassword === $confirmPassword) {
            $data['password'] = password_hash($newPassword, PASSWORD_DEFAULT);
        } else if ($newPassword) {
            return redirect()->back()->with('errors', ['Passwords do not match']);
        }
    
        // Handle profile picture upload
        $file = $this->request->getFile('profile_picture');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $fileName = $file->getRandomName();
            $file->move(WRITEPATH . 'uploads', $fileName);
            $data['profile_picture'] = $fileName;
        }
    
        // Update the student information
        $studentModel->update($studentId, $data);
    
        return redirect()->to('/profile')->with('success', 'Profile updated successfully');
    }
    
    
    
}
