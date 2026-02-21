<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class HomeController extends Controller
{
    public function index()
    {
        
        $session = session();
        $username = $session->get('username') ?? 'Guest';

        
        return view('index', ['username' => $username]);
    }

    public function login()
    {
        
        $username = $this->request->getPost('username');
        
        
        $session = session();
        $session->set('username', $username);

        
        return redirect()->to('/');
    }

    public function logout()
    {
        
        session()->destroy(); 
    
        
        return redirect()->to('/login');
    }

    public function upcomingTournaments()
    {
       
        return view('upcomingtourna');
    }
}
