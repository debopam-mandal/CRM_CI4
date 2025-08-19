<?php
namespace App\Controllers\Webservices;

use CodeIgniter\RESTful\ResourceController;
use App\Services\AuthService;

class AuthController extends ResourceController
{
    protected $format = 'json';
    protected $authService;

    public function __construct()
    {
        $this->authService = new AuthService();
    }

    public function login(): object
    {
        $data = $this->getRequestData();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'email' => 'required|valid_email',
            'password' => 'required|min_length[6]'
        ]);
        if (!$validation->run($data)) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $result = $this->authService->login($data);
        if ($result['success']) {
            return $this->respond($result);
        }
        return $this->failUnauthorized($result['message'] ?? 'Login failed');
    }

    public function register(): object
    {
        $data = $this->getRequestData();
        $validation = \Config\Services::validation();
        $validation->setRules([
            'name' => 'required|min_length[2]',
            'email' => 'required|valid_email|is_unique[users.email]',
            'password' => 'required|min_length[6]'
        ]);
        if (!$validation->run($data)) {
            return $this->failValidationErrors($validation->getErrors());
        }
        $result = $this->authService->register($data);
        if ($result['success']) {
            return $this->respondCreated($result);
        }
        return $this->failValidationErrors($result['message'] ?? 'Registration failed');
    }

    /**
     * Helper to get request data as array from JSON or POST.
     */
    private function getRequestData(): array
    {
        $data = $this->request->getJSON(true);
        if (!$data) {
            $data = $this->request->getPost();
        }
        return is_array($data) ? $data : [];
    }
}
