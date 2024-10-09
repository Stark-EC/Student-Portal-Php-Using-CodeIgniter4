<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    public function authenticate()
    {
        $model = new UserModel();
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');
    
        $user = $model->where('username', $username)->first();
    
        if ($user && password_verify($password, $user['password'])) {
            // Set session data
            $sessionData = [
                'user_id' => $user['id'],  // Important to store user_id
                'username' => $user['username'],
                'isLoggedIn' => true,
            ];
            session()->set($sessionData);
    
            // Redirect to the dashboard or course registration page
            return redirect()->to('/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials or user not found.');
        }
    }
    

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/');
    }
}
