<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\StudentGraduatedRepositoryInterface;

class GraduatedController extends Controller
{
    
    protected $Graduated;

    public function __construct(StudentGraduatedRepositoryInterface $Graduated)
    {
        $this->Graduated = $Graduated;
    }

    public function index()
    {
        return $this->Graduated->index();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Graduated->create();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return $this->Graduated->SoftDelete($request);

        
    }


    public function update(Request $request, $id)
    {
        return $this->Graduated->ReturnData($request);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        return $this->Graduated->destroy($request);

    }
}
