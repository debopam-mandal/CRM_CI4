<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;

/**
 * BaseApiController for all API controllers.
 * Extend this for shared API logic, authentication, etc.
 */
class BaseApiController extends ResourceController
{
    protected $format = 'json';

    // Add shared methods or properties for API controllers here
}
