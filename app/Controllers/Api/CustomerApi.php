<?php
namespace App\Controllers\Api;

use App\Controllers\Api\BaseApiController;
use App\Services\CustomerService;

class CustomerApi extends BaseApiController
{
    protected $format = 'json';
    protected $customerService;

    public function __construct()
    {
        $this->customerService = new CustomerService();
    }

    public function index()
    {
        $customers = $this->customerService->getAllCustomers();
        return $this->respond($customers);
    }

    public function show($id = null)
    {
        $customer = $this->customerService->getCustomerById($id);
        if ($customer) {
            return $this->respond($customer);
        }
        return $this->failNotFound('Customer not found');
    }

    public function create()
    {
        $data = $this->request->getJSON(true);
        $result = $this->customerService->createCustomer($data);
        return $this->respondCreated($result);
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        $result = $this->customerService->updateCustomer($id, $data);
        return $this->respond($result);
    }

    public function delete($id = null)
    {
        $result = $this->customerService->deleteCustomer($id);
        return $this->respondDeleted(['id' => $id]);
    }
}
