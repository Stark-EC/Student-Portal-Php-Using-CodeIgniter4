<?php
namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\Controller;

class ProfileController extends Controller
{
    public function index()
    {
        return view('update_profile');
    }

    public function update()
    {
        // Get the logged-in student's ID from the session
        $studentId = session()->get('student_id');
        if (!$studentId) {
            return redirect()->to('/login')->with('error', 'You need to log in first.');
        }

        // Validate the new password
        $validation = \Config\Services::validation();
        $validation->setRules([
            'new_password' => 'required|min_length[6]',
            'confirm_password' => 'matches[new_password]'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Update the password in the database
        $StudentModel = new StudentModel();
        $StudentModel->update($studentId, [
            'password' => password_hash($this->request->getPost('new_password'), PASSWORD_DEFAULT)
        ]);

        return redirect()->to('/profile')->with('success', 'Password updated successfully!');
    }
}
