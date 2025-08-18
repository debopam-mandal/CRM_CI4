<?php
namespace App\Services;

class UserService
{
    public function getAllUsers()
    {
        // Return all users (stub)
        return [];
    }
    public function getUserById($id)
    {
        // Return a single user by ID (stub)
        return ['id' => $id, 'username' => 'Sample User'];
    }

    public function createUser($data)
    {
        // Create a new user (stub)
        return ['id' => 1, 'username' => $data['username'] ?? 'New User'];
    }

    public function updateUser($id, $data)
    {
        // Update user (stub)
        return ['id' => $id, 'username' => $data['username'] ?? 'Updated User'];
    }

    public function deleteUser($id)
    {
        // Delete user (stub)
        return true;
    }
}
