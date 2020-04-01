<?php


namespace App\Repositories;


use App\Student;

class StudentRepository{
    protected $model;

    public function __construct(Student $student){
        $this->model = $student;
    }

    public function getById($id){
        return $this->model->with('grades')->findOrFail($id);
    }

}
