<?php

namespace App\Repository;

use http\Env\Request;

interface TeacherRepositoryInterface{

    // get all Teachers
    public function getAllTeachers();



    // get  Specializations
    public function getSpecializations();

    // get Genders
    public function getGenders();

    //store teacher
    public function StoreTeachers($request);

        //edit
    public function editTeachers($id);

    //UpdateTeachers
    public function UpdateTeachers( $request);

    public function DeleteTeachers( $request);
}
