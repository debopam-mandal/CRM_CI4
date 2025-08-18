<?php
namespace App\Services;

class CustomerService
{
    public function getAllCustomers()
    {
        // Return all customers (stub)
        return [];
    }
    public function getCustomerById($id)
    {
        // Return a single customer by ID (stub)
        return ['id' => $id, 'name' => 'Sample Customer'];
    }

    public function createCustomer($data)
    {
        // Create a new customer (stub)
        return ['id' => 1, 'name' => $data['name'] ?? 'New Customer'];
    }

    public function updateCustomer($id, $data)
    {
        // Update customer (stub)
        return ['id' => $id, 'name' => $data['name'] ?? 'Updated Customer'];
    }

    public function deleteCustomer($id)
    {
        // Delete customer (stub)
        return true;
    }
}
