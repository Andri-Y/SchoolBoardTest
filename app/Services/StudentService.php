<?php


namespace App\Services;


use App\Repositories\StudentRepository;

class StudentService{

    private $studentRepository;

    public function __construct(StudentRepository $studentRepository){
        $this->studentRepository = $studentRepository;
    }

    public function getCSMData($id){
        $student = $this->studentRepository->getById($id);
        $grades = $this->getGrades($student);
        $average = $grades->avg();
        $result = $average >= 7;

        $data = [
            "id" => $student->id,
            "name" => $student->name,
            "grades" => $grades,
            "average" => $average,
            "result" => $result
        ];

        return $data;
    }

    public function getCSMBData($id){
        $student = $this->studentRepository->getById($id);
        $grades = $this->getGrades($student);

        if($grades->count() > 2){
            $grades = $grades->forget($grades->search($grades->min()))->values();
        }

        $result  = $grades->max() > 8;
        $average = $grades->avg();

        $data = [
            "id" => $student->id,
            "name" => $student->name,
            "grades" => $grades,
            "average" => $average,
            "result" => $result ? "true" : "false"
        ];

        return $data;
    }

    private function getGrades($student){
        return collect($student->grades)->map(function ($grade){
            return $grade->value;
        });
    }


}
