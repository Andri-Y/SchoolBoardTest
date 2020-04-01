<?php

namespace App\Http\Controllers;

use App\Services\StudentService;
use Illuminate\Http\Request;

class StudentController extends Controller{

    private $studentService;

    public function __construct(StudentService $studentService){
        $this->studentService = $studentService;
    }

    public function getCSMData(){
        $id = \request()->id;
        $data = $this->studentService->getCSMData($id);
        return response()->json($data);
    }

    public function getCSMBData(){
        $id = \request()->id;
        $data = $this->studentService->getCSMBData($id);
        return response()->xml($data);
    }
}
