<?php

namespace App\Controllers;

use App\Models\UserModel;
use App\Models\StudentModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

  // Example in LoginController
  public function authenticate()
  {
      $model = new StudentModel(); // Make sure this is imported at the top
      $username = $this->request->getPost('username');
      $password = $this->request->getPost('password');
  
      $student = $model->where('username', $username)->first(); // Fetch the student
  
      if ($student) {
          if (password_verify($password, $student['password'])) {
              // Set session data
              $sessionData = [
                  'student_id' => $student['id'], // Use student_id instead of user_id
                  'username' => $student['username'],
                  'isLoggedIn' => true,
              ];
              session()->set($sessionData);
  
              // Redirect to the student dashboard
              return redirect()->to('/dashboard');
          } else {
              return redirect()->back()->with('error', 'Invalid credentials');
          }
      } else {
          return redirect()->back()->with('error', 'User not found');
      }
  }  

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login'); // Redirect to home or login page after logout
    }
}
