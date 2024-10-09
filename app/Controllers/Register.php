<?php

namespace App\Controllers;

use App\Models\StudentModel; // Use StudentModel
use CodeIgniter\Controller;

class Register extends BaseController
{
    public function index()
    {
        return view('register');
    }

    public function store()
    {
        // Validate form data
        $validation = \Config\Services::validation();
        $validation->setRules([
            'first_name' => 'required',
            'last_name'  => 'required',
            'username'    => 'required|min_length[3]|is_unique[students.username]',
            'email'      => 'required|valid_email|is_unique[students.email]',
            'password'   => 'required|min_length[6]',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Save student to the database
        $studentModel = new StudentModel();
        $studentModel->save([
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'username'   => $this->request->getPost('username'),
            'email'      => $this->request->getPost('email'),
            'password'   => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
        ]);

        return redirect()->to('/login')->with('success', 'Registration successful! Please log in.');
    }
}
