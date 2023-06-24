<?php

namespace App\Http\Controllers\teacher;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeachers;
use Illuminate\Http\Request;
use App\Repository\TeacherRepositoryInterface;
class TeacherController extends Controller
{

    protected $Teacher;

    public function __construct(TeacherRepositoryInterface $Teacher)
    {
        $this->Teacher = $Teacher;
    }



    public function index()
    {
        $Teachers = $this->Teacher->getAllTeachers();
        //$Teachers = Teacher::all();
        return view('pages.Teachers.Teachers',compact('Teachers'));
    }



    public function create()
    {
        $specializations =$this->Teacher->getSpecializations();
        $genders =$this->Teacher->getGenders();
        return view('pages.Teachers.create',compact('specializations','genders'));
    }



    public function store(StoreTeachers $request)
    {
        return $this->Teacher->StoreTeachers($request);
    }





    public function edit($id)
    {
        $Teachers = $this->Teacher->editTeachers($id);
        $specializations = $this->Teacher->getSpecializations();
        $genders = $this->Teacher->getGenders();
        return view('pages.Teachers.edit', compact('Teachers', 'specializations', 'genders'));
    }


    public function update(StoreTeachers $request){
        return $this->Teacher->UpdateTeachers($request);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Teacher->DeleteTeachers($request);
    }
}
