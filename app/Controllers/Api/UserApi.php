<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Services\UserService;

class UserApi extends ResourceController
{
    protected $format = 'json';
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function index()
    {
        $users = $this->userService->getAllUsers();
        return $this->respond($users);
    }

    public function show($id = null)
    {
        $user = $this->userService->getUserById($id);
        if ($user) {
            return $this->respond($user);
        }
        return $this->failNotFound('User not found');
    }

    public function create()
    {
        $data = $this->request->getJSON(true);
        $result = $this->userService->createUser($data);
        return $this->respondCreated($result);
    }

    public function update($id = null)
    {
        $data = $this->request->getJSON(true);
        $result = $this->userService->updateUser($id, $data);
        return $this->respond($result);
    }

    public function delete($id = null)
    {
        $result = $this->userService->deleteUser($id);
        return $this->respondDeleted(['id' => $id]);
    }
}
