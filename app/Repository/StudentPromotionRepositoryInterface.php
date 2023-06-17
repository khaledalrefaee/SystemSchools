<?php

namespace App\Repository;

interface StudentPromotionRepositoryInterface
{
    public function index();

    public function create();

    public function Store($request);

    public function destroy($request);


}
