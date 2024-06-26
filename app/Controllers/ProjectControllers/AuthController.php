<?php

namespace App\Controllers\ProjectControllers;

use App\Controllers\BaseController;
use App\Models\ProjectModel\UserModel;

class AuthController extends BaseController
{
    protected $session; // Add this property

    public function __construct()
    {
        // Load the session library
        $this->session = \Config\Services::session();
    }

    public function register()
    {
        return view('ProjectViews/auth/auth_index');
    }

    public function processRegister()
    {
        $model = new UserModel();

        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'email' => $this->request->getPost('email'),
            'fullname' => $this->request->getPost('fullname'),
            'dob' => $this->request->getPost('dob'),
        ];

        if ($model->addUser($data)) {
            return redirect()->to(site_url('project/login'))->with('success', 'User registered successfully!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Failed to register user!');
        }
    }

    public function login()
    {
        return view('ProjectViews/auth/auth_index');
    }

    public function processLogin()
    {
        $model = new UserModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->getUserByUsername($username);

        if ($user && password_verify($password, $user['password'])) {
            // Set session data or any other authentication logic
            $this->session->set('user', $user); // Save user details in session
            return redirect()->to(site_url('project/home'))->with('success', 'Login successful!');
        } else {
            return redirect()->back()->withInput()->with('error', 'Something went wrong!');
        }
    }

    public function logout()
    {
        // Destroy session or any other logout logic
        $this->session->destroy();
        return redirect()->to(site_url('project/login'))->with('success', 'Logged out successfully!');
    }
    
    public function profile()
    {
        // Fetch user details from session or database
        $user = $this->session->get('user'); // Assuming you store user details in session after login
        if (!$user) {
            // Redirect to login page if user is not logged in
            return redirect()->to(site_url('project/login'))->with('error', 'Please login to view your profile.');
        }
        
        // Load user details from database
        $model = new UserModel();
        $userData = $model->getUserByUsername($user['username']); // Assuming you have a method to get user by username
        
        // Pass user data to profile view
        $data['user'] = $userData;
        return view('ProjectViews/profile/index', $data);
    }
}