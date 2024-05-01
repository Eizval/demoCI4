<?php

namespace App\Controllers\keys;

use App\Controllers\BaseController;
use CodeIgniter\RESTful\ResourceController;

class Keys extends ResourceController
{

    protected $modelName = 'App\Models\Keys';
    protected $format = 'json';
    protected $config = null;

    public function __construct()
    {
        $this->config = config('Keys');
    }

    public function index()
    {
        $all_data = $this->model->findAll();
        if (!empty($all_data)) {

            return $this->respond($all_data);
        }
        return $this->failNotFound();
    }
}