<?php

namespace App\Repository;

use http\Env\Request;

interface StudentRepositoryInterface{

    //get all student
    public function get_student();

    //edit student
    public function edit_student($id);

    //update_student
    public function update_student($request);

    public function delete_student($request);

    //create_student
    public function createstudent();

    //Get_classrooms
    public function Get_classrooms($id);

    public function Get_Sections($id);

    public function StoreStudent($request);

    public function show_student($id);

    public function Download_attachment($studentsname, $filename);

    public function Delete_attachment($request);
}
