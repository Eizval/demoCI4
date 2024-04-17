<?php

namespace App\Controllers\Api\V1;

use CodeIgniter\RESTful\ResourceController;

class Cars extends ResourceController
{
    protected $modelName = 'App\Models\Cars';
    protected $format = 'json';

    //Shows all cars
    public function index()
    {
        $all_data = $this->model->findAll();
        if(!empty($all_data)){
            
            return $this->respond($all_data);
        }
        return $this->failNotFound();
    }


    //Shows only car that has this id
    public function show($id = null){
        $current_car = $this->model->find($id);

        if(!empty($current_car)){
            return $this->respond($current_car);
        } 
        return $this->failNotFound();
    }



    //Creates a new car
    public function create(){
        
    }

}
