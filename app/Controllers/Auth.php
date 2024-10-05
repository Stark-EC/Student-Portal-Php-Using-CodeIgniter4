<?php

namespace App\Controllers;

use App\Models\UserModel;

class Auth extends BaseController
{
    public function register()
    {
        return view('register');
    }

    public function registerProcess()
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_BCRYPT),
            'email' => $this->request->getPost('email'),
        ];
        $model->save($data);
        return redirect()->to('/login');
    }

    public function login()
    {
        return view('login');
    }

    public function loginProcess()
    {
        $model = new UserModel();
        // Authentication logic here...
    }
}

