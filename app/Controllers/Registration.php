<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Registration extends Controller
{
    public function __construct()
    {
        helper('form');
        helper('url');
        $this->validation = \Config\Services::validation();
    }

    public function index()
    {
        return view('registration_view');
    }

    public function register()
    {
        
        $validation = \Config\Services::validation();

        $validation->setRules([
            'username' => 'required',
            'email' => 'required|valid_email',
            'password' => 'required',
            'confirm_password' => 'required|matches[password]',
            'firstname' => 'required',
            'lastname' => 'required',
        ]);

        if (!$validation->withRequest($this->request)->run()) {
           
            return view('registration_view', [
                'validation' => $validation
            ]);
        } else {
            
            $data = [
                'firstname' => $this->request->getPost('firstname'),
                'lastname' => $this->request->getPost('lastname'),
                'username' => $this->request->getPost('username'),
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'), 
                'accesslevel' => $this->request->getPost('accesslevel')
            ];

           
            $userModel = new \App\Models\UserModel();
            if ($userModel->where('username', $data['username'])->orWhere('email', $data['email'])->first()) {
                
                session()->setFlashdata('error', 'Username or email already exists.');
                return view('registration_view');
            } else {
                
                $userModel->save($data);
                session()->setFlashdata('success', 'Registration successful! You can now log in.');
                return redirect()->to('/login');
            }
        }
    }
}
