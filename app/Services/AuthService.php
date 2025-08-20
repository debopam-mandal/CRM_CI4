<?php

namespace App\Services;

use App\Models\AuthModel;

class AuthService
{
    protected $authModel;

    public function __construct()
    {
        $this->authModel = new AuthModel();
    }

    public function login(array $data): array
    {
        $user = $this->authModel->findByEmail($data['email'] ?? '');
        if ($user && password_verify($data['password'] ?? '', $user['password'])) {
            // Generate token or session here (stub)
            return [
                'success' => true,
                'user' => $user,
                'token' => 'dummy-token',
            ];
        }
        return [
            'success' => false,
            'message' => 'Invalid credentials',
        ];
    }

    public function register(array $data): array
    {
        if (empty($data['email']) || empty($data['password'])) {
            return [
                'success' => false,
                'message' => 'Email and password required',
            ];
        }
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if ($this->authModel->insert($data)) {
            $user = $this->authModel->findByEmail($data['email']);
            return [
                'success' => true,
                'user' => $user,
            ];
        }
        return [
            'success' => false,
            'message' => 'Registration failed',
        ];
    }
}