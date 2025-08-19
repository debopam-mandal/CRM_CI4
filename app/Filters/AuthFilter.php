<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\Services;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $header = $request->getHeaderLine('Authorization');
        if (!$header || !preg_match('/Bearer\s(\S+)/', $header, $matches)) {
            return Services::response()
                ->setStatusCode(401)
                ->setJSON(['message' => 'Unauthorized: No token provided']);
        }
        $token = $matches[1];
        // Dummy token check, replace with real validation
        if ($token !== 'dummy-token') {
            return Services::response()
                ->setStatusCode(401)
                ->setJSON(['message' => 'Unauthorized: Invalid token']);
        }
        // If valid, allow request to proceed
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // No action needed after
    }
}
