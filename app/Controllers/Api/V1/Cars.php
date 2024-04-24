<?php

namespace App\Controllers\Api\V1;

use CodeIgniter\RESTful\ResourceController;

class Cars extends ResourceController
{
    protected $modelName = 'App\Models\Cars';
    protected $format = 'json';

    protected $config = null;

    public function __construct()
    {
        $this->config = config('Cars');
    }

    //Shows all cars
    public function index()
    {
        $all_data = $this->model->findAll();
        if (!empty($all_data)) {

            return $this->respond($all_data);
        }
        return $this->failNotFound();
    }


    //Shows only car that has this id
    public function show($id = null)
    {
        if (!empty($id)) {

            $current_car = $this->model->find($id);

            if (!empty($current_car)) {

                if ($this->config->show_car_types) {

                    if (
                        !empty($current_car['car_type_id']) &&
                        isset($this->config->car_types[$current_car['car_type_id']])
                    ) {
                        $current_car['car_type'] = $this->config->car_types[$current_car['car_type_id']];
                    }
                }

                return $this->respond($current_car);
            }
            return $this->failNotFound();
        }
    }


    public function update($id = null)
    {

        if (!empty($id)) {
            $data_exists = $this->model->find($id);

            if (!empty($data_exists)) {
                $data = $this->request->getJSON(true);

                if (!empty($data)) {
                    $data['updated_at'] = date('Y-m-d H:i:s');

                    if ($this->model->update($id, $data) === false) {
                        return $this->failValidationError($this->model->errors());
                    } else {
                        return $this->respondUpdated(['id' => $id] + $data);
                    }
                }

            }


        }
        return $this->failNotFound();
    }



    //Creates a new car
    public function create()
    {
        $data = $this->request->getJSON(true);

        if (!empty($data)) {

            $data["created_at"] = date('Y-m-d H:i:s');
            $data["updated_at"] = date('Y-m-d H:i:s');

            $new_id = $this->model->insert($data);

            if ($new_id === false) {
                return $this->failValidationErrors($this->model->errors());
            } else {
                return $this->respondCreated(['id' => $new_id] + $data);
            }
        } else {
            return $this->failNotFound();
        }
    }


    public function delete($id = null)
    {
        if (!empty($id)) {

            $delete_exists = $this->model->find($id);

            if (!empty($delete_exists)) {
                $delete_status = $this->model->delete($id);

                if ($delete_status === true) {
                    return $this->respondDeleted(['id' => $id, 'message' => 'success', 'code' => 201]);
                }
            } else {
                return $this->failNotFound();
            }

        } else {
            return $this->failServerError();
        }
    }

}