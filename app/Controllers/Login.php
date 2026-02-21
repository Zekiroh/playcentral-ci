<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Login extends Controller
{
    public function index()
    {
        $data = [];

        // Check if the form is submitted
        if ($this->request->getMethod() === 'post') {
            // Get form inputs
            $username = $this->request->getPost('username');
            $password = $this->request->getPost('password');

            // Connect to the database
            $db = \Config\Database::connect();
            $builder = $db->table('users');

            // Query the database for the username
            $builder->where('username', $username);
            $query = $builder->get();

            if ($query->getNumRows() > 0) {
                $user = $query->getRow();

                // Verify password
                if (password_verify($password, $user->password)) {
                    // Set session data
                    session()->set([
                        'user_id' => $user->id,
                        'username' => $user->username,
                        'accesslevel' => $user->accesslevel,
                        'is_logged_in' => true,
                    ]);

                    return redirect()->to('/'); // Redirect to dashboard
                } else {
                    $data['error'] = "Invalid password.";
                }
            } else {
                $data['error'] = "No account found with that username.";
            }
        }

        return view('login', $data); // Pass error data to the login view
    }

    public function logout()
    {
        // Destroy the session
        session()->destroy();
        return redirect()->to('/login'); // Redirect to the login page
    }
}
