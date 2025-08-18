<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Services\CustomerService;

class Customer extends Controller
{
    protected $customerService;

    public function __construct()
    {
        $this->customerService = new CustomerService();
    }

    public function index()
    {
        $customers = $this->customerService->getAllCustomers();
        return view('customers/index', ['customers' => $customers]);
    }

    public function create()
    {
        return view('customers/create');
    }

    public function store()
    {
        // Handle storing customer
    }

    public function edit($id)
    {
        // Handle editing customer
    }

    public function update($id)
    {
        // Handle updating customer
    }
}
