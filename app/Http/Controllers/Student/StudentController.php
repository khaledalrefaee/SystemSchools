<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStudentsRequest;
use App\Repository\StudentRepositoryInterface;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    protected $Student;

    public function __construct(StudentRepositoryInterface $Student)
    {
        $this->Student = $Student;
    }

    public function index()
    {
        return $this->Student->get_student();
    }


    public function create()
    {
        return $this->Student->createstudent();
    }


    public function store(StoreStudentsRequest $request)
    {
        return $this->Student->StoreStudent($request);
    }


    public function show($id)
    {
        return $this->Student->show_student($id);
    }


    public function edit($id)
    {
        return $this->Student->edit_student($id);
    }


    public function update(StoreStudentsRequest $request, $id)
    {
        return $this->Student->update_student($request);
    }


    public function destroy(Request $request)
    {
        return $this->Student->delete_student($request);
    }

    public function Get_classrooms($id){
        return $this->Student->Get_classrooms($id);
    }

    public function Get_Sections($id){
        return $this->Student->Get_Sections($id);
    }

    public function Upload_attachment(Request $request){
        return $this->Student->Upload_attachment($request);
    }

    public function Download_attachment($studentsname, $filename){
        return $this->Student->Download_attachment($studentsname,$filename);
    }

    public function Delete_attachment(Request $request){
        return $this->Student->Delete_attachment($request);
    }
}
