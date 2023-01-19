<?php

namespace App\Services;

use App\Models\Subcategorys;


class Petsubcategory{

    public static function create(array $data)
    {
        $data = Subcategorys::create($data);
        return $data;
    }

}