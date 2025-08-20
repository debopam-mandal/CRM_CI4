<?php
namespace App\Services;

use App\Models\CustomerModel;

class CustomerService
{
    protected $customerModel;

    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function getAllCustomers(): array
    {
        return $this->customerModel->findAll();
    }

    public function getCustomerById($id): ?array
    {
        return $this->customerModel->find($id);
    }

    public function createCustomer(array $data): string
    {
        return $this->customerModel->insert($data);
    }

    public function updateCustomer($id, array $data): bool
    {
        return $this->customerModel->update($id, $data);
    }

    public function deleteCustomer($id): bool
    {
        return $this->customerModel->delete($id);
    }
}