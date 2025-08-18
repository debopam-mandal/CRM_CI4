<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Services\AuthService;

class Auth extends Controller
{
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login()
    {
        return view('auth/login');
    }

    public function attemptLogin()
    {
        // Handle login attempt
    }

    public function logout()
    {
        // Handle logout
    }
}
