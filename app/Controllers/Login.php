<?php

namespace App\Controllers;

use App\Models\UserModel;

class Login extends BaseController
{
    public function index()
    {
        return view('login');
    }

    // public function authenticate()
    // {
    //     $userModel = new UserModel();
    //     $user = $userModel->where('username', $this->request->getPost('username'))->first();

    //     if ($user && password_verify($this->request->getPost('password'), $user['password'])) {
    //         session()->set([
    //             'username' => $user['username'],
    //             'isLoggedIn' => true
    //         ]);

    //         return redirect()->to('/');
    //     }

    //     return redirect()->back()->with('error', 'Invalid login credentials.');
    // }

    public function authenticate()
{
    $model = new UserModel();

    $username = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    $user = $model->where('username', $username)->first();

    if ($user) {
        if (password_verify($password, $user['password'])) {
            // Set session data
            $sessionData = [
                'username' => $user['username'],
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
        return redirect()->to('/');
    }
}
