<?php

namespace App\Services;

class AuthService
{
    public function login(array $data): array
    {
        $userModel = new \App\Models\UserModel();
        $user = $userModel->where('email', $data['email'] ?? '')->first();
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
        $userModel = new \App\Models\UserModel();
        if ($userModel->insert($data)) {
            return [
                'success' => true,
                'user' => $userModel->where('email', $data['email'])->first(),
            ];
        }
        return [
            'success' => false,
            'message' => 'Registration failed',
        ];
    }
    // Add more authentication-related methods as needed
}
