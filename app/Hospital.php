<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Exceptions\ValidationException;

class Hospital extends Model
{
    /*function __construct($name, $address, $numberOfBeds, $numberOfDoctors){
        parent::__construct();

        if(is_null($name) || strlen($name) == 0){
            throw new ValidationException('Invalid name');
        }

        $this->name = $name;
        $this->address = $address;
        $this->numberOfBeds = is_numeric($numberOfBeds) && $numberOfBeds>0 ? intval($numberOfBeds) : 0;
        $this->numberOfDoctors = is_numeric($numberOfDoctors) && $numberOfDoctors>0 ? intval($numberOfDoctors) : 0;
    }*/
    static function create($name, $address, $numberOfBeds, $numberOfDoctors){
        $model = new Hospital;
        $model->name = $name;
        if(is_null($name) || strlen($name) == 0){
            throw new ValidationException('Invalid name');
        }

        $model->name = $name;
        $model->address = $address;
        $model->numberOfBeds = is_numeric($numberOfBeds) && $numberOfBeds>0 ? intval($numberOfBeds) : 0;
        $model->numberOfDoctors = is_numeric($numberOfDoctors) && $numberOfDoctors>0 ? intval($numberOfDoctors) : 0;

        return $model;
    }
}
