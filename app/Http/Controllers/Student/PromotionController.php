<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Repository\StudentPromotionRepositoryInterface;
use Illuminate\Http\Request;

class PromotionController extends Controller
{
    protected $Promotion;

    public function __construct(StudentPromotionRepositoryInterface $Promotion)
    {
        $this->Promotion = $Promotion;
    }

    public function index()
    {
        return $this->Promotion->index();
    }


    public function create()
    {
        return $this->Promotion->create();
    }


    public function store(Request $request)
    {
        return $this->Promotion->Store($request);
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //
    }


    public function destroy(Request $request)
    {
        return $this->Promotion->destroy($request);
    }
}
