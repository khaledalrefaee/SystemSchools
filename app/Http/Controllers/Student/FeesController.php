<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\FeesRepositoryInterface;
use App\Http\Requests\StoreFeesRequest;


class FeesController extends Controller
{
   
    protected $Fees;

    public function __construct(FeesRepositoryInterface $Fees)
    {
        $this->Fees = $Fees;
    }

    public function index()
    {
        return $this->Fees->index();

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return $this->Fees->create();

    }

   
    public function store(StoreFeesRequest $request)
    {
        return $this->Fees->store($request);
        
    }

   
    public function show($id)
    {
        return $this->Fees->show($id);

    }

 
    public function edit($id)
    {
        return $this->Fees->edit($id);

    }

 
    public function update(StoreFeesRequest $request, $id)
    {
        return $this->Fees->update($request);

    }

   
    public function destroy(Request $request)
    {
        return $this->Fees->destroy($request);

    }
}
