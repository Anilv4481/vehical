<?php

namespace App\Services;

use App\Models\VehicalService;
use Illuminate\Support\Facades\DB;

class vehicalservices
{
 
    public static function create(array $data)
    {
        $data = VehicalService::create($data);
        return $data;
    }
  
    public static function update(array $data,VehicalService $vehicalservice)
    {
        $data = $vehicalservice->update($data);
        return $data;
    }

    public static function updateById(array $data, $id)
    {
        $data = VehicalService::whereId($id)->update($data);
        return $data;
    }
 
    public static function getById($id)
    {
        $data = VehicalService::find($id);
        return $data;
    }
   
    public static function delete(VehicalService $vehicalservice)
    {
        $data = $vehicalservice->delete();
        return $data;
    }
   
    public static function deleteById($id)
    {
        $data = VehicalService::whereId($id)->delete();
        return $data;
    }

    public static function datatable()
    {
        $data = DB::table('vehicalservices')->orderBy('created_at', 'desc')->get();
        return $data;
    }
}