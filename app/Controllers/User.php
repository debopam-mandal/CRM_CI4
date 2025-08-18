<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Services\UserService;

class User extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return view('users/index', ['users' => $users]);
    }

    public function create()
    {
        return view('users/create');
    }

    public function store()
    {
        // Handle storing user
    }

    public function edit($id)
    {
        // Handle editing user
    }

    public function update($id)
    {
        // Handle updating user
    }
}
